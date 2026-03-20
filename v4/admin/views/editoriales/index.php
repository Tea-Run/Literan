<main class="max-w-7xl mx-auto px-4 py-10">

    <section>

        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">
                <span class="border-b-4 border-brand-purple pb-1">
                    Editoriales
                </span>
            </h2>

            <a href="editorial.php?accion=crear"
               class="bg-brand-orange text-white px-4 py-2 rounded-lg font-semibold hover:bg-brand-red transition-colors shadow-md">
                + Nueva Editorial
            </a>
        </div>

        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
            <table class="min-w-full text-sm text-left">

                <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-6 py-3">Nombre</th>
                        <th class="px-6 py-3">Razón social</th>
                        <th class="px-6 py-3">RFC</th>
                        <th class="px-6 py-3">Teléfono</th>
                        <th class="px-6 py-3">Correo</th>
                        <th class="px-6 py-3 text-center">Opciones</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">

                <?php foreach ($editoriales as $editorial): ?>
                    <tr class="hover:bg-gray-50 transition-colors">

                        <td class="px-6 py-4 text-gray-600 font-medium">
                            <?php echo $editorial['nombre']; ?>
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            <?php echo $editorial['razon_social']; ?>
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            <?php echo $editorial['rfc']; ?>
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            <?php echo $editorial['telefono'] ?: '—'; ?>
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            <?php echo $editorial['correo'] ?: '—'; ?>
                        </td>

                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-3">

                                <a href="editorial.php?accion=actualizar&id=<?php echo $editorial['id_editorial']; ?>"
                                   class="bg-yellow-400 text-white px-3 py-1 rounded-md text-xs font-bold hover:bg-yellow-500 transition-colors">
                                    Editar
                                </a>

                                <a href="editorial.php?accion=borrar&id=<?php echo $editorial['id_editorial']; ?>"
                                   onclick="return confirm('¿Seguro que deseas eliminar esta editorial?')"
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