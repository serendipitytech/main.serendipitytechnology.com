<?php
/**
 * /api/candidate-signup.php
 * Handles campaign signup form POST from /services/candidates/signup.php.
 * Validates required fields, saves JSON record, emails notification, redirects to thanks.
 *
 * TODO: Pass 2 — wire to Stripe Checkout creation before saving record.
 */

ini_set('display_errors', 0);
error_reporting(E_ALL);

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../vendor/twilio/sdk/src/Twilio/autoload.php';

use Twilio\Rest\Client;

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Method Not Allowed';
    exit;
}

// Collect and sanitize fields
$fields = [
    // Section 1: Candidate
    'candidate_name'     => trim($_POST['candidate_name'] ?? ''),
    'candidate_email'    => trim($_POST['candidate_email'] ?? ''),
    'candidate_phone'    => trim($_POST['candidate_phone'] ?? ''),
    // Section 2: Campaign
    'campaign_name'      => trim($_POST['campaign_name'] ?? ''),
    'office'             => trim($_POST['office'] ?? ''),
    'jurisdiction'       => trim($_POST['jurisdiction'] ?? ''),
    'party'              => trim($_POST['party'] ?? ''),
    'election_date'      => trim($_POST['election_date'] ?? ''),
    'primary_date'       => trim($_POST['primary_date'] ?? ''),
    'treasurer_name'     => trim($_POST['treasurer_name'] ?? ''),
    'treasurer_email'    => trim($_POST['treasurer_email'] ?? ''),
    // Section 3: Website
    'desired_domain'     => trim($_POST['desired_domain'] ?? ''),
    'backup_domains'     => trim($_POST['backup_domains'] ?? ''),
    'donation_processor' => trim($_POST['donation_processor'] ?? ''),
    'donation_url'       => trim($_POST['donation_url'] ?? ''),
    // Meta
    'submitted_at'       => date('c'),
    'ip'                 => $_SERVER['REMOTE_ADDR'] ?? '',
];

// Required field validation
$required = [
    'candidate_name'  => 'Candidate name',
    'candidate_email' => 'Candidate email',
    'campaign_name'   => 'Campaign / committee name',
    'office'          => 'Office sought',
    'election_date'   => 'Election date',
];

$errors = [];
foreach ($required as $key => $label) {
    if (empty($fields[$key])) {
        $errors[] = "{$label} is required.";
    }
}

if (!empty($fields['candidate_email']) && !filter_var($fields['candidate_email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Candidate email address is not valid.';
}

// Checkbox confirmations
$confirm_rep   = !empty($_POST['confirm_rep']);
$confirm_optin = !empty($_POST['confirm_optin']);
$confirm_tos   = !empty($_POST['confirm_tos']);

if (!$confirm_rep)   $errors[] = 'You must confirm you are the candidate or authorized representative.';
if (!$confirm_optin) $errors[] = 'You must agree to the newsletter opt-in terms.';
if (!$confirm_tos)   $errors[] = 'You must agree to the Terms of Service and Privacy Policy.';

if (!empty($errors)) {
    // Redirect back with errors encoded in query string
    $msg = urlencode(implode(' ', $errors));
    header("Location: /services/candidates/signup.php?error={$msg}");
    exit;
}

// Save to JSON file
$dataDir = __DIR__ . '/../data/candidate_signups';
if (!is_dir($dataDir)) {
    mkdir($dataDir, 0750, true);
}

$slug     = preg_replace('/[^a-z0-9]+/', '-', strtolower($fields['candidate_name']));
$slug     = trim($slug, '-');
$filename = date('Ymd_His') . '_' . $slug . '.json';
$filepath = $dataDir . '/' . $filename;

file_put_contents($filepath, json_encode($fields, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// Build email notification body
$body  = "New candidate signup (Pass 1 — awaiting Stripe)\n\n";
$body .= "--- CANDIDATE ---\n";
$body .= "Name:  {$fields['candidate_name']}\n";
$body .= "Email: {$fields['candidate_email']}\n";
if ($fields['candidate_phone']) $body .= "Phone: {$fields['candidate_phone']}\n";

$body .= "\n--- CAMPAIGN ---\n";
$body .= "Committee:    {$fields['campaign_name']}\n";
$body .= "Office:       {$fields['office']}\n";
if ($fields['jurisdiction'])  $body .= "Jurisdiction: {$fields['jurisdiction']}\n";
if ($fields['party'])         $body .= "Party:        {$fields['party']}\n";
$body .= "Election:     {$fields['election_date']}\n";
if ($fields['primary_date'])  $body .= "Primary:      {$fields['primary_date']}\n";
if ($fields['treasurer_name']) $body .= "Treasurer:    {$fields['treasurer_name']}\n";
if ($fields['treasurer_email']) $body .= "Treas. Email: {$fields['treasurer_email']}\n";

$body .= "\n--- WEBSITE ---\n";
if ($fields['desired_domain'])     $body .= "Domain:          {$fields['desired_domain']}\n";
if ($fields['backup_domains'])     $body .= "Backups:         {$fields['backup_domains']}\n";
if ($fields['donation_processor']) $body .= "Don. Processor:  {$fields['donation_processor']}\n";
if ($fields['donation_url'])       $body .= "Don. URL:        {$fields['donation_url']}\n";

$body .= "\nSaved: {$filepath}";

// Send email via Resend
if (RESEND_API_KEY) {
    $emailPayload = [
        'from'    => 'Candidate Signups <contact@serendipitytechnology.com>',
        'to'      => ['info@serendipitytech.net'],
        'subject' => "New Candidate Signup — {$fields['campaign_name']}",
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
    $resendCode     = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($resendCode < 200 || $resendCode >= 300) {
        error_log('Resend error on candidate signup: HTTP ' . $resendCode . ' - ' . $resendResponse);
    }
} else {
    error_log('Resend API key not configured — candidate signup email not sent');
}

// Admin SMS (non-fatal)
if (TWILIO_ACCOUNT_SID && TWILIO_AUTH_TOKEN && TWILIO_PHONE_NUMBER && ADMIN_PHONE) {
    try {
        $smsBody  = "New candidate signup:\n";
        $smsBody .= "{$fields['candidate_name']}\n";
        $smsBody .= "{$fields['campaign_name']}\n";
        $smsBody .= "Office: {$fields['office']}\n";
        $smsBody .= "Email: {$fields['candidate_email']}";

        $client = new Client(TWILIO_ACCOUNT_SID, TWILIO_AUTH_TOKEN);
        $client->messages->create(ADMIN_PHONE, [
            'from' => TWILIO_PHONE_NUMBER,
            'body' => $smsBody,
        ]);
    } catch (Exception $e) {
        error_log('SMS alert failed on candidate signup: ' . $e->getMessage());
    }
}

header('Location: /services/candidates/thanks.php');
exit;
