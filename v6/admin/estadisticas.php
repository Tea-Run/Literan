<?php
require_once(__DIR__ . '/sistema.class.php');
require_once(__DIR__ . '/models/libro.php');

$app = new Libro();
$app->checarRol('Administrador');

$datos = $app->graficarPorCategoria();
$datosGrafica = [];

foreach ($datos as $fila) {
    $datosGrafica[] = [addslashes($fila['categoria']), (int)$fila['cantidad']];
}

include_once(__DIR__ . '/views/header.php');
?>

<main class="max-w-7xl mx-auto px-4 py-8">
  <section class="mb-8">
    <h2 class="text-2xl font-bold text-center text-gray-800">
      <span class="border-b-4 border-brand-purple pb-1">Dashboard Literan</span>
    </h2>
    <p class="text-center text-gray-500 mt-3">Distribucion de libros por categoria</p>
  </section>

  <section class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-xl shadow-md border border-gray-100 p-4">
      <h3 class="text-lg font-semibold text-gray-700 mb-2">Grafica de pastel</h3>
      <div id="chart_pie" class="w-full h-80"></div>
    </div>

    <div class="bg-white rounded-xl shadow-md border border-gray-100 p-4">
      <h3 class="text-lg font-semibold text-gray-700 mb-2">Grafica de barras</h3>
      <div id="chart_bar" class="w-full h-80"></div>
    </div>
  </section>
</main>

<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
  google.charts.load('current', { packages: ['corechart', 'bar'] });
  google.charts.setOnLoadCallback(drawCharts);

  function drawCharts() {
    const data = google.visualization.arrayToDataTable([
      ['Categoria', 'Libros'],
      <?php foreach ($datosGrafica as $d) { echo "['" . $d[0] . "', " . $d[1] . "],"; } ?>
    ]);

    const pieChart = new google.visualization.PieChart(document.getElementById('chart_pie'));
    pieChart.draw(data, {
      is3D: true,
      chartArea: { width: '90%', height: '80%' }
    });

    const barChart = new google.visualization.ColumnChart(document.getElementById('chart_bar'));
    barChart.draw(data, {
      legend: { position: 'none' },
      chartArea: { width: '85%', height: '75%' },
      colors: ['#DB4B18']
    });

    window.addEventListener('resize', function () {
      pieChart.draw(data, { is3D: true, chartArea: { width: '90%', height: '80%' } });
      barChart.draw(data, { legend: { position: 'none' }, chartArea: { width: '85%', height: '75%' }, colors: ['#DB4B18'] });
    });
  }
</script>

<?php
include_once(__DIR__ . '/views/footer.php');
?>
