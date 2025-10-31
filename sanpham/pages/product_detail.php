<?php
/* /sanpham/pages/product_detail.php */
$id = $_GET['id'] ?? '';
?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Chi tiết sản phẩm</title>

  <!-- Vendor -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer"/>

  <!-- Site CSS (ưu tiên base trước style) -->
  <link rel="stylesheet" href="/assets/css/base.css">
  <link rel="stylesheet" href="/assets/css/style.css">

  <style>
    :root{
      --pd-radius:14px;--pd-shadow:0 10px 30px rgba(0,0,0,.08);
      --pd-border:#eef0f3;--pd-muted:#6b7280;--pd-primary:#0d6efd;
    }

    .pd-wrap{padding:28px 0 40px}
    .breadcrumb a{color:#111} .breadcrumb .active{color:#6b7280}

    .pd-card{background:#fff;border:1px solid var(--pd-border);border-radius:var(--pd-radius);
      box-shadow:var(--pd-shadow);padding:22px}

    .pd-title{font-size:26px;font-weight:800;line-height:1.25;margin:2px 0 8px}
    .pd-meta{color:var(--pd-muted);font-size:13px}

    .pd-badges .pd-badge{display:inline-block;color:#fff;font-size:12px;font-weight:700;
      padding:4px 8px;border-radius:999px;margin-right:8px}
    .pd-badge.sale{background:#ef4444}
    .pd-badge.new{background:#22c55e}
    .pd-badge.oos{background:#111}

    .pd-price{display:flex;align-items:flex-end;gap:10px;margin:10px 0 14px}
    .pd-price .new{font-size:28px;font-weight:800;color:#111}
    .pd-price .old{font-size:16px;text-decoration:line-through;color:#9ca3af}

    .pd-short{color:#374151;font-size:15px}
    .pd-spec-chips{display:flex;flex-wrap:wrap;gap:8px;margin:12px 0 2px}
    .pd-chip{font-size:12px;color:#111;background:#f3f4f6;border:1px solid #e5e7eb;padding:5px 10px;border-radius:999px}

    .pd-actions{display:flex;gap:10px;align-items:center;margin-top:16px}
    .pd-qty{width:110px}

    .pd-trust{display:flex;gap:16px;flex-wrap:wrap;margin-top:16px;color:var(--pd-muted);font-size:13px}
    .pd-trust i{margin-right:6px}

    /* Gallery */
    .gallery{display:grid;grid-template-columns:88px 1fr;gap:16px}
    @media(max-width:767.98px){.gallery{grid-template-columns:1fr}}
    .gallery-main{border:1px solid var(--pd-border);border-radius:12px;overflow:hidden;background:#fff}
    .gallery-main img{width:100%;height:auto;display:block}
    .gallery-thumbs{display:flex;flex-direction:column;gap:10px;max-height:520px;overflow:auto}
    .gallery-thumbs img{width:100%;aspect-ratio:1/1;object-fit:cover;border:1px solid var(--pd-border);border-radius:10px;cursor:pointer;opacity:.8;transition:transform .2s,opacity .2s,border-color .2s}
    .gallery-thumbs img:hover{transform:translateY(-2px);opacity:1}
    .gallery-thumbs img.active{border-color:var(--pd-primary);opacity:1}

    /* Ảnh chính nếu không dùng gallery lưới */
    #mainImg{width:300px;height:300px;object-fit:contain;display:block;margin:0 auto}

    /* Related products */
    .related-col{display:flex}
    .related-card{display:flex;flex-direction:column;width:100%;background:#fff;border:1px solid var(--pd-border);
      border-radius:12px;overflow:hidden;transition:transform .15s, box-shadow .15s, border-color .15s}
    .related-card:hover{transform:translateY(-3px);box-shadow:var(--pd-shadow);border-color:#e5e7eb}
    .related-card .img-wrap{width:100%;height:200px;display:flex;align-items:center;justify-content:center;background:#fff;border-bottom:1px solid var(--pd-border);padding:8px}
    .related-card .img-wrap img{max-width:100%;max-height:100%;object-fit:contain}
    .related-body{padding:10px 12px}
    .related-name{font-size:14px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;color:#111}
    .related-price{font-weight:800}
/* === Tăng size cho phù hợp (desktop-first) === */
@media (min-width: 992px){
  /* Ảnh chính lớn hơn */
  #mainImg{
    width: 480px;
    height: 480px;
  }
  /* Gallery: cột thumbnail rộng hơn */
  .gallery{
    grid-template-columns: 112px 1fr;
    gap: 20px;
  }
  .gallery-thumbs img{
    border-radius: 12px;
  }

  /* Chữ lớn & thoáng hơn */
  .pd-card{ padding: 26px; }
  .pd-title{ font-size: 32px; }
  .pd-price .new{ font-size: 34px; }
  .pd-price .old{ font-size: 18px; }

  /* Sản phẩm liên quan: khung ảnh cao hơn */
  .related-card .img-wrap{ height: 240px; }
  .related-name{ font-size: 15px; }
}

/* Tablet: vừa mắt */
@media (min-width: 576px) and (max-width: 991.98px){
  #mainImg{ width: 380px; height: 380px; }
  .gallery{ grid-template-columns: 96px 1fr; gap: 16px; }
  .related-card .img-wrap{ height: 200px; }
}

/* Mobile: tự co cho gọn màn hình */
@media (max-width: 575.98px){
  #mainImg{ width: 100%; height: auto; }
  .gallery{ grid-template-columns: 1fr; gap: 12px; }
  .related-card .img-wrap{ height: 160px; }
}

  </style>
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

  <div class="container pd-wrap">
    <nav class="mb-3">
      <a href="/trangchu.php">Trang chủ</a> /
      <a href="/sanpham/pages/sanpham.php">Sản phẩm</a> /
      <span id="bc-name">Chi tiết</span>
    </nav>

    <div id="pd-root" class="row"><!-- JS render --></div>

    <hr>
    <h5 class="mb-3">Sản phẩm liên quan</h5>
    <div id="pd-related" class="row"></div>
  </div>

  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'; ?>

  <!-- Auth + Data + Store -->
  <script src="/assets/js/auth.js"></script>
  <script src="/assets/js/products.seed.js"></script>
  <script src="/assets/js/store.js"></script>
  <script src="/assets/js/ui.js"></script>

  <script>
  (function(){
    const Login = {
      URL: '/account/login.php',
      go(){ const back = location.pathname + location.search + location.hash;
            location.href = this.URL + '?redirect=' + encodeURIComponent(back); }
    };

    const usp = new URLSearchParams(location.search);
    const id  = usp.get('id') || '';

    const all = (window.SVStore?.getAllProducts?.() || window.SV_PRODUCT_SEED || []);
    const fmt = window.SVStore?.fmtVND ? window.SVStore.fmtVND : n => (Number(n||0)).toLocaleString('vi-VN')+'₫';

    const root   = document.getElementById('pd-root');
    const bcName = document.getElementById('bc-name');

    const p = all.find(x => x.id === id);
    if (!p) {
      root.innerHTML = '<div class="col-12"><div class="alert alert-warning">Không tìm thấy sản phẩm.</div></div>';
      return;
    }
    bcName.textContent = p.name;

    const badge = String(p.badge||'').toLowerCase();
    const badgeHtml =
      badge==='sale' ? '<span class="pd-badge sale">Sale</span>' :
      badge==='new'  ? '<span class="pd-badge new">Mới</span>' :
      (badge==='oos'||badge==='out_of_stock') ? '<span class="pd-badge oos">Hết hàng</span>' : '';

    const images = Array.isArray(p.images) && p.images.length ? p.images : [p.image].filter(Boolean);
    const firstImg = images[0] || 'https://placehold.co/800x800/png';

    root.innerHTML = `
      <div class="col-md-5">
        <div class="gallery">
          <div class="gallery-thumbs">
            ${images.map((src,i)=>`<img ${i===0?'class="active"':''} data-src="${esc(src)}" src="${esc(src)}" alt="${esc(p.name)}">`).join('')}
          </div>
          <div class="gallery-main">
            <img id="mainImg" src="${esc(firstImg)}" alt="${esc(p.name)}">
          </div>
        </div>
      </div>

      <div class="col-md-7">
        <div class="pd-card">
          <div class="mb-2 pd-badges">${badgeHtml}</div>
          <h1 class="pd-title">${esc(p.name)}</h1>
          <div class="pd-meta">Mã: ${esc(p.id)}</div>

          <div class="pd-price">
            <span class="new">${fmt(p.price)}</span>
            ${p.original_price ? `<span class="old">${fmt(p.original_price)}</span>` : ''}
          </div>

          <div class="pd-short mb-2">${p.short_desc ? esc(p.short_desc) : (p.description ? esc(p.description) : 'Đang cập nhật mô tả...')}</div>

          ${renderSpecs(p)}

          <div class="pd-actions">
            <input id="qty" type="number" min="1" value="1" class="form-control pd-qty">
            <button id="btnAdd" class="btn btn-primary" ${ (badge==='oos'||badge==='out_of_stock') ? 'disabled' : '' }>
              <i class="fas fa-cart-plus"></i> Thêm vào giỏ
            </button>
          </div>

          <div class="pd-trust">
            <span><i class="fa-regular fa-circle-check"></i> Hàng chính hãng</span>
            <span><i class="fa-regular fa-clock"></i> Đổi trả 7 ngày</span>
            <span><i class="fa-solid fa-truck"></i> Giao nhanh nội thành</span>
          </div>
        </div>
      </div>
    `;

    // thumbs click → đổi ảnh
    root.querySelectorAll('.gallery-thumbs img').forEach(t=>{
      t.addEventListener('click',()=>{
        document.getElementById('mainImg').src = t.dataset.src;
        root.querySelectorAll('.gallery-thumbs img').forEach(i=>i.classList.remove('active'));
        t.classList.add('active');
      });
    });

    // Add to cart (ép login nếu chưa đăng nhập)
    document.getElementById('btnAdd')?.addEventListener('click', ()=>{
      // Ép đăng nhập
      if (!window.AUTH?.loggedIn) {
        alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!');
        Login.go();
        return;
      }

      const qty = Math.max(1, Number(document.getElementById('qty').value)||1);

      if (window.SVStore?.addToCart) {
        window.SVStore.addToCart(p.id, qty);
      } else {
        // fallback local
        try {
          const KEY='sv_cart_v1';
          const cart = JSON.parse(localStorage.getItem(KEY)||'[]');
          const i = cart.findIndex(x=>x.id===p.id);
          if (i>=0) cart[i].qty = (cart[i].qty||0)+qty; else cart.push({id:p.id, qty});
          localStorage.setItem(KEY, JSON.stringify(cart));
        } catch {}
      }

      // Cập nhật UI
      window.dispatchEvent(new CustomEvent('cart:changed'));
      window.SVUI?.updateCartCount?.();

      const btn = document.getElementById('btnAdd');
      const prev = btn.innerHTML;
      btn.disabled = true;
      btn.innerHTML = '<i class="fas fa-check"></i> Đã thêm';
      setTimeout(()=>{ btn.disabled=false; btn.innerHTML = prev; }, 900);
    });

    // Related (cùng category, khác id)
    const related = all.filter(x=>x.category===p.category && x.id!==p.id).slice(0,3);
    document.getElementById('pd-related').innerHTML = related.map(r=>`
      <div class="col-6 col-md-4 related-col">
        <a href="/sanpham/pages/product_detail.php?id=${encodeURIComponent(r.id)}" class="related-card text-reset">
          <div class="img-wrap"><img src="${esc(r.image||'https://placehold.co/600x600/png')}" alt="${esc(r.name)}"></div>
          <div class="related-body">
            <div class="related-name">${esc(r.name)}</div>
            <div class="related-price">${fmt(r.price)}</div>
          </div>
        </a>
      </div>
    `).join('');

    // Helpers
    function esc(s=''){return String(s).replace(/[&<>"']/g,m=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m]));}
    function labelize(k){return String(k).replace(/_/g,' ').replace(/\b\w/g,c=>c.toUpperCase());}
    function renderSpecs(prod){
      const specs = prod.specs||{}; const keys = Object.keys(specs);
      if (!keys.length) return '';
      return `
        <h6 class="mt-3">Thông số</h6>
        <dl class="row specs">
          ${keys.map(k=>`
            <dt class="col-sm-4">${esc(labelize(k))}</dt>
            <dd class="col-sm-8">${esc(String(specs[k]))}</dd>
          `).join('')}
        </dl>
      `;
    }

    // Đồng bộ badge giỏ giữa tab & trong tab
    window.addEventListener('storage', e => { if (e.key && e.key.startsWith('sv_cart')) window.SVUI?.updateCartCount?.(); });
    window.addEventListener('cart:changed', ()=> window.SVUI?.updateCartCount?.());
    document.addEventListener('DOMContentLoaded', ()=> window.SVUI?.updateCartCount?.());
  })();
  </script>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
