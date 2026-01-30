<?php
/**
 * Send SMS endpoint
 * Protected by session authentication
 */

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/vendor/twilio/sdk/src/Twilio/autoload.php';

use Twilio\Rest\Client;

// Require authentication
requireAuthApi();

// Validate credentials are configured
if (!TWILIO_ACCOUNT_SID || !TWILIO_AUTH_TOKEN || !TWILIO_PHONE_NUMBER) {
    http_response_code(500);
    echo json_encode(['error' => 'Twilio not configured']);
    exit;
}

$to = $_POST['to'] ?? '';
$body = $_POST['body'] ?? '';

if (!$to || !$body) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required fields']);
    exit;
}

try {
    $client = new Client(TWILIO_ACCOUNT_SID, TWILIO_AUTH_TOKEN);
    $client->messages->create($to, [
        'from' => TWILIO_PHONE_NUMBER,
        'body' => $body
    ]);

    // Log the outbound message
    $logEntry = [
        'from' => TWILIO_PHONE_NUMBER,
        'to' => $to,
        'body' => $body,
        'timestamp' => time(),
        'direction' => 'outbound'
    ];

    file_put_contents(
        __DIR__ . '/sms_log.json',
        json_encode($logEntry) . PHP_EOL,
        FILE_APPEND | LOCK_EX
    );

    header('Content-Type: application/json');
    echo json_encode(['status' => 'ok', 'message' => 'Message sent']);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to send: ' . $e->getMessage()]);
}
