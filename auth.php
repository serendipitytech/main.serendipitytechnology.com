<?php
/**
 * Authentication helpers
 * Simple session-based auth for single-user dashboard
 */

require_once __DIR__ . '/config.php';

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Check if user is authenticated
 */
function isAuthenticated() {
    return isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true;
}

/**
 * Attempt to log in with password
 */
function login($password) {
    if (!DASHBOARD_PASSWORD) {
        return false;
    }

    if (hash_equals(DASHBOARD_PASSWORD, $password)) {
        $_SESSION['authenticated'] = true;
        $_SESSION['login_time'] = time();
        return true;
    }

    return false;
}

/**
 * Log out the current user
 */
function logout() {
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }
    session_destroy();
}

/**
 * Require authentication - redirect to login if not authenticated
 */
function requireAuth() {
    if (!isAuthenticated()) {
        header('Location: login.php');
        exit;
    }
}

/**
 * Require authentication for API endpoints - return 401 if not authenticated
 */
function requireAuthApi() {
    if (!isAuthenticated()) {
        http_response_code(401);
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Unauthorized']);
        exit;
    }
}

/**
 * Validate Twilio webhook signature
 * @param string $url The full URL of the webhook endpoint
 * @return bool True if signature is valid
 */
function validateTwilioSignature($url) {
    if (!TWILIO_AUTH_TOKEN) {
        error_log('Twilio auth token not configured');
        return false;
    }

    $signature = $_SERVER['HTTP_X_TWILIO_SIGNATURE'] ?? '';
    if (empty($signature)) {
        error_log('Missing Twilio signature header');
        return false;
    }

    // Sort POST parameters and concatenate
    $data = $_POST;
    ksort($data);
    $dataString = $url;
    foreach ($data as $key => $value) {
        $dataString .= $key . $value;
    }

    // Generate expected signature
    $expectedSignature = base64_encode(hash_hmac('sha1', $dataString, TWILIO_AUTH_TOKEN, true));

    return hash_equals($expectedSignature, $signature);
}

/**
 * Validate webhook secret for n8n integration
 */
function validateWebhookSecret() {
    if (!WEBHOOK_SECRET) {
        return false;
    }

    $providedSecret = $_SERVER['HTTP_X_WEBHOOK_SECRET'] ?? $_GET['secret'] ?? '';
    return hash_equals(WEBHOOK_SECRET, $providedSecret);
}
