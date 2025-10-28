<?php /* sanpham_moi.php */ ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="/assets/css/style.css"/>
  <link rel="stylesheet" href="/assets/css/base.css"/>
  <title>Sản phẩm mới</title>

  <style>
    /* Breadcrumbs */
    .breadcrumbs{padding:15px 0;font-size:13px;color:#777}
    .breadcrumbs a{color:#333}

    /* View controls */
    .view-controls{display:flex;justify-content:space-between;align-items:center;padding:15px 0}
    .form-control{padding:8px 12px;border:1px solid #ccc;font-size:13px}

    /* Product grid */
    .product-list{padding-top:30px}
    .product-item{text-align:center;margin-bottom:30px;border:1px solid #eee;border-radius:6px;padding:12px;transition:.2s}
    .product-item:hover{box-shadow:0 6px 16px rgba(0,0,0,.06);border-color:#ddd}
    .product-item a{text-decoration:none;color:#333;display:flex;flex-direction:column;height:100%}
    .product-image{position:relative;margin-bottom:12px;overflow:hidden}
    .product-image img{width:100%;height:auto;display:block;transition:transform .3s}
    .product-item:hover .product-image img{transform:scale(1.05)}
    .product-badge{position:absolute;top:10px;padding:4px 8px;color:#fff;font-size:11px;font-weight:700;text-transform:uppercase}
    .badge-sale{right:10px;background:#d9534f}
    .badge-out-of-stock{left:10px;background:#000}
    .badge-new{right:10px;background:#2e7d32}

    .product-name{font-size:14px;margin:6px 0 8px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
    .product-price .sale-price{color:#d00;font-weight:700;font-size:15px}
    .product-price .original-price{color:#888;text-decoration:line-through;margin-left:8px;font-size:13px}

    /* Pagination */
    .pagination-nav{display:flex;justify-content:center;padding:24px 0 16px}
    .pagination-list{display:flex;list-style:none;margin:0;padding:0;gap:12px}
    .page-item .page-link{display:block;padding:8px 12px;text-decoration:none;color:#333;font-size:15px;border:1px solid transparent}
    .page-item.active .page-link{color:#000;font-weight:700;border-bottom:2px solid #000}
    .page-item:not(.active) .page-link:hover{text-decoration:underline}
  </style>
</head>
<body>
  <?php include __DIR__ . '/../partials/header.php'; ?>

  <div class="container">
    <nav class="breadcrumbs">
      <a href="/trangchu.php">Trang chủ</a> / <span>Sản phẩm mới</span>
    </nav>
    <hr/>

    <!-- Form tìm kiếm / lọc -->
    <form id="newSearchForm" class="form-inline mb-2">
      <input id="q" class="form-control mr-2" placeholder="Tìm theo tên..."/>
      <select id="category" class="form-control mr-2">
        <option value="all">Tất cả</option>
        <option value="hair_wax">Sáp vuốt tóc</option>
        <option value="hair_spray">Gôm xịt tóc</option>
        <option value="hair_conditioner">Dưỡng tóc</option>
        <option value="volumizing_powder">Bột tạo phồng</option>
      </select>
      <input id="priceMin" class="form-control mr-2" type="number" min="0" placeholder="Giá từ"/>
      <input id="priceMax" class="form-control mr-2" type="number" min="0" placeholder="Giá đến"/>
      <select id="sort" class="form-control mr-2">
        <option value="">Sắp xếp</option>
        <option value="price-asc">Giá tăng dần</option>
        <option value="price-desc">Giá giảm dần</option>
        <option value="name-asc">Tên A→Z</option>
        <option value="name-desc">Tên Z→A</option>
      </select>
      <button class="btn btn-primary">Tìm</button>
    </form>

    <!-- Grid -->
    <div class="product-list">
      <div id="product-grid" class="row"></div>
    </div>

    <!-- Pagination -->
    <nav class="pagination-nav" aria-label="Page navigation">
      <ul id="pagination" class="pagination-list"></ul>
    </nav>
  </div>

  <?php include __DIR__ . '/../partials/footer.php'; ?>

  <!-- Dữ liệu & Store -->
  <script src="/assets/js/products.seed.js"></script>
  <script src="/assets/js/store.js"></script>

  <!-- Trang "Sản phẩm mới" tự render -->
  <script>
    (function () {
      const fmtVND = n => (n || n === 0) ? Number(n).toLocaleString('vi-VN') + '₫' : '';
      const toNumber = v => typeof v === 'number' ? v : Number(String(v).replace(/[^\d]/g,'')) || 0;

      function normalizeBadge(p){
        if(!p || !p.badge) return '';
        const b = String(p.badge).toLowerCase().trim();
        if (b === 'sale') return 'sale';
        if (b === 'new') return 'new';
        if (b === 'oos' || b === 'out_of_stock') return 'out_of_stock';
        return '';
      }

      // Base chỉ lấy sản phẩm có badge "new"
      function getNewBase(){
        const all = (window.SVStore?.getAllProducts?.() || window.SV_PRODUCT_SEED || []);
        return all.filter(p => normalizeBadge(p) === 'new');
      }

      function filterProducts(list, { q, category, minPrice, maxPrice }) {
        let rs = list.slice();
        if (q && q.trim()){
          const kw = q.trim().toLowerCase();
          rs = rs.filter(p => (p.name||'').toLowerCase().includes(kw));
        }
        if (category && category !== 'all'){
          const c = category.toLowerCase();
          rs = rs.filter(p => (p.category||'').toLowerCase() === c);
        }
        if (minPrice !== '' && minPrice != null){
          const min = Math.max(0, toNumber(minPrice));
          rs = rs.filter(p => toNumber(p.price) >= min);
        }
        if (maxPrice !== '' && maxPrice != null){
          const max = Math.max(0, toNumber(maxPrice));
          rs = rs.filter(p => toNumber(p.price) <= max);
        }
        return rs;
      }

      function sortProducts(list, sort){
        if (!sort) return list;
        const [key, dir] = String(sort).split('-'); // price|name, asc|desc
        const dirN = dir === 'desc' ? -1 : 1;
        return list.slice().sort((a,b)=>{
          if (key === 'price') return (toNumber(a.price)-toNumber(b.price)) * dirN;
          if (key === 'name')  return String(a.name).localeCompare(String(b.name), 'vi') * dirN;
          return 0;
        });
      }

      function paginate(list, page=1, perPage=8){
        const total = list.length;
        const pages = Math.max(1, Math.ceil(total/perPage));
        const cur = Math.min(Math.max(1, Number(page)||1), pages);
        const start = (cur-1)*perPage;
        const end = start + perPage;
        return { items:list.slice(start,end), total, pages, page:cur, perPage };
      }

      // DOM
      const grid = document.getElementById('product-grid');
      const pagination = document.getElementById('pagination');
      const form = document.getElementById('newSearchForm');
      const q = document.getElementById('q');
      const category = document.getElementById('category');
      const priceMin = document.getElementById('priceMin');
      const priceMax = document.getElementById('priceMax');
      const sort = document.getElementById('sort');

      const state = {
        q: '', category: 'all',
        minPrice: '', maxPrice: '',
        sort: '', page: 1, perPage: 8
      };

      function badgeHTML(p){
        const b = normalizeBadge(p);
        if (b === 'new') return '<span class="product-badge badge-new">Mới</span>';
        if (b === 'sale') return '<span class="product-badge badge-sale">Sale</span>';
        if (b === 'out_of_stock') return '<span class="product-badge badge-out-of-stock">Hết hàng</span>';
        return '';
        }

      function cardHTML(p){
        const original = p.original_price && toNumber(p.original_price) > toNumber(p.price)
          ? `<span class="original-price">${fmtVND(p.original_price)}</span>` : '';
        return `
        <div class="col-6 col-md-4 col-lg-3">
          <div class="product-item">
            <a href="#">
              <div class="product-image">
                ${badgeHTML(p)}
                <img src="${p.image}" alt="${p.name}"/>
              </div>
              <div class="product-name">${p.name}</div>
              <div class="product-price">
                <span class="sale-price">${fmtVND(p.price)}</span>
                ${original}
              </div>
            </a>
          </div>
        </div>`;
      }

      function buildPagination(pages, current){
        if (pages <= 1) return '';
        let html = '';
        if (current > 1){
          html += `<li class="page-item"><a class="page-link" data-page="${current-1}" href="#">&larr;</a></li>`;
        }
        for (let i=1;i<=pages;i++){
          html += `<li class="page-item ${i===current?'active':''}">
                     <a class="page-link" data-page="${i}" href="#">${i}</a>
                   </li>`;
        }
        if (current < pages){
          html += `<li class="page-item"><a class="page-link" data-page="${current+1}" href="#">&rarr;</a></li>`;
        }
        return html;
      }

      function render(){
        const base = getNewBase();
        const filtered = filterProducts(base, state);
        const sorted = sortProducts(filtered, state.sort);
        const res = paginate(sorted, state.page, state.perPage);

        grid.innerHTML = res.items.map(cardHTML).join('');
        pagination.innerHTML = buildPagination(res.pages, res.page);
      }

      pagination.addEventListener('click', (e)=>{
        const a = e.target.closest('a.page-link');
        if (!a) return;
        e.preventDefault();
        state.page = Number(a.dataset.page) || 1;
        render();
      });

      form.addEventListener('submit', (e)=>{
        e.preventDefault();
        state.q = (q.value||'').trim();
        state.category = category.value || 'all';
        state.minPrice = priceMin.value || '';
        state.maxPrice = priceMax.value || '';
        state.sort = sort.value || '';
        state.page = 1;
        render();
      });

      // Render lần đầu
      render();
    })();
  </script>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
          integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
