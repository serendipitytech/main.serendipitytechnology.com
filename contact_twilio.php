<?php
/**
 * Contact form handler
 * Sends email or SMS based on user preference (public endpoint)
 */

header('Content-Type: application/json');

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/vendor/twilio/sdk/src/Twilio/autoload.php';

use Twilio\Rest\Client;

// Validate credentials are set
if (!TWILIO_ACCOUNT_SID || !TWILIO_AUTH_TOKEN || !TWILIO_PHONE_NUMBER) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Server configuration error']);
    error_log('Twilio credentials not configured in .env file');
    exit;
}

// Ensure request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

// Sanitize input
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$need = trim($_POST['need'] ?? '');
$contact_method = $_POST['contact_method'] ?? 'email';

if (empty($name) || empty($need)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
    exit;
}

// Compose message
$message = "Name: $name\n";
$message .= $email ? "Email: $email\n" : '';
$message .= $phone ? "Phone: $phone\n" : '';
$message .= "\nMessage:\n$need";

// Handle Email
if ($contact_method === 'email') {
    if (empty($email)) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Email address is required for email contact']);
        exit;
    }

    $to = CONTACT_EMAIL;
    $subject = "New Contact Form Submission";
    $headers = "From: " . CONTACT_EMAIL;

    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(['status' => 'ok', 'message' => 'Email sent successfully']);
    } else {
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => 'Failed to send email']);
    }
}
// Handle SMS
elseif ($contact_method === 'sms') {
    $rawPhone = trim($_POST['phone'] ?? '');
    $digitsOnly = preg_replace('/\D/', '', $rawPhone);

    // Ensure it's 10 digits
    if (strlen($digitsOnly) !== 10) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Phone number must be 10 digits']);
        exit;
    }

    $phone = '+1' . $digitsOnly;

    try {
        $client = new Client(TWILIO_ACCOUNT_SID, TWILIO_AUTH_TOKEN);
        $client->messages->create(
            $phone,
            [
                'from' => TWILIO_PHONE_NUMBER,
                'body' => $message
            ]
        );

        // Log the outbound message
        $logEntry = [
            'from' => TWILIO_PHONE_NUMBER,
            'to' => $phone,
            'body' => $message,
            'timestamp' => time(),
            'direction' => 'outbound'
        ];

        file_put_contents(
            __DIR__ . '/sms_log.json',
            json_encode($logEntry) . PHP_EOL,
            FILE_APPEND | LOCK_EX
        );

        echo json_encode(['status' => 'ok', 'message' => 'SMS sent successfully']);

    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => 'Failed to send SMS: ' . $e->getMessage()]);
    }
}
// Unknown method
else {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Unknown contact method']);
}
