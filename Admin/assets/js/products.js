// /admin/assets/js/products.js
const CAT_KEY = "admin.categories";
const PROD_KEY = "admin.products";

// =====================
// SEED dữ liệu ban đầu
// =====================
(function seedCats() {
  if (!localStorage.getItem(CAT_KEY)) {
    localStorage.setItem(
      CAT_KEY,
      JSON.stringify([
        {
          id: 1,
          code: "LOAI001",
          name: "Sáp vuốt tóc",
          desc: "Wax/Pomade",
          active: true,
        },
        {
          id: 2,
          code: "LOAI002",
          name: "Gôm xịt",
          desc: "Hairspray",
          active: true,
        },
        {
          id: 3,
          code: "LOAI003",
          name: "Bột tạo phồng",
          desc: "Hair powder",
          active: true,
        },
      ])
    );
  }
})();

(function seedProducts() {
  if (localStorage.getItem(PROD_KEY)) return;
  const now = Date.now();
  const demo = [
    {
      id: 1,
      code: "SP001",
      name: "Apestomen Nitro",
      categoryId: 1,
      desc: "Sáp giữ nếp tốt",
      uom: "hộp",
      qty: 10,
      cost: 200000,
      margin: 50,
      price: 300000,
      supplier: "Apestomen",
      status: "selling",
      image: null,
      createdAt: now,
    },
    {
      id: 2,
      code: "SP002",
      name: "Kevin Murphy Session",
      categoryId: 2,
      desc: "Gôm xịt giữ lâu",
      uom: "chai",
      qty: 15,
      cost: 280000,
      margin: 30,
      price: 364000,
      supplier: "Kevin Murphy",
      status: "selling",
      image: null,
      createdAt: now,
    },
  ];
  localStorage.setItem(PROD_KEY, JSON.stringify(demo));
})();

// ================
// Helpers storage
// ================
const loadCats = () => {
  try {
    return JSON.parse(localStorage.getItem(CAT_KEY) || "[]");
  } catch {
    return [];
  }
};
const loadProds = () => {
  try {
    return JSON.parse(localStorage.getItem(PROD_KEY) || "[]");
  } catch {
    return [];
  }
};
const nextId = (a) => a.reduce((m, x) => Math.max(m, x.id || 0), 0) + 1;

// =====================================
// BRIDGE -> Xuất sang trang User (store)
// =====================================
const PUBLIC_CATALOG_KEY = "sv_products_v1"; // user đọc key này
const BUMP_KEY = "catalog.bump"; // đánh dấu thay đổi để storage event

// map tên danh mục Admin -> slug ở site user
const CAT_SLUG_MAP = {
  "Sáp vuốt tóc": "hair_wax",
  "Gôm xịt": "hair_spray",
  "Bột tạo phồng": "volumizing_powder",
};

function toSlug(s) {
  return String(s || "")
    .toLowerCase()
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "")
    .replace(/[^a-z0-9]+/g, "-")
    .replace(/(^-|-$)/g, "");
}

// Convert 1 sản phẩm admin -> schema public
function mapAdminProdToPublic(p, cats) {
  const catName = cats.find((c) => c.id === p.categoryId)?.name || "";
  const category = CAT_SLUG_MAP[catName] || toSlug(catName) || "other";

  return {
    id: `admin-${p.id}`,
    name: p.name,
    brand: p.supplier || "",
    category, // ví dụ: hair_wax / hair_spray / volumizing_powder
    price: Number(p.price) || 0,
    original_price: undefined,
    image: p.image || "/assets/img/placeholder.png",
    images: p.image ? [p.image] : [],
    badge: "",
    featured: false,
    short_desc: p.desc || "",
    long_desc: p.desc || "",
    specs: { "Đơn vị": p.uom || "", Mã: p.code || "" },
    unit: p.uom || "",
    quantity: 1,
    min_qty: 1,
    max_qty: Math.max(1, Number(p.qty) || 1),
    stock: Number(p.qty) || 0,
    tags: [],
    details: [],
    usage: [],
  };
}

// Export toàn bộ admin.products -> sv_products_v1
function syncToStorefront(prods) {
  const cats = loadCats();
  const list = (prods || loadProds())
    .filter((p) => (p.status || "selling") === "selling") // chỉ xuất hàng đang bán
    .map((p) => mapAdminProdToPublic(p, cats));

  localStorage.setItem(PUBLIC_CATALOG_KEY, JSON.stringify(list));
  localStorage.setItem(BUMP_KEY, String(Date.now())); // kích hoạt storage event
}

// saveProds: luôn đồng bộ ra storefront
const saveProds = (a) => {
  localStorage.setItem(PROD_KEY, JSON.stringify(a));
  syncToStorefront(a);
};

// =============================
// DOM refs & khởi tạo dropdown
// =============================
const catSelect = document.getElementById("categoryId");
const filterCat = document.getElementById("filter-cat");

function fillCategories() {
  const cats = loadCats().filter((c) => c.active);
  if (catSelect) {
    catSelect.innerHTML = cats
      .map((c) => `<option value="${c.id}">${c.name}</option>`)
      .join("");
  }
  if (filterCat) {
    filterCat.innerHTML =
      `<option value="">-- tất cả loại --</option>` +
      cats.map((c) => `<option value="${c.id}">${c.name}</option>`).join("");
  }
}
fillCategories();

// ==================
// Tự tính giá bán
// ==================
function recalcPrice() {
  const cost = Number(document.getElementById("cost").value || 0);
  const margin = Number(document.getElementById("margin").value || 0);
  const price = Math.round(cost * (1 + margin / 100));
  document.getElementById("price").value = isFinite(price) ? price : 0;
}
document.getElementById("cost")?.addEventListener("input", recalcPrice);
document.getElementById("margin")?.addEventListener("input", recalcPrice);

// ============================
// Preview & bỏ hình (Base64)
// ============================
let currentImageData = null;
document.getElementById("image")?.addEventListener("change", (e) => {
  const file = e.target.files?.[0];
  if (!file) return;
  const reader = new FileReader();
  reader.onload = () => {
    currentImageData = reader.result;
    renderPreview();
  };
  reader.readAsDataURL(file);
});
document.getElementById("btn-remove-img")?.addEventListener("click", () => {
  currentImageData = null;
  const input = document.getElementById("image");
  if (input) input.value = "";
  renderPreview();
});
function renderPreview() {
  const box = document.getElementById("img-preview");
  if (!box) return;
  box.innerHTML = currentImageData
    ? `<img src="${currentImageData}" alt="" style="max-width:100%;border-radius:10px;border:1px solid #243040">`
    : `<small style="color:#9ca3af;">(chưa có hình)</small>`;
}
renderPreview();

// ==================
// Render bảng
// ==================
function render(list) {
  const q = (document.getElementById("q")?.value || "").toLowerCase().trim();
  const cat = document.getElementById("filter-cat")?.value || "";
  const st = document.getElementById("filter-status")?.value || "";
  const cats = loadCats();
  const data = (list || loadProds()).filter((p) => {
    if (q && !`${p.code} ${p.name} ${p.desc || ""}`.toLowerCase().includes(q))
      return false;
    if (cat && String(p.categoryId) !== cat) return false;
    if (st && p.status !== st) return false;
    return true;
  });

  const tbody = document.getElementById("prod-body");
  if (!tbody) return;

  tbody.innerHTML = data
    .map((p, i) => {
      const catName = cats.find((c) => c.id === p.categoryId)?.name || "";
      const img = p.image
        ? `<img src="${p.image}" alt="" style="width:48px;height:48px;object-fit:cover;border-radius:8px;border:1px solid #243040;">`
        : "";
      const stBadge =
        p.status === "selling"
          ? '<span class="status delivered">Đang bán</span>'
          : p.status === "stopped"
          ? '<span class="status returned">Hết bán</span>'
          : '<span class="status inPending">Ẩn</span>';

      return `
      <tr>
        <td>${i + 1}</td>
        <td>${img}</td>
        <td>${p.code}</td>
        <td>${p.name}</td>
        <td>${catName}</td>
        <td>${p.uom || ""}</td>
        <td>${p.qty || 0}</td>
        <td>${(p.cost || 0).toLocaleString("vi-VN")}</td>
        <td>${p.margin || 0}%</td>
        <td>${(p.price || 0).toLocaleString("vi-VN")}</td>
        <td>${p.supplier || ""}</td>
        <td>${stBadge}</td>
        <td>
          <a href="#" class="btn btn-action" data-act="edit" data-id="${
            p.id
          }">Sửa</a>
          <a href="#" class="btn btn-action" data-act="toggle" data-id="${
            p.id
          }">
            ${p.status === "selling" ? "Hết bán" : "Bán lại"}
          </a>
          <a href="#" class="btn btn-action" data-act="hide" data-id="${
            p.id
          }">Ẩn</a>
          <a href="#" class="btn btn-action" data-act="remove" data-id="${
            p.id
          }" style="background:#ef4444;">Xóa</a>
        </td>
      </tr>
    `;
    })
    .join("");
}
render();

// Đồng bộ lần đầu để trang User có dữ liệu ngay
syncToStorefront();

// ===================
// Tìm kiếm & lọc
// ===================
document.getElementById("q")?.addEventListener("input", () => render());
document
  .getElementById("filter-cat")
  ?.addEventListener("change", () => render());
document
  .getElementById("filter-status")
  ?.addEventListener("change", () => render());

// ===================
// Helpers set form
// ===================
function setForm(p) {
  document.getElementById("id").value = p?.id || "";
  document.getElementById("code").value = p?.code || "";
  document.getElementById("name").value = p?.name || "";
  document.getElementById("categoryId").value =
    p?.categoryId ||
    document.getElementById("categoryId").options[0]?.value ||
    "";
  document.getElementById("desc").value = p?.desc || "";
  document.getElementById("uom").value = p?.uom || "";
  document.getElementById("qty").value = p?.qty ?? 0;
  document.getElementById("cost").value = p?.cost ?? 0;
  document.getElementById("margin").value = p?.margin ?? 0;
  document.getElementById("price").value = p?.price ?? 0;
  document.getElementById("supplier").value = p?.supplier || "";
  document.getElementById("status").value = p?.status || "selling";
  currentImageData = p?.image || null;
  renderPreview();
  document.getElementById("form-title").textContent = p?.id
    ? "Sửa sản phẩm"
    : "Thêm sản phẩm";
}
document
  .getElementById("btn-new")
  ?.addEventListener("click", () => setForm(null));
document
  .getElementById("btn-cancel")
  ?.addEventListener("click", () => setForm(null));

// ===================
// Submit form
// ===================
document.getElementById("prod-form")?.addEventListener("submit", (e) => {
  e.preventDefault();
  const prods = loadProds();
  const data = {
    id: Number(document.getElementById("id").value || 0),
    code: document.getElementById("code").value.trim(),
    name: document.getElementById("name").value.trim(),
    categoryId: Number(document.getElementById("categoryId").value),
    desc: document.getElementById("desc").value.trim(),
    uom: document.getElementById("uom").value.trim(),
    qty: Number(document.getElementById("qty").value || 0),
    cost: Number(document.getElementById("cost").value || 0),
    margin: Number(document.getElementById("margin").value || 0),
    price: Number(document.getElementById("price").value || 0),
    supplier: document.getElementById("supplier").value.trim(),
    status: document.getElementById("status").value,
    image: currentImageData,
  };

  if (!data.code || !data.name) {
    alert("Nhập mã & tên sản phẩm");
    return;
  }

  if (data.id) {
    const i = prods.findIndex((x) => x.id === data.id);
    if (i >= 0) {
      prods[i] = { ...prods[i], ...data };
      saveProds(prods); // sẽ tự sync ra User
      render(prods);
      setForm(null);
    }
  } else {
    if (prods.some((x) => x.code.toLowerCase() === data.code.toLowerCase())) {
      alert("Mã sản phẩm đã tồn tại");
      return;
    }
    data.id = nextId(prods);
    data.createdAt = Date.now();
    prods.push(data);
    saveProds(prods); // sẽ tự sync ra User
    render(prods);
    setForm(null);
  }
});

// ===================
// Hành động bảng
// ===================
document.getElementById("prod-body")?.addEventListener("click", (e) => {
  const a = e.target.closest("a[data-act]");
  if (!a) return;
  e.preventDefault();
  const id = Number(a.dataset.id);
  const act = a.dataset.act;
  const prods = loadProds();
  const i = prods.findIndex((x) => x.id === id);
  if (i < 0) return;

  if (act === "edit") {
    setForm(prods[i]);
    // nếu bạn dùng drawer: window.AdminProductDrawer?.open();
    return;
  }
  if (act === "toggle") {
    prods[i].status = prods[i].status === "selling" ? "stopped" : "selling";
    saveProds(prods);
    render(prods);
    return;
  }
  if (act === "hide") {
    prods[i].status = "hidden";
    saveProds(prods);
    render(prods);
    return;
  }
  if (act === "remove") {
    if (confirm("Xóa sản phẩm này?")) {
      prods.splice(i, 1);
      saveProds(prods);
      render(prods);
    }
    return;
  }
});
