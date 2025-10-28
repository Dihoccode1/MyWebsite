<?php 
// Đảm bảo đường dẫn này đúng nếu thư mục partials nằm cùng cấp với sanpham3.php
?>
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
    <title>Trang bán sản phẩm sáp - Trang 3</title>
</head>
<style>
/* DÁN TOÀN BỘ CSS CỦA BẠN VÀO ĐÂY */

/* ====== CSS CHUNG VÀ SẢN PHẨM (DỰA TRÊN CODE CỦA BẠN) ====== */

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
        <?php include __DIR__ . '/../partials/header.php'; ?>
    <div class="container">
        <nav class="breadcrumbs">
            <a href="#">Trang chủ</a> / <span>Tất cả sản phẩm (Trang 3)</span>
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
                                <span class="product-badge badge-sale">Giảm giá</span>
                                <img src="../assets/images/product/Hair_wax/Apestomen_Nitro_Wax/apestomen-nitro-wax-compressed-1-600x600.webp"
                                    alt="Sáp Vuốt Tóc Apestomen Nitro Wax " />
                            </div>
                            <div class="product-name">Sáp Vuốt Tóc Apestomen Nitro Wax </div>
                            <div class="product-price">
                                <span class="sale-price">250.000₫</span>
                                <span class="original-price">350.000₫</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product-item">
                        <a href="#">
                            <div class="product-image">
                                <img src="../assets/images/product/Hair_wax/By_Vilain_Gold_Digger/by-vilain-gold-digger-travel-open.webp"
                                    alt="Sáp Vuốt Tóc By Vilain Gold Digger" />
                            </div>
                            <div class="product-name">Sáp Vuốt Tóc By Vilain Gold Digger</div>
                            <div class="product-price">
                                <span class="sale-price">250.000₫</span>
                                <span class="original-price">350.000₫</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product-item">
                        <a href="#">
                            <div class="product-image">
                                <img src="../assets/images/product/Hair_wax/Dapper_Dan_Matt_Paste/dapper-dan-matt-paste-2.webp"
                                    alt="Sáp Dapper Dan Matt Paste" />
                            </div>
                            <div class="product-name">Sáp Dapper Dan Matt Paste</div>
                            <div class="product-price">
                                <span class="sale-price">420.000₫</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product-item">
                        <a href="#">
                            <div class="product-image">
                                <img src="../assets/images/product/Hair_wax/DAPPER_DAN_ULTRA_MATTE_CLAY_100ML/dapper-dan-super-hold-clay-web-1.webp"
                                    alt="Sáp Dapper Dan Ultra Matte Clay" />
                            </div>
                            <div class="product-name">Sáp Dapper Dan Ultra Matte Clay</div>
                            <div class="product-price">
                                <span class="sale-price">400.000₫</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product-item">
                        <a href="#">
                            <div class="product-image">
                                <span class="product-badge badge-sale">Giảm giá</span>
                                <img src="../assets/images/product/Hair_wax/Davines_Strong_Dry_Wax/sap-vuot-toc-davines-strong-dry-wax-75ml.webp"
                                    alt="Sáp vuốt tóc Davines Strong Dry Wax" />
                            </div>
                            <div class="product-name">Sáp vuốt tóc Davines Strong Dry Wax</div>
                            <div class="product-price">
                                <span class="sale-price">350.000₫</span>
                                <span class="original-price">500.000₫</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product-item">
                        <a href="#">
                            <div class="product-image">
                                <img src="../assets/images/product/Hair_wax/Hanz_de_Fuko_Quicksand/untitled-1-425eb329-c3d1-4be6-b6f8-b687c916e2d2.webp"
                                    alt="Sáp Vuốt Tóc Hanz De Fuko Quicksand" />
                            </div>
                            <div class="product-name">Sáp Vuốt Tóc Hanz De Fuko Quicksand</div>
                            <div class="product-price">
                                <span class="sale-price">500.000₫</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product-item">
                        <a href="#">
                            <div class="product-image">
                                <img src="../assets/images/product/Hair_wax/Kevin_Murphy_Night_Rider/kevin-murphy-night-rider-2.jpg"
                                    alt="Sáp Vuốt Tóc Kevin Murphy Night Rider" />
                            </div>
                            <div class="product-name">Sáp Vuốt Tóc Kevin Murphy Night Rider</div>
                            <div class="product-price">
                                <span class="sale-price">410.000₫</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="product-item">
                        <a href="#">
                            <div class="product-image">
                                <img src="../assets/images/product/Hair_wax/Kevin_Murphy_Rough_Rider/kevin-murphy-rough-rider.webp"
                                    alt="Sáp Vuốt Tóc Kevin Murphy Rough Rider" />
                            </div>
                            <div class="product-name">Sáp Vuốt Tóc Kevin Murphy Rough Rider</div>
                            <div class="product-price">
                                <span class="sale-price">330.000₫</span>
                                <span class="original-price">550.000₫</span>
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
                    <a class="page-link" href="sanpham2.php" aria-label="Previous">&larr;</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="sanpham.php">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="sanpham2.php">2</a>
                </li>
                <li class="page-item active">
                    <span class="page-link">3</span>
                </li>
                <li class="page-item">
                    <a class="page-link" href="sanpham4.php">4</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="sanpham4.php" aria-label="Next">&rarr;</a>
                </li>
            </ul>
        </nav>
    </div>
    <?php include __DIR__ . '/../partials/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>