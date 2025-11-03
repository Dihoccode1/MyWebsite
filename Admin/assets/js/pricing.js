/*
  pricing.js – Quản lý giá bán:
  - Hiển thị & tra cứu cost, margin, price
  - Sửa nhanh % margin từng dòng hoặc hàng loạt (auto tính lại price)
  - Cho phép sửa trực tiếp price (auto suy ra margin)
  - Lưu về sv_products_v1 (+ SV_PRODUCTS cho storefront)
*/

(function(){
  const LS_CATS = 'sv_categories_v1';
  const LS_PRODS = 'sv_products_v1';
  const LS_PRODS_COMP = 'SV_PRODUCTS';

  const $  = s => document.querySelector(s);
  const $$ = s => Array.from(document.querySelectorAll(s));
  const fmt = n => Number(n||0).toLocaleString('vi-VN');
  const loadJSON = (k,d)=>{ try{ return JSON.parse(localStorage.getItem(k)||JSON.stringify(d)); }catch{ return d; } };
  const saveJSON = (k,v)=> localStorage.setItem(k, JSON.stringify(v));
  const toast = m => alert(m);

  const state = {
    cats: [],
    prods: [],
    query: '',
    filterCat: '',
    filterStatus: ''
  };

  const elQ = $('#q');
  const elCat = $('#filter-cat');
  const elStatus = $('#filter-status');
  const elTbody = $('#tbody');
  const elBulk = $('#bulk-margin');
  const elSummary = $('#summary');

  function loadAll(){
    state.cats  = loadJSON(LS_CATS, []);
    state.prods = loadJSON(LS_PRODS, []);
  }

  function saveProds(list){
    saveJSON(LS_PRODS, list);
    saveJSON(LS_PRODS_COMP, list);
    state.prods = list;
  }

  function fillFilters(){
    elCat.innerHTML = ['<option value="">— tất cả loại —</option>']
      .concat(state.cats.map(c=>`<option value="${c.id}">${escapeHtml(c.name||'')}</option>`))
      .join('');
  }

  function escapeHtml(s){ return String(s||'').replace(/[&<>"']/g, m=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;'}[m])); }

  function calcPrice(cost, margin){
    return Math.round(Number(cost||0) * (1 + Number(margin||0)/100));
  }
  function calcMargin(cost, price){
    cost = Number(cost||0); price = Number(price||0);
    if(cost<=0) return 0;
    return Math.round(((price/cost)-1)*1000)/10; // 1 decimal
  }

  function render(){
    let rows = state.prods.slice();
    const q = (state.query||'').toLowerCase();

    if(q){
      rows = rows.filter(p => [p.code,p.name,p.supplier].some(x=>String(x||'').toLowerCase().includes(q)));
    }
    if(state.filterCat){ rows = rows.filter(p => p.categoryId===state.filterCat); }
    if(state.filterStatus){ rows = rows.filter(p => (p.status||'selling')===state.filterStatus); }

    // summary
    const sumCost = rows.reduce((t,p)=>t+Number(p.cost||0),0);
    const sumPrice= rows.reduce((t,p)=>t+Number(p.price||0),0);
    elSummary.textContent = `Hiển thị ${rows.length} sp • Tổng giá vốn: ${fmt(sumCost)} đ • Tổng giá bán: ${fmt(sumPrice)} đ`;

    if(!rows.length){
      elTbody.innerHTML = `<tr><td colspan="10" style="text-align:center;color:#9aa3ad;padding:14px">Không có dữ liệu</td></tr>`;
      return;
    }

    elTbody.innerHTML = rows.map((p,i)=>{
      const catName = state.cats.find(c=>c.id===p.categoryId)?.name || '—';
      const price = Number(p.price ?? 0);
      const margin = (p.margin!=null && p.margin!=='') ? Number(p.margin) : calcMargin(p.cost, price);
      const statusClass = (p.status==='selling')?'active':(p.status==='stopped'?'stopped':'hidden');
      const statusText  = (p.status==='selling')?'Đang bán':(p.status==='stopped'?'Hết bán':'Ẩn');

      return `<tr data-id="${p.id}">
        <td>${i+1}</td>
        <td><code>${escapeHtml(p.code||'')}</code></td>
        <td><strong>${escapeHtml(p.name||'')}</strong></td>
        <td>${escapeHtml(catName)}</td>

        <td class="num">
          <div class="cell-input">
            <input type="number" step="1" min="0" class="inp-cost" value="${Number(p.cost||0)}" title="Giá vốn"/>
            <span class="small">đ</span>
          </div>
        </td>

        <td class="num">
          <div class="cell-input">
            <input type="number" step="0.1" class="inp-margin" value="${margin}" title="% lợi nhuận"/>
            <span class="small">%</span>
          </div>
        </td>

        <td class="num">
          <div class="cell-input">
            <input type="number" step="1" min="0" class="inp-price" value="${price}" title="Giá bán"/>
            <span class="small">đ</span>
          </div>
        </td>

        <td>${escapeHtml(p.supplier||'')}</td>
        <td><span class="status ${statusClass}">${statusText}</span></td>
        <td>
          <button class="btn btn-row-save"><i class="fa-solid fa-floppy-disk"></i> Lưu</button>
        </td>
      </tr>`;
    }).join('');

    bindRowHandlers();
  }

  function bindRowHandlers(){
    // live calc: khi đổi margin → calc price; khi đổi price → calc margin
    $$('#tbody tr').forEach(tr=>{
      const costI   = tr.querySelector('.inp-cost');
      const marginI = tr.querySelector('.inp-margin');
      const priceI  = tr.querySelector('.inp-price');

      marginI.addEventListener('input', ()=>{
        priceI.value = calcPrice(costI.value, marginI.value);
      });
      costI.addEventListener('input', ()=>{
        priceI.value = calcPrice(costI.value, marginI.value);
      });
      priceI.addEventListener('input', ()=>{
        marginI.value = calcMargin(costI.value, priceI.value);
      });

      tr.querySelector('.btn-row-save').addEventListener('click', ()=>{
        persistRow(tr);
      });
    });
  }

  function persistRow(tr){
    const id = tr.getAttribute('data-id');
    const cost   = Number(tr.querySelector('.inp-cost').value||0);
    const margin = Number(tr.querySelector('.inp-margin').value||0);
    const price  = Number(tr.querySelector('.inp-price').value||0);

    const list = loadJSON(LS_PRODS, []);
    const ix = list.findIndex(x=>x.id===id);
    if(ix<0) return;

    list[ix].cost = cost;
    list[ix].margin = margin;
    list[ix].price = price;
    list[ix].updatedAt = new Date().toISOString();

    saveProds(list);
    toast('Đã lưu giá');
  }

  // bulk apply margin to current filtered rows
  function applyBulk(){
    const v = Number(elBulk.value);
    if(isNaN(v)) return toast('Nhập % lợi nhuận hợp lệ');
    let changed = 0;
    const list = loadJSON(LS_PRODS, []);
    list.forEach(p=>{
      if(state.filterCat && p.categoryId!==state.filterCat) return;
      if(state.filterStatus && (p.status||'selling')!==state.filterStatus) return;
      if(state.query){
        const q = state.query.toLowerCase();
        const hit = [p.code,p.name,p.supplier].some(x=>String(x||'').toLowerCase().includes(q));
        if(!hit) return;
      }
      p.margin = v;
      p.price = calcPrice(p.cost, v);
      p.updatedAt = new Date().toISOString();
      changed++;
    });
    saveProds(list);
    toast('Đã áp dụng cho '+changed+' sản phẩm');
    render();
  }

  // recalc all current filtered rows using cost & margin
  function recalcFiltered(){
    const list = loadJSON(LS_PRODS, []);
    let changed = 0;
    list.forEach(p=>{
      if(state.filterCat && p.categoryId!==state.filterCat) return;
      if(state.filterStatus && (p.status||'selling')!==state.filterStatus) return;
      if(state.query){
        const q = state.query.toLowerCase();
        const hit = [p.code,p.name,p.supplier].some(x=>String(x||'').toLowerCase().includes(q));
        if(!hit) return;
      }
      const newPrice = calcPrice(p.cost, (p.margin!=null?p.margin:calcMargin(p.cost,p.price)));
      if(Number(p.price||0)!==newPrice){
        p.price = newPrice;
        p.updatedAt = new Date().toISOString();
        changed++;
      }
    });
    saveProds(list);
    toast('Đã tính lại '+changed+' sản phẩm');
    render();
  }

  function saveAllVisible(){
    // đọc từ bảng -> ghi về list
    const list = loadJSON(LS_PRODS, []);
    let changed = 0;
    $$('#tbody tr').forEach(tr=>{
      const id = tr.getAttribute('data-id');
      const ix = list.findIndex(x=>x.id===id);
      if(ix<0) return;
      const cost   = Number(tr.querySelector('.inp-cost').value||0);
      const margin = Number(tr.querySelector('.inp-margin').value||0);
      const price  = Number(tr.querySelector('.inp-price').value||0);
      const before = JSON.stringify({c:list[ix].cost,m:list[ix].margin,p:list[ix].price});
      Object.assign(list[ix], {cost:cost, margin:margin, price:price, updatedAt:new Date().toISOString()});
      const after = JSON.stringify({c:list[ix].cost,m:list[ix].margin,p:list[ix].price});
      if(before!==after) changed++;
    });
    saveProds(list);
    toast('Đã lưu '+changed+' sản phẩm đang hiển thị');
    render();
  }

  // events
  elQ.addEventListener('input', ()=>{ state.query=elQ.value; render(); });
  elCat.addEventListener('change', ()=>{ state.filterCat=elCat.value; render(); });
  elStatus.addEventListener('change', ()=>{ state.filterStatus=elStatus.value; render(); });
  $('#btn-apply-bulk').addEventListener('click', applyBulk);
  $('#btn-recalc').addEventListener('click', recalcFiltered);
  $('#btn-save-all').addEventListener('click', saveAllVisible);

  // init
  (function init(){
    loadAll();
    fillFilters();
    render();
  })();
})();
