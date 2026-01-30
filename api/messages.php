<?php
/**
 * Messages API
 * GET - List contacts or conversation
 * POST - Send a new message
 */

require_once __DIR__ . '/../auth.php';
require_once __DIR__ . '/../data.php';
require_once __DIR__ . '/../vendor/twilio/sdk/src/Twilio/autoload.php';

use Twilio\Rest\Client;

// Require authentication
requireAuthApi();

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        handleGet();
        break;
    case 'POST':
        handlePost();
        break;
    default:
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
}

function handleGet() {
    $phone = $_GET['phone'] ?? null;
    $action = $_GET['action'] ?? null;

    // Mark messages as read
    if ($action === 'mark_read' && $phone) {
        $count = markMessagesRead($phone);
        echo json_encode(['status' => 'ok', 'marked_read' => $count]);
        return;
    }

    // Get conversation for a specific number
    if ($phone) {
        $messages = getConversation($phone);
        echo json_encode([
            'status' => 'ok',
            'phone' => $phone,
            'messages' => $messages
        ]);
        return;
    }

    // Get all contacts
    $contacts = getContacts();
    echo json_encode([
        'status' => 'ok',
        'contacts' => $contacts
    ]);
}

function handlePost() {
    $input = json_decode(file_get_contents('php://input'), true);
    if (!$input) {
        // Fall back to form data
        $input = $_POST;
    }

    $to = $input['to'] ?? '';
    $body = $input['body'] ?? '';

    if (empty($to) || empty($body)) {
        http_response_code(400);
        echo json_encode(['error' => 'Missing required fields: to, body']);
        return;
    }

    // Validate Twilio config
    if (!TWILIO_ACCOUNT_SID || !TWILIO_AUTH_TOKEN || !TWILIO_PHONE_NUMBER) {
        http_response_code(500);
        echo json_encode(['error' => 'Twilio not configured']);
        return;
    }

    try {
        // Send via Twilio
        $client = new Client(TWILIO_ACCOUNT_SID, TWILIO_AUTH_TOKEN);
        $client->messages->create($to, [
            'from' => TWILIO_PHONE_NUMBER,
            'body' => $body
        ]);

        // Save to data store
        $message = addMessage([
            'from' => TWILIO_PHONE_NUMBER,
            'to' => $to,
            'body' => $body,
            'timestamp' => time(),
            'direction' => 'outbound'
        ]);

        echo json_encode([
            'status' => 'ok',
            'message' => $message
        ]);

    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to send: ' . $e->getMessage()]);
    }
}
