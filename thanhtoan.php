<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="..." crossorigin="anonymous">
    <style>
    .title {
        margin-top: 30px;
        font-weight: 700;
        text-align: center;
    }

    .card-header h4 {
        font-size: 18px;
        margin-bottom: 0;
    }

    .form-check-label {
        font-weight: 500;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="title">Tiến hành Thanh toán</div>
        <div class="row">
            <div class="col-lg-8">
                <form id="checkout-form">
                    <div class="card mb-4">
                        <div class="card-header bg-dark text-white">
                            <h4><i class="fa-solid fa-location-dot"></i> 1. Địa chỉ Giao hàng</h4>
                        </div>
                        <div class="card-body" id="delivery-address-selection">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="address-option" id="address-existing"
                                    value="existing" checked>
                                <label class="form-check-label" for="address-existing">Sử dụng địa chỉ từ tài
                                    khoản</label>
                                <p class="text-muted small ml-4">123 Đường Nguyễn Huệ, Quận 1, TP.HCM</p>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="address-option" id="address-new"
                                    value="new">
                                <label class="form-check-label" for="address-new">Nhập địa chỉ giao hàng mới</label>
                            </div>

                            <div id="new-address-form"
                                style="display:none; margin-top: 15px; border: 1px solid #ddd; padding: 15px; border-radius: 5px;">
                                <input type="text" class="form-control mb-2" placeholder="*Họ tên người nhận" required>
                                <input type="text" class="form-control mb-2" placeholder="*Số điện thoại" required>
                                <textarea class="form-control" id="new-address-detail" rows="2"
                                    placeholder="*Địa chỉ chi tiết (Số nhà, đường, phường/xã, tỉnh/thành phố)"
                                    required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header bg-dark text-white">
                            <h4><i class="fa-solid fa-credit-card"></i> 2. Phương thức Thanh toán</h4>
                        </div>
                        <div class="card-body" id="payment-method-selection">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment-method" id="payment-cash"
                                    value="cash" checked>
                                <label class="form-check-label" for="payment-cash">Thanh toán khi nhận hàng (COD/Tiền
                                    mặt)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment-method" id="payment-transfer"
                                    value="transfer">
                                <label class="form-check-label" for="payment-transfer">Chuyển khoản Ngân hàng</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment-method" id="payment-online"
                                    value="online">
                                <label class="form-check-label" for="payment-online">Thanh toán Trực tuyến (Chưa xử
                                    lý)</label>
                            </div>

                            <div id="payment-info-block" class="mt-3"></div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-4">
                <div class="card p-3 bg-light">
                    <h4>3. Tóm tắt Đơn đặt hàng</h4>
                    <hr>
                    <p id="summary-total-products">Tổng tiền hàng: 0₫</p>
                    <p>Phí vận chuyển: <span class="text-success font-weight-bold">Miễn phí</span></p>
                    <hr>
                    <h5 class="text-danger font-weight-bold" id="summary-total-final">Tổng thanh toán: 0₫</h5>

                    <button id="btn-review-order" class="btn btn-primary btn-block mb-2">Xem Tóm tắt Đơn đặt
                        hàng</button>

                    <div id="order-final-summary" class="mt-3" style="display:none;"></div>

                    <button id="btn-place-order" class="btn btn-secondary btn-block" disabled>HOÀN TẤT ĐẶT HÀNG</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/cart.js"></script>
</body>

</html><script src="/assets/js/auth.js"></script>
<!-- Các file còn lại -->
<script src="/assets/js/store.js"></script>
<script src="/assets/js/ui.js"></script>
<script src="/assets/js/products.seed.js"></script>
<script src="/assets/js/products.app.js"></script>