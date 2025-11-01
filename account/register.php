<?php /* /account/register.php — Elegant e-commerce register (localStorage auth) */ ?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Đăng ký</title>

  <!-- Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

  <style>
    :root{
      --bg:#f5f7fb;
      --card:#ffffff;
      --text:#111827;
      --muted:#6b7280;
      --line:#e5e7eb;
      --brand:#111;           /* màu chủ đạo đồng bộ login */
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

    .wrap{ width:100%; max-width:720px }

    .card{
      background:var(--card);
      border:1px solid var(--line);
      border-radius:24px;
      box-shadow:var(--shadow-md);
      padding:28px 24px;
    }

    .brand{ display:grid; place-items:center; margin-bottom:14px; }
    .brand img{
    display:block;margin:0 auto 16px;max-width:300px;height:auto;border-radius:12px;object-fit:contain
    }

    .title{ text-align:center; margin:6px 0 4px; font-size:26px; font-weight:800; letter-spacing:.2px }
    .sub{ text-align:center; color:var(--muted); font-size:14px; margin-bottom:16px }

    .alert{
      display:none; margin:0 0 12px; padding:10px 12px;
      border-radius:12px; font-size:14px;
      background:#fdecea; color:#b71c1c; border:1px solid #f5c3c3;
    }

    form.form{ display:grid; gap:12px; }

    .grid-2{ display:grid; gap:12px; grid-template-columns:1fr; }
    @media(min-width:640px){ .grid-2{ grid-template-columns:1fr 1fr; } }

    .field{
      position:relative; height:54px;
      border:1px solid var(--line); border-radius:12px; background:#fff;
      display:flex; align-items:center; padding:0 12px;
      transition:border-color .15s ease, box-shadow .15s ease, background .15s ease;
    }
    .field:focus-within{ border-color:#cbd5e1; box-shadow: var(--ring); background:#fff; }
    .field i{ color:#9ca3af; margin-right:10px; font-size:14px }
    .input{
      flex:1; border:0; outline:0; background:transparent;
      font-size:15px; color:var(--text);
    }
    .input::placeholder{ color:#9aa3ad }

    .check{ display:flex; align-items:flex-start; gap:10px; font-size:14px; color:var(--muted); margin-top:2px }
    .check input{ margin-top:3px }

    .btn{
      height:52px; border:0; border-radius:12px;
      font-weight:800; font-size:15px; cursor:pointer;
      display:inline-flex; align-items:center; justify-content:center;
      transition:transform .05s ease, filter .15s ease, box-shadow .15s ease, opacity .15s ease;
    }
    .btn:active{ transform: translateY(1px) }
    .btn-primary{ width:100%; color:#fff; background:var(--brand); box-shadow: 0 8px 20px rgba(17,17,17,.15); }
    .btn-primary:hover{ filter:brightness(.96) }
    .btn[disabled]{ opacity:.6; cursor:not-allowed }

    .bottom{ text-align:center; color:#6b7280; font-size:14px; margin-top:4px; }
    .bottom a{ color:#1a73e8; font-weight:700; text-decoration:none }
    .bottom a:hover{ text-decoration:underline }
  </style>
</head>
<body>
  <a href="/trangchu.php" class="back"><i class="fa-solid fa-chevron-left"></i> Quay lại</a>

  <div class="wrap">
    <div class="card">
      <div class="brand">
        <img src="/assets/images/logo.jpg" alt="logo">
      </div>
      <h1 class="title">Tạo tài khoản</h1>
      <div class="sub">Đăng ký để mua hàng nhanh hơn và nhận ưu đãi thành viên</div>

      <div id="alert" class="alert"></div>

      <!-- giữ logic chặn autofill (readonly) + đọc theo id -->
      <form id="registerForm" class="form" autocomplete="off" novalidate>
        <label class="field">
          <i class="fa-regular fa-id-card"></i>
          <input class="input" type="text" id="fullname" name="r_fullname"
                 placeholder="Họ tên của bạn"
                 autocomplete="off" autocapitalize="off" autocorrect="off" spellcheck="false"
                 inputmode="text" readonly required />
        </label>

        <div class="grid-2">
          <label class="field">
            <i class="fa-regular fa-envelope"></i>
            <input class="input" type="email" id="email" name="r_email"
                   placeholder="Email của bạn"
                   autocomplete="off" autocapitalize="off" autocorrect="off" spellcheck="false"
                   inputmode="email" readonly required />
          </label>

          <label class="field">
            <i class="fa-solid fa-phone"></i>
            <input class="input" type="tel" id="phone" name="r_phone"
                   placeholder="Số điện thoại của bạn"
                   autocomplete="off" autocapitalize="off" autocorrect="off" spellcheck="false"
                   inputmode="tel" readonly />
          </label>
        </div>

        <label class="field">
          <i class="fa-solid fa-location-dot"></i>
          <input class="input" type="text" id="address" name="r_address"
                 placeholder="Địa chỉ nhận hàng"
                 autocomplete="off" autocapitalize="off" autocorrect="off" spellcheck="false"
                 inputmode="text" readonly />
        </label>

        <label class="field">
          <i class="fa-solid fa-key"></i>
          <input class="input" type="password" id="password" name="r_password"
                 placeholder="Mật khẩu"
                 autocomplete="new-password" autocapitalize="off" autocorrect="off" spellcheck="false"
                 inputmode="text" readonly required />
        </label>

        <label class="check">
          <input type="checkbox" id="agree">
          <span>Tôi đã đọc, đồng ý với <a href="#" target="_blank">Chính sách bảo vệ dữ liệu cá nhân</a> &amp; <a href="#" target="_blank">Quy định sử dụng</a>.</span>
        </label>

        <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Đăng ký</button>

        <div class="bottom">
          Đã có tài khoản?
          <a id="toLogin" href="/account/login.php">Đăng nhập</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Auth JS (localStorage) -->
  <script src="/assets/js/auth.js"></script>
  <script>
  (function(){
    const $ = s => document.querySelector(s);
    const alertBox = $('#alert');
    const agree = $('#agree');
    const btn = $('#submitBtn');

    // Bỏ readonly khi người dùng tương tác (tránh autofill trình duyệt)
    document.querySelectorAll('#registerForm .input[readonly]').forEach(function (el) {
      function unlock(){ el.removeAttribute('readonly');
        el.removeEventListener('focus', unlock);
        el.removeEventListener('mousedown', unlock);
        el.removeEventListener('touchstart', unlock);
      }
      el.addEventListener('focus', unlock, { once:true });
      el.addEventListener('mousedown', unlock, { once:true });
      el.addEventListener('touchstart', unlock, { once:true });
    });

    // Bật/tắt nút theo agree (đồng bộ login style)
    function toggleBtn(){ btn.disabled = !agree.checked; }
    agree.addEventListener('change', toggleBtn); toggleBtn();

    // Link Đăng nhập: giữ path gốc + thêm ?redirect=
    const usp = new URLSearchParams(location.search);
    const redirect = usp.get('redirect') || document.referrer || '/';
    (function fixLoginLink(){
      const a = document.getElementById('toLogin');
      const base = a.getAttribute('href') || '/account/login.php';
      const u = new URL(base, location.origin);
      if (!u.searchParams.has('redirect')) u.searchParams.set('redirect', redirect);
      a.href = u.pathname + (u.search ? u.search : '');
    })();

    function showErr(msg){ alertBox.textContent = msg || 'Đăng ký thất bại.'; alertBox.style.display = 'block'; }
    function hideErr(){ alertBox.style.display = 'none'; }

    // Lưu profile phụ (demo)
    function saveProfile(email, profile){
      try{
        const KEY = 'sv_profiles_v1';
        const data = JSON.parse(localStorage.getItem(KEY) || '{}');
        data[email] = Object.assign({}, data[email] || {}, profile);
        localStorage.setItem(KEY, JSON.stringify(data));
      }catch(e){}
    }

    // Submit form
    $('#registerForm').addEventListener('submit', function(e){
      e.preventDefault(); hideErr();
      const name = $('#fullname').value.trim();
      const email = $('#email').value.trim().toLowerCase();
      const phone = $('#phone').value.trim();
      const address = $('#address').value.trim();
      const pass = $('#password').value;

      if (!name || !email || !pass) return showErr('Vui lòng nhập đủ Họ tên, Email và Mật khẩu.');
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) return showErr('Email không hợp lệ.');
      if (!agree.checked) return showErr('Vui lòng đồng ý điều khoản.');

      try{
        // Đăng ký + đăng nhập (localStorage – từ /assets/js/auth.js)
        AUTH.register(name, email, pass);
        saveProfile(email, { phone, address, fullname: name, createdAt: new Date().toISOString() });
        AUTH.check();
        // Chuyển vào trang hồ sơ (hoặc đổi thành redirect nếu muốn)
        location.href = '/account/profile.php';
      }catch(err){
        showErr(err?.message);
      }
    });
  })();
  </script>
</body>
</html>
