<?php
/**
 * Voicemails API
 * GET - List voicemails
 * POST - Mark voicemail as read
 */

require_once __DIR__ . '/../auth.php';
require_once __DIR__ . '/../data.php';

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

    // Get voicemails for a specific number
    if ($phone) {
        $voicemails = getVoicemailsForNumber($phone);
        echo json_encode([
            'status' => 'ok',
            'phone' => $phone,
            'voicemails' => $voicemails
        ]);
        return;
    }

    // Get all voicemails
    $voicemails = getVoicemails();

    // Sort by created_at descending
    usort($voicemails, function($a, $b) {
        return ($b['created_at'] ?? 0) - ($a['created_at'] ?? 0);
    });

    echo json_encode([
        'status' => 'ok',
        'voicemails' => $voicemails
    ]);
}

function handlePost() {
    $input = json_decode(file_get_contents('php://input'), true);
    if (!$input) {
        $input = $_POST;
    }

    $action = $input['action'] ?? '';
    $id = $input['id'] ?? '';

    if ($action === 'mark_read' && $id) {
        $success = markVoicemailRead($id);
        echo json_encode([
            'status' => $success ? 'ok' : 'error',
            'message' => $success ? 'Voicemail marked as read' : 'Voicemail not found'
        ]);
        return;
    }

    http_response_code(400);
    echo json_encode(['error' => 'Invalid action']);
}
