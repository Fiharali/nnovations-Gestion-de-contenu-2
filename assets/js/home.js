// Add dark mode
let toggleButton = document.querySelector(".toggle");
let bodyEl = document.querySelector("body");

toggleButton.onclick = function () {
  bodyEl.classList.toggle("dark");
  toggleButton.classList.toggle("fa-solid");
  toggleButton.classList.toggle("fa-moon");
  toggleButton.classList.toggle("fa-regular");
  toggleButton.classList.toggle("fa-sun");
};

// Add SideMenu Bar
let toggleMenu = document.querySelector(".fa-bars");
let openLinks = document.querySelector(".links");
let nav = document.querySelector(".navbar");
toggleMenu.onclick = function () {
  openLinks.classList.toggle("open-links");
  nav.classList.toggle("navbar_bg_remove");
};

// Remove SideMenu Bar
let xButton = document.querySelector(".fa-xmark");
let closeNavbar = document.querySelector(".links");
xButton.onclick = function () {
  closeNavbar.classList.remove("open-links");
  nav.classList.toggle("navbar_bg_remove");
};