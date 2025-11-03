// /admin/assets/js/products.js
const CAT_KEY = "admin.categories";
const PROD_KEY = "admin.products";

// seed categories if not exist (rely on categories.js seed)
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
const saveProds = (a) => localStorage.setItem(PROD_KEY, JSON.stringify(a));
const nextId = (a) => a.reduce((m, x) => Math.max(m, x.id || 0), 0) + 1;

const catSelect = document.getElementById("categoryId");
const filterCat = document.getElementById("filter-cat");
function fillCategories() {
  const cats = loadCats().filter((c) => c.active);
  catSelect.innerHTML = cats
    .map((c) => `<option value="${c.id}">${c.name}</option>`)
    .join("");
  filterCat.innerHTML =
    `<option value="">-- tất cả loại --</option>` +
    cats.map((c) => `<option value="${c.id}">${c.name}</option>`).join("");
}
fillCategories();

// Auto price calc
function recalcPrice() {
  const cost = Number(document.getElementById("cost").value || 0);
  const margin = Number(document.getElementById("margin").value || 0);
  const price = Math.round(cost * (1 + margin / 100));
  document.getElementById("price").value = isFinite(price) ? price : 0;
}
document.getElementById("cost")?.addEventListener("input", recalcPrice);
document.getElementById("margin")?.addEventListener("input", recalcPrice);

// Image preview + remove
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
  document.getElementById("image").value = "";
  renderPreview();
});
function renderPreview() {
  const box = document.getElementById("img-preview");
  box.innerHTML = currentImageData
    ? `<img src="${currentImageData}" alt="" style="max-width:100%;border-radius:10px;border:1px solid #243040">`
    : `<small style="color:#9ca3af;">(chưa có hình)</small>`;
}
renderPreview();

// Render table
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
  document.getElementById("prod-body").innerHTML = data
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
          }">${p.status === "selling" ? "Hết bán" : "Bán lại"}</a>
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

// filters + search
document.getElementById("q")?.addEventListener("input", () => render());
document
  .getElementById("filter-cat")
  ?.addEventListener("change", () => render());
document
  .getElementById("filter-status")
  ?.addEventListener("change", () => render());

// helpers form
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

// submit
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
      saveProds(prods);
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
    saveProds(prods);
    render(prods);
    setForm(null);
  }
});

// actions
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
