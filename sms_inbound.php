<?php
// sms_inbound.php
file_put_contents("sms_log.json", json_encode([
    'from' => $_POST['From'] ?? '',
    'to'   => $_POST['To'] ?? '',
    'body' => $_POST['Body'] ?? '',
    'timestamp' => time() // Use UNIX timestamp for consistency
]) . PHP_EOL, FILE_APPEND);

header("Content-Type: text/plain");
//echo "OK";