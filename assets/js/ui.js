document.addEventListener('DOMContentLoaded', () => {
  // ----- DOM -----
  const grid = document.getElementById('product-grid');
  const pagination = document.getElementById('pagination');
  const form = document.getElementById('searchForm');
  const q = document.getElementById('q');
  const category = document.getElementById('category');
  const priceMin = document.getElementById('priceMin');
  const priceMax = document.getElementById('priceMax');
  const sort = document.getElementById('sort');

  // Đọc cờ featured từ hidden input (nếu có)
  const featuredFlag = document.getElementById('featuredFlag');
  const featured = featuredFlag && featuredFlag.value === '1' ? true : null;

  // ----- STATE -----
  const state = {
    q: '', category: 'all',
    minPrice: '', maxPrice: '',
    sort: '',
    page: 1,
    perPage: 8,     // để dễ thấy phân trang
    featured        // true => chỉ nổi bật; null => tất cả
  };

  // ----- RENDER CARD -----
  function cardHTML(p) {
    const badge = SVStore.normalizeBadge(p);
    const price = SVStore.fmtVND(p.price);
    const original = p.original_price ? SVStore.fmtVND(p.original_price) : '';

    const badgeHTML = badge === 'sale' ? `<span class="product-badge badge-sale">Sale</span>`
                      : badge === 'out_of_stock' ? `<span class="product-badge badge-out-of-stock">Hết hàng</span>`
                      : badge === 'new' ? `<span class="product-badge badge-sale">Mới</span>` : '';

    const originalHTML = original ? `<span class="original-price">${original}</span>` : '';

    return `
      <div class="col-6 col-md-4 col-lg-3">
        <div class="product-item">
          <a href="#">
            <div class="product-image">
              ${badgeHTML}
              <img src="${p.image}" alt="${p.name}" />
            </div>
            <div class="product-name">${p.name}</div>
            <div class="product-price">
              <span class="sale-price">${price}</span>
              ${originalHTML}
            </div>
          </a>
        </div>
      </div>`;
  }

  // ----- BUILD PAGINATION -----
  function buildPagination(pages, current) {
    if (pages <= 1) return '';
    let html = '';

    if (current > 1) {
      html += `<li class="page-item"><a class="page-link" data-page="${current-1}" href="#">&larr;</a></li>`;
    }
    for (let i = 1; i <= pages; i++) {
      html += `
        <li class="page-item ${i === current ? 'active' : ''}">
          <a class="page-link" data-page="${i}" href="#">${i}</a>
        </li>`;
    }
    if (current < pages) {
      html += `<li class="page-item"><a class="page-link" data-page="${current+1}" href="#">&rarr;</a></li>`;
    }
    return html;
  }

  // ----- RENDER ALL -----
  function render() {
    const res = SVStore.query(state); // { items, total, pages, page }

    // Grid
    grid.innerHTML = res.items.map(cardHTML).join('');

    // Pagination
    pagination.innerHTML = buildPagination(res.pages, res.page);
  }

  // ----- EVENTS -----
  pagination.addEventListener('click', (e) => {
    const a = e.target.closest('a.page-link');
    if (!a) return;
    e.preventDefault();
    state.page = Number(a.dataset.page) || 1;
    render();
  });

  form?.addEventListener('submit', (e) => {
    e.preventDefault();
    state.q = (q?.value || '').trim();
    state.category = category?.value || 'all';
    state.minPrice = priceMin?.value || '';
    state.maxPrice = priceMax?.value || '';
    state.sort = sort?.value || '';
    state.page = 1; // reset về trang 1 mỗi lần tìm kiếm
    render();
  });

  // ----- FIRST RENDER -----
  render();
});