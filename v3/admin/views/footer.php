<footer class="bg-gray-900 text-white mt-12 border-t-4 border-brand-purple">
  <div class="max-w-7xl mx-auto px-4 py-8 text-center">
    <h3 class="font-bold mb-4 text-brand-orange text-lg">Contacto</h3>
    <div class="space-y-2">
      <p><a href="tel:+5215512345678" class="hover:text-brand-orange">55 1234 5678</a></p>
      <p><a href="mailto:contacto@miempresa.com" class="hover:text-brand-orange">
        contacto@miempresa.com
      </a></p>
    </div>
    <p class="mt-6 text-gray-500 text-xs">© 2024 Literan. Todos los derechos reservados.</p>
  </div>
</footer>

<script>
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
</script>

<script>
    setTimeout(() => {
        const alert = document.querySelector('.border-l-4');
        if(alert){
            alert.remove();
        }
    }, 4000);
</script>

</body>
</html>