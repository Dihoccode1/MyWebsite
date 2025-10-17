<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  <link rel="stylesheet" href="css/login.css">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      background: #f6f7f9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    #wrapper {
      width: 100%;
      max-width: 360px;
    }

    #form-login {
      background: #fff;
      padding: 30px 24px;
      border-radius: 10px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    }

    .form-heading {
      text-align: center;
      font-size: 22px;
      margin-bottom: 24px;
      color: #333;
    }

    .form-group {
      display: flex;
      align-items: center;
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 10px 12px;
      margin-bottom: 16px;
      background: #fafafa;
      position: relative;
    }

    .form-group i {
      margin-right: 10px;
      color: #666;
    }

    .form-input {
      flex: 1;
      border: none;
      outline: none;
      font-size: 14px;
      background: transparent;
    }

    #eye {
      position: absolute;
      right: 12px;
      cursor: pointer;
      color: #666;
    }

    /* NEW: hàng chứa link quên mật khẩu */
    .aux {
      margin-top: -6px;
      /* kéo gần ô mật khẩu hơn */
      margin-bottom: 10px;
      display: flex;
      justify-content: flex-end;
    }

    .forgot-link {
      font-size: 13px;
      color: #1a73e8;
      text-decoration: none;
      font-weight: 600;
    }

    .forgot-link:hover {
      color: #0c59cf;
      text-decoration: underline;
    }

    .form-submit,
    .back-btn {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s;
      margin-top: 10px;
    }

    .form-submit {
      background: #111;
      color: #fff;
    }

    .form-submit:hover {
      background: #333;
    }

    .back-btn {
      background: #ddd;
      color: #333;
      text-decoration: none;
      display: inline-block;
      text-align: center;
    }

    .back-btn:hover {
      background: #bbb;
    }

    .register-link {
      text-align: center;
      margin-top: 16px;
      font-size: 14px;
      color: #555;
    }

    .register-link a {
      color: #007BFF;
      text-decoration: none;
      font-weight: 600;
    }

    .register-link a:hover {
      text-decoration: underline;
    }

    .back {
      position: fixed;
      top: 20px;
      left: 20px;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: 15px;
      font-weight: 500;
      color: #1a73e8;
      text-decoration: none;
      transition: color .2s ease;
    }

    .back:hover {
      color: #0c59cf;
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <a href="../trangchu.php" class="back">⬅ Quay lại</a>

  <div id="wrapper">
    <form id="form-login">
      <h1 class="form-heading">Đăng nhập</h1>

      <div class="form-group">
        <i class="far fa-user"></i>
        <input type="text" class="form-input" placeholder="Tên đăng nhập">
      </div>

      <div class="form-group">
        <i class="fas fa-key"></i>
        <input type="password" class="form-input" placeholder="Mật khẩu">
        <div id="eye"><i class="far fa-eye"></i></div>
      </div>

      <input type="submit" value="Đăng nhập" class="form-submit">
      <div class="register-link">
        Chưa có tài khoản? <a href="register.html">Đăng ký ngay</a>
      </div>
    </form>
  </div>
</body>

</html>