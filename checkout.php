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

          <form id="formNewAddr" class="mt-3 needs-validation" novalidate style="display:none">
  <!-- Người nhận -->
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Họ tên <span class="text-danger">*</span></label>
      <input class="form-control" name="fullname" autocomplete="name" required>
      <div class="invalid-feedback">Vui lòng nhập họ tên.</div>
    </div>
    <div class="form-group col-md-6">
      <label>Điện thoại <span class="text-danger">*</span></label>
      <input class="form-control" name="phone" inputmode="tel"
             placeholder="VD: 0901234567 hoặc +84901234567"
             pattern="^(?:0|\+84)\d{9,10}$" required>
      <div class="invalid-feedback">SĐT hợp lệ: 0xxxxxxxxx hoặc +84xxxxxxxxx.</div>
    </div>
  </div>

  <!-- Email (tuỳ chọn) + Loại địa chỉ -->
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Email (tuỳ chọn)</label>
      <input type="email" class="form-control" name="email" autocomplete="email">
      <div class="invalid-feedback">Email chưa đúng định dạng.</div>
    </div>
    <div class="form-group col-md-6">
      <label>Loại địa chỉ</label>
      <select class="form-control" name="addressType" id="addressType">
        <option value="home">Nhà riêng</option>
        <option value="office">Văn phòng</option>
        <option value="business">Công ty (xuất hoá đơn)</option>
      </select>
    </div>
  </div>

  <!-- Thông tin công ty (ẩn khi không chọn business) -->
  <div id="bizBlock" class="border rounded p-3 mb-2" style="display:none">
    <div class="form-row">
      <div class="form-group col-md-8">
        <label>Tên công ty</label>
        <input class="form-control" name="companyName" autocomplete="organization">
      </div>
      <div class="form-group col-md-4">
        <label>Mã số thuế</label>
        <input class="form-control" name="taxCode">
      </div>
    </div>
  </div>

  <!-- Địa chỉ: Tỉnh/TP -> Quận/Huyện -> Phường/Xã -->
  <div class="form-row align-items-end">
    <div class="form-group col-md-4">
      <label>Tỉnh/Thành phố <span class="text-danger">*</span></label>
      <select class="form-control" name="city" id="citySelect" required></select>
      <div class="invalid-feedback">Vui lòng chọn tỉnh/thành.</div>
    </div>
    <div class="form-group col-md-4">
      <div class="d-flex justify-content-between">
        <label class="mb-0">Quận/Huyện <span class="text-danger">*</span></label>
        <button type="button" class="btn btn-link p-0 small" id="toggleManualDistrict">Nhập tay</button>
      </div>
      <select class="form-control" name="district" id="districtSelect" required></select>
      <input class="form-control mt-2 d-none" name="district" id="districtInput">
      <div class="invalid-feedback">Vui lòng chọn/quý danh quận huyện.</div>
    </div>
    <div class="form-group col-md-4">
      <div class="d-flex justify-content-between">
        <label class="mb-0">Phường/Xã</label>
        <button type="button" class="btn btn-link p-0 small" id="toggleManualWard">Nhập tay</button>
      </div>
      <select class="form-control" name="ward" id="wardSelect"></select>
      <input class="form-control mt-2 d-none" name="ward" id="wardInput">
    </div>
  </div>

  <div class="form-group">
    <label>Địa chỉ (số nhà, tên đường, toà nhà) <span class="text-danger">*</span></label>
    <input class="form-control" name="address" autocomplete="street-address" required
           placeholder="VD: 12 Nguyễn Huệ, P. Bến Nghé, Quận 1">
    <div class="invalid-feedback">Vui lòng nhập địa chỉ chi tiết.</div>
  </div>

  <!-- Ghi chú -->
  <div class="form-group">
    <label>Ghi chú giao hàng (tuỳ chọn)</label>
    <textarea class="form-control" name="note" rows="2"
              placeholder="Hướng dẫn shipper, thời gian nhận hàng..."></textarea>
  </div>

  <!-- Lưu mặc định -->
  <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="saveAsDefault" name="saveAsDefault" value="1">
    <label for="saveAsDefault" class="custom-control-label">Lưu làm địa chỉ mặc định</label>
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
<!-- SCRIPT 1: checkout logic -->
<script>
(function(){
  // ===== Helpers =====
  const money   = n => (Number(n)||0).toLocaleString('vi-VN') + '₫';
  const shipFee = 30000;

  // ===== Cache DOM (an toàn, không dựa vào biến global từ id) =====
  const els = {
    // tóm tắt đơn
    orderItems:    document.getElementById('orderItems'),
    sumSubtotal:   document.getElementById('sumSubtotal'),
    sumGrand:      document.getElementById('sumGrand'),

    // saved address view
    savedName:     document.getElementById('savedName'),
    savedPhone:    document.getElementById('savedPhone'),
    savedAddr:     document.getElementById('savedAddr'),
    savedDistrict: document.getElementById('savedDistrict'),
    savedCity:     document.getElementById('savedCity'),

    // address radios + form
    addrSaved:     document.getElementById('addrSaved'),
    addrNew:       document.getElementById('addrNew'),
    formNewAddr:   document.getElementById('formNewAddr'),

    // payment
    pmCOD:         document.getElementById('pmCOD'),
    pmBank:        document.getElementById('pmBank'),
    pmOnline:      document.getElementById('pmOnline'),
    bankInfo:      document.getElementById('bankInfo'),

    // action
    btnPlace:      document.getElementById('btnPlace'),

    // location controls
    citySel:       document.getElementById('citySelect'),
    distSel:       document.getElementById('districtSelect'),
    wardSel:       document.getElementById('wardSelect'),
    distInput:     document.getElementById('districtInput'),
    wardInput:     document.getElementById('wardInput'),
    toggleDist:    document.getElementById('toggleManualDistrict'),
    toggleWard:    document.getElementById('toggleManualWard'),

    // business fields
    addressType:   document.getElementById('addressType'),
    bizBlock:      document.getElementById('bizBlock'),
  };

  // ===== 63 tỉnh/thành =====
  const VN_PROVINCES = [
    "An Giang","Bà Rịa - Vũng Tàu","Bắc Giang","Bắc Kạn","Bạc Liêu","Bắc Ninh",
    "Bến Tre","Bình Định","Bình Dương","Bình Phước","Bình Thuận","Cà Mau",
    "Cao Bằng","Đắk Lắk","Đắk Nông","Điện Biên","Đồng Nai","Đồng Tháp",
    "Gia Lai","Hà Giang","Hà Nam","Hà Tĩnh","Hải Dương","Hậu Giang",
    "Hòa Bình","Hưng Yên","Khánh Hòa","Kiên Giang","Kon Tum","Lai Châu",
    "Lâm Đồng","Lạng Sơn","Lào Cai","Long An","Nam Định","Nghệ An",
    "Ninh Bình","Ninh Thuận","Phú Thọ","Phú Yên","Quảng Bình","Quảng Nam",
    "Quảng Ngãi","Quảng Ninh","Quảng Trị","Sóc Trăng","Sơn La","Tây Ninh",
    "Thái Bình","Thái Nguyên","Thanh Hóa","Thừa Thiên Huế","Tiền Giang","Trà Vinh",
    "Tuyên Quang","Vĩnh Long","Vĩnh Phúc","Yên Bái","Hà Nội","TP.HCM",
    "Hải Phòng","Đà Nẵng","Cần Thơ"
  ];

  // (Tùy chọn) Data mẫu quận/phường cho 2 TP lớn — có thì fill; không có thì dùng "Nhập tay"
  const VN_ADMIN_SAMPLE = {
    "TP.HCM": {
      "Quận 1": ["Bến Nghé","Bến Thành","Cầu Kho","Cầu Ông Lãnh"],
      "Quận 3": ["Võ Thị Sáu","Phường 7","Phường 8"],
      "Bình Thạnh": ["Phường 1","Phường 2","Phường 3"]
    },
    "Hà Nội": {
      "Ba Đình": ["Cống Vị","Điện Biên","Giảng Võ"],
      "Hoàn Kiếm": ["Hàng Bạc","Hàng Buồm","Tràng Tiền"]
    }
  };

  // ===== Hiển thị địa chỉ từ tài khoản (demo) =====
  function fillSaved(){
    const u = window.CURRENT_USER || {};
    if (els.savedName)     els.savedName.textContent     = u.fullname || '';
    if (els.savedPhone)    els.savedPhone.textContent    = u.phone || '';
    if (els.savedAddr)     els.savedAddr.textContent     = u.address || '';
    if (els.savedDistrict) els.savedDistrict.textContent = u.district || '';
    if (els.savedCity)     els.savedCity.textContent     = u.city || '';
  }

  // ===== Tóm tắt giỏ hàng =====
  function renderSummary(){
    const all = (window.SVStore?.getAllProducts?.() || []);
    const map = new Map(all.map(p => [String(p.id), p]));
    const cart = window.SVStore?.getCart?.() || [];

    if (!cart.length) {
      if (els.orderItems) els.orderItems.innerHTML = '<div class="text-muted">Giỏ hàng trống.</div>';
      if (els.sumSubtotal) els.sumSubtotal.textContent = '0₫';
      if (els.sumGrand)    els.sumGrand.textContent    = '0₫';
      return;
    }

    if (els.orderItems) {
      els.orderItems.innerHTML = cart.map(x=>{
        const p = map.get(String(x.id)); if(!p) return '';
        const line = (Number(p.price)||0) * (x.qty||0);
        return `<div class="d-flex justify-content-between mb-2">
          <div>${p.name} <span class="text-muted">x${x.qty}</span></div>
          <div>${money(line)}</div>
        </div>`;
      }).join('');
    }

    const sub = typeof window.SVStore?.total === 'function'
      ? window.SVStore.total(all) : cart.reduce((s,x)=>{
          const p = map.get(String(x.id)); return s + (Number(p?.price)||0)*(x.qty||0);
        }, 0);

    if (els.sumSubtotal) els.sumSubtotal.textContent = money(sub);
    if (els.sumGrand)    els.sumGrand.textContent    = money(sub + shipFee);
  }

  // ===== Toggle địa chỉ đã lưu / địa chỉ mới =====
  els.addrSaved?.addEventListener('change', e=>{
    if (e.target.checked && els.formNewAddr) els.formNewAddr.style.display = 'none';
  });
  els.addrNew?.addEventListener('change', e=>{
    if (e.target.checked && els.formNewAddr) els.formNewAddr.style.display = 'block';
  });

  // ===== Chọn phương thức thanh toán =====
  els.pmBank?.addEventListener('change', e=>{
    if (els.bankInfo) els.bankInfo.style.display = e.target.checked ? 'block' : 'none';
  });
  els.pmCOD?.addEventListener('change', ()=>{ if (els.bankInfo) els.bankInfo.style.display='none'; });
  els.pmOnline?.addEventListener('change', ()=>{ if (els.bankInfo) els.bankInfo.style.display='none'; });

  // ===== Nút Đặt hàng =====
  els.btnPlace?.addEventListener('click', ()=>{
    const user = window.CURRENT_USER || { email: 'guest@local' };

    // Địa chỉ giao hàng
    let shipping = {};
    if (els.addrSaved?.checked) {
      shipping = {
        fullname: user.fullname, phone: user.phone,
        address: user.address, district: user.district, city: user.city
      };
    } else {
      const form = els.formNewAddr;
      if (!form) return alert('Thiếu form địa chỉ mới.');
      const fd = new FormData(form);

      // Nếu đang bật "Nhập tay" cho Quận/Phường, đảm bảo name đúng và có value
      const required = ['fullname','phone','address','district','city'];
      for (const k of required) {
        if (!fd.get(k)) return alert('Vui lòng nhập đầy đủ địa chỉ.');
      }
      shipping = Object.fromEntries(fd.entries());
    }

    // Pay method
    let payMethod = 'COD';
    if (els.pmBank?.checked)   payMethod = 'BANK';
    if (els.pmOnline?.checked) payMethod = 'ONLINE'; // chưa xử lý thêm

    // Lấy giỏ hàng
    const products = window.SVStore?.getAllProducts?.() || [];
    const pmap = new Map(products.map(p=>[String(p.id),p]));
    const cart = window.SVStore?.getCart?.() || [];
    if(!cart.length) return alert('Giỏ hàng trống.');

    const items = cart.map(x=>{
      const p = pmap.get(String(x.id));
      return { id:x.id, name:p?.name||'', price:Number(p?.price)||0, qty:x.qty||1, image:p?.image||'' };
    });
    const subtotal = (typeof window.SVStore?.total === 'function') ? window.SVStore.total(products)
                     : items.reduce((s,it)=> s + it.price*it.qty, 0);
    const grand = subtotal + shipFee;

    // Tạo & lưu đơn
    const orderId = 'SV' + Date.now();
    const order = {
      id: orderId,
      email: user.email || 'guest@local',
      created_at: new Date().toISOString(),
      items, subtotal, ship: shipFee, total: grand,
      shipping, payMethod, status: 'new'
    };
    const KEY = 'sv_orders_v1';
    const db = JSON.parse(localStorage.getItem(KEY) || '{}');
    const list = Array.isArray(db[order.email]) ? db[order.email] : [];
    list.unshift(order);
    db[order.email] = list;
    localStorage.setItem(KEY, JSON.stringify(db));

    // Clear cart & tới trang cảm ơn
    window.SVStore?.clearCart?.();
    window.location.href = '/order_success.php?id=' + encodeURIComponent(orderId);
  });

  // ===== ĐỊA GIỚI: tỉnh/quận/phường + Nhập tay =====
  function fillCities(){
    if (!els.citySel) return;
    els.citySel.innerHTML = `<option value="">-- Chọn tỉnh/thành --</option>` +
      VN_PROVINCES.map(p => `<option value="${p}">${p}</option>`).join('');
    // gợi ý mặc định (nếu cần)
    els.citySel.value = els.citySel.value || "TP.HCM";
    fillDistricts(); // reset quận/phường
  }

  function fillDistricts(){
    if (!els.distSel) return;
    const city = els.citySel?.value || '';
    const dists = city && VN_ADMIN_SAMPLE[city] ? Object.keys(VN_ADMIN_SAMPLE[city]) : [];
    els.distSel.innerHTML = `<option value="">-- Chọn quận/huyện --</option>` +
      dists.map(d => `<option value="${d}">${d}</option>`).join('');
    if (els.wardSel) els.wardSel.innerHTML = `<option value="">-- Chọn phường/xã --</option>`;
    if (els.distInput) els.distInput.value = "";
    if (els.wardInput) els.wardInput.value = "";
  }

  function fillWards(){
    if (!els.wardSel) return;
    const city = els.citySel?.value || '';
    const dist = els.distSel?.value || '';
    const wards = (city && dist && VN_ADMIN_SAMPLE[city] && VN_ADMIN_SAMPLE[city][dist]) ? VN_ADMIN_SAMPLE[city][dist] : [];
    els.wardSel.innerHTML = `<option value="">-- Chọn phường/xã --</option>` +
      wards.map(w => `<option value="${w}">${w}</option>`).join('');
    if (els.wardInput) els.wardInput.value = "";
  }

  // Toggle nhập tay Quận/Huyện
  els.toggleDist?.addEventListener('click', ()=>{
    if (!els.distInput || !els.distSel) return;
    const nowHidden = els.distInput.classList.toggle('d-none'); // toggle: nếu kết quả true => đang ẨN
    const manual = !nowHidden; // manual = đang HIỆN input
    els.distSel.classList.toggle('d-none', manual);
    els.toggleDist.textContent = manual ? 'Chọn từ danh sách' : 'Nhập tay';
    if (manual) {
      els.distSel.removeAttribute('name');
      els.distInput.setAttribute('name','district');
      els.distInput.required = true; els.distSel.required = false;
    } else {
      els.distInput.removeAttribute('name');
      els.distSel.setAttribute('name','district');
      els.distSel.required = true; els.distInput.required = false;
    }
  });

  // Toggle nhập tay Phường/Xã
  els.toggleWard?.addEventListener('click', ()=>{
    if (!els.wardInput || !els.wardSel) return;
    const nowHidden = els.wardInput.classList.toggle('d-none');
    const manual = !nowHidden;
    els.wardSel.classList.toggle('d-none', manual);
    els.toggleWard.textContent = manual ? 'Chọn từ danh sách' : 'Nhập tay';
    if (manual) {
      els.wardSel.removeAttribute('name');
      els.wardInput.setAttribute('name','ward');
    } else {
      els.wardInput.removeAttribute('name');
      els.wardSel.setAttribute('name','ward');
    }
  });

  // Loại địa chỉ (nhà riêng/công ty)
  function updateBiz(){ if (els.bizBlock) els.bizBlock.style.display = (els.addressType?.value === 'business') ? 'block' : 'none'; }
  els.addressType?.addEventListener('change', updateBiz);

  // Sự kiện chuỗi
  els.citySel?.addEventListener('change', fillDistricts);
  els.distSel?.addEventListener('change', fillWards);

  // ===== Init =====
  fillSaved();
  renderSummary();
  fillCities();
  updateBiz();
  if (els.toggleDist && els.distInput && els.distSel) {
  // chỉ click nếu hiện đang ẩn input (tức chưa bật manual)
  if (els.distInput.classList.contains('d-none')) els.toggleDist.click();
}
if (els.toggleWard && els.wardInput && els.wardSel) {
  if (els.wardInput.classList.contains('d-none')) els.toggleWard.click();
}
})();
</script>
<script src="/assets/js/auth.js"></script>

<!-- Các file còn lại -->
<script src="/assets/js/store.js"></script>
<script src="/assets/js/ui.js"></script>
<script src="/assets/js/products.seed.js"></script>
<script src="/assets/js/products.app.js"></script>


</body>
</html>
