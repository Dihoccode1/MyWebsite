<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/base.css">
</head>
<style>
/* ===== CSS CŨ CỦA BẠN (TÔI GIỮ NGUYÊN) ===== */
.bread-crumb {
    padding: 10px 0;
    border-bottom: 1px solid #eee;
    background: transparent
}

.breadcrumb {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    background: transparent !important;
}

.breadcrumb li {
    color: #666;
    display: flex;
    align-items: center
}

.breadcrumb li.home a {
    font-weight: 600;
    color: #333
}

.breadcrumb .sep {
    color: #999
}

.breadcrumb li strong span {
    color: #000
}

.title {
    font-size: 22px;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 20px;
    text-align: center;
}

.empty-icon {
    font-size: 60px;
    color: #bdc3c7;
    margin-bottom: 16px;
    text-align: center;
}

.message {
    font-size: 16px;
    color: #7f8c8d;
    margin-bottom: 28px;
    text-align: center;
}

.btn-back {
    display: block;
    width: fit-content;
    margin: 0 auto 20px;
    background: #000;
    color: #fff;
    padding: 12px 24px;
    border-radius: 30px;
    font-size: 15px;
    font-weight: 600;
    text-decoration: none !important;
    border: 1px solid transparent;
    transition: background 0.2s ease;
}

.btn-back:hover {
    background: #fff;
    border: 1px solid #000;
    color: #000;
}

/* --- CSS BỔ SUNG CHO GIỎ HÀNG CÓ SẢN PHẨM (ĐÃ CHÈN TỪ BƯỚC 1) --- */
.cart-product-list {
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.product-item {
    border-bottom: 1px solid #eee;
    padding: 15px 0;
}

.product-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.cart-img {
    max-width: 100px;
    border-radius: 5px;
}

.cart-name {
    font-weight: 600;
    color: #333;
    margin-bottom: 4px;
}

.cart-variant {
    font-size: 13px;
    color: #777;
    margin-bottom: 8px;
}

.btn-remove {
    background: none;
    border: none;
    color: #e74c3c;
    font-size: 14px;
    cursor: pointer;
    text-decoration: underline;
}

.cart-price {
    font-weight: 500;
    color: #888;
}

.cart-subtotal {
    font-size: 16px;
    font-weight: 700;
    color: #000;
}

.quantity-control {
    display: inline-flex;
    align-items: center;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.btn-qty {
    width: 30px;
    height: 30px;
    background: #f8f8f8;
    border: none;
    cursor: pointer;
    font-size: 18px;
    color: #333;
    line-height: 1;
    transition: background 0.2s;
}

.btn-qty:hover {
    background: #e0e0e0;
}

.qty-input {
    width: 35px;
    text-align: center;
    border: none;
    outline: none;
    height: 30px;
    padding: 0;
}

.cart-summary {
    background: #f7f7f7;
    padding: 20px;
    border-radius: 5px;
}

.cart-summary h4 {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 10px;
}

.summary-line {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 15px;
    color: #555;
}

.total-final {
    font-size: 18px;
    color: #000;
}

.btn-checkout {
    margin-top: 15px;
    background: #27ae60;
    color: #fff;
    font-weight: 600;
    padding: 10px;
    border-radius: 4px;
    transition: background 0.2s;
}

.btn-checkout:hover {
    background: #2ecc71;
    color: #fff;
}

.btn-back-shopping {
    display: block;
    text-align: center;
    margin-top: 15px;
    font-size: 14px;
    color: #3498db;
    text-decoration: none;
}
</style>

<body>
    <?php include __DIR__ . '/partials/header.php'; ?>

    <section class="bread-crumb">
        <div class="container">
            <ul class="breadcrumb">
                <li class="home"><a href="/trangchu.php"><span>Trang chủ</span></a></li>
                <li class="sep"><i class="fa-solid fa-angle-right"></i></li>
                <li><strong><span>Giỏ hàng</span></strong></li>
            </ul>
        </div>
    </section>

    <div class="container">
        <div class="title">Giỏ hàng của bạn</div>

        <div class="empty-cart-block">
            <div class="empty-icon">
                <i class="fa-solid fa-bag-shopping"></i>
            </div>
            <div class="message">
                Giỏ hàng của bạn đang trống.<br>
                Hãy khám phá ngay nhiều sản phẩm hấp dẫn!
            </div>
            <a href="sanpham.html" class="btn-back">
                Tiếp tục mua sắm
            </a>
        </div>
        <div class="full-cart-block" style="display: none;">
            <div class="row">
                <div class="col-lg-9">
                    <div class="cart-product-list">
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="cart-summary">
                        <h4>Tóm tắt đơn hàng</h4>
                        <hr>
                        <div class="summary-line">
                            <span>Tổng tiền (0 sản phẩm)</span>
                            <span class="total-price">0₫</span>
                        </div>
                        <div class="summary-line">
                            <span>Phí vận chuyển</span>
                            <span class="shipping-fee">Miễn phí</span>
                        </div>
                        <hr>
                        <div class="summary-line total-final">
                            <strong>Tổng thanh toán</strong>
                            <strong class="grand-total">0₫</strong>
                        </div>
                        <a href="thanhtoan.php" class="btn btn-block btn-checkout">
                            Tiến hành thanh toán
                        </a>
                    </div>
                </div>
            </div>
            <a href="sanpham.html" class="btn-back-shopping">
                <i class="fa-solid fa-angle-left"></i> Tiếp tục mua sắm
            </a>
        </div>
    </div>

    <?php include __DIR__ . '/partials/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3E8d4R4mQ2Q+rW9yLg9F7l3w4ePqR4hW9Jq7yI9A7Pz0YJ3jP0v5o+I/yD9s" crossorigin="anonymous">
    </script>
    <script src="assets/js/cart.js"></script>

</body>

</html>