(function () {
  // ===== Storage Keys =====
  const ORDER_KEY = "admin.orders";
  const USER_KEYS = ["sv_orders_flat", "sv_orders_v1", "sv_orders", "orders"]; // nguồn bên User

  // ===== Helpers =====
  const $ = (s, ctx = document) => ctx.querySelector(s);
  const money = (x) => (Number(x) || 0).toLocaleString("vi-VN");

  function jget(k, def) {
    try {
      return JSON.parse(localStorage.getItem(k) || JSON.stringify(def));
    } catch {
      return def;
    }
  }
  function jset(k, v) {
    localStorage.setItem(k, JSON.stringify(v));
  }

  // ===== Importer: chỉ chạy nếu admin.orders đang rỗng =====
  (function importOnce() {
    const has = jget(ORDER_KEY, []);
    if (has && has.length) return;

    let src = [];
    for (const k of USER_KEYS) {
      try {
        const arr = JSON.parse(localStorage.getItem(k) || "[]");
        if (Array.isArray(arr) && arr.length) {
          src = arr;
          break;
        }
        // sv_orders_v1 dạng object theo email
        if (!arr.length && k === "sv_orders_v1") {
          const obj = JSON.parse(localStorage.getItem("sv_orders_v1") || "{}");
          const merged = [];
          Object.values(obj).forEach((list) => {
            if (Array.isArray(list)) merged.push(...list);
          });
          if (merged.length) {
            src = merged;
            break;
          }
        }
      } catch {}
    }
    if (!src.length) return;

    const norm = normalize(src);
    jset(ORDER_KEY, norm);
  })();

  // ===== Chuẩn hoá đơn từ các schema khác nhau =====
  function normalize(list) {
    return (list || []).map((o, i) => ({
      id: o.id || o.code || `U${Date.now()}_${i + 1}`,
      code:
        o.code ||
        o.order_code ||
        `OD-${new Date().toISOString().slice(0, 10).replace(/-/g, "")}-${String(
          i + 1
        ).padStart(3, "0")}`,
      date:
        o.date ||
        o.created_at ||
        o.createdAt ||
        new Date().toISOString().slice(0, 10),
      status: String(o.status || "new")
        .replace(/^paid$/, "confirmed")
        .replace(/^pending$/, "new"),
      note: o.note || "",
      customer: {
        name: o.customer?.name || o.shipping?.fullname || o.name || "",
        phone: o.customer?.phone || o.shipping?.phone || o.phone || "",
        address: o.customer?.address || o.address || o.shipping?.address || "",
        ward: o.customer?.ward || o.ward || "",
        district:
          o.customer?.district || o.district || o.shipping?.district || "",
        city: o.customer?.city || o.city || o.shipping?.city || "",
      },
      items: (o.items || []).map((it) => ({
        productId: it.productId || it.id,
        productCode: it.productCode || it.code || it.specs?.Mã || "",
        productName: it.productName || it.name || "",
        price: Number(it.price) || 0,
        quantity: Number(it.quantity || it.qty || 1) || 1,
      })),
      total:
        Number(o.total) ||
        (o.items || []).reduce(
          (s, it) =>
            s + Number(it.price || 0) * Number(it.quantity || it.qty || 1),
          0
        ),
    }));
  }

  // ===== Repo =====
  function list() {
    return jget(ORDER_KEY, []).sort(
      (a, b) => new Date(b.date) - new Date(a.date)
    );
  }
  function save(arr) {
    jset(ORDER_KEY, arr || []);
  }
  function findById(id) {
    return list().find((x) => String(x.id) === String(id));
  }

  // Cập nhật trạng thái đơn hàng
  function updateStatus(id, status) {
    const all = list();
    const i = all.findIndex((x) => String(x.id) === String(id));
    if (i < 0) throw new Error("Không tìm thấy đơn hàng");

    // 1) Cập nhật trong kho admin
    all[i].status = status;
    all[i].updatedAt = Date.now();
    save(all);

    // 2) Đồng bộ về kho user (sv_orders_v1)
    try {
      const db = JSON.parse(localStorage.getItem("sv_orders_v1") || "{}");
      let touched = false;

      // duyệt theo email: [ {id, ...}, ... ]
      for (const email of Object.keys(db)) {
        const arr = Array.isArray(db[email]) ? db[email] : [];
        for (const o of arr) {
          // khớp theo id đơn (ví dụ SV123...) hoặc theo code nếu bạn dùng code là mã hiển thị
          if (
            String(o.id) === String(all[i].id) ||
            String(o.id) === String(all[i].code)
          ) {
            o.status = status; // new | confirmed | delivered | canceled
            o.updated_at = Date.now();
            touched = true;
          }
        }
      }
      if (touched) localStorage.setItem("sv_orders_v1", JSON.stringify(db));
    } catch (e) {
      console.warn("Sync status to sv_orders_v1 failed:", e);
    }

    // 3) Gõ chuông cho các tab user
    try {
      localStorage.setItem("orders.bump", String(Date.now()));
    } catch (_) {}

    return all[i];
  }

  // ===== UI Refs =====
  const $q = $("#q");
  const $from = $("#from");
  const $to = $("#to");
  const $status = $("#status");
  const $sortWard = $("#sortWard");
  const $tbody = $("#od-body");
  const $btnFilter = $("#btnFilter");

  // Modal (CHỈ 1 khối #od-modal trong HTML)
  const $modal = $("#od-modal");
  const $title = $("#od-title");
  const $vCode = $("#vCode");
  const $vDate = $("#vDate");
  const $vStatus = $("#vStatus");
  const $vNote = $("#vNote");
  const $vCus = $("#vCus");
  const $vPhone = $("#vPhone");
  const $vAddr = $("#vAddr");
  const $vItems = $("#vItems");
  const $vTotal = $("#vTotal");
  const $odStatus = $("#od-status");
  const $btnUpdateStatus = $("#btnUpdateStatus");
  const $btnClose = $("#btnClose");

  function chip(st) {
    const map = {
      new: "st-new",
      confirmed: "st-confirmed",
      delivered: "st-delivered",
      canceled: "st-canceled",
    };
    const label =
      st === "new"
        ? "chưa xử lý"
        : st === "confirmed"
        ? "đã xác nhận"
        : st === "delivered"
        ? "đã giao"
        : "đã huỷ";
    return `<span class="status-chip ${map[st] || "st-new"}">${label}</span>`;
  }

  function render() {
    const q = ($q?.value || "").trim().toLowerCase();
    const st = $status?.value || "";
    const from = $from?.value ? new Date($from.value) : null;
    const to = $to?.value ? new Date($to.value) : null;
    const sortWard = $sortWard?.value || "";

    let rows = list().filter((o) => {
      if (st && o.status !== st) return false;
      const d = new Date(o.date);
      if (from && d < from) return false;
      if (to && d > to) return false;
      if (q) {
        const hay = `${o.code} ${o.customer?.name || ""} ${
          o.customer?.phone || ""
        } ${o.customer?.address || ""} ${o.customer?.ward || ""} ${
          o.customer?.district || ""
        } ${o.customer?.city || ""}`.toLowerCase();
        if (!hay.includes(q)) return false;
      }
      return true;
    });

    if (sortWard) {
      rows.sort((a, b) => {
        const aw = (a.customer?.ward || "").toLowerCase();
        const bw = (b.customer?.ward || "").toLowerCase();
        return sortWard === "asc" ? aw.localeCompare(bw) : bw.localeCompare(aw);
      });
    }

    if (!$tbody) return;
    if (!rows.length) {
      $tbody.innerHTML =
        '<tr><td colspan="8" style="text-align:center;color:#9aa3ad;padding:20px">Không có dữ liệu</td></tr>';
      return;
    }

    $tbody.innerHTML = rows
      .map((o) => {
        const qty = (o.items || []).reduce(
          (s, it) => s + Number(it.quantity || 0),
          0
        );
        const addr = [
          o.customer?.address,
          o.customer?.ward,
          o.customer?.district,
          o.customer?.city,
        ]
          .filter(Boolean)
          .join(", ");
        return `
        <tr>
          <td><b>${o.code}</b></td>
          <td>${o.date}</td>
          <td>${o.customer?.name || "-"}<div class="small">${
          o.customer?.phone || ""
        }</div></td>
          <td>${addr || "-"}</td>
          <td style="text-align:right">${qty}</td>
          <td style="text-align:right">${money(o.total)}</td>
          <td>${chip(o.status)}</td>
          <td>
            <button class="btn sm" data-act="view" data-id="${
              o.id
            }">Xem</button>
            ${
              o.status !== "canceled" && o.status !== "delivered"
                ? `<button class="btn sm primary" data-act="confirm" data-id="${o.id}">Xác nhận</button>`
                : ""
            }
            ${
              o.status === "confirmed"
                ? `<button class="btn sm" data-act="deliver" data-id="${o.id}">Giao xong</button>`
                : ""
            }
            ${
              o.status === "new" || o.status === "confirmed"
                ? `<button class="btn sm" data-act="cancel" data-id="${o.id}">Huỷ</button>`
                : ""
            }
          </td>
        </tr>`;
      })
      .join("");
  }

  function openDetail(id) {
    const o = findById(id);
    if (!o) return;
    $title.textContent = `Đơn ${o.code}`;
    $vCode.textContent = o.code;
    $vDate.textContent = o.date;
    $vStatus.textContent = o.status;
    $vNote.textContent = o.note || "";
    $vCus.textContent = o.customer?.name || "";
    $vPhone.textContent = o.customer?.phone || "";
    $vAddr.textContent = [
      o.customer?.address,
      o.customer?.ward,
      o.customer?.district,
      o.customer?.city,
    ]
      .filter(Boolean)
      .join(", ");
    $odStatus.value = o.status;

    $vItems.innerHTML = (o.items || [])
      .map((it) => {
        const line = Number(it.price || 0) * Number(it.quantity || 0);
        return `<tr>
        <td>${it.productCode || ""}</td>
        <td>${it.productName || ""}</td>
        <td style="text-align:right">${money(it.price)}</td>
        <td style="text-align:right">${it.quantity}</td>
        <td style="text-align:right">${money(line)}</td>
      </tr>`;
      })
      .join("");
    $vTotal.textContent = money(o.total || 0);

    $modal?.classList.add("show");
    $modal?.setAttribute("aria-hidden", "false");

    // gán lại handler mỗi lần mở để bám đúng đơn đang xem
    $btnUpdateStatus.onclick = function () {
      try {
        updateStatus(o.id, $odStatus.value);
        alert("Đã cập nhật trạng thái");
        closeModal();
        render();
      } catch (err) {
        alert(err.message || err);
      }
    };
  }

  function closeModal() {
    $modal?.classList.remove("show");
    $modal?.setAttribute("aria-hidden", "true");
  }
  $btnClose?.addEventListener("click", closeModal);
  $modal?.addEventListener("click", (e) => {
    if (
      e.target === $modal ||
      e.target.classList?.contains("sv-modal__backdrop")
    )
      closeModal();
  });

  // ===== Events =====
  $btnFilter?.addEventListener("click", render);
  $tbody?.addEventListener("click", (e) => {
    const btn = e.target.closest("button[data-act]");
    if (!btn) return;
    const id = btn.getAttribute("data-id");
    const act = btn.getAttribute("data-act");
    try {
      if (act === "view") return openDetail(id);
      if (act === "confirm") {
        updateStatus(id, "confirmed");
        render();
        return;
      }
      if (act === "deliver") {
        updateStatus(id, "delivered");
        render();
        return;
      }
      if (act === "cancel") {
        if (!confirm("Huỷ đơn này?")) return;
        updateStatus(id, "canceled");
        render();
        return;
      }
    } catch (err) {
      alert(err.message || err);
    }
  });

  // ===== Đồng bộ từ User (sv_orders_flat) theo "chuông" =====
  (function listenUserFlat() {
    function upsertFromFlat() {
      let flat = [];
      try {
        flat = JSON.parse(localStorage.getItem("sv_orders_flat") || "[]");
      } catch {}
      if (!Array.isArray(flat) || !flat.length) return;

      const incoming = normalize(flat);
      const current = jget(ORDER_KEY, []);
      const byCode = new Map(current.map((x) => [String(x.code), x]));

      incoming.forEach((x) => {
        if (!byCode.has(String(x.code))) {
          current.push(x);
          byCode.set(String(x.code), x);
        }
      });
      current.sort((a, b) => new Date(b.date) - new Date(a.date));
      jset(ORDER_KEY, current);
    }

    window.addEventListener("storage", (e) => {
      if (e.key === "orders.bump" || e.key === "sv_orders_flat") {
        // có thể là cập nhật trạng thái hoặc user vừa đặt đơn: nhập & render
        if (e.key === "sv_orders_flat") upsertFromFlat();
        render();
      }
    });

    // chạy 1 lần khi mở trang
    upsertFromFlat();
  })();

  // ===== Init =====
  (function init() {
    const now = new Date();
    const start = new Date(now);
    start.setDate(now.getDate() - 7);
    if ($from) $from.value = start.toISOString().slice(0, 10);
    if ($to) $to.value = now.toISOString().slice(0, 10);
    render();
  })();
})();
