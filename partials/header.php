<header class="header">
  <div class="topbar">
    <div class="container">
      <div class="topbar-right"></div>
    </div>
  </div>
</header>

<header class="mid-header">
  <div class="container">
    <div class="header-main">
      <div class="header-left">
        <!-- Chặn autofill & gõ dấu ok -->
        <form action="/search" method="get" class="search-bar" autocomplete="off">
          <input type="text" name="query" placeholder="Tìm kiếm"
                 autocomplete="off" autocapitalize="off" autocorrect="off"
                 spellcheck="false" inputmode="search" />
          <button type="submit" aria-label="Tìm kiếm">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
      </div>

      <div class="header-center">
        <a href="/trangchu.php" class="logo">
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
    <li><a href="/sanpham/sanpham.php" class="js-products-url">SẢN PHẨM</a></li>
    <li><a href="/tintuc.php">TIN TỨC</a></li>
    <li><a href="/lienhe.php">LIÊN HỆ</a></li>
  </ul>
</nav>

<script>
(function (w, d) {
  // Lấy URL trang sản phẩm từ menu (ưu tiên .js-products-url)
  function getProductsURL() {
    var a = d.querySelector('nav.main-nav a.js-products-url')
          || d.querySelector('nav.main-nav a[href*="/sanpham"]');
    return (a && a.getAttribute('href')) ? a.getAttribute('href') : '/sanpham/sanpham.php';
  }

  var form = d.querySelector('.search-bar');
  if (!form) return;

  form.addEventListener('submit', function (e) {
    e.preventDefault();

    var input = form.querySelector('input[name="query"], input[name="q"]');
    var q = (input && input.value || '').trim().replace(/\s+/g, ' ');
    var raw = getProductsURL();

    // Dùng URL để không bị nhân đôi ?q= và giữ các param khác nếu có
    var url = new URL(raw, w.location.origin);
    if (q) url.searchParams.set('q', q); else url.searchParams.delete('q');

    // Điều hướng sang trang sản phẩm với ?q=
    w.location.href = url.pathname + (url.search ? url.search : '');
  }, { passive: false });
})(window, document);
</script>

