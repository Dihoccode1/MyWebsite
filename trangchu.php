<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


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
  <title>Trang bán sản phẩm sáp</title>
</head>
<style>
  :root{
  --bg: #fff;
  --text: #111;
  --muted: #6b7280;
  --line: #eceff3;
  --brand: #111;              /* màu nhấn (nút, label…) */
  --brand-ghost: #f3f4f6;
  --radius: 14px;
  --shadow-sm: 0 6px 16px rgba(17,24,39,.08);
  --shadow-md: 0 12px 28px rgba(17,24,39,.12);
  --ease: cubic-bezier(.22,1,.36,1);
}

  .policy-box {
    margin: 10px 0;
  }

  .policy-box .container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    gap: 20px;
  }

  .policy-item {
    flex: 1;
    background: #202020;
    border: 1px solid #333;
    text-align: center;
    padding: 5px;
    border-radius: 4px;
  }

  .policy-item span {
    display: block;
    border: 1px solid #545454;
    line-height: 40px;
    font-size: 14px;
    color: #B8D0E0;
    text-transform: uppercase;
  }

  /* awe-section-2 */
  .awe-section-2 {
    margin-top: 30px;
    margin-bottom: 30px;
  }

  /* Bỏ giới hạn container trong slider */
  /* Ép slider full ngang */
  .awe-section-2 .section_slider,
  .awe-section-2 .swiper-wrapper,
  .awe-section-2 .swiper-slide,
  .awe-section-2 .swiper-slide a,
  .awe-section-2 .swiper-slide picture,
  .awe-section-2 .swiper-slide img {
    width: 100% !important;
  }

  /* Ảnh căn giữa, không thừa khoảng trắng */
  .awe-section-2 .swiper-slide img {
    display: block;
    width: 100%;
    height: auto;
    object-fit: cover;
    /* nếu muốn cắt cho khớp chiều cao */
  }
.swiper-slide img {
  display: block;
  margin-bottom: 30px;
}

  /* end-awe-section-2 */
  /* awe-section-3 */
  .awe-section-3 { padding: 20px 0; background: #fff; }

  /* Ẩn toàn bộ block ở màn hình rất nhỏ (tương tự hidden-xs) */
  .adv_bottom { display:block; }
  .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 16px;
  }
  .adv-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
  }

  /* ====== Item ====== */
  .adv_bottom_inner figure {
    margin: 0;
  }
    .adv_bottom_inner
    {
      border: 1px solid #e6e6e6;
    }
  .adv_bottom_inner a {
    display: block;
    text-decoration: none;
  }
  .adv_bottom_inner img {
    display: block;
    width: 100%;
    height: auto;
    border-radius: 6px;
    transition: transform .25s ease, box-shadow .25s ease;
  }
  /* end-awe-section-3 */
    .section-brand {
      background: #fff;
    }

    .container {
      width: 90%;
      max-width: 1200px;
      margin: auto;
      position: relative;
    }

    .brand-slider {
      position: relative;
      display: flex;
      align-items: center;
      overflow: hidden;
    }

    .slider-track {
      display: flex;
      transition: transform 0.4s ease;
    }

    .slide {
      min-width: 200px;
      margin: 0 10px;
    }

    .slide img {
      width: 100%;
      border-radius: 10px;
      transition: transform 0.3s;
    }

    .btn-1 {
      background: #B8D0E0;
      color: #fff;
      border: none;
      font-size: 30px;
      padding: 10px 15px;
      cursor: pointer;
      transition: 0.3s;
      z-index: 5;
    }

    .prev {
      color:#000;
      position: absolute;
      left: 0;
    }

    .next {
      color:#000;
      position: absolute;
      right: 0;
    }
    /* sản phẩm  */

 .row{ display:flex; flex-wrap:wrap; margin:-10px; }
.col{ padding:10px; box-sizing:border-box; }
.col-3{ width:25%; }
@media (max-width: 991.98px){ .col-3{ width:50%; } }
@media (max-width: 575.98px){ .col-3{ width:100%; } }

/* ========== Card sản phẩm ========== */
.product-box{
  background: var(--bg);
  border: 1px solid var(--line);
  border-radius: var(--radius);
  overflow: hidden;
  box-shadow: var(--shadow-sm);
  transition: transform .35s var(--ease), box-shadow .35s var(--ease), border-color .35s;
}
.product-box:hover{

  box-shadow: var(--shadow-md);
  border-color: #e6ebf0;
}

/* ========== Vùng ảnh/slider ========== */
.product-thumbnail{
  position: relative;
  background: linear-gradient(180deg,#fafbfc 0%,#f7fafc 100%);
}

/* Slider wrapper (JS thuần) */
.owl_product_item_content{ position:relative; overflow:hidden; }
.owl_product_item_content .swiper-wrapper{
  display:flex;
  will-change: transform;
}
.owl_product_item_content .swiper-slide{
  flex: 0 0 100%;
  width: auto !important;
}

/* Ảnh: bo cong nhẹ + hiệu ứng zoom mượt */
.image_link{ display:block; }
.image_link img{
  width: 100%; height: auto; display:block;
  transition: transform .5s var(--ease), filter .4s var(--ease);
}
.product-box:hover .image_link img{ transform: scale(1.03); }

/* ========== Nút điều hướng (giữ class y như Swiper) ========== */
.owl_product_item_content .swiper-button-prev,
.owl_product_item_content .swiper-button-next{
  position:absolute; top:50%; transform: translateY(-50%);
  width: 36px; height: 36px; border-radius: 50%;
  background: rgba(255,255,255,.96);
  border: 1px solid #e5eaf0;
  box-shadow: 0 8px 20px rgba(0,0,0,.08);
  display: grid; place-items: center;
  cursor: pointer; user-select: none; z-index: 2;
  transition: transform .2s var(--ease), box-shadow .2s var(--ease), background .2s;
}
.owl_product_item_content .swiper-button-prev{ left: 10px; }
.owl_product_item_content .swiper-button-next{ right: 10px; }
.owl_product_item_content .swiper-button-prev:hover,
.owl_product_item_content .swiper-button-next:hover{
  transform: translateY(-50%) scale(1.06);
  box-shadow: 0 10px 26px rgba(0,0,0,.12);
  background: #fff;
}
.owl_product_item_content .swiper-button-prev::after,
.owl_product_item_content .swiper-button-next::after{
  content:""; width: 10px; height: 10px; display:block;
  border-top: 2px solid #333; border-right: 2px solid #333;
}
.owl_product_item_content .swiper-button-prev::after{ transform: rotate(-135deg); }
.owl_product_item_content .swiper-button-next::after{ transform: rotate(45deg); }
.owl_product_item_content .swiper-button-disabled{
  opacity: .35; pointer-events: none; filter: grayscale(1);
}

/* ========== Label (Sale / Hết hàng) ========== */
.product-label{ position:absolute; left:12px; top:12px; display:flex; gap:8px; }
.product-label .label,
.product-label .sold-out-label{
  font-size: 12px; font-weight: 700; letter-spacing: .04em;
  padding: 6px 10px;
  background: #fff; color: var(--brand);
  box-shadow: 0 6px 16px rgba(0,0,0,.06);
  color:#FF0000;
  border:1px #ff0000 solid;
}
.product-label .sold-out-label{
  background: #f1f5f9; color:#FF0000; border-color:#e8edf3;
}

/* ========== Info, tên & giá ========== */
.product-info{ padding: 12px 14px 14px; }
.product-name{ margin: 2px 0 8px; font-size: 16px; line-height: 1.35; }
.product-name a{
  color: var(--text); text-decoration: none;
  background: linear-gradient(currentColor,currentColor) 0 100%/0 2px no-repeat;
  transition: background-size .35s var(--ease), color .35s var(--ease);
}
.product-name a:hover{
  color: #000; background-size: 100% 2px;
}

.price-box{ display:flex; align-items:center; gap:10px; }
.product-price{
  color:#ff0000; font-weight:800; font-size: 17px;
}
.product-price-old{
  color: var(--muted); font-size: 14px; text-decoration: line-through;
}

/* ========== Hành động ========== */
.product-action-grid{ padding: 0 14px 14px; }
.btn-cart{
  width: 100%;
  padding: 10px 12px;
  border-radius: 10px;
  border: 1px solid var(--brand);
  background: var(--brand);
  color: #fff; font-weight: 700;
  transition: transform .15s var(--ease), box-shadow .25s var(--ease), background .25s;
  box-shadow: 0 10px 24px rgba(17,24,39,.15);
}
.btn-cart:hover{
  box-shadow: 0 14px 30px rgba(17,24,39,.2);
  background: #000;
}
.btn-cart[disabled]{
  background: var(--brand-ghost); color:#9aa3af; border-color: #e5e7eb;
  box-shadow: none;
}

/* ========== Heading khu vực ========== */
.heading_spbc {
  display: flex;
  justify-content: center;
  margin-bottom: 30px;    
  margin-top: 10px;
}

.heading_spbc .title-head {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  margin: 0;
  font-size: 22px;
}

.heading_spbc .title-head::after { display: none; }

.heading_spbc .title-head a {
  color: var(--text);
  text-decoration: none;
  text-align: center;
}
.owl_product_item_content .swiper-button-prev,
.owl_product_item_content .swiper-button-next{
  opacity: 0;
  visibility: hidden;
  transform: translateY(-50%) scale(.92);
  transition: opacity .25s ease, visibility .25s ease, transform .25s ease;
}

/* Khi hover vào khung ảnh hoặc cả card -> hiện lên */
.product-box:hover .owl_product_item_content .swiper-button-prev,
.product-box:hover .owl_product_item_content .swiper-button-next,
.product-thumbnail:hover .owl_product_item_content .swiper-button-prev,
.product-thumbnail:hover .owl_product_item_content .swiper-button-next{
  opacity: 1;
  visibility: visible;
  transform: translateY(-50%) scale(1);
}

/* 2) Nút “Giỏ hàng” ẩn mặc định, hover mới hiện */
.product-action-grid{
  padding: 0 14px 14px;
  max-height: 0;
  opacity: 0;
  transform: translateY(-6px);
  overflow: hidden;                 /* tránh tràn khi ẩn */
  pointer-events: none;
  transition: max-height .35s var(--ease), opacity .25s var(--ease), transform .25s var(--ease);
}

/* Hover vào toàn bộ card thì hiện “Giỏ hàng” */
.product-box:hover .product-action-grid{
  max-height: 80px;                 /* đủ cao cho 1 nút */
  opacity: 1;
  transform: translateY(0);
  pointer-events: auto;
}

/* (Tuỳ chọn) Tô mờ nhẹ ảnh khi hover để nổi các nút */
.product-box:hover .image_link img{
  filter: brightness(.96);
}

/* (Tuỳ chọn) Mobile: luôn hiện “Giỏ hàng” vì không có hover */
@media (hover: none) and (pointer: coarse){
  .product-action-grid{
    max-height: 80px;
    opacity: 1;
    transform: none;
    pointer-events: auto;
  }
  .owl_product_item_content .swiper-button-prev,
  .owl_product_item_content .swiper-button-next{
    opacity: 1;
    visibility: visible;
    transform: translateY(-50%) scale(1);
  }
}
.product-box{ position: relative; }
.product-thumbnail{ position: relative; overflow: hidden; }

/* Đổi “Giỏ hàng” thành overlay đè lên ảnh */
.product-action-grid{
  position: absolute;
  left: 14px;
  right: 14px;
  top: 280px;
  z-index: 3;

  /* hiệu ứng xuất hiện khi hover */
  max-height: none;           /* bỏ hạn chế chiều cao cũ */
  opacity: 0;
  transform: translateY(8px); /* trượt nhẹ từ dưới lên */
  pointer-events: none;
  transition: opacity .25s var(--ease), transform .25s var(--ease);
}

/* Khi hover vào khung ảnh hoặc cả card -> hiện nút */
.product-box:hover .product-action-grid,
.product-thumbnail:hover .product-action-grid{
  opacity: 1;
  transform: translateY(0);
  pointer-events: auto;
}

/* Nút to, nổi bật trên ảnh */
.btn-cart{
  width: 100%;
  padding: 12px 14px;
  border-radius: 12px;
  border: 1px solid var(--brand);
  background: var(--brand);
  color: #fff;
  font-weight: 800;
  box-shadow: 0 10px 24px rgba(17,24,39,.18);
}

/* Mobile: luôn hiện vì không có hover */
@media (hover:none) and (pointer:coarse){
  .product-action-grid{
    opacity: 1;
    transform: none;
    pointer-events: auto;
  }
}

/* (tuỳ chọn) Làm tối ảnh nhẹ khi hover để nút nổi hơn */
.product-box:hover .image_link img{
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
</style>

<body>
  <?php include __DIR__ . '/partials/header.php'; ?>
  </head>

  <body>

    <div class="policy-box">
      <div class="container">
        <div class="policy-item">
          <span>Miễn phí vận chuyển</span>
        </div>
        <div class="policy-item">
          <span>Miễn phí đổi trả</span>
        </div>
        <div class="policy-item">
          <span>Thanh toán trực tuyến</span>
        </div>
      </div>
    </div>
    <section class="awe-section-2">
      <div class="container">
        <div class="section_slider swiper-container swiper-container-initialized swiper-container-horizontal">
          <div class="swiper-wrapper" id="swiper-wrapper-af31fffd477d321b" aria-live="off" style="transform: translate3d(0px, 0px, 0px);">
            <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 1" style="width: 1170px;"> <a href="#" class="clearfix" title="Slider 1">
                <picture>
                  <source media="(min-width: 1200px)" srcset="/assets/images/z7061759418724_151ccf4ce48df7a11f28257e7b369660.jpg">
                  <source media="(min-width: 992px)" srcset="/assets/images/z7061759418724_151ccf4ce48df7a11f28257e7b369660.jpg">
                  <source media="(min-width: 569px)" srcset="/assets/images/z7061759418724_151ccf4ce48df7a11f28257e7b369660.jpg">
                  <source media="(max-width: 480px)" srcset="/assets/images/z7061759418724_151ccf4ce48df7a11f28257e7b369660.jpg"> <img src="/assets/images/z7061759418724_151ccf4ce48df7a11f28257e7b369660.jpg" alt="Slider 1" class="img-responsive center-block">
                </picture>
              </a> </div>
          </div> <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
      </div>
      <section class="awe-section-3">
        <div class="adv_bottom">
          <div class="container">
            <div class="adv-row">
              <!-- Banner 1 -->
              <div class="adv_bottom_inner">
                <figure>
                  <a href="#" title="Banner 1">
                    <img
                      src="assets/images/duong toc.webp"
                      alt="Banner 1"
                      loading="lazy">
                  </a>
                </figure>
              </div>

              <!-- Banner 2 -->
              <div class="adv_bottom_inner">
                <figure>
                  <a href="#" title="Banner 2">
                    <img
                      src="assets/images/gôm xịt tóc.webp"
                      alt="Banner 2"
                      loading="lazy">
                  </a>
                </figure>
              </div>

              <!-- Banner 3 -->
              <div class="adv_bottom_inner">
                <figure>
                  <a href="#" title="Banner 3">
                    <img
                      src="assets/images/sap2.webp"
                      alt="Banner 3"
                      loading="lazy">
                  </a>
                </figure>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="section-brand">
 <div class="section-brand">
    <div class="container">
      <div class="brand-slider">
        <button class="btn-1 prev">&lt;</button>
        <div class="slider-track">
          <div class="slide"><img src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_1.png" alt="Brand 1"></div>
          <div class="slide"><img src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_2.png" alt="Brand 2"></div>
          <div class="slide"><img src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_3.png" alt="Brand 3"></div>
          <div class="slide"><img src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_4.png" alt="Brand 4"></div>
          <div class="slide"><img src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_5.png" alt="Brand 5"></div>
          <div class="slide"><img src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_6.png" alt="Brand 6"></div>
          <div class="slide"><img src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_7.png" alt="Brand 7"></div>
          <div class="slide"><img src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_8.png" alt="Brand 8"></div>
          <div class="slide"><img src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_8.png" alt="Brand 8"></div>
          <div class="slide"><img src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_8.png" alt="Brand 8"></div>
          <div class="slide"><img src="https://bizweb.dktcdn.net/thumb/medium/100/004/366/themes/900241/assets/brand_8.png" alt="Brand 8"></div>
        </div>
        <button class="btn-1 next">&gt;</button>
      </div>
        <hr>
    </div>
  </div>
  <section class="awe-section-5">
  <section class="section_new_product">
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
                    <a class="image_link" href="#"><img src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/kinh.jpg?v=1445834520927" alt="Kính 1"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/kinh2.jpg?v=1445849257957" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Kính 2"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/kinh3.jpg?v=1445849257960" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Kính 3"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/kinh4.jpg?v=1445849257967" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Kính 4"></a>
                  </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
              </div>

              <div class="product-label"><strong class="label">Sale</strong></div>
            </div>

            <div class="product-action-grid">
              <button class="btn-cart"><i class="fa fa-plus" aria-hidden="true"></i> Giỏ hàng</button>
            </div>

            <div class="product-info a-left">
              <h3 class="product-name"><a href="#">Kính mát gọng vuông Ray-Ban</a></h3>
              <div class="price-box">
                <span class="price product-price">1.500.000₫</span>
                <span class="price product-price-old">1.640.000₫</span>
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
                    <a class="image_link" href="#"><img src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/mu.jpg?v=1445834520390" alt="Mũ 1"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai2.jpg?v=1532575830460" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Mũ 2"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai3.jpg?v=1532575830460" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Mũ 3"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai4.jpg?v=1445849276663" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Mũ 4"></a>
                  </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
              </div>

              <div class="product-label"><strong class="label">Sale</strong></div>
            </div>

            <div class="product-action-grid">
              <button class="btn-cart"><i class="fa fa-plus" aria-hidden="true"></i> Giỏ hàng</button>
            </div>

            <div class="product-info a-left">
              <h3 class="product-name"><a href="#">Mũ lưỡi trai New Era</a></h3>
              <div class="price-box">
                <span class="price product-price">200.000₫</span>
                <span class="price product-price-old">240.000₫</span>
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
                    <a class="image_link" href="#"><img src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/mu.jpg?v=1445834520390" alt="Mũ 1"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai2.jpg?v=1532575830460" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Mũ 2"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai3.jpg?v=1532575830460" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Mũ 3"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai4.jpg?v=1445849276663" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Mũ 4"></a>
                  </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
              </div>

              <div class="product-label"><strong class="label">Sale</strong></div>
            </div>

            <div class="product-action-grid">
              <button class="btn-cart"><i class="fa fa-plus" aria-hidden="true"></i> Giỏ hàng</button>
            </div>

            <div class="product-info a-left">
              <h3 class="product-name"><a href="#">Mũ lưỡi trai New Era</a></h3>
              <div class="price-box">
                <span class="price product-price">200.000₫</span>
                <span class="price product-price-old">240.000₫</span>
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
                    <a class="image_link" href="#"><img src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/mu.jpg?v=1445834520390" alt="Mũ 1"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai2.jpg?v=1532575830460" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Mũ 2"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai3.jpg?v=1532575830460" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Mũ 3"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai4.jpg?v=1445849276663" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Mũ 4"></a>
                  </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
              </div>

              <div class="product-label"><strong class="label">Sale</strong></div>
            </div>

            <div class="product-action-grid">
              <button class="btn-cart"><i class="fa fa-plus" aria-hidden="true"></i> Giỏ hàng</button>
            </div>

            <div class="product-info a-left">
              <h3 class="product-name"><a href="#">Mũ lưỡi trai New Era</a></h3>
              <div class="price-box">
                <span class="price product-price">200.000₫</span>
                <span class="price product-price-old">240.000₫</span>
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
                    <a class="image_link" href="#"><img src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/kinh.jpg?v=1445834520927" alt="Kính 1"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/kinh2.jpg?v=1445849257957" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Kính 2"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/kinh3.jpg?v=1445849257960" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Kính 3"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/kinh4.jpg?v=1445849257967" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Kính 4"></a>
                  </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
              </div>

              <div class="product-label"><strong class="label">Sale</strong></div>
            </div>

            <div class="product-action-grid">
              <button class="btn-cart"><i class="fa fa-plus" aria-hidden="true"></i> Giỏ hàng</button>
            </div>

            <div class="product-info a-left">
              <h3 class="product-name"><a href="#">Kính mát gọng vuông Ray-Ban</a></h3>
              <div class="price-box">
                <span class="price product-price">1.500.000₫</span>
                <span class="price product-price-old">1.640.000₫</span>
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
                    <a class="image_link" href="#"><img src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/mu.jpg?v=1445834520390" alt="Mũ 1"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai2.jpg?v=1532575830460" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Mũ 2"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai3.jpg?v=1532575830460" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Mũ 3"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai4.jpg?v=1445849276663" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Mũ 4"></a>
                  </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
              </div>

              <div class="product-label"><strong class="label">Sale</strong></div>
            </div>

            <div class="product-action-grid">
              <button class="btn-cart"><i class="fa fa-plus" aria-hidden="true"></i> Giỏ hàng</button>
            </div>

            <div class="product-info a-left">
              <h3 class="product-name"><a href="#">Mũ lưỡi trai New Era</a></h3>
              <div class="price-box">
                <span class="price product-price">200.000₫</span>
                <span class="price product-price-old">240.000₫</span>
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
                    <a class="image_link" href="#"><img src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/mu.jpg?v=1445834520390" alt="Mũ 1"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai2.jpg?v=1532575830460" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Mũ 2"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai3.jpg?v=1532575830460" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Mũ 3"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai4.jpg?v=1445849276663" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Mũ 4"></a>
                  </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
              </div>

              <div class="product-label"><strong class="label">Sale</strong></div>
            </div>

            <div class="product-action-grid">
              <button class="btn-cart"><i class="fa fa-plus" aria-hidden="true"></i> Giỏ hàng</button>
            </div>

            <div class="product-info a-left">
              <h3 class="product-name"><a href="#">Mũ lưỡi trai New Era</a></h3>
              <div class="price-box">
                <span class="price product-price">200.000₫</span>
                <span class="price product-price-old">240.000₫</span>
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
                    <a class="image_link" href="#"><img src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/mu.jpg?v=1445834520390" alt="Mũ 1"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai2.jpg?v=1532575830460" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Mũ 2"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai3.jpg?v=1532575830460" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Mũ 3"></a>
                  </div>
                  <div class="item swiper-slide">
                    <a class="image_link" href="#"><img data-src="//bizweb.dktcdn.net/thumb/large/100/004/366/products/muluoitrai4.jpg?v=1445849276663" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="Mũ 4"></a>
                  </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
              </div>

              <div class="product-label"><strong class="label">Sale</strong></div>
            </div>

            <div class="product-action-grid">
              <button class="btn-cart"><i class="fa fa-plus" aria-hidden="true"></i> Giỏ hàng</button>
            </div>

            <div class="product-info a-left">
              <h3 class="product-name"><a href="#">Mũ lưỡi trai New Era</a></h3>
              <div class="price-box">
                <span class="price product-price">200.000₫</span>
                <span class="price product-price-old">240.000₫</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</section>

 <script>
    const track = document.querySelector('.slider-track');
    const slides = document.querySelectorAll('.slide');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');

    let index = 0;
    const visibleSlides = 4; // số ảnh hiển thị cùng lúc
    const totalSlides = slides.length;

    function updateSlider() {
      const slideWidth = slides[0].offsetWidth + 20; // cộng margin
      track.style.transform = `translateX(-${index * slideWidth}px)`;
    }

    nextBtn.addEventListener('click', () => {
      if (index < totalSlides - visibleSlides) {
        index++;
      } else {
        index = 0; // quay lại đầu
      }
      updateSlider();
    });

    prevBtn.addEventListener('click', () => {
      if (index > 0) {
        index--;
      } else {
        index = totalSlides - visibleSlides; // quay lại cuối
      }
      updateSlider();
    });


    window.addEventListener('resize', updateSlider);
    /* ====== JS THUẦN: slider cho mọi .owl_product_item_content ====== */
(function(){
  function initItemSlider(root){
    const track  = root.querySelector('.swiper-wrapper');
    const slides = Array.from(root.querySelectorAll('.swiper-slide'));
    const prev   = root.querySelector('.swiper-button-prev');
    const next   = root.querySelector('.swiper-button-next');
    if (!track || slides.length <= 1) {
      if (prev) prev.style.display='none';
      if (next) next.style.display='none';
      return;
    }

    let idx = 0;

    function lazyShow(i){
      const img = slides[i]?.querySelector('img[data-src]');
      if (img && (!img.src || img.src.startsWith('data:'))) {
        img.src = img.getAttribute('data-src');
        img.removeAttribute('data-src');
      }
    }

    function update(){
      const w = root.clientWidth;                 // mỗi slide = 100% khung
      track.style.transform = 'translateX(' + (-idx * w) + 'px)';
      lazyShow(idx); if (idx+1 < slides.length) lazyShow(idx+1);
      prev?.classList.toggle('swiper-button-disabled', idx===0);
      next?.classList.toggle('swiper-button-disabled', idx>=slides.length-1);
    }

    prev?.addEventListener('click', ()=>{ if (idx>0) { idx--; update(); } });
    next?.addEventListener('click', ()=>{ if (idx<slides.length-1) { idx++; update(); } });

    // Vuốt cảm ứng
    let startX=0, dx=0, dragging=false;
    root.addEventListener('touchstart', e=>{ dragging=true; startX=e.touches[0].clientX; dx=0; }, {passive:true});
    root.addEventListener('touchmove',  e=>{ if(dragging) dx=e.touches[0].clientX - startX; }, {passive:true});
    root.addEventListener('touchend',   ()=>{ 
      if(!dragging) return; dragging=false;
      const th = Math.max(40, root.clientWidth*0.12);
      if (dx> th && idx>0) idx--;
      else if (dx<-th && idx<slides.length-1) idx++;
      update();
    });

    // Kéo chuột (desktop)
    let isDown=false, startMX=0;
    root.addEventListener('mousedown', e=>{ isDown=true; startMX=e.clientX; e.preventDefault(); });
    window.addEventListener('mouseup', e=>{
      if(!isDown) return; isDown=false;
      const moved = e.clientX - startMX;
      const th = Math.max(40, root.clientWidth*0.12);
      if (moved> th && idx>0) idx--;
      else if (moved<-th && idx<slides.length-1) idx++;
      update();
    });

    window.addEventListener('resize', update);
    lazyShow(0); update();
  }

  document.querySelectorAll('.owl_product_item_content').forEach(initItemSlider);
})();
  </script>
      <?php include __DIR__ . '/partials/footer.php'; ?>
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
      </script>

  </body>

</html>
