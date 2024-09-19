const menuBtn = document.querySelector(".hamburger");
const menubar = document.querySelector(".menubar");
const overlay = document.querySelector(".overlay");
let shownMenubar = false;

const toggleNav = () => {
  menubar.classList.toggle("menubar-active");
  menuBtn.classList.toggle("hamburger-active");
  shownMenubar = !shownMenubar;

  if (shownMenubar) {
    overlay.style.display = "block";
    menuBtn.style.zIndex = 6;
    menubar.style.zIndex = 7;
    overlay.addEventListener("click", toggleNav);
  } else {
    overlay.style.display = "none";
    menuBtn.style.zIndex = 1;
    menubar.style.zIndex = 2;
    overlay.removeEventListener("click", toggleNav);
  }
};

menuBtn.addEventListener("click", toggleNav);