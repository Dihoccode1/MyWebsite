
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
:root {
  --pd-radius: 10px;
  --pd-shadow: 0 6px 18px rgba(0,0,0,.05);
  --pd-border: #e5e7eb;
  --pd-muted: #6b7280;
  --pd-primary: #0d6efd;
}

body { background: #f9fafb; font-family: "Segoe UI", Roboto, sans-serif; }
.pd-wrap { padding: 24px 0 36px; }

/* === Card chính === */
.pd-card { background:#fff; border:1px solid var(--pd-border); box-shadow:var(--pd-shadow); padding:18px; }
.pd-title { font-size:22px; font-weight:700; line-height:1.3; margin:6px 0 10px; }
.pd-meta { color:var(--pd-muted); font-size:13px; }

/* === Badge === */
.pd-badges .pd-badge{ display:inline-block; color:#fff; font-size:11px; font-weight:700; padding:3px 8px; margin-right:6px; }
.pd-badge.sale{ background:#ef4444; }
.pd-badge.new{ background:#22c55e; }
.pd-badge.oos{ background:#6b7280; }

/* === Giá === */
.pd-price{ display:flex; align-items:flex-end; gap:8px; margin:10px 0 6px; flex-wrap: wrap; }
.pd-price .new{ font-size:24px; font-weight:800; color:#111; }
.pd-price .old{ font-size:14px; text-decoration:line-through; color:#9ca3af; }
.pd-price .off{ font-size:12px; font-weight:700; color:#ef4444; background:#fee2e2; padding:2px 6px; }

/* Stock line */
.pd-stock{ font-size:13px; color:#374151; margin-bottom:10px; }

/* === Mô tả & thông số === */
.pd-short{ color:#374151; font-size:14px; line-height:1.5; }
.specs dt{ font-weight:600; font-size:13px; }
.specs dd{ font-size:13px; color:#374151; }

/* === Tabs === */

.tab-pane ul{ padding-left:18px; }
.tab-pane li{ margin-bottom:6px; }

/* === Gallery === */
.gallery{ display:grid; grid-template-columns:80px 1fr; gap:12px; }
.gallery-main{ border:1px solid var(--pd-border); border-radius:10px; background:#fff; overflow:hidden; }
.gallery-main img{ width:100%; height:auto; display:block; }
.gallery-thumbs{ display:flex; flex-direction:column; gap:8px; max-height:400px; overflow:auto; }
.gallery-thumbs img{ width:100%; aspect-ratio:1/1; object-fit:cover; border:1px solid var(--pd-border); border-radius:8px; cursor:pointer; opacity:.8; transition:all .2s ease; }
.gallery-thumbs img:hover{ opacity:1; transform:scale(1.03); }
.gallery-thumbs img.active{ border-color:var(--pd-primary); opacity:1; }

/* === Nút và hành động === */
.pd-actions{ display:flex; gap:8px; align-items:center; margin-top:14px; flex-wrap: wrap; }
.pd-qty{ width:110px; font-size:14px; }
.pd-qty-hint{ font-size:12px; color:#6b7280; }
.btn{ font-size:14px; border-radius:6px; }

/* === Chính sách & cam kết === */
.pd-trust{ display:flex; gap:14px; flex-wrap:wrap; margin-top:14px; color:var(--pd-muted); font-size:13px; }
.pd-trust i{ margin-right:5px; }

/* === Sản phẩm liên quan === */
.related-col{ display:flex; }
.related-card{ display:flex; flex-direction:column; width:100%; background:#fff; border:1px solid var(--pd-border); border-radius:10px; overflow:hidden; transition:all .15s ease; }
.related-card:hover{ transform:translateY(-2px); box-shadow:var(--pd-shadow); border-color:#d1d5db; }
.related-card .img-wrap{ width:100%; height:180px; display:flex; align-items:center; justify-content:center; background:#fff; border-bottom:1px solid var(--pd-border); padding:8px; }
.related-card .img-wrap img{ max-width:100%; max-height:100%; object-fit:contain; }
.related-body{ padding:8px 10px; }
.related-name{ font-size:13.5px; color:#111; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
.related-price{ font-weight:700; font-size:14px; color:var(--pd-primary); }

/* ===== BREADCRUMB 3 CẤP – THỐNG NHẤT ===== */
.bread-crumb{padding:10px 0;border-bottom:1px solid #eee}
.bread-crumb .container{padding-left:0;padding-right:0}
.breadcrumb{ list-style:none; margin:0; padding:0; display:flex; align-items:center; gap:8px; font-size:13px; line-height:1.2; color:#6b7280; background:transparent!important; }
@media (min-width:768px){ .breadcrumb{font-size:14px} }
.breadcrumb li{display:flex;align-items:center;color:#666}
.breadcrumb .sep{color:#9aa3ae;display:inline-flex;align-items:center}
.breadcrumb .sep i{font-size:12px;line-height:1;margin:0 2px}
.breadcrumb a{ color:#111; text-decoration:none !important; transition:opacity .2s ease; }
.breadcrumb a:hover{ opacity:.85; text-decoration:none !important }
.breadcrumb li.home a{font-weight:600;color:#333}
.breadcrumb li a span{ text-decoration:none !important; }
.breadcrumb li strong span{ color:#000; font-weight:700; max-width:100%; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; display:inline-block; vertical-align:bottom; }
.breadcrumb i.fa-angle-right{margin:0 2px}
.breadcrumb li.home a{ font-weight:500; }
.breadcrumb li:nth-child(3) a{ font-weight:600; }
.breadcrumb li strong span{ font-weight:700; }

/* === Responsive === */
@media (min-width: 992px) { #mainImg { width: 400px; height: 400px; } .pd-title { font-size: 26px; } }
@media (max-width: 768px) {
  .gallery { grid-template-columns: 1fr; gap: 10px; }
  #mainImg { width: 100%; height: auto; }
  .related-card .img-wrap { height: 150px; }
}
/* ================== TABS: CHI TIẾT / HƯỚNG DẪN ================== */
/* Scope hẹp trong .pd-card để không ảnh hưởng chỗ khác */
.pd-card .nav-pills{ 
  display: flex; gap: 10px; flex-wrap: wrap; 
  margin-top: 14px; margin-bottom: 12px;
}
.pd-card .nav-pills .nav-link{

  padding: 8px 14px;
  font-weight: 600;
  font-size: 14px;
  color: #334155;                 /* chữ xám đậm */
  background: #f1f5f9;            /* nền xám nhạt */
  border: 1px solid #e2e8f0;      /* viền nhẹ */
  transition: .15s ease;
}
.pd-card .nav-pills .nav-link i{ margin-right: 6px; }
.pd-card .nav-pills .nav-link:hover{
  filter: brightness(0.98);
  transform: translateY(-1px);
}
.pd-card .nav-pills .nav-link.active{
  color: #fff;
  background: #2563eb;            /* xanh chính */
  border-color: #2563eb;
  box-shadow: 0 6px 16px rgba(37,99,235,.22);
}

/* Vùng nội dung của tabs */
.pd-card .tab-content{
  background: #fff;
  border: 1px solid #e6e8ef;
  padding: 14px 16px;
}
.pd-card .tab-content .tab-pane{ animation: pdFade .18s ease; }
@keyframes pdFade{ from{opacity:.6; transform: translateY(2px)} to{opacity:1; transform:none} }

/* Văn bản và danh sách trong tab */
.pd-card .tab-content p,
.pd-card .tab-content li{
  color:#334155;
  font-size: 14.5px;
  line-height: 1.65;
}

/* UL: gạch đầu dòng rõ ràng */
.pd-card .tab-content ul{
  padding-left: 18px; margin: 0;
}
.pd-card .tab-content ul li{ margin-bottom: 6px; }
.pd-card .tab-content ul li::marker{ color:#2563eb; }   /* đầu dòng màu xanh */

/* OL: số thứ tự nổi bật */
.pd-card .tab-content ol{
  padding-left: 20px; margin: 0;
}
.pd-card .tab-content ol li{ margin-bottom: 6px; }
.pd-card .tab-content ol li::marker{
  color:#2563eb; font-weight: 700;
}

/* Khoảng cách khi có nhiều đoạn */
.pd-card .tab-content p + ul,
.pd-card .tab-content p + ol{ margin-top: 6px; }

/* Mobile tối ưu chạm ngón tay */
@media (max-width: 575.98px){
  .pd-card .nav-pills{ gap:8px; }
  .pd-card .nav-pills .nav-link{ padding:8px 12px; font-size: 13.5px; }
  .pd-card .tab-content{ padding: 12px 12px; }
}

</style>
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php'; ?>

  <div class="container pd-wrap">
    <!-- Breadcrumb 3 cấp -->
    <section class="bread-crumb">
      <div class="container">
        <ul class="breadcrumb">
          <li class="home"><a href="/trangchu.php"><span>Trang chủ</span></a></li>
          <li class="sep"><i class="fa-solid fa-angle-right"></i></li>
          <li><a href="/sanpham/pages/sanpham.php"><span>Sản phẩm</span></a></li>
          <li class="sep"><i class="fa-solid fa-angle-right"></i></li>
          <li><strong><span id="bc-name">Chi tiết</span></strong></li>
        </ul>
      </div>
    </section>

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
      go(){
        const back = location.pathname + location.search + location.hash;
        location.href = this.URL + '?redirect=' + encodeURIComponent(back);
      }
    };

    const usp = new URLSearchParams(location.search);
    const id  = usp.get('id') || '';

    const all = (window.SVStore?.getAllProducts?.() || window.SV_PRODUCT_SEED || []);
    const fmt = window.SVStore?.fmtVND ? window.SVStore.fmtVND : n => (Number(n||0)).toLocaleString('vi-VN')+'₫';

    const root   = document.getElementById('pd-root');
    const bcName = document.getElementById('bc-name');

    // === Helpers (đã FIX hàm esc không còn lỗi đỏ) ===
    function toSentenceCase(s=''){ s=String(s).trim(); if(!s) return s; const low=s.toLowerCase(); return low.charAt(0).toUpperCase()+low.slice(1); }
    function esc(s = '') {
      return String(s).replace(/[&<>\"']/g, m => ({
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#39;'
      }[m]));
    }
    function labelize(k){ return toSentenceCase(String(k).replace(/_/g,' ').trim()); }
    function percentOff(p){
      const a=Number(p?.original_price||0), b=Number(p?.price||0);
      if (!a||!b||b>=a) return 0;
      return Math.round((1 - b/a)*100);
    }

    const p = all.find(x => x.id === id);
    if (!p) {
      root.innerHTML = '<div class="col-12"><div class="alert alert-warning">Không tìm thấy sản phẩm.</div></div>';
      return;
    }

    // Defaults cho field mới
    p.unit      = p.unit || (p.category?.includes('wax') ? 'hũ' : 'chai');
    p.quantity  = Number(p.quantity || 1);
    p.min_qty   = Math.max(1, Number(p.min_qty || 1));
    p.max_qty   = Math.max(p.min_qty, Number(p.max_qty || 99));
    p.stock     = Number(p.stock ?? 0);

    // Giới hạn theo tồn kho
    const effectiveMax = Math.max(0, Math.min(p.stock, p.max_qty));
    const isOOS = (String(p.badge||'').toLowerCase() === 'oos'
                || String(p.badge||'').toLowerCase() === 'out_of_stock'
                || p.stock <= 0);

    // Breadcrumb name
    bcName.textContent = toSentenceCase(p.name);

    const badge = String(p.badge||'').toLowerCase();
    const badgeHtml =
      badge==='sale' ? '<span class="pd-badge sale">Sale</span>' :
      badge==='new'  ? '<span class="pd-badge new">Mới</span>' :
      (isOOS)       ? '<span class="pd-badge oos">Hết hàng</span>' : '';

    const images = Array.isArray(p.images) && p.images.length ? p.images : [p.image].filter(Boolean);
    const firstImg = images[0] || 'https://placehold.co/800x800/png';
    const off = percentOff(p);

    // ====== RENDER MAIN ======
    root.innerHTML = `
      <div class="col-md-5">
        <div class="gallery">
          <div class="gallery-thumbs">
            ${images.map((src,i)=>`<img ${i===0?'class="active"':''} data-src="${esc(src)}" src="${esc(src)}" alt="${esc(toSentenceCase(p.name))}">`).join('')}
          </div>
          <div class="gallery-main">
            <img id="mainImg" src="${esc(firstImg)}" alt="${esc(toSentenceCase(p.name))}">
          </div>
        </div>
      </div>

      <div class="col-md-7">
        <div class="pd-card">
          <div class="mb-2 pd-badges">${badgeHtml}</div>
          <h1 class="pd-title">${esc(toSentenceCase(p.name))}</h1>
          <div class="pd-meta">Mã: ${esc(p.id)}</div>

          <div class="pd-price">
            <span class="new">${fmt(p.price)}</span>
            ${p.original_price ? `<span class="old">${fmt(p.original_price)}</span>` : ''}
            ${off>0 ? `<span class="off">-${off}%</span>` : ''}
          </div>

          <div class="pd-stock">
            ${isOOS ? `<span class="text-danger"><i class="fa-regular fa-circle-xmark"></i> Hết hàng</span>`
                    : `<span><i class="fa-regular fa-circle-check"></i> Còn ${p.stock} ${esc(p.unit)}</span>`}
            ${p.rating ? ` &nbsp;|&nbsp; <i class="fa-solid fa-star"></i> ${Number(p.rating).toFixed(1)} (${p.reviews_count||0} đánh giá)` : ''}
          </div>

          <div class="pd-short mb-2">${
            p.short_desc ? esc(toSentenceCase(p.short_desc))
                         : (p.description ? esc(toSentenceCase(p.description)) : 'Đang cập nhật mô tả...')
          }</div>

          ${renderSpecs(p)}

          <!-- Tabs: Chi tiết / Hướng dẫn -->
          ${renderTabs(p)}

          <div class="pd-actions">
            <div>
              <input id="qty" type="number"
                     class="form-control pd-qty"
                     value="${Math.min(Math.max(p.quantity, p.min_qty), effectiveMax || p.min_qty)}"
                     min="${p.min_qty}" max="${Math.max(effectiveMax, p.min_qty)}" step="1"
                     ${isOOS ? 'disabled' : ''}>
              <div id="qtyHint" class="pd-qty-hint">
                Đơn vị: ${esc(p.unit)} · Mua tối thiểu ${p.min_qty}${effectiveMax ? ` – tối đa ${effectiveMax}` : ''}.
              </div>
            </div>
            <button id="btnAdd" class="btn btn-primary" ${isOOS ? 'disabled' : ''}>
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

    // Thumbnails click
    root.querySelectorAll('.gallery-thumbs img').forEach(t=>{
      t.addEventListener('click',()=>{
        document.getElementById('mainImg').src = t.dataset.src;
        root.querySelectorAll('.gallery-thumbs img').forEach(i=>i.classList.remove('active'));
        t.classList.add('active');
      });
    });

    // Qty clamp theo min/max/stock
    const qtyEl = document.getElementById('qty');
    const hintEl = document.getElementById('qtyHint');
    function clampQty(){
      let v = Number(qtyEl.value||p.min_qty);
      if (Number.isNaN(v)) v = p.min_qty;
      if (effectiveMax > 0) v = Math.min(v, effectiveMax);
      v = Math.max(v, p.min_qty);
      qtyEl.value = v;
      // hint khi chạm giới hạn
      if (effectiveMax && v >= effectiveMax) {
        hintEl.innerHTML = `Đơn vị: ${esc(p.unit)} · Tối đa ${effectiveMax} theo tồn kho.`;
      } else {
        hintEl.innerHTML = `Đơn vị: ${esc(p.unit)} · Mua tối thiểu ${p.min_qty}${effectiveMax ? ` – tối đa ${effectiveMax}` : ''}.`;
      }
    }
    qtyEl?.addEventListener('change', clampQty);
    qtyEl?.addEventListener('input', clampQty);

    // Add to cart (ép login nếu chưa đăng nhập)
    document.getElementById('btnAdd')?.addEventListener('click', ()=>{
      if (!window.AUTH?.loggedIn) {
        alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!');
        Login.go();
        return;
      }
      clampQty();
      const qty = Math.max(1, Number(document.getElementById('qty').value)||1);
      if (effectiveMax && qty > effectiveMax) { alert(`Số lượng tối đa cho sản phẩm này là ${effectiveMax}.`); return; }

      if (window.SVStore?.addToCart) {
        window.SVStore.addToCart(p.id, qty);
      } else {
        // fallback local
        try {
          const KEY='sv_cart_v1';
          const cart = JSON.parse(localStorage.getItem(KEY)||'[]');
          const i = cart.findIndex(x=>x.id===p.id);
          const newQty = (i>=0 ? (cart[i].qty||0) : 0) + qty;
          if (effectiveMax && newQty > effectiveMax) { alert(`Giới hạn ${effectiveMax} ${p.unit} cho sản phẩm này.`); return; }
          if (i>=0) cart[i].qty = newQty; else cart.push({id:p.id, qty});
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
          <div class="img-wrap"><img src="${esc(r.image||'https://placehold.co/600x600/png')}" alt="${esc(toSentenceCase(r.name))}"></div>
          <div class="related-body">
            <div class="related-name">${esc(toSentenceCase(r.name))}</div>
            <div class="related-price">${fmt(r.price)}</div>
          </div>
        </a>
      </div>
    `).join('');

    // == Renders ==
    function renderSpecs(prod){
      const specs = prod.specs||{}; const keys = Object.keys(specs);
      if (!keys.length) return '';
      return `
        <h6 class="mt-3">${esc(toSentenceCase('thông số'))}</h6>
        <dl class="row specs">
          ${keys.map(k=>`
            <dt class="col-sm-4">${esc(labelize(k))}</dt>
            <dd class="col-sm-8">${esc(String(specs[k]))}</dd>
          `).join('')}
        </dl>
      `;
    }

    function renderTabs(prod){
      const hasDetails = Array.isArray(prod.details) && prod.details.length;
      const hasUsage   = Array.isArray(prod.usage)   && prod.usage.length;
      const longDesc   = prod.long_desc ? `<p>${esc(prod.long_desc)}</p>` : '';

      const detailsHTML = hasDetails
        ? `<ul>${prod.details.map(d=>`<li>${esc(d)}</li>`).join('')}</ul>`
        : (longDesc || '<p>Đang cập nhật nội dung chi tiết…</p>');

      const usageHTML = hasUsage
        ? `<ol>${prod.usage.map(u=>`<li>${esc(u)}</li>`).join('')}</ol>`
        : '<p>Đang cập nhật hướng dẫn sử dụng…</p>';

      return `
        <hr/>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="pills-details-tab" data-toggle="pill" href="#pills-details" role="tab" aria-controls="pills-details" aria-selected="true">
              <i class="fa-regular fa-file-lines"></i> Chi tiết
            </a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="pills-usage-tab" data-toggle="pill" href="#pills-usage" role="tab" aria-controls="pills-usage" aria-selected="false">
              <i class="fa-solid fa-list-check"></i> Hướng dẫn sử dụng
            </a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab">
            ${detailsHTML}
          </div>
          <div class="tab-pane fade" id="pills-usage" role="tabpanel" aria-labelledby="pills-usage-tab">
            ${usageHTML}
          </div>
        </div>
      `;
    }

    // Đồng bộ badge giỏ
    window.addEventListener('storage', e => { if (e.key && e.key.startsWith('sv_cart')) window.SVUI?.updateCartCount?.(); });
    window.addEventListener('cart:changed', ()=> window.SVUI?.updateCartCount?.());
    document.addEventListener('DOMContentLoaded', ()=> window.SVUI?.updateCartCount?.());
  })();
  </script>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
