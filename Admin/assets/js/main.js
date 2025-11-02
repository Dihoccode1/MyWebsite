// 1. Logic chuyển đổi nội dung và active link
document.addEventListener("DOMContentLoaded", function () {
  // Lấy các mục điều hướng
  const navItems = document.querySelectorAll(".navagation li");

  // Lấy các khối nội dung
  const dashboardContent = document.getElementById("dashboard-content");
  const customersContent = document.getElementById("customers-content");
  // (Thêm các khối nội dung khác ở đây, ví dụ: const productsContent = ...)

  // Hàm ẩn tất cả các khối nội dung
  function hideAllContent() {
    if (dashboardContent) dashboardContent.style.display = "none";
    if (customersContent) customersContent.style.display = "none";
    // (Thêm các khối nội dung khác ở đây)
  }

  // Hàm xử lý khi click vào mục điều hướng
  function handleNavClick(e) {
    // Ngăn thẻ <a> chuyển trang (vì chúng ta dùng href="#")
    if (e.target.closest("a")) {
      e.preventDefault();
    }

    // Xử lý class 'hovered'
    navItems.forEach((item) => {
      item.classList.remove("hovered");
    });
    this.classList.add("hovered"); // 'this' là <li> được click

    // Ẩn tất cả nội dung
    hideAllContent();

    // Hiển thị nội dung tương ứng dựa trên ID của <li>
    switch (this.id) {
      case "nav-dashboard":
        if (dashboardContent) dashboardContent.style.display = "block";
        break;
      case "nav-customers":
        if (customersContent) customersContent.style.display = "block";
        break;
      // Thêm các case khác sau này (ví dụ: "nav-products")
    }
  }

  // THAY ĐỔI: Dùng 'click' thay vì 'mouseover'
  navItems.forEach((item) => {
    // Bỏ qua mục logo đầu tiên
    if (
      item.querySelector("a").getAttribute("href") !== "./Customers/index.html"
    ) {
      item.addEventListener("click", handleNavClick);
    }
  });

  // 2. Menu Toggle (Giữ nguyên logic của bạn, đã sửa lỗi '}' thừa)
  let toggle = document.querySelector(".toggle");
  let navagation = document.querySelector(".navagation");
  let main = document.querySelector(".main");

  toggle.onclick = function () {
    navagation.classList.toggle("active");
    main.classList.toggle("active");
  };
  // Lỗi '}' thừa đã được xóa

  // 3. Logic cho các nút (Reset MK, Khóa, Mở khóa) - Dùng Event Delegation
  const mainContent = document.querySelector(".main");

  mainContent.addEventListener("click", function (e) {
    // Xử lý nút Khóa / Mở khóa
    if (
      e.target.classList.contains("btn-lock") ||
      e.target.classList.contains("btn-unlock")
    ) {
      e.preventDefault();

      let button = e.target;
      let row = button.closest("tr");
      let statusSpan = row.querySelector(".status");

      if (button.classList.contains("btn-lock")) {
        statusSpan.textContent = "Đã khóa";
        statusSpan.classList.remove("delivered");
        statusSpan.classList.add("returned"); // Dùng style 'returned' (màu đỏ)

        button.textContent = "Mở khóa";
        button.classList.remove("btn-lock");
        button.classList.add("btn-unlock");
      } else {
        statusSpan.textContent = "Hoạt động";
        statusSpan.classList.remove("returned");
        statusSpan.classList.add("delivered"); // Dùng style 'delivered' (màu xanh)

        button.textContent = "Khóa";
        button.classList.remove("btn-unlock");
        button.classList.add("btn-lock");
      }
    }

    // Xử lý nút Reset Mật khẩu
    if (e.target.classList.contains("btn-reset")) {
      e.preventDefault();
      let row = e.target.closest("tr");
      let customerName = row.cells[0].textContent; // Lấy tên từ ô đầu
      if (confirm(`Bạn có chắc muốn reset mật khẩu cho ${customerName}?`)) {
        alert("Đã gửi yêu cầu reset mật khẩu!");
      }
    }
  });
});
