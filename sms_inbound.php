<?php
/**
 * Twilio SMS Inbound Webhook
 * Receives incoming SMS messages and stores them
 */

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/data.php';

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

// Return empty TwiML response (no auto-reply)
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8"?><Response></Response>';
