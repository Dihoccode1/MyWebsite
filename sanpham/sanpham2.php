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
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/base.css" />
    <title>Trang bán sản phẩm sáp - Trang 2</title>
</head>
<style>
/* Đặt lại CSS đã cung cấp ở đây */
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

            <a href="/giohang.php" class="cart-link">GIỎ HÀNG (0)</a>
        </header>

        <nav class="main-nav">
            <ul>
                <li><a href="#">TRANG CHỦ</a></li>
                <li><a href="#">GIỚI THIỆU</a></li>
                <li>
                    <a href="#" class="active">SẢN PHẨM <i class="fas fa-chevron-down fa-xs"></i></a>
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
            </select>

            <div class="view-buttons">
                <button class="active"><i class="fas fa-th-large"></i> BẢNG</button>
                <button><i class="fas fa-list"></i> DANH SÁCH</button>
            </div>
        </div>
        <hr />

        <div class="product-list">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-item">
                        <a href="#">
                            <div class="product-image">
                                <img src="../assets/images/product/Hair_spray/2Vee/1552806056-gom-xit-2vee-01.webp"
                                    alt="Gôm xịt tóc 2Vee" />
                            </div>
                            <h3 class="product-name">
                                Gôm xịt tóc 2Vee
                            </h3>
                            <div class="product-price">
                                <span class="sale-price">270.000₫</span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-item">
                        <a href="#">
                            <div class="product-image">
                                <img src="../assets/images/product/Hair_spray/Bed_head/gom-tigi-bead-head-2-700.webp"
                                    alt="Gôm xịt tóc Tigi Bed Head " />
                                <span class="product-badge badge-sale">Sale</span>
                            </div>
                            <h3 class="product-name">
                                Gôm xịt tóc Tigi Bed Head
                            </h3>
                            <div class="product-price">
                                <span class="sale-price">300.000₫</span>
                                <span class="original-price">550.000₫</span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-item">
                        <a href="#">
                            <div class="product-image">
                                <img src="../assets/images/product/Hair_spray/Butterfly_shadow_600ml/1426968buter-fly.webp"
                                    alt="Gôm xịt tóc Butterfly Shadow" />
                            </div>
                            <h3 class="product-name">
                                Gôm xịt tóc Butterfly Shadow
                            </h3>
                            <div class="product-price">
                                <span class="sale-price">180.000₫</span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-item">
                        <a href="#">
                            <div class="product-image">
                                <img src="../assets/images/product/Hair_spray/Davines_Extra_Strong_Hairspray/gom-xit-toc-davines-extra-strong-hairspray-400ml.webp"
                                    alt="Gôm xịt tóc Davines Extra Strong Hairspray 400ml" />
                                <span class="product-badge badge-sale">Sale</span>
                            </div>
                            <h3 class="product-name">Gôm xịt tóc Davines Extra Strong Hairspray</h3>
                            <div class="product-price">
                                <span class="sale-price">550.000₫</span>
                                <span class="original-price">690.000₫</span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-item">
                        <a href="#">
                            <div class="product-image">
                                <img src="../assets/images/product/Hair_spray/Davines_Strong_Hairspray/gom-xit-toc-davines-strong-hairspray-400ml.webp"
                                    alt="Gôm xịt tóc Davines Strong Hairspray" />
                            </div>
                            <h3 class="product-name">
                                Gôm xịt tóc Davines Strong Hairspray
                            </h3>
                            <div class="product-price">
                                <span class="sale-price">450.000₫</span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-item">
                        <a href="#">
                            <div class="product-image">
                                <img src="../assets/images/product/Hair_spray/Glanzen_Original_380ml/30s7j273-gom-xit-toc-glanzen-6.webp"
                                    alt="Gôm xịt tóc giữ nếp Glanzen Original" />
                                <span class="product-badge badge-sale">Sale</span>
                            </div>
                            <h3 class="product-name">Gôm xịt tóc giữ nếp Glanzen Original</h3>
                            <div class="product-price">
                                <span class="sale-price">180.000₫</span>
                                <span class="original-price">300.000₫</span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-item">
                        <a href="#">
                            <div class="product-image">
                                <img src="../assets/images/product/Hair_spray/Kevin Murphy Session Spray/1468319756-session-spray-1.webp"
                                    alt="Gôm xịt Kevin Murphy Session Spray" />
                            </div>
                            <h3 class="product-name">
                                Gôm xịt Kevin Murphy Session Spray
                            </h3>
                            <div class="product-price">
                                <span class="sale-price">280.000₫</span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product-item">
                        <a href="#">
                            <div class="product-image">
                                <img src="../assets/images/product/Hair_spray/Luxurious/gom-luxurious-10-c4ce5ee0-3663-4526-befa-79e4952930a0.webp"
                                    alt="Gôm xịt tóc xịt tóc Luxurious" />
                            </div>
                            <h3 class="product-name">
                                Gôm xịt tóc xịt tóc Luxurious
                            </h3>
                            <div class="product-price">
                                <span class="sale-price">400.000₫</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <nav class="pagination-nav" aria-label="Page navigation">
            <ul class="pagination-list">
                <li class="page-item">
                    <a class="page-link" href="sanpham.php" aria-label="Previous">&larr;</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="sanpham.php">1</a>
                </li>
                <li class="page-item active">
                    <span class="page-link">2</span>
                </li>
                <li class="page-item">
                    <a class="page-link" href="sanpham3.php">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="sanpham4.php">4</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="sanpham3.php" aria-label="Next">&rarr;</a>
                </li>
            </ul>
        </nav>
    </div>

</body>

</html>