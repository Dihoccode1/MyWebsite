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
    <title>Trang bán sản phẩm sáp - Trang 4</title>
</head>
<style>
/* DÁN TOÀN BỘ CSS CHUNG VÀ CSS SẢN PHẨM CỦA BẠN VÀO ĐÂY */

/* ====== CSS CƠ BẢN VÀ MENU (Giữ lại CSS từ các lần trước) ====== */
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

hr {
    border: 0;
    border-top: 1px solid #eee;
}

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

.main-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 25px 0;
}

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

.logo {
    margin: 0;
    text-align: center;
}

.logo img {
    max-height: 45px;
    width: auto;
    display: block;
}

.cart-link {
    font-size: 14px;
    font-weight: bold;
}

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

.main-nav li a.active {
    background-color: #000;
    color: #fff;
}

.breadcrumbs {
    padding: 15px 0;
    font-size: 13px;
    color: #777;
}

.breadcrumbs a {
    color: #333;
}

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

.product-list {
    padding-top: 30px;
}

.product-item {
    text-align: center;
    margin-bottom: 30px;
}

.product-item a {
    text-decoration: none;
    color: #333;
}

.product-image {
    position: relative;
    margin-bottom: 15px;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: auto;
    display: block;
    transition: transform 0.3s ease;
}

.product-item:hover .product-image img {
    transform: scale(1.05);
}

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
}

.badge-sale {
    right: 10px;
    background-color: #d9534f;
}

.product-name {
    font-size: 14px;
    margin-bottom: 8px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.product-price .sale-price {
    color: #d00;
    font-weight: bold;
    font-size: 15px;
}

.product-price .original-price {
    color: #888;
    text-decoration: line-through;
    margin-left: 8px;
    font-size: 13px;
}

/* ====== CSS PHÂN TRANG ====== */
.pagination-nav {
    display: flex;
    justify-content: center;
    padding: 30px 0 20px 0;
}

.pagination-list {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 15px;
}

.page-item .page-link {
    display: block;
    padding: 8px 12px;
    text-decoration: none;
    color: #333;
    font-size: 16px;
    border: 1px solid transparent;
}

.page-item.active .page-link {
    color: #000;
    font-weight: bold;
    border-bottom: 2px solid #000;
}

.page-item:not(.active) .page-link:hover {
    color: #000;
    text-decoration: underline;
}

/* ================================================================= */
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

            <a href="#" class="cart-link">GIỎ HÀNG (0)</a>
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
            <a href="#">Trang chủ</a> / <span>Tất cả sản phẩm (Trang 4)</span>
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
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product-item">
                        <a href="#">
                            <div class="product-image">
                                <span class="product-badge badge-sale">Mới</span>
                                <img src="../assets/images/product/Hair_wax/Patricks_M3_Matte_Finish_Strong_Hold_Styling_Product/patricks-m3-matte-finish-1.webp"
                                    alt="Patricks M3 Matte Finish | Strong Hold Styling Product" />
                            </div>
                            <div class="product-name">Patricks M3 Matte Finish | Strong Hold Styling Product</div>
                            <div class="product-price">
                                <span class="sale-price">1.200.000₫</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product-item">
                        <a href="#">
                            <div class="product-image">
                                <img src="../assets/images/product/Hair_wax/Remaker/remaker-web-1-b8823322-5444-4ef4-8cf3-6c56d301720d.webp"
                                    alt="Sáp Vuốt Tóc Remaker" />
                            </div>
                            <div class="product-name">Sáp Vuốt Tóc Remaker</div>
                            <div class="product-price">
                                <span class="sale-price">240.000₫</span>
                                <span class="original-price">400.000₫</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product-item">
                        <a href="#">
                            <div class="product-image">
                                <span class="product-badge badge-sale">Giảm giá 10%</span>
                                <img src="../assets/images/product/Hair_wax/Suavecito_Firme_Clay_Pomade/suavecito-firme-clay-open-2048x.webp"
                                    alt="Sáp Suavecito Firme Clay Pomade" />
                            </div>
                            <div class="product-name">Sáp Suavecito Firme Clay Pomade</div>
                            <div class="product-price">
                                <span class="sale-price">399.000₫</span>
                                <span class="original-price">440.000₫</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product-item">
                        <a href="#">
                            <div class="product-image">
                                <span class="product-badge badge-out-of-stock">Hết hàng</span>
                                <img src="../assets/images/product/Volumizing_powder/Reuzel_Matte_Texture_Powder/reuzel-matte-texture-powder-4.webp"
                                    alt="Bột tạo phồng Reuzel Matte Texture Powder " />
                            </div>
                            <div class="product-name">Bột tạo phồng Reuzel Matte Texture Powder </div>
                            <div class="product-price">
                                <span class="sale-price">450.000₫</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product-item">
                        <a href="#">
                            <div class="product-image">
                                <img src="../assets/images/product/Volumizing_powder/Roug_Textured Power_60ml/roug-textured-hair-power-3.webp"
                                    alt="Bột tạo phồng Roug Textured Powe" />
                            </div>
                            <div class="product-name">Bột tạo phồng Roug Textured Power</div>
                            <div class="product-price">
                                <span class="sale-price">200.000₫</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product-item">
                        <a href="#">
                            <div class="product-image">
                                <img src="../assets/images/product/Volumizing_powder/Volcanic_Ash_Styling_Powder/bot-tao-phong-apestomen-ash.webp"
                                    alt="Bột tạo phồng Volcanic Ash Styling Powder" />
                            </div>
                            <div class="product-name">Bột tạo phồng Volcanic Ash Styling Powder</div>
                            <div class="product-price">
                                <span class="sale-price">250.000₫</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product-item">
                        <a href="#">
                            <div class="product-image">
                                <span class="product-badge badge-sale">Giảm giá</span>
                                <img src="../assets/images/product/Hair_wax/O'douds Dry was/drywax-odouds.webp"
                                    alt="Sáp Vuốt Tóc O’douds Dry Wax " />
                            </div>
                            <div class="product-name">Sáp Vuốt Tóc O’douds Dry Wax </div>
                            <div class="product-price">
                                <span class="sale-price">500.000₫</span>
                                <span class="original-price">600.000₫</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product-item">
                        <a href="#">
                            <div class="product-image">
                                <img src="../assets/images/product/Volumizing_powder/Bột tạo phồng Patricks HP1 Hair Powder/hp1-1x1-grey-background-png-v-1732593674-width-1920.png"
                                    alt="Bột tạo phồng Patricks HP1 Hair Powder" />
                            </div>
                            <div class="product-name">Bột tạo phồng Patricks HP1 Hair Powder</div>
                            <div class="product-price">
                                <span class="sale-price">1.000.000₫</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <nav class="pagination-nav" aria-label="Page navigation">
            <ul class="pagination-list">
                <li class="page-item">
                    <a class="page-link" href="sanpham3.php" aria-label="Previous">&larr;</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="sanpham.php">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="sanpham2.php">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="sanpham3.php">3</a>
                </li>
                <li class="page-item active">
                    <span class="page-link">4</span>
                </li>
            </ul>
        </nav>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>