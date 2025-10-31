// ===== CẦU NỐI AUTH <-> UI (KHÔNG MODAL) =====
// Dán NGAY SAU <script src="/assets/js/auth.js"></script>

(function(w, d) {
  'use strict';

  // === Helpers ===
  function escapeHtml(s) {
    return String(s || '').replace(/[&<>"']/g, m => ({
      '&':'&amp;', '<':'&lt;', '>':'&gt;', '"':'&quot;', "'":"&#39;"
    }[m]));
  }

  // === Cập nhật khu vực auth ở header ===
  function updateAuthUI() {
    const chip = d.getElementById('auth-chip');
    const topbarRight = d.querySelector('.topbar-right');
    
    if (w.AUTH?.loggedIn && w.AUTH.user) {
      const user = w.AUTH.user;
      const displayName = user.name || user.email || 'User';

      // Cập nhật chip (nếu có)
      if (chip) {
        chip.innerHTML = `
          <span style="margin-right:8px">👤 Xin chào, <strong>${escapeHtml(displayName)}</strong></span>
          <a href="#" data-logout style="color:#dc3545;font-weight:600">Đăng xuất</a>
        `;
      }

      // Cập nhật topbar (nếu có)
      if (topbarRight) {
        topbarRight.innerHTML = `
          <span style="margin-right:10px;color:#333">
            Xin chào, <strong>${escapeHtml(displayName)}</strong>
          </span>
          <a href="/account/profile.php" class="btn btn-outline" style="margin-right:8px">
            Thông tin
          </a>
          <a href="#" data-logout class="btn btn-outline" style="color:#dc3545">
            Đăng xuất
          </a>
        `;
      }
    } else {
      // Chưa đăng nhập
      if (chip) {
        chip.innerHTML = `
          <a href="/account/login.php">Đăng nhập</a> / 
          <a href="/account/register.php">Đăng ký</a>
        `;
      }

      if (topbarRight) {
        topbarRight.innerHTML = `
          <a href="/account/register.php" class="btn btn-outline">ĐĂNG KÝ</a>
          <a href="/account/login.php" class="btn btn-primary">ĐĂNG NHẬP</a>
        `;
      }
    }

    // Cập nhật badge giỏ hàng luôn
    updateCartBadge();
  }

  // === Cập nhật số lượng giỏ hàng ===
  function updateCartBadge() {
    const badges = d.querySelectorAll('.cart-count, #cartCount');
    let count = 0;

    if (w.SVCart?.count) {
      count = w.SVCart.count();
    } else if (w.SVStore?.count) {
      count = w.SVStore.count();
    } else {
      try {
        const cart = JSON.parse(localStorage.getItem('sv_cart_v1') || '[]');
        count = cart.reduce((s, x) => s + (x.qty || 0), 0);
      } catch (_) {}
    }

    badges.forEach(el => {
      if (el) el.textContent = count;
    });
  }

  // === Xử lý logout ===
  d.addEventListener('click', function(e) {
    const logoutBtn = e.target.closest('[data-logout]');
    if (!logoutBtn) return;
    
    e.preventDefault();
    
    if (!confirm('Bạn có chắc muốn đăng xuất?')) return;
    
    if (w.AUTH?.logout) {
      w.AUTH.logout();
      w.AUTH.check();
    }
    
    updateAuthUI();
    
    // Reload để làm mới trạng thái
    setTimeout(() => location.reload(), 300);
  });

  // === Lắng nghe sự kiện AUTH ===
  d.addEventListener('auth:ready', updateAuthUI);
  d.addEventListener('auth:changed', updateAuthUI);
  d.addEventListener('cart:changed', updateCartBadge);

  // Đồng bộ giỏ từ tab khác
  w.addEventListener('storage', (e) => {
    if (e.key === 'sv_cart_v1') updateCartBadge();
  });

  // === Chạy ngay nếu script load sau DOMContentLoaded ===
  if (d.readyState !== 'loading') {
    w.AUTH?.check?.();
    updateAuthUI();
  } else {
    d.addEventListener('DOMContentLoaded', () => {
      w.AUTH?.check?.();
      updateAuthUI();
    });
  }

  // Expose cho các page khác dùng
  w.updateAuthUI = updateAuthUI;
  w.updateCartBadge = updateCartBadge;

})(window, document);