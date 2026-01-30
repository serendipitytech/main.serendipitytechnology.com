<?php
/**
 * SMS Chat Dashboard
 * Protected by session authentication
 */

require_once __DIR__ . '/auth.php';

// Require login
requireAuth();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SMS Dashboard - Serendipity Technology</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root {
      --brand-blue: #4FC4F0;
      --brand-orange: #F7B06A;
    }
  </style>
</head>
<body class="bg-gray-100">

<div class="h-screen flex flex-col">
  <!-- Header -->
  <div class="bg-white border-b px-4 py-2 flex items-center justify-between">
    <div class="flex items-center gap-3">
      <img src="img/logo_sm.png" alt="Logo" class="h-8">
      <span class="font-bold text-gray-800">SMS Dashboard</span>
    </div>
    <a href="login.php?logout=1" class="text-sm text-gray-500 hover:text-gray-700">Logout</a>
  </div>

  <div class="flex-1 flex overflow-hidden">
    <!-- Sidebar -->
    <div class="w-1/3 bg-white border-r overflow-y-auto">
      <h2 class="text-lg font-semibold p-4 border-b text-gray-700">Conversations</h2>
      <ul id="numberList" class="divide-y divide-gray-200">
        <!-- Numbers will be populated here -->
      </ul>
    </div>

    <!-- Chat Window -->
    <div class="flex-1 flex flex-col">
      <div class="flex-1 overflow-y-auto p-4" id="messageList">
        <p class="text-gray-400 text-center mt-10">Select a conversation</p>
      </div>

      <form id="messageForm" class="flex p-4 bg-white border-t">
        <input type="text" id="messageInput" name="body" placeholder="Your message..." class="flex-1 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#4FC4F0]" required />
        <button type="submit" class="ml-2 bg-[#4FC4F0] hover:bg-[#3ab0dc] text-white px-4 py-2 rounded transition-colors">Send</button>
      </form>
    </div>
  </div>
</div>

<script>
const smsLog = [];
const numberSet = new Set();
let currentNumber = "";
const yourTwilioNumber = '<?php echo TWILIO_PHONE_NUMBER; ?>';

async function loadMessages(initial = false) {
  try {
    const res = await fetch('sms_log.json');
    if (!res.ok) {
      console.error('Failed to load messages');
      return;
    }
    const text = await res.text();
    if (!text.trim()) return;

    const lines = text.trim().split('\n');
    smsLog.length = 0;

    lines.forEach(line => {
      try {
        const msg = JSON.parse(line);
        smsLog.push(msg);

        if (msg.from && msg.from !== yourTwilioNumber) numberSet.add(msg.from);
        if (msg.to && msg.to !== yourTwilioNumber) numberSet.add(msg.to);
      } catch {}
    });

    if (initial) {
      renderNumberList();
      if (numberSet.size > 0) {
        showMessages([...numberSet][0]);
      }
    } else if (currentNumber) {
      showMessages(currentNumber);
    }
  } catch (err) {
    console.error('Error loading messages:', err);
  }
}

function renderNumberList() {
  const list = document.getElementById('numberList');
  list.innerHTML = '';

  [...numberSet].forEach(number => {
    const li = document.createElement('li');
    li.textContent = formatPhone(number);
    li.dataset.number = number;
    li.className = 'p-4 cursor-pointer hover:bg-gray-100 transition-colors';
    if (number === currentNumber) {
      li.classList.add('bg-blue-50', 'border-l-4', 'border-[#4FC4F0]');
    }
    li.onclick = () => showMessages(number);
    list.appendChild(li);
  });
}

function formatPhone(number) {
  const digits = number.replace(/\D/g, '');
  if (digits.length === 11 && digits.startsWith('1')) {
    return `(${digits.slice(1,4)}) ${digits.slice(4,7)}-${digits.slice(7)}`;
  }
  return number;
}

function showMessages(number) {
  currentNumber = number;
  renderNumberList();

  const list = document.getElementById('messageList');
  list.innerHTML = '';

  const messages = smsLog.filter(msg =>
    (msg.from === yourTwilioNumber && msg.to === number) ||
    (msg.to === yourTwilioNumber && msg.from === number)
  );

  if (messages.length === 0) {
    list.innerHTML = '<p class="text-gray-400 text-center mt-10">No messages</p>';
    return;
  }

  messages.forEach(msg => {
    const div = document.createElement('div');
    const isIncoming = msg.from === number;
    div.className = `mb-2 p-3 rounded-lg max-w-xs ${
      isIncoming ? 'bg-gray-200 self-start' : 'bg-[#4FC4F0] text-white self-end ml-auto'
    }`;
    div.textContent = msg.body || '';
    list.appendChild(div);
  });

  list.scrollTop = list.scrollHeight;
}

document.getElementById("messageForm").addEventListener("submit", async function (e) {
  e.preventDefault();
  const input = document.getElementById("messageInput");
  const message = input.value.trim();

  if (!currentNumber || !message) {
    alert("Select a conversation and enter a message");
    return;
  }

  const timestamp = Math.floor(Date.now() / 1000);

  try {
    const res = await fetch("send_sms.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: new URLSearchParams({
        to: currentNumber,
        body: message,
      }),
    });

    if (!res.ok) {
      const data = await res.json();
      alert("Failed to send: " + (data.error || 'Unknown error'));
      return;
    }

    smsLog.push({
      from: yourTwilioNumber,
      to: currentNumber,
      body: message,
      timestamp,
      direction: 'outbound'
    });

    input.value = "";
    showMessages(currentNumber);

  } catch (err) {
    alert("Error: " + err.message);
  }
});

// Initial load
loadMessages(true);

// Poll every 5 seconds
setInterval(() => loadMessages(false), 5000);
</script>

</body>
</html>
