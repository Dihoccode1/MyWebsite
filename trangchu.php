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

  /* ====== Container & Grid ====== */
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
  .adv_bottom_inner {
    width: 100%;
  }
  .adv_bottom_inner figure {
    margin: 0;
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
  /* ====== Responsive breakpoints ====== */
  @media (max-width: 991.98px) {        /* ~ col-md -> col-sm */
    .adv-row { grid-template-columns: repeat(3, 1fr); }
  }
  @media (max-width: 767.98px) {        /* ~ col-sm -> col-xs */
    .adv-row { grid-template-columns: repeat(2, 1fr); }
  }
  @media (max-width: 575.98px) {        /* xs: đã ẩn toàn block ở trên */
    .adv-row { grid-template-columns: 1fr; }
  }
  /* end-awe-section-3 */
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
                      src="assets/images/sap.webp"
                      alt="Banner 3"
                      loading="lazy">
                  </a>
                </figure>
              </div>
            </div>
          </div>
        </div>
      </section>


      <?php include __DIR__ . '/partials/footer.php'; ?>
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
      </script>

  </body>

</html>