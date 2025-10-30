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
/* Tạo khoảng cách rõ ràng giữa các hàng sản phẩm */
.row.equalize-cards {
  row-gap: 24px; /* 👈 cách hàng trên và dưới 24px */
}

/* Nếu có nút thêm giỏ đặt ngoài <a>, vẫn giữ dưới cùng */
.product-item .mt-2 { margin-top: 8px; }

    .breadcrumbs{padding:15px 0;font-size:13px;color:#777}
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
  </style>
</head>
<body>
  <?php include __DIR__ . '/../partials/header.php'; ?>

<!-- KHUNG DANH SÁCH + PHÂN TRANG -->
<!-- KHUNG DANH SÁCH + PHÂN TRANG -->
<div class="container my-4">
  <h1 class="h4 mb-3">Sản phẩm khuyến mãi</h1>

  <!-- (tuỳ chọn) form lọc/ tìm kiếm -->
  <form id="searchForm" class="mb-3">
    <div class="form-row">
      <div class="col-md-4 mb-2">
        <input name="q" class="form-control" placeholder="Tìm theo tên…">
      </div>
      <div class="col-md-3 mb-2">
        <select name="category" class="form-control">
          <option value="all">Tất cả danh mục</option>
          <option value="hair_wax">Sáp vuốt tóc</option>
          <option value="hair_spray">Gôm xịt</option>
          <option value="hair_conditioner">Dưỡng tóc</option>
          <option value="volumizing_powder">Bột tạo phồng</option>
        </select>
      </div>
      <div class="col-md-2 mb-2">
        <input name="priceMin" class="form-control" placeholder="Giá từ">
      </div>
      <div class="col-md-2 mb-2">
        <input name="priceMax" class="form-control" placeholder="Giá đến">
      </div>
      <div class="col-md-1 mb-2">
        <button class="btn btn-dark btn-block">Lọc</button>
      </div>
    </div>
  </form>

  <div id="product-grid" class="row equalize-cards"></div>
  <ul id="pagination" class="pagination justify-content-center mt-3"></ul>
</div>
  <?php include __DIR__ . '/../partials/footer.php'; ?>

<!-- DATA + STORE + UI -->
<script src="/assets/js/products.seed.js"></script>
<script src="/assets/js/store.js"></script>
<script src="/assets/js/ui.js"></script>
<script>
  // Chỉ hiển thị sản phẩm có badge = "sale"
  window.SVUI?.init({ saleOnly: true });

  // Cập nhật số giỏ trên header ngay khi vào trang
  document.addEventListener('DOMContentLoaded', () => window.SVUI?.updateCartCount?.());
</script>
</body>
</html>
