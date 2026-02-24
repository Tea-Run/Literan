<main class="max-w-7xl mx-auto px-4 py-10">

    <section>

        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">
                <span class="border-b-4 border-brand-purple pb-1">
                    Categorías
                </span>
            </h2>

            <a href="categoria.php?accion=crear"
               class="bg-brand-orange text-white px-4 py-2 rounded-lg font-semibold hover:bg-brand-red transition-colors shadow-md">
                + Nueva Categoría
            </a>
        </div>

        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Nombre</th>
                        <th class="px-6 py-3 text-center">Opciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">

                <?php foreach ($categorias as $categoria): ?>
                    <tr class="hover:bg-gray-50 transition-colors">

                        <td class="px-6 py-4 font-semibold text-gray-700">
                            <?php echo $categoria['id_categoria']; ?>
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            <?php echo $categoria['categoria']; ?>
                        </td>

                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-3">

                                <a href="categoria.php?accion=actualizar&id=<?php echo $categoria['id_categoria']; ?>"
                                   class="bg-yellow-400 text-white px-3 py-1 rounded-md text-xs font-bold hover:bg-yellow-500 transition-colors">
                                    Editar
                                </a>

                                <a href="categoria.php?accion=borrar&id=<?php echo $categoria['id_categoria']; ?>"
                                   class="bg-brand-red text-white px-3 py-1 rounded-md text-xs font-bold hover:opacity-90 transition-opacity">
                                    Eliminar
                                </a>

                            </div>
                        </td>

                    </tr>
                <?php endforeach ?>

                </tbody>
            </table>
        </div>

    </section>

</main>