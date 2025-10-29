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
    <?php include __DIR__ . '/../partials/header.php'; ?>
    </div>

    <div class="container">
        <hr />
        <!-- TÌM KIẾM (cơ bản + nâng cao) -->
        <form id="searchForm" class="mb-3">
            <div class="form-row">
                <div class="col-md-4 mb-2">
                    <input type="text" class="form-control" name="q" placeholder="Tìm theo tên sản phẩm...">
                </div>

                <div class="col-md-3 mb-2">
                    <select class="form-control" name="category">
                        <option value="all">Tất cả phân loại</option>
                        <option value="hair_wax">Sáp vuốt tóc</option>
                        <option value="volumizing_powder">Bột tạo phồng</option>
                        <option value="hair_spray">Gôm xịt tóc</option>
                        <option value="hair_conditioner">Dưỡng tóc</option>
                    </select>
                </div>
                <div class ="col-md-2 mb-2">
                    <input type="number" class="form-control" name="minprice"
                        placeholder="Giá từ (VND)" min="0" step="1000" inputmode="numeric">
                </div>
                <div class ="col-md-2 mb-2">
                    <input type="number" class="form-control" name="maxprice"
                        placeholder="đến (VND)" min="0" step="1000" inputmode="numeric">
                </div>

                <div class="col-md-1 mb-2">
                    <button class="btn btn-dark btn-block">Tìm</button>
                </div>
            </div>
        </form>

        <!-- (tuỳ chọn) hiển thị tổng số kết quả -->
        <div id="categoryInfo" class="mb-2 small text-muted"></div>

        <div class="product-list">
            <div class="row">

            </div>
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