/*
  inventory.js – Tồn kho & Báo cáo
  - Tra cứu số lượng tồn tại thời điểm (theo SP hoặc theo loại)
  - Báo cáo nhập – xuất – tồn theo khoảng thời gian
  - Cảnh báo sản phẩm sắp hết hàng
  - Dùng localStorage keys phù hợp hệ Admin:
      admin.categories   : [{id, code, name, desc, active}]
      admin.products     : [{id, code, name, categoryId, status, ...}]
      admin.stock        : [{id, productId, type:'import'|'export'|'adjust', qty, note, ref, createdAt}]
*/

(function () {
  const LS_CATS = "admin.categories";
  const LS_PRODS = "admin.products";
  const LS_TX = "admin.stock"; // giao dịch kho

  const $ = (s) => document.querySelector(s);
  const $$ = (s) => Array.from(document.querySelectorAll(s));
  const nowISO = () => new Date().toISOString();
  const toDate = (x) => (x instanceof Date ? x : new Date(x));
  const fmtInt = (n) => Number(n || 0).toLocaleString("vi-VN");

  const state = {
    cats: [],
    prods: [],
    txs: [],
    // filter
    q: "",
  };

  // -------- Storage helpers
  const loadJSON = (k, d) => {
    try {
      return JSON.parse(localStorage.getItem(k) || JSON.stringify(d));
    } catch {
      return d;
    }
  };
  const saveJSON = (k, v) => localStorage.setItem(k, JSON.stringify(v));

  // -------- Seed tối thiểu cho admin.stock (chỉ khi chưa có)
  (function seedTx() {
    if (localStorage.getItem(LS_TX)) return;
    // Không biết dữ liệu thực tế của bạn, nên chỉ tạo rỗng để không làm sai lệch.
    saveJSON(LS_TX, []);
  })();

  function loadAll() {
    state.cats = loadJSON(LS_CATS, []);
    state.prods = loadJSON(LS_PRODS, []);
    state.txs = loadJSON(LS_TX, []);
  }

  // -------- Danh mục & Sản phẩm
  function catName(id) {
    return state.cats.find((c) => String(c.id) === String(id))?.name || "—";
  }

  // -------- Tính tồn
  // Tổng qty (+ import/adjust+, - export/adjust-) lên đến 1 thời điểm (<= at)
  // Lấy tồn hiện tại từ admin.products
  function currentQty(productId) {
    const p = state.prods.find((x) => String(x.id) === String(productId));
    return Number(p?.qty || 0);
  }

  // Tính tồn tại thời điểm at bằng cách "quay ngược" từ tồn hiện tại
  function stockOn(productId, at) {
    const atTS = at ? new Date(at).getTime() : Date.now();
    const nowTS = Date.now();
    // Nếu thời điểm >= hiện tại (±1s) thì trả tồn hiện tại luôn
    if (atTS >= nowTS - 1000) return currentQty(productId);

    let deltaAfter = 0; // tổng phát sinh sau thời điểm tra cứu
    for (const t of state.txs) {
      if (String(t.productId) !== String(productId)) continue;
      const ts = new Date(
        t.createdAt || t.date || t.time || new Date()
      ).getTime();
      if (ts > atTS) {
        const q = Number(t.qty || 0);
        if (t.type === "import")
          deltaAfter += q; // nhập sau T làm tồn hiện tại tăng
        else if (t.type === "export")
          deltaAfter -= q; // xuất sau T làm tồn hiện tại giảm
        else if (t.type === "adjust") deltaAfter += q; // điều chỉnh (dương/âm)
      }
    }
    // Tồn tại T = tồn hiện tại - phát sinh sau T
    return currentQty(productId) - deltaAfter;
  }

  // Tồn hiện tại
  const stockNow = (productId) => stockOn(productId, new Date());

  // -------- UI fill filters
  function fillProductSelect(selId, includeAll = true) {
    const el = $(selId);
    if (!el) return;
    const opts = [];
    if (includeAll) opts.push('<option value="">— tất cả —</option>');
    // Ưu tiên SP đang bán
    const list = state.prods
      .slice()
      .sort((a, b) => String(a.name).localeCompare(String(b.name), "vi"));
    for (const p of list) {
      opts.push(
        `<option value="${p.id}">${escapeHtml(p.code || "")} — ${escapeHtml(
          p.name || ""
        )}</option>`
      );
    }
    el.innerHTML = opts.join("");
  }

  function fillCategorySelect(selId, includeAll = true) {
    const el = $(selId);
    if (!el) return;
    const opts = [];
    if (includeAll) opts.push('<option value="">— tất cả —</option>');
    const list = state.cats
      .slice()
      .sort((a, b) => String(a.name).localeCompare(String(b.name), "vi"));
    for (const c of list) {
      if (c.active !== false) {
        opts.push(
          `<option value="${c.id}">${escapeHtml(c.name || "")}</option>`
        );
      }
    }
    el.innerHTML = opts.join("");
  }

  function escapeHtml(s) {
    return String(s || "").replace(
      /[&<>"']/g,
      (m) => ({ "&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;" }[m])
    );
  }

  // -------- Khối 1: Tra cứu tại thời điểm
  function handleCheckAt() {
    const pid = $("#f-product").value;
    const cid = $("#f-category").value;
    const at = $("#f-at").value ? new Date($("#f-at").value) : new Date();

    const list = state.prods.filter((p) => {
      if (pid && String(p.id) !== String(pid)) return false;
      if (cid && String(p.categoryId) !== String(cid)) return false;
      // search box topbar
      if (state.q) {
        const q = state.q.toLowerCase();
        const hit = [p.code, p.name].some((x) =>
          String(x || "")
            .toLowerCase()
            .includes(q)
        );
        if (!hit) return false;
      }
      return true;
    });

    if (!list.length) {
      $(
        "#at-result"
      ).innerHTML = `<span class="muted">Không có sản phẩm phù hợp bộ lọc.</span>`;
      return;
    }

    const lines = list
      .map((p) => {
        const qty = stockOn(p.id, at);
        return `<tr>
        <td>${escapeHtml(p.code || "")}</td>
        <td><strong>${escapeHtml(p.name || "")}</strong></td>
        <td>${escapeHtml(catName(p.categoryId))}</td>
        <td class="num">${fmtInt(qty)}</td>
      </tr>`;
      })
      .join("");

    const when = at.toLocaleString("vi-VN");
    $("#at-result").innerHTML = `
      <div class="recentOrders" style="margin-top:8px">
        <div class="muted">Kết quả tại thời điểm: <span class="nowrap">${when}</span></div>
        <table style="margin-top:6px">
          <thead><tr><td>Mã</td><td>Tên sản phẩm</td><td>Loại</td><td class="num">Tồn</td></tr></thead>
          <tbody>${lines}</tbody>
        </table>
      </div>
    `;
  }

  function resetCheckAt() {
    $("#f-product").value = "";
    $("#f-category").value = "";
    $("#f-at").value = "";
    $("#q").value = "";
    state.q = "";
    $(
      "#at-result"
    ).innerHTML = `<span class="muted">Chọn sản phẩm/loại và thời điểm để tra cứu tồn.</span>`;
  }

  // -------- Khối 2: Báo cáo N-X-T
  function runReport() {
    const from = $("#r-from").value ? new Date($("#r-from").value) : null;
    const to = $("#r-to").value ? new Date($("#r-to").value) : null;
    const cid = $("#r-category").value;

    // Chuẩn hoá ngày: to + 23:59:59
    let fromTS = from
      ? new Date(
          from.getFullYear(),
          from.getMonth(),
          from.getDate(),
          0,
          0,
          0,
          0
        ).getTime()
      : null;
    let toTS = to
      ? new Date(
          to.getFullYear(),
          to.getMonth(),
          to.getDate(),
          23,
          59,
          59,
          999
        ).getTime()
      : null;

    const rows = [];
    const list = state.prods.filter((p) => {
      if (cid && String(p.categoryId) !== String(cid)) return false;
      if (state.q) {
        const q = state.q.toLowerCase();
        const hit = [p.code, p.name].some((x) =>
          String(x || "")
            .toLowerCase()
            .includes(q)
        );
        if (!hit) return false;
      }
      return true;
    });

    for (const p of list) {
      // tồn đầu = giao dịch trước from (nếu không có from → 0)
      const begin = fromTS == null ? 0 : stockOn(p.id, new Date(fromTS - 1));
      // nhập & xuất trong kỳ
      let imp = 0,
        exp = 0;
      for (const t of state.txs) {
        if (String(t.productId) !== String(p.id)) continue;
        const ts = new Date(
          t.createdAt || t.date || t.time || nowISO()
        ).getTime();
        if ((fromTS == null || ts >= fromTS) && (toTS == null || ts <= toTS)) {
          if (t.type === "import") imp += Number(t.qty || 0);
          else if (t.type === "export") exp += Number(t.qty || 0);
          else if (t.type === "adjust") {
            // adjust trong kỳ: coi như nhập nếu qty>0, xuất nếu qty<0
            if (Number(t.qty || 0) >= 0) imp += Number(t.qty || 0);
            else exp += Math.abs(Number(t.qty || 0));
          }
        }
      }
      const end = begin + imp - exp;
      rows.push({
        id: p.id,
        code: p.code,
        name: p.name,
        categoryId: p.categoryId,
        begin,
        imp,
        exp,
        end,
      });
    }

    if (!rows.length) {
      $(
        "#report-body"
      ).innerHTML = `<tr><td colspan="8" style="text-align:center;color:#9aa3ad;padding:14px">Không có dữ liệu</td></tr>`;
      $("#summary").textContent = "";
      return;
    }

    // render
    $("#report-body").innerHTML = rows
      .map(
        (r, i) => `
      <tr>
        <td>${i + 1}</td>
        <td><code>${escapeHtml(r.code || "")}</code></td>
        <td><strong>${escapeHtml(r.name || "")}</strong></td>
        <td>${escapeHtml(catName(r.categoryId))}</td>
        <td class="num">${fmtInt(r.begin)}</td>
        <td class="num">${fmtInt(r.imp)}</td>
        <td class="num">${fmtInt(r.exp)}</td>
        <td class="num"><strong>${fmtInt(r.end)}</strong></td>
      </tr>
    `
      )
      .join("");

    const sumBegin = rows.reduce((t, x) => t + x.begin, 0);
    const sumImp = rows.reduce((t, x) => t + x.imp, 0);
    const sumExp = rows.reduce((t, x) => t + x.exp, 0);
    const sumEnd = rows.reduce((t, x) => t + x.end, 0);
    $("#summary").textContent = `Tổng: Tồn đầu ${fmtInt(
      sumBegin
    )} • Nhập ${fmtInt(sumImp)} • Xuất ${fmtInt(sumExp)} • Tồn cuối ${fmtInt(
      sumEnd
    )}`;

    // cache cho export
    window.__INV_LAST_REPORT__ = rows;
  }

  function exportCSV() {
    const rows = window.__INV_LAST_REPORT__ || [];
    if (!rows.length) {
      alert("Chưa có dữ liệu để xuất.");
      return;
    }
    const header = [
      "STT",
      "Ma",
      "Ten",
      "Loai",
      "TonDau",
      "Nhap",
      "Xuat",
      "TonCuoi",
    ];
    const lines = [header.join(",")];
    rows.forEach((r, i) => {
      lines.push(
        [
          i + 1,
          safeCSV(r.code),
          safeCSV(r.name),
          safeCSV(catName(r.categoryId)),
          r.begin,
          r.imp,
          r.exp,
          r.end,
        ].join(",")
      );
    });
    const blob = new Blob([lines.join("\n")], {
      type: "text/csv;charset=utf-8;",
    });
    const url = URL.createObjectURL(blob);
    const a = document.createElement("a");
    a.href = url;
    a.download = "bao_cao_nhap_xuat_ton.csv";
    document.body.appendChild(a);
    a.click();
    a.remove();
    URL.revokeObjectURL(url);
  }
  function safeCSV(v) {
    return `"${String(v ?? "").replace(/"/g, '""')}"`;
  }

  // -------- Khối 3: Cảnh báo sắp hết hàng
  function checkLow() {
    const th = Number($("#low-threshold").value || 5);
    const cid = $("#low-category").value;

    const list = state.prods.filter((p) => {
      if (cid && String(p.categoryId) !== String(cid)) return false;
      if (state.q) {
        const q = state.q.toLowerCase();
        const hit = [p.code, p.name].some((x) =>
          String(x || "")
            .toLowerCase()
            .includes(q)
        );
        if (!hit) return false;
      }
      return true;
    });

    const rows = list
      .map((p) => {
        const qty = stockNow(p.id);
        return { p, qty };
      })
      .filter((x) => x.qty <= th);

    if (!rows.length) {
      $(
        "#low-body"
      ).innerHTML = `<tr><td colspan="6" style="text-align:center;color:#16a34a;padding:14px">Tốt! Không có sản phẩm nào ≤ ${fmtInt(
        th
      )}.</td></tr>`;
      return;
    }

    $("#low-body").innerHTML = rows
      .map(
        (x, i) => `
      <tr>
        <td>${i + 1}</td>
        <td><code>${escapeHtml(x.p.code || "")}</code></td>
        <td><strong>${escapeHtml(x.p.name || "")}</strong></td>
        <td>${escapeHtml(catName(x.p.categoryId))}</td>
        <td class="num">${fmtInt(x.qty)}</td>
        <td><span class="status low">Sắp hết</span></td>
      </tr>
    `
      )
      .join("");
  }

  // -------- Topbar search
  function handleTopSearch() {
    state.q = $("#q").value.trim();
  }

  // -------- Init
  function initUI() {
    fillProductSelect("#f-product", true);
    fillCategorySelect("#f-category", true);
    fillCategorySelect("#r-category", true);
    fillCategorySelect("#low-category", true);

    // default dates: this month
    const d = new Date();
    const y = d.getFullYear(),
      m = d.getMonth();
    $("#r-from").value = toInputDate(new Date(y, m, 1));
    $("#r-to").value = toInputDate(new Date(y, m + 1, 0));

    $(
      "#at-result"
    ).innerHTML = `<span class="muted">Chọn sản phẩm/loại và thời điểm để tra cứu tồn.</span>`;
  }
  function toInputDate(dt) {
    const y = dt.getFullYear();
    const m = String(dt.getMonth() + 1).padStart(2, "0");
    const d = String(dt.getDate()).padStart(2, "0");
    return `${y}-${m}-${d}`;
  }

  function bindEvents() {
    $("#btn-check")?.addEventListener("click", () => {
      handleTopSearch();
      handleCheckAt();
    });
    $("#btn-reset-check")?.addEventListener("click", resetCheckAt);
    $("#btn-run-report")?.addEventListener("click", () => {
      handleTopSearch();
      runReport();
    });
    $("#btn-export-csv")?.addEventListener("click", exportCSV);
    $("#btn-check-low")?.addEventListener("click", () => {
      handleTopSearch();
      checkLow();
    });
    $("#q")?.addEventListener("input", () => {
      state.q = $("#q").value.trim();
    });
  }

  // -------- Boot
  (function boot() {
    loadAll();
    initUI();
    bindEvents();
  })();

  // -------- Optional: lắng nghe tab khác cập nhật dữ liệu kho
  window.addEventListener("storage", (e) => {
    if (e && (e.key === LS_CATS || e.key === LS_PRODS || e.key === LS_TX)) {
      loadAll();
      initUI();
    }
  });
})();
