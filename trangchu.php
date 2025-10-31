<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <title>Trang bán sản phẩm sáp</title>
  <meta name="description" content="Cửa hàng sáp vuốt tóc – sản phẩm mới, ưu đãi, giao nhanh, đổi trả dễ dàng."/>

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" crossorigin="anonymous" referrerpolicy="no-referrer"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"/>

  <!-- Site CSS -->
  <link rel="stylesheet" href="/assets/css/base.css"/>
  <link rel="stylesheet" href="/assets/css/style.css"/>

  <style>
    /* ===== Variables & base ===== */
    :root {
      --bg:#fff; --text:#111; --muted:#6b7280; --line:#eceff3; --brand:#111;
      --radius:14px; --shadow-sm:0 6px 16px rgba(17,24,39,.08); --shadow-md:0 12px 28px rgba(17,24,39,.12);
      --ease:cubic-bezier(.22,1,.36,1);
      --container:1140px; --gap:24px;
    }
    *{box-sizing:border-box}
    body{font-family:Roboto,system-ui,-apple-system,Segoe UI,Arial,sans-serif;color:var(--text);margin:0}
    a{color:inherit;text-decoration:none}
    img{max-width:100%;height:auto;display:block}

    /* ===== Scoped layout for homepage only ===== */
    .page-main .container{max-width:1200px;margin:0 auto;padding:0 16px;position:relative}
    .page-main .container-pag{width:90%;max-width:1200px;margin:0 auto;padding:0 16px;position:relative}

    /* Policy strip */
    .policy-box{margin:10px 0}
    .policy-box .container{display:flex;gap:20px;justify-content:space-between}
    .policy-item{flex:1;background:#202020;border:1px solid #333;text-align:center;padding:5px;border-radius:4px}
    .policy-item span{display:block;border:1px solid #545454;line-height:40px;font-size:14px;color:#B8D0E0;text-transform:uppercase}

    /* Hero slider (single image for now) */
    .awe-section-2{margin:30px 0}
    .awe-section-2 .swiper-slide img{width:100%;height:auto;object-fit:cover}

    /* Three banners */
    .awe-section-3{padding:20px 0;background:#fff}
    .adv-row{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
    .adv_bottom_inner{border:1px solid #e6e6e6}
    .adv_bottom_inner img{border-radius:6px;transition:transform .25s ease,box-shadow .25s ease}
    .adv_bottom_inner a:hover img{transform:translateY(-2px)}

    /* Brand slider (simple) */
    .section-brand{background:#fff}
    .brand-slider{position:relative;display:flex;align-items:center;overflow:hidden}
    .slider-track{display:flex;transition:transform .4s ease}
    .slide{min-width:200px;margin:0 10px}
    .btn-1{background:#f3f4f6;color:#000;border:1px solid #e5e7eb;font-size:24px;padding:8px 12px;cursor:pointer;z-index:5}
    .prev{position:absolute;left:0}
    .next{position:absolute;right:0}

    /* Product grid */
    .row.equalize-cards{display:flex;flex-wrap:wrap;margin:-20px}
    .col{padding:20px}
    .col-3{width:25%}
    @media(max-width:991.98px){.col-3{width:50%}}
    @media(max-width:575.98px){.col-3{width:100%}}

    .product-box{background:var(--bg);border:1px solid var(--line);border-radius:var(--radius);overflow:hidden;box-shadow:var(--shadow-sm);transition:transform .35s var(--ease),box-shadow .35s var(--ease),border-color .35s;position:relative;display:flex;flex-direction:column;height:100%}
    .product-box:hover{box-shadow:var(--shadow-md);border-color:#e6ebf0}

    .product-thumbnail{position:relative;overflow:hidden;background:linear-gradient(180deg,#fafbfc 0%,#f7fafc 100%);aspect-ratio:1/1;display:flex;align-items:center;justify-content:center}
    .image_link{position:absolute;inset:0;display:flex}
    .image_link img{width:100%;height:100%;object-fit:contain;transition:transform .5s var(--ease),filter .4s var(--ease)}
    .product-box:hover .image_link img{transform:scale(1.03)}

    /* On-image CTA */
    .product-action-grid{position:absolute;left:0;right:0;bottom:0;z-index:5;opacity:0;transform:translateY(100%);pointer-events:none;transition:opacity .25s var(--ease),transform .25s var(--ease)}
    .product-thumbnail>.product-action-grid .btn-cart{display:block;width:100%;padding:12px 16px;border:0;border-radius:0;background:#111;color:#fff;font-weight:800}
    .product-box:hover .product-thumbnail>.product-action-grid{opacity:1;transform:translateY(0);pointer-events:auto}

    /* Labels */
    .product-label{position:absolute;left:12px;top:12px;display:flex;gap:8px}
    .product-label .label{font-size:12px;font-weight:700;letter-spacing:.04em;padding:6px 10px;background:#fff;color:#F00;border:1px #F00 solid;box-shadow:0 6px 16px rgba(0,0,0,.06)}

    /* Info */
    .product-info{padding:12px 14px 14px;display:flex;flex-direction:column;flex:1 1 auto}
    .product-name{margin:2px 0 8px;font-size:16px;line-height:1.35;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
    .product-name a{color:var(--text);background:linear-gradient(currentColor,currentColor) 0 100%/0 2px no-repeat;transition:background-size .35s var(--ease),color .35s var(--ease)}
    .product-name a:hover{color:#000;background-size:100% 2px}
    .price-box{margin-top:auto;display:flex;align-items:center;gap:10px;justify-content:center}
    .product-price{color:#ff0000;font-weight:800;font-size:17px}
    .product-price-old{color:var(--muted);font-size:14px;text-decoration:line-through}

    /* Section heading */
    .heading_spbc{display:flex;justify-content:center;margin:10px 0 30px}
    .heading_spbc .title-head{margin:0;font-size:22px}

    /* Pagination */
    .pagination-nav{display:flex;justify-content:center;padding:24px 0 16px}
    .pagination-list{display:flex;list-style:none;margin:0;padding:0;gap:12px}
    .page-item .page-link{display:block;padding:8px 12px;color:#333;font-size:15px;border:1px solid transparent}
    .page-item.active .page-link{color:#000;font-weight:700;border-bottom:2px solid #000}
    .page-item:not(.active) .page-link:hover{text-decoration:underline}

    /* Two banners (bottom) */
    .awe-section-6{padding:32px 0 48px}
    .content_banner{position:relative;margin-bottom:var(--gap)}
    .content_banner .des{position:absolute;left:16px;bottom:16px;box-shadow:0 10px 24px rgba(0,0,0,.08);border-radius:12px;padding:14px 16px;max-width:80%}
    .content_banner .des h4{margin:0 0 4px;font-size:20px;line-height:1.2}
    .content_banner .des h4 span{border-bottom:2px solid #fff;padding-bottom:2px;color:#fff;font-size:15px}
    .content_banner .des p{margin:6px 0 10px;color:#fff;font-size:12px}
    .content_banner .des a{font-weight:600;font-size:20px;color:#fff}
    .content_banner a img{width:100%;height:250px;object-fit:cover;border-radius:14px;transition:transform .4s ease}
    @media(min-width:576px){.content_banner a img{height:320px}}

    /* Mobile hoverless */
    @media(hover:none) and (pointer:coarse){
      .product-thumbnail>.product-action-grid{opacity:1;transform:none;pointer-events:auto}
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
                  <source media="(min-width:1200px)" srcset="/assets/images/z7061759418724_151ccf4ce48df7a11f28257e7b369660.jpg"/>
                  <source media="(min-width:992px)"  srcset="/assets/images/z7061759418724_151ccf4ce48df7a11f28257e7b369660.jpg"/>
                  <source media="(min-width:569px)"  srcset="/assets/images/z7061759418724_151ccf4ce48df7a11f28257e7b369660.jpg"/>
                  <img src="/assets/images/z7061759418724_151ccf4ce48df7a11f28257e7b369660.jpg" alt="Ưu đãi sáp vuốt tóc" class="img-responsive"/>
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
          <div class="adv_bottom_inner"><figure><a href="#" title="Dưỡng tóc"><img src="/assets/images/duong toc.webp" alt="Dưỡng tóc" loading="lazy"/></a></figure></div>
          <div class="adv_bottom_inner"><figure><a href="#" title="Gôm xịt tóc"><img src="/assets/images/gôm xịt tóc.webp" alt="Gôm xịt tóc" loading="lazy"/></a></figure></div>
          <div class="adv_bottom_inner"><figure><a href="#" title="Sáp vuốt tóc"><img src="/assets/images/sap2.webp" alt="Sáp vuốt tóc" loading="lazy"/></a></figure></div>
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
        <hr/>
      </div>
    </div>

    <!-- Products -->
    <section class="awe-section-5 section_new_product">
      <div class="container">
        <div class="heading_spbc">
          <h2 class="title-head"><a href="/san-pham-noi-bat" title="Sản phẩm mới">Sản phẩm mới</a></h2>
        </div>
        <div class="row equalize-cards" id="product-grid" data-featured="true"></div>
        <nav class="pagination-nav"><ul id="pagination" class="pagination-list"></ul></nav>
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
            <div class="des"><h4><span>Handmade</span></h4><p>Sáp thủ công hương thơm đặc trưng, giữ nếp cao.</p><a href="#" class="hidden-xs" title="Xem thêm">Xem thêm</a></div>
          </div>
          <div class="col col-6 content_banner">
            <a href="#" title="Bộ sưu tập mới"><img class="img-responsive lazyload" src="/assets/images/suu_tap.jpg" alt="Bộ sưu tập mới"></a>
            <div class="des"><h4><span>Bộ sưu tập mới</span></h4><p>Cập nhật liên tục By Vilain, Hanz de Fuko, Apestomen…</p><a href="#" class="hidden-xs" title="Xem thêm">Xem thêm</a></div>
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
  // ===== Brand slider (simple) =====
  (function(){
    const track=document.querySelector('.slider-track');
    const slides=document.querySelectorAll('.slide');
    const prev=document.querySelector('.prev');
    const next=document.querySelector('.next');
    if(!track||!slides.length) return;
    let index=0; const visible=4; const total=slides.length;
    const update=()=>{ const w=slides[0].offsetWidth+20; track.style.transform=`translateX(-${index*w}px)`; };
    next&&next.addEventListener('click',()=>{ index = (index < total - visible) ? index+1 : 0; update(); });
    prev&&prev.addEventListener('click',()=>{ index = (index>0) ? index-1 : Math.max(0,total-visible); update(); });
    window.addEventListener('resize',update); update();
  })();

  // ===== Products + Pagination (8 per page) =====
  (function(w,d){
    const ROOT=d.getElementById('product-grid'); if(!ROOT) return;
    const PAGING=d.getElementById('pagination');
    const PRODUCT_DETAIL_URL='/sanpham/pages/product_detail.php';

    // Source of products
    const all=(w.SVStore?.getAllProducts?.()||w.SV_PRODUCT_SEED||[]);
    const onlyFeatured = ROOT.getAttribute('data-featured')==='true';
    const products = onlyFeatured ? all.filter(p=>p.featured) : all;

    // Utils
    const fmt=n=>(Number(n)||0).toLocaleString('vi-VN')+'₫';
    const esc=s=>String(s||'').replace(/[&<>"']/g,m=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;','\'':'&#39;'}[m]));
    const badgeLabel=b=>{ const x=String(b||'').toLowerCase(); if(x==='sale')return'Sale'; if(x==='new')return'New'; if(x==='out_of_stock'||x==='oos')return'Hết hàng'; return''; };

    const renderCard=p=>{
      const badge=badgeLabel(p.badge);
      const old=(p.original_price && Number(p.original_price)>Number(p.price))?`<span class="price product-price-old">${fmt(p.original_price)}</span>`:'';
      return `<div class="col col-3">
        <div class="product-box">
          <div class="product-thumbnail">
            <a class="image_link" href="${PRODUCT_DETAIL_URL}?id=${encodeURIComponent(p.id)}">
              <img src="${esc(p.image)}" alt="${esc(p.name)}"/>
            </a>
            ${badge?`<div class="product-label"><strong class="label">${esc(badge)}</strong></div>`:''}
            <div class="product-action-grid">
              <button class="btn-cart btn-add-cart" data-id="${esc(p.id)}"><i class="fa fa-plus"></i> Giỏ hàng</button>
            </div>
          </div>
          <div class="product-info a-left">
            <h3 class="product-name"><a href="${PRODUCT_DETAIL_URL}?id=${encodeURIComponent(p.id)}">${esc(p.name)}</a></h3>
            <div class="price-box"><span class="price product-price">${fmt(p.price)}</span>${old}</div>
          </div>
        </div>
      </div>`;
    };

    const PER=8; const usp=new URLSearchParams(location.search);
    let page=Math.max(1,parseInt(usp.get('page')||'1',10));
    const total=products.length; const pages=Math.max(1,Math.ceil(total/PER));

    function setQueryParam(k,v){ const u=new URL(location.href); u.searchParams.set(k,v); return u.toString(); }

    function renderPagination(){
      if(!PAGING) return; if(pages<=1){ PAGING.innerHTML=''; PAGING.parentElement.style.display='none'; return; }
      PAGING.parentElement.style.display='flex';
      const items=[]; const li=(p,label,active=false,disabled=false)=>{
        const cls=['page-item',active?'active':'',disabled?'disabled':''].filter(Boolean).join(' ');
        const data=disabled?'':`data-page="${p}"`;
        return `<li class="${cls}"><a class="page-link" href="#" ${data}>${label}</a></li>`;
      };
      items.push(li(page-1,'‹',false,page===1));
      const win=2; let from=Math.max(1,page-win); let to=Math.min(pages,page+win);
      if(from>1){ items.push(li(1,'1',page===1)); if(from>2) items.push('<li class="page-item disabled"><span class="page-link">…</span></li>'); }
      for(let p=from;p<=to;p++) items.push(li(p,String(p),p===page));
      if(to<pages){ if(to<pages-1) items.push('<li class="page-item disabled"><span class="page-link">…</span></li>'); items.push(li(pages,String(pages),page===pages)); }
      items.push(li(page+1,'›',false,page===pages));
      PAGING.innerHTML=items.join('');
    }

    function renderPage(p){
      page=Math.min(Math.max(1,p),pages);
      const start=(page-1)*PER; const slice=products.slice(start,start+PER);
      ROOT.innerHTML=slice.map(renderCard).join('');
      renderPagination();
      const top=d.querySelector('.page-main')?.offsetTop||0; window.scrollTo({top,behavior:'smooth'});
      history.replaceState(null,'',setQueryParam('page',page));
    }

    d.addEventListener('click',e=>{ const a=e.target.closest('#pagination .page-link'); if(!a) return; e.preventDefault(); const p=parseInt(a.getAttribute('data-page'),10); if(!isNaN(p)) renderPage(p); });

    // Add to cart delegation
    d.addEventListener('click',e=>{ const btn=e.target.closest('.btn-add-cart'); if(!btn) return; const id=btn.getAttribute('data-id'); if(!id) return; w.SVStore?.addToCart?.(id,1); w.SVUI?.updateCartCount?.(); const old=btn.innerHTML; btn.disabled=true; btn.innerHTML='<i class="fa fa-check"></i> Đã thêm'; setTimeout(()=>{ btn.disabled=false; btn.innerHTML=old; },1200); });

    renderPage(page);
  })(window,document);

  // Lazyload (basic IO)
  (function(){
    const lazyImgs=[...document.querySelectorAll('img.lazyload')];
    if('IntersectionObserver' in window){
      const io=new IntersectionObserver((entries,obs)=>{
        entries.forEach(entry=>{ if(entry.isIntersecting){ const img=entry.target; const src=img.getAttribute('data-src'); if(src){ img.src=src; img.removeAttribute('data-src'); } img.classList.remove('lazyload'); obs.unobserve(img); } });
      },{rootMargin:'200px'});
      lazyImgs.forEach(img=>io.observe(img));
    } else {
      lazyImgs.forEach(img=>{ const src=img.getAttribute('data-src'); if(src) img.src=src; img.classList.remove('lazyload'); });
    }
  })();
  </script>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
<script src="/assets/js/auth.js"></script>

<!-- Các file còn lại -->
<script src="/assets/js/store.js"></script>
<script src="/assets/js/ui.js"></script>
<script src="/assets/js/products.seed.js"></script>
<script src="/assets/js/products.app.js"></script>