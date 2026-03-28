const menuBtn = document.getElementById("menuBtn");
const menu = document.getElementById("menuLateral");
const overlay = document.getElementById("overlay");

if (menuBtn) {
  menuBtn.addEventListener("click", () => {
    menu.classList.toggle("translate-x-full");
    overlay.classList.toggle("hidden");
  });

  overlay.addEventListener("click", () => {
    menu.classList.add("translate-x-full");
    overlay.classList.add("hidden");
  });
}

const dropdownBtn = document.getElementById('dropdownBtn');
const dropdownMenu = document.getElementById('dropdownMenu');

if (dropdownBtn && dropdownMenu) {
  dropdownBtn.addEventListener('click', () => {
    dropdownMenu.classList.toggle('hidden');
  });

  document.addEventListener('click', (e) => {
    if (!dropdownBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
      dropdownMenu.classList.add('hidden');
    }
  });
}