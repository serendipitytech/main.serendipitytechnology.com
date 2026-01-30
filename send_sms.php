<?php
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

require_once __DIR__ . '/vendor/twilio/sdk/src/Twilio/autoload.php';
use Twilio\Rest\Client;

// Load credentials from environment
$twilioSid = getenv('TWILIO_ACCOUNT_SID');
$twilioToken = getenv('TWILIO_AUTH_TOKEN');
$twilioFrom = getenv('TWILIO_PHONE_NUMBER');

if (empty($twilioSid) || empty($twilioToken) || empty($twilioFrom)) {
    die("Server configuration error - credentials not set");
}

$to = $_POST['to'] ?? '';
$body = $_POST['body'] ?? '';

if (!$to || !$body) {
    die("Missing fields");
}

$client = new Client($twilioSid, $twilioToken);
$client->messages->create($to, [
    'from' => $twilioFrom,
    'body' => $body
]);
// Append to log file
file_put_contents('sms_log.json', json_encode([
    'from' => $twilioFrom,
    'to' => $to,
    'body' => $body,
    'timestamp' => time()
]) . "\n", FILE_APPEND);

echo "Message sent";