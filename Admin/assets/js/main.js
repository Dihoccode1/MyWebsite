// add hovered class to selected list item
let list = document.querySelectorAll(".navagation  li");
function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}
list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navagation = document.querySelector(".navagation");
let main = document.querySelector(".main");
toggle.onclick = function () {
  navagation.classList.toggle("active");
  main.classList.toggle("active");
};