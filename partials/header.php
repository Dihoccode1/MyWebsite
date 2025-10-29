 <!-- header -->
 <header class="header">
     <div class="topbar">
         <div class="container">
             <div class="topbar-right">
                 <a href="/account/register.php" class="btn btn-outline">ĐĂNG KÝ</a>
                 <a href="/account/login.php" class="btn btn-primary">ĐĂNG NHẬP</a>
             </div>
         </div>
     </div>

 </header>
 <header class="mid-header">
     <div class="container">
         <div class="header-main">
             <div class="header-left">
                 <form action="/search" method="get" class="search-bar">
                     <input type="text" name="query" placeholder="Tìm kiếm">
                     <button type="submit">
                         <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                     </button>
                 </form>
             </div>

             <div class="header-center">
                 <a href="/" class="logo">
                     <img src="/assets/images/logo.jpg" alt="GENTLEMAN">
                 </a>
             </div>

             <div class="header-right">
                 <a href="../giohang.php" class="cart-link">
                     <i class="fa-solid fa-cart-shopping" aria-hidden="true"></i>
                     GIỎ HÀNG (<span class="cart-count">0</span>)
                 </a>
             </div>

         </div>
     </div>
 </header>
 <!-- end header -->
 <nav class="main-nav">
     <ul>
         <li><a href="/trangchu.php">TRANG CHỦ</a></li>
         <li><a href="/gioithieu.php">GIỚI THIỆU</a></li>
         <li class="has-submenu">
             <a href="/sanpham/sanpham.php">SẢN PHẨM <i class="fa-solid fa-caret-down"></i></a>
             <ul class="submenu">
                 <li><a href="/san-pham/spkhuyenmai">Sản phẩm khuyến mãi</a></li>
                 <li><a href="../sanpham/sanphamnoibat.php">Sản phẩm nổi bật</a></li>
                 <li><a href="/san-pham/phu-kien">Sản phẩm mới</a></li>
             </ul>
         </li>
         <li><a href="/tintuc.php">TIN TỨC</a></li>
         <li><a href="/lienhe.php">LIÊN HỆ</a></li>
     </ul>
 </nav>