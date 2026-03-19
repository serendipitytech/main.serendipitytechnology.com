<?php
/**
 * Contact form handler for websites.php lead form
 * Accepts JSON POST, sends email via Resend, SMS alert via Twilio
 */

ini_set('display_errors', 0);
error_reporting(E_ALL);

header('Content-Type: application/json');

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/vendor/twilio/sdk/src/Twilio/autoload.php';

use Twilio\Rest\Client;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

$raw = file_get_contents('php://input');
$data = json_decode($raw, true);

if (!$data) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid JSON body']);
    exit;
}

$name         = trim($data['name'] ?? '');
$email        = trim($data['email'] ?? '');
$phone        = trim($data['phone'] ?? '');
$organization = trim($data['organization'] ?? '');
$plan         = trim($data['plan'] ?? '');
$domain_status = trim($data['domain_status'] ?? '');
$domain       = trim($data['domain'] ?? '');
$message      = trim($data['message'] ?? '');
$source       = trim($data['source'] ?? 'websites-page');

if (empty($name) || empty($email)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Name and email are required']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid email address']);
    exit;
}

// Build email body
$body  = "New website inquiry from {$source}\n\n";
$body .= "Name: {$name}\n";
if ($organization) $body .= "Business: {$organization}\n";
$body .= "Email: {$email}\n";
if ($phone) $body .= "Phone: {$phone}\n";
if ($plan) $body .= "Plan Interest: {$plan}\n";
if ($domain_status) $body .= "Domain Status: {$domain_status}\n";
if ($domain) $body .= "Domain: {$domain}\n";
if ($message) $body .= "\nAbout their business:\n{$message}";

// Send email via Resend
if (!RESEND_API_KEY) {
    error_log('Resend API key not configured');
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Email service not configured']);
    exit;
}

$emailPayload = [
    'from' => 'Website Leads <contact@serendipitytechnology.com>',
    'to'   => [CONTACT_EMAIL],
    'subject' => "New Website Inquiry: {$name}" . ($organization ? " ({$organization})" : ''),
    'text' => $body
];

$ch = curl_init('https://api.resend.com/emails');
curl_setopt_array($ch, [
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . RESEND_API_KEY,
        'Content-Type: application/json'
    ],
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($emailPayload),
    CURLOPT_RETURNTRANSFER => true
]);

$resendResponse = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode < 200 || $httpCode >= 300) {
    error_log('Resend API error: HTTP ' . $httpCode . ' - ' . $resendResponse);
    $errorData = json_decode($resendResponse, true);
    $errorMsg = $errorData['message'] ?? ('Resend API error: HTTP ' . $httpCode);
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Failed to send email: ' . $errorMsg]);
    exit;
}

// Send admin SMS alert (non-fatal if it fails)
if (TWILIO_ACCOUNT_SID && TWILIO_AUTH_TOKEN && TWILIO_PHONE_NUMBER && ADMIN_PHONE) {
    try {
        $preview = strlen($message) > 80 ? substr($message, 0, 80) . '...' : $message;
        $smsBody  = "New website lead:\n";
        $smsBody .= "Name: {$name}\n";
        if ($organization) $smsBody .= "Biz: {$organization}\n";
        $smsBody .= "Email: {$email}\n";
        if ($phone) $smsBody .= "Phone: {$phone}\n";
        if ($plan) $smsBody .= "Plan: {$plan}\n";
        if ($preview) $smsBody .= "\n\"{$preview}\"";

        $client = new Client(TWILIO_ACCOUNT_SID, TWILIO_AUTH_TOKEN);
        $client->messages->create(ADMIN_PHONE, [
            'from' => TWILIO_PHONE_NUMBER,
            'body' => $smsBody
        ]);
    } catch (Exception $e) {
        error_log('Admin SMS alert failed: ' . $e->getMessage());
    }
}

echo json_encode(['success' => true, 'message' => 'Inquiry sent successfully']);
