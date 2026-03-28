<h2 class="text-2xl font-bold mb-8 text-center text-gray-800">
  <span class="border-b-4 border-brand-purple pb-1">
    Mi perfil
  </span>
</h2>

<div class="max-w-5xl mx-auto px-4">
  <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
      <div class="text-center">
        <img
          src="<?php echo !empty($data['imagen_perfil']) ? '../' . ltrim($data['imagen_perfil'], '/.') : '../uploads/perfil/default.png'; ?>"
          alt="Foto de perfil"
          class="w-36 h-36 rounded-full object-cover border-4 border-brand-purple mx-auto shadow"
          onerror="this.src='../images/literan-logo.png';">
        <p class="text-xs text-gray-500 mt-3">Foto de perfil</p>
      </div>

      <div class="md:col-span-2">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div class="bg-gray-50 rounded-lg p-4 border border-gray-100">
            <p class="text-xs uppercase tracking-wide text-gray-500">Correo</p>
            <p class="text-gray-800 font-semibold"><?php echo isset($data['correo']) ? htmlspecialchars($data['correo']) : ''; ?></p>
          </div>

          <div class="bg-gray-50 rounded-lg p-4 border border-gray-100">
            <p class="text-xs uppercase tracking-wide text-gray-500">Nombre</p>
            <p class="text-gray-800 font-semibold"><?php echo isset($data['nombre']) ? htmlspecialchars($data['nombre']) : ''; ?></p>
          </div>

          <div class="bg-gray-50 rounded-lg p-4 border border-gray-100">
            <p class="text-xs uppercase tracking-wide text-gray-500">Primer apellido</p>
            <p class="text-gray-800 font-semibold"><?php echo isset($data['primer_apellido']) ? htmlspecialchars($data['primer_apellido']) : ''; ?></p>
          </div>

          <div class="bg-gray-50 rounded-lg p-4 border border-gray-100">
            <p class="text-xs uppercase tracking-wide text-gray-500">Segundo apellido</p>
            <p class="text-gray-800 font-semibold"><?php echo isset($data['segundo_apellido']) ? htmlspecialchars($data['segundo_apellido']) : ''; ?></p>
          </div>
        </div>

        <div class="mt-6">
          <a href="perfil.php?accion=actualizar"
            class="inline-block bg-brand-orange text-white px-6 py-2 rounded-lg font-bold hover:bg-brand-red transition-colors shadow-md">
            Editar perfil
          </a>
        </div>
      </div>
    </div>

  </div>
</div>
