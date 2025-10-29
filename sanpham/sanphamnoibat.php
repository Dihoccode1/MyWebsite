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
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="stylesheet" href="/assets/css/base.css" />
    <title>Trang bán sản phẩm sáp</title>
</head>
<style>
/* ====== CSS CHUNG ====== */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    color: #333;
}

a {
    text-decoration: none;
    color: inherit;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 16px;
}

/* Đường kẻ ngang */
hr {
    border: 0;
    border-top: 1px solid #eee;
}

/* ====== CSS CHO HEADER (GENTLEMAN) ====== */
/* 1. Top Bar */
.top-bar {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    padding: 8px 0;
    font-size: 12px;
    color: #888;
}

.top-bar a {
    margin-left: 15px;
    text-transform: uppercase;
}

/* 2. Main Header */
.main-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 25px 0;
}

/* 2.1. Search Bar */
.search-bar {
    display: flex;
    border: 1px solid #ccc;
}

.search-bar input {
    border: none;
    padding: 8px 12px;
    font-size: 14px;
    outline: none;
}

.search-bar button {
    border: none;
    background: #333;
    color: white;
    padding: 0 12px;
    cursor: pointer;
}

/* 2.2. Logo (ĐÃ SỬA) */
.logo {
    margin: 0;
    text-align: center;
}

.logo img {
    max-height: 45px;
    /* Đặt chiều cao tối đa cho logo */
    width: auto;
    /* Giữ đúng tỷ lệ */
    display: block;
}

/* 2.3. Cart */
.cart-link {
    font-size: 14px;
    font-weight: bold;
}

/* 3. Navigation Bar */
.main-nav {
    display: flex;
    justify-content: center;
    padding: 10px 0;
}

.main-nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

.main-nav li a {
    padding: 10px 20px;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 14px;
    display: block;
}

/* Nút "Sản phẩm" đang active */
.main-nav li a.active {
    background-color: #000;
    color: #fff;
}

/* ====== CSS CHO PHẦN SẢN PHẨM (TỪ ẢNH) ====== */

/* 4. Breadcrumbs (Trang chủ / ...) */
.breadcrumbs {
    padding: 15px 0;
    font-size: 13px;
    color: #777;
}

.breadcrumbs a {
    color: #333;
}

/* 5. View Controls (Bộ lọc) */
.view-controls {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 0;
}

.filter-select {
    padding: 8px 12px;
    border: 1px solid #ccc;
    font-size: 13px;
}

.view-buttons button {
    padding: 8px 12px;
    border: 1px solid #ccc;
    background: #fff;
    margin-left: 5px;
    font-size: 13px;
    cursor: pointer;
}

.view-buttons button.active {
    background-color: #f0f0f0;
    border-color: #aaa;
}

.view-buttons button i {
    margin-right: 5px;
}

/* ====== CSS SẢN PHẨM (MỚI THÊM) ====== */
.product-list {
    padding-top: 30px;
    /* Khoảng cách với bộ lọc */
}

.product-item {
    text-align: center;
    margin-bottom: 30px;
    /* Khoảng cách giữa các hàng */
}

.product-item a {
    text-decoration: none;
    color: #333;
}

.product-image {
    position: relative;
    margin-bottom: 15px;
    overflow: hidden;
    /* Giúp ảnh không bị tràn */
}

.product-image img {
    width: 100%;
    height: auto;
    display: block;
    /* Hiệu ứng zoom nhẹ khi hover (tùy chọn) */
    transition: transform 0.3s ease;
}

.product-item:hover .product-image img {
    transform: scale(1.05);
}

/* CSS cho các nhãn (Hết hàng, Sale) */
.product-badge {
    position: absolute;
    top: 10px;
    padding: 4px 8px;
    color: white;
    font-size: 11px;
    font-weight: bold;
    text-transform: uppercase;
}

.badge-out-of-stock {
    left: 10px;
    background-color: #000;
    /* Màu đen cho Hết hàng */
}

.badge-sale {
    right: 10px;
    background-color: #d9534f;
    /* Màu đỏ cho Sale */
}

.product-name {
    font-size: 14px;
    margin-bottom: 8px;
    /* Giới hạn tên 1 dòng (tùy chọn) */
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.product-price .sale-price {
    color: #d00;
    /* Màu đỏ cho giá */
    font-weight: bold;
    font-size: 15px;
}

.product-price .original-price {
    color: #888;
    text-decoration: line-through;
    margin-left: 8px;
    font-size: 13px;
}

/* ====== CSS PHÂN TRANG (MỚI THÊM) ====== */
.pagination-nav {
    display: flex;
    justify-content: center;
    /* Căn giữa */
    padding: 30px 0 20px 0;
    /* Khoảng cách trên/dưới */
}

.pagination-list {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 15px;
    /* Khoảng cách giữa các mục */
}

.page-item .page-link {
    display: block;
    padding: 8px 12px;
    text-decoration: none;
    color: #333;
    font-size: 16px;
    border: 1px solid transparent;
    /* Để giữ layout ổn định */
}

.page-item.active .page-link {
    color: #000;
    font-weight: bold;
    border-bottom: 2px solid #000;
    /* Hiệu ứng active */
}

.page-item:not(.active) .page-link:hover {
    color: #000;
    text-decoration: underline;
}
</style>

<body>

    <div class="container">
        <div class="top-bar">
            <span>HOTLINE: 19000150</span>
            <a href="#">ĐĂNG NHẬP</a>
        </div>
        <hr />

        <header class="main-header">
            <form class="search-bar">
                <input type="text" placeholder="Tìm kiếm" />
                <button type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>

            <a href="#" class="logo">
                <img src="../assets/images/logo.jpg" alt="Nobility 1800s Logo" />
            </a>

            <a href="../giohang.php" class="cart-link">GIỎ HÀNG (0)</a>
        </header>

        <nav class="main-nav">
            <ul>
                <li><a href="#" class="active">TRANG CHỦ</a></li>
                <li><a href="#">GIỚI THIỆU</a></li>
                <li>
                    <a href="#">SẢN PHẨM <i class="fas fa-chevron-down fa-xs"></i></a>
                </li>
                <li><a href="#">TIN TỨC</a></li>
                <li><a href="#">LIÊN HỆ</a></li>
            </ul>
        </nav>
        <hr />
    </div>
    <div class="container">
        <nav class="breadcrumbs">
            <a href="#">Trang chủ</a> / <span>Tất cả sản phẩm</span>
        </nav>
        <hr />

        <div class="view-controls">
            <select class="filter-select">
                <option value="">CHỌN THEO</option>
                <option value="price-asc">Giá tăng dần</option>
                <option value="price-desc">Giá giảm dần</option>
                <option value="name-asc">Tên A→Z</option>
                <option value="name-desc">Tên Z→A</option>
            </select>
            <button class="btn btn-primary">Tìm</button>
            </form>


            <div class="product-list">
                <div id="product-grid" class="row"></div>
            </div>

            <div class="container">
                <nav class="pagination-nav" aria-label="Page navigation">
                    <ul id="pagination" class="pagination-list"></ul>
                </nav>
            </div>
        </div>
        <?php include __DIR__ . '/../partials/footer.php'; ?>
</body>

</html>
<?php include __DIR__ . '/partials/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>
</body>

</html>