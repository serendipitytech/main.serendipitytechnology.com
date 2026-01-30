<?php
/**
 * Migration script
 * Migrates data from old sms_log.json to new data layer
 *
 * Run this once: php migrate.php
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/data.php';

$oldLogPath = __DIR__ . '/sms_log.json';

if (!file_exists($oldLogPath)) {
    echo "No sms_log.json found. Nothing to migrate.\n";
    exit(0);
}

// Check if already migrated
$existingMessages = getMessages();
if (count($existingMessages) > 0) {
    echo "Data already exists in new format. Skipping migration.\n";
    echo "If you want to re-migrate, delete data/messages.json first.\n";
    exit(0);
}

echo "Migrating from sms_log.json...\n";

$count = migrateFromSmsLog($oldLogPath);

echo "Migrated $count messages.\n";
echo "You can now rename or delete sms_log.json\n";
echo "New data is stored in data/messages.json\n";
