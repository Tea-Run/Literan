<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Literan</title>

  <link rel="stylesheet" href="css/stylesheet.css">

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brand: {
              orange: '#DB4B18',
              red: '#DB2918',
              purple: '#DB18CB',
            }
          }
        }
      }
    }
  </script>
</head>

<body class="bg-gray-50">

<div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>

<aside id="menuLateral"
  class="fixed top-0 right-0 h-full w-64 bg-white shadow-lg transform translate-x-full transition-transform duration-300 z-50">
  <div class="p-4">
    <h2 class="text-lg font-bold mb-4 border-b-2 border-brand-purple pb-2">Menú</h2>
    <nav>
      <ul class="space-y-2 text-sm">
        <li><a href="#" class="block hover:bg-orange-50 p-2 rounded">Inicio</a></li>
        <li><a href="#" class="block hover:bg-orange-50 p-2 rounded">Carrito</a></li>
        <li><a href="#" class="block hover:bg-orange-50 p-2 rounded">Compras</a></li>
        <li><a href="#" class="block hover:bg-orange-50 p-2 rounded">Reseñas</a></li>
        <li><a href="#" class="block hover:bg-orange-50 p-2 rounded">Perfil</a></li>
        <li><a href="#" class="block hover:bg-orange-50 p-2 rounded border-t mt-2">Configuración</a></li>
        <li><a href="#" class="block hover:bg-red-50 p-2 rounded text-brand-red font-semibold">Cerrar sesión</a></li>
      </ul>
    </nav>
  </div>
</aside>

<header class="bg-white shadow-md border-b-4 border-brand-purple">
  <div class="max-w-7xl mx-auto px-4 py-4 flex flex-wrap items-center justify-between">

    <div class="flex items-center gap-2">
      <a href="index.php"><img src="../images/literan-logo.png" class="w-12" alt="Logo"></a>
      <h1 class="text-2xl font-black text-brand-orange">Literan</h1>
    </div>

    <form class="flex gap-2 my-2 sm:my-0 w-full sm:w-auto">
      <input type="text" placeholder="Busca libros..."
        class="border rounded-md px-3 py-1 flex-grow focus:outline-none focus:ring-2 focus:ring-brand-purple">
      <button class="bg-brand-orange text-white px-4 py-2 rounded-md hover:bg-brand-red transition-colors shadow-sm">
        Buscar
      </button>
    </form>

    <nav>
      <ul class="flex items-center gap-4 text-sm font-medium">
        <li><a href="index.php" class="hover:text-brand-purple">Inicio</a></li>
        <li><a href="categoria.php" class="hover:text-brand-purple">Categorías</a></li>
        <li><a href="#" class="hover:text-brand-purple">Carrito</a></li>
        <li><a href="#" class="hover:text-brand-purple">Iniciar sesión</a></li>
        <li>
          <button id="menuBtn"
            class="bg-brand-orange text-white px-3 py-1 rounded-md hover:opacity-90">
            ☰
          </button>
        </li>
      </ul>
    </nav>

  </div>
</header>