<?php /* account/profile.php */ ?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Thông tin tài khoản</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<?php include __DIR__ . '/../partials/header.php'; ?>

<div class="container py-5">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title mb-4">Thông tin tài khoản</h3>
          <div id="profileInfo">
            <p>Đang tải...</p>
          </div>
          <hr>
          <a href="/giohang.php" class="btn btn-primary">Giỏ hàng của tôi</a>
          <a href="#" data-logout class="btn btn-outline-danger">Đăng xuất</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>

<script>
(function() {
  const info = document.getElementById('profileInfo');
  
  if (window.AUTH?.loggedIn && window.AUTH.user) {
    const u = window.AUTH.user;
    info.innerHTML = `
      <dl class="row">
        <dt class="col-sm-4">Họ tên:</dt>
        <dd class="col-sm-8"><strong>${u.name || '—'}</strong></dd>
        <dt class="col-sm-4">Email:</dt>
        <dd class="col-sm-8">${u.email || '—'}</dd>
      </dl>
    `;
  } else {
    info.innerHTML = '<p class="text-danger">Bạn chưa đăng nhập. <a href="/account/login.php">Đăng nhập ngay</a></p>';
  }
})();
</script>
</body>
</html>