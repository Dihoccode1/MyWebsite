// /admin/assets/js/admin.common.js
(function () {
  // 1) GUARD: chưa đăng nhập admin -> về login
  let u = null;
  try {
    u = JSON.parse(sessionStorage.getItem("session.user") || "null");
  } catch {}
  if (!u || u.role !== "admin") {
    location.replace("./login.html");
    return;
  }

  // 2) Lưu thông tin admin hiện tại (nếu trang khác cần xài)
  window.CURRENT_ADMIN = u;

  // 3) Khi DOM sẵn sàng: hiển thị tên + gắn nút Đăng xuất nếu có
  document.addEventListener("DOMContentLoaded", () => {
    const nameEl = document.getElementById("admin-username");
    if (nameEl) nameEl.textContent = u.username;

    const logoutBtn = document.getElementById("btn-logout");
    if (logoutBtn) {
      logoutBtn.addEventListener("click", (e) => {
        e.preventDefault();
        sessionStorage.removeItem("session.user");
        location.href = "./login.html";
      });
    }
  });
})();
