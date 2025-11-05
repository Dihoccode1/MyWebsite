// ./assets/js/order.js (HOÀN CHỈNH)
(function () {
  /* ================== Keys & Helpers ================== */
  const KEYS = {
    ADMIN: 'admin.orders',     // mảng đơn phẳng ở admin
    USER  : 'sv_orders_v1',    // { email: [orders...] }
    FLAT  : 'sv_orders_flat',  // mảng đơn phẳng (bridge cho admin)
    PING1 : 'orders.bump',     // chuông thay đổi để các tab reload
    PING2 : 'sv_orders_ping'   // chuông user phát ra
  };

  const $  = (s, r=document) => r.querySelector(s);
  const $$ = (s, r=document) => [...r.querySelectorAll(s)];

  const LS = {
    get(k, def){ try{ return JSON.parse(localStorage.getItem(k)) ?? def }catch{ return def } },
    set(k, v){ localStorage.setItem(k, JSON.stringify(v)); }
  };

  const money = n => (Number(n)||0).toLocaleString('vi-VN') + '₫';
  const parseD = s => (s ? new Date(s) : null);

  const STATUS_TEXT = {
    new       : 'Chưa xử lý',
    confirmed : 'Đã xác nhận',
    delivered : 'Đã giao',
    canceled  : 'Đã huỷ',
    cancelled : 'Đã huỷ', // alias
  };

  const STATUS_CLASS = {
    new       : 'status-chip st-new',
    confirmed : 'status-chip st-confirmed',
    delivered : 'status-chip st-delivered',
    canceled  : 'status-chip st-canceled',
    cancelled : 'status-chip st-canceled',
  };

  const canConfirm = s => s === 'new';
  const canDeliver = s => s === 'confirmed';
  const canCancel  = s => (s === 'new' || s === 'confirmed');

  /* ================== DOM refs ================== */
  const tb         = $('#od-body');
  const qInput     = $('#q');
  const fromInput  = $('#from');
  const toInput    = $('#to');
  const stSelect   = $('#status');
  const sortWard   = $('#sortWard');
  const btnFilter  = $('#btnFilter');

  // Modal
  const modal      = $('#od-modal');
  const mTitle     = $('#od-title');
  const mStatusSel = $('#od-status');
  const mBtnUpdate = $('#btnUpdateStatus');
  const mBtnClose  = $('#btnClose');
  const vCode      = $('#vCode');
  const vDate      = $('#vDate');
  const vStatus    = $('#vStatus');
  const vNote      = $('#vNote');
  const vCus       = $('#vCus');
  const vPhone     = $('#vPhone');
  const vAddr      = $('#vAddr');
  const vItems     = $('#vItems');
  const vTotal     = $('#vTotal');

  let state = {
    list: [],        // danh sách admin đã merge
    filtered: [],    // danh sách sau lọc
    modalId: null,   // id đang xem trong modal
  };

  /* ================== Merge & Sync ================== */
  function flattenUserOrders() {
    // Build sv_orders_flat từ sv_orders_v1 (nếu cần)
    const raw = LS.get(KEYS.USER, {});
    const flat = Array.isArray(raw) ? raw : Object.values(raw||{}).flat();
    LS.set(KEYS.FLAT, flat);
    return flat;
  }

  function loadAdminOrdersMerged() {
    let adminList = LS.get(KEYS.ADMIN, []);
    const userFlat = LS.get(KEYS.FLAT, []) ?? [];

    // Hợp nhất theo id: ưu tiên fields mới từ userFlat
    const map = new Map(adminList.map(o => [String(o.id), o]));
    for (const u of (Array.isArray(userFlat)?userFlat:[])) {
      const id = String(u.id);
      if (map.has(id)) {
        const a = map.get(id);
        // copy các field chính (giữ a nếu u undefined)
        a.status      = (u.status ?? a.status);
        a.total       = (u.total ?? a.total);
        a.subtotal    = (u.subtotal ?? a.subtotal);
        a.ship        = (u.ship ?? a.ship);
        a.items       = (u.items ?? a.items);
        a.shipping    = (u.shipping ?? a.shipping);
        a.payMethod   = (u.payMethod ?? a.payMethod);
        a.created_at  = (u.created_at ?? a.created_at);
        a.email       = (u.email ?? a.email);
        a.canceledAt  = (u.canceledAt ?? a.canceledAt);
        a.deliveredAt = (u.deliveredAt ?? a.deliveredAt);
        a.updatedAt   = new Date().toISOString();
      } else {
        map.set(id, u);
      }
    }
    adminList = Array.from(map.values());
    LS.set(KEYS.ADMIN, adminList);
    return adminList;
  }

  // Update 1 đơn theo id ở cả 3 nơi: admin.orders, sv_orders_v1[email], sv_orders_flat
  function writeOrderEverywhere(order) {
    const id = String(order.id);

    // 1) admin.orders
    const adminList = LS.get(KEYS.ADMIN, []);
    const aidx = adminList.findIndex(o => String(o.id) === id);
    if (aidx >= 0) adminList[aidx] = order; else adminList.push(order);
    LS.set(KEYS.ADMIN, adminList);

    // 2) sv_orders_v1[email]
    if (order.email) {
      const userStore = LS.get(KEYS.USER, {});
      const arr = userStore[order.email] || [];
      const uidx = arr.findIndex(o => String(o.id) === id);
      if (uidx >= 0) arr[uidx] = order; else arr.push(order);
      userStore[order.email] = arr;
      LS.set(KEYS.USER, userStore);
    }

    // 3) sv_orders_flat
    let flat = LS.get(KEYS.FLAT, []);
    const fidx = flat.findIndex(o => String(o.id) === id);
    if (fidx >= 0) flat[fidx] = order; else flat.push(order);
    LS.set(KEYS.FLAT, flat);

    // 4) phát chuông cho các tab
    localStorage.setItem(KEYS.PING1, String(Date.now()));
  }

  /* ================== Render Table ================== */
  function matchQuery(o, q) {
    if (!q) return true;
    q = q.toLowerCase();
    const address = [
      o?.shipping?.address,
      o?.shipping?.ward,
      o?.shipping?.district,
      o?.shipping?.city
    ].filter(Boolean).join(' ');

    return [
      String(o.id||'').toLowerCase(),
      String(o?.shipping?.fullname||'').toLowerCase(),
      String(o?.shipping?.phone||'').toLowerCase(),
      String(address).toLowerCase()
    ].some(x => x.includes(q));
  }

  function inDateRange(o, from, to) {
    if (!from && !to) return true;
    const d = parseD(o.created_at);
    if (!d) return false;
    const ms = d.getTime();
    if (from && ms < from.getTime()) return false;
    if (to) {
      // chặn đến cuối ngày to
      const end = new Date(to.getFullYear(), to.getMonth(), to.getDate(), 23,59,59,999);
      if (ms > end.getTime()) return false;
    }
    return true;
  }

  function applyFilters() {
    const q      = (qInput?.value || '').trim();
    const st     = (stSelect?.value || '').trim();
    const fDate  = fromInput?.value ? new Date(fromInput.value) : null;
    const tDate  = toInput?.value ? new Date(toInput.value) : null;
    const wardSort = (sortWard?.value || '').trim(); // '', 'asc', 'desc'

    let arr = [...state.list];

    // lọc
    arr = arr.filter(o => matchQuery(o, q));
    if (st) {
      const stLower = st.toLowerCase();
      arr = arr.filter(o => String(o.status||'').toLowerCase() === stLower);
    }
    arr = arr.filter(o => inDateRange(o, fDate, tDate));

    // sort theo phường/xã nếu có dữ liệu
    if (wardSort) {
      arr.sort((a, b) => {
        const wa = (a?.shipping?.ward || a?.shipping?.district || '').toString().toLowerCase();
        const wb = (b?.shipping?.ward || b?.shipping?.district || '').toString().toLowerCase();
        if (wa < wb) return wardSort === 'asc' ? -1 : 1;
        if (wa > wb) return wardSort === 'asc' ? 1 : -1;
        return 0;
      });
    } else {
      // mặc định: mới nhất lên trước theo created_at
      arr.sort((a, b) => new Date(b.created_at||0) - new Date(a.created_at||0));
    }

    state.filtered = arr;
  }

  function render() {
    applyFilters();
    if (!state.filtered.length) {
      tb.innerHTML = `<tr><td colspan="8" style="text-align:center;color:#9aa3ad;padding:20px">Không có dữ liệu</td></tr>`;
      return;
    }

    tb.innerHTML = state.filtered.map(o => {
      const st = String(o.status||'new').toLowerCase();
      const stLabel = STATUS_TEXT[st] || STATUS_TEXT.new;
      const stClass = STATUS_CLASS[st] || STATUS_CLASS.new;
      const when = o.created_at ? new Date(o.created_at).toLocaleString('vi-VN') : '';

      const addr = [
        o?.shipping?.address,
        o?.shipping?.ward,
        o?.shipping?.district,
        o?.shipping?.city
      ].filter(Boolean).join(', ');

      const qty = (o.items||[]).reduce((s,it)=> s + (Number(it.qty)||0), 0);

      // actions
      const btnView     = `<button class="btn" data-act="view" data-id="${o.id}">Xem</button>`;
      const btnConfirm  = canConfirm(st) ? `<button class="btn" data-act="confirm" data-id="${o.id}">Xác nhận</button>` : '';
      const btnDeliver  = canDeliver(st) ? `<button class="btn" data-act="deliver" data-id="${o.id}">Giao xong</button>` : '';
      const btnCancel   = canCancel(st)  ? `<button class="btn" data-act="cancel" data-id="${o.id}">Huỷ</button>` : '';

      return `
        <tr>
          <td><strong>${escapeHtml(o.id)}</strong></td>
          <td class="small">${escapeHtml(when)}</td>
          <td>
            <div>${escapeHtml(o?.shipping?.fullname||'')}</div>
            <div class="small">${escapeHtml(o?.shipping?.phone||'')}</div>
          </td>
          <td class="small">${escapeHtml(addr)}</td>
          <td style="text-align:right">${qty}</td>
          <td style="text-align:right">${money(o.total)}</td>
          <td><span class="${stClass}">${escapeHtml(stLabel)}</span></td>
          <td style="white-space:nowrap;display:flex;gap:6px;flex-wrap:wrap">
            ${btnView}${btnConfirm}${btnDeliver}${btnCancel}
          </td>
        </tr>
      `;
    }).join('');
  }

  function escapeHtml(s){
    return String(s||'').replace(/[&<>"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
  }

  /* ================== Modal ================== */
  function openModal(id) {
    const o = state.list.find(x => String(x.id)===String(id));
    if (!o) return;

    state.modalId = id;
    mTitle.textContent = `Chi tiết đơn #${o.id||'—'}`;
    $('#vCode').textContent = o.id || '—';
    $('#vDate').textContent = o.created_at ? new Date(o.created_at).toLocaleString('vi-VN') : '—';

    const st = String(o.status||'new').toLowerCase();
    $('#vStatus').textContent = STATUS_TEXT[st] || STATUS_TEXT.new;
    $('#vNote').textContent = o.note || '—';

    $('#vCus').textContent = o?.shipping?.fullname || '—';
    $('#vPhone').textContent = o?.shipping?.phone || '—';
    const addr = [o?.shipping?.address,o?.shipping?.ward,o?.shipping?.district,o?.shipping?.city].filter(Boolean).join(', ');
    $('#vAddr').textContent = addr || '—';

    mStatusSel.value = (st === 'cancelled') ? 'canceled' : st;

    vItems.innerHTML = (o.items||[]).map(it => `
      <tr>
        <td>${escapeHtml(it.code||'')}</td>
        <td>${escapeHtml(it.name||'')}</td>
        <td style="text-align:right">${money(it.price)}</td>
        <td style="text-align:right">${Number(it.qty)||0}</td>
        <td style="text-align:right">${money((Number(it.qty)||0)*(Number(it.price)||0))}</td>
      </tr>
    `).join('');
    vTotal.textContent = money(o.total||0);

    modal.classList.add('show');
    modal.setAttribute('aria-hidden','false');
  }
  function closeModal() {
    modal.classList.remove('show');
    modal.setAttribute('aria-hidden','true');
    state.modalId = null;
  }
  mBtnClose?.addEventListener('click', closeModal);
  modal?.addEventListener('click', (e) => { if (e.target === modal) closeModal(); });

  mBtnUpdate?.addEventListener('click', () => {
    if (!state.modalId) return;
    const id = state.modalId;
    const newStatus = mStatusSel.value;

    const idx = state.list.findIndex(x => String(x.id)===String(id));
    if (idx<0) return;

    const o = {...state.list[idx]};
    o.status = newStatus;
    if (newStatus === 'canceled')  o.canceledAt  = new Date().toISOString();
    if (newStatus === 'delivered') o.deliveredAt = new Date().toISOString();
    o.updatedAt = new Date().toISOString();

    // ghi ở mọi nơi & render
    writeOrderEverywhere(o);
    state.list[idx] = o;
    render();
    closeModal();
  });

  /* ================== Row Actions ================== */
  document.addEventListener('click', (e) => {
    const btn = e.target.closest('[data-act]');
    if (!btn) return;
    const id = btn.getAttribute('data-id');
    const act = btn.getAttribute('data-act');

    const idx = state.list.findIndex(x => String(x.id)===String(id));
    if (idx < 0) return;
    const o = {...state.list[idx]};
    const st = String(o.status||'').toLowerCase();

    if (act === 'view') {
      openModal(id);
      return;
    }

    if (act === 'confirm') {
      if (!canConfirm(st)) return;
      o.status = 'confirmed';
      o.updatedAt = new Date().toISOString();
      writeOrderEverywhere(o);
      state.list[idx] = o;
      render();
      return;
    }

    if (act === 'deliver') {
      if (!canDeliver(st)) return;
      o.status = 'delivered';
      o.deliveredAt = new Date().toISOString();
      o.updatedAt = new Date().toISOString();
      writeOrderEverywhere(o);
      state.list[idx] = o;
      render();
      return;
    }

    if (act === 'cancel') {
      if (!canCancel(st)) return;
      if (!confirm('Xác nhận huỷ đơn này?')) return;
      o.status = 'canceled';
      o.canceledAt = new Date().toISOString();
      o.updatedAt = new Date().toISOString();
      writeOrderEverywhere(o);
      state.list[idx] = o;
      render();
      return;
    }
  });

  /* ================== Filters & Events ================== */
  btnFilter?.addEventListener('click', render);
  qInput?.addEventListener('keyup', (e)=>{ if (e.key==='Enter') render(); });
  [fromInput,toInput,stSelect,sortWard].forEach(el => el?.addEventListener('change', render));

  // Tự reload khi tab khác đổi (user hủy/đặt hàng, admin tab khác thao tác…)
  window.addEventListener('storage', (e) => {
    // Nghe cả 'admin.orders' để bắt kịch bản user ghi trực tiếp
    if ([KEYS.PING1, KEYS.PING2, KEYS.USER, KEYS.FLAT, KEYS.ADMIN].includes(e.key)) {
      // Nếu kho user đổi → ép bridge cập nhật FLAT trước
      if (e.key === KEYS.USER) flattenUserOrders();
      state.list = loadAdminOrdersMerged();
      render();
    }
  });


  if (!Array.isArray(LS.get(KEYS.FLAT))) flattenUserOrders();
  state.list = loadAdminOrdersMerged();
  render();
})();
