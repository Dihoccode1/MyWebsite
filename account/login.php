<?php /* login.php — Elegant e-commerce login (localStorage auth) */ ?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Đăng nhập</title>

  <!-- Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

  <style>
    :root{
      --bg:#f5f7fb;
      --card:#ffffff;
      --text:#111827;
      --muted:#6b7280;
      --line:#e5e7eb;
      --brand:#111;           /* màu chủ đạo (đen sang) */
      --radius:16px;
      --shadow-sm:0 6px 18px rgba(17,24,39,.08);
      --shadow-md:0 20px 50px rgba(17,24,39,.12);
      --ring: 0 0 0 4px rgba(17,17,17,.08);
    }

    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0;
      font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
      color:var(--text);
      background:
        radial-gradient(1200px 600px at 15% -10%, #e9eef6 0%, transparent 55%),
        radial-gradient(1000px 500px at 90% 110%, #edf1f8 0%, transparent 55%),
        var(--bg);
      display:flex; align-items:center; justify-content:center;
      padding:28px;
    }

    .back{
      position:fixed; top:18px; left:18px;
      display:inline-flex; align-items:center; gap:8px;
      font-size:14px; font-weight:600; color:#1a73e8; text-decoration:none;
      padding:8px 10px; border-radius:999px; background:#fff; border:1px solid var(--line);
      box-shadow: var(--shadow-sm);
      transition: filter .15s ease, transform .05s ease;
    }
    .back:hover{ filter:brightness(.98) }
    .back:active{ transform: translateY(1px) }

    .wrap{ width:100%; max-width: 420px }

    .card{
      background:var(--card);
      border:1px solid var(--line);
      border-radius:24px;
      box-shadow:var(--shadow-md);
      padding:28px 24px;
    }

    .brand{
      display:grid; place-items:center; margin-bottom:14px;
    }
    .brand .logo{
      width:88px; height:88px; border-radius:18px; overflow:hidden;
      border:1px solid var(--line); background:#fff; box-shadow:var(--shadow-sm);
      display:grid; place-items:center;
    }
    .brand .logo i{ font-size:38px; color:#111; opacity:.9 }

    .title{ text-align:center; margin:6px 0 4px; font-size:24px; font-weight:800; letter-spacing:.2px }
    .sub{ text-align:center; color:var(--muted); font-size:14px; margin-bottom:16px }

    .alert{
      display:none; margin:0 0 12px; padding:10px 12px;
      border-radius:12px; font-size:14px;
      background:#fdecea; color:#b71c1c; border:1px solid #f5c3c3;
    }

    .form{
      display:grid; gap:12px;
    }

    .field{
      position:relative; height:50px;
      border:1px solid var(--line); border-radius:12px; background:#fff;
      display:flex; align-items:center; padding:0 12px;
      transition:border-color .15s ease, box-shadow .15s ease, background .15s ease;
    }
    .field:focus-within{
      border-color:#cbd5e1; box-shadow: var(--ring);
      background:#fff;
    }
    .field i{ color:#9ca3af; margin-right:10px; font-size:14px }
    .input{
      flex:1; border:0; outline:0; background:transparent;
      font-size:15px; color:var(--text);
    }
    .input::placeholder{ color:#9aa3ad }

    .toggle{
      position:absolute; right:10px; top:50%; transform:translateY(-50%);
      width:36px; height:36px; border-radius:10px; display:grid; place-items:center;
      color:#6b7280; cursor:pointer; transition:background .15s ease;
    }
    .toggle:hover{ background:#f3f4f6 }

    .aux{ display:flex; justify-content:flex-end; margin-top:-6px }
    .link{ color:#1a73e8; font-weight:600; font-size:13px; text-decoration:none }
    .link:hover{ text-decoration:underline }

    .btn{
      height:48px; border:0; border-radius:12px;
      font-weight:800; font-size:15px; cursor:pointer;
      display:inline-flex; align-items:center; justify-content:center;
      transition:transform .05s ease, filter .15s ease, box-shadow .15s ease;
    }
    .btn:active{ transform: translateY(1px) }

    .btn-primary{
      width:100%; color:#fff; background:var(--brand);
      box-shadow: 0 8px 20px rgba(17,17,17,.15);
    }
    .btn-primary:hover{ filter:brightness(.96) }

    .btn-ghost{
      width:100%; color:#374151; background:#fff; border:1px solid var(--line);
    }
    .btn-ghost:hover{ background:#f8fafc }

    .divider{
      display:flex; align-items:center; gap:12px; margin:2px 0 0;
      color:#9aa3ad; font-size:12px; text-transform:uppercase; letter-spacing:.06em;
    }
    .divider:before, .divider:after{
      content:""; height:1px; background:var(--line); flex:1;
    }

    .bottom{
      text-align:center; color:#6b7280; font-size:14px; margin-top:12px;
    }
    .bottom a{ color:#1a73e8; font-weight:700; text-decoration:none }
    .bottom a:hover{ text-decoration:underline }
  </style>
</head>
<body>

  <a href="/trangchu.php" class="back"><i class="fa-solid fa-chevron-left"></i> Quay lại</a>

  <div class="wrap">
    <div class="card">
      <div class="brand">
        <div class="logo"><i class="fa-solid fa-user-shield"></i></div>
      </div>
      <h1 class="title">Đăng nhập</h1>
      <div class="sub">Chào mừng quay lại Nobility 1800s</div>

      <div id="alert" class="alert"></div>

      <form id="form-login" class="form" autocomplete="off" novalidate>
        <label class="field">
          <i class="fa-regular fa-user"></i>
          <input type="email" id="email" class="input" placeholder="Email" required autofocus
                 autocomplete="off" autocapitalize="off" autocorrect="off" spellcheck="false" />
        </label>

        <label class="field">
          <i class="fa-solid fa-key"></i>
          <input type="password" id="password" class="input" placeholder="Mật khẩu" required
                 autocomplete="current-password" autocapitalize="off" autocorrect="off" spellcheck="false" />
          <button type="button" id="eye" class="toggle" aria-label="Hiện/ẩn mật khẩu">
            <i class="fa-regular fa-eye"></i>
          </button>
        </label>

        <div class="aux">
          <a href="#" class="link" onclick="event.preventDefault();alert('Tính năng quên mật khẩu (demo)');">Quên mật khẩu?</a>
        </div>

        <button class="btn btn-primary" type="submit">Đăng nhập</button>

        <div class="divider">hoặc</div>
        <a class="btn btn-ghost" href="/trangchu.php">Về trang chủ</a>

        <div class="bottom">
          Chưa có tài khoản?
          <a id="toRegister" href="/account/register.php">Đăng ký ngay</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Auth JS (localStorage) -->
  <script src="/assets/js/auth.js"></script>
  <script>
  (function(){
    const usp = new URLSearchParams(location.search);
    const redirect = usp.get('redirect') || document.referrer || '/';

    // Link Đăng ký kèm ?redirect=
    const reg = document.getElementById('toRegister');
    const u = new URL(reg.getAttribute('href') || '/account/register.php', location.origin);
    if (!u.searchParams.has('redirect')) u.searchParams.set('redirect', redirect);
    reg.href = u.pathname + (u.search ? u.search : '');

    // Hiện/ẩn mật khẩu
    const eye = document.getElementById('eye');
    const pwd = document.getElementById('password');
    eye.addEventListener('click', function(){
      const show = pwd.type === 'password';
      pwd.type = show ? 'text' : 'password';
      eye.innerHTML = show ? '<i class="fa-regular fa-eye-slash"></i>' : '<i class="fa-regular fa-eye"></i>';
    });

    // Alert helpers
    const alertBox = document.getElementById('alert');
    function showErr(msg){ alertBox.textContent = msg || 'Đăng nhập thất bại.'; alertBox.style.display = 'block'; }
    function hideErr(){ alertBox.style.display = 'none'; }

    // Submit
    document.getElementById('form-login').addEventListener('submit', function(e){
      e.preventDefault();
      hideErr();
      try{
        AUTH.login(document.getElementById('email').value, document.getElementById('password').value);
        AUTH.check();
        // về profile hoặc trang yêu cầu trước đó
        const back = redirect || '/account/profile.php';
        location.href = back.includes('/login.php') ? '/account/profile.php' : back;
      }catch(err){
        showErr(err?.message);
      }
    });
  })();
  </script>
</body>
</html>
