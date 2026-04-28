<?php
/**
 * /api/candidate-inquiry.php
 * Contact form handler for /services/candidates lead inquiry modal.
 * Accepts JSON POST, sends Resend email + Twilio SMS alert.
 */

ini_set('display_errors', 0);
error_reporting(E_ALL);

header('Content-Type: application/json');

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../vendor/twilio/sdk/src/Twilio/autoload.php';

use Twilio\Rest\Client;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

$raw  = file_get_contents('php://input');
$data = json_decode($raw, true);

if (!$data) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid JSON body']);
    exit;
}

// Sanitize inputs
$name           = trim($data['name'] ?? '');
$email          = trim($data['email'] ?? '');
$phone          = trim($data['phone'] ?? '');
$campaign_name  = trim($data['campaign_name'] ?? '');
$office         = trim($data['office'] ?? '');
$election_date  = trim($data['election_date'] ?? '');
$domain_status  = trim($data['domain_status'] ?? '');
$domain         = trim($data['domain'] ?? '');
$message        = trim($data['message'] ?? '');

// Required field validation
$errors = [];
if (empty($name))          $errors[] = 'Name is required';
if (empty($email))         $errors[] = 'Email is required';
if (empty($campaign_name)) $errors[] = 'Campaign / committee name is required';
if (empty($office))        $errors[] = 'Office sought is required';
if (empty($election_date)) $errors[] = 'Election date is required';

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => implode('. ', $errors)]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid email address']);
    exit;
}

// Basic spam keyword filter
$spam_keywords = ['viagra', 'casino', 'lottery', 'prize', 'click here', 'free money', 'nigerian'];
$check_text    = strtolower($name . ' ' . $message . ' ' . $campaign_name);
foreach ($spam_keywords as $kw) {
    if (strpos($check_text, $kw) !== false) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Submission rejected']);
        exit;
    }
}

// Build email body
$body  = "New candidate inquiry\n\n";
$body .= "--- CONTACT ---\n";
$body .= "Name: {$name}\n";
$body .= "Email: {$email}\n";
if ($phone) $body .= "Phone: {$phone}\n";
$body .= "\n--- CAMPAIGN ---\n";
$body .= "Campaign / Committee: {$campaign_name}\n";
$body .= "Office Sought: {$office}\n";
$body .= "Election Date: {$election_date}\n";
if ($domain_status) $body .= "Domain Status: {$domain_status}\n";
if ($domain)        $body .= "Domain Name: {$domain}\n";
if ($message)       $body .= "\nMessage:\n{$message}";

// Send via Resend
if (!RESEND_API_KEY) {
    error_log('Resend API key not configured');
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Email service not configured']);
    exit;
}

$emailPayload = [
    'from'    => 'Candidate Inquiries <contact@serendipitytechnology.com>',
    'to'      => ['info@serendipitytech.net'],
    'subject' => "New Candidate Inquiry — {$campaign_name}",
    'text'    => $body,
];

$ch = curl_init('https://api.resend.com/emails');
curl_setopt_array($ch, [
    CURLOPT_HTTPHEADER     => [
        'Authorization: Bearer ' . RESEND_API_KEY,
        'Content-Type: application/json',
    ],
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => json_encode($emailPayload),
    CURLOPT_RETURNTRANSFER => true,
]);

$resendResponse = curl_exec($ch);
$httpCode       = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode < 200 || $httpCode >= 300) {
    error_log('Resend API error: HTTP ' . $httpCode . ' - ' . $resendResponse);
    $errorData = json_decode($resendResponse, true);
    $errorMsg  = $errorData['message'] ?? ('Resend API error: HTTP ' . $httpCode);
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Failed to send email: ' . $errorMsg]);
    exit;
}

// Admin SMS alert (non-fatal)
if (TWILIO_ACCOUNT_SID && TWILIO_AUTH_TOKEN && TWILIO_PHONE_NUMBER && ADMIN_PHONE) {
    try {
        $smsBody  = "New candidate inquiry:\n";
        $smsBody .= "Name: {$name}\n";
        $smsBody .= "Campaign: {$campaign_name}\n";
        $smsBody .= "Office: {$office}\n";
        $smsBody .= "Email: {$email}\n";
        if ($phone) $smsBody .= "Phone: {$phone}";

        $client = new Client(TWILIO_ACCOUNT_SID, TWILIO_AUTH_TOKEN);
        $client->messages->create(ADMIN_PHONE, [
            'from' => TWILIO_PHONE_NUMBER,
            'body' => $smsBody,
        ]);
    } catch (Exception $e) {
        error_log('Admin SMS alert failed: ' . $e->getMessage());
    }
}

echo json_encode(['success' => true, 'message' => 'Inquiry sent successfully']);
