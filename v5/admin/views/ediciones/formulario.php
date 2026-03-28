<h2 class="text-2xl font-bold mb-8 text-center text-gray-800">
  <span class="border-b-4 border-brand-purple pb-1">
    <?php echo ($accion == 'crear') ? 'Nueva edición' : 'Editar edición'; ?>
  </span>
</h2>

<div class="flex justify-center">
  <div class="bg-white w-full max-w-3xl rounded-xl shadow-md p-6 border border-gray-100">

    <form action="edicion.php?accion=<?php echo $accion;
                                      echo ($accion == 'actualizar') ? '&id_libro=' . $id_libro . '&id_editorial=' . $id_editorial : '' ?>"
      method="POST"
      class="space-y-6">

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Libro
          </label>
          <select name="id_libro"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple"
            <?php echo ($accion == 'actualizar') ? 'disabled' : ''; ?>
            required>
            <?php foreach ($libros as $libro): ?>
              <option value="<?php echo $libro['id_libro']; ?>"
                <?php echo (isset($data['id_libro']) && $data['id_libro'] == $libro['id_libro']) ? 'selected' : ''; ?>>
                <?php echo $libro['titulo']; ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Editorial
          </label>
          <select name="id_editorial"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple"
            <?php echo ($accion == 'actualizar') ? 'disabled' : ''; ?>
            required>
            <?php foreach ($editoriales as $editorial): ?>
              <option value="<?php echo $editorial['id_editorial']; ?>"
                <?php echo (isset($data['id_editorial']) && $data['id_editorial'] == $editorial['id_editorial']) ? 'selected' : ''; ?>>
                <?php echo $editorial['nombre']; ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <?php if ($accion == 'actualizar'): ?>
          <input type="hidden" name="id_libro" value="<?php echo $data['id_libro']; ?>">
          <input type="hidden" name="id_editorial" value="<?php echo $data['id_editorial']; ?>">
        <?php endif; ?>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Nombre de la edición
          </label>
          <input type="text"
            name="nombre"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple"
            value="<?php echo (isset($data['nombre']) ? $data['nombre'] : ''); ?>"
            maxlength="50">
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Precio
          </label>
          <input type="number"
            name="precio"
            step="0.01"
            min="0"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple"
            value="<?php echo (isset($data['precio']) ? $data['precio'] : ''); ?>"
            required>
        </div>

        <div class="md:col-span-2">
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Descripción
          </label>
          <textarea
            name="descripcion"
            rows="3"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple"><?php echo (isset($data['descripcion']) ? $data['descripcion'] : ''); ?></textarea>
        </div>

      </div>

      <div class="text-center pt-4">
        <button type="submit"
          name="enviar"
          class="bg-brand-orange text-white px-6 py-2 rounded-lg font-bold hover:bg-brand-red transition-colors shadow-md">
          Guardar edición
        </button>
      </div>

    </form>

  </div>
</div>