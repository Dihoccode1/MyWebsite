<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Liên hệ- Gentleman</title>
  <link rel="stylesheet" href="bootstrap-4.6.2-dist/css/bootstrap.css"
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
    /* ===== Base / Reset gọn ===== */
    *,
    *::before,
    *::after {
      box-sizing: border-box
    }

    html,
    body {
      margin: 0;
      font-family: Roboto, system-ui, -apple-system, Segoe UI, Arial, sans-serif;
      font-size: 12px;
      color: #222;
      line-height: 1.6;
      background: #fff
    }

    img {
      max-width: 100%;
      display: block
    }

    a {
      text-decoration: none;
      color: #0d6efd
    }

    a:hover {
      opacity: .9
    }

    /* ===== Layout ===== */
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 16px
    }

    .row {
      display: flex;
      flex-wrap: wrap;
      margin: 0 -8px
    }

    .col {
      padding: 0 8px
    }

    .col-6 {
      flex: 0 0 50%;
      max-width: 50%
    }

    .col-12 {
      flex: 0 0 100%;
      max-width: 100%
    }

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

    /* ===== Page title ===== */
    .page-header {
      padding: 18px 0 6px
    }

    .title-head {
      font-size: 28px;
      margin: 0;
      font-weight: 700
    }

    /* không gạch dưới */

    /* ===== Map box ===== */
    .box-maps {
      border: 1px solid #eee;
      border-radius: 6px;
      overflow: hidden
    }

    .map {
      position: relative;
      padding-top: 45%
    }

    /* 16:9 ~ 56%, map thấp hơn chọn 45% */
    .map iframe {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      border: 0
    }

    /* ===== Form ===== */
    .card {
      border: 1px solid #eee;
      border-radius: 8px;
      padding: 16px;
      background: #fff
    }

    .card h2 {
      font-size: 18px;
      margin: 0 0 10px
    }

    .form-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 12px
    }

    label {
      display: block;
      font-weight: 500;
      margin-bottom: 4px
    }

    .form-control {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #d9d9d9;
      border-radius: 6px;
      background: #fff;
      font: inherit
    }

    .form-control:focus {
      outline: none;
      border-color: #0d6efd;
      box-shadow: 0 0 0 3px rgba(13, 110, 253, .12)
    }

    textarea.form-control {
      min-height: 120px;
      resize: vertical
    }

    .btn {
      display: inline-block;
      border-radius: 8px;
      padding: 10px 20px;
      background: #000;
      color: #fff;
    }
    .btn:hover {
      background: #fff;
      color: #000;
      border: 1px solid #000;
    }



    /* ===== Contact info ===== */
    .contact-card {
      border: 1px solid #eee;
      border-radius: 8px;
      padding: 16px;
      background: #fff
    }

    .contact-card h2 {
      font-size: 18px;
      margin: 0 0 10px
    }

    .contact-item {
      display: flex;
      gap: 10px;
      align-items: flex-start;
      padding: 10px 0;
      border-top: 1px dashed #eee
    }

    .contact-item:first-child {
      border-top: 0
    }

    .icon {
      width: 34px;
      height: 34px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      flex: 0 0 34px
    }

    .contact-item .text {
      font-size: 14px;
      color: #333
    }

    /* ===== Spacing helpers ===== */
    .mt-20 {
      margin-top: 20px
    }

    .mb-20 {
      margin-bottom: 20px
    }
    .text a
    {
      color: #333;
      text-decoration: none;
    }
    .text:hover {
      color: #FF0000;
    }
    .text a:hover {
      color: #FF0000;
    }
    /* ===== Responsive ===== */
    @media (max-width:992px) {
      .col-6 {
        flex: 0 0 100%;
        max-width: 100%
      }

      .map {
        padding-top: 56%
      }

      .title-head {
        font-size: 24px
      }
    }
  </style>
</head>

<body>
  <?php include __DIR__ . '/partials/header.php'; ?>
  <!-- BREADCRUMB -->
  <section class="bread-crumb">
    <div class="container">
      <ul class="breadcrumb">
        <li class="home"><a href="/trangchu.php"><span>Trang chủ</span></a></li>
        <li class="sep"><i class="fa-solid fa-angle-right"></i></li>
        <li><strong><span>Liên hệ</span></strong></li>
      </ul>
    </div>
  </section>

  <!-- TIÊU ĐỀ + MAP -->
  <section class="container">
    <div class="page-header">
                <h1 style="font-size:35px">Liên hệ</h1>
    </div>

    <div class="row mb-20">
      <div class="col col-12">
        <div class="box-maps">
          <div class="map">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7844.969835519974!2d106.60488100000002!3d10.541174999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1759034566070!5m2!1svi!2s"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FORM + THÔNG TIN -->
  <section class="container mt-20">
    <div class="row">
      <!-- Form -->
      <div class="col col-6 mb-20">
        <div class="card">
          <h2>Để lời nhắn</h2>
          <form action="#" method="post" novalidate>
            <div class="form-grid">
              <div>
                <label for="name">Họ và tên</label>
                <input id="name" name="name" type="text" class="form-control" required>
              </div>
              <div>
                <label for="email">Địa chỉ email</label>
                <input id="email" name="email" type="email" class="form-control" required>
              </div>
              <div>
                <label for="phone">Số điện thoại</label>
                <input id="phone" name="phone" type="tel" pattern="[0-9\s+()-]*" class="form-control" required>
              </div>
              <div>
                <label for="message">Lời nhắn</label>
                <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
              </div>
              <div>
                <button type="submit" class="btn">Gửi tin nhắn</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Contact info -->
      <div class="col col-6 mb-20">
        <div class="contact-card">
          <h2>Hãy liên hệ với chúng tôi!</h2>

          <div class="contact-item">
            <span class="icon"><i class="fa-solid fa-location-dot"></i></span>
            <div class="text"> 140B-Tổ 3, Ấp Xóm Chùa,Tỉnh Tây Ninh</div>
          </div>

          <div class="contact-item">
            <span class="icon"><i class="fa-solid fa-phone"></i></span>
            <div class="text"><a href="tel:19006750">0338286525</a></div>
          </div>

          <div class="contact-item">
            <span class="icon"><i class="fa-solid fa-envelope"></i></span>
            <div class="text"><a href="mailto:contact@example.com">thanhloc29052006@gmail.com</a></div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <?php include __DIR__ . '/partials/footer.php'; ?>
</body>

</html>
<script src="/assets/js/auth.js"></script>

<!-- Các file còn lại -->
<script src="/assets/js/store.js"></script>
<script src="/assets/js/ui.js"></script>
<script src="/assets/js/products.seed.js"></script>
<script src="/assets/js/products.app.js"></script>