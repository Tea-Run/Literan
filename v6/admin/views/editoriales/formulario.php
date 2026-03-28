<h2 class="text-2xl font-bold mb-8 text-center text-gray-800">
  <span class="border-b-4 border-brand-purple pb-1">
    <?php echo ($accion == 'crear') ? 'Nueva editorial' : 'Editar editorial'; ?>
  </span>
</h2>

<div class="flex justify-center">
  <div class="bg-white w-full max-w-3xl rounded-xl shadow-md p-6 border border-gray-100">

    <form action="editorial.php?accion=<?php echo $accion;
                                        echo ($accion == 'actualizar') ? '&id=' . $id : '' ?>"
      method="POST"
      class="space-y-6">

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Nombre
          </label>
          <input type="text"
            name="nombre"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple"
            value="<?php echo (isset($data['nombre']) ? $data['nombre'] : ''); ?>"
            required maxlength="50">
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Razón social
          </label>
          <input type="text"
            name="razon_social"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple"
            value="<?php echo (isset($data['razon_social']) ? $data['razon_social'] : ''); ?>"
            required maxlength="50">
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            RFC
          </label>
          <input type="text"
            name="rfc"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple"
            value="<?php echo (isset($data['rfc']) ? $data['rfc'] : ''); ?>"
            required
            pattern="^[A-ZÑ&]{3,4}[0-9]{6}[A-Z0-9]{3}$"
            placeholder="ABC123456XYZ">
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Teléfono
          </label>
          <input type="text"
            name="telefono"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple"
            value="<?php echo (isset($data['telefono']) ? $data['telefono'] : ''); ?>"
            maxlength="15">
        </div>

        <div class="md:col-span-2">
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Correo
          </label>
          <input type="email"
            name="correo"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple"
            value="<?php echo (isset($data['correo']) ? $data['correo'] : ''); ?>"
            maxlength="50">
        </div>

      </div>

      <div class="text-center pt-4">
        <button type="submit"
          name="enviar"
          class="bg-brand-orange text-white px-6 py-2 rounded-lg font-bold hover:bg-brand-red transition-colors shadow-md">
          Guardar editorial
        </button>
      </div>

    </form>

  </div>
</div>