<?php
/**
 * Voicemail Webhook
 * Receives voicemail data from n8n workflow
 *
 * Expected payload:
 * {
 *   "from": "+13868531580",
 *   "recording_url": "https://api.twilio.com/...",
 *   "transcription": "Hi, this is...",
 *   "duration": 30,
 *   "urgency": "MEDIUM",
 *   "category": "Sales Call",
 *   "summary": "AI summary of the voicemail",
 *   "suggested_response": "AI suggested response"
 * }
 */

require_once __DIR__ . '/../auth.php';
require_once __DIR__ . '/../data.php';

header('Content-Type: application/json');

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// Validate webhook secret
if (!validateWebhookSecret()) {
    http_response_code(403);
    echo json_encode(['error' => 'Invalid webhook secret']);
    exit;
}

// Parse input
$input = json_decode(file_get_contents('php://input'), true);
if (!$input) {
    $input = $_POST;
}

// Validate required fields
$from = $input['from'] ?? '';
if (empty($from)) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required field: from']);
    exit;
}

// Build voicemail record
$voicemail = [
    'from' => $from,
    'to' => TWILIO_PHONE_NUMBER,
    'recording_url' => $input['recording_url'] ?? '',
    'transcription' => $input['transcription'] ?? '',
    'duration' => intval($input['duration'] ?? 0),
    'urgency' => $input['urgency'] ?? 'LOW',
    'category' => $input['category'] ?? 'General',
    'summary' => $input['summary'] ?? '',
    'suggested_response' => $input['suggested_response'] ?? '',
    'timestamp' => $input['timestamp'] ?? time()
];

// Save voicemail
$saved = addVoicemail($voicemail);

echo json_encode([
    'status' => 'ok',
    'voicemail' => $saved
]);
