<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <title>Trang bán sản phẩm sáp</title>

    <style>
        :root {
            --bg: #fff;
            --text: #111;
            --muted: #6b7280;
            --line: #eceff3;
            --brand: #111;
            --brand-ghost: #f3f4f6;
            --radius: 14px;
            --shadow-sm: 0 6px 16px rgba(17, 24, 39, .08);
            --shadow-md: 0 12px 28px rgba(17, 24, 39, .12);
            --ease: cubic-bezier(.22, 1, .36, 1);
        }

        /* ================== SCOPE TOÀN BỘ CSS NỘI DUNG VÀO .page-main ================== */
        .page-main .policy-box {
            margin: 10px 0;
        }

        .page-main .policy-box .container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .page-main .policy-item {
            flex: 1;
            background: #202020;
            border: 1px solid #333;
            text-align: center;
            padding: 5px;
            border-radius: 4px;
        }

        .page-main .policy-item span {
            display: block;
            border: 1px solid #545454;
            line-height: 40px;
            font-size: 14px;
            color: #B8D0E0;
            text-transform: uppercase;
        }

        .page-main .awe-section-2 {
            margin: 30px 0;
        }

        .page-main .awe-section-2 .section_slider,
        .page-main .awe-section-2 .swiper-wrapper,
        .page-main .awe-section-2 .swiper-slide,
        .page-main .awe-section-2 .swiper-slide a,
        .page-main .awe-section-2 .swiper-slide picture,
        .page-main .awe-section-2 .swiper-slide img {
            width: 100% !important;
        }

        .page-main .awe-section-2 .swiper-slide img {
            display: block;
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .page-main .swiper-slide img {
            display: block;
            margin-bottom: 30px;
        }

        .page-main .awe-section-3 {
            padding: 20px 0;
            background: #fff;
        }

        .page-main .adv_bottom {
            display: block;
        }

        /* container riêng cho page (không ảnh hưởng footer) */
        .page-main .container,
        .page-main .container-pag {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 16px;
            position: relative;
        }

        /* Banner 3 cột */
        .page-main .adv-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }

        .page-main .adv_bottom_inner figure {
            margin: 0;
        }

        .page-main .adv_bottom_inner {
            border: 1px solid #e6e6e6;
        }

        .page-main .adv_bottom_inner a {
            display: block;
            text-decoration: none;
        }

        .page-main .adv_bottom_inner img {
            display: block;
            width: 100%;
            height: auto;
            border-radius: 6px;
            transition: transform .25s ease, box-shadow .25s ease;
        }

        /* Brand slider */
        .page-main .section-brand {
            background: #fff;
        }

        .page-main .brand-slider {
            position: relative;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .page-main .slider-track {
            display: flex;
            transition: transform .4s ease;
        }

        .page-main .slide {
            min-width: 200px;
            margin: 0 10px;
        }

        .page-main .slide img {
            width: 100%;
            border-radius: 10px;
            transition: transform .3s;
        }

        .page-main .btn-1 {
            background: #B8D0E0;
            color: #fff;
            border: none;
            font-size: 30px;
            padding: 10px 15px;
            cursor: pointer;
            transition: .3s;
            z-index: 5;
        }

        .page-main .prev {
            color: #000;
            position: absolute;
            left: 0;
        }

        .page-main .next {
            color: #000;
            position: absolute;
            right: 0;
        }

        /* ===== GRID SẢN PHẨM – dùng class riêng, không đụng Bootstrap footer ===== */
        .page-main .row {
            display: flex;
            flex-wrap: wrap;
            margin: -20px;
        }

        .page-main .col {
            padding: 20px;
            box-sizing: border-box;
        }

        .page-main .col-3 {
            width: 25%;
        }

        @media (max-width: 991.98px) {
            .page-main .col-3 {
                width: 50%;
            }
        }

        @media (max-width: 575.98px) {
            .page-main .col-3 {
                width: 100%;
            }
        }

        /* Card */
        .page-main .product-box {
            background: var(--bg);
            border: 1px solid var(--line);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: transform .35s var(--ease), box-shadow .35s var(--ease), border-color .35s;
            position: relative;
        }

        .page-main .product-box:hover {
            box-shadow: var(--shadow-md);
            border-color: #e6ebf0;
        }

        .page-main .product-thumbnail {
            position: relative;
            overflow: hidden;
            background: linear-gradient(180deg, #fafbfc 0%, #f7fafc 100%);
        }

        /* Slider sản phẩm (JS thuần, giữ class giống Swiper) */
        .page-main .owl_product_item_content {
            position: relative;
            overflow: hidden;
        }

        .page-main .owl_product_item_content .swiper-wrapper {
            display: flex;
            will-change: transform;
        }

        .page-main .owl_product_item_content .swiper-slide {
            flex: 0 0 100%;
            width: auto !important;
        }

        .page-main .image_link {
            display: block;
        }

        .page-main .image_link img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform .5s var(--ease), filter .4s var(--ease);
        }

        .page-main .product-box:hover .image_link img {
            transform: scale(1.03);
        }

        /* Nút điều hướng slider */
        .page-main .owl_product_item_content .swiper-button-prev,
        .page-main .owl_product_item_content .swiper-button-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, .96);
            border: 1px solid #e5eaf0;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
            display: grid;
            place-items: center;
            cursor: pointer;
            user-select: none;
            z-index: 2;
            transition: transform .2s var(--ease), box-shadow .2s var(--ease), background .2s;
            opacity: 0;
            visibility: hidden;
        }

        .page-main .owl_product_item_content .swiper-button-prev {
            left: 10px;
        }

        .page-main .owl_product_item_content .swiper-button-next {
            right: 10px;
        }

        .page-main .product-thumbnail:hover .swiper-button-prev,
        .page-main .product-thumbnail:hover .swiper-button-next {
            opacity: 1;
            visibility: visible;
        }

        .page-main .owl_product_item_content .swiper-button-prev::after,
        .page-main .owl_product_item_content .swiper-button-next::after {
            content: "";
            width: 10px;
            height: 10px;
            display: block;
            border-top: 2px solid #333;
            border-right: 2px solid #333;
        }

        .page-main .owl_product_item_content .swiper-button-prev::after {
            transform: rotate(-135deg);
        }

        .page-main .owl_product_item_content .swiper-button-next::after {
            transform: rotate(45deg);
        }

        .page-main .owl_product_item_content .swiper-button-disabled {
            opacity: .35;
            pointer-events: none;
            filter: grayscale(1);
        }

        /* Label */
        .page-main .product-label {
            position: absolute;
            left: 12px;
            top: 12px;
            display: flex;
            gap: 8px;
        }

        .page-main .product-label .label,
        .page-main .product-label .sold-out-label {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .04em;
            padding: 6px 10px;
            background: #fff;
            color: #FF0000;
            border: 1px #ff0000 solid;
            box-shadow: 0 6px 16px rgba(0, 0, 0, .06);
        }

        .page-main .product-label .sold-out-label {
            background: #f1f5f9;
            border-color: #e8edf3;
        }

        /* Info */
        .page-main .product-info {
            padding: 12px 14px 14px;
        }

        .page-main .product-name {
            margin: 2px 0 8px;
            font-size: 16px;
            line-height: 1.35;
        }

        .page-main .product-name a {
            color: var(--text);
            text-decoration: none;
            background: linear-gradient(currentColor, currentColor) 0 100%/0 2px no-repeat;
            transition: background-size .35s var(--ease), color .35s var(--ease);
        }

        .page-main .product-name a:hover {
            color: #000;
            background-size: 100% 2px;
        }

        .page-main .price-box {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .page-main .product-price {
            color: #ff0000;
            font-weight: 800;
            font-size: 17px;
        }

        .page-main .product-price-old {
            color: var(--muted);
            font-size: 14px;
            text-decoration: line-through;
        }

        /* Action (nút giỏ hàng dạng overlay ở mép dưới ảnh) */
        .page-main .product-action-grid {
            padding: 0 !important;
            max-height: none !important;
            overflow: visible !important;
            transform: none !important;
        }

        .page-main .product-thumbnail>.product-action-grid {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 5;
            opacity: 0;
            transform: translateY(100%);
            pointer-events: none;
            transition: opacity .25s var(--ease), transform .25s var(--ease);
        }

        .page-main .product-thumbnail>.product-action-grid .btn-cart {
            display: block;
            width: 100%;
            padding: 12px 16px;
            border: 0;
            border-radius: 0;
            background: #111;
            color: #fff;
            font-weight: 800;
            box-shadow: none;
        }

        .page-main .product-box:hover .product-thumbnail>.product-action-grid {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        .page-main .product-box:hover .image_link img {
            filter: brightness(.88);
        }

        /* Mobile: luôn hiện nút vì không có hover */
        @media (hover:none) and (pointer:coarse) {
            .page-main .product-thumbnail>.product-action-grid {
                opacity: 1;
                transform: none;
                pointer-events: auto;
            }

            .page-main .owl_product_item_content .swiper-button-prev,
            .page-main .owl_product_item_content .swiper-button-next {
                opacity: 1;
                visibility: visible;
                transform: translateY(-50%)
            }
        }

        /* Heading khu vực */
        .page-main .heading_spbc {
            display: flex;
            justify-content: center;
            margin: 10px 0 30px;
        }

        .page-main .heading_spbc .title-head {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            margin: 0;
            font-size: 22px;
        }

        .page-main .heading_spbc .title-head::after {
            display: none;
        }

        .page-main .heading_spbc .title-head a {
            color: var(--text);
            text-decoration: none;
            text-align: center;
            margin: 50px 0;
        }

        /* Nút xem thêm */
        .page-main .btn_xemthem {
            display: flex;
            justify-content: center;
            margin: 60px 0;
        }

        .page-main .btn_xemthem a {
            --btn-h: 46px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: var(--btn-h);
            padding: 20px 100px;
            font-weight: 700;
            text-decoration: none;
            background: #fff;
            color: #000;
            border: 1px solid #000;
            box-shadow: 0 8px 22px rgba(17, 24, 39, .18);
        }

        .page-main .btn_xemthem a:hover {
            box-shadow: 0 14px 28px rgba(17, 24, 39, .22);
            background: #000;
            color: #fff;
        }

        @media (max-width:575.98px) {
            .page-main .btn_xemthem a {
                width: 100%;
                max-width: 340px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .page-main .btn_xemthem a {
                transition: none;
            }
        }

        /* Responsive nhỏ cho brand */
        @media (max-width:768px) {
            .page-main .slide {
                min-width: 150px;
            }
        }

        /* ================== RESET NHẸ TRONG FOOTER – CHỐNG “DÍNH” ================== */
        .footer .row {
            /* Trả margin đúng chuẩn Bootstrap */
            margin-right: -15px;
            margin-left: -15px;
            display: flex;
            flex-wrap: wrap;
        }

        .footer .container {
            max-width: 1140px;
            margin-right: auto;
            margin-left: auto;
            padding-right: 15px;
            padding-left: 15px;
        }

        .footer .col,
        .footer .col-3 {
            padding: 0;
            width: auto;
        }

        .product-action-grid {
            padding: 0 14px 14px;
            max-height: 0;
            opacity: 0;
            transform: translateY(-6px);
            overflow: hidden;
            /* tránh tràn khi ẩn */
            pointer-events: none;
            transition: max-height .35s var(--ease), opacity .25s var(--ease), transform .25s var(--ease);
        }

        /* Hover vào toàn bộ card thì hiện “Giỏ hàng” */
        .product-box:hover .product-action-grid {
            max-height: 80px;
            /* đủ cao cho 1 nút */
            opacity: 1;
            pointer-events: auto;
        }

        /* (Tuỳ chọn) Tô mờ nhẹ ảnh khi hover để nổi các nút */
        .product-box:hover .image_link img {
            filter: brightness(.96);
        }

        /* (Tuỳ chọn) Mobile: luôn hiện “Giỏ hàng” vì không có hover */
        @media (hover: none) and (pointer: coarse) {
            .product-action-grid {
                max-height: 80px;
                opacity: 1;
                transform: none;
                pointer-events: auto;
            }

            .owl_product_item_content .swiper-button-prev,
            .owl_product_item_content .swiper-button-next {
                opacity: 1;
                visibility: visible;
                transform: translateY(-50%) scale(1);
            }
        }

        .product-box {
            position: relative;
        }

        .product-thumbnail {
            position: relative;
            overflow: hidden;
        }

        /* Đổi “Giỏ hàng” thành overlay đè lên ảnh */

        /* Khi hover vào khung ảnh hoặc cả card -> hiện nút */
        .product-box:hover .product-action-grid,
        .product-thumbnail:hover .product-action-grid {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        /* Nút to, nổi bật trên ảnh */
        .btn-cart {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid var(--brand);
            background: var(--brand);
            color: #fff;
            font-weight: 800;
            box-shadow: 0 10px 24px rgba(17, 24, 39, .18);
        }

        /* Mobile: luôn hiện vì không có hover */
        @media (hover:none) and (pointer:coarse) {
            .product-action-grid {
                opacity: 1;
                transform: none;
                pointer-events: auto;
            }
        }

        /* (tuỳ chọn) Làm tối ảnh nhẹ khi hover để nút nổi hơn */
        .product-box:hover .image_link img {
            filter: brightness(.94);
        }

        /* end sản phẩm */
        /* Responsive */
        @media (max-width: 768px) {
            .slide {
                min-width: 150px;
            }

            .btn {
                font-size: 20px;
                padding: 8px 12px;
            }
        }

        /* 0) Xoá khoảng trống dưới ảnh slider */
        .swiper-slide img {
            margin-bottom: 0 !important;
        }

        /* 1) Làm mốc cho overlay */
        .product-thumbnail {
            position: relative !important;
            overflow: hidden;
        }

        /* 2) Reset các rule cũ đang đè (max-height/transform/top:280px/…) */
        .product-action-grid {
            padding: 0 !important;
            max-height: none !important;
            overflow: visible !important;
            transform: none !important;
            /* sẽ set lại ở selector bên dưới */
        }

        /* 3) Thanh giỏ hàng phủ mép dưới ảnh */
        .product-thumbnail>.product-action-grid {
            position: absolute !important;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 5;
            opacity: 0;
            transform: translateY(100%);
            /* ẩn dưới mép ảnh */
            pointer-events: none;
            transition: opacity .25s var(--ease), transform .25s var(--ease);
        }

        /* 4) Nút full-bleed màu đen như demo */
        .product-thumbnail>.product-action-grid .btn-cart {
            display: block;
            width: 100%;
            padding: 12px 16px;
            border: 0;
            border-radius: 0;
            background: #111;
            color: #fff;
            font-weight: 800;
            box-shadow: none;
        }

        /* 5) Hover: kéo thanh lên và làm tối ảnh nhẹ */
        .product-box:hover .product-thumbnail>.product-action-grid {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        .product-box:hover .image_link img {
            filter: brightness(.88);
        }

        /* 6) Mobile: luôn hiện (không có hover) */
        @media (hover:none) and (pointer:coarse) {
            .product-thumbnail>.product-action-grid {
                opacity: 1;
                transform: none;
                pointer-events: auto;
            }
        }

        .awe-section-6 {
            padding: 32px 0 48px;
        }


        .home-two-banner {
            position: relative
        }


        .content_banner {
            position: relative;
            margin-bottom: var(--gap)
        }

        .content_banner .des {
            position: absolute;
            left: 16px;
            bottom: 16px;
            box-shadow: 0 10px 24px rgba(0, 0, 0, .08);
            border-radius: 12px;
            padding: 14px 16px;
            max-width: 80%;
            transition: transform .3s ease, box-shadow .3s ease
        }

        .content_banner .des h4 {
            margin: 0 0 4px;
            font-size: 20px;
            line-height: 1.2
        }

        .content_banner .des h4 span {
            border-bottom: 2px solid #fff;
            padding-bottom: 2px;
            color: #fff;
            font-size: 15px;
        }

        .content_banner .des p {
            margin: 6px 0 10px;
            color: #fff;

            font-size: 14px
        }

        .content_banner .des a {
            font-weight: 600;
            font-size: 20px;
            color: #fff;
        }


        /* About block */
        .about-home {
            margin-top: 24px
        }

        .about-home .inner {
            border-radius: 14px;
            padding: 24px
        }

        .about-home h2 {
            margin: 0 0 8px;
            font-size: 24px;
            text-align: center;
        }

        .about-home p {
            margin: 0;
            font-size: 15px;
            color: #454242ff;
        }


        /* Utility to mimic .hidden-xs: hide on extra small (<576px) */
        .hidden-xs {
            display: none
        }

        @media (min-width:576px) {
            .hidden-xs {
                display: inline-block
            }
        }


        /* Optional: rounded corners & subtle image hover */
        .content_banner a img {
            width: 100%;
            /* Luôn lấp đầy chiều ngang cột */
            height: 250px;
            /* Chiều cao mặc định (cho mobile) */
            object-fit: cover;
            /* LỆNH QUAN TRỌNG: Cắt ảnh vừa khung, không méo */
            border-radius: 14px;
            /* Giữ bo góc */
            transition: transform .4s ease;
            /* Giữ hiệu ứng */
        }

        /* Khi 2 cột hiển thị (màn hình lớn hơn 576px) */
        @media (min-width: 576px) {
            .content_banner a img {
                height: 320px;
                /* Đặt chiều cao cao hơn cho desktop */
            }
        }

        :root {
            --container: 1140px;
            --gap: 24px;
            --text: #111;
            --muted: #555;
            --brand: #111;
        }

        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            color: var(--text)
        }

        a {
            color: inherit;
            text-decoration: none
        }

        img {
            max-width: 100%;
            display: block;
            height: auto
        }


        /* Container & grid (Bootstrap-like, but pure CSS) */
        .container {
            max-width: var(--container);
            margin: 0 auto;
            padding: 0 16px
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-left: calc(var(--gap)/-2);
            margin-right: calc(var(--gap)/-2)
        }

        .col {
            padding-left: calc(var(--gap)/2);
            padding-right: calc(var(--gap)/2)
        }

        /* 2 columns on >=576px, 1 column on small */
        .col-6 {
            width: 100%
        }

        @media (min-width:576px) {
            .col-6 {
                width: 50%
            }
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/partials/header.php'; ?>

    <!-- ================== PAGE MAIN (mọi style chỉ áp dụng trong khối này) ================== -->
    <div class="page-main">

        <div class="policy-box">
            <div class="container">
                <div class="policy-item"><span>Miễn phí vận chuyển</span></div>
                <div class="policy-item"><span>Miễn phí đổi trả</span></div>
                <div class="policy-item"><span>Thanh toán trực tuyến</span></div>
            </div>
        </div>

        <section class="awe-section-2">
            <div class="container">
                <div class="section_slider swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="#" class="clearfix" title="Slider 1">
                                <picture>
                                    <source media="(min-width: 1200px)"
                                        srcset="/assets/images/z7061759418724_151ccf4ce48df7a11f28257e7b369660.jpg">
                                    <source media="(min-width: 992px)"
                                        srcset="/assets/images/z7061759418724_151ccf4ce48df7a11f28257e7b369660.jpg">
                                    <source media="(min-width: 569px)"
                                        srcset="/assets/images/z7061759418724_151ccf4ce48df7a11f28257e7b369660.jpg">
                                    <source media="(max-width: 480px)"
                                        srcset="/assets/images/z7061759418724_151ccf4ce48df7a11f28257e7b369660.jpg">
                                    <img src="/assets/images/z7061759418724_151ccf4ce48df7a11f28257e7b369660.jpg"
                                        alt="Slider 1" class="img-responsive center-block">
                                </picture>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Banners -->
            <section class="awe-section-3">
                <div class="adv_bottom">
                    <div class="container">
                        <div class="adv-row">
                            <div class="adv_bottom_inner">
                                <figure><a href="#" title="Banner 1"><img src="assets/images/duong toc.webp"
                                            alt="Banner 1" loading="lazy"></a></figure>
                            </div>
                            <div class="adv_bottom_inner">
                                <figure><a href="#" title="Banner 2"><img src="assets/images/gôm xịt tóc.webp"
                                            alt="Banner 2" loading="lazy"></a></figure>
                            </div>
                            <div class="adv_bottom_inner">
                                <figure><a href="#" title="Banner 3"><img src="assets/images/sap2.webp" alt="Banner 3"
                                            loading="lazy"></a></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Brand slider -->
            <div class="section-brand">
                <div class="container">
                    <div class="brand-slider">
                        <button class="btn-1 prev">&lt;</button>
                        <div class="slider-track">
                            <div class="slide"><img
                                    src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_1.png"
                                    alt="Brand 1"></div>
                            <div class="slide"><img
                                    src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_2.png"
                                    alt="Brand 2"></div>
                            <div class="slide"><img
                                    src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_3.png"
                                    alt="Brand 3"></div>
                            <div class="slide"><img
                                    src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_4.png"
                                    alt="Brand 4"></div>
                            <div class="slide"><img
                                    src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_5.png"
                                    alt="Brand 5"></div>
                            <div class="slide"><img
                                    src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_6.png"
                                    alt="Brand 6"></div>
                            <div class="slide"><img
                                    src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_7.png"
                                    alt="Brand 7"></div>
                            <div class="slide"><img
                                    src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_8.png"
                                    alt="Brand 8"></div>
                        </div>
                        <button class="btn-1 next">&gt;</button>
                    </div>
                    <hr>
                </div>
            </div>

            <!-- Products -->
            <section class="awe-section-5 section_new_product">
                <div class="container">
                    <div class="heading_spbc">
                        <h2 class="title-head"><a href="san-pham-noi-bat" title="Sản phẩm mới">Sản phẩm mới</a></h2>
                    </div>

                    <div class="row">

                        <!-- ========== SẢN PHẨM 1 ========== -->
                        <div class="col col-3">
                            <div class="product-box">
                                <div class="product-thumbnail">
                                    <div class="swiper-container owl_product_item_content">
                                        <div class="swiper-wrapper">
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        src="./assets/images/product/Hair_wax/By_Vilain_Gold_Digger/by-vilain-gold-digger-travel-open.webp"
                                                        alt="Kính 1"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/kinh2.jpg?v=1445849257957"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Kính 2"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/kinh3.jpg?v=1445849257960"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Kính 3"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/kinh4.jpg?v=1445849257967"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Kính 4"></a>
                                            </div>
                                        </div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-button-next"></div>
                                    </div>

                                    <div class="product-label"><strong class="label">Sale</strong></div>
                                </div>

                                <div class="product-action-grid">
                                    <button class="btn-cart"><i class="fa fa-plus" aria-hidden="true"></i> Giỏ
                                        hàng</button>
                                </div>

                                <div class="product-info a-left">
                                    <h3 class="product-name"><a href="#">Sáp Vuốt Tóc By Vilain Gold Digger
                                        </a></h3>
                                    <div class="price-box">
                                        <span class="price product-price">250.000₫
                                        </span>
                                        <span class="price product-price-old">499.000₫</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ========== SẢN PHẨM 2 (mẫu thêm) ========== -->
                        <div class="col col-3">
                            <div class="product-box">
                                <div class="product-thumbnail">
                                    <div class="swiper-container owl_product_item_content">
                                        <div class="swiper-wrapper">
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        src="./assets/images/product/Volumizing_powder/Dapper_Dan_ULTRA_MATTE_TEXTURE_DUST/texture-dust-front-2048x.webp"
                                                        alt="Mũ 1"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href="#"><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai2.jpg?v=1532575830460"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Mũ 2"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai3.jpg?v=1532575830460"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Mũ 3"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai4.jpg?v=1445849276663"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Mũ 4"></a>
                                            </div>
                                        </div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-button-next"></div>
                                    </div>

                                    <div class="product-label"><strong class="label">Sale</strong></div>
                                </div>

                                <div class="product-action-grid">
                                    <button class="btn-cart"><i class="fa fa-plus" aria-hidden="true"></i> Giỏ
                                        hàng</button>
                                </div>

                                <div class="product-info a-left">
                                    <h3 class="product-name"><a href="#">Bột Tạo Phồng Tóc Dapper Dan Texture Dust</a>
                                    </h3>
                                    <div class="price-box">
                                        <span class="price product-price">289.000₫</span>
                                        <span class="price product-price-old">449.000₫</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col col-3">
                            <div class="product-box">
                                <div class="product-thumbnail">
                                    <div class="swiper-container owl_product_item_content">
                                        <div class="swiper-wrapper">
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        src="./assets/images/product/Volumizing_powder/Reuzel_Matte_Texture_Powder/reuzel-matte-texture-powder-4.webp"
                                                        alt="Mũ 1"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai2.jpg?v=1532575830460"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Mũ 2"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai3.jpg?v=1532575830460"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Mũ 3"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai4.jpg?v=1445849276663"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Mũ 4"></a>
                                            </div>
                                        </div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-button-next"></div>
                                    </div>

                                    <div class="product-label"><strong class="label">Sale</strong></div>
                                </div>

                                <div class="product-action-grid">
                                    <button class="btn-cart"><i class="fa fa-plus" aria-hidden="true"></i> Giỏ
                                        hàng</button>
                                </div>

                                <div class="product-info a-left">
                                    <h3 class="product-name"><a href="#">Bột tạo phồng Reuzel Matte Texture Powder</a>
                                    </h3>
                                    <div class="price-box">
                                        <span class="price product-price">315.000₫</span>
                                        <span class="price product-price-old">420.000₫</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-3">
                            <div class="product-box">
                                <div class="product-thumbnail">
                                    <div class="swiper-container owl_product_item_content">
                                        <div class="swiper-wrapper">
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        src="./assets/images/product/Hair_wax/Kevin_Murphy_Rough_Rider/kevin-murphy-rough-rider.webp"
                                                        alt="Mũ 1"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai2.jpg?v=1532575830460"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Mũ 2"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai3.jpg?v=1532575830460"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Mũ 3"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai4.jpg?v=1445849276663"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Mũ 4"></a>
                                            </div>
                                        </div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-button-next"></div>
                                    </div>

                                    <div class="product-label"><strong class="label">Sale</strong></div>
                                </div>

                                <div class="product-action-grid">
                                    <button class="btn-cart"><i class="fa fa-plus" aria-hidden="true"></i> Giỏ
                                        hàng</button>
                                </div>

                                <div class="product-info a-left">
                                    <h3 class="product-name"><a href="#">Sáp vuốt tóc Kevin Murphy Rough Rider</a></h3>
                                    <div class="price-box">
                                        <span class="price product-price">619.000₫</span>
                                        <span class="price product-price-old">6890.000₫</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <!-- ========== SẢN PHẨM 1 ========== -->
                        <div class="col col-3">
                            <div class="product-box">
                                <div class="product-thumbnail">
                                    <div class="swiper-container owl_product_item_content">
                                        <div class="swiper-wrapper">
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        src="./assets/images/product/Hair_wax/Remaker/remaker-web-1-b8823322-5444-4ef4-8cf3-6c56d301720d.webp"
                                                        alt="Kính 1"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/kinh2.jpg?v=1445849257957"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Kính 2"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/kinh3.jpg?v=1445849257960"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Kính 3"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/kinh4.jpg?v=1445849257967"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Kính 4"></a>
                                            </div>
                                        </div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-button-next"></div>
                                    </div>

                                    <div class="product-label"><strong class="label">Sale</strong></div>
                                </div>

                                <div class="product-action-grid">
                                    <button class="btn-cart"><i class="fa fa-plus" aria-hidden="true"></i> Giỏ
                                        hàng</button>
                                </div>

                                <div class="product-info a-left">
                                    <h3 class="product-name"><a href="#">Sáp vuốt tóc Remaker</a></h3>
                                    <div class="price-box">
                                        <span class="price product-price">240.000₫</span>
                                        <span class="price product-price-old">300.000₫</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ========== SẢN PHẨM 2 (mẫu thêm) ========== -->
                        <div class="col col-3">
                            <div class="product-box">
                                <div class="product-thumbnail">
                                    <div class="swiper-container owl_product_item_content">
                                        <div class="swiper-wrapper">
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        src="./assets/images/product/Hair_conditioner/Blumaan_Hydrating_Hair_Oil/00-hydrating-hair-oil-2000.webp"
                                                        alt="Mũ 1"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href="#"><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai2.jpg?v=1532575830460"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Mũ 2"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai3.jpg?v=1532575830460"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Mũ 3"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai4.jpg?v=1445849276663"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Mũ 4"></a>
                                            </div>
                                        </div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-button-next"></div>
                                    </div>

                                    <div class="product-label"><strong class="label">Sale</strong></div>
                                </div>

                                <div class="product-action-grid">
                                    <button class="btn-cart"><i class="fa fa-plus" aria-hidden="true"></i> Giỏ
                                        hàng</button>
                                </div>

                                <div class="product-info a-left">
                                    <h3 class="product-name"><a href="#">Tinh dầu dưỡng tóc Blumaan Hydrating</a></h3>
                                    <div class="price-box">
                                        <span class="price product-price">549.000₫</span>
                                        <span class="price product-price-old">689.000₫</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col col-3">
                            <div class="product-box">
                                <div class="product-thumbnail">
                                    <div class="swiper-container owl_product_item_content">
                                        <div class="swiper-wrapper">
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        src="./assets/images/product/Hair_spray/Davines_Extra_Strong_Hairspray/gom-xit-toc-davines-extra-strong-hairspray-400ml.webp"
                                                        alt="Mũ 1"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai2.jpg?v=1532575830460"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Mũ 2"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai3.jpg?v=1532575830460"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Mũ 3"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href="#"><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai4.jpg?v=1445849276663"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Mũ 4"></a>
                                            </div>
                                        </div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-button-next"></div>
                                    </div>

                                    <div class="product-label"><strong class="label">Sale</strong></div>
                                </div>

                                <div class="product-action-grid">
                                    <button class="btn-cart"><i class="fa fa-plus" aria-hidden="true"></i> Giỏ
                                        hàng</button>
                                </div>

                                <div class="product-info a-left">
                                    <h3 class="product-name"><a href="#">Gôm Xịt Cứng Davines Strong Hairspray</a></h3>
                                    <div class="price-box">
                                        <span class="price product-price">879.000₫</span>
                                        <span class="price product-price-old">990.000₫</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-3">
                            <div class="product-box">
                                <div class="product-thumbnail">
                                    <div class="swiper-container owl_product_item_content">
                                        <div class="swiper-wrapper">
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        src="./assets/images/product/Hair_wax/Suavecito_Firme_Clay_Pomade/suavecito-firme-clay-open-2048x.webp"
                                                        alt="Mũ 1"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai2.jpg?v=1532575830460"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Mũ 2"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai3.jpg?v=1532575830460"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Mũ 3"></a>
                                            </div>
                                            <div class="item swiper-slide">
                                                <a class="image_link" href=""><img
                                                        data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai4.jpg?v=1445849276663"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                        alt="Mũ 4"></a>
                                            </div>
                                        </div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-button-next"></div>
                                    </div>

                                    <div class="product-label"><strong class="label">Sale</strong></div>
                                </div>

                                <div class="product-action-grid">
                                    <button class="btn-cart"><i class="fa fa-plus" aria-hidden="true"></i> Giỏ
                                        hàng</button>
                                </div>

                                <div class="product-info a-left">
                                    <h3 class="product-name"><a href="#">Sáp Vuốt Tóc Suavecito Oil Based </a></h3>
                                    <div class="price-box">
                                        <span class="price product-price">269.000₫</span>
                                        <span class="price product-price-old">350.000₫</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="btn_xemthem">
                        <a href="san-pham-noi-bat" title="Xem thêm">Xem thêm</a>
                    </div>
                </div>
            </section>
        </section>
    </div>
    <!-- ================== END PAGE MAIN ================== -->
    <section class="awe-section-6">
        <div class="home-two-banner">
            <div class="container">
                <div class="row">
                    <!-- Banner left -->
                    <div class="col col-6 content_banner">
                        <a href="#" title="Handmade">
                            <img class="img-responsive lazyload" src="./assets/images/sap_handmade.jpg" data-src=""
                                alt="Handmade">
                        </a>
                        <div class="des">
                            <h4><span>Handmade</span></h4>
                            <p>Sáp vuốt tóc được làm thủ công bởi những người thợ lành nghề — hương thơm đặc trưng, độ
                                giữ nếp cao.</p>
                            <a href="#" class="hidden-xs" title="Xem thêm">Xem thêm</a>
                        </div>
                    </div>


                    <!-- Banner right -->
                    <div class="col col-6 content_banner">
                        <a href="#" title="Bộ sưu tập mới">
                            <img class="img-responsive lazyload" src="./assets/images/suu_tap.jpg" data-src=""
                                alt="Bộ sưu tập mới">
                        </a>
                        <div class="des">
                            <h4><span>Bộ sưu tập mới</span></h4>
                            <p>Những dòng sáp mới nhất được cập nhật từ các thương hiệu nổi tiếng như By Vilain, Hanz de
                                Fuko, Apestomen…</p>
                            <a href="#" class="hidden-xs" title="Xem thêm">Xem thêm</a>
                        </div>
                    </div>
                </div>


                <!-- About -->
                <div class="about-home">
                    <div class="inner">
                        <h2>Về chúng tôi</h2>
                        <p>
                            Nobility 1800s mang đến cho khách hàng trải nghiệm mua sắm thời trang hàng hiệu trực tuyến
                            đẳng cấp, quy tụ những thương hiệu thời trang quốc tế và trong nước.
                            Chúng tôi cam kết mang lại chất lượng phục vụ tốt nhất, cùng bộ sưu tập khổng lồ gồm quần
                            áo, giày dép, phụ kiện và mỹ phẩm cho cả nam và nữ — bắt kịp xu hướng thời trang mới nhất
                            trên thế giới.

                            Tại Nobility 1800s, bạn dễ dàng tìm thấy mọi phong cách mình muốn:
                            từ những trang phục thoải mái ở nhà, đồ công sở lịch lãm, cho đến set đồ dạo phố năng động.
                            Trải nghiệm mua sắm hàng hiệu trực tuyến chưa từng có – chỉ có tại Nobility 1800s .
                        </p>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <?php include __DIR__ . '/partials/footer.php'; ?>

    <script>
        // Brand slider đơn giản
        const track = document.querySelector('.slider-track');
        const slides = document.querySelectorAll('.slide');
        const prevBtn = document.querySelector('.prev');
        const nextBtn = document.querySelector('.next');
        let index = 0;
        const visibleSlides = 4;
        const totalSlides = slides.length;

        function updateSlider() {
            const slideWidth = slides[0].offsetWidth + 20;
            track.style.transform = `translateX(-${index * slideWidth}px)`;
        }
        nextBtn?.addEventListener('click', () => {
            if (index < totalSlides - visibleSlides) index++;
            else index = 0;
            updateSlider();
        });
        prevBtn?.addEventListener('click', () => {
            if (index > 0) index--;
            else index = totalSlides - visibleSlides;
            updateSlider();
        });
        window.addEventListener('resize', updateSlider);

        // Slider cho từng thẻ sản phẩm (JS thuần)
        (function() {
            function initItemSlider(root) {
                const track = root.querySelector('.swiper-wrapper');
                const slides = Array.from(root.querySelectorAll('.swiper-slide'));
                const prev = root.querySelector('.swiper-button-prev');
                const next = root.querySelector('.swiper-button-next');
                if (!track || slides.length <= 1) {
                    prev?.remove();
                    next?.remove();
                    return;
                }
                let idx = 0;

                function lazyShow(i) {
                    const img = slides[i]?.querySelector('img[data-src]');
                    if (img && (!img.src || img.src.startsWith('data:'))) {
                        img.src = img.getAttribute('data-src');
                        img.removeAttribute('data-src');
                    }
                }

                function update() {
                    const w = root.clientWidth;
                    track.style.transform = 'translateX(' + (-idx * w) + 'px)';
                    lazyShow(idx);
                    if (idx + 1 < slides.length) lazyShow(idx + 1);
                    prev?.classList.toggle('swiper-button-disabled', idx === 0);
                    next?.classList.toggle('swiper-button-disabled', idx >= slides.length - 1);
                }
                prev?.addEventListener('click', () => {
                    if (idx > 0) {
                        idx--;
                        update();
                    }
                });
                next?.addEventListener('click', () => {
                    if (idx < slides.length - 1) {
                        idx++;
                        update();
                    }
                });

                // touch
                let startX = 0,
                    dx = 0,
                    dragging = false;
                root.addEventListener('touchstart', e => {
                    dragging = true;
                    startX = e.touches[0].clientX;
                    dx = 0;
                }, {
                    passive: true
                });
                root.addEventListener('touchmove', e => {
                    if (dragging) dx = e.touches[0].clientX - startX;
                }, {
                    passive: true
                });
                root.addEventListener('touchend', () => {
                    if (!dragging) return;
                    dragging = false;
                    const th = Math.max(40, root.clientWidth * 0.12);
                    if (dx > th && idx > 0) idx--;
                    else if (dx < -th && idx < slides.length - 1) idx++;
                    update();
                });

                // mouse drag (đơn giản)
                let isDown = false,
                    startMX = 0;
                root.addEventListener('mousedown', e => {
                    isDown = true;
                    startMX = e.clientX;
                    e.preventDefault();
                });
                window.addEventListener('mouseup', e => {
                    if (!isDown) return;
                    isDown = false;
                    const moved = e.clientX - startMX;
                    const th = Math.max(40, root.clientWidth * 0.12);
                    if (moved > th && idx > 0) idx--;
                    else if (moved < -th && idx < slides.length - 1) idx++;
                    update();
                });

                window.addEventListener('resize', update);
                lazyShow(0);
                update();
            }
            document.querySelectorAll('.owl_product_item_content').forEach(initItemSlider);
        })();
        (function() {
            const lazyImgs = [].slice.call(document.querySelectorAll('img.lazyload'));
            if ('IntersectionObserver' in window) {
                const io = new IntersectionObserver((entries, obs) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            const src = img.getAttribute('data-src');
                            if (src) {
                                img.src = src;
                                img.removeAttribute('data-src');
                            }
                            img.classList.remove('lazyload');
                            obs.unobserve(img);
                        }
                    })
                }, {
                    rootMargin: '200px'
                });
                lazyImgs.forEach(img => io.observe(img));
            } else {
                // Fallback: load immediately
                lazyImgs.forEach(img => {
                    const src = img.getAttribute('data-src');
                    if (src) img.src = src;
                    img.classList.remove('lazyload');
                });
            }
        })();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>