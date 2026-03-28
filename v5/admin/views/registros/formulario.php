<h2 class="text-2xl font-bold mb-8 text-center text-gray-800">
  <span class="border-b-4 border-brand-purple pb-1">
    Registro de cuenta
  </span>
</h2>

<div class="flex justify-center">
  <div class="bg-white w-full max-w-2xl rounded-xl shadow-md p-6 border border-gray-100">

    <form action="registro.php?accion=registro"
      method="POST"
      class="space-y-6">

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div class="md:col-span-2">
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Correo electrónico
          </label>
          <input type="email"
            name="correo"
            maxlength="50"
            required
            value="<?php echo (isset($data['correo']) ? $data['correo'] : ''); ?>"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple">
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Contraseña
          </label>
          <input type="password"
            name="contrasena"
            maxlength="32"
            required
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple">
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Confirmar contraseña
          </label>
          <input type="password"
            name="confirmar_contrasena"
            maxlength="32"
            required
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple">
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Nombre
          </label>
          <input type="text"
            name="nombre"
            maxlength="50"
            required
            value="<?php echo (isset($data['nombre']) ? $data['nombre'] : ''); ?>"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple">
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Primer apellido
          </label>
          <input type="text"
            name="primer_apellido"
            maxlength="50"
            required
            value="<?php echo (isset($data['primer_apellido']) ? $data['primer_apellido'] : ''); ?>"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple">
        </div>

        <div class="md:col-span-2">
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Segundo apellido
          </label>
          <input type="text"
            name="segundo_apellido"
            maxlength="50"
            value="<?php echo (isset($data['segundo_apellido']) ? $data['segundo_apellido'] : ''); ?>"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple">
        </div>

      </div>

      <div class="text-center pt-4">
        <button type="submit"
          name="enviar"
          class="bg-brand-orange text-white px-6 py-2 rounded-lg font-bold hover:bg-brand-red transition-colors shadow-md">
          Crear cuenta
        </button>
      </div>

      <div class="text-center mt-4">
        <p class="text-sm text-gray-600">
          ¿Ya tienes cuenta?
          <a href="login.php"
            class="text-brand-purple font-semibold hover:underline">
            Iniciar sesión
          </a>
        </p>
      </div>

    </form>

  </div>
</div><h2 class="text-2xl font-bold mb-8 text-center text-gray-800">
  <span class="border-b-4 border-brand-purple pb-1">
    Registro de cuenta
  </span>
</h2>

<div class="flex justify-center">
  <div class="bg-white w-full max-w-2xl rounded-xl shadow-md p-6 border border-gray-100">

    <form action="registro.php?accion=registro"
      method="POST"
      class="space-y-6">

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div class="md:col-span-2">
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Correo electrónico
          </label>
          <input type="email"
            name="correo"
            maxlength="50"
            required
            value="<?php echo (isset($data['correo']) ? $data['correo'] : ''); ?>"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple">
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Contraseña
          </label>
          <input type="password"
            name="contrasena"
            maxlength="32"
            required
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple">
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Confirmar contraseña
          </label>
          <input type="password"
            name="confirmar_contrasena"
            maxlength="32"
            required
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple">
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Nombre
          </label>
          <input type="text"
            name="nombre"
            maxlength="50"
            required
            value="<?php echo (isset($data['nombre']) ? $data['nombre'] : ''); ?>"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple">
        </div>

        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Primer apellido
          </label>
          <input type="text"
            name="primer_apellido"
            maxlength="50"
            required
            value="<?php echo (isset($data['primer_apellido']) ? $data['primer_apellido'] : ''); ?>"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple">
        </div>

        <div class="md:col-span-2">
          <label class="block text-sm font-semibold text-gray-700 mb-1">
            Segundo apellido
          </label>
          <input type="text"
            name="segundo_apellido"
            maxlength="50"
            value="<?php echo (isset($data['segundo_apellido']) ? $data['segundo_apellido'] : ''); ?>"
            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple">
        </div>

      </div>

      <div class="text-center pt-4">
        <button type="submit"
          name="enviar"
          class="bg-brand-orange text-white px-6 py-2 rounded-lg font-bold hover:bg-brand-red transition-colors shadow-md">
          Crear cuenta
        </button>
      </div>

      <div class="text-center mt-4">
        <p class="text-sm text-gray-600">
          ¿Ya tienes cuenta?
          <a href="login.php"
            class="text-brand-purple font-semibold hover:underline">
            Iniciar sesión
          </a>
        </p>
      </div>

    </form>

  </div>
</div>