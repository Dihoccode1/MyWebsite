// /assets/js/product.detail.js
(function (w, d) {
  const fmt = n => w.SVStore?.fmtVND ? SVStore.fmtVND(n) : (Number(n).toLocaleString('vi-VN')+'₫');

  function getParamId() {
    const usp = new URLSearchParams(location.search);
    return usp.get('id') || '';
  }
  function getAll() {
    return (w.SVStore?.getAllProducts?.() || w.SV_PRODUCT_SEED || []);
  }
  function escapeHtml(s) {
    return String(s||'').replace(/[&<>"']/g, m => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m]));
  }
  function badgeLabel(b) {
    const x = (b||'').toLowerCase();
    if (x==='sale') return 'Khuyến mãi';
    if (x==='new') return 'Mới';
    if (x==='out_of_stock' || x==='oos') return 'Hết hàng';
    return '';
  }
  function stockText(b) {
    const x = (b||'').toLowerCase();
    return (x==='out_of_stock' || x==='oos') ? 'Hết hàng' : 'Còn hàng';
  }
  function fallbackDescription(p) {
    const map = {
      hair_wax: 'Sáp vuốt tóc giữ nếp tốt, hoàn thiện lì, dễ gội rửa.',
      hair_spray: 'Gôm xịt giữ nếp mạnh, ít bết dính, phù hợp nhiều kiểu tóc.',
      hair_conditioner: 'Tinh dầu/dưỡng tóc giúp mềm mượt và bảo vệ tóc.',
      volumizing_powder: 'Bột tạo phồng tăng độ dày và độ bồng bềnh cho tóc.'
    };
    return p.description || map[p.category] || 'Sản phẩm chính hãng, bảo hành theo chính sách cửa hàng.';
  }
  function renderNotFound() {
    const root = d.getElementById('pdRoot');
    if (!root) return;
    root.innerHTML = `
      <div class="col-12 text-center py-5">
        <h4>Không tìm thấy sản phẩm</h4>
        <a class="btn btn-outline-primary mt-3" href="/pages/sanpham.php">Quay lại danh sách</a>
      </div>`;
  }
  function renderRelated(p) {
    const all = getAll().filter(x => x.id !== p.id && x.category === p.category);
    const pick = all.slice(0, 4);
    const grid = d.getElementById('relatedGrid');
    if (!grid) return;
    grid.innerHTML = pick.map(r => `
      <div class="col-6 col-md-3 mb-3">
        <div class="card h-100">
          <a href="/pages/product_detail.php?id=${r.id}">
            <img class="card-img-top" src="${r.image}" alt="${escapeHtml(r.name)}"/>
          </a>
          <div class="card-body">
            <h6 class="card-title" style="min-height:40px">
              <a href="/pages/product_detail.php?id=${r.id}">${escapeHtml(r.name)}</a>
            </h6>
            <div class="price">${fmt(r.price)}
              ${r.original_price ? `<small class="text-muted ml-1" style="text-decoration:line-through">${fmt(r.original_price)}</small>` : ''}
            </div>
          </div>
        </div>
      </div>
    `).join('');
  }
  function renderDetail(p) {
    const root = d.getElementById('pdRoot');
    const bcName = d.getElementById('bcName');
    if (!root) return;

    d.title = p.name + ' - Chi tiết sản phẩm';
    if (bcName) bcName.textContent = p.name;

    const priceHtml = `
      <div class="pd-price">
        <span class="new">${fmt(p.price)}</span>
        ${p.original_price ? `<span class="old">${fmt(p.original_price)}</span>` : ''}
        ${p.badge ? `<span class="pd-badge">${badgeLabel(p.badge)}</span>` : ''}
      </div>`;
    const desc = fallbackDescription(p);

    root.innerHTML = `
      <div class="col-md-5">
        <div class="pd-gallery">
          <img src="${p.image}" alt="${escapeHtml(p.name)}"/>
        </div>
      </div>
      <div class="col-md-7">
        <h1 class="pd-title">${escapeHtml(p.name)}</h1>
        ${priceHtml}
        <div class="mt-3"><p>${escapeHtml(desc)}</p></div>

        <form id="buyForm" class="form-inline my-3">
          <label class="mr-2">Số lượng</label>
          <input id="qty" type="number" min="1" value="1" class="form-control mr-2" style="width:100px"/>
          <button class="btn btn-primary">Thêm vào giỏ</button>
        </form>

        <dl class="specs row">
          <dt class="col-sm-4">Danh mục</dt>
          <dd class="col-sm-8">${escapeHtml(p.category || '—')}</dd>
          <dt class="col-sm-4">Tình trạng</dt>
          <dd class="col-sm-8">${stockText(p.badge)}</dd>
          ${p.original_price ? `<dt class="col-sm-4">Tiết kiệm</dt><dd class="col-sm-8">${fmt(p.original_price - p.price)}</dd>` : ''}
        </dl>

        <div class="mt-3">
          <a class="btn btn-outline-secondary" href="javascript:history.back()">← Quay lại</a>
        </div>
      </div>
    `;

    // Demo "Thêm vào giỏ"
    d.getElementById('buyForm').addEventListener('submit', e => {
      e.preventDefault();
      const qty = Math.max(1, Number(d.getElementById('qty').value) || 1);
      alert(`Đã thêm: ${p.name} x ${qty}`);
      // TODO: lưu vào localStorage giỏ hàng nếu muốn
    });

    renderRelated(p);
  }

  // boot
  const id = getParamId();
  const product = getAll().find(p => String(p.id) === String(id));
  if (!product) renderNotFound(); else renderDetail(product);
})(window, document);
