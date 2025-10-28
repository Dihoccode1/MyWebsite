<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="../assets/css/base.css" />
    <title>Chi Tiết Sản Phẩm: Tinh Chất Chống Rụng Tóc, Dưỡng Tóc Davines Energizing Superactive</title>
</head>
<style>
/* CSS CHUNG (GIỮ NGUYÊN) */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    color: #333;
}

a {
    text-decoration: none;
    color: inherit;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 16px;
}

hr {
    border: 0;
    border-top: 1px solid #eee;
}

.top-bar {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    padding: 8px 0;
    font-size: 12px;
    color: #888;
}

.top-bar a {
    margin-left: 15px;
    text-transform: uppercase;
}

.main-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 25px 0;
}

.search-bar {
    display: flex;
    border: 1px solid #ccc;
}

.search-bar input {
    border: none;
    padding: 8px 12px;
    font-size: 14px;
    outline: none;
}

.search-bar button {
    border: none;
    background: #333;
    color: white;
    padding: 0 12px;
    cursor: pointer;
}

.logo {
    margin: 0;
    text-align: center;
}

.logo img {
    max-height: 45px;
    width: auto;
    display: block;
}

.cart-link {
    font-size: 14px;
    font-weight: bold;
}

.main-nav {
    display: flex;
    justify-content: center;
    padding: 10px 0;
}

.main-nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

.main-nav li a {
    padding: 10px 20px;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 14px;
    display: block;
}

.main-nav li a.active {
    background-color: #000;
    color: #fff;
}

.breadcrumbs {
    padding: 15px 0;
    font-size: 17px;
    color: #777;
}

.breadcrumbs a {
    color: #333;
}

/* ====== CSS CHO TRANG CHI TIẾT SẢN PHẨM (ĐÃ CHỈNH FONT SIZE) ====== */

.product-detail-page {
    padding-top: 30px;
    padding-bottom: 50px;
}

/* --- Khu vực Ảnh sản phẩm --- */
.main-image {
    border: 1px solid #eee;
    padding: 10px;
    margin-bottom: 20px;
}

.main-image img {
    width: 100%;
    height: auto;
}

/* --- Khu vực Thông tin sản phẩm --- */
.product-info h1 {
    font-size: 30px;
    /* Đã tăng */
    font-weight: 700;
    margin-bottom: 15px;
}

/* Font size chung cho các đoạn văn bản chính */
.product-info p,
.product-description p,
.product-description li {
    font-size: 16px;
    /* Đã đặt kích thước chung lớn hơn */
}

.product-price-detail {
    margin-bottom: 20px;
    padding: 15px;
    background-color: #f8f8f8;
    border-radius: 5px;
}

.product-price-detail .sale-price {
    font-size: 36px;
    /* Đã tăng */
    color: #d00;
    font-weight: bold;
    margin-right: 15px;
}

.product-price-detail .original-price {
    font-size: 22px;
    /* Đã tăng */
    color: #888;
    text-decoration: line-through;
}

/* --- Khu vực Số lượng và Mua hàng --- */
.quantity-box {
    display: flex;
    align-items: center;
    margin-bottom: 25px;
}

.quantity-box input {
    width: 60px;
    text-align: center;
    border: 1px solid #ccc;
    padding: 8px 5px;
    margin: 0 5px;
    -moz-appearance: textfield;
}

.quantity-box input::-webkit-outer-spin-button,
.quantity-box input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.quantity-box button {
    background: none;
    border: 1px solid #ccc;
    padding: 8px 12px;
    cursor: pointer;
    font-size: 16px;
}

.add-to-cart-btn {
    width: 100%;
    padding: 14px;
    /* Đã tăng */
    background-color: #333;
    color: white;
    font-size: 18px;
    /* Đã tăng */
    font-weight: bold;
    border: none;
    margin-top: 10px;
    cursor: pointer;
    transition: background-color 0.2s;
}

.add-to-cart-btn:hover {
    background-color: #555;
}

/* --- Khu vực Cam kết & Mô tả chi tiết --- */
.warranty-info {
    border: 1px solid #4CAF50;
    padding: 20px;
    margin-top: 30px;
    background-color: #e8f5e9;
    color: #333;
    text-align: center;
}

.warranty-info p {
    margin: 0;
    font-weight: 500;
}

.warranty-info i {
    color: #4CAF50;
    margin-right: 10px;
    font-size: 18px;
}

.product-description h2 {
    font-size: 24px;
    /* Đã tăng */
    border-bottom: 2px solid #ccc;
    padding-bottom: 10px;
    margin-top: 40px;
    margin-bottom: 20px;
}

.product-description h3 {
    font-size: 20px;
    /* Đã thêm để làm nổi bật h3 */
    margin-top: 20px;
    margin-bottom: 10px;
}

.product-description ul {
    list-style-type: disc;
    padding-left: 20px;
}

.product-description li {
    margin-bottom: 10px;
}
</style>

<body>
    <div class="container">
        <div class="top-bar">
            <span>HOTLINE: 19000150</span>
            <a href="#">ĐĂNG NHẬP</a>
        </div>
        <hr />

        <header class="main-header">
            <form class="search-bar">
                <input type="text" placeholder="Tìm kiếm" />
                <button type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>

            <a href="#" class="logo">
                <img src="../../assets/images/logo.jpg" alt="Nobility 1800s Logo" />
            </a>

            <a href="#" class="cart-link">GIỎ HÀNG (0)</a>
        </header>

        <nav class="main-nav">
            <ul>
                <li><a href="#">TRANG CHỦ</a></li>
                <li><a href="#">GIỚI THIỆU</a></li>
                <li>
                    <a href="sanpham.php" class="active">SẢN PHẨM <i class="fas fa-chevron-down fa-xs"></i></a>
                </li>
                <li><a href="#">TIN TỨC</a></li>
                <li><a href="#">LIÊN HỆ</a></li>
            </ul>
        </nav>
        <hr />
    </div>

    <div class="container">
        <nav class="breadcrumbs">
            <a href="#">Trang chủ</a> / <a href="sanpham.php">Tất cả sản phẩm</a> / <span>Tinh dầu dưỡng tóc,
                Blumaan Hydrating Hair Oil </span>
        </nav>
        <hr />
    </div>

    <div class="container product-detail-page">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="main-image">
                    <img id="mainProductImage"
                        src="../../assets/images/product/Hair_conditioner/Blumaan_Hydrating_Hair_Oil/00-hydrating-hair-oil-2000.webp"
                        alt="Tinh Chất Chống Rụng Tóc, Dưỡng Tóc Davines Energizing Superactive" />
                </div>
            </div>

            <div class="col-lg-7 col-md-6 product-info">
                <h1>Tinh Tinh dầu dưỡng tóc Blumaan Hydrating Hair Oil </h1>
                <p class="text-muted">Thương hiệu: Blumaan</p>

                <div class="product-price-detail">
                    <span class="original-price">700.000₫</span>
                    <span class="sale-price">1.200.000₫</span>
                </div>

                <p class="text-success font-weight-bold">Tình trạng: Còn hàng</p>

                <div class="quantity-box">
                    <label for="quantity">Số lượng:</label>
                    <button type="button"
                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" max="100">
                    <button type="button"
                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                </div>

                <button class="add-to-cart-btn">THÊM VÀO GIỎ</button>

                <div class="warranty-info">
                    <p><i class="fas fa-shield-alt"></i> 100% MUA HÀNG KHÔNG RỦI RO</p>
                    <p>Nhận hàng không ưng ý - trả hàng hoàn tiền không cần lý do</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 product-description">
                <h2>Tinh dầu dưỡng tóc Blumaan Hydrating Hair </h2>

                <ul>
                    <li>Blumaan Hydrating Hair Oil là sản phẩm dưỡng tóc cao cấp cung cấp đầy đủ dưỡng chất cho tóc khỏe
                        mạnh, bồng bềnh, đầy sức sống..</li>
                    <li>Dòng sản phẩm: Tinh dầu dưỡng tóc với 12 loại dầu tự nhiên và chiết xuất thực vật
                        Công Dụng tinh dầu dưỡng tóc Blumaan Cloud Control Hair Oil
                        .</li>
                    <li>Dầu Hạt Hướng Dương cung cấp độ ẩm cho tóc, tóc khô xơ trở nên mềm mại và mượt hơn..</li>
                    <li>
                        Giảm chẻ ngọn và gãy tóc
                    </li>
                    <li>Dầu hạt mè và dầu dừa có công dụng: bảo vệ, giúp giữ độ ẩm</li>
                    <li>
                        Dầu ô liu là một chất dưỡng tóc tự nhiên và giúp thêm độ bóng </li>
                    <li>Dầu dừa: Làm mượt tóc xoăn và tóc bay, giúp tóc dễ chải và tạo kiểu hơn.</li>
                    <li>Dầu hạt mè: Dưỡng và làm mềm tóc, đồng thời bảo vệ tóc khỏi tác hại của tia UV.</li>
                    <li>Tinh dầu hương thảo: Thúc đẩy tóc mọc khỏe mạnh hơn.</li>

                </ul>

                <h3>Thông tin sản phẩm:</h3>
                <ul>
                    <li>Dung tích: 60ml</li>
                    <li>Hạn sử dụng: 3 năm (xem trên vỏ hộp)</li>
                </ul>

                <h3>Hướng dẫn sử dụng:</h3>
                <ol>
                    <li>Sau khi tắm xong, dùng khăn bông lau thật nhẹ nhàng phần tóc ướt.</li>
                    <li>cho 2-4 giọt ra tay sau đó xoa đều lên tóc, mát xa nhẹ nhàng.</li>
                    <li>Massage nhẹ nhàng để các dưỡng chất thẩm thấu sâu vào bên trong da đầu, không cần xả lại.
                    </li>
                </ol>

                <p>— Chuyên sâu: Trong tháng đầu nên sử dụng với cường độ 2 ngày/lần.</p>
                <p>— Duy trì: 2 lần/tuần duy trì trong 2 tháng.</p>
                <p>— Sau khi nghỉ một thời gian có thể dùng thêm nếu thấy cần thiết.</p>
            </div>
        </div>
    </div>

    <?php // include __DIR__ . '/partials/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>