// /assets/js/products.app.js
(function () {
  const PAGE_SIZE = 8;               // mỗi trang 8 sp
  const SORT_KEY  = "sp.sortOrder";  // (để dành, nếu sau này cần sort)
  const VIEW_KEY  = "sp.viewMode";   // (để dành, nếu có BẢNG/DANH SÁCH)

  const $  = (s, r=document) => r.querySelector(s);
  const $$ = (s, r=document) => Array.from(r.querySelectorAll(s));

  const moneyVND = (n) =>
    (n ?? 0).toLocaleString("vi-VN", { style: "currency", currency: "VND", maximumFractionDigits: 0 });

  // Bỏ dấu tiếng Việt để search thân thiện
  const stripVN = (str="") => str.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();

  // Đọc & set query lên URL (để back/forward giữ trạng thái)
  const getQuery = (k, def="") => {
    const u = new URL(location.href);
    return u.searchParams.get(k) ?? def;
  };
  const setQuery = (obj) => {
    const u = new URL(location.href);
    Object.entries(obj).forEach(([k, v])=>{
      if (v === null || v === "" || v === undefined) u.searchParams.delete(k);
      else u.searchParams.set(k, v);
    });
    history.replaceState({}, "", u.toString());
  };

  function getAllProducts() {
    return Array.isArray(window.SV_PRODUCT_SEED) ? window.SV_PRODUCT_SEED : [];
  }

  function badgeHTML(badge) {
    if (!badge) return "";
    const map = {
      sale: { cls: "badge-sale", text: "Sale" },
      new:  { cls: "badge-sale", text: "Mới" },
      oos:  { cls: "badge-out-of-stock", text: "Hết hàng" }
    };
    const meta = map[badge] || null;
    return meta ? `<span class="product-badge ${meta.cls}">${meta.text}</span>` : "";
  }

  function itemHTML(p) {
    const ori = p.original_price && p.original_price > p.price
      ? `<span class="original-price">${moneyVND(p.original_price)}</span>` : "";
    return `
      <div class="col-lg-3 col-md-4 col-sm-6 col-6">
        <div class="product-item">
<<<<<<< HEAD
                <a href="pages/product_detail.php?id=${p.id}">
=======
          <a href="#">
>>>>>>> 433ee1991cf9cf73df03114a61f1552c08d6feac
            <div class="product-image">
              ${badgeHTML(p.badge)}
              <img src="${p.image}" alt="${p.name}">
            </div>
            <div class="product-name">${p.name}</div>
            <div class="product-price">
              <span class="sale-price">${moneyVND(p.price)}</span>
              ${ori}
            </div>
          </a>
        </div>
      </div>
    `;
  }

  // Lọc theo: q (tên), category, minprice, maxprice
  function filterProducts(all) {
    const q        = (getQuery("q","") || "").trim();
    const category = (getQuery("category","all") || "all").toLowerCase();
    const minprice = Number(getQuery("minprice","")) || null;
    const maxprice = Number(getQuery("maxprice","")) || null;

    const qNorm = stripVN(q);

    let result = all;

    if (q) {
      result = result.filter(p => stripVN(p.name).includes(qNorm));
    }
    if (category !== "all") {
      result = result.filter(p => (p.category || "").toLowerCase() === category);
    }
    result = result.filter(p => {
      const price = Number(p.price || 0);
      if (minprice !== null && price < minprice) return false;
      if (maxprice !== null && price > maxprice) return false;
      return true;
    });

    return { result, q, category, minprice, maxprice };
  }

  function render(all, page, pageSize) {
    const row = $(".product-list .row");
    if (!row) return;

    const { result: filtered, q, category, minprice, maxprice } = filterProducts(all);

    // (tuỳ chọn) sắp xếp theo giá nếu bạn muốn – hiện để nguyên thứ tự seed
    const sorted = filtered;

    // phân trang
    const total = sorted.length;
    const totalPages = Math.max(1, Math.ceil(total / pageSize));
    const cur = Math.min(Math.max(1, page), totalPages);
    const start = (cur - 1) * pageSize;
    const pageItems = sorted.slice(start, start + pageSize);

    row.innerHTML = pageItems.length
      ? pageItems.map(itemHTML).join("")
      : `<div class="col-12 py-5 text-center text-muted">Không tìm thấy sản phẩm phù hợp.</div>`;

    // cập nhật tổng số kết quả (nếu có)
    const info = $("#categoryInfo");
    if (info) {
      const priceText =
        (minprice || maxprice)
          ? ` • giá ${minprice ? moneyVND(minprice) : "0"} – ${maxprice ? moneyVND(maxprice) : "∞"}`
          : "";
      info.textContent = `${total} sản phẩm${q ? ` • từ khóa: "${q}"` : ""}${category!=="all" ? ` • loại: ${category}` : ""}${priceText}`;
    }

    // vẽ phân trang giữ nguyên tiêu chí
    const pag = $(".pagination-list");
    if (pag) {
      const buildHref = (p) => {
        const params = new URLSearchParams();
        if (q) params.set("q", q);
        if (category && category !== "all") params.set("category", category);
        if (minprice !== null) params.set("minprice", String(minprice));
        if (maxprice !== null) params.set("maxprice", String(maxprice));
        params.set("page", String(p));
        return `?${params.toString()}`;
      };
      const li = (label, p, active=false, disabled=false) =>
        active
          ? `<li class="page-item active"><span class="page-link">${label}</span></li>`
          : `<li class="page-item${disabled?' disabled':''}"><a class="page-link" href="${buildHref(p)}">${label}</a></li>`;

      let html = "";
      html += li("«", Math.max(1, cur-1), false, cur===1);
      for (let i=1;i<=totalPages;i++) html += li(String(i), i, i===cur);
      html += li("»", Math.min(totalPages, cur+1), false, cur===totalPages);
      pag.innerHTML = html;

      // chặn reload & render lại mượt
      pag.addEventListener("click", function(e){
        const a = e.target.closest("a.page-link");
        if (!a) return;
        e.preventDefault();
        const u = new URL(a.href, location.origin);
        const next = Number(u.searchParams.get("page") || "1");
        setQuery(Object.fromEntries(u.searchParams.entries()));
        render(all, next, pageSize);
        window.scrollTo({ top: 0, behavior: "smooth" });
      }, { once:true });
    }
  }

  function boot() {
    const all = getAllProducts();

    // nạp tham số lên form (để người dùng thấy lại tiêu chí đã chọn)
    const form = $("#searchForm");
    if (form) {
      form.q.value = getQuery("q","");
      if (form.category) form.category.value = getQuery("category","all") || "all";
      if (form.minprice) form.minprice.value = getQuery("minprice","");
      if (form.maxprice) form.maxprice.value = getQuery("maxprice","");

      form.addEventListener("submit", (e)=>{
        e.preventDefault();
        const q        = (form.q.value || "").trim();
        const category = form.category ? form.category.value : "all";
        const minprice = form.minprice && form.minprice.value ? Number(form.minprice.value) : null;
        const maxprice = form.maxprice && form.maxprice.value ? Number(form.maxprice.value) : null;

        // cập nhật URL + render lại từ trang 1
        setQuery({
          q: q || null,
          category: category || "all",
          minprice: minprice != null ? String(minprice) : null,
          maxprice: maxprice != null ? String(maxprice) : null,
          page: "1"
        });
        render(all, 1, PAGE_SIZE);
      });
    }

    const page = Number(getQuery("page","1")) || 1;
    render(all, page, PAGE_SIZE);
  }

  if (document.readyState === "loading") document.addEventListener("DOMContentLoaded", boot);
  else boot();
})();
