<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Giới thiệu - Gentleman</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
    integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <!-- Font Awesome cho icon mũi tên breadcrumb -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/base.css">
  <style>
    /* ===== Reset nhỏ gọn ===== */
    *,
    *::before,
    *::after {
      box-sizing: border-box
    }

    body {
      margin: 0;
      color: #222;
      line-height: 1.6;
    }

    img {
      max-width: 100%;
      display: block
    }

    /* ===== Container & Grid tự viết ===== */
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 16px
    }

    .row {
      display: flex;
      flex-wrap: wrap
    }

    .col-12 {
      flex: 0 0 100%
    }

    /* ===== Breadcrumb ===== */
    .bread-crumb {
      position: relative;
      background: transparent;
      padding: 10px 0;
      border-bottom: 1px solid #eee;
    }

    .bread-crumb .crumb-border {
      position: absolute;
      left: 0;
      right: 0;
      bottom: 0;
      height: 1px;
      content: "";
    }

    .breadcrumb {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      flex-wrap: wrap;
      font-size: 14px;
      background: transparent !important;
    }

    .breadcrumb li {
      display: flex;
      align-items: center;
      color: #666
    }

    .breadcrumb li a {
      color: #333;
      text-decoration: none
    }

    .breadcrumb .home span {
      font-weight: 600
    }

    .breadcrumb li strong span {
      color: #000
    }

    /* ===== Page Title ===== */
    .page {
      padding: 22px 0 36px
    }

    .page-title {
      margin-bottom: 12px
    }

    .page-title .title-head {
      font-size: 32px;
      line-height: 1.3;
      margin: 0;
      font-weight: 700;
      padding-bottom: 10px;
        border-bottom: none !important;
    }

    .page-title .title-head a {
      text-decoration: none;
      color: #111
    }

    /* ===== Content ===== */
    .content-page.rte p {
      margin: 10px 0;
      text-align: justify;
      font-size: 15px;
      color: #333;
    }

    .content-page.rte p strong {
      display: block;
      font-size: 15.5px;
      text-transform: uppercase;
      color: #111;
    }

    /* ===== Responsive nhỏ ===== */
    @media (max-width:576px) {
      .breadcrumb {
        font-size: 13px
      }

      .page {
        padding: 16px 0 28px
      }

      .page-title .title-head {
        font-size: 20px
      }
    }
  </style>
</head>

<body>
  <?php include __DIR__ . '/partials/header.php'; ?>
  <!-- ===== BREADCRUMB ===== -->
  <section class="bread-crumb">
    <span class="crumb-border"></span>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <ul class="breadcrumb">
            <li class="home">
              <a href="/trangchu.php"><span>Trang chủ</span></a>
              <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
            </li>
            <li><strong><span>Giới thiệu</span></strong></li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== PAGE ===== -->
  <section class="page">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="page-title category-title">
              <h1 style="font-size:35px">Giới thiệu</h1>
          </div>

          <div class="content-page rte">
            <p><strong>THE MAN - WEBSITE BÁN SÁP VÀ SẢN PHẨM TẠO KIỂU TÓC CHO NAM HÀNG ĐẦU VIỆT NAM</strong></p>

            <p>BẠN ĐANG TÌM KIẾM NHỮNG LOẠI SÁP VÀ SẢN PHẨM TẠO KIỂU TÓC NAM GIỮ NẾP LÂU, HƯƠNG THƠM NAM TÍNH VÀ CHÍNH HÃNG? HÃY MUA NGAY HÔM NAY TẠI THE MAN!</p>

            <p>THE MAN mang lại cho khách hàng trải nghiệm mua sắm hiện đại và tiện lợi với các dòng sáp vuốt tóc nam cao cấp, pomade, gôm xịt tóc, dưỡng tóc và các sản phẩm chăm sóc tóc khác. Chúng tôi cam kết sản phẩm chính hãng, chất lượng cao, giúp bạn tự tin trong mọi phong cách: từ lịch lãm công sở, cá tính đường phố cho tới phong trần, mạnh mẽ. Tất cả đều có tại THE MAN.</p>

            <p><strong>THE MAN - MÓN QUÀ Ý NGHĨA CHO NAM GIỚI!</strong></p>

            <p>Nếu bạn muốn dành tặng người thân, bạn bè một món quà thật thiết thực và ý nghĩa, các sản phẩm sáp và pomade tại THE MAN chính là lựa chọn hoàn hảo. Chúng tôi đảm bảo mức giá tốt cùng dịch vụ chăm sóc khách hàng tận tâm.</p>

            <p><strong>SẢN PHẨM CHÍNH HÃNG - GIÁ HỢP LÝ</strong></p>

            <p>THE MAN luôn cập nhật những thương hiệu sáp nổi tiếng và được ưa chuộng hàng đầu hiện nay: By Vilain, Blumaan, Hanz de Fuko, Apestomen, Kevin Murphy, và nhiều thương hiệu khác. Ngoài ra, chúng tôi còn có các dòng sản phẩm tầm trung chất lượng cao, phù hợp với nhiều nhu cầu và túi tiền. Đặc biệt, THE MAN thường xuyên có các chương trình khuyến mãi và ưu đãi hấp dẫn.</p>

            <p><strong>MUA SẮM DỄ DÀNG - THANH TOÁN AN TOÀN</strong></p>

            <p>Bạn có thể đặt hàng tại THE MAN nhanh chóng và an toàn, chính sách đổi trả linh hoạt trong vòng 7 ngày nếu sản phẩm không như mô tả. Nếu cần tư vấn chọn loại sáp phù hợp, hãy liên hệ ngay với đội ngũ chăm sóc khách hàng của chúng tôi để được hỗ trợ.</p>
          </div>

        </div>
      </div>
    </div>
  </section>
  <?php include __DIR__ . '/partials/footer.php'; ?>
</body>

</html>