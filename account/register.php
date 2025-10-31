<?php /* register.php — Pure HTML + client-side auth (localStorage) */ ?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Đăng ký</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
  <style>
    :root{ --primary:#2b7cff; --text:#1f2937; --muted:#6b7280; --bg:#f5f7fb; --card:#ffffff; --ring:#e5e7eb; --radius:28px; }
    *{box-sizing:border-box} html,body{height:100%}
    body{margin:0;font-family:Inter,system-ui,Arial,sans-serif;background:var(--bg);display:flex;align-items:center;justify-content:center;padding:24px}
    .card{width:100%;max-width:720px;background:var(--card);border-radius:24px;box-shadow:0 20px 50px rgba(16,24,40,.08);padding:32px 28px}
    .back{position:fixed;top:20px;left:20px;display:inline-flex;align-items:center;gap:6px;font-size:15px;font-weight:500;color:#1a73e8;text-decoration:none;transition:color .2s}
    .back:hover{color:#0c59cf;text-decoration:underline}
    .logo-shop img{display:block;margin:0 auto 16px;max-width:200px;height:auto;border-radius:12px;object-fit:contain}
    h2{margin:8px 0 4px;font-size:28px;line-height:1.2;text-align:center;color:var(--text);font-weight:800}
    .sub{color:var(--muted);text-align:center;margin-bottom:24px;font-size:16px}
    form{display:grid;grid-template-columns:1fr;gap:14px}
    .row-2{display:grid;grid-template-columns:1fr;gap:14px}
    @media(min-width:640px){.row-2{grid-template-columns:1fr 1fr}}
    .input{width:100%;height:54px;border-radius:var(--radius);border:1px solid var(--ring);background:#fff;padding:0 18px;font-size:15px;outline:none;transition:.2s border-color,.2s box-shadow}
    .input::placeholder{color:#9ca3af}
    .input:focus{border-color:var(--primary);box-shadow:0 0 0 4px rgba(43,124,255,.12)}
    .check{display:flex;align-items:flex-start;gap:10px;font-size:14px;color:var(--muted);margin-top:2px}
    .check input{margin-top:3px}
    .submit{margin-top:6px;height:56px;border:none;width:100%;border-radius:40px;font-weight:700;font-size:16px;cursor:not-allowed;background:#cfd5dd;color:#fff;position:relative;transition:.2s}
    .submit .arrow{position:absolute;right:18px;top:50%;transform:translateY(-50%);width:36px;height:36px;border-radius:50%;background:#b9c1cb;display:grid;place-items:center;font-size:18px}
    .submit.enabled{cursor:pointer;background:#202020}
    .submit.enabled .arrow{background:#fff;color:var(--primary)}
    .submit.enabled:hover{filter:brightness(.95)}
    .alert{margin:0 0 8px;padding:10px 12px;border-radius:12px;display:none;font-size:14px}
    .alert.error{background:#fdecea;color:#b71c1c}
    .alt{margin-top:12px;text-align:center;font-size:14px;color:#555}
    .alt a{color:#1a73e8;text-decoration:none;font-weight:600}
    .alt a:hover{text-decoration:underline}
  </style>
</head>
<body>
  <a href="/trangchu.php" class="back">⬅ Quay lại</a>

  <div class="card">
    <div class="logo-shop">
      <img src="/assets/images/logo.jpg" alt="logo">
    </div>
    <h2>Tạo tài khoản của bạn</h2>
    <div class="sub">Đăng ký để mua hàng nhanh hơn và nhận ưu đãi thành viên</div>

    <div id="alert" class="alert error"></div>

    <form id="registerForm" autocomplete="on" novalidate>
      <input class="input" type="text" name="fullname" id="fullname" placeholder="Họ tên của bạn" autocomplete="name" required />
      <div class="row-2">
        <input class="input" type="email" name="email" id="email" placeholder="Email của bạn" autocomplete="email" required />
        <input class="input" type="tel" name="phone" id="phone" placeholder="Số điện thoại của bạn" autocomplete="tel" />
      </div>
      <input class="input" type="text" name="address" id="address" placeholder="Địa chỉ nhận hàng" autocomplete="street-address" />
      <input class="input" type="password" name="password" id="password" placeholder="Mật khẩu" autocomplete="new-password" required />

      <label class="check">
        <input type="checkbox" id="agree">
        <span>Tôi đã đọc, đồng ý với <a href="#" target="_blank">Chính sách bảo vệ dữ liệu cá nhân</a> &amp; <a href="#" target="_blank">Quy định sử dụng</a>.</span>
      </label>

      <button type="submit" class="submit" id="submitBtn" disabled>
        Đăng ký
        <span class="arrow">➜</span>
      </button>

      <div class="alt">Đã có tài khoản? <a id="toLogin" href="#">Đăng nhập</a></div>
    </form>
  </div>

  <!-- Auth JS dùng localStorage -->
  <script src="/assets/js/auth.js"></script>
  <script>
    (function(){
      const $ = s => document.querySelector(s);
      const alertBox = $('#alert');
      const agree = $('#agree');
      const btn = $('#submitBtn');
      const usp = new URLSearchParams(location.search);
      const redirect = usp.get('redirect') || '/';

      // Bật/tắt nút theo agree
      function toggleBtn(){ btn.disabled = !agree.checked; btn.classList.toggle('enabled', agree.checked); }
      agree.addEventListener('change', toggleBtn); toggleBtn();

      // Link sang trang đăng nhập có redirect
      $('#toLogin').href = '/login.php?redirect=' + encodeURIComponent(redirect);

      function showErr(msg){ alertBox.textContent = msg || 'Đăng ký thất bại.'; alertBox.style.display = 'block'; }
      function hideErr(){ alertBox.style.display = 'none'; }

      // Lưu thêm hồ sơ (phone/address) tách rời (demo)
      function saveProfile(email, profile){
        try{
          const KEY = 'sv_profiles_v1';
          const data = JSON.parse(localStorage.getItem(KEY) || '{}');
          data[email] = Object.assign({}, data[email] || {}, profile);
          localStorage.setItem(KEY, JSON.stringify(data));
        }catch(e){}
      }

      $('#registerForm').addEventListener('submit', function(e){
        e.preventDefault(); hideErr();
        const name = $('#fullname').value.trim();
        const email = $('#email').value.trim().toLowerCase();
        const phone = $('#phone').value.trim();
        const address = $('#address').value.trim();
        const pass = $('#password').value;

        // Validate cơ bản
        if (!name || !email || !pass) return showErr('Vui lòng nhập đủ Họ tên, Email và Mật khẩu.');
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) return showErr('Email không hợp lệ.');
        if (!agree.checked) return showErr('Vui lòng đồng ý điều khoản.');

        try{
          // Đăng ký + tự đăng nhập
          AUTH.register(name, email, pass);
          // Lưu thông tin phụ (không ảnh hưởng auth)
          saveProfile(email, { phone, address, fullname: name, createdAt: new Date().toISOString() });
          AUTH.check();
          location.href = '/account/profile.php';
        }catch(err){
          showErr(err?.message);
        }
      });
    })();
  </script>
</body>
</html>
