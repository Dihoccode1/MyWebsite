<?php /* account/profile.php */ ?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Thông tin tài khoản</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<?php include __DIR__ . '/../partials/header.php'; ?>

<div class="container py-5">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title mb-4">Thông tin tài khoản</h3>
          <div id="profileInfo">
            <p>Đang tải...</p>
          </div>
          <hr>
          <a href="/giohang.php" class="btn btn-primary">Giỏ hàng của tôi</a>
          <a href="#" data-logout class="btn btn-outline-danger">Đăng xuất</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>

<script src="/assets/js/auth.js"></script>

<script>
// Hàm mới: Dùng để lấy thông tin phụ (SĐT, địa chỉ) từ localStorage
function getExtraProfile(email) {
  if (!email) return {};
  try {
    const KEY = 'sv_profiles_v1';
    const allProfiles = JSON.parse(localStorage.getItem(KEY) || '{}');
    // Trả về hồ sơ của đúng email đang đăng nhập
    return allProfiles[email.toLowerCase()] || {};
  } catch (e) {
    console.error("Lỗi khi đọc dữ liệu hồ sơ:", e);
    return {};
  }
}

// Hàm render được cập nhật
function renderProfile() {
  const info = document.getElementById('profileInfo');
  
  if (window.AUTH?.loggedIn && window.AUTH.user) {
    const u = window.AUTH.user;
    // Lấy thêm thông tin từ 'sv_profiles_v1'
    const extraInfo = getExtraProfile(u.email);

    info.innerHTML = `
      <dl class="row">
        <dt class="col-sm-4">Họ tên:</dt>
        <dd class="col-sm-8"><strong>${u.name || '—'}</strong></dd>
        
        <dt class="col-sm-4">Email:</dt>
        <dd class="col-sm-8">${u.email || '—'}</dd>
        
        <dt class="col-sm-4">Số điện thoại:</dt>
        <dd class="col-sm-8">${extraInfo.phone || 'Chưa cập nhật'}</dd>
        
        <dt class="col-sm-4">Địa chỉ:</dt>
        <dd class="col-sm-8">${extraInfo.address || 'Chưa cập nhật'}</dd>
      </dl>
    `;
  } else {
    info.innerHTML = '<p class="text-danger">Bạn chưa đăng nhập. <a href="/account/login.php">Đăng nhập ngay</a></p>';
  }
}

// Lắng nghe sự kiện từ auth.js để biết khi nào kiểm tra xong
document.addEventListener('auth:ready', renderProfile);

// Đề phòng trường hợp auth.js đã chạy xong trước, gọi hàm luôn
if (window.AUTH && window.AUTH.ready) {
  renderProfile();
}
// Sau khi đăng ký thành công:
const nameForWelcome = encodeURIComponent(name || 'bạn');
location.href = '/trangchu.php?welcome=' + nameForWelcome;
</script>


</body>
</html>