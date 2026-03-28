<?php
include_once(__DIR__ . "/views/header.php");
?>

<main class="max-w-7xl mx-auto px-4 py-8">
  <section>
    <h2 class="text-2xl font-bold mb-8 text-center text-gray-800">
      <span class="border-b-4 border-brand-purple pb-1">
        Libros recomendados
      </span>
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 justify-items-center">

      <article class="bg-white w-full max-w-xs rounded-xl shadow-md p-4 hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col">
        <div class="w-full h-72 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
          <img src="../images/el-color-que-cayo-del-cielo.jpg"
            class="max-h-full max-w-full object-contain transition-transform duration-500 hover:scale-105"
            alt="Portada Libro">
        </div>
        <h3 class="mt-4 font-bold text-gray-800">El color que cayó del cielo</h3>
        <p class="text-gray-500 text-xs uppercase tracking-widest">H.P. Lovecraft</p>
        <p class="text-brand-red font-black text-xl mt-2">$999</p>
        <button class="mt-4 w-full bg-brand-orange text-white py-2 rounded-lg font-bold hover:bg-brand-red transition-colors">
          Mostrar producto
        </button>
      </article>

      <article class="bg-white w-full max-w-xs rounded-xl shadow-md p-4 hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col">
        <div class="w-full h-72 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
          <img src="../images/juego-de-tronos.jpg"
            class="max-h-full max-w-full object-contain transition-transform duration-500 hover:scale-105"
            alt="Portada Libro">
        </div>
        <h3 class="mt-4 font-bold text-gray-800">Juego de Tronos</h3>
        <p class="text-gray-500 text-xs uppercase tracking-widest">George R.R. Martin</p>
        <p class="text-brand-red font-black text-xl mt-2">$999</p>
        <button class="mt-4 w-full bg-brand-orange text-white py-2 rounded-lg font-bold hover:bg-brand-red transition-colors">
          Mostrar producto
        </button>
      </article>

      <article class="bg-white w-full max-w-xs rounded-xl shadow-md p-4 hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col">
        <div class="w-full h-72 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
          <img src="../images/rayuela.jpg"
            class="max-h-full max-w-full object-contain transition-transform duration-500 hover:scale-105"
            alt="Portada Libro">
        </div>
        <h3 class="mt-4 font-bold text-gray-800">Rayuela</h3>
        <p class="text-gray-500 text-xs uppercase tracking-widest">Julio Cortázar</p>
        <p class="text-brand-red font-black text-xl mt-2">$999</p>
        <button class="mt-4 w-full bg-brand-orange text-white py-2 rounded-lg font-bold hover:bg-brand-red transition-colors">
          Mostrar producto
        </button>
      </article>

      <article class="bg-white w-full max-w-xs rounded-xl shadow-md p-4 hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col">
        <div class="w-full h-72 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
          <img src="../images/matar-a-un-ruiseñor.jpg"
            class="max-h-full max-w-full object-contain transition-transform duration-500 hover:scale-105"
            alt="Portada Libro">
        </div>
        <h3 class="mt-4 font-bold text-gray-800">Matar a un ruiseñor</h3>
        <p class="text-gray-500 text-xs uppercase tracking-widest">Harper Lee</p>
        <p class="text-brand-red font-black text-xl mt-2">$999</p>
        <button class="mt-4 w-full bg-brand-orange text-white py-2 rounded-lg font-bold hover:bg-brand-red transition-colors">
          Mostrar producto
        </button>
      </article>

      <article class="bg-white w-full max-w-xs rounded-xl shadow-md p-4 hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col">
        <div class="w-full h-72 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
          <img src="../images/diario-de-greg.jpg"
            class="max-h-full max-w-full object-contain transition-transform duration-500 hover:scale-105"
            alt="Portada Libro">
        </div>
        <h3 class="mt-4 font-bold text-gray-800">Diario de Greg</h3>
        <p class="text-gray-500 text-xs uppercase tracking-widest">Jeff Kinney</p>
        <p class="text-brand-red font-black text-xl mt-2">$999</p>
        <button class="mt-4 w-full bg-brand-orange text-white py-2 rounded-lg font-bold hover:bg-brand-red transition-colors">
          Mostrar producto
        </button>
      </article>

      <article class="bg-white w-full max-w-xs rounded-xl shadow-md p-4 hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col">
        <div class="w-full h-72 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
          <img src="../images/la-biblioteca-de-la-medianoche.jpg"
            class="max-h-full max-w-full object-contain transition-transform duration-500 hover:scale-105"
            alt="Portada Libro">
        </div>
        <h3 class="mt-4 font-bold text-gray-800">La biblioteca de medianoche</h3>
        <p class="text-gray-500 text-xs uppercase tracking-widest">Matt Haig</p>
        <p class="text-brand-red font-black text-xl mt-2">$999</p>
        <button class="mt-4 w-full bg-brand-orange text-white py-2 rounded-lg font-bold hover:bg-brand-red transition-colors">
          Mostrar producto
        </button>
      </article>

    </div>
  </section>
</main>

<?php
include_once(__DIR__ . "/views/footer.php");
?>