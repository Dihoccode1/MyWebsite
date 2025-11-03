// --- Active item in sidebar ---
const navItems = document.querySelectorAll(".navagation li");
navItems.forEach((li) => {
  li.addEventListener("click", () => {
    navItems.forEach((x) => x.classList.remove("hovered"));
    li.classList.add("hovered");
  });
});

// --- Menu toggle ---
const toggleBtn = document.querySelector(".toggle");
const nav = document.querySelector(".navagation");
const main = document.querySelector(".main");

if (toggleBtn && nav && main) {
  toggleBtn.addEventListener("click", () => {
    nav.classList.toggle("active");
    main.classList.toggle("active");
  });
}

// KHÔNG đụng tới .topbar .search nữa
