<?php /* checkout.php */ ?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Thanh toán</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
     <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/base.css">
</head>
<body>
<?php include __DIR__ . '/partials/header.php'; ?>

<div class="container py-4">
  <h3 class="mb-3">Thanh toán</h3>
  <div class="row">
    <div class="col-lg-7">
      <!-- Người mua -->
      <div class="card mb-3">
        <div class="card-body">
          <h5>Địa chỉ giao hàng</h5>

          <!-- Giả định có thông tin người dùng đăng nhập (demo) -->
          <script>
            // Demo: trong site thực, bạn gán từ session
            window.CURRENT_USER = window.CURRENT_USER || {
              email: "khach@demo.com",
              fullname: "Khách Demo",
              phone: "0900000000",
              address: "123 Đường A, Phường B",
              district: "Quận 1",
              city: "TP.HCM"
            };
          </script>

          <div class="custom-control custom-radio">
            <input type="radio" id="addrSaved" name="addrMode" class="custom-control-input" value="saved" checked>
            <label class="custom-control-label" for="addrSaved">Dùng địa chỉ từ tài khoản</label>
          </div>
          <div id="blockSaved" class="border rounded p-3 mb-3">
            <div><strong id="savedName"></strong> • <span id="savedPhone"></span></div>
            <div><span id="savedAddr"></span>, <span id="savedDistrict"></span>, <span id="savedCity"></span></div>
          </div>

          <div class="custom-control custom-radio">
            <input type="radio" id="addrNew" name="addrMode" class="custom-control-input" value="new">
            <label class="custom-control-label" for="addrNew">Nhập địa chỉ mới</label>
          </div>

          <form id="formNewAddr" class="mt-3" style="display:none">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Họ tên</label>
                <input class="form-control" name="fullname" required>
              </div>
              <div class="form-group col-md-6">
                <label>Điện thoại</label>
                <input class="form-control" name="phone" required pattern="^[0-9+\s]{8,}$">
              </div>
            </div>
            <div class="form-group">
              <label>Địa chỉ</label>
              <input class="form-control" name="address" required>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Quận/Huyện</label>
                <input class="form-control" name="district" required>
              </div>
              <div class="form-group col-md-6">
                <label>Tỉnh/Thành phố</label>
                <input class="form-control" name="city" required>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Thanh toán -->
      <div class="card mb-3">
        <div class="card-body">
          <h5>Phương thức thanh toán</h5>
          <div class="custom-control custom-radio">
            <input type="radio" id="pmCOD" name="payMethod" class="custom-control-input" value="COD" checked>
            <label class="custom-control-label" for="pmCOD">Tiền mặt khi nhận (COD)</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="pmBank" name="payMethod" class="custom-control-input" value="BANK">
            <label class="custom-control-label" for="pmBank">Chuyển khoản</label>
          </div>
          <div id="bankInfo" class="border rounded p-3 my-2" style="display:none">
            <div>Ngân hàng: ACB</div>
            <div>Chủ TK: CÔNG TY ABC</div>
            <div>Số TK: 123 456 789</div>
            <small class="text-muted">Vui lòng ghi nội dung: <em>Email tài khoản + Mã đơn</em></small>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="pmOnline" name="payMethod" class="custom-control-input" value="ONLINE">
            <label class="custom-control-label" for="pmOnline">Thanh toán trực tuyến (chưa kích hoạt)</label>
          </div>
        </div>
      </div>

    </div>

    <!-- Tóm tắt đơn -->
    <div class="col-lg-5">
      <div class="card">
        <div class="card-body">
          <h5>Tóm tắt đơn hàng</h5>
          <div id="orderItems"></div>
          <hr>
          <div class="d-flex justify-content-between">
            <span>Tạm tính</span>
            <strong id="sumSubtotal">0₫</strong>
          </div>
          <div class="d-flex justify-content-between">
            <span>Phí vận chuyển</span>
            <span id="sumShip">30.000₫</span>
          </div>
          <hr>
          <div class="d-flex justify-content-between">
            <span>Tổng thanh toán</span>
            <strong id="sumGrand">0₫</strong>
          </div>
          <button id="btnPlace" class="btn btn-primary btn-block mt-3">Đặt hàng</button>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/partials/footer.php'; ?>

<script src="/assets/js/products.seed.js"></script>
<script src="/assets/js/store.js"></script>
<script>
(function(){
  const money = n => (Number(n)||0).toLocaleString('vi-VN') + '₫';
  const shipFee = 30000;

  // hiển thị địa chỉ tài khoản
  function fillSaved(){
    const u = window.CURRENT_USER || {};
    savedName.textContent = u.fullname || '';
    savedPhone.textContent = u.phone || '';
    savedAddr.textContent = u.address || '';
    savedDistrict.textContent = u.district || '';
    savedCity.textContent = u.city || '';
  }

  // render tóm tắt đơn
  function renderSummary(){
    const map = new Map(window.SVStore.getAllProducts().map(p=>[String(p.id),p]));
    const cart = window.SVStore.getCart();
    if(!cart.length){
      document.getElementById('orderItems').innerHTML =
        '<div class="text-muted">Giỏ hàng trống.</div>';
      sumSubtotal.textContent = '0₫';
      sumGrand.textContent = '0₫';
      return;
    }
    document.getElementById('orderItems').innerHTML = cart.map(x=>{
      const p = map.get(String(x.id)); if(!p) return '';
      const line = (Number(p.price)||0) * (x.qty||0);
      return `<div class="d-flex justify-content-between mb-2">
        <div>${p.name} <span class="text-muted">x${x.qty}</span></div>
        <div>${money(line)}</div>
      </div>`;
    }).join('');
    const sub = window.SVStore.total();
    sumSubtotal.textContent = money(sub);
    sumGrand.textContent = money(sub + shipFee);
  }

  // chọn địa chỉ
  document.getElementById('addrSaved').addEventListener('change', e=>{
    if(e.target.checked){ formNewAddr.style.display='none'; }
  });
  document.getElementById('addrNew').addEventListener('change', e=>{
    if(e.target.checked){ formNewAddr.style.display='block'; }
  });

  // chọn thanh toán
  pmBank.addEventListener('change', e=>{
    bankInfo.style.display = e.target.checked ? 'block' : 'none';
  });
  pmCOD.addEventListener('change', ()=> bankInfo.style.display='none');
  pmOnline.addEventListener('change', ()=> bankInfo.style.display='none');

  // đặt hàng
  document.getElementById('btnPlace').addEventListener('click', ()=>{
    const user = window.CURRENT_USER || { email: 'guest@local' };

    // địa chỉ
    let shipping = {};
    if(document.getElementById('addrSaved').checked){
      shipping = {
        fullname: user.fullname, phone: user.phone,
        address: user.address, district: user.district, city: user.city
      };
    } else {
      const fd = new FormData(document.getElementById('formNewAddr'));
      for (const k of ['fullname','phone','address','district','city']) {
        if(!fd.get(k)) return alert('Vui lòng nhập đầy đủ địa chỉ.');
      }
      shipping = Object.fromEntries(fd.entries());
    }

    // phương thức thanh toán
    let payMethod = 'COD';
    if(pmBank.checked) payMethod='BANK';
    if(pmOnline.checked) payMethod='ONLINE'; // chưa xử lý thêm

    const products = window.SVStore.getAllProducts();
    const map = new Map(products.map(p=>[String(p.id),p]));
    const cart = window.SVStore.getCart();
    if(!cart.length) return alert('Giỏ hàng trống.');

    const items = cart.map(x=>{
      const p = map.get(String(x.id));
      return { id:x.id, name:p?.name||'', price:Number(p?.price)||0, qty:x.qty||1, image:p?.image||'' };
    });
    const subtotal = window.SVStore.total(products);
    const grand = subtotal + shipFee;

    // tạo mã đơn
    const orderId = 'SV' + Date.now();
    const order = {
      id: orderId,
      email: user.email || 'guest@local',
      created_at: new Date().toISOString(),
      items, subtotal, ship: shipFee, total: grand,
      shipping, payMethod, status: 'new'
    };

    // lưu vào lịch sử theo tài khoản
    const KEY = 'sv_orders_v1';
    const db = JSON.parse(localStorage.getItem(KEY) || '{}');
    const list = Array.isArray(db[order.email]) ? db[order.email] : [];
    list.unshift(order);
    db[order.email] = list;
    localStorage.setItem(KEY, JSON.stringify(db));

    // xóa giỏ & đi trang cảm ơn
    window.SVStore.clearCart();
    window.location.href = '/order_success.php?id=' + encodeURIComponent(orderId);
  });

  fillSaved();
  renderSummary();
})();
</script>
</body>
</html>
