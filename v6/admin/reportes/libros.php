<?php
// Limpiar TODOS los buffers activos ANTES de hacer nada
while (ob_get_level()) {
    ob_end_clean();
}

// Ahora iniciar nuevo buffer limpio
ob_start();

// Importar el autoloader de Composer
require(__DIR__ . '/../../vendor/autoload.php');
include_once(__DIR__ . '/../models/libro.php');
$app = new Libro;

$app->checarRol('Administrador');

$libros = $app->leer();

// 1. Iniciar el buffering para evitar errores de salida previa
try {
    $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4-L',
        'margin_top' => 15,
    ]);

    // 2. Definir estilos CSS
    $css = "
        body { font-family: sans-serif; }
        h2 { text-align: center; color: #333; margin-bottom: 8px; }
        p.meta { text-align: right; font-size: 10px; color: #666; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background-color: #DB4B18; color: white; padding: 8px; font-size: 11px; }
        td { border: 1px solid #ddd; padding: 7px; font-size: 10px; }
        tr:nth-child(even) { background-color: #f8f8f8; }
        .footer { text-align: right; font-size: 10px; margin-top: 20px; font-style: italic; }
    ";

    // 3. Construir el HTML
    $html = "
    <h2>Reporte General de Libros</h2>
    <p class='meta'>Generado el: " . date('d-m-Y H:i') . "</p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Categoría</th>
                <th>Formato</th>
            </tr>
        </thead>
        <tbody>";

    foreach ($libros as $libro) {
        $autor = trim(($libro['autor_nombre'] ?? '') . ' ' . ($libro['apellido'] ?? ''));
        $html .= "
            <tr>
                <td>" . (int)$libro['id_libro'] . "</td>
                <td>" . htmlspecialchars($libro['titulo'] ?? '', ENT_QUOTES, 'UTF-8') . "</td>
                <td>" . htmlspecialchars($autor, ENT_QUOTES, 'UTF-8') . "</td>
                <td>" . htmlspecialchars($libro['categoria'] ?? '', ENT_QUOTES, 'UTF-8') . "</td>
                <td>" . htmlspecialchars(ucfirst($libro['formato'] ?? ''), ENT_QUOTES, 'UTF-8') . "</td>
            </tr>";
    }

    $html .= "
        </tbody>
    </table>
    <div class='footer'>Total de libros: " . count($libros) . "</div>";

    // 4. Escribir el contenido
    $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);

    // 5. Limpiar buffer y salida
    if (ob_get_contents()) ob_end_clean();

    $mpdf->Output('Reporte_Libros.pdf', 'I');
} catch (\Mpdf\MpdfException $e) {
    echo "Error al generar el PDF: " . $e->getMessage();
}
