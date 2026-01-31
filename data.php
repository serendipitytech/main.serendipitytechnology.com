<?php
/**
 * Data access layer
 * Handles reading/writing messages and voicemails to JSON storage
 */

define('DATA_DIR', __DIR__ . '/data');
define('MESSAGES_FILE', DATA_DIR . '/messages.json');
define('VOICEMAILS_FILE', DATA_DIR . '/voicemails.json');

/**
 * Ensure data directory exists
 */
function initDataDir() {
    if (!is_dir(DATA_DIR)) {
        mkdir(DATA_DIR, 0755, true);
    }
}

/**
 * Read all messages
 * @return array
 */
function getMessages() {
    if (!file_exists(MESSAGES_FILE)) {
        return [];
    }

    $content = file_get_contents(MESSAGES_FILE);
    $data = json_decode($content, true);

    return is_array($data) ? $data : [];
}

/**
 * Save all messages
 * @param array $messages
 * @return bool
 */
function saveMessages($messages) {
    initDataDir();
    return file_put_contents(
        MESSAGES_FILE,
        json_encode($messages, JSON_PRETTY_PRINT),
        LOCK_EX
    ) !== false;
}

/**
 * Add a new message
 * @param array $message
 * @return array The saved message with ID
 */
function addMessage($message) {
    $messages = getMessages();

    // Generate ID
    $message['id'] = uniqid('msg_');
    $message['created_at'] = time();

    // Add read status for inbound messages
    if (($message['direction'] ?? '') === 'inbound') {
        $message['read'] = false;
    }

    $messages[] = $message;
    saveMessages($messages);

    return $message;
}

/**
 * Mark messages as read for a given phone number
 * @param string $phoneNumber
 * @return int Number of messages marked as read
 */
function markMessagesRead($phoneNumber) {
    $messages = getMessages();
    $count = 0;

    foreach ($messages as &$msg) {
        if (isset($msg['read']) && $msg['read'] === false) {
            if ($msg['from'] === $phoneNumber || $msg['to'] === $phoneNumber) {
                $msg['read'] = true;
                $count++;
            }
        }
    }

    if ($count > 0) {
        saveMessages($messages);
    }

    return $count;
}

/**
 * Delete all messages for a specific phone number (conversation)
 * @param string $phoneNumber
 * @return int Number of messages deleted
 */
function deleteConversation($phoneNumber) {
    $messages = getMessages();
    $twilioNumber = TWILIO_PHONE_NUMBER;
    $originalCount = count($messages);

    $messages = array_values(array_filter($messages, function($msg) use ($phoneNumber, $twilioNumber) {
        $isMatch = ($msg['from'] === $twilioNumber && $msg['to'] === $phoneNumber) ||
                   ($msg['to'] === $twilioNumber && $msg['from'] === $phoneNumber);
        return !$isMatch;
    }));

    saveMessages($messages);
    return $originalCount - count($messages);
}

/**
 * Get messages for a specific phone number (conversation)
 * @param string $phoneNumber
 * @return array
 */
function getConversation($phoneNumber) {
    $messages = getMessages();
    $twilioNumber = TWILIO_PHONE_NUMBER;

    return array_values(array_filter($messages, function($msg) use ($phoneNumber, $twilioNumber) {
        return ($msg['from'] === $twilioNumber && $msg['to'] === $phoneNumber) ||
               ($msg['to'] === $twilioNumber && $msg['from'] === $phoneNumber);
    }));
}

/**
 * Get all unique phone numbers (contacts) with last message info
 * @return array
 */
function getContacts() {
    $messages = getMessages();
    $twilioNumber = TWILIO_PHONE_NUMBER;
    $contacts = [];

    foreach ($messages as $msg) {
        // Determine the external contact
        $contact = ($msg['from'] === $twilioNumber) ? $msg['to'] : $msg['from'];
        if ($contact === $twilioNumber) continue;

        if (!isset($contacts[$contact])) {
            $contacts[$contact] = [
                'phone' => $contact,
                'last_message' => $msg['body'] ?? '',
                'last_timestamp' => $msg['timestamp'] ?? $msg['created_at'] ?? 0,
                'unread_count' => 0
            ];
        }

        // Update with latest message
        $timestamp = $msg['timestamp'] ?? $msg['created_at'] ?? 0;
        if ($timestamp >= $contacts[$contact]['last_timestamp']) {
            $contacts[$contact]['last_message'] = $msg['body'] ?? '';
            $contacts[$contact]['last_timestamp'] = $timestamp;
        }

        // Count unread inbound messages
        if (isset($msg['read']) && $msg['read'] === false && $msg['from'] === $contact) {
            $contacts[$contact]['unread_count']++;
        }
    }

    // Sort by last message timestamp (newest first)
    usort($contacts, function($a, $b) {
        return $b['last_timestamp'] - $a['last_timestamp'];
    });

    return array_values($contacts);
}

/**
 * Read all voicemails
 * @return array
 */
function getVoicemails() {
    if (!file_exists(VOICEMAILS_FILE)) {
        return [];
    }

    $content = file_get_contents(VOICEMAILS_FILE);
    $data = json_decode($content, true);

    return is_array($data) ? $data : [];
}

/**
 * Save all voicemails
 * @param array $voicemails
 * @return bool
 */
function saveVoicemails($voicemails) {
    initDataDir();
    return file_put_contents(
        VOICEMAILS_FILE,
        json_encode($voicemails, JSON_PRETTY_PRINT),
        LOCK_EX
    ) !== false;
}

/**
 * Add a new voicemail
 * @param array $voicemail
 * @return array The saved voicemail with ID
 */
function addVoicemail($voicemail) {
    $voicemails = getVoicemails();

    // Generate ID
    $voicemail['id'] = uniqid('vm_');
    $voicemail['created_at'] = time();
    $voicemail['read'] = false;

    $voicemails[] = $voicemail;
    saveVoicemails($voicemails);

    return $voicemail;
}

/**
 * Mark a voicemail as read
 * @param string $id
 * @return bool
 */
function markVoicemailRead($id) {
    $voicemails = getVoicemails();

    foreach ($voicemails as &$vm) {
        if ($vm['id'] === $id) {
            $vm['read'] = true;
            saveVoicemails($voicemails);
            return true;
        }
    }

    return false;
}

/**
 * Get voicemails for a specific phone number
 * @param string $phoneNumber
 * @return array
 */
function getVoicemailsForNumber($phoneNumber) {
    $voicemails = getVoicemails();

    return array_values(array_filter($voicemails, function($vm) use ($phoneNumber) {
        return $vm['from'] === $phoneNumber;
    }));
}

/**
 * Migrate data from old sms_log.json format
 * @param string $oldLogPath
 * @return int Number of messages migrated
 */
function migrateFromSmsLog($oldLogPath) {
    if (!file_exists($oldLogPath)) {
        return 0;
    }

    $content = file_get_contents($oldLogPath);
    $lines = explode("\n", trim($content));
    $count = 0;

    foreach ($lines as $line) {
        if (empty($line)) continue;

        $msg = json_decode($line, true);
        if (!$msg) continue;

        // Determine direction if not set
        if (!isset($msg['direction'])) {
            $msg['direction'] = ($msg['from'] === TWILIO_PHONE_NUMBER) ? 'outbound' : 'inbound';
        }

        addMessage($msg);
        $count++;
    }

    return $count;
}
