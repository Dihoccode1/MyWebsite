<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tin tức</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/base.css">

  <style>
    img{max-width:100%;display:block}
    a{color:#0d6efd;text-decoration:none;transition:color .2s ease}

    .container{max-width:1200px;margin:0 auto;padding:0 16px}
    .row{display:flex;flex-wrap:wrap;margin:0 -8px}
    .col{padding:0 8px}

    /* Grid sẵn có */
    .col-xs-12{flex:0 0 100%;max-width:100%}
    .col-md-9{flex:0 0 75%;max-width:75%}
    .col-md-3{flex:0 0 25%;max-width:25%}
    .col-md-push-3{order:2}
    .col-md-pull-9{order:1}
    @media (max-width:991px){
      .col-md-9,.col-md-3{flex:0 0 100%;max-width:100%}
      .col-md-push-3,.col-md-pull-9{order:initial}
    }

    /* ===== BREADCRUMB ===== */
    .bread-crumb{padding:10px 0;border-bottom:1px solid #eee;background:transparent}
    .breadcrumb{list-style:none;margin:0;padding:0;display:flex;align-items:center;gap:8px;font-size:14px;background:transparent!important}
    .breadcrumb li{color:#666;display:flex;align-items:center}
    .breadcrumb li.home a{font-weight:600;color:#333}
    .breadcrumb .sep{color:#999}
    .breadcrumb li strong span{color:#000}

    /* ===== PAGE TITLE ===== */
    .page_title{font-size:26px;margin:18px 0 12px}

    /* ===== MAIN CONTENT ===== */
    .right-content{margin-bottom:50px}
    .list-blogs .row{margin-top:8px}
    .blog_xxx{padding:0 8px;margin-bottom:18px}
    .blog-item{display:flex;gap:16px;padding:12px;border:1px solid #eee;border-radius:8px;background:#fff;transition:box-shadow .2s ease,transform .06s ease}
    .blog-item-thumbnail{flex:0 0 240px;max-width:240px}
    .blog-item-thumbnail .thumb{display:block;overflow:hidden;border-radius:6px}
    .blog-item-thumbnail img{width:100%;height:160px;object-fit:cover;border:1px solid #f0f0f0;border-radius:6px}
    .blog-item-info{flex:1 1 auto;min-width:0}
    .blog-item-name{margin:0 0 6px;font-size:18px;line-height:1.4}
    .blog-item-name a{color:#111}
    .date{display:flex;gap:14px;align-items:center;color:#888;font-size:12px;margin-bottom:8px}
    .post-time,.news_home_content_short_time{white-space:nowrap}
    .blog-item-summary{margin:0 0 10px;color:#444}
    .news_post_loop_more .btn{display:inline-block;padding:8px 12px;border-radius:6px;background:#000;color:#fff;font-size:13px;border:1px solid #000}
    .news_post_loop_more .btn:hover{background:#fff;color:#000}

    @media (max-width:767px){
      .blog-item{flex-direction:column}
      .blog-item-thumbnail{flex:0 0 auto;max-width:100%}
      .blog-item-thumbnail img{height:200px}
    }

    /* ===== SIDEBAR ===== */
    .left-content .aside-item{margin-bottom:24px}
    .aside-title{margin:0 0 10px}
    .aside-title .title-head{font-size:18px;margin:0;display:inline-block;border:2px solid #000;padding:6px 30px}
    .aside-title .title-head span a{color:#111}
    .aside-title .title-head span a:hover{color:#FF0000}
    .blog-list .loop-blog{padding:10px 0;border-bottom:1px dashed #eee}
    .blog-list .loop-blog:last-child{border-bottom:none}
    .blog-list h3{font-size:14px;margin:0 0 4px}
    .blog-list .date{font-size:12px;color:#888}
    .blog-aside a{text-decoration:none;color:#333}
    .banner_blogs .widget{margin-top:30px}
    .banner_blogs .widget img{width:100%;height:auto;border-radius:8px;border:1px solid #f0f0f0}

    .margin-bottom-50{margin-bottom:50px}
    .text-center{text-align:center}
    .hidden-xs,.hidden-sm{display:block}
    @media (max-width:767px){.hidden-xs{display:none}}
    @media (min-width:768px) and (max-width:991px){.hidden-sm{display:none}}

    /* ====== 30/70 layout mới ====== */
    @media (min-width:992px){
      .col-30{flex:0 0 30%;max-width:30%}
      .col-70{flex:0 0 70%;max-width:70%}
      .order-lg-1{order:1}
      .order-lg-2{order:2}
    }
    /* Khoảng cách giữa 2 cột */
    .sidebar-pad{padding-right:24px}
    .content-pad{padding-left:24px}

    /* Đảm bảo sidebar full trong cột */
    .sidebar-pad .col-md-3,
    .sidebar-pad .col-md-pull-9{flex:0 0 100%!important;max-width:100%!important;order:initial!important}
  </style>
</head>

<body>
  <?php include __DIR__ . '/partials/header.php'; ?>

  <!-- BREADCRUMB -->
  <section class="bread-crumb">
    <span class="crumb-border"></span>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul class="breadcrumb">
            <li class="home">
              <a href="/"><span>Trang chủ</span></a>
              <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
            </li>
            <li><strong><span>Tin tức</span></strong></li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- PAGE CONTENT -->
  <div class="container" itemscope itemtype="http://schema.org/Blog">
    <meta itemprop="name" content="Tin tức">
    <meta itemprop="description" content="Chào mừng quý khách đến với Gentleman - website mua sắm thời trang hàng đầu Việt Nam. Ở Gentleman, quý khách sẽ có những trải nghiệm mua sắm vô cùng thú vị!">

    <div class="row">
      <div class="box-heading col-xs-12">
        <h1 style="font-size:35px">Tin tức</h1>
      </div>

      <!-- SIDEBAR (30%) -->
      <aside class="col col-30 order-lg-1 sidebar-pad">
        <?php include __DIR__ . '/News Section/content.php'; ?>
      </aside>

      <!-- MAIN (70%) -->
      <section class="right-content margin-bottom-50 col col-70 order-lg-2 content-pad">
        <section class="list-blogs blog-main">
          <div class="row">

            <!-- Item 1 -->
            <div class="col col-xs-12 blog_xxx">
              <article class="blog-item">
                <div class="blog-item-thumbnail">
                  <a class="thumb" href="/News Section/Sáp-Vuốt-Tóc-By-Vilain-Gold-Digger-Giữ-nếp-mạnh-không-bóng.php" target="_blank" title="Sáp Vuốt Tóc By Vilain Gold Digger">
                    <img loading="lazy" src="/assets/images/OIP.webp" alt="Sáp Vuốt Tóc By Vilain Gold Digger">
                  </a>
                </div>
                <div class="blog-item-info">
                  <h3 class="blog-item-name">
                    <a href="/News Section/Sáp-Vuốt-Tóc-By-Vilain-Gold-Digger-Giữ-nếp-mạnh-không-bóng.php" target="_blank" title="Sáp Vuốt Tóc By Vilain Gold Digger">
                      Sáp Vuốt Tóc By Vilain Gold Digger – Giữ nếp mạnh, không bóng
                    </a>
                  </h3>
                  <div class="date">
                    <div class="post-time">Đăng ngày&nbsp;29/09/2025</div>
                    <div class="news_home_content_short_time">bởi <span>THE MAN</span></div>
                  </div>
                  <p class="blog-item-summary">
                    By Vilain Gold Digger là dòng sáp cao cấp đến từ Đan Mạch, nổi bật với khả năng giữ nếp siêu mạnh (Strong Hold)
                    và độ bóng 0% cho mái tóc tự nhiên. Sản phẩm phù hợp cho mọi kiểu tóc từ Undercut, Side Part,
                    đến Pompadour, giúp anh em tự tin cả ngày dài.
                  </p>
                  <div class="news_post_loop_more">
                    <a class="btn btn-primary" target="_blank" href="/News Section/Sáp-Vuốt-Tóc-By-Vilain-Gold-Digger-Giữ-nếp-mạnh-không-bóng.php" title="Xem chi tiết">Xem chi tiết</a>
                  </div>
                </div>
              </article>
            </div>

            <!-- Item 2 -->
            <div class="col col-xs-12 blog_xxx">
              <article class="blog-item">
                <div class="blog-item-thumbnail">
                  <a class="thumb" href="/News Section/huong-dan-su-dung-sap-vuot-toc.php" target="_blank" title="Hướng dẫn sử dụng sáp vuốt tóc">
                    <img loading="lazy" src="https://cdn.tgdd.vn/Files/2019/03/05/1153067/huong-dan-su-dung-wax-vuot-toc-giup-giu-nep-lau-va-khong-ngua-1_700x400.jpg" alt="Hướng dẫn sử dụng sáp vuốt tóc">
                  </a>
                </div>
                <div class="blog-item-info">
                  <h3 class="blog-item-name">
                    <a href="/News Section/huong-dan-su-dung-sap-vuot-toc.php" target="_blank" title="Hướng dẫn sử dụng sáp vuốt tóc">
                      Hướng dẫn sử dụng sáp vuốt tóc đúng cách
                    </a>
                  </h3>
                  <div class="date">
                    <div class="post-time">Đăng ngày&nbsp;29/09/2025</div>
                    <div class="news_home_content_short_time">bởi <span>THE MAN</span></div>
                  </div>
                  <p class="blog-item-summary">
                    Để có một kiểu tóc đẹp và giữ nếp lâu, việc sử dụng sáp đúng cách rất quan trọng.
                    Lấy một lượng sáp vừa đủ, xoa đều ra lòng bàn tay, sau đó vuốt từ chân tóc đến ngọn
                    để tạo form mong muốn. Hãy nhớ rằng dùng quá nhiều sáp có thể khiến tóc bết dính.
                    Xem ngay hướng dẫn chi tiết để tối ưu hiệu quả tạo kiểu!
                  </p>
                  <div class="news_post_loop_more">
                    <a class="btn btn-primary" href="/News Section/huong-dan-su-dung-sap-vuot-toc.php" target="_blank" title="Xem chi tiết">Xem chi tiết</a>
                  </div>
                </div>
              </article>
            </div>

            <!-- Item 3 -->
            <div class="col col-xs-12 blog_xxx">
              <article class="blog-item">
                <div class="blog-item-thumbnail">
                  <a class="thumb" href="/News Section/goi-y-loai-sap-vuot-toc-nam-nen-dung-thu.php" target="_blank" title="Gợi ý loại sáp vuốt tóc nam nên dùng thử một lần trong đời">
                    <img loading="lazy" src="https://api.watsons.vn/api/v2/wtcvn/blog/wp-content/uploads/tong-hop-nhung-loai-sap-vuot-toc-nam-co-bong-cao-4-min-1.jpg" alt="Gợi ý loại sáp vuốt tóc nam nên dùng thử">
                  </a>
                </div>
                <div class="blog-item-info">
                  <h3 class="blog-item-name">
                    <a href="/News Section/goi-y-loai-sap-vuot-toc-nam-nen-dung-thu.php" target="_blank" title="Gợi ý loại sáp vuốt tóc nam nên dùng thử một lần trong đời">
                      Gợi ý loại sáp vuốt tóc nam tốt nhất nên dùng thử một lần trong đời
                    </a>
                  </h3>
                  <div class="date">
                    <div class="post-time">Đăng ngày&nbsp;29/09/2025</div>
                    <div class="news_home_content_short_time">bởi <span>THE MAN</span></div>
                  </div>
                  <p class="blog-item-summary">
                    Trên thị trường có rất nhiều loại sáp với chất lượng và mức giá khác nhau.
                    Tuy nhiên, một số dòng sáp cao cấp như By Vilain Gold Digger, Clay Wax hay Morris Motley
                    luôn được giới trẻ ưa chuộng nhờ khả năng giữ nếp mạnh mẽ, mùi hương dễ chịu
                    và không gây bết dính. Đây là những lựa chọn mà bạn nên thử ít nhất một lần trong đời.
                  </p>
                  <div class="news_post_loop_more">
                    <a class="btn btn-primary" href="/News Section/goi-y-loai-sap-vuot-toc-nam-nen-dung-thu.php" target="_blank" title="Xem chi tiết">Xem chi tiết</a>
                  </div>
                </div>
              </article>
            </div>

            <!-- Item 4 -->
            <div class="col col-xs-12 blog_xxx">
              <article class="blog-item">
                <div class="blog-item-thumbnail">
                  <a class="thumb" href="/News Section/cach-bao-quan-sap-vuot-toc.php" target="_blank" title="Cách bảo quản sáp vuốt tóc">
                    <img loading="lazy" src="https://menitems.vn/cdn/shop/articles/cach-xac-dinh-han-su-dung-cua-sap-vuot-toc_5_9718989c-5e49-424b-b4a2-0b35e153716e.jpg?v=1741167983&width=1000" alt="Cách bảo quản sáp vuốt tóc">
                  </a>
                </div>
                <div class="blog-item-info">
                  <h3 class="blog-item-name">
                    <a href="/News Section/cach-bao-quan-sap-vuot-toc.php" target="_blank" title="Cách bảo quản sáp vuốt tóc">
                      Cách bảo quản sáp vuốt tóc để dùng lâu và hiệu quả
                    </a>
                  </h3>
                  <div class="date">
                    <div class="post-time">Đăng ngày&nbsp;29/09/2025</div>
                    <div class="news_home_content_short_time">bởi <span>THE MAN</span></div>
                  </div>
                  <p class="blog-item-summary">
                    Để sáp luôn giữ được chất lượng, anh em nên bảo quản sản phẩm nơi khô ráo, thoáng mát,
                    tránh ánh nắng trực tiếp và nhiệt độ quá cao. Sau khi sử dụng, hãy đóng chặt nắp hộp
                    để tránh sáp bị khô hoặc bay mùi. Với cách bảo quản đúng, một hộp sáp có thể dùng được rất lâu.
                  </p>
                  <div class="news_post_loop_more">
                    <a class="btn btn-primary" href="/News Section/cach-bao-quan-sap-vuot-toc.php" target="_blank" title="Xem chi tiết">Xem chi tiết</a>
                  </div>
                </div>
              </article>
            </div>

            <!-- Item 5 -->
            <div class="col col-xs-12 blog_xxx">
              <article class="blog-item">
                <div class="blog-item-thumbnail">
                  <a class="thumb" href="/News Section/Cach-phan-biet-sap-vuot-toc-that-va-gia.php" target="_blank" title="Cách phân biệt sáp vuốt tóc thật và giả">
                    <img loading="lazy" src="https://cdn.tgdd.vn/Files/2017/05/29/987295/cach-phan-biet-sap-vuot-toc-nam-gia-va-that-202109162020354691.jpg" alt="Cách phân biệt sáp vuốt tóc thật và giả">
                  </a>
                </div>
                <div class="blog-item-info">
                  <h3 class="blog-item-name">
                    <a href="/News Section/Cach-phan-biet-sap-vuot-toc-that-va-gia.php" target="_blank" title="Cách phân biệt sáp vuốt tóc thật và giả">
                      Cách phân biệt sáp vuốt tóc thật và giả
                    </a>
                  </h3>
                  <div class="date">
                    <div class="post-time">Đăng ngày&nbsp;29/09/2025</div>
                    <div class="news_home_content_short_time">bởi <span>THE MAN</span></div>
                  </div>
                  <p class="blog-item-summary">
                    Trên thị trường hiện nay xuất hiện rất nhiều loại sáp vuốt tóc kém chất lượng.
                    Để phân biệt sáp thật và giả, anh em cần chú ý đến bao bì, tem chống giả,
                    mùi hương và chất sáp bên trong. Sáp chính hãng thường có mùi dịu nhẹ,
                    chất sáp mịn và dễ tan khi xoa đều. Hãy mua tại cửa hàng uy tín để tránh rủi ro.
                  </p>
                  <div class="news_post_loop_more">
                    <a class="btn btn-primary" href="/News Section/Cach-phan-biet-sap-vuot-toc-that-va-gia.php" target="_blank" title="Xem chi tiết">Xem chi tiết</a>
                  </div>
                </div>
              </article>
            </div>

          </div>
        </section>

        <div class="row">
          <div class="col col-xs-12 text-center">
            <!-- Phân trang nếu cần -->
          </div>
        </div>
      </section>
    </div>
  </div>

  <div class="ab-module-article-mostview"></div>
  <?php include __DIR__ . '/partials/footer.php'; ?>

  <!-- (Tùy chọn) CSS ngoài cho module reviews -->
  <link rel="preload" as="style" href="https://bizweb.dktcdn.net/100/004/366/themes/900241/assets/bpr-products-module.css">
  <link rel="stylesheet" href="https://bizweb.dktcdn.net/100/004/366/themes/900241/assets/bpr-products-module.css" />
  <div class="bizweb-product-reviews-module"></div>
</body>
</html>
