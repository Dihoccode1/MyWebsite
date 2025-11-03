// /admin/assets/js/categories.js
const CAT_KEY = "admin.categories";

(function seed() {
  if (localStorage.getItem(CAT_KEY)) return;
  const def = [
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
  ];
  localStorage.setItem(CAT_KEY, JSON.stringify(def));
})();
const loadCats = () => {
  try {
    return JSON.parse(localStorage.getItem(CAT_KEY) || "[]");
  } catch {
    return [];
  }
};
const saveCats = (a) => localStorage.setItem(CAT_KEY, JSON.stringify(a));
const nextId = (a) => a.reduce((m, x) => Math.max(m, x.id || 0), 0) + 1;

function render(list) {
  const q = (document.getElementById("q")?.value || "").toLowerCase().trim();
  const data = (list || loadCats()).filter((c) => {
    if (!q) return true;
    return `${c.code} ${c.name} ${c.desc || ""}`.toLowerCase().includes(q);
  });
  document.getElementById("cat-body").innerHTML = data
    .map(
      (c, i) => `
    <tr>
      <td>${i + 1}</td>
      <td>${c.code}</td>
      <td>${c.name}</td>
      <td>${c.desc || ""}</td>
      <td>${
        c.active
          ? '<span class="status delivered">Đang dùng</span>'
          : '<span class="status returned">Ẩn</span>'
      }</td>
      <td>
        <a href="#" data-act="edit" data-id="${
          c.id
        }" class="btn btn-action">Sửa</a>
        <a href="#" data-act="${c.active ? "hide" : "show"}" data-id="${
        c.id
      }" class="btn btn-action">${c.active ? "Ẩn" : "Hiện"}</a>
        <a href="#" data-act="remove" data-id="${
          c.id
        }" class="btn btn-action" style="background:#ef4444;">Xóa</a>
      </td>
    </tr>
  `
    )
    .join("");
}
function setForm(c) {
  document.getElementById("id").value = c?.id || "";
  document.getElementById("code").value = c?.code || "";
  document.getElementById("name").value = c?.name || "";
  document.getElementById("desc").value = c?.desc || "";
  document.getElementById("active").value = String(c?.active ?? true);
  document.getElementById("form-title").textContent = c?.id
    ? "Sửa loại"
    : "Thêm loại";
}
render();
document.getElementById("q")?.addEventListener("input", () => render());
document
  .getElementById("btn-new")
  ?.addEventListener("click", () => setForm(null));
document
  .getElementById("btn-cancel")
  ?.addEventListener("click", () => setForm(null));
document.getElementById("cat-form")?.addEventListener("submit", (e) => {
  e.preventDefault();
  const arr = loadCats();
  const data = {
    id: Number(document.getElementById("id").value || 0),
    code: document.getElementById("code").value.trim(),
    name: document.getElementById("name").value.trim(),
    desc: document.getElementById("desc").value.trim(),
    active: document.getElementById("active").value === "true",
  };
  if (!data.code || !data.name) {
    alert("Nhập mã & tên loại");
    return;
  }
  if (data.id) {
    const i = arr.findIndex((x) => x.id === data.id);
    if (i >= 0) {
      arr[i] = { ...arr[i], ...data };
      saveCats(arr);
      render(arr);
      setForm(null);
    }
  } else {
    if (arr.some((x) => x.code.toLowerCase() === data.code.toLowerCase())) {
      alert("Mã loại đã tồn tại");
      return;
    }
    data.id = nextId(arr);
    arr.push(data);
    saveCats(arr);
    render(arr);
    setForm(null);
  }
});
document.getElementById("cat-body")?.addEventListener("click", (e) => {
  const a = e.target.closest("a[data-act]");
  if (!a) return;
  e.preventDefault();
  const id = Number(a.dataset.id);
  const act = a.dataset.act;
  const arr = loadCats();
  const i = arr.findIndex((x) => x.id === id);
  if (i < 0) return;
  if (act === "edit") {
    setForm(arr[i]);
    return;
  }
  if (act === "hide") {
    arr[i].active = false;
    saveCats(arr);
    render(arr);
    return;
  }
  if (act === "show") {
    arr[i].active = true;
    saveCats(arr);
    render(arr);
    return;
  }
  if (act === "remove") {
    if (
      confirm(
        "Xóa loại này? Lưu ý: sản phẩm đang dùng loại này sẽ cần sửa lại."
      )
    ) {
      arr.splice(i, 1);
      saveCats(arr);
      render(arr);
    }
  }
});
