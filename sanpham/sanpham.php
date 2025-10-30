<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/base.css">
    <title>Trang bán sản phẩm sáp</title>
</head>
<style>
    /* Ép các cột là flex để con cao 100% */
.row.equalize-cards > [class^="col-"],
.row.equalize-cards > [class*=" col-"] { display: flex; }

/* Thẻ product fill full chiều cao cột */
.product-item {
  display: flex;
  flex-direction: column;
  width: 100%;
  height: 100%;       /* chìa khóa: bằng nhau */
}

/* Link bên trong chiếm hết phần còn lại để nội dung dàn đều */
.product-item > a {
  display: flex;
  flex-direction: column;
  flex: 1 1 auto;     /* kéo giãn */
}

/* Khung ảnh cố định tỷ lệ, mọi ảnh “vào khung” gọn gàng */
.product-image {
  position: relative;
  width: 100%;
  aspect-ratio: 1/1;  /* hoặc 4/5, 3/4 tùy bạn */
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  margin-bottom: 12px;
}

/* Ảnh co giãn trong khung mà không vỡ bố cục */
.product-image img {
  max-width: 100%;
  max-height: 100%;
  width: 100%;
  height: 100%;
  object-fit: contain; /* giữ nguyên tỉ lệ, không bị cắt */
  transition: transform .3s ease;
}

/* Tên sản phẩm: chặn 2 dòng cho đều nhau */
.product-name {
  min-height: calc(1.4em * 2); /* ~2 dòng */
  line-height: 1.4;
  display: -webkit-box;      /* hiển thị 2 dòng */
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* Đẩy khu vực giá & nút xuống dưới cùng, các thẻ bằng nhau */
.product-price { margin-top: auto; }

/* Nếu có nút thêm giỏ đặt ngoài <a>, vẫn giữ dưới cùng */
.product-item .mt-2 { margin-top: 8px; }
.row.equalize-cards {
  row-gap: 20px; /* khoảng cách giữa hàng trên và hàng dưới */
}
    .breadcrumbs{padding:15px 0;font-size:13px;color:#777;}
    .breadcrumbs a{color:#333}
    .product-list{padding-top:30px}
    .product-item{text-align:center;margin-bottom:30px;border:1px solid #eee;border-radius:6px;padding:12px;transition:.2s;background: #ececec;}
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
    .pagination-nav{display:flex;justify-content:center;padding:24px 0 16px}
    .pagination-list{display:flex;list-style:none;margin:0;padding:0;gap:12px}
    .page-item .page-link{display:block;padding:8px 12px;text-decoration:none;color:#333;font-size:15px;border:1px solid transparent}
    .page-item.active .page-link{color:#000;font-weight:700;border-bottom:2px solid #000}
    .page-item:not(.active) .page-link:hover{text-decoration:underline}
/* ===== ISOLATED SEARCH FORM (sv-iso) ===== */
#searchForm.sv-iso{
  --line:#e6eaf0; --brand:#111;
  --radius:12px;
  --shadow-sm:0 6px 16px rgba(17,24,39,.08);
  --shadow-md:0 12px 28px rgba(17,24,39,.12);
  --ease:cubic-bezier(.22,1,.36,1);

  background:#fff;
  border:1px solid var(--line);
  border-radius:var(--radius);
  box-shadow:var(--shadow-sm);
  padding:14px;

  display:grid;
  grid-template-columns: 1.6fr 1.2fr .9fr .9fr 1fr auto; /* q | category | min | max | sort | btn */
  gap:12px;
  align-items:center;
}

/* Không dùng .form-control để tránh “dính” Bootstrap */
#searchForm.sv-iso input[type="text"],
#searchForm.sv-iso input[type="number"],
#searchForm.sv-iso select{
  height:46px; width:100%;
  border:1px solid var(--line);
  border-radius:10px;
  background:#fff;
  padding:0 14px;
  color:#0f172a;
  outline:none;
  transition:border-color .18s var(--ease), box-shadow .18s var(--ease), transform .12s var(--ease);
  appearance:none; -webkit-appearance:none; -moz-appearance:none;
}
#searchForm.sv-iso input::placeholder{ color:#94a3b8; }
#searchForm.sv-iso input:focus,
#searchForm.sv-iso select:focus{
  border-color:#d5dbe3;
  box-shadow:0 0 0 4px rgba(0,0,0,.05);
  transform:translateY(-1px);
}

/* Ẩn spinner number */
#searchForm.sv-iso input[type=number]{ -moz-appearance:textfield; }
#searchForm.sv-iso input[type=number]::-webkit-outer-spin-button,
#searchForm.sv-iso input[type=number]::-webkit-inner-spin-button{ -webkit-appearance:none; margin:0; }

/* Nút Tìm */
#searchForm.sv-iso button[type="submit"]{
  height:46px; padding:0 22px; font-weight:800;
  border-radius:10px; border:1px solid var(--brand);
  background:var(--brand); color:#fff; cursor:pointer;
  justify-self:end;
  transition:transform .12s var(--ease), box-shadow .2s var(--ease);
}
#searchForm.sv-iso button[type="submit"]:hover{
  transform:translateY(-1px); box-shadow:var(--shadow-md);
}

/* Tablet: 2 hàng */
@media (max-width: 992px){
  #searchForm.sv-iso{
    grid-template-columns: 1fr 1fr 1fr 1fr;
    grid-auto-rows:minmax(46px,auto);
  }
  #searchForm.sv-iso #q{ grid-column:1 / -1; }
  #searchForm.sv-iso #category{ grid-column:1 / span 2; }
  #searchForm.sv-iso #sort{ grid-column:3 / span 2; }
  #searchForm.sv-iso #priceMin{ grid-column:1 / span 2; }
  #searchForm.sv-iso #priceMax{ grid-column:3 / span 2; }
  #searchForm.sv-iso button[type="submit"]{ grid-column:1 / -1; justify-self:stretch; }
}
/* Mobile: xếp cột */
@media (max-width: 576px){
  #searchForm.sv-iso{ grid-template-columns:1fr; }
  #searchForm.sv-iso button[type="submit"]{ width:100%; }
}

</style>

<body>
    <?php include __DIR__ . '/../partials/header.php'; ?>
    </div>

    <div class="container">
        <hr />
        <!-- TÌM KIẾM (cơ bản + nâng cao) -->
        <form id="searchForm" class="sv-iso mb-3">
  <input id="q" type="text" placeholder="Tìm theo tên sản phẩm..." />

  <select id="category">
    <option value="all">Tất cả phân loại</option>
    <option value="hair_wax">Sáp vuốt tóc</option>
    <option value="volumizing_powder">Bột tạo phồng</option>
    <option value="hair_spray">Gôm xịt tóc</option>
    <option value="hair_conditioner">Dưỡng tóc</option>
  </select>

  <input id="priceMin" type="number" min="0" step="1000" placeholder="Giá từ (VND)" />
  <input id="priceMax" type="number" min="0" step="1000" placeholder="đến (VND)" />

  <select id="sort">
    <option value="">Sắp xếp</option>
    <option value="price-asc">Giá ↑</option>
    <option value="price-desc">Giá ↓</option>
    <option value="name-asc">Tên A→Z</option>
    <option value="name-desc">Tên Z→A</option>
  </select>

  <button type="submit">Tìm</button>
</form>


        <!-- (tuỳ chọn) hiển thị tổng số kết quả -->
        <div id="categoryInfo" class="mb-2 small text-muted"></div>

        <div class="product-list">
      <div id="product-grid" class="row equalize-cards"></div>
        </div>
    </div>
    <div class="container">
        <nav class="pagination-nav" aria-label="Page navigation">
            <ul class="pagination-list"></ul>
        </nav>
    </div>
    <?php include __DIR__ . '/../partials/footer.php'; ?>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>
<script src="/assets/js/products.seed.js"></script>
<script src="/assets/js/products.app.js"></script>

</body>

</html>