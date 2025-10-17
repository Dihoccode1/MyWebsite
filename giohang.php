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
    /* ===== Breadcrumb ===== */
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

    /* Tiêu đề */
    /* Tiêu đề */
    .title {
        font-size: 22px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 20px;
        text-align: center;
    }

    /* Icon giỏ hàng */
    .empty-icon {
        font-size: 60px;
        color: #bdc3c7;
        margin-bottom: 16px;
        text-align: center;
    }

    /* Thông điệp */
    .message {
        font-size: 16px;
        color: #7f8c8d;
        margin-bottom: 28px;
        text-align: center;
    }

    /* Nút quay lại */
    .btn-back {
        display: block;
        /* chiếm 1 hàng */
        width: fit-content;
        /* vừa với nội dung */
        margin: 0 auto 20px;
        /* căn giữa ngang */
        background: #000;
        color: #fff;
        padding: 12px 24px;
        border-radius: 30px;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        transition: background 0.2s ease;
        text-decoration: none !important;
          border: 1px solid transparent;
    }


    .btn-back:hover {
        background: #fff;
        border: 1px solid #000;
        color: #000;
    }
</style>

<body>
    <?php include __DIR__ . '/partials/header.php'; ?>
    <!-- BREADCRUMB -->
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

    <?php include __DIR__ . '/partials/footer.php'; ?>
</body>

</html>