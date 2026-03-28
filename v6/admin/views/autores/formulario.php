<h2 class="text-2xl font-bold mb-8 text-center text-gray-800">
  <span class="border-b-4 border-brand-purple pb-1">
    <?php echo ($accion == 'crear') ? 'Nuevo autor' : 'Editar autor'; ?>
  </span>
</h2>

<div class="flex justify-center">
  <div class="bg-white w-full max-w-2xl rounded-xl shadow-md p-6 border border-gray-100">

    <form action="autor.php?accion=<?php echo $accion;
                                    echo ($accion == 'actualizar') ? '&id=' . $id : '' ?>"
      method="POST"
      class="space-y-6">

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
          Nombre
        </label>
        <input type="text"
          name="nombre"
          class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple"
          value="<?php echo (isset($data['nombre']) ? $data['nombre'] : ''); ?>"
          required maxlength="100">
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
          Apellido
        </label>
        <input type="text"
          name="apellido"
          class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple"
          value="<?php echo (isset($data['apellido']) ? $data['apellido'] : ''); ?>"
          maxlength="100">
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">
          Seudónimo
        </label>
        <input type="text"
          name="seudonimo"
          class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple"
          value="<?php echo (isset($data['seudonimo']) ? $data['seudonimo'] : ''); ?>"
          maxlength="100">
      </div>

      <div class="text-center pt-4">
        <button type="submit"
          name="enviar"
          class="bg-brand-orange text-white px-6 py-2 rounded-lg font-bold hover:bg-brand-red transition-colors shadow-md">
          Guardar autor
        </button>
      </div>

    </form>

  </div>
</div>