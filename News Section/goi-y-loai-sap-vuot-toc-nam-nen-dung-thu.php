<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Sơmi denim cho chàng khoe cá tính</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="/bootstrap-4.6.2-dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/base.css">
  <link rel="stylesheet" href="../News Section/style.css"><!-- CSS sidebar -->

  <style>
    :root{ --text:#222; --muted:#777; --line:#e6e6e6; --black:#000; }

    .container-section{max-width:100%; margin:0; padding:0;}
    .article-title{font-size:26px; line-height:1.3; margin:0 0 8px; font-weight:700}
    .article-title a{color:var(--text); text-decoration:none}
    .meta{display:flex; gap:10px; flex-wrap:wrap; font-size:13px; color:var(--muted); margin-bottom:16px}
    .meta .sep{color:#ccc}
    .rte p{margin:14px 0}
    .rte img{width:100%; height:auto; display:block; object-fit:cover; margin:12px 0}

    .share{display:flex; align-items:center; gap:10px; font-size:13px; color:var(--muted); margin-top:18px}
    .share .icons{display:flex; gap:8px}
    .share a{display:inline-flex; width:28px; height:28px; border:1px solid #ccc; align-items:center; justify-content:center; text-decoration:none; color:#444}

    .prevnext{display:flex; justify-content:space-between; font-size:13px; color:#666; margin:14px 0}
    .prevnext a{color:#666; text-decoration:none}
    .prevnext a:hover{color:#000; text-decoration:underline}

    hr{border:0; border-top:1px solid var(--line); margin:22px 0}
    .section-title{font-size:14px; font-weight:700; letter-spacing:.6px; color:#333; margin:0 0 14px; text-transform:uppercase}

    .comment{display:flex; gap:12px; padding:14px 0; border-top:1px solid var(--line)}
    .comment:first-of-type{border-top:0}
    .avatar{width:48px; height:48px; border-radius:4px; overflow:hidden; flex:0 0 48px}
    .avatar img{width:100%; height:100%; object-fit:cover; display:block}
    .c-body{flex:1}
    .c-meta{font-size:12px; color:var(--muted); margin-bottom:6px}
    .c-meta .name{color:#333; font-weight:600}

    label{display:block; font-size:13px; color:#333; margin-bottom:6px}
    .form-group{margin-bottom:14px}
    .form-control{width:100%; padding:10px 12px; border:1px solid #ccc; border-radius:2px; font:inherit}
    textarea.form-control{min-height:120px; resize:vertical}
    .btn-class{display:inline-block; padding:10px 18px; background:var(--black); color:#fff; border:0; cursor:pointer; font-weight:700}
    .btn-class:hover{opacity:.9}

    /* ===== Breadcrumb ===== */
    .bread-crumb{padding:10px 0;border-bottom:1px solid #eee;background:transparent}
    .breadcrumb{list-style:none;margin:0;padding:0;display:flex;align-items:center;gap:8px;font-size:14px;background:transparent!important}
    .breadcrumb li{color:#666;display:flex;align-items:center}
    .breadcrumb li.home a,
    .breadcrumb li:nth-child(2) a{font-weight:600;color:#333;text-decoration:none}
    .breadcrumb a{color:#000;text-decoration:none;font-weight:600}
    .breadcrumb a:hover{text-decoration:underline;color:#000}
    .breadcrumb li strong span{color:#000;text-decoration:none;cursor:default}

    /* ===== 30/70 layout ===== */
    @media (min-width: 992px){
      .col-30{flex:0 0 30%;max-width:30%}
      .col-70{flex:0 0 70%;max-width:70%}
    }
    .sidebar-pad{padding-right:24px}
    .content-pad{padding-left:24px}
  </style>
</head>
<body>
  <?php include __DIR__ . '/../partials/header.php'; ?>

  <!-- BREADCRUMB 3 CẤP -->
  <section class="bread-crumb">
    <div class="container">
      <ul class="breadcrumb">
        <li class="home">
          <a href="/"><span>Trang chủ</span></a>
          <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
        </li>
        <li>
          <a href="/tintuc.php"><span>Tin tức</span></a>
          <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"></i>&nbsp;</span>
        </li>
        <li><strong><span>Gợi ý loại sáp vuốt tóc nam tốt nhất nên dùng thử một lần trong đời</span></strong></li>
      </ul>
    </div>
  </section>

  <!-- LAYOUT 30/70 -->
  <div class="container mt-5 px-3 px-md-4 px-lg-5">
    <div class="row">

      <!-- Sidebar trái 30% -->
      <div class="col-12 col-lg-4 col-30 sidebar-pad">
        <?php include __DIR__ . '/../News Section/content.php'; ?>
      </div>

      <!-- Bài viết 70% (giữ nguyên link/nội dung bạn đưa) -->
      <div class="col-12 col-lg-8 col-70 content-pad mb-3">
        <div class="container-section">
          <h1 class="article-title">
            <a href="#">Gợi ý loại sáp vuốt tóc nam tốt nhất nên dùng thử một lần trong đời</a>
          </h1>
          <div class="meta">
            <div>Đăng ngày&nbsp;29/09/2025</div>
            <span class="sep">•</span>
            <div>bởi <strong>Nobility</strong></div>
          </div>

          <div class="rte">
            <p>Trên thị trường có rất nhiều loại sáp với chất lượng và mức giá khác nhau. Tuy nhiên, một số dòng sáp cao cấp như By Vilain Gold Digger, Clay Wax hay Morris Motley luôn được giới trẻ ưa chuộng nhờ khả năng giữ nếp mạnh mẽ, mùi hương dễ chịu và không gây bết dính. Đây là những lựa chọn mà bạn nên thử ít nhất một lần trong đời.</p>
            <p><img src="/assets/images/sáp vuốt tóc nên dùng 1 lần trong đời.jpg" alt="Gợi ý sáp vuốt tóc nam tốt nhất nên dùng thử một lần trong đời"></p>
            <p>Các dòng sáp cao cấp này không chỉ giúp mái tóc của bạn vào nếp hoàn hảo, mà còn bảo vệ tóc khỏi bụi bẩn và tác động môi trường. Đặc biệt, các thành phần tự nhiên trong sản phẩm giúp tóc khỏe mạnh hơn sau mỗi lần sử dụng.</p>
            <p>Nếu bạn là người yêu thích phong cách lịch lãm, tự tin và chỉn chu, hãy lựa chọn dòng sáp phù hợp với chất tóc của mình để có được diện mạo hoàn hảo nhất mỗi ngày.</p>
          </div>

          <div class="share">
            <span>Chia sẻ với bạn:</span>
            <div class="icons">
              <a href="https://www.facebook.com/sharer/sharer.php?u=http://gentleman-theme.mysapo.net/goi-y-loai-sap-vuot-toc-nam-tot-nhat-nen-dung-thu-mot-lan-trong-doi" target="_blank" aria-label="Facebook">f</a>
              <a href="https://plus.google.com/share?url=http://gentleman-theme.mysapo.net/goi-y-loai-sap-vuot-toc-nam-tot-nhat-nen-dung-thu-mot-lan-trong-doi" target="_blank" aria-label="Google+">g+</a>
            </div>
          </div>

          <div class="prevnext">
            <div>← <a href="/News Section/huong-dan-su-dung-sap-vuot-toc.php">Bài viết trước</a></div>
            <div><a href="/News Section/cach-bao-quan-sap-vuot-toc.php">Bài viết sau</a> →</div>
          </div>

          <hr>

          <h3 class="section-title">Ý kiến bạn đọc</h3>
          <div class="comment">
            <div class="avatar"><img src="https://www.gravatar.com/avatar/3f009d72559f51e7e454b16e5d0687a1?s=110&d=identicon" alt="avatar"></div>
            <div class="c-body">
              <div class="c-meta">Đăng ngày 10/10/2025 · bởi <span class="name">Tuấn</span></div>
              <div class="c-text">Mình đang dùng Gold Digger, đúng là đáng tiền thật sự!</div>
            </div>
          </div>

          <div class="comment">
            <div class="avatar"><img src="https://www.gravatar.com/avatar/57a697fc97be4fba4e83eaa0a55207a5?s=110&d=identicon" alt="avatar"></div>
            <div class="c-body">
              <div class="c-meta">Đăng ngày 09/10/2025 · bởi <span class="name">Hải</span></div>
              <div class="c-text">Morris Motley thơm cực kỳ luôn, không bết tóc!</div>
            </div>
          </div>

          <hr>

          <h3 class="section-title">Để lại ý kiến</h3>
          <form method="post" action="#" accept-charset="UTF-8">
            <div class="form-group">
              <label>Tên của bạn</label>
              <input type="text" class="form-control" placeholder="John Doe" required>
            </div>
            <div class="form-group">
              <label>Địa chỉ email</label>
              <input type="email" class="form-control" placeholder="email@bizweb.com" required>
            </div>
            <div class="form-group">
              <label>Ý kiến của bạn</label>
              <textarea class="form-control" required></textarea>
            </div>
            <button class="btn-class" type="submit">Bình luận</button>
          </form>
        </div>
      </div>

    </div>
  </div>

  <?php include __DIR__ . '/../partials/footer.php'; ?>

  <script>
    // popup chia sẻ dạng desktop
    function winOpen(url){
      var width=575, height=400;
      var left=(window.innerWidth/2 - width/2);
      var top=(window.innerHeight/2 - height/2);
      var opts='status=1,resizable=yes' + ',width='+width+',height='+height + ',top='+top+',left='+left;
      var win=window.open(url,'',opts); if(win) win.focus(); return win;
    }
    if (window.innerWidth > 767) {
      document.querySelectorAll('.share a').forEach(function(a){
        a.addEventListener('click', function(e){ e.preventDefault(); winOpen(this.href); });
      });
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
