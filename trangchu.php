<!doctype html>
<html lang="vi">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Trang bán sản phẩm sáp</title>
  <meta name="description" content="Cửa hàng sáp vuốt tóc – sản phẩm mới, ưu đãi, giao nhanh, đổi trả dễ dàng." />

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />

  <!-- Site CSS -->
  <link rel="stylesheet" href="/assets/css/base.css" />
  <link rel="stylesheet" href="/assets/css/style.css" />

  <style>
    
    /* ===== Variables & base ===== */
    :root {
      --bg: #fff;
      --text: #111;
      --muted: #6b7280;
      --line: #eceff3;
      --brand: #111;
      --radius: 14px;
      --shadow-sm: 0 6px 16px rgba(17, 24, 39, .08);
      --shadow-md: 0 12px 28px rgba(17, 24, 39, .12);
      --ease: cubic-bezier(.22, 1, .36, 1);
      --container: 1140px;
      --gap: 24px;
    }

    * {
      box-sizing: border-box
    }

    body {
      font-family: Roboto, system-ui, -apple-system, Segoe UI, Arial, sans-serif;
      color: var(--text);
      margin: 0
    }

    a {
      color: inherit;
      text-decoration: none
    }

    img {
      max-width: 100%;
      height: auto;
      display: block
    }

    /* ===== Scoped layout for homepage only ===== */
    .page-main .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 16px;
      position: relative
    }

    .page-main .container-pag {
      width: 90%;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 16px;
      position: relative
    }

    /* Policy strip */
    .policy-box {
      margin: 10px 0
    }

    .policy-box .container {
      display: flex;
      gap: 20px;
      justify-content: space-between
    }

    .policy-item {
      flex: 1;
      background: #202020;
      border: 1px solid #333;
      text-align: center;
      padding: 5px;
      border-radius: 4px
    }

    .policy-item span {
      display: block;
      border: 1px solid #545454;
      line-height: 40px;
      font-size: 14px;
      color: #B8D0E0;
      text-transform: uppercase
    }

    /* Hero slider (single image for now) */
    .awe-section-2 {
      margin: 30px 0
    }

    .awe-section-2 .swiper-slide img {
      width: 100%;
      height: auto;
      object-fit: cover
    }

    /* Three banners */
    .awe-section-3 {
      padding: 20px 0;
      background: #fff
    }

    .adv-row {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px
    }

    .adv_bottom_inner {
      border: 1px solid #e6e6e6
    }

    .adv_bottom_inner img {
      border-radius: 6px;
      transition: transform .25s ease, box-shadow .25s ease
    }

    .adv_bottom_inner a:hover img {
      transform: translateY(-2px)
    }

    /* Brand slider (simple) */
    .section-brand {
      background: #fff
    }

    .brand-slider {
      position: relative;
      display: flex;
      align-items: center;
      overflow: hidden
    }

    .slider-track {
      display: flex;
      transition: transform .4s ease
    }

    .slide {
      min-width: 200px;
      margin: 0 10px
    }

    .btn-1 {
      background: #f3f4f6;
      color: #000;
      border: 1px solid #e5e7eb;
      font-size: 24px;
      padding: 8px 12px;
      cursor: pointer;
      z-index: 5
    }

    .prev {
      position: absolute;
      left: 0
    }

    .next {
      position: absolute;
      right: 0
    }

    /* Product grid */
    .row.equalize-cards {
      display: flex;
      flex-wrap: wrap;
      margin: -20px
    }

    .col {
      padding: 20px
    }

    .col-3 {
      width: 25%
    }

    @media(max-width:991.98px) {
      .col-3 {
        width: 50%
      }
    }

    @media(max-width:575.98px) {
      .col-3 {
        width: 100%
      }
    }

    .product-box {
      background: var(--bg);
      border: 1px solid var(--line);
      border-radius: var(--radius);
      overflow: hidden;
      box-shadow: var(--shadow-sm);
      transition: transform .35s var(--ease), box-shadow .35s var(--ease), border-color .35s;
      position: relative;
      display: flex;
      flex-direction: column;
      height: 100%
    }

    .product-box:hover {
      box-shadow: var(--shadow-md);
      border-color: #e6ebf0
    }

    .product-thumbnail {
      position: relative;
      overflow: hidden;
      background: linear-gradient(180deg, #fafbfc 0%, #f7fafc 100%);
      aspect-ratio: 1/1;
      display: flex;
      align-items: center;
      justify-content: center
    }

    .image_link {
      position: absolute;
      inset: 0;
      display: flex
    }

    .image_link img {
      width: 100%;
      height: 100%;
      object-fit: contain;
      transition: transform .5s var(--ease), filter .4s var(--ease)
    }

    .product-box:hover .image_link img {
      transform: scale(1.03)
    }

    /* On-image CTA */
    .product-action-grid {
      position: absolute;
      left: 0;
      right: 0;
      bottom: 0;
      z-index: 5;
      opacity: 0;
      transform: translateY(100%);
      pointer-events: none;
      transition: opacity .25s var(--ease), transform .25s var(--ease)
    }

    .product-thumbnail>.product-action-grid .btn-cart {
      display: block;
      width: 100%;
      padding: 12px 16px;
      border: 0;
      border-radius: 0;
      background: #111;
      color: #fff;
      font-weight: 800
    }

    .product-box:hover .product-thumbnail>.product-action-grid {
      opacity: 1;
      transform: translateY(0);
      pointer-events: auto
    }

    /* Labels */
    .product-label {
      position: absolute;
      left: 12px;
      top: 12px;
      display: flex;
      gap: 8px
    }

    .product-label .label {
      font-size: 12px;
      font-weight: 700;
      letter-spacing: .04em;
      padding: 6px 10px;
      background: #fff;
      color: #F00;
      border: 1px #F00 solid;
      box-shadow: 0 6px 16px rgba(0, 0, 0, .06)
    }

    /* Info */
    .product-info {
      padding: 12px 14px 14px;
      display: flex;
      flex-direction: column;
      flex: 1 1 auto
    }

    .product-name {
      margin: 2px 0 8px;
      font-size: 16px;
      line-height: 1.35;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis
    }

    .product-name a {
      color: var(--text);
      background: linear-gradient(currentColor, currentColor) 0 100%/0 2px no-repeat;
      transition: background-size .35s var(--ease), color .35s var(--ease)
    }

    .product-name a:hover {
      color: #000;
      background-size: 100% 2px
    }

    .price-box {
      margin-top: auto;
      display: flex;
      align-items: center;
      gap: 10px;
      justify-content: center
    }

    .product-price {
      color: #ff0000;
      font-weight: 800;
      font-size: 17px
    }

    .product-price-old {
      color: var(--muted);
      font-size: 14px;
      text-decoration: line-through
    }

    /* Section heading */
    .heading_spbc {
      display: flex;
      justify-content: center;
      margin: 10px 0 30px
    }

    .heading_spbc .title-head {
      margin: 0;
      font-size: 22px
    }

    /* Pagination */
    .pagination-nav {
      display: flex;
      justify-content: center;
      padding: 24px 0 16px
    }

    .pagination-list {
      display: flex;
      list-style: none;
      margin: 0;
      padding: 0;
      gap: 12px
    }

    .page-item .page-link {
      display: block;
      padding: 8px 12px;
      color: #333;
      font-size: 15px;
      border: 1px solid transparent
    }

    .page-item.active .page-link {
      color: #000;
      font-weight: 700;
      border-bottom: 2px solid #000
    }

    .page-item:not(.active) .page-link:hover {
      text-decoration: underline
    }

    /* Two banners (bottom) */
    .awe-section-6 {
      padding: 32px 0 48px
    }

    .content_banner {
      position: relative;
      margin-bottom: var(--gap)
    }

    .content_banner .des {
      position: absolute;
      left: 16px;
      bottom: 16px;
      box-shadow: 0 10px 24px rgba(0, 0, 0, .08);
      border-radius: 12px;
      padding: 14px 16px;
      max-width: 80%
    }

    .content_banner .des h4 {
      margin: 0 0 4px;
      font-size: 20px;
      line-height: 1.2
    }

    .content_banner .des h4 span {
      border-bottom: 2px solid #fff;
      padding-bottom: 2px;
      color: #fff;
      font-size: 15px
    }

    .content_banner .des p {
      margin: 6px 0 10px;
      color: #fff;
      font-size: 12px
    }

    .content_banner .des a {
      font-weight: 600;
      font-size: 20px;
      color: #fff
    }

    /* ===== Load More button ===== */
    .loadmore-wrap {
      display: flex;
      justify-content: center;
      padding: 18px 0 8px;
      margin-top: 40px;
    }

    .btn-loadmore {
      display: inline-flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 4px;
      min-width: 220px;
      padding: 12px 18px;
      background: #111;
      color: #fff;
      border: 1px solid #111;
      box-shadow: 0 8px 20px rgba(17, 24, 39, .12);
      transition: transform .18s ease, box-shadow .18s ease, background .18s ease, color .18s ease;
    }

    .btn-loadmore .lm-text {
      font-weight: 800;
      font-size: 15px;
      letter-spacing: .02em;
      text-transform: uppercase;
    }

    .btn-loadmore .lm-sub {
      font-size: 12px;
      opacity: .75;
    }

    .btn-loadmore:hover {
      box-shadow: 0 12px 28px rgba(17, 24, 39, .16);
      background: #fff;
      color: #000;
      border: 1px solid #111;
    }

    .btn-loadmore:active {
      transform: translateY(0);
      box-shadow: 0 6px 16px rgba(17, 24, 39, .12);
    }

    /* Trạng thái hết dữ liệu */
    .btn-loadmore.is-done {
      background: #f3f4f6;
      color: #6b7280;
      border-color: #e5e7eb;
      box-shadow: none;
      cursor: default;
      pointer-events: none;
    }

    .btn-loadmore.is-done .lm-sub {
      opacity: .9;
    }

    .btn-loadmore {
      text-decoration: none;
      text-align: center;
    }

    /* Mobile tinh gọn */
    @media (max-width:575.98px) {
      .btn-loadmore {
        min-width: 180px;
        padding: 10px 16px;
      }

      .btn-loadmore .lm-text {
        font-size: 14px;
      }
    }

    .content_banner a img {
      width: 100%;
      height: 250px;
      object-fit: cover;
      border-radius: 14px;
      transition: transform .4s ease
    }

    @media(min-width:576px) {
      .content_banner a img {
        height: 320px
      }
    }

    /* Mobile hoverless */
    @media(hover:none) and (pointer:coarse) {
      .product-thumbnail>.product-action-grid {
        opacity: 1;
        transform: none;
        pointer-events: auto
      }
    }
  </style>
</head>

<body>
  <?php include __DIR__ . '/partials/header.php'; ?>

  <div class="page-main">

    <!-- Policy strip -->
    <div class="policy-box">
      <div class="container">
        <div class="policy-item"><span>Miễn phí vận chuyển</span></div>
        <div class="policy-item"><span>Miễn phí đổi trả</span></div>
        <div class="policy-item"><span>Thanh toán trực tuyến</span></div>
      </div>
    </div>

    <!-- Hero slider (single) -->
    <section class="awe-section-2">
      <div class="container">
        <div class="section_slider swiper-container">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <a href="#" title="Slider 1">
                <picture>
                  <source media="(min-width:1200px)" srcset="/assets/images/z7061759418724_151ccf4ce48df7a11f28257e7b369660.jpg" />
                  <source media="(min-width:992px)" srcset="/assets/images/z7061759418724_151ccf4ce48df7a11f28257e7b369660.jpg" />
                  <source media="(min-width:569px)" srcset="/assets/images/z7061759418724_151ccf4ce48df7a11f28257e7b369660.jpg" />
                  <img src="/assets/images/z7061759418724_151ccf4ce48df7a11f28257e7b369660.jpg" alt="Ưu đãi sáp vuốt tóc" class="img-responsive" />
                </picture>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- 3 banners -->
    <section class="awe-section-3">
      <div class="container">
        <div class="adv-row">
          <div class="adv_bottom_inner">
            <figure><a href="#" title="Dưỡng tóc"><img src="/assets/images/duong toc.webp" alt="Dưỡng tóc" loading="lazy" /></a></figure>
          </div>
          <div class="adv_bottom_inner">
            <figure><a href="#" title="Gôm xịt tóc"><img src="/assets/images/gôm xịt tóc.webp" alt="Gôm xịt tóc" loading="lazy" /></a></figure>
          </div>
          <div class="adv_bottom_inner">
            <figure><a href="#" title="Sáp vuốt tóc"><img src="/assets/images/sap2.webp" alt="Sáp vuốt tóc" loading="lazy" /></a></figure>
          </div>
        </div>
      </div>
    </section>

    <!-- Brand slider -->
    <div class="section-brand">
      <div class="container">
        <div class="brand-slider">
          <button class="btn-1 prev" aria-label="Prev">‹</button>
          <div class="slider-track">
            <div class="slide"><img src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_1.png" alt="Brand 1"></div>
            <div class="slide"><img src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_2.png" alt="Brand 2"></div>
            <div class="slide"><img src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_3.png" alt="Brand 3"></div>
            <div class="slide"><img src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_4.png" alt="Brand 4"></div>
            <div class="slide"><img src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_5.png" alt="Brand 5"></div>
            <div class="slide"><img src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_6.png" alt="Brand 6"></div>
            <div class="slide"><img src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_7.png" alt="Brand 7"></div>
            <div class="slide"><img src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_8.png" alt="Brand 8"></div>
          </div>
          <button class="btn-1 next" aria-label="Next">›</button>
        </div>
        <hr />
      </div>
    </div>

    <!-- Products -->
    <section class="awe-section-5 section_new_product">
      <div class="container">
        <div class="heading_spbc">
          <h2 class="title-head"><a href="/san-pham-noi-bat" title="Sản phẩm mới">Sản phẩm mới</a></h2>
        </div>
        <div class="row equalize-cards" id="product-grid" data-featured="true"></div>
        <div class="loadmore-wrap">
          <a href="/sanpham/sanpham.php" class="btn-loadmore" aria-label="Xem thêm">
            <span class="lm-text">Xem thêm</span>
          </a>
        </div>

      </div>
    </section>
  </div>
  <!-- ================== END PAGE MAIN ================== -->

  <!-- Two banners + About -->
  <section class="awe-section-6">
    <div class="home-two-banner">
      <div class="container">
        <div class="row">
          <div class="col col-6 content_banner">
            <a href="#" title="Handmade"><img class="img-responsive lazyload" src="/assets/images/sap_handmade.jpg" alt="Handmade"></a>
            <div class="des">
              <h4><span>Handmade</span></h4>
              <p>Sáp thủ công hương thơm đặc trưng, giữ nếp cao.</p><a href="#" class="hidden-xs" title="Xem thêm">Xem thêm</a>
            </div>
          </div>
          <div class="col col-6 content_banner">
            <a href="#" title="Bộ sưu tập mới"><img class="img-responsive lazyload" src="/assets/images/suu_tap.jpg" alt="Bộ sưu tập mới"></a>
            <div class="des">
              <h4><span>Bộ sưu tập mới</span></h4>
              <p>Cập nhật liên tục By Vilain, Hanz de Fuko, Apestomen…</p><a href="#" class="hidden-xs" title="Xem thêm">Xem thêm</a>
            </div>
          </div>
        </div>
        <div class="about-home">
          <div class="inner">
            <h5>Về chúng tôi</h5>
            <p>Nobility 1800s mang đến trải nghiệm mua sắm hàng hiệu trực tuyến đẳng cấp – từ quần áo, giày dép, phụ kiện đến mỹ phẩm cho nam & nữ – bắt kịp xu hướng mới nhất.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include __DIR__ . '/partials/footer.php'; ?>
  <script src="/assets/js/auth.frontend.js"></script>
  <!-- ===== JS ===== -->
  <script>
    // ===== Products + Load More =====
    (function(w, d) {
      const ROOT = d.getElementById('product-grid');
      if (!ROOT) return;
      const BTN = d.getElementById('loadMore');

      const PRODUCT_DETAIL_URL = '/sanpham/pages/product_detail.php';
      const all = (w.SVStore?.getAllProducts?.() || w.SV_PRODUCT_SEED || []);
      const onlyFeatured = ROOT.getAttribute('data-featured') === 'true';
      const products = onlyFeatured ? all.filter(p => p.featured) : all;

      // cấu hình
      const PER_FIRST = 8; // số lượng lần đầu
      const PER_NEXT = 8; // mỗi lần "Xem thêm"
      let shown = 0;

      // utils
      const fmt = n => (Number(n) || 0).toLocaleString('vi-VN') + '₫';
      const esc = s => String(s || '').replace(/[&<>"']/g, m => ({
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#39;'
      } [m]));
      const badgeLabel = b => {
        const x = String(b || '').toLowerCase();
        if (x === 'sale') return 'Sale';
        if (x === 'new') return 'New';
        if (x === 'out_of_stock' || x === 'oos') return 'Hết hàng';
        return '';
      };

      function renderCard(p) {
        const badge = badgeLabel(p.badge);
        const old = (p.original_price && Number(p.original_price) > Number(p.price)) ?
          `<span class="price product-price-old">${fmt(p.original_price)}</span>` : '';
        const img = p.image || 'https://placehold.co/600x600/png';
        return `
        <div class="col col-3">
          <div class="product-box">
            <div class="product-thumbnail">
              <a class="image_link" href="${PRODUCT_DETAIL_URL}?id=${encodeURIComponent(p.id)}">
                <img src="${esc(img)}" alt="${esc(p.name)}"/>
              </a>
              ${badge ? `<div class="product-label"><strong class="label">${esc(badge)}</strong></div>` : ''}

              <div class="product-action-grid">
                <button class="btn-cart btn-add-cart" data-id="${esc(p.id)}">
                  <i class="fa fa-plus"></i> Giỏ hàng
                </button>
              </div>
            </div>
            <div class="product-info a-left">
              <h3 class="product-name">
                <a href="${PRODUCT_DETAIL_URL}?id=${encodeURIComponent(p.id)}">${esc(p.name)}</a>
              </h3>
              <div class="price-box">
                <span class="price product-price">${fmt(p.price)}</span>
                ${old}
              </div>
            </div>
          </div>
        </div>`;
      }

      function appendSlice(count) {
        const slice = products.slice(shown, shown + count);
        if (!slice.length) return false;
        const html = slice.map(renderCard).join('');
        const wrap = d.createElement('div');
        wrap.innerHTML = html;
        // append node-by-node để giữ event bubbling gọn
        while (wrap.firstChild) ROOT.appendChild(wrap.firstChild);
        shown += slice.length;
        return slice.length > 0;
      }

      function updateButton() {
        if (shown >= products.length) {
          BTN.classList.add('is-done');
          BTN.innerHTML = `<span class="lm-text">Hết sản phẩm</span><span class="lm-sub">Đã hiển thị toàn bộ</span>`;
        }
      }

      // init
      appendSlice(PER_FIRST);
      updateButton();

      BTN?.addEventListener('click', function() {
        if (shown >= products.length) return;
        // hiệu ứng bấm
        const old = BTN.innerHTML;
        BTN.innerHTML = `<span class="lm-text">Đang tải...</span><span class="lm-sub">Vui lòng chờ</span>`;
        BTN.disabled = true;

        // mô phỏng tải nhanh (nếu muốn delay cảm giác) -> có thể bỏ setTimeout
        setTimeout(() => {
          appendSlice(PER_NEXT);
          BTN.disabled = false;
          BTN.innerHTML = old;
          updateButton();
        }, 150);
      });

      // Add to cart delegation (giữ nguyên logic hiện tại)
      d.addEventListener('click', e => {
        const btn = e.target.closest('.btn-add-cart');
        if (!btn) return;
        const id = btn.getAttribute('data-id');
        if (!id) return;

        // Nếu dùng bắt buộc đăng nhập, bạn có thể check AUTH ở đây (giống file dưới)
        w.SVStore?.addToCart?.(id, 1);
        w.SVUI?.updateCartCount?.();

        const prev = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = '<i class="fa fa-check"></i> Đã thêm';
        setTimeout(() => {
          btn.disabled = false;
          btn.innerHTML = prev;
        }, 900);
      });
    })(window, document);
  </script>
  <script>
/* ===== CHỐT CHẶN: Hover overlay đã có bằng CSS; click "Giỏ hàng" => bắt buộc đăng nhập ===== */
(function () {
  const LOGIN_URL = '/account/login.php';

  function redirectToLogin() {
    const back = location.pathname + location.search + location.hash;
    location.href = LOGIN_URL + '?redirect=' + encodeURIComponent(back);
  }

  // 1) Vá mọi anchor "quick-add" cũ trong overlay (nếu có) thành button
  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.product-action-grid a').forEach(a => {
      a.setAttribute('href', '#');
      a.setAttribute('role', 'button');
    });
  });

  // 2) Bắt mọi click vào các nút thêm giỏ trong overlay/card (trang chủ & toàn site)
  document.addEventListener('click', function (e) {
    const btn = e.target.closest('.btn-add-cart, .btn-cart, [data-add-to-cart], .js-add-to-cart, a.quick-add');
    if (!btn) return;

    e.preventDefault();
    if (typeof e.stopImmediatePropagation === 'function') e.stopImmediatePropagation();

    // Chưa đăng nhập -> ép đăng nhập
    if (!window.AUTH?.loggedIn) {
      alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!');
      redirectToLogin();
      return;
    }

    // Đã đăng nhập -> thêm vào giỏ
    const id =
      btn.dataset.id ||
      btn.getAttribute('data-id') ||
      ((btn.href || '').includes('id=') ? new URL(btn.href, location.origin).searchParams.get('id') : '');

    if (!id) return;

    window.SVStore?.addToCart?.(id, 1);
    window.dispatchEvent(new CustomEvent('cart:changed'));
    window.SVUI?.updateCartCount?.();

    // Phản hồi nhanh trên nút
    const prev = btn.innerHTML;
    btn.disabled = true;
    btn.innerHTML = '<i class="fa fa-check"></i> Đã thêm';
    setTimeout(() => {
      btn.disabled = false;
      btn.innerHTML = prev;
    }, 900);
  }, true);

  // 3) Chặn form mua nhanh (nếu có) khi chưa đăng nhập
  document.addEventListener('submit', function (e) {
    const form = e.target.closest('#buyForm, .js-buy-form');
    if (!form) return;
    if (!window.AUTH?.loggedIn) {
      e.preventDefault();
      if (typeof e.stopImmediatePropagation === 'function') e.stopImmediatePropagation();
      redirectToLogin();
    }
  }, true);

  // 4) Đồng bộ badge giỏ khi tab khác thay đổi
  function updateBadge() { window.SVUI?.updateCartCount?.(); }
  window.addEventListener('storage', (e) => {
    if (e.key && e.key.startsWith('sv_cart_user_')) updateBadge();
  });
  window.addEventListener('cart:changed', updateBadge);
})();
</script>
<!-- Welcome popup -->
<style>
  #sv-welcome-overlay{
    position:fixed;inset:0;display:none;align-items:center;justify-content:center;
    background:rgba(0,0,0,.35);z-index:9999;padding:16px
  }
  #sv-welcome{
    width:100%;max-width:420px;background:#fff;
    box-shadow:0 20px 50px rgba(16,24,40,.18);padding:28px;text-align:center
  }
  #sv-welcome h3{margin:0 0 8px;font:700 22px/1.3 Inter,system-ui,Arial,sans-serif;color:#111}
  #sv-welcome p{margin:0 0 16px;color:#444;font:400 15px/1.6 Inter,system-ui,Arial,sans-serif}
  #sv-welcome .btn{
    display:inline-block;padding:12px 18px;border:1px solid #e5e7eb;
    background:#111;color:#fff;text-decoration:none;font-weight:700
  }
  #sv-welcome .btn:hover{filter:brightness(.95)}
</style>
<div id="sv-welcome-overlay" aria-hidden="true">
  <div id="sv-welcome" role="dialog" aria-modal="true">
    <h3>Chào mừng <span id="sv-welcome-name">bạn</span> 👋</h3>
    <p>Tài khoản đã tạo thành công. Chúc bạn mua sắm vui vẻ tại <strong>Nobility 1800s</strong>!</p>
    <a href="#" class="btn" id="sv-welcome-close">Bắt đầu xem sản phẩm</a>
  </div>
</div>
<script>
(function(){
  const q = new URLSearchParams(location.search);
  const who = q.get('welcome');
  if(who){
    document.getElementById('sv-welcome-name').textContent = decodeURIComponent(who);
    const ov = document.getElementById('sv-welcome-overlay');
    ov.style.display = 'flex';
    document.getElementById('sv-welcome-close').addEventListener('click', function(e){
      e.preventDefault();
      ov.style.display = 'none';
      // Xoá ?welcome khỏi URL cho sạch
      const u = new URL(location.href);
      u.searchParams.delete('welcome');
      history.replaceState({}, '', u.pathname + (u.search ? '?'+u.searchParams.toString() : '') + u.hash);
    });
  }
})();
</script>
</body>