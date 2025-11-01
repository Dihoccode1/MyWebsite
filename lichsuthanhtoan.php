<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử Mua hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="bootstrap-4.6.2-dist/css/bootstrap.css"
        integrity="..." crossorigin="anonymous">
              <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <style>
    .title {
        margin-top: 30px;
        font-weight: 700;
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="title"><i class="fa-solid fa-clock-rotate-left"></i> Lịch sử Mua hàng của bạn</div>

        <table class="table table-bordered table-striped" id="order-history-table">
            <thead class="thead-dark">
                <tr>
                    <th>Mã Đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="5" class="text-center">Đang tải lịch sử...</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/cart.js"></script>

</body>

</html>
<script src="/assets/js/auth.js"></script>

<!-- Các file còn lại -->
<script src="/assets/js/store.js"></script>
<script src="/assets/js/ui.js"></script>
<script src="/assets/js/products.seed.js"></script>
<script src="/assets/js/products.app.js"></script>