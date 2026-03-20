<h2 class="text-2xl font-bold mb-8 text-center text-gray-800">
  <span class="border-b-4 border-brand-purple pb-1">
    <?php echo ($accion == 'crear') ? 'Nuevo libro' : 'Editar libro'; ?>
  </span>
</h2>

<div class="flex justify-center">
  <div class="bg-white w-full max-w-4xl rounded-xl shadow-md p-6 border border-gray-100">

    <form action="libro.php?accion=<?php echo $accion;
                                    echo ($accion == 'actualizar') ? '&id=' . $id : '' ?>"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-6">

      <?php if ($accion == 'actualizar'): ?>
        <div class="text-center mb-4">
          <img
            src="../<?php echo isset($data['imagen']) ? $data['imagen'] : 'uploads/libros/default.png'; ?>"
            class="w-40 h-56 object-cover rounded-lg shadow-md mx-auto"
            onerror="this.src='../uploads/libros/default.png';">
        </div>
      <?php endif; ?>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Título
          </label>
          <input type="text"
            name="titulo"
            maxlength="100"
            required
            value="<?php echo (isset($data['titulo']) ? $data['titulo'] : ''); ?>"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple">
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Formato
          </label>
          <select name="formato"
            required
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple">

            <option value="">Seleccione</option>
            <option value="fisico"
              <?php echo (isset($data['formato']) && $data['formato'] == 'fisico') ? 'selected' : ''; ?>>
              Físico
            </option>
            <option value="digital"
              <?php echo (isset($data['formato']) && $data['formato'] == 'digital') ? 'selected' : ''; ?>>
              Digital
            </option>

          </select>
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Categoría
          </label>
          <select name="id_categoria"
            required
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple">

            <?php foreach ($categorias as $categoria): ?>
              <option value="<?php echo $categoria['id_categoria']; ?>"
                <?php echo (isset($data['id_categoria']) && $data['id_categoria'] == $categoria['id_categoria']) ? 'selected' : ''; ?>>
                <?php echo $categoria['categoria']; ?>
              </option>
            <?php endforeach; ?>

          </select>
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Autor
          </label>
          <select name="id_autor"
            required
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple">

            <?php foreach ($autores as $autor): ?>
              <option value="<?php echo $autor['id_autor']; ?>"
                <?php echo (isset($data['id_autor']) && $data['id_autor'] == $autor['id_autor']) ? 'selected' : ''; ?>>
                <?php echo $autor['nombre'] . ' ' . $autor['apellido']; ?>
              </option>
            <?php endforeach; ?>

          </select>
        </div>

        <div class="md:col-span-2">
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Descripción
          </label>
          <textarea
            name="descripcion"
            maxlength="255"
            rows="3"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple"><?php echo (isset($data['descripcion']) ? $data['descripcion'] : ''); ?></textarea>
        </div>

        <div class="md:col-span-2">
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            Imagen de portada
          </label>

          <div class="flex items-center gap-4">

            <label class="bg-brand-orange text-white px-4 py-2 rounded-lg cursor-pointer hover:bg-brand-red transition-colors shadow-md">
              Seleccionar imagen
              <input type="file"
                name="imagen"
                id="imagen"
                accept="image/*"
                class="hidden">
            </label>

            <span id="nombreArchivo" class="text-gray-500 text-sm">
              Ningún archivo seleccionado
            </span>

          </div>

          <img id="preview"
            class="mt-4 w-40 h-56 object-cover rounded-lg shadow-md hidden">
        </div>

      </div>

      <div class="text-center pt-4">
        <button type="submit"
          name="enviar"
          class="bg-brand-orange text-white px-6 py-2 rounded-lg font-bold hover:bg-brand-red transition-colors shadow-md">
          Guardar libro
        </button>
      </div>

    </form>

  </div>
</div>