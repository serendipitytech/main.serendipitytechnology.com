<?php
header('Content-Type: application/json');

// Load environment variables from .env file
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '#') === 0) continue;
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $_ENV[trim($key)] = trim($value);
            putenv(trim($key) . '=' . trim($value));
        }
    }
}

// Load Twilio SDK
require_once __DIR__ . '/vendor/twilio/sdk/src/Twilio/autoload.php';
use Twilio\Rest\Client;

// Load credentials from environment
$twilioSid = getenv('TWILIO_ACCOUNT_SID');
$twilioToken = getenv('TWILIO_AUTH_TOKEN');
$twilioFrom = getenv('TWILIO_PHONE_NUMBER');
$contactEmail = getenv('CONTACT_EMAIL') ?: 'troy@serendipitytech.net';

// Validate credentials are set
if (empty($twilioSid) || empty($twilioToken) || empty($twilioFrom)) {
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

    $to = $contactEmail;
    $subject = "New Contact Form Submission";
    $headers = "From: troy@serendipitytech.net";

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
    if (empty($phone)) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Phone number is required for SMS']);
        exit;
    }

    try {
        error_log("To: " . $_POST['phone']);
        error_log("Message: " . $_POST['need']);
        $client = new Client($twilioSid, $twilioToken);
        $client->messages->create(
            $phone,
            [
                'from' => $twilioFrom,
                'body' => $message
            ]
        );
        echo json_encode(['status' => 'ok', 'message' => 'SMS sent successfully']);
    file_put_contents('sms_log.json', json_encode([
    'from' => $twilioFrom,
    'to' => $phone,
    'body' => $message,
    'timestamp' => time()
]) . "\n", FILE_APPEND);
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