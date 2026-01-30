<?php
$messages = file("sms_log.json");
$messages = array_reverse($messages); // show most recent first
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SMS Chat</title>
  <link href="https://cdn.tailwindcss.com" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
  <h1 class="text-2xl font-bold mb-4">📬 SMS Chat Viewer</h1>

  <div class="space-y-4 bg-white p-4 rounded shadow max-w-xl mx-auto">
    <?php foreach ($messages as $msg): 
      $m = json_decode($msg, true); ?>
      <div class="border-b pb-2">
        <div class="text-xs text-gray-500"><?= htmlspecialchars($m['timestamp']) ?></div>
        <div class="text-sm"><strong><?= htmlspecialchars($m['from']) ?>:</strong> <?= htmlspecialchars($m['body']) ?></div>
      </div>
    <?php endforeach; ?>
  </div>

  <form action="send_sms.php" method="POST" class="mt-6 max-w-xl mx-auto bg-white p-4 rounded shadow space-y-2">
    <label class="block">
      <span class="text-gray-700">To:</span>
      <input type="tel" name="to" required placeholder="+15551234567" class="w-full border rounded px-2 py-1">
    </label>
    <label class="block">
      <span class="text-gray-700">Message:</span>
      <textarea name="message" required class="w-full border rounded px-2 py-1"></textarea>
    </label>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Send</button>
  </form>
</body>
</html>