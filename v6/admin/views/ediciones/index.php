<main class="max-w-7xl mx-auto px-4 py-10">

    <section>

        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">
                <span class="border-b-4 border-brand-purple pb-1">
                    Ediciones de libros
                </span>
            </h2>

            <a href="edicion.php?accion=crear"
               class="bg-brand-orange text-white px-4 py-2 rounded-lg font-semibold hover:bg-brand-red transition-colors shadow-md">
                + Nueva Edición
            </a>
        </div>

        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
            <table class="min-w-full text-sm text-left">

                <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-3">Libro</th>
                        <th class="px-6 py-3">Editorial</th>
                        <th class="px-6 py-3">Edición</th>
                        <th class="px-6 py-3">Precio</th>
                        <th class="px-6 py-3">Descripción</th>
                        <th class="px-6 py-3 text-center">Opciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">

                <?php foreach ($ediciones as $edicion): ?>
                    <tr class="hover:bg-gray-50 transition-colors">

                        <td class="px-6 py-4 font-semibold text-gray-700">
                            <?php echo $edicion['titulo']; ?>
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            <?php echo $edicion['editorial']; ?>
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            <?php echo $edicion['nombre'] ?: '—'; ?>
                        </td>

                        <td class="px-6 py-4 text-brand-red font-bold">
                            $<?php echo number_format($edicion['precio'], 2); ?>
                        </td>

                        <td class="px-6 py-4 text-gray-500">
                            <?php echo $edicion['descripcion'] ?: '—'; ?>
                        </td>

                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-3">

                                <a href="edicion.php?accion=actualizar&id_libro=<?php echo $edicion['id_libro']; ?>&id_editorial=<?php echo $edicion['id_editorial']; ?>"
                                   class="bg-yellow-400 text-white px-3 py-1 rounded-md text-xs font-bold hover:bg-yellow-500 transition-colors">
                                    Editar
                                </a>

                                <a href="edicion.php?accion=borrar&id_libro=<?php echo $edicion['id_libro']; ?>&id_editorial=<?php echo $edicion['id_editorial']; ?>"
                                   onclick="return confirm('¿Seguro que deseas eliminar esta edición?')"
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