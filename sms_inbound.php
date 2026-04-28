<?php
/**
 * Twilio SMS Inbound Webhook
 * Receives incoming SMS messages and stores them
 * Sends alert to admin phone
 */

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/vendor/twilio/sdk/src/Twilio/autoload.php';

use Twilio\Rest\Client;

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit;
}

// Validate Twilio signature in production
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$webhookUrl = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

if (TWILIO_AUTH_TOKEN && !validateTwilioSignature($webhookUrl)) {
    error_log('Invalid Twilio signature for inbound SMS');
    http_response_code(403);
    exit;
}

// Extract message data
$from = $_POST['From'] ?? '';
$to = $_POST['To'] ?? '';
$body = $_POST['Body'] ?? '';

// Validate required fields
if (empty($from) || empty($body)) {
    http_response_code(400);
    exit;
}

// Save to new data layer
addMessage([
    'from' => $from,
    'to' => $to,
    'body' => $body,
    'timestamp' => time(),
    'direction' => 'inbound'
]);

// Also append to legacy log for backwards compatibility during transition
$legacyLogEntry = json_encode([
    'from' => $from,
    'to' => $to,
    'body' => $body,
    'timestamp' => time(),
    'direction' => 'inbound'
]) . PHP_EOL;

file_put_contents(
    __DIR__ . '/sms_log.json',
    $legacyLogEntry,
    FILE_APPEND | LOCK_EX
);

// Send alert SMS to admin
if (TWILIO_ACCOUNT_SID && TWILIO_AUTH_TOKEN && ADMIN_PHONE) {
    try {
        // Format phone number for display
        $fromDigits = preg_replace('/\D/', '', $from);
        if (strlen($fromDigits) === 11 && $fromDigits[0] === '1') {
            $fromFormatted = '(' . substr($fromDigits, 1, 3) . ') ' . substr($fromDigits, 4, 3) . '-' . substr($fromDigits, 7);
        } else {
            $fromFormatted = $from;
        }

        // Truncate message preview if too long
        $preview = strlen($body) > 100 ? substr($body, 0, 100) . '...' : $body;

        $alertMessage = "New SMS from {$fromFormatted}:\n\"{$preview}\"\n\nView: https://serendipitytechnology.com/chat_ui.php";

        $client = new Client(TWILIO_ACCOUNT_SID, TWILIO_AUTH_TOKEN);
        $client->messages->create(
            ADMIN_PHONE,
            [
                'from' => TWILIO_PHONE_NUMBER,
                'body' => $alertMessage
            ]
        );
    } catch (Exception $e) {
        error_log('Failed to send admin alert: ' . $e->getMessage());
    }
}

// Return empty TwiML response (no auto-reply)
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8"?><Response></Response>';
