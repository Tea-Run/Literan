<h2 class="text-2xl font-bold mb-8 text-center text-gray-800">
  <span class="border-b-4 border-brand-purple pb-1">
    Editar perfil
  </span>
</h2>

<div class="flex justify-center px-4">
  <div class="bg-white w-full max-w-3xl rounded-xl shadow-md p-6 border border-gray-100">

    <form action="perfil.php?accion=actualizar" method="POST" enctype="multipart/form-data" class="space-y-6">

      <div class="text-center">
        <img
          src="<?php echo !empty($data['imagen_perfil']) ? '../' . ltrim($data['imagen_perfil'], '/.') : '../uploads/perfil/default.png'; ?>"
          alt="Foto actual"
          class="w-32 h-32 rounded-full object-cover border-4 border-brand-purple mx-auto shadow"
          onerror="this.src='../uploads/perfil/default.png';">
        <p class="text-xs text-gray-500 mt-2">Foto actual</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div class="md:col-span-2">
          <label class="block text-sm font-semibold text-gray-700 mb-1">Correo electrónico</label>
          <input
            type="email"
            name="correo"
            maxlength="100"
            required
            value="<?php echo isset($data['correo']) ? htmlspecialchars($data['correo']) : ''; ?>"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple">
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">Nombre</label>
          <input
            type="text"
            name="nombre"
            maxlength="100"
            required
            value="<?php echo isset($data['nombre']) ? htmlspecialchars($data['nombre']) : ''; ?>"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple">
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">Primer apellido</label>
          <input
            type="text"
            name="primer_apellido"
            maxlength="100"
            required
            value="<?php echo isset($data['primer_apellido']) ? htmlspecialchars($data['primer_apellido']) : ''; ?>"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple">
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">Segundo apellido</label>
          <input
            type="text"
            name="segundo_apellido"
            maxlength="100"
            value="<?php echo isset($data['segundo_apellido']) ? htmlspecialchars($data['segundo_apellido']) : ''; ?>"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple">
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Imagen de perfil</label>

          <div class="flex items-center gap-4">
            <label class="bg-brand-orange text-white px-4 py-2 rounded-lg cursor-pointer hover:bg-brand-red transition-colors shadow-md">
              Seleccionar imagen
              <input
                type="file"
                name="imagen_perfil"
                id="imagenPerfil"
                accept="image/jpeg,image/jpg,image/png"
                class="hidden">
            </label>

            <span id="nombreArchivoPerfil" class="text-gray-500 text-sm">
              Ningun archivo seleccionado
            </span>
          </div>
        </div>
      </div>

      <div class="flex gap-3 pt-2">
        <button
          type="submit"
          name="enviar"
          class="bg-brand-orange text-white px-6 py-2 rounded-lg font-bold hover:bg-brand-red transition-colors shadow-md">
          Guardar cambios
        </button>

        <a
          href="perfil.php"
          class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg font-semibold hover:bg-gray-300 transition-colors">
          Cancelar
        </a>
      </div>

    </form>
  </div>
</div>

<script>
  (function () {
    const input = document.getElementById('imagenPerfil');
    const texto = document.getElementById('nombreArchivoPerfil');

    if (!input || !texto) {
      return;
    }

    input.addEventListener('change', function () {
      if (input.files && input.files.length > 0) {
        texto.textContent = input.files[0].name;
      } else {
        texto.textContent = 'Ningun archivo seleccionado';
      }
    });
  })();
</script>
