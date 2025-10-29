<?php
$id = $_GET['id'] ?? '';
?>
<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/assets/css/base.css">
    <style>
        /* === Related products: đồng bộ kích thước === */
        .related-col {
            display: flex;
        }

        .related-card {
            display: flex;
            flex-direction: column;
            width: 100%;
            background: #fff;
            border: 1px solid #eef0f3;
            border-radius: 12px;
            overflow: hidden;
        }

        .related-card .img-wrap {
            width: 100%;
            aspect-ratio: 1 / 1;
            /* khung vuông */
            background: #fff;
            border-bottom: 1px solid #eef0f3;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
        }

        .related-card .img-wrap img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            /* ảnh không bị méo, luôn nằm gọn */
            display: block;
        }

        .related-card .rel-body {
            padding: 10px 12px;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .related-card .rel-name {
            font-size: 14px;
            color: #111;
            line-height: 1.35;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            /* cố định 2 dòng */
            min-height: 38px;
            /* chiều cao tên đồng đều */
        }

        .related-card .rel-price {
            font-weight: 800;
        }

        .pd-wrap {
            padding: 24px 0
        }

        .pd-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 8px
        }

        .pd-price {
            font-size: 20px;
            font-weight: 700
        }

        .pd-price .old {
            color: #777;
            text-decoration: line-through;
            margin-left: 8px;
            font-weight: 400
        }

        .badge-sale {
            background: #d9534f;
        }

        .badge-new {
            background: #28a745;
        }

        .badge-oos {
            background: #000;
        }

        .pd-badge {
            display: inline-block;
            color: #fff;
            font-size: 12px;
            padding: 4px 8px;
            border-radius: 4px;
            margin-right: 6px
        }

        .thumbs img {
            width: 64px;
            height: 64px;
            object-fit: cover;
            border: 1px solid #eee;
            border-radius: 6px;
            cursor: pointer;
            margin-right: 8px
        }

        .desc {
            white-space: pre-wrap
        }

        .specs dt {
            font-weight: 600
        }

        :root {
            --pd-radius: 14px;
            --pd-shadow: 0 10px 30px rgba(0, 0, 0, .08);
            --pd-border: #eef0f3;
            --pd-muted: #6b7280;
            --pd-primary: #0d6efd;
        }

        .pd-wrap {
            padding: 28px 0 40px;
        }

        .breadcrumb a {
            color: #111;
        }

        .breadcrumb .active {
            color: #6b7280;
        }

        .pd-card {
            background: #fff;
            border: 1px solid var(--pd-border);
            border-radius: var(--pd-radius);
            box-shadow: var(--pd-shadow);
            padding: 22px;
        }

        .pd-title {
            font-size: 26px;
            font-weight: 800;
            line-height: 1.25;
            margin: 2px 0 8px;
        }

        .pd-meta {
            color: var(--pd-muted);
            font-size: 13px;
        }

        .pd-badges .pd-badge {
            display: inline-block;
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            padding: 4px 8px;
            border-radius: 999px;
            margin-right: 8px;
        }

        .pd-badge.sale {
            background: #ef4444;
        }

        .pd-badge.new {
            background: #22c55e;
        }

        .pd-badge.oos {
            background: #111;
        }

        .pd-price {
            display: flex;
            align-items: flex-end;
            gap: 10px;
            margin: 10px 0 14px;
        }

        .pd-price .new {
            font-size: 28px;
            font-weight: 800;
            color: #111;
        }

        .pd-price .old {
            font-size: 16px;
            text-decoration: line-through;
            color: #9ca3af;
        }

        .pd-short {
            color: #374151;
            font-size: 15px;
        }

        .pd-spec-chips {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin: 12px 0 2px;
        }

        .pd-chip {
            font-size: 12px;
            color: #111;
            background: #f3f4f6;
            border: 1px solid #e5e7eb;
            padding: 5px 10px;
            border-radius: 999px;
        }

        .pd-actions {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-top: 16px;
        }

        .pd-qty {
            width: 110px;
        }

        .pd-trust {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            margin-top: 16px;
            color: var(--pd-muted);
            font-size: 13px;
        }

        .pd-trust i {
            margin-right: 6px;
        }

        .gallery {
            display: grid;
            grid-template-columns: 88px 1fr;
            gap: 16px;
        }

        @media (max-width: 767.98px) {
            .gallery {
                grid-template-columns: 1fr;
            }
        }

        .gallery-main {
            border: 1px solid var(--pd-border);
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
        }

        .gallery-main img {
            width: 100%;
            height: auto;
            display: block;
        }

        .gallery-thumbs {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-height: 520px;
            overflow: auto;
        }

        .gallery-thumbs img {
            width: 100%;
            aspect-ratio: 1/1;
            object-fit: cover;
            border: 1px solid var(--pd-border);
            border-radius: 10px;
            cursor: pointer;
            opacity: .8;
            transition: transform .2s, opacity .2s, border-color .2s;
        }

        .gallery-thumbs img:hover {
            transform: translateY(-2px);
            opacity: 1;
        }

        .gallery-thumbs img.active {
            border-color: var(--pd-primary);
            opacity: 1;
        }

        .related-card {
            background: #fff;
            border: 1px solid var(--pd-border);
            border-radius: 12px;
            overflow: hidden;
            transition: transform .15s, box-shadow .15s, border-color .15s;
        }

        .related-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--pd-shadow);
            border-color: #e5e7eb;
        }

        .related-card img {
            width: 100%;
            height: auto;
            display: block;
        }

        .related-body {
            padding: 10px 12px;
        }

        .related-name {
            font-size: 14px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: #111;
        }

        .related-price {
            font-weight: 800;
        }

        .tabs-card {
            margin-top: 24px;
            background: #fff;
            border: 1px solid var(--pd-border);
            border-radius: 12px;
            box-shadow: var(--pd-shadow);
        }

        .nav-tabs .nav-link {
            font-weight: 600;
        }

        .tab-pane {
            padding: 18px;
        }

        .specs dt {
            font-weight: 700;
            color: #111;
        }

        .specs dd {
            color: #374151;
        }

        /* Ảnh chính chi tiết sản phẩm */
        #mainImg {
            width: 300px;
            height: 300px;
            object-fit: contain;
            display: block;
            margin: 0 auto;
        }

        /* === Related products: fix thành 200px === */
        /* === Related products: fix thành 150px === */
        .related-col {
            display: flex;
        }

        .related-card {
            display: flex;
            flex-direction: column;
            width: 100%;
            background: #fff;
            border: 1px solid #eef0f3;
            border-radius: 12px;
            overflow: hidden;
        }

        .related-card .img-wrap {
            width: 100%;
            height: 200px;
            /* GIẢM XUỐNG 150 */
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            border-bottom: 1px solid #eef0f3;
            padding: 8px;
        }

        .related-card .img-wrap img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
    </style>

    </style>
</head>

<body>
    <?php
    // dùng tuyệt đối theo DOCUMENT_ROOT để tránh lệch cấp thư mục
    include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php';
    ?>

    <div class="container pd-wrap">
        <nav class="mb-3">
            <a href="/trangchu.php">Trang chủ</a> /
            <a href="/sanpham/sanpham.php">Sản phẩm</a> /
            <span id="bc-name">Chi tiết</span>
        </nav>

        <div id="pd-root" class="row">
            <!-- JS sẽ render vào đây -->
        </div>

        <hr>
        <h5 class="mb-3">Sản phẩm liên quan</h5>
        <div id="pd-related" class="row"></div>
    </div>


    <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>

       <!-- DATA + STORE -->
    <script src="/assets/js/products.seed.js"></script>
    <script src="/assets/js/store.js"></script>
    <!-- nên có nếu bạn đang dùng SVUI.updateCartCount() ở header -->
    <script src="/assets/js/ui.js"></script>

    <script>
    (function () {
      const usp = new URLSearchParams(location.search);
      const id  = usp.get('id') || '';

      // Lấy dữ liệu sản phẩm từ SVStore (seed đã nạp ở trên)
      const all = (window.SVStore?.getAllProducts?.() || window.SV_PRODUCT_SEED || []);
      const fmt = (window.SVStore?.fmtVND) ? window.SVStore.fmtVND : (n => (Number(n||0)).toLocaleString('vi-VN')+'₫');

      const p = all.find(x => x.id === id);
      const root = document.getElementById('pd-root');
      const bcName = document.getElementById('bc-name');

      if (!p) {
        root.innerHTML = '<div class="col-12"><div class="alert alert-warning">Không tìm thấy sản phẩm.</div></div>';
        return;
      }
      bcName.textContent = p.name;

      // Badge
      const badge = String(p.badge || '').toLowerCase();
      const badgeHtml =
        badge === 'sale' ? '<span class="pd-badge sale">Sale</span>' :
        badge === 'new'  ? '<span class="pd-badge new">Mới</span>'  :
        (badge === 'oos' || badge === 'out_of_stock') ? '<span class="pd-badge oos">Hết hàng</span>' : '';

      // Ảnh chính + thumbs
      const images = Array.isArray(p.images) && p.images.length ? p.images : [p.image];

      root.innerHTML = `
        <div class="col-md-5">
          <img id="mainImg" src="${images[0] || ''}" alt="${escapeHtml(p.name)}" class="img-fluid rounded border">
          <div class="thumbs mt-2 d-flex">
            ${images.map(src => `<img data-src="${src}" src="${src}" alt="">`).join('')}
          </div>
        </div>

        <div class="col-md-7">
          <div class="mb-2">${badgeHtml}</div>
          <h1 class="pd-title">${escapeHtml(p.name)}</h1>

          <div class="mb-2 text-muted">Mã: ${escapeHtml(p.id)}</div>
          <div class="pd-price mb-3">
            <span class="new">${fmt(p.price)}</span>
            ${p.original_price ? `<span class="old">${fmt(p.original_price)}</span>` : ''}
          </div>

          <div class="mb-3 desc">${p.description ? escapeHtml(p.description) : 'Đang cập nhật mô tả...'}</div>

          ${renderSpecs(p)}

          <div class="pd-actions">
            <input id="qty" type="number" min="1" value="1" class="form-control pd-qty" style="width:110px">
            <button id="btnAdd" class="btn btn-primary"
              ${ (badge==='oos'||badge==='out_of_stock') ? 'disabled' : '' }>
              <i class="fas fa-cart-plus"></i> Thêm vào giỏ
            </button>
          </div>

          <div class="pd-trust">
            <span><i class="fa-regular fa-circle-check"></i> Hàng chính hãng</span>
            <span><i class="fa-regular fa-clock"></i> Đổi trả 7 ngày</span>
            <span><i class="fa-solid fa-truck"></i> Giao nhanh nội thành</span>
          </div>
        </div>
      `;

      // Thumbs click → đổi ảnh lớn
      root.querySelectorAll('.thumbs img').forEach(t => {
        t.addEventListener('click', () => {
          document.getElementById('mainImg').src = t.dataset.src;
          root.querySelectorAll('.thumbs img').forEach(i => i.classList.remove('active'));
          t.classList.add('active');
        });
      });

      // ===== Thêm vào giỏ (THỐNG NHẤT CHUẨN) =====
      const CART_KEY = 'sv_cart_v1'; // cùng key với listing
      function addToCartLocal(id, qty) {
        // fallback khi không có SVStore
        try {
          const cart = JSON.parse(localStorage.getItem(CART_KEY) || '[]');
          const i = cart.findIndex(x => x.id === id);
          if (i >= 0) cart[i].qty = (cart[i].qty || 0) + qty;
          else cart.push({ id, qty });
          localStorage.setItem(CART_KEY, JSON.stringify(cart));
          // phát sự kiện để header & tab khác cập nhật
          window.dispatchEvent(new CustomEvent('cart:changed'));
        } catch {}
      }

      document.getElementById('btnAdd')?.addEventListener('click', () => {
        const qty = Math.max(1, Number(document.getElementById('qty').value) || 1);

        if (window.SVStore?.addToCart) {
          // chuẩn chính nếu SVStore có mặt
          window.SVStore.addToCart(p.id, qty);
        } else {
          // fallback local
          addToCartLocal(p.id, qty);
        }

        // Cập nhật badge header NGAY + đồng bộ đa tab
        window.dispatchEvent(new CustomEvent('cart:changed'));
        window.SVUI?.updateCartCount?.();

        // Feedback nhanh
        const btn = document.getElementById('btnAdd');
        const prev = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-check"></i> Đã thêm';
        setTimeout(() => { btn.disabled = false; btn.innerHTML = prev; }, 900);
      });

      // Sản phẩm liên quan (cùng category)
      const related = all.filter(x => x.category === p.category && x.id !== p.id).slice(0, 3);
      document.getElementById('pd-related').innerHTML = related.map(r => `
        <div class="col-6 col-md-4 related-col">
          <a href="/sanpham/pages/product_detail.php?id=${encodeURIComponent(r.id)}" class="related-card text-reset">
            <div class="img-wrap">
              <img src="${r.image}" alt="${escapeHtml(r.name)}">
            </div>
            <div class="related-body">
              <div class="related-name">${escapeHtml(r.name)}</div>
              <div class="related-price">${fmt(r.price)}</div>
            </div>
          </a>
        </div>
      `).join('');

      // ===== Helpers =====
      function renderSpecs(p) {
        const specs = p.specs || {};
        const keys = Object.keys(specs);
        if (!keys.length) return '';
        return `
          <h6 class="mt-3">Thông số</h6>
          <dl class="row specs">
            ${keys.map(k => `
              <dt class="col-sm-4">${escapeHtml(labelize(k))}</dt>
              <dd class="col-sm-8">${escapeHtml(String(specs[k]))}</dd>
            `).join('')}
          </dl>
        `;
      }
      function labelize(k) {
        return k.replace(/_/g, ' ').replace(/\b\w/g, c => c.toUpperCase());
      }
      function escapeHtml(s='') {
        return String(s).replace(/[&<>"']/g, m => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m]));
      }

      // Đồng bộ badge khi thêm từ tab khác (localStorage event)
      window.addEventListener('storage', (e) => { if (e.key === CART_KEY) window.SVUI?.updateCartCount?.(); });
      // Đồng bộ trong cùng tab qua custom event
      window.addEventListener('cart:changed', () => window.SVUI?.updateCartCount?.());
      // Khi vào trang, cập nhật ngay
      document.addEventListener('DOMContentLoaded', () => window.SVUI?.updateCartCount?.());
    })();
    </script>

</body>

</html>