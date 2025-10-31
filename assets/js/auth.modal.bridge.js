
// ===== CẦU NỐI AUTH <-> MODAL (dán sau khi đã <script src="/assets/js/auth.js"></script>) =====

// Lưu hồ sơ mở rộng theo email (username/phone/address)
function saveProfileExtra(email, extra) {   
  localStorage.setItem('bs_profile:' + email.toLowerCase(), JSON.stringify(extra||{}));
}
function loadProfileExtra(email) {
  try { return JSON.parse(localStorage.getItem('bs_profile:' + (email||'').toLowerCase())||'{}'); } catch { return {}; }
}
// Map username -> email để hỗ trợ đăng nhập bằng username
function mapUsername(username, email) {
  if (!username || !email) return;
  localStorage.setItem('bs_u2e:' + username.toLowerCase(), email.toLowerCase());
}
function usernameToEmail(username) {
  if (!username) return '';
  return localStorage.getItem('bs_u2e:' + username.toLowerCase()) || '';
}

// ===== THAY THẾ HÀM CŨ BẰNG PHIÊN BẢN DÙNG AUTH =====

// Mở modal profile: lấy từ AUTH + profile extra
function openProfileModal() {
  if (!window.AUTH?.loggedIn) { openLoginModal(); return; }

  const u = AUTH.user;                      // {name, email}
  const extra = loadProfileExtra(u.email);  // {username, phone, address}

  document.getElementById('profile-fullname')        && (document.getElementById('profile-fullname').textContent = 'Xin chào, ' + (u.name||'') + '!');
  document.getElementById('profile-name-value')      && (document.getElementById('profile-name-value').textContent = u.name||'');
  document.getElementById('profile-username-value')  && (document.getElementById('profile-username-value').textContent = extra.username||'');
  document.getElementById('profile-email-value')     && (document.getElementById('profile-email-value').textContent = u.email||'');
  document.getElementById('profile-phone-value')     && (document.getElementById('profile-phone-value').textContent = extra.phone||'');
  document.getElementById('profile-address-value')   && (document.getElementById('profile-address-value').textContent = extra.address||'');

  document.getElementById('profileModal')?.classList.add('show');
  document.body.style.overflow = 'hidden';
}
function closeProfileModal() {
  document.getElementById('profileModal')?.classList.remove('show');
  document.body.style.overflow = 'auto';
}

// Đăng nhập bằng email **hoặc** username
function handleLogin(e) {
  e.preventDefault();
  clearFormErrors();

  const userOrEmail = (document.getElementById('login-username')?.value || '').trim();
  const password    = (document.getElementById('login-password')?.value || '');

  let hasError = false;
  if (!userOrEmail) { document.getElementById('error-login-username')?.append('Vui lòng nhập tài khoản/email'); hasError = true; }
  if (!password)    { document.getElementById('error-login-password')?.append('Vui lòng nhập mật khẩu'); hasError = true; }
  if (hasError) return;

  // Nếu nhập username, tra email từ map
  const email = userOrEmail.includes('@') ? userOrEmail : usernameToEmail(userOrEmail);
  if (!email) { document.getElementById('error-login-username')?.append('Tài khoản không tồn tại'); return; }

  try {
    AUTH.login(email, password);  // dùng AUTH làm nguồn sự thật
    AUTH.check();
    closeLoginModal();
    updateAuthUI();
    alert('Đăng nhập thành công!');
    // Nếu có redirect trên URL thì quay về
    const usp = new URLSearchParams(location.search);
    const red = usp.get('redirect');
    if (red) location.href = red; else location.reload();
  } catch (err) {
    document.getElementById('error-login-password')?.append(err?.message || 'Đăng nhập thất bại');
  }
}

// Đăng ký: gọi AUTH.register(name, email, pass) + lưu extra (username/phone/address) + map username->email
function handleRegister(e) {
  e.preventDefault();
  clearFormErrors();

  const fullName = (document.getElementById('reg-fullname')?.value || '').trim();
  const username = (document.getElementById('reg-username')?.value || '').trim();
  const password = (document.getElementById('reg-password')?.value || '');
  const confirm  = (document.getElementById('reg-confirm-password')?.value || '');
  const email    = (document.getElementById('reg-email')?.value || '').trim();
  const phone    = (document.getElementById('reg-phone')?.value || '').trim();
  const address  = (document.getElementById('reg-address')?.value || '').trim();

  // ——— validations y như bạn đang làm ———
  let ok = true;
  const vEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const vPhone = /^[0-9]{10}$/;

  if (!fullName) { document.getElementById('error-fullname')?.append('Vui lòng nhập họ tên'); ok = false; }
  if (!username) { document.getElementById('error-username')?.append('Vui lòng nhập tài khoản'); ok = false; }
  else if (username.length < 4) { document.getElementById('error-username')?.append('Tài khoản phải ≥ 4 ký tự'); ok = false; }

  if (!password) { document.getElementById('error-password')?.append('Vui lòng nhập mật khẩu'); ok = false; }
  else if (password.length < 6) { document.getElementById('error-password')?.append('Mật khẩu phải ≥ 6 ký tự'); ok = false; }

  if (password !== confirm) { document.getElementById('error-confirm-password')?.append('Mật khẩu không khớp'); ok = false; }

  if (!email) { document.getElementById('error-email')?.append('Vui lòng nhập email'); ok = false; }
  else if (!vEmail.test(email)) { document.getElementById('error-email')?.append('Email không hợp lệ'); ok = false; }

  if (!phone) { document.getElementById('error-phone')?.append('Vui lòng nhập số điện thoại'); ok = false; }
  else if (!vPhone.test(phone.replace(/\s/g,''))) { document.getElementById('error-phone')?.append('Số điện thoại phải 10 chữ số'); ok = false; }

  if (!address) { document.getElementById('error-address')?.append('Vui lòng nhập địa chỉ'); ok = false; }

  if (!ok) return;

  try {
    // Tạo tài khoản trong AUTH (sẽ auto-login)
    AUTH.register(fullName, email, password);
    AUTH.check();

    // Lưu extra + map username->email để hỗ trợ login = username
    saveProfileExtra(email, { username, phone, address });
    mapUsername(username, email);

    closeRegisterModal();
    alert('Đăng ký thành công!');
    // Mở login hoặc reload ngay (đã login sẵn)
    updateAuthUI();
    location.reload();
  } catch (err) {
    // Lỗi: có thể do email đã tồn tại
    if (String(err?.message||'').toLowerCase().includes('email')) {
      document.getElementById('error-email')?.append(err.message);
    } else {
      document.getElementById('error-username')?.append(err?.message || 'Đăng ký thất bại');
    }
  }
}

// Đăng xuất
function handleLogoutModal() {
  if (!confirm('Bạn có chắc muốn đăng xuất?')) return;
  // Xoá trạng thái đăng nhập AUTH
  AUTH.logout();
  AUTH.check();
  // Đóng modal (nếu đang mở)
  closeProfileModal();
  updateAuthUI();
  location.reload();
}

// Cập nhật khu vực authArea của bạn dựa theo AUTH + profile extra
function updateAuthUI() {
  const box = document.getElementById('authArea');
  if (!box) return;

  if (window.AUTH?.loggedIn) {
    const u = AUTH.user;
    const extra = loadProfileExtra(u.email);
    const displayName = u.name || extra.username || u.email;

    box.innerHTML = `
      <div class="user-profile-dropdown">
        <button class="user-profile-btn" onclick="openProfileModal()">
          <span class="dropdown-icon">👤</span>
          <span>${displayName}</span>
          <span class="user-dropdown-icon">▼</span>
        </button>
        <ul class="user-dropdown-menu">
          <li><a href="#" onclick="event.preventDefault();openProfileModal();">Thông tin cá nhân</a></li>
          <li><a href="#" onclick="event.preventDefault();alert('Demo: Lịch sử mua hàng');">Lịch sử mua hàng</a></li>
          <li class="user-submenu">
            <div class="dropdown-item">Tùy chọn</div>
            <ul class="user-submenu-content">
              <li><a href="#" onclick="event.preventDefault();alert('Demo: Sửa thông tin');">Sửa thông tin cá nhân</a></li>
              <li><a href="#" onclick="event.preventDefault();alert('Demo: Đổi mật khẩu');">Đổi mật khẩu</a></li>
            </ul>
          </li>
          <li><a href="#" class="logout-link" onclick="event.preventDefault();handleLogoutModal();">Đăng xuất</a></li>
        </ul>
      </div>`;
  } else {
    box.innerHTML = `
      <button class="btn-auth" onclick="openLoginModal()">Đăng nhập</button>
      <button class="btn-auth btn-signup" onclick="openRegisterModal()">Đăng ký</button>`;
  }
}

// Tự cập nhật khi AUTH sẵn sàng / thay đổi
document.addEventListener('auth:ready', updateAuthUI);
document.addEventListener('auth:changed', updateAuthUI);
// Trường hợp script được nạp sau DOMContentLoaded
if (document.readyState !== 'loading') { updateAuthUI(); }

