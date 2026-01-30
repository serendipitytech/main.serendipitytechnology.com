<?php
/**
 * Unified Inbox Dashboard
 * SMS conversations and voicemails in one interface
 * Protected by session authentication
 */

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/data.php';

// Require login
requireAuth();

$twilioNumber = TWILIO_PHONE_NUMBER;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Unified Inbox - Serendipity Technology</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root {
      --brand-blue: #4FC4F0;
      --brand-orange: #F7B06A;
      --brand-charcoal: #1F2937;
    }
    .unread-badge {
      background-color: var(--brand-orange);
      color: white;
      font-size: 0.7rem;
      min-width: 1.25rem;
      height: 1.25rem;
      border-radius: 9999px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 0 0.35rem;
    }
    .urgency-high { color: #DC2626; }
    .urgency-medium { color: #F59E0B; }
    .urgency-low { color: #10B981; }
    .tab-active {
      border-bottom: 2px solid var(--brand-blue);
      color: var(--brand-blue);
    }
  </style>
</head>
<body class="bg-gray-100">

<div class="h-screen flex flex-col">
  <!-- Header -->
  <div class="bg-white border-b px-4 py-2 flex items-center justify-between">
    <div class="flex items-center gap-3">
      <img src="img/logo_sm.png" alt="Logo" class="h-8">
      <span class="font-bold text-gray-800">Unified Inbox</span>
    </div>
    <div class="flex items-center gap-4">
      <span id="totalUnread" class="text-sm text-gray-500"></span>
      <a href="login.php?logout=1" class="text-sm text-gray-500 hover:text-gray-700">Logout</a>
    </div>
  </div>

  <div class="flex-1 flex overflow-hidden">
    <!-- Sidebar -->
    <div class="w-1/3 bg-white border-r flex flex-col">
      <!-- Tabs -->
      <div class="flex border-b">
        <button id="tabSms" class="flex-1 py-3 text-sm font-medium tab-active" onclick="switchTab('sms')">
          SMS <span id="smsUnreadBadge" class="unread-badge ml-1 hidden">0</span>
        </button>
        <button id="tabVoicemail" class="flex-1 py-3 text-sm font-medium text-gray-500 hover:text-gray-700" onclick="switchTab('voicemail')">
          Voicemail <span id="vmUnreadBadge" class="unread-badge ml-1 hidden">0</span>
        </button>
      </div>

      <!-- Contact/Voicemail List -->
      <div class="flex-1 overflow-y-auto">
        <ul id="contactList" class="divide-y divide-gray-200">
          <!-- Contacts will be populated here -->
        </ul>
        <ul id="voicemailList" class="divide-y divide-gray-200 hidden">
          <!-- Voicemails will be populated here -->
        </ul>
      </div>
    </div>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col">
      <!-- SMS View -->
      <div id="smsView" class="flex-1 flex flex-col">
        <div class="flex-1 overflow-y-auto p-4" id="messageList">
          <p class="text-gray-400 text-center mt-10">Select a conversation</p>
        </div>

        <form id="messageForm" class="flex p-4 bg-white border-t">
          <input type="text" id="messageInput" name="body" placeholder="Your message..." class="flex-1 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#4FC4F0]" required />
          <button type="submit" class="ml-2 bg-[#4FC4F0] hover:bg-[#3ab0dc] text-white px-4 py-2 rounded transition-colors">Send</button>
        </form>
      </div>

      <!-- Voicemail View -->
      <div id="voicemailView" class="flex-1 flex flex-col hidden">
        <div class="flex-1 overflow-y-auto p-4" id="voicemailDetail">
          <p class="text-gray-400 text-center mt-10">Select a voicemail</p>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
const twilioNumber = '<?php echo $twilioNumber; ?>';
let contacts = [];
let voicemails = [];
let currentTab = 'sms';
let currentPhone = '';
let currentVoicemailId = '';

// Format phone number for display
function formatPhone(number) {
  if (!number) return '';
  const digits = number.replace(/\D/g, '');
  if (digits.length === 11 && digits.startsWith('1')) {
    return `(${digits.slice(1,4)}) ${digits.slice(4,7)}-${digits.slice(7)}`;
  }
  if (digits.length === 10) {
    return `(${digits.slice(0,3)}) ${digits.slice(3,6)}-${digits.slice(6)}`;
  }
  return number;
}

// Format timestamp
function formatTime(timestamp) {
  const date = new Date(timestamp * 1000);
  const now = new Date();
  const diff = now - date;

  if (diff < 86400000) { // Less than 24 hours
    return date.toLocaleTimeString('en-US', { hour: 'numeric', minute: '2-digit' });
  } else if (diff < 604800000) { // Less than 7 days
    return date.toLocaleDateString('en-US', { weekday: 'short' });
  }
  return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
}

// Switch between SMS and Voicemail tabs
function switchTab(tab) {
  currentTab = tab;

  document.getElementById('tabSms').classList.toggle('tab-active', tab === 'sms');
  document.getElementById('tabSms').classList.toggle('text-gray-500', tab !== 'sms');
  document.getElementById('tabVoicemail').classList.toggle('tab-active', tab === 'voicemail');
  document.getElementById('tabVoicemail').classList.toggle('text-gray-500', tab !== 'voicemail');

  document.getElementById('contactList').classList.toggle('hidden', tab !== 'sms');
  document.getElementById('voicemailList').classList.toggle('hidden', tab !== 'voicemail');
  document.getElementById('smsView').classList.toggle('hidden', tab !== 'sms');
  document.getElementById('voicemailView').classList.toggle('hidden', tab !== 'voicemail');
}

// Load contacts from API
async function loadContacts() {
  try {
    const res = await fetch('api/messages.php');
    const data = await res.json();

    if (data.status === 'ok') {
      contacts = data.contacts || [];
      renderContactList();
      updateUnreadBadges();
    }
  } catch (err) {
    console.error('Failed to load contacts:', err);
  }
}

// Render contact list
function renderContactList() {
  const list = document.getElementById('contactList');
  list.innerHTML = '';

  if (contacts.length === 0) {
    list.innerHTML = '<li class="p-4 text-gray-400 text-center">No conversations yet</li>';
    return;
  }

  contacts.forEach(contact => {
    const li = document.createElement('li');
    li.className = 'p-4 cursor-pointer hover:bg-gray-50 transition-colors';
    if (contact.phone === currentPhone) {
      li.classList.add('bg-blue-50', 'border-l-4', 'border-[#4FC4F0]');
    }

    const preview = contact.last_message ?
      (contact.last_message.length > 40 ? contact.last_message.slice(0, 40) + '...' : contact.last_message) :
      '';

    li.innerHTML = `
      <div class="flex justify-between items-start">
        <div class="flex-1 min-w-0">
          <div class="flex items-center gap-2">
            <span class="font-medium text-gray-900">${formatPhone(contact.phone)}</span>
            ${contact.unread_count > 0 ? `<span class="unread-badge">${contact.unread_count}</span>` : ''}
          </div>
          <p class="text-sm text-gray-500 truncate mt-1">${preview}</p>
        </div>
        <span class="text-xs text-gray-400 ml-2">${formatTime(contact.last_timestamp)}</span>
      </div>
    `;

    li.onclick = () => selectContact(contact.phone);
    list.appendChild(li);
  });
}

// Select a contact and load conversation
async function selectContact(phone) {
  currentPhone = phone;
  renderContactList();

  const list = document.getElementById('messageList');
  list.innerHTML = '<p class="text-gray-400 text-center mt-10">Loading...</p>';

  try {
    // Mark messages as read
    await fetch(`api/messages.php?phone=${encodeURIComponent(phone)}&action=mark_read`);

    // Load conversation
    const res = await fetch(`api/messages.php?phone=${encodeURIComponent(phone)}`);
    const data = await res.json();

    if (data.status === 'ok') {
      renderMessages(data.messages || []);

      // Update contact's unread count locally
      const contact = contacts.find(c => c.phone === phone);
      if (contact) {
        contact.unread_count = 0;
        renderContactList();
        updateUnreadBadges();
      }
    }
  } catch (err) {
    console.error('Failed to load conversation:', err);
    list.innerHTML = '<p class="text-red-400 text-center mt-10">Failed to load messages</p>';
  }
}

// Render messages in conversation view
function renderMessages(messages) {
  const list = document.getElementById('messageList');
  list.innerHTML = '';

  if (messages.length === 0) {
    list.innerHTML = '<p class="text-gray-400 text-center mt-10">No messages in this conversation</p>';
    return;
  }

  messages.forEach(msg => {
    const div = document.createElement('div');
    const isOutbound = msg.direction === 'outbound' || msg.from === twilioNumber;

    div.className = `mb-3 max-w-[75%] ${isOutbound ? 'ml-auto' : ''}`;
    div.innerHTML = `
      <div class="p-3 rounded-lg ${isOutbound ? 'bg-[#4FC4F0] text-white' : 'bg-gray-200 text-gray-900'}">
        ${msg.body || ''}
      </div>
      <div class="text-xs text-gray-400 mt-1 ${isOutbound ? 'text-right' : ''}">${formatTime(msg.timestamp || msg.created_at)}</div>
    `;

    list.appendChild(div);
  });

  list.scrollTop = list.scrollHeight;
}

// Load voicemails from API
async function loadVoicemails() {
  try {
    const res = await fetch('api/voicemails.php');
    const data = await res.json();

    if (data.status === 'ok') {
      voicemails = data.voicemails || [];
      renderVoicemailList();
      updateUnreadBadges();
    }
  } catch (err) {
    console.error('Failed to load voicemails:', err);
  }
}

// Render voicemail list
function renderVoicemailList() {
  const list = document.getElementById('voicemailList');
  list.innerHTML = '';

  if (voicemails.length === 0) {
    list.innerHTML = '<li class="p-4 text-gray-400 text-center">No voicemails yet</li>';
    return;
  }

  voicemails.forEach(vm => {
    const li = document.createElement('li');
    li.className = 'p-4 cursor-pointer hover:bg-gray-50 transition-colors';
    if (vm.id === currentVoicemailId) {
      li.classList.add('bg-blue-50', 'border-l-4', 'border-[#4FC4F0]');
    }

    const urgencyClass = vm.urgency === 'HIGH' ? 'urgency-high' : vm.urgency === 'MEDIUM' ? 'urgency-medium' : 'urgency-low';
    const urgencyIcon = vm.urgency === 'HIGH' ? '🔴' : vm.urgency === 'MEDIUM' ? '🟡' : '🟢';

    li.innerHTML = `
      <div class="flex justify-between items-start">
        <div class="flex-1 min-w-0">
          <div class="flex items-center gap-2">
            <span class="font-medium text-gray-900">${formatPhone(vm.from)}</span>
            ${!vm.read ? '<span class="unread-badge">New</span>' : ''}
          </div>
          <div class="flex items-center gap-2 mt-1">
            <span class="${urgencyClass} text-sm">${urgencyIcon} ${vm.urgency || 'LOW'}</span>
            <span class="text-sm text-gray-500">${vm.category || 'General'}</span>
          </div>
          <p class="text-sm text-gray-600 mt-1 line-clamp-2">${vm.summary || vm.transcription || ''}</p>
        </div>
        <span class="text-xs text-gray-400 ml-2">${formatTime(vm.timestamp || vm.created_at)}</span>
      </div>
    `;

    li.onclick = () => selectVoicemail(vm);
    list.appendChild(li);
  });
}

// Select a voicemail and show details
async function selectVoicemail(vm) {
  currentVoicemailId = vm.id;
  renderVoicemailList();

  // Mark as read
  if (!vm.read) {
    try {
      await fetch('api/voicemails.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'mark_read', id: vm.id })
      });
      vm.read = true;
      renderVoicemailList();
      updateUnreadBadges();
    } catch (err) {
      console.error('Failed to mark voicemail as read:', err);
    }
  }

  const detail = document.getElementById('voicemailDetail');
  const urgencyClass = vm.urgency === 'HIGH' ? 'urgency-high' : vm.urgency === 'MEDIUM' ? 'urgency-medium' : 'urgency-low';
  const urgencyIcon = vm.urgency === 'HIGH' ? '🔴' : vm.urgency === 'MEDIUM' ? '🟡' : '🟢';

  detail.innerHTML = `
    <div class="max-w-2xl mx-auto">
      <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-start mb-4">
          <div>
            <h3 class="text-lg font-semibold text-gray-900">${formatPhone(vm.from)}</h3>
            <p class="text-sm text-gray-500">${new Date((vm.timestamp || vm.created_at) * 1000).toLocaleString()}</p>
          </div>
          <div class="text-right">
            <span class="${urgencyClass} font-medium">${urgencyIcon} ${vm.urgency || 'LOW'}</span>
            <p class="text-sm text-gray-500">${vm.category || 'General'}</p>
          </div>
        </div>

        ${vm.recording_url ? `
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-2">Recording</label>
          <audio controls class="w-full">
            <source src="${vm.recording_url}" type="audio/mpeg">
            Your browser does not support audio playback.
          </audio>
          <p class="text-xs text-gray-400 mt-1">${vm.duration ? vm.duration + ' seconds' : ''}</p>
        </div>
        ` : ''}

        ${vm.summary ? `
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-2">AI Summary</label>
          <p class="text-gray-600 bg-gray-50 p-3 rounded">${vm.summary}</p>
        </div>
        ` : ''}

        ${vm.transcription ? `
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-2">Transcription</label>
          <p class="text-gray-600 bg-gray-50 p-3 rounded">${vm.transcription}</p>
        </div>
        ` : ''}

        ${vm.suggested_response ? `
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-2">Suggested Response</label>
          <p class="text-gray-600 bg-blue-50 p-3 rounded border border-blue-100">${vm.suggested_response}</p>
          <button onclick="sendSuggestedResponse('${vm.from}', \`${vm.suggested_response.replace(/`/g, '\\`')}\`)"
                  class="mt-2 bg-[#4FC4F0] hover:bg-[#3ab0dc] text-white px-4 py-2 rounded text-sm transition-colors">
            Send This Response
          </button>
        </div>
        ` : ''}

        <div class="mt-6 pt-4 border-t">
          <button onclick="startSmsConversation('${vm.from}')"
                  class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded text-sm transition-colors">
            Open SMS Conversation
          </button>
        </div>
      </div>
    </div>
  `;
}

// Send suggested response
async function sendSuggestedResponse(phone, message) {
  try {
    const res = await fetch('api/messages.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ to: phone, body: message })
    });

    if (res.ok) {
      alert('Response sent successfully!');
      startSmsConversation(phone);
    } else {
      const data = await res.json();
      alert('Failed to send: ' + (data.error || 'Unknown error'));
    }
  } catch (err) {
    alert('Error: ' + err.message);
  }
}

// Switch to SMS tab and open conversation
function startSmsConversation(phone) {
  switchTab('sms');
  selectContact(phone);
}

// Update unread badges
function updateUnreadBadges() {
  const smsUnread = contacts.reduce((sum, c) => sum + (c.unread_count || 0), 0);
  const vmUnread = voicemails.filter(v => !v.read).length;
  const total = smsUnread + vmUnread;

  const smsBadge = document.getElementById('smsUnreadBadge');
  const vmBadge = document.getElementById('vmUnreadBadge');
  const totalEl = document.getElementById('totalUnread');

  if (smsUnread > 0) {
    smsBadge.textContent = smsUnread;
    smsBadge.classList.remove('hidden');
  } else {
    smsBadge.classList.add('hidden');
  }

  if (vmUnread > 0) {
    vmBadge.textContent = vmUnread;
    vmBadge.classList.remove('hidden');
  } else {
    vmBadge.classList.add('hidden');
  }

  totalEl.textContent = total > 0 ? `${total} unread` : '';
}

// Send SMS message
document.getElementById('messageForm').addEventListener('submit', async function(e) {
  e.preventDefault();

  const input = document.getElementById('messageInput');
  const message = input.value.trim();

  if (!currentPhone || !message) {
    alert('Select a conversation and enter a message');
    return;
  }

  try {
    const res = await fetch('api/messages.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ to: currentPhone, body: message })
    });

    if (res.ok) {
      input.value = '';
      // Reload conversation
      selectContact(currentPhone);
      // Reload contacts to update last message
      loadContacts();
    } else {
      const data = await res.json();
      alert('Failed to send: ' + (data.error || 'Unknown error'));
    }
  } catch (err) {
    alert('Error: ' + err.message);
  }
});

// Initial load
loadContacts();
loadVoicemails();

// Poll every 5 seconds
setInterval(() => {
  loadContacts();
  loadVoicemails();
}, 5000);
</script>

</body>
</html>
