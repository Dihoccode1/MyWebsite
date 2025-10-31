<?php /* /sanpham/pages/sanpham.php */ ?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <title>Sản phẩm – Nobility 1800s</title>
  <meta name="description" content="Danh mục sản phẩm sáp – tìm kiếm, lọc theo phân loại/giá, sắp xếp và phân trang."/>

  <!-- Vendor -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" crossorigin="anonymous" referrerpolicy="no-referrer"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"/>

  <!-- Global site css -->
  <link rel="stylesheet" href="/assets/css/base.css"/>
  <link rel="stylesheet" href="/assets/css/style.css"/>

  <style>
    :root{
      --bg:#fff;--text:#111;--muted:#6b7280;--line:#eceff3;--brand:#111;
      --radius:14px;--shadow-sm:0 6px 16px rgba(17,24,39,.08);--shadow-md:0 12px 28px rgba(17,24,39,.12);
      --ease:cubic-bezier(.22,1,.36,1)
    }
    .page-main .container{max-width:1200px;margin:0 auto;padding:0 16px}
    .bread-crumb{padding:10px 0;border-bottom:1px solid #eee}
    .breadcrumb{list-style:none;margin:0;padding:0;display:flex;gap:8px;font-size:14px;background:transparent!important}
    .breadcrumb li{color:#666;display:flex;align-items:center}
    .breadcrumb li.home a{font-weight:600;color:#333}
    .breadcrumb .sep{color:#999}
    .breadcrumb li strong span{color:#000}

    /* Grid */
    .page-main .row.equalize-cards{display:flex;flex-wrap:wrap;margin:-20px}
    .page-main .col{padding:20px}
    .page-main .col-3{width:25%}
    @media(max-width:991.98px){.page-main .col-3{width:50%}}
    @media(max-width:575.98px){.page-main .col-3{width:100%}}

    /* Card */
    .page-main .product-box{background:var(--bg);border:1px solid var(--line);border-radius:var(--radius);overflow:hidden;box-shadow:var(--shadow-sm);
      transition:transform .35s var(--ease),box-shadow .35s var(--ease),border-color .35s;position:relative;display:flex;flex-direction:column;height:100%}
    .page-main .product-box:hover{box-shadow:var(--shadow-md);border-color:#e6ebf0}
    .page-main .product-thumbnail{position:relative;overflow:hidden;background:linear-gradient(180deg,#fafbfc 0%,#f7fafc 100%);aspect-ratio:1/1;display:flex;align-items:center;justify-content:center}
    .page-main .image_link{position:absolute;inset:0;display:flex}
    .page-main .image_link img{width:100%;height:100%;object-fit:contain;transition:transform .5s var(--ease)}
    .page-main .product-box:hover .image_link img{transform:scale(1.03)}

    /* CTA overlay (nút giỏ hàng) */
    .page-main .product-action-grid{position:absolute;left:0;right:0;bottom:0;z-index:5;opacity:0;transform:translateY(100%);pointer-events:none;transition:opacity .25s var(--ease),transform .25s var(--ease)}
    .page-main .product-thumbnail>.product-action-grid .btn-cart{display:block;width:100%;padding:12px 16px;border:0;border-radius:0;background:#111;color:#fff;font-weight:800}
    .page-main .product-box:hover .product-thumbnail>.product-action-grid{opacity:1;transform:translateY(0);pointer-events:auto}

    /* Label */
    .page-main .product-label{position:absolute;left:12px;top:12px;display:flex;gap:8px}
    .page-main .product-label .label{font-size:12px;font-weight:700;letter-spacing:.04em;padding:6px 10px;background:#fff;color:#f00;border:1px #f00 solid;box-shadow:0 6px 16px rgba(0,0,0,.06)}

    /* Info */
    .page-main .product-info{padding:12px 14px 14px;display:flex;flex-direction:column;flex:1 1 auto}
    .page-main .product-name{margin:2px 0 8px;font-size:16px;line-height:1.35;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
    .page-main .product-name a{color:var(--text);background:linear-gradient(currentColor,currentColor) 0 100%/0 2px no-repeat;transition:background-size .35s var(--ease),color .35s var(--ease)}
    .page-main .product-name a:hover{color:#000;background-size:100% 2px}
    .page-main .price-box{margin-top:auto;display:flex;align-items:center;gap:10px;justify-content:center}
    .page-main .product-price{color:#ff0000;font-weight:800;font-size:17px}
    .page-main .product-price-old{color:var(--muted);font-size:14px;text-decoration:line-through}

    /* Pagination */
    .page-main .pagination-nav{display:flex;justify-content:center;padding:24px 0 16px}
    .page-main .pagination-list{display:flex;list-style:none;margin:0;padding:0;gap:12px}
    .page-main .page-item .page-link{display:block;padding:8px 12px;color:#333;font-size:15px;border:1px solid transparent}
    .page-main .page-item.active .page-link{color:#000;font-weight:700;border-bottom:2px solid #000}
    .page-main .page-item:not(.active) .page-link:hover{text-decoration:underline}

    /* Search form (ngắn gọn) */
    #searchForm.sv-iso{display:grid;grid-template-columns:1.6fr 1.1fr .9fr .9fr 1fr auto;gap:12px;padding:16px;border:1px solid #e9eef5;border-radius:10px;background:#f8fafc}
    #searchForm.sv-iso input,#searchForm.sv-iso select{height:42px;border:1px solid #e7ecf2;border-radius:10px;padding:0 12px}
    #searchForm.sv-iso button{height:42px;border-radius:10px;padding:0 18px;font-weight:800;border:1px solid #111;background:#111;color:#fff}
    @media(max-width:992px){#searchForm.sv-iso{grid-template-columns:1fr 1fr 1fr 1fr}#searchForm.sv-iso #q{grid-column:1/-1}#searchForm.sv-iso button{grid-column:1/-1}}
    @media(max-width:576px){#searchForm.sv-iso{grid-template-columns:1fr}}
  </style>
</head>
<body>
  <?php /* nếu file này nằm ở /sanpham/pages/ thì dùng .../partials/ */ ?>
  <?php include __DIR__ . '/../partials/header.php'; ?>

  <section class="bread-crumb">
    <div class="container">
      <ul class="breadcrumb">
        <li class="home"><a href="/trangchu.php"><span>Trang chủ</span></a></li>
        <li class="sep"><i class="fa-solid fa-angle-right"></i></li>
        <li><strong><span>Sản phẩm</span></strong></li>
      </ul>
    </div>
  </section>

  <div class="page-main">
    <div class="container">
      <!-- Filter/Search bar -->
      <form id="searchForm" class="sv-iso mb-3" autocomplete="off">
        <input id="q" type="text" placeholder="Tìm theo tên sản phẩm..."/>
        <select id="category">
          <option value="all">Tất cả phân loại</option>
          <option value="hair_wax">Sáp vuốt tóc</option>
          <option value="volumizing_powder">Bột tạo phồng</option>
          <option value="hair_spray">Gôm xịt tóc</option>
          <option value="hair_conditioner">Dưỡng tóc</option>
        </select>
        <input id="priceMin" type="number" min="0" step="1000" placeholder="Giá từ (VND)"/>
        <input id="priceMax" type="number" min="0" step="1000" placeholder="đến (VND)"/>
        <select id="sort">
          <option value="">Sắp xếp</option>
          <option value="price-asc">Giá ↑</option>
          <option value="price-desc">Giá ↓</option>
          <option value="name-asc">Tên A→Z</option>
          <option value="name-desc">Tên Z→A</option>
        </select>
        <button type="submit">Tìm</button>
      </form>

      <!-- Grid -->
      <div class="row equalize-cards" id="product-grid"></div>

      <!-- Pagination -->
      <nav class="pagination-nav" aria-label="Page navigation">
        <ul id="pagination" class="pagination-list"></ul>
      </nav>
    </div>
  </div>

  <?php include __DIR__ . '/../partials/footer.php'; ?>

  <!-- Auth + Data + Store -->
  <script src="/assets/js/auth.js"></script>
  <script src="/assets/js/products.seed.js"></script>
  <script src="/assets/js/store.js"></script>
  <script src="/assets/js/ui.js"></script>
  <!-- (tuỳ chọn) app JS khác của bạn -->
  <!-- <script src="/assets/js/products.app.js"></script> -->

  <script>
  (function(w,d){
    const ROOT = d.getElementById('product-grid');
    const PAGING = d.getElementById('pagination');
    const FORM = d.getElementById('searchForm');
    const qEl = d.getElementById('q');
    const catEl = d.getElementById('category');
    const minEl = d.getElementById('priceMin');
    const maxEl = d.getElementById('priceMax');
    const sortEl = d.getElementById('sort');

    if(!ROOT) return;

    const PRODUCT_DETAIL_URL = '/sanpham/pages/product_detail.php';
    const all = (w.SVStore?.getAllProducts?.() || w.SV_PRODUCT_SEED || []).slice();

    const fmt = n => (Number(n)||0).toLocaleString('vi-VN') + '₫';
    const esc = s => String(s||'').replace(/[&<>"']/g,m=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m]));
    const badgeLabel = b => {
      const x = String(b||'').toLowerCase();
      if (x==='sale') return 'Sale';
      if (x==='new') return 'New';
      if (x==='out_of_stock' || x==='oos') return 'Hết hàng';
      return '';
    };

    // === HÀM CARD (đÃ SỬA HOÀN CHỈNH) ===
    function renderCard(p){
      const badge = badgeLabel(p.badge);
      const old = (p.original_price && Number(p.original_price) > Number(p.price))
        ? `<span class="price product-price-old">${fmt(p.original_price)}</span>` : '';
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

    // ==== Lọc + Sắp xếp ====
    function applyFilters(e){
      if (e) e.preventDefault();

      const q = (qEl.value||'').trim().toLowerCase();
      const cat = (catEl.value||'all');
      const min = Number(minEl.value||0);
      const max = Number(maxEl.value||0);
      const sort = (sortEl.value||'');

      let view = all.filter(p=>{
        if (q && !String(p.name||'').toLowerCase().includes(q)) return false;
        if (cat && cat!=='all' && String(p.category||'')!==cat) return false;
        if (min && Number(p.price)<min) return false;
        if (max && Number(p.price)>max) return false;
        return true;
      });

      if (sort==='price-asc') view.sort((a,b)=>Number(a.price)-Number(b.price));
      else if (sort==='price-desc') view.sort((a,b)=>Number(b.price)-Number(a.price));
      else if (sort==='name-asc') view.sort((a,b)=>String(a.name).localeCompare(String(b.name),'vi'));
      else if (sort==='name-desc') view.sort((a,b)=>String(b.name).localeCompare(String(a.name),'vi'));

      state.view = view;
      state.page = 1;
      renderPage();
    }

    // ==== Phân trang ====
    const state = { view: all.slice(), page: 1, per: 8 };

    function renderPagination(total, cur, per){
      const pages = Math.max(1, Math.ceil(total/per));
      if (!PAGING) return;
      if (pages <= 1){ PAGING.innerHTML=''; PAGING.parentElement.style.display='none'; return; }
      PAGING.parentElement.style.display='flex';

      const li = (p,label,active=false,disabled=false)=>{
        const cls=['page-item',active?'active':'',disabled?'disabled':''].filter(Boolean).join(' ');
        const data=disabled?'':`data-page="${p}"`;
        return `<li class="${cls}"><a class="page-link" href="#" ${data}>${label}</a></li>`;
      };

      let html='';
      const pagesCount = pages;
      html += li(cur-1,'‹',false,cur===1);
      const win=2; let from=Math.max(1,cur-win); let to=Math.min(pagesCount,cur+win);
      if(from>1){ html+=li(1,'1',cur===1); if(from>2) html+='<li class="page-item disabled"><span class="page-link">…</span></li>'; }
      for(let i=from;i<=to;i++) html+=li(i,String(i),i===cur);
      if(to<pagesCount){ if(to<pagesCount-1) html+='<li class="page-item disabled"><span class="page-link">…</span></li>'; html+=li(pagesCount,String(pagesCount),cur===pagesCount); }
      html += li(cur+1,'›',false,cur===pagesCount);

      PAGING.innerHTML = html;
    }

    function renderPage(){
      const {view, page, per} = state;
      const pages = Math.max(1, Math.ceil(view.length/per));
      const cur = Math.min(Math.max(1, page), pages);
      const start = (cur-1)*per;
      const slice = view.slice(start, start+per);

      ROOT.innerHTML = slice.map(renderCard).join('');
      renderPagination(view.length, cur, per);

      // cuộn lên đầu lưới
      const top = d.querySelector('.page-main')?.offsetTop || 0;
      window.scrollTo({top, behavior:'smooth'});
      state.page = cur;
    }

    FORM.addEventListener('submit', applyFilters);
    sortEl.addEventListener('change', applyFilters);

    d.addEventListener('click', (e)=>{
      const a = e.target.closest('#pagination .page-link');
      if (!a) return;
      e.preventDefault();
      const p = parseInt(a.getAttribute('data-page'),10);
      if (!isNaN(p)){ state.page = p; renderPage(); }
    });

    // Khởi tạo
    applyFilters();
  })(window,document);
  </script>

  <!-- ===== CHỐT CHẶN: bấm giỏ hàng phải đăng nhập ===== -->
  <script>
  (function () {
    const LOGIN_URL = '/account/login.php';
    function redirectToLogin() {
      const back = location.pathname + location.search + location.hash;
      location.href = LOGIN_URL + '?redirect=' + encodeURIComponent(back);
    }

    // Vá anchor cũ trong overlay (nếu lỡ còn <a href="/cart/...">)
    document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('.product-action-grid a').forEach(a => {
        a.setAttribute('href', '#');
        a.setAttribute('role', 'button');
      });
    });

    // Bắt mọi click "thêm giỏ"
    document.addEventListener('click', function (e) {
      const btn = e.target.closest('.btn-add-cart, .btn-cart, [data-add-to-cart], .js-add-to-cart, a.quick-add');
      if (!btn) return;

      e.preventDefault();
      if (typeof e.stopImmediatePropagation === 'function') e.stopImmediatePropagation();

      if (!window.AUTH?.loggedIn) { // CHƯA ĐĂNG NHẬP
        alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!');
        redirectToLogin();
        return;
      }

      const id =
        btn.dataset.id ||
        btn.getAttribute('data-id') ||
        ((btn.href || '').includes('id=') ? new URL(btn.href, location.origin).searchParams.get('id') : '');

      if (!id) return;

      window.SVStore?.addToCart?.(id, 1);
      window.dispatchEvent(new CustomEvent('cart:changed'));
      window.SVUI?.updateCartCount?.();

      const prev = btn.innerHTML;
      btn.disabled = true;
      btn.innerHTML = '<i class="fa fa-check"></i> Đã thêm';
      setTimeout(() => { btn.disabled = false; btn.innerHTML = prev; }, 900);
    }, true);

    // Chặn form mua nhanh (nếu có)
    document.addEventListener('submit', function (e) {
      const form = e.target.closest('#buyForm, .js-buy-form');
      if (!form) return;
      if (!window.AUTH?.loggedIn) {
        e.preventDefault();
        if (typeof e.stopImmediatePropagation === 'function') e.stopImmediatePropagation();
        redirectToLogin();
      }
    }, true);

    // Đồng bộ badge giỏ khi tab khác thay đổi
    function updateBadge() { window.SVUI?.updateCartCount?.(); }
    window.addEventListener('storage', (e) => { if (e.key && e.key.startsWith('sv_cart_user_')) updateBadge(); });
    window.addEventListener('cart:changed', updateBadge);
  })();
  </script>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
