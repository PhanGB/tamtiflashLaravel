// path: index
const menuToggle = document.getElementById("menuToggle");
const modalMenu = document.getElementById("modalMenu");
const searchToggle = document.getElementById("searchToggle");
const modalSearch = document.getElementById("modalSearch");
const overlay = document.getElementById("overlay");

menuToggle.addEventListener("click", () => {
    modalMenu.classList.add("active");
    overlay.classList.add("active");
});

searchToggle.addEventListener("click", () => {
    modalSearch.classList.add("active");
    overlay.classList.add("active");
});

overlay.addEventListener("click", () => {
    modalMenu.classList.remove("active");
    modalSearch.classList.remove("active");
    overlay.classList.remove("active");
});
