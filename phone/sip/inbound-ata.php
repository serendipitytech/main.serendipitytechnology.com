<?php
// Inbound handler for Twilio numbers that ring a registered SIP endpoint on
// serendipity.sip.twilio.com. voice agent, 2026-09-05.
//
// BEHAVIOUR
//   Known caller (VIP list)  -> ring the handset, fall through to voicemail if unanswered
//   Everyone else            -> straight to voicemail, the handset never rings
//
// CALLER ID NAME
//   Twilio allows an arbitrary alphanumeric callerId when dialling a <Sip> endpoint
//   (unlike PSTN dialling, which demands a real E.164 number), so a VIP's name is
//   sent as the caller ID and the ATA passes it to the analog handset. No whitespace
//   is permitted, so names here must stay single-word. Set $vipShowName = false to
//   send the real number instead and let the cordless base's own phonebook do the
//   name lookup.
header('Content-Type: text/xml; charset=utf-8');

$sipDomain = 'serendipity.sip.twilio.com';

// Twilio number -> SIP username to ring.
$routes = [
    '+15616220395' => 'atacordless',   // HT802 ATA + cordless handset, e911 registered
];

// Callers allowed to ring the handset. Everyone else goes straight to voicemail.
// The names here are documentation only, for whoever edits this list next; the
// handset gets the real number and does its own phonebook lookup for the name.
$vips = [
    '+15612224521' => 'Mom',
    '+14074436844' => 'Troy',
    '+15615962529' => 'Tammy',
];

$vipShowName = false;  // send the REAL NUMBER, not the name. See note above.
$timeout     = 25;     // seconds to ring the handset

// Same voicemail sink the 407-545-6070 Studio Flow uses.
$vmCallback = 'https://n8n.serendipitylabs.cloud/webhook/twilio-voicemail?source=serendipity';

function xml($s){ echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n" . $s; exit; }

// Voicemail block, used by both the "unknown caller" and "VIP did not answer" paths.
// Loop-guard 2026-09-24: <Record> with no action= defaults to re-POSTing this same
// URL when it finishes, and this script has no state, so a silent caller was being
// looped back into a brand-new voicemail() block over and over (observed: one 60s
// call produced 6 recordings / 6 SMS). action="...&recorded=1" plus the $recorded
// check below makes this a single-shot recording: once it comes back post-record,
// we go straight to goodbye+hangup instead of regenerating another Record.
function voicemail($prompt, $cb, $actionUrl) {
    return '<Say voice="Polly.Joanna">' . htmlspecialchars($prompt, ENT_QUOTES) . '</Say>'
         . '<Record maxLength="120" timeout="5" playBeep="true" transcribe="true" '
         . 'action="' . htmlspecialchars($actionUrl, ENT_QUOTES) . '" '
         . 'transcribeCallback="' . htmlspecialchars($cb, ENT_QUOTES) . '"/>'
         . '<Say voice="Polly.Joanna">We did not receive a recording. Goodbye.</Say>'
         . '<Hangup/>';
}

$to       = isset($_REQUEST['To'])       ? trim($_REQUEST['To'])       : '';
$from     = isset($_REQUEST['From'])     ? trim($_REQUEST['From'])     : '';
$recorded = isset($_REQUEST['recorded']) && $_REQUEST['recorded'] === '1';

// A '+' sent unencoded decodes to a space and would silently break the lookups.
// Twilio encodes correctly, but restore it rather than depend on that.
if ($to   !== '' && $to[0]   !== '+' && ctype_digit($to))   { $to   = '+' . $to;   }
if ($from !== '' && $from[0] !== '+' && ctype_digit($from)) { $from = '+' . $from; }

// Loop-guard: this is the Record verb's action= callback firing after a recording
// finished. Whatever caller/VIP branch we were on, stop here - do NOT regenerate
// another voicemail() block, or a silent caller loops forever (the original bug).
if ($recorded) {
    xml('<Response><Say voice="Polly.Joanna">Goodbye.</Say><Hangup/></Response>');
}

if (!isset($routes[$to])) {
    xml('<Response><Say voice="Polly.Joanna">This number is not currently in service.</Say><Hangup/></Response>');
}
$target = $routes[$to];

// Build this script's own URL with recorded=1 appended, so the Record verb's
// action= callback comes right back here and hits the loop-guard above instead
// of Twilio's default (re-POST current URL with no state, which was the bug).
$selfUrl = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '?recorded=1';

// Unknown caller: never ring the handset.
if (!isset($vips[$from])) {
    xml('<Response>'
      . voicemail('Thanks for calling. Please leave a message after the tone and we will get back to you.', $vmCallback, $selfUrl)
      . '</Response>');
}

// VIP: ring the handset, then voicemail if nobody picks up.
$callerId = $vipShowName ? $vips[$from] : $from;

xml('<Response>'
  . '<Dial answerOnBridge="true" timeout="' . (int)$timeout . '" '
  . 'callerId="' . htmlspecialchars($callerId, ENT_QUOTES) . '">'
  . '<Sip>sip:' . htmlspecialchars($target, ENT_QUOTES) . '@' . htmlspecialchars($sipDomain, ENT_QUOTES) . '</Sip>'
  . '</Dial>'
  . voicemail('Sorry, we could not reach anyone. Please leave a message after the tone.', $vmCallback, $selfUrl)
  . '</Response>');
