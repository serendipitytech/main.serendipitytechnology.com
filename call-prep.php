<?php
/**
 * Optional call-prep form. Public URL: serendipitytechnology.com/call-prep  (?ref=<label> prefills "Regarding").
 * Submits to the site-forms service (client_id=serendipity) which emails troy@serendipitytech.net.
 */
declare(strict_types=1);
header('X-Robots-Tag: noindex, nofollow');
$ref = isset($_GET['ref']) ? trim((string)$_GET['ref']) : '';
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<meta name="robots" content="noindex, nofollow">
<title>Quick call prep | Serendipity Technology</title>
<style>
:root{--ink:#16233c;--muted:#5b6b85;--card:#fff;--line:#e4e9f2;--blue:#00a2e8;--orange:#ffa645;}
*{box-sizing:border-box}
body{margin:0;min-height:100vh;font-family:Inter,-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;color:var(--ink);
  background:linear-gradient(160deg,#e7f1fc 0%,#eef2f7 46%,#f5f1ea 100%);display:flex;justify-content:center;padding:40px 18px;}
.wrap{width:100%;max-width:560px}
.logo{display:block;width:150px;margin:0 auto 18px}
h1{font-size:24px;font-weight:800;margin:0 0 6px;text-align:center;letter-spacing:-.02em}
.sub{color:var(--muted);font-size:15px;text-align:center;margin:0 0 22px;line-height:1.5}
.card{background:var(--card);border:1px solid var(--line);border-radius:16px;padding:24px;box-shadow:0 3px 12px rgba(20,40,80,.06)}
label{display:block;font-size:13px;font-weight:600;margin:16px 0 6px;color:#2a3a57}
label:first-child{margin-top:0}
input,textarea{width:100%;padding:11px 13px;border:1px solid var(--line);border-radius:10px;font:inherit;font-size:15px;color:var(--ink);background:#fbfcfe}
input:focus,textarea:focus{outline:none;border-color:var(--blue);box-shadow:0 0 0 3px rgba(0,162,232,.12)}
textarea{min-height:74px;resize:vertical}
.ref{background:#eef4fb;border:1px solid #d6e6f7;border-radius:10px;padding:10px 13px;font-size:14px;color:#2a4a72;margin-bottom:4px}
button{width:100%;margin-top:22px;padding:14px;border:none;border-radius:12px;background:linear-gradient(135deg,var(--blue),#0089c7);color:#fff;font-size:16px;font-weight:700;cursor:pointer}
button:disabled{opacity:.6;cursor:default}
.note{font-size:12px;color:var(--muted);text-align:center;margin-top:14px}
.ok{display:none;text-align:center;padding:14px 0}
.ok h2{margin:0 0 6px;font-size:20px}
.err{display:none;color:#b42318;font-size:14px;margin-top:12px;text-align:center}
</style>
</head>
<body>
<main class="wrap">
  <img class="logo" src="/img/logos/serendipity_stacked_vector.svg" alt="Serendipity Technology">
  <h1>Quick call prep</h1>
  <p class="sub">Totally optional. A couple of lines here just helps us make the most of our time together.</p>
  <div class="card">
    <form id="f">
      <?php if ($ref !== ''): ?><div class="ref">Regarding: <strong><?= htmlspecialchars($ref) ?></strong></div><?php endif; ?>
      <label>Your name</label><input name="name" required>
      <label>Your email</label><input type="email" name="email" required>
      <label>What's the main thing you'd like to get out of this call?</label><textarea name="goal"></textarea>
      <label>Any specific questions or topics you want to cover?</label><textarea name="questions"></textarea>
      <label>Anything helpful to share ahead of time? Links, docs, context.</label><textarea name="materials"></textarea>
      <button type="submit" id="b">Send it over</button>
      <div class="err" id="e">Something went wrong sending that. You can also just reply to the calendar invite. </div>
    </form>
    <div class="ok" id="ok"><h2>Got it, thank you.</h2><p class="sub" style="margin:0">Troy will have this before your call. See you then.</p></div>
    <p class="note">Serendipity Technology</p>
  </div>
</main>
<script>
const ref = <?= json_encode($ref) ?>;
document.getElementById('f').addEventListener('submit', async (ev)=>{
  ev.preventDefault();
  const b=document.getElementById('b'); b.disabled=true; b.textContent='Sending...';
  const fd=new FormData(ev.target); const body={client_id:'serendipity', regarding:ref};
  fd.forEach((v,k)=>body[k]=v);
  try{
    const r=await fetch('https://forms.serendipitylabs.cloud/v1/contact',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify(body)});
    if(!r.ok) throw new Error(r.status);
    document.getElementById('f').style.display='none';
    document.getElementById('ok').style.display='block';
  }catch(err){ b.disabled=false; b.textContent='Send it over'; document.getElementById('e').style.display='block'; }
});
</script>
</body>
</html>
