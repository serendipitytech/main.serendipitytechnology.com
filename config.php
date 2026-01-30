<?php
/**
 * Configuration loader
 * Loads environment variables from .env file and provides helper functions
 */

// Load .env file
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

/**
 * Get an environment variable with optional default
 */
function env($key, $default = null) {
    $value = getenv($key);
    return $value !== false ? $value : $default;
}

// Twilio configuration
define('TWILIO_ACCOUNT_SID', env('TWILIO_ACCOUNT_SID'));
define('TWILIO_AUTH_TOKEN', env('TWILIO_AUTH_TOKEN'));
define('TWILIO_PHONE_NUMBER', env('TWILIO_PHONE_NUMBER'));

// Dashboard authentication
define('DASHBOARD_PASSWORD', env('DASHBOARD_PASSWORD'));

// Webhook secret for n8n integration
define('WEBHOOK_SECRET', env('WEBHOOK_SECRET'));

// Contact email
define('CONTACT_EMAIL', env('CONTACT_EMAIL', 'troy@serendipitytech.net'));
