<?php
/**
 * Contact form handler
 * Sends email or SMS based on user preference (public endpoint)
 * Sends alert to admin for all submissions
 */

// Temporarily enable error display for debugging (remove after fixing)
ini_set('display_errors', 0);
error_reporting(E_ALL);

header('Content-Type: application/json');

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/vendor/twilio/sdk/src/Twilio/autoload.php';

use Twilio\Rest\Client;

/**
 * Validate Cloudflare Turnstile CAPTCHA token
 */
function validateTurnstile($token) {
    if (empty($token) || !TURNSTILE_SECRET_KEY) {
        return false;
    }

    $ch = curl_init('https://challenges.cloudflare.com/turnstile/v0/siteverify');
    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query([
            'secret' => TURNSTILE_SECRET_KEY,
            'response' => $token
        ]),
        CURLOPT_RETURNTRANSFER => true
    ]);

    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode !== 200 || $result === false) {
        error_log('Turnstile API request failed');
        return false;
    }

    $response = json_decode($result, true);
    return $response['success'] ?? false;
}

/**
 * Send email via Resend API
 */
function sendEmailViaResend($to, $fromEmail, $fromName, $subject, $body) {
    if (!RESEND_API_KEY) {
        error_log('Resend API key not configured');
        return false;
    }

    $data = [
        'from' => $fromName . ' <' . $fromEmail . '>',
        'to' => [$to],
        'subject' => $subject,
        'text' => $body
    ];

    $ch = curl_init('https://api.resend.com/emails');
    curl_setopt_array($ch, [
        CURLOPT_HTTPHEADER => [
            'Authorization: Bearer ' . RESEND_API_KEY,
            'Content-Type: application/json'
        ],
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_RETURNTRANSFER => true
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode < 200 || $httpCode >= 300) {
        error_log('Resend API error: HTTP ' . $httpCode . ' - ' . $response);
        return false;
    }

    return true;
}

/**
 * Send alert SMS to admin about new contact form submission
 */
function sendAdminAlert($name, $email, $phone, $need, $contactMethod, $organization = '', $eventDate = '') {
    if (!TWILIO_ACCOUNT_SID || !TWILIO_AUTH_TOKEN || !ADMIN_PHONE) {
        return;
    }

    try {
        // Format phone for display
        $phoneFormatted = $phone;
        if ($phone) {
            $digits = preg_replace('/\D/', '', $phone);
            if (strlen($digits) === 10) {
                $phoneFormatted = '(' . substr($digits, 0, 3) . ') ' . substr($digits, 3, 3) . '-' . substr($digits, 6);
            }
        }

        // Truncate message if too long
        $preview = strlen($need) > 80 ? substr($need, 0, 80) . '...' : $need;

        // Determine if this is an event inquiry
        $isEventInquiry = !empty($organization) || !empty($eventDate);

        $alertMessage = $isEventInquiry ? "New EVENT inquiry:\n" : "New contact form:\n";
        $alertMessage .= "Name: {$name}\n";
        if ($organization) $alertMessage .= "Org: {$organization}\n";
        if ($email) $alertMessage .= "Email: {$email}\n";
        if ($phone) $alertMessage .= "Phone: {$phoneFormatted}\n";
        if ($eventDate) $alertMessage .= "Event: {$eventDate}\n";
        $alertMessage .= "Method: " . ucfirst($contactMethod) . "\n\n";
        $alertMessage .= "\"{$preview}\"\n\n";
        $alertMessage .= "View: https://serendipitytechnology.com/main/chat_ui.php";

        $client = new Client(TWILIO_ACCOUNT_SID, TWILIO_AUTH_TOKEN);
        $client->messages->create(
            ADMIN_PHONE,
            [
                'from' => TWILIO_PHONE_NUMBER,
                'body' => $alertMessage
            ]
        );
    } catch (Exception $e) {
        error_log('Failed to send admin alert for contact form: ' . $e->getMessage());
    }
}

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
$organization = trim($_POST['organization'] ?? '');
$event_date = trim($_POST['event_date'] ?? '');

if (empty($name) || empty($need)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
    exit;
}

// Validate Turnstile CAPTCHA (if configured)
$turnstileToken = $_POST['cf-turnstile-response'] ?? '';
if (TURNSTILE_SECRET_KEY && !validateTurnstile($turnstileToken)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'CAPTCHA verification failed. Please try again.']);
    exit;
}

// Compose message
$message = "Name: $name\n";
$message .= $organization ? "Organization: $organization\n" : '';
$message .= $email ? "Email: $email\n" : '';
$message .= $phone ? "Phone: $phone\n" : '';
$message .= $event_date ? "Event Date: $event_date\n" : '';
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

    // Always send admin SMS alert for form submissions
    sendAdminAlert($name, $email, $phone, $need, $contact_method, $organization, $event_date);

    // Use send subdomain for Resend email delivery
    $fromEmail = 'contact@send.serendipitytechnology.com';
    if (sendEmailViaResend($to, $fromEmail, 'Serendipity Technology', $subject, $message)) {
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

        // Save to messages data store (appears in chat UI)
        addMessage([
            'from' => TWILIO_PHONE_NUMBER,
            'to' => $phone,
            'body' => $message,
            'timestamp' => time(),
            'direction' => 'outbound'
        ]);

        // Send admin SMS alert
        sendAdminAlert($name, $email, $rawPhone, $need, $contact_method, $organization, $event_date);

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
