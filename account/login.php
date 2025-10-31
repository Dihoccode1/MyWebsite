<?php /* login.php — Pure HTML + client-side auth (localStorage) */ ?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Đăng nhập</title>

  <!-- Font & CSS -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  <style>
    *{box-sizing:border-box;margin:0;padding:0}
    body{font-family:Arial, sans-serif;background:#f6f7f9;display:flex;justify-content:center;align-items:center;min-height:100vh}
    #wrapper{width:100%;max-width:360px}
    #form-login{background:#fff;padding:30px 24px;border-radius:10px;box-shadow:0 6px 18px rgba(0,0,0,.1)}
    .form-heading{text-align:center;font-size:22px;margin-bottom:16px;color:#333}
    .alert{margin-bottom:12px;padding:10px 12px;border-radius:8px;background:#fdecea;color:#b71c1c;display:none}
    .form-group{display:flex;align-items:center;border:1px solid #ddd;border-radius:8px;padding:10px 12px;margin-bottom:12px;background:#fafafa;position:relative}
    .form-group i{margin-right:10px;color:#666}
    .form-input{flex:1;border:none;outline:none;font-size:14px;background:transparent}
    #eye{position:absolute;right:12px;cursor:pointer;color:#666}
    .aux{margin-top:-6px;margin-bottom:10px;display:flex;justify-content:flex-end}
    .forgot-link{font-size:13px;color:#1a73e8;text-decoration:none;font-weight:600}
    .forgot-link:hover{color:#0c59cf;text-decoration:underline}
    .form-submit,.back-btn{width:100%;padding:12px;border:none;border-radius:8px;font-size:15px;font-weight:600;cursor:pointer;transition:background .3s;margin-top:10px}
    .form-submit{background:#111;color:#fff}
    .form-submit:hover{background:#333}
    .back-btn{background:#ddd;color:#333;text-decoration:none;display:inline-block;text-align:center}
    .back-btn:hover{background:#bbb}
    .register-link{text-align:center;margin-top:16px;font-size:14px;color:#555}
    .register-link a{color:#007BFF;text-decoration:none;font-weight:600}
    .register-link a:hover{text-decoration:underline}
    .back{position:fixed;top:20px;left:20px;display:inline-flex;align-items:center;gap:6px;font-size:15px;font-weight:500;color:#1a73e8;text-decoration:none;transition:color .2s ease}
    .back:hover{color:#0c59cf;text-decoration:underline}
  </style>
</head>
<body>

  <a href="/trangchu.php" class="back">⬅ Quay lại</a>

  <div id="wrapper">
    <form id="form-login">
      <h1 class="form-heading">Đăng nhập</h1>

      <div id="alert" class="alert"></div>

      <div class="form-group">
        <i class="far fa-user"></i>
        <input type="email" id="email" class="form-input" placeholder="Email" required autofocus>
      </div>

      <div class="form-group">
        <i class="fas fa-key"></i>
        <input type="password" id="password" class="form-input" placeholder="Mật khẩu" required>
        <div id="eye" title="Hiện/ẩn mật khẩu"><i class="far fa-eye"></i></div>
      </div>

      <div class="aux">
        <a href="#" class="forgot-link" onclick="event.preventDefault();alert('Tính năng quên mật khẩu (demo)');">Quên mật khẩu?</a>
      </div>

      <button class="form-submit" type="submit">Đăng nhập</button>

      <div class="register-link">
        Chưa có tài khoản? <a id="toRegister" href="#">Đăng ký ngay</a>
      </div>

      <a class="back-btn" href="/trangchu.php">Về trang chủ</a>
    </form>
  </div>

  <!-- Auth JS (localStorage) -->
  <script src="/assets/js/auth.js"></script>
  <script>
  (function(){
    // Lấy redirect (nếu có)
    const usp = new URLSearchParams(location.search);
    const redirect = usp.get('redirect') || '/';

    // Link sang trang đăng ký kèm redirect
    document.getElementById('toRegister').href = '/register.php?redirect=' + encodeURIComponent(redirect);

    // Hiện/ẩn mật khẩu
    const eye = document.getElementById('eye');
    const pwd = document.getElementById('password');
    eye.addEventListener('click', function(){
      const show = pwd.type === 'password';
      pwd.type = show ? 'text' : 'password';
      eye.innerHTML = show ? '<i class="far fa-eye-slash"></i>' : '<i class="far fa-eye"></i>';
    });

    // Hiển thị lỗi
    const alertBox = document.getElementById('alert');
    function showErr(msg){
      alertBox.textContent = msg || 'Đăng nhập thất bại.';
      alertBox.style.display = 'block';
    }
    function hideErr(){ alertBox.style.display = 'none'; }

    // Submit
    document.getElementById('form-login').addEventListener('submit', function(e){
      e.preventDefault();
      hideErr();
      try{
        AUTH.login(document.getElementById('email').value, document.getElementById('password').value);
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
