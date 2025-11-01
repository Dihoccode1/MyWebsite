// ===== CẦU NỐI AUTH <-> UI (KHÔNG MODAL) =====
(function(w, d) {
  'use strict';

  function escapeHtml(s) {
    return String(s || '').replace(/[&<>"']/g, m => ({
      '&':'&amp;', '<':'&lt;', '>':'&gt;', '"':'&quot;', "'":"&#39;"
    }[m]));
  }

  function updateAuthUI() {
    const topbarRight = d.querySelector('.topbar-right');
    if (!topbarRight) return;
    
    if (w.AUTH?.loggedIn && w.AUTH.user) {
      const user = w.AUTH.user;
      const displayName = user.name || user.email || 'User';

      // --- KHI ĐÃ ĐĂNG NHẬP ---
      // Tạo HTML mới với class 'welcome-user'
      topbarRight.innerHTML = `
        <div class="welcome-user">
            <span>Chào mừng,</span>
            <a href="/account/profile.php">${escapeHtml(displayName)}</a>
            <span>!</span>
        </div>
        <a href="#" data-logout class="btn btn-primary">ĐĂNG XUẤT</a>
      `;

    } else {
      // --- KHI CHƯA ĐĂNG NHẬP ---
      topbarRight.innerHTML = `
        <a href="/account/register.php" class="btn btn-outline">ĐĂNG KÝ</a>
        <a href="/account/login.php" class="btn btn-primary">ĐĂNG NHẬP</a>
      `;
    }
    updateCartBadge();
  }

  function updateCartBadge() {
    const badges = d.querySelectorAll('.cart-count, #cartCount');
    const count = w.SVStore?.count?.() || 0;
    badges.forEach(el => {
      if (el) el.textContent = count;
    });
  }

  d.addEventListener('click', function(e) {
    const logoutBtn = e.target.closest('[data-logout]');
    if (!logoutBtn) return;
    e.preventDefault();
    if (confirm('Bạn có chắc muốn đăng xuất?')) {
      w.AUTH?.logout?.();
    }
  });

  d.addEventListener('auth:ready', updateAuthUI);
  d.addEventListener('auth:changed', updateAuthUI);
  d.addEventListener('cart:changed', updateCartBadge);
  w.addEventListener('storage', (e) => {
    if (e.key && e.key.startsWith('sv_cart_user_')) {
      updateCartBadge();
    }
  });

  if (d.readyState !== 'loading') {
    w.AUTH?.check?.();
  } else {
    d.addEventListener('DOMContentLoaded', () => w.AUTH?.check?.());
  }
})(window, document);