<main class="min-h-[80vh] flex items-center justify-center px-4">

  <div class="w-full max-w-md bg-white rounded-xl shadow-lg border border-gray-100 p-8">

    <!-- Título -->
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
      <span class="border-b-4 border-brand-purple pb-1">
        Iniciar Sesión
      </span>
    </h2>

    <!-- Error -->
    <?php if (isset($_SESSION['error'])): ?>
      <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm text-center">
        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
      </div>
    <?php endif; ?>

    <!-- Formulario -->
    <form action="login.php?accion=login" method="POST" class="space-y-4">

      <!-- Email -->
      <div>
        <label class="block text-gray-700 font-semibold mb-1">
          Correo electrónico
        </label>
        <input type="email" name="correo" required
          placeholder="tu correo@example.com"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 
                 focus:outline-none focus:ring-2 focus:ring-brand-purple">
      </div>

      <!-- Password -->
      <div>
        <label class="block text-gray-700 font-semibold mb-1">
          Contraseña
        </label>
        <input type="password" name="contrasena" required
          placeholder="********"
          class="w-full border border-gray-300 rounded-lg px-3 py-2 
                 focus:outline-none focus:ring-2 focus:ring-brand-purple">
      </div>

      <!-- Opciones -->
      <div class="flex justify-between items-center text-sm">
        <label class="flex items-center gap-2">
          <input type="checkbox" class="accent-brand-purple">
          Recordarme
        </label>

        <a href="login.php?accion=recuperar" class="text-brand-purple hover:underline">
          ¿Olvidaste tu contraseña?
        </a>
      </div>

      <!-- Botón -->
      <button type="submit"
        class="w-full bg-brand-orange text-white py-2 rounded-lg font-bold 
               hover:bg-brand-red transition-colors shadow-sm">
        Iniciar sesión
      </button>

      <!-- Registro -->
      <div class="text-center mt-4">
        <p class="text-sm text-gray-600">
          ¿No tienes cuenta?
          <a href="registro.php?accion=registro"
            class="text-brand-purple font-semibold hover:underline">
            Regístrate
          </a>
        </p>
      </div>

      <!-- Separador -->
      <div class="flex items-center gap-2 my-4">
        <hr class="flex-grow border-gray-300">
        <span class="text-xs text-gray-400">o</span>
        <hr class="flex-grow border-gray-300">
      </div>

      <!-- Redes (solo visual) -->
      <div class="flex justify-center gap-3">
        <button type="button"
          class="border border-gray-300 px-4 py-2 rounded-lg hover:bg-gray-100 text-sm">
          Facebook
        </button>
        <button type="button"
          class="border border-gray-300 px-4 py-2 rounded-lg hover:bg-gray-100 text-sm">
          Google
        </button>
        <button type="button"
          class="border border-gray-300 px-4 py-2 rounded-lg hover:bg-gray-100 text-sm">
          Twitter
        </button>
      </div>

    </form>

  </div>

</main>

