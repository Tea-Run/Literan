<main class="max-w-7xl mx-auto px-4 py-10">

    <section>

        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">
                <span class="border-b-4 border-brand-purple pb-1">
                    Libros
                </span>
            </h2>

            <div class="flex gap-3">
                <a href="libro.php?accion=reporte" target="_blank"
                   class="bg-gray-700 text-white px-4 py-2 rounded-lg font-semibold hover:bg-gray-800 transition-colors shadow-md">
                    PDF Libros
                </a>

                <a href="libro.php?accion=crear"
                   class="bg-brand-orange text-white px-4 py-2 rounded-lg font-semibold hover:bg-brand-red transition-colors shadow-md">
                    + Nuevo Libro
                </a>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
            <table class="min-w-full text-sm text-left">

                <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-3">Libro</th>
                        <th class="px-6 py-3">Autor</th>
                        <th class="px-6 py-3">Categoría</th>
                        <th class="px-6 py-3">Formato</th>
                        <th class="px-6 py-3 text-center">Opciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">

                <?php foreach ($libros as $libro): ?>
                    <tr class="hover:bg-gray-50 transition-colors">

                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">

                                <img src="../<?php echo $libro['imagen'] ?: 'uploads/libros/default.png'; ?>"
                                     class="w-12 h-16 object-cover rounded-md shadow-sm">

                                <div>
                                    <p class="font-bold text-gray-800">
                                        <?php echo $libro['titulo']; ?>
                                    </p>
                                </div>

                            </div>
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            <?php echo $libro['autor_nombre'] . ' ' . $libro['apellido']; ?>
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            <?php echo $libro['categoria']; ?>
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                <?php echo ($libro['formato'] == 'digital') ? 'bg-purple-100 text-purple-700' : 'bg-orange-100 text-orange-700'; ?>">
                                <?php echo ucfirst($libro['formato']); ?>
                            </span>
                        </td>

                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-3">

                                <a href="libro.php?accion=actualizar&id=<?php echo $libro['id_libro']; ?>"
                                   class="bg-yellow-400 text-white px-3 py-1 rounded-md text-xs font-bold hover:bg-yellow-500 transition-colors">
                                    Editar
                                </a>

                                <a href="libro.php?accion=borrar&id=<?php echo $libro['id_libro']; ?>"
                                   onclick="return confirm('¿Seguro que deseas eliminar este libro?')"
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