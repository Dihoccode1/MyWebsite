<?php /* account/orders.php */ ?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Lịch sử đơn hàng</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/base.css">
</head>
<body>
<?php include __DIR__ . '/../partials/header.php'; ?>

<div class="container py-4">
  <h3 class="mb-3">Lịch sử mua hàng</h3>
  <div class="form-inline mb-3">
    <label class="mr-2">Email tài khoản</label>
    <input id="accEmail" class="form-control mr-2" style="min-width:260px">
    <button id="btnLoad" class="btn btn-secondary">Tải</button>
  </div>

  <div id="ordersWrap"></div>
</div>

<script>
(function(){
  const KEY = 'sv_orders_v1';
  const money = n => (Number(n)||0).toLocaleString('vi-VN') + '₫';
  const ordersWrap = document.getElementById('ordersWrap');
  const accEmail = document.getElementById('accEmail');

  // demo: tự điền email nếu có
  window.CURRENT_USER = window.CURRENT_USER || { email: 'khach@demo.com' };
  accEmail.value = window.CURRENT_USER.email || '';

  function load(){
    const email = (accEmail.value||'').trim().toLowerCase();
    if(!email){ alert('Nhập email tài khoản'); return; }
    const db = JSON.parse(localStorage.getItem(KEY)||'{}');
    const list = Array.isArray(db[email]) ? db[email] : [];
    if(!list.length){
      ordersWrap.innerHTML = `<div class="text-muted">Chưa có đơn hàng.</div>`;
      return;
    }
    ordersWrap.innerHTML = list.map(o => card(o)).join('');
  }

  function card(o){
    const date = new Date(o.created_at);
    const when = isNaN(date)? o.created_at : date.toLocaleString('vi-VN');
    const items = (o.items||[]).map(it =>
      `<li class="list-group-item d-flex justify-content-between">
        <div>${it.name} <span class="text-muted">x${it.qty}</span></div>
        <div>${money((it.price||0)* (it.qty||0))}</div>
      </li>`
    ).join('');
    const ship = `${o.shipping?.address||''}, ${o.shipping?.district||''}, ${o.shipping?.city||''}`.replace(/(^, )|(, ,)/g,'');
    return `
      <div class="card mb-3">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <h5>Đơn ${o.id}</h5>
            <span class="badge badge-info">${o.status||'new'}</span>
          </div>
          <div class="text-muted mb-2">${when} • ${o.payMethod}</div>
          <div class="mb-2"><strong>Giao đến:</strong> ${o.shipping?.fullname||''} • ${o.shipping?.phone||''}<br>${ship}</div>
          <ul class="list-group list-group-flush mb-2">${items}</ul>
          <div class="d-flex justify-content-between mt-2">
            <span>Tạm tính</span><strong>${money(o.subtotal)}</strong>
          </div>
          <div class="d-flex justify-content-between">
            <span>Phí vận chuyển</span><strong>${money(o.ship)}</strong>
          </div>
          <hr>
          <div class="d-flex justify-content-between">
            <span>Tổng cộng</span><strong>${money(o.total)}</strong>
          </div>
        </div>
      </div>`;
  }

  document.getElementById('btnLoad').addEventListener('click', load);
  load();
})();
</script>
</body>
</html>
