<!-- header -->
<header class="header">
    <div class="topbar">
        <div class="container">
            <div class="topbar-right">
                <!-- Khu vực này sẽ được JS cập nhật động -->
                <a href="/account/register.php" class="btn btn-outline">ĐĂNG KÝ</a>
                <a href="/account/login.php" class="btn btn-primary">ĐĂNG NHẬP</a>
            </div>
        </div>
    </div>
</header>

<header class="mid-header">
    <div class="container">
        <div class="header-main">
            <div class="header-left">
                <form action="/search" method="get" class="search-bar">
                    <input type="text" name="query" placeholder="Tìm kiếm">
                    <button type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>

            <div class="header-center">
                <a href="/" class="logo">
                    <img src="/assets/images/logo.jpg" alt="GENTLEMAN">
                </a>
            </div>

            <div class="header-right">
                <a href="/giohang.php" class="cart-link">
                    <i class="fa-solid fa-cart-shopping"></i>
                    GIỎ HÀNG (<span class="cart-count">0</span>)
                </a>
            </div>
        </div>
    </div>
</header>

<nav class="main-nav">
    <ul>
        <li><a href="/trangchu.php">TRANG CHỦ</a></li>
        <li><a href="/gioithieu.php">GIỚI THIỆU</a></li>
        <li><a href="/sanpham/sanpham.php">SẢN PHẨM</a></li>
        <li><a href="/tintuc.php">TIN TỨC</a></li>
        <li><a href="/lienhe.php">LIÊN HỆ</a></li>
    </ul>
</nav>

<!-- ✅ Script theo thứ tự ƯU TIÊN -->
<script src="/assets/js/auth.js"></script>
<script src="/assets/js/auth.ui.bridge.js"></script>
<script src="/assets/js/store.js"></script>
<script src="/assets/js/ui.js"></script>
<script src="/assets/js/products.seed.js"></script>
<script src="/assets/js/products.app.js"></script>
<script>
  // Đồng bộ badge giỏ
  function refreshBadge(){ window.SVUI?.updateCartCount?.(); }
  document.addEventListener('DOMContentLoaded', refreshBadge);
  window.addEventListener('cart:changed', refreshBadge);
  window.addEventListener('storage', (e) => { if (e.key === 'sv_cart_v1') refreshBadge(); });
</script>

<!-- ✅ auth phải đứng TRƯỚC để hiển thị chip & chặn hành vi -->
<script src="/assets/js/auth.frontend.js"></script>

<!-- 🔧 Tuỳ biến link đăng nhập/đăng ký cho chip về /account/* (ghi đè trạng thái "chưa login") -->
<script>
document.addEventListener('auth:ready', function () {
  if (!window.AUTH?.loggedIn) {
    var chip = document.getElementById('auth-chip');
    if (chip) {
      chip.innerHTML = '<a href="/account/login.php">Đăng nhập</a> / <a href="/account/register.php">Đăng ký</a>';
    }
  }
});
</script>
<script src="/assets/js/auth.js"></script>
<!-- Các file còn lại -->
<script src="/assets/js/store.js"></script>
<script src="/assets/js/ui.js"></script>
<script src="/assets/js/products.seed.js"></script>
<script src="/assets/js/products.app.js"></script>
