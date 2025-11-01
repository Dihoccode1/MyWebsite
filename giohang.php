<?php /* giohang.php */ ?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Giỏ hàng</title>
  <link rel="stylesheet" href="bootstrap-4.6.2-dist/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
  <link rel="stylesheet" href="/assets/css/style.css">

  <script src="/assets/js/auth.js"></script>
  <script src="/assets/js/products.seed.js"></script>
  <script src="/assets/js/store.js"></script>
  <script src="/assets/js/ui.js"></script>
</head>
<body>
<?php include __DIR__ . '/partials/header.php'; ?>

<div class="container py-4">
  <div class="alert alert-info mb-3" id="userInfo" style="display:none">
    <i class="fas fa-user"></i> Giỏ hàng của: <strong id="userName"></strong> (<span id="userEmail"></span>)
  </div>
  <h3 class="mb-3">Giỏ hàng</h3>
  <div class="row">
    <div class="col-lg-8">
      <div class="table-responsive">
        <table class="table table-bordered align-middle" id="cartTable">
          <thead class="thead-light">
            <tr>
              <th style="width:60px"></th>
              <th>Sản phẩm</th>
              <th class="text-right" style="width:140px">Đơn giá</th>
              <th class="text-center" style="width:150px">Số lượng</th>
              <th class="text-right" style="width:160px">Thành tiền</th>
              <th style="width:60px"></th>
            </tr>
          </thead>
          <tbody>
            <tr><td colspan="6" class="text-center text-muted py-5">Đang tải giỏ hàng...</td></tr>
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-between">
        <a href="/sanpham/sanpham.php" class="btn btn-outline-secondary">← Tiếp tục mua sắm</a>
        <button id="btnClear" class="btn btn-outline-danger">Xóa giỏ hàng</button>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Tổng cộng</h5>
          <div class="d-flex justify-content-between">
            <span>Tạm tính</span>
            <strong id="subTotal">0₫</strong>
          </div>
          <div class="d-flex justify-content-between">
            <span>Phí vận chuyển</span>
            <span class="text-muted">Tính ở bước sau</span>
          </div>
          <hr>
          <div class="d-flex justify-content-between">
            <span>Tổng thanh toán</span>
            <strong id="grandTotal">0₫</strong>
          </div>
          <a id="btnCheckout" href="/checkout.php" class="btn btn-primary btn-block mt-3">Thanh toán</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/partials/footer.php'; ?>

<script>
// Đợi trang tải xong
document.addEventListener('DOMContentLoaded', function() {

  // Đợi auth.js kiểm tra xong
  AUTH.check().then(() => {
  
    // Bây giờ mới kiểm tra đăng nhập
    if (!window.AUTH.loggedIn) {
      alert('Vui lòng đăng nhập để xem giỏ hàng!');
      const back = location.pathname + location.search + location.hash;
      location.href = '/account/login.php?redirect=' + encodeURIComponent(back);
      return;
    }

    // --- Toàn bộ code logic của giỏ hàng sẽ chạy ở đây ---
    const userInfo = document.getElementById('userInfo');
    const userName = document.getElementById('userName');
    const userEmail = document.getElementById('userEmail');
    
    if (window.AUTH.user) {
      userName.textContent = window.AUTH.user.name || 'Khách';
      userEmail.textContent = window.AUTH.user.email || '';
      userInfo.style.display = 'block';
    }

    const money = n => (Number(n)||0).toLocaleString('vi-VN') + '₫';
    const body = document.querySelector('#cartTable tbody');
    const subTotalEl = document.getElementById('subTotal');
    const grandTotalEl = document.getElementById('grandTotal');
    const btnClear = document.getElementById('btnClear');

    function dataMap(){
      const list = window.SVStore.getAllProducts();
      return new Map(list.map(p=>[String(p.id), p]));
    }

    function render(){
      const map = dataMap();
      const cart = window.SVStore.getCart();
      
      body.innerHTML = cart.length ? cart.map(rowHTML).join('') :
        `<tr><td colspan="6" class="text-center text-muted py-5">
          Giỏ hàng trống. <a href="/sanpham/sanpham.php">Tiếp tục mua sắm</a>
        </td></tr>`;
      
      const total = window.SVStore.total();
      subTotalEl.textContent = money(total);
      grandTotalEl.textContent = money(total);
      window.SVUI?.updateCartCount?.();
      
      function rowHTML(x){
        const p = map.get(String(x.id));
        if(!p) return '';
        const line = (Number(p.price)||0) * (x.qty||0);
        return `
          <tr data-id="${p.id}">
            <td><img src="${p.image}" alt="${p.name}" style="width:50px;height:50px;object-fit:cover"></td>
            <td>${p.name}</td>
            <td class="text-right">${money(p.price)}</td>
            <td class="text-center">
              <div class="input-group input-group-sm justify-content-center">
                <div class="input-group-prepend"><button class="btn btn-outline-secondary btn-dec" type="button">–</button></div>
                <input class="form-control text-center qty" style="max-width:60px" value="${x.qty}">
                <div class="input-group-append"><button class="btn btn-outline-secondary btn-inc" type="button">+</button></div>
              </div>
            </td>
            <td class="text-right">${money(line)}</td>
            <td class="text-center"><button class="btn btn-sm btn-outline-danger btn-del"><i class="fas fa-trash"></i></button></td>
          </tr>`;
      }
    }

    document.addEventListener('click', function(e){
      const tr = e.target.closest('tr[data-id]');
      if(!tr) return;
      const id = tr.getAttribute('data-id');
      if(e.target.closest('.btn-inc')) {
        const cur = Number(tr.querySelector('.qty').value)||1;
        window.SVStore.setQty(id, cur+1);
        render();
      } else if(e.target.closest('.btn-dec')) {
        const cur = Number(tr.querySelector('.qty').value)||1;
        if (cur > 1) {
          window.SVStore.setQty(id, cur-1);
          render();
        }
      } else if(e.target.closest('.btn-del')) {
        if(confirm('Xóa sản phẩm này khỏi giỏ hàng?')) {
          window.SVStore.removeFromCart(id);
          render();
        }
      }
    });

    document.addEventListener('change', function(e){
      const input = e.target.closest('.qty');
      if(!input) return;
      const tr = input.closest('tr[data-id]');
      const id = tr.getAttribute('data-id');
      const val = Math.max(1, Number(input.value)||1);
      window.SVStore.setQty(id, val);
      render();
    });

    btnClear.addEventListener('click', ()=>{
      if(confirm('Xóa toàn bộ giỏ hàng?')){
        window.SVStore.clearCart();
        render();
      }
    });

    render();
  });
});
</script>

</body>
</html>