<?php /* order_success.php */ ?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Đặt hàng thành công</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/base.css">
</head>
<body>
<?php include __DIR__ . '/partials/header.php'; ?>
<div class="container py-5 text-center">
  <h3>Đặt hàng thành công!</h3>
  <p>Mã đơn của bạn: <strong id="oid">—</strong></p>
  <a class="btn btn-primary" href="/account/orders.php">Xem lịch sử đơn hàng</a>
  <a class="btn btn-outline-secondary ml-2" href="/sanpham/sanpham.php">Tiếp tục mua sắm</a>
</div>
<?php include __DIR__ . '/partials/footer.php'; ?>
<script>
  const usp = new URLSearchParams(location.search);
  document.getElementById('oid').textContent = usp.get('id') || '—';
  window.SVUI?.updateCartCount?.();
</script>
</body>
</html>
<script src="/assets/js/auth.js"></script>

<!-- Các file còn lại -->
<script src="/assets/js/store.js"></script>
<script src="/assets/js/ui.js"></script>
<script src="/assets/js/products.seed.js"></script>
<script src="/assets/js/products.app.js"></script>