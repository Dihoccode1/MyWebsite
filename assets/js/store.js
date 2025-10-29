// /assets/js/store.js
(function (w) {
  // ===== Helpers =====
  const fmtVND = n =>
    (n || n === 0) ? Number(n).toLocaleString('vi-VN') + '₫' : '';

  const toNumber = v =>
    typeof v === 'number' ? v : Number(String(v).replace(/[^\d]/g, '')) || 0;

  const clampNonNegative = n => {
    const x = toNumber(n);
    return x < 0 ? 0 : x;
  };

  function normalizeBadge(p) {
    if (!p || !p.badge) return '';
    const b = String(p.badge).toLowerCase().trim();
    const map = { sale: 'sale', new: 'new', oos: 'out_of_stock', out_of_stock: 'out_of_stock' };
    return map[b] || '';
  }

  function getAllProducts() {
    try {
      const saved = localStorage.getItem('SV_PRODUCTS');
      if (saved) return JSON.parse(saved);
    } catch (_) {}
    return w.SV_PRODUCT_SEED || [];
  }

  function filterProducts(list, { q, category, minPrice, maxPrice }) {
    let rs = list.slice();
    if (q && String(q).trim()) {
      const kw = String(q).trim().toLowerCase();
      rs = rs.filter(p => (p.name || '').toLowerCase().includes(kw));
    }
    if (category && category !== 'all') {
      const c = String(category).toLowerCase();
      rs = rs.filter(p => (p.category || '').toLowerCase() === c);
    }
    if (minPrice != null && String(minPrice).trim() !== '') {
      const min = clampNonNegative(minPrice);
      rs = rs.filter(p => toNumber(p.price) >= min);
    }
    if (maxPrice != null && String(maxPrice).trim() !== '') {
      const max = clampNonNegative(maxPrice);
      rs = rs.filter(p => toNumber(p.price) <= max);
    }
    return rs;
  }

  function sortProducts(list, sort) {
    if (!sort) return list;
    const [key, dir] = String(sort).split('-');
    const dirN = dir === 'desc' ? -1 : 1;
    return list.slice().sort((a, b) => {
      if (key === 'price') return (toNumber(a.price) - toNumber(b.price)) * dirN;
      if (key === 'name')  return String(a.name).localeCompare(String(b.name), 'vi') * dirN;
      return 0;
    });
  }

  function paginate(list, page = 1, perPage = 12) {
    const total = list.length;
    const pages = Math.max(1, Math.ceil(total / perPage));
    const cur = Math.min(Math.max(1, Number(page) || 1), pages);
    const start = (cur - 1) * perPage;
    const end = start + perPage;
    return { items: list.slice(start, end), total, pages, page: cur, perPage };
  }

  // ===== Cart (localStorage) =====
  const CART_KEY = 'sv_cart_v1';
  const getCart = () => {
    try { return JSON.parse(localStorage.getItem(CART_KEY) || '[]'); }
    catch { return []; }
  };
  const saveCart = (cart) => localStorage.setItem(CART_KEY, JSON.stringify(cart));

  function addToCart(id, qty = 1) {
    qty = clampNonNegative(qty) || 1;
    const cart = getCart();
    const i = cart.findIndex(x => x.id === id);
    if (i > -1) cart[i].qty += qty;
    else cart.push({ id, qty });
    saveCart(cart);
    return cart;
  }

  function setQty(id, qty) {
    qty = clampNonNegative(qty) || 1;
    const cart = getCart().map(x => x.id === id ? { ...x, qty } : x);
    saveCart(cart);
    return cart;
  }

  function removeFromCart(id) {
    const cart = getCart().filter(x => x.id !== id);
    saveCart(cart);
    return cart;
  }

  const clearCart = () => saveCart([]);

  const count = () => getCart().reduce((s, x) => s + (x.qty || 0), 0);

  function total(products = null) {
    const list = products || getAllProducts();
    const map = new Map(list.map(p => [p.id, p]));
    return getCart().reduce((s, x) => {
      const p = map.get(x.id);
      return s + (p ? toNumber(p.price) * (x.qty || 0) : 0);
    }, 0);
  }

  w.SVStore = {
    fmtVND, toNumber, normalizeBadge, getAllProducts,
    query(opts = {}) {
      const {
        q = '', category = 'all',
        minPrice = '', maxPrice = '',
        sort = '', page = 1, perPage = 12,
        featured = null
      } = opts;

      const base = getAllProducts();
      const baseByFeatured = base.filter(p =>
        featured === null ? true : (!!p.featured === !!featured)
      );
      const filtered = filterProducts(baseByFeatured, { q, category, minPrice, maxPrice });
      const sorted = sortProducts(filtered, sort);
      return paginate(sorted, page, perPage);
    },

    // Cart API
    getCart, addToCart, setQty, removeFromCart, clearCart, count, total
  };
})(window);
