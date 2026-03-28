<main class="max-w-3xl mx-auto px-4 py-10">

    <section class="bg-white shadow-xl rounded-xl p-8 border border-gray-100">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            <span class="border-b-4 border-brand-purple pb-1">
                Actualizar Categoría
            </span>
        </h2>

        <form action="categoria.php?accion=actualizar&id=<?php echo $id; ?>" 
              method="POST" 
              class="space-y-6">

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Nombre de la categoría
                </label>

                <input type="text"
                       name="categoria"
                       required
                       value="<?php echo $data['categoria']; ?>"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-brand-purple">
            </div>

            <div class="flex justify-end">
                <input type="submit"
                       name="enviar"
                       value="Guardar"
                       class="bg-brand-orange text-white px-6 py-2 rounded-lg font-bold hover:bg-brand-red transition-colors shadow-md cursor-pointer">
            </div>

        </form>

    </section>

</main>