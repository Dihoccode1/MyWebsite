<?php /* sanpham_khuyenmai.php */ ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" crossorigin="anonymous"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"/>

  <link rel="stylesheet" href="/assets/css/style.css"/>
  <link rel="stylesheet" href="/assets/css/base.css"/>

  <title>Sản phẩm khuyến mãi</title>

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

    .breadcrumbs{padding:15px 0;font-size:13px;color:#777}
    .breadcrumbs a{color:#333}
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
      <a href="/trangchu.php">Trang chủ</a> / <span>Sản phẩm khuyến mãi</span>
    </nav>
    <hr/>

    <!-- Form lọc/tìm kiếm -->
    <form id="searchForm" class="form-inline mb-2">
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
        <option value="">Mặc định</option>
        <option value="price-asc">Giá tăng dần</option>
        <option value="price-desc">Giá giảm dần</option>
        <option value="name-asc">Tên A→Z</option>
        <option value="name-desc">Tên Z→A</option>
      </select>
      <button class="btn btn-primary">Tìm</button>
    </form>

    <div class="product-list">
            <div id="product-grid" class="row equalize-cards"></div>
    </div>

    <nav class="pagination-nav" aria-label="Page navigation">
      <ul id="pagination" class="pagination-list"></ul>
    </nav>
  </div>

  <?php include __DIR__ . '/../partials/footer.php'; ?>

  <!-- Data & Store -->
  <script src="/assets/js/products.seed.js"></script>
  <script src="/assets/js/store.js"></script>
  <!-- UI chung -->
  <script src="/assets/js/ui.js"></script>
  <script>
    // Chỉ lấy SALE, và link chi tiết luôn là /sanpham/pages/product_detail.php?id=...
    window.SVUI.init({ saleOnly: true });
  </script>
</body>
</html>
