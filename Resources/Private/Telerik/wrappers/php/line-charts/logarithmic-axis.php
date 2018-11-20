<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/chart_data.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $result = chart_spain_electricity_production();

    echo json_encode($result);

    exit;
}

require_once '../include/header.php';
?>
<div class="demo-section k-content wide">
<?php
$nuclear = new \Kendo\Dataviz\UI\ChartSeriesItem();
$nuclear->field('nuclear')
        ->categoryField('year')
        ->name('Nuclear');

$hydro = new \Kendo\Dataviz\UI\ChartSeriesItem();
$hydro->field('hydro')
      ->categoryField('year')
      ->name('Hydro');

$wind = new \Kendo\Dataviz\UI\ChartSeriesItem();
$wind->field('wind')
     ->categoryField('year')
     ->name('Wind');

$valueAxis = new \Kendo\Dataviz\UI\ChartValueAxisItem();

$valueAxis->labels(array('format' => 'N0'))
          ->minorGridLines(array('visible' => true))
          ->type('log');

$categoryAxis = new \Kendo\Dataviz\UI\ChartCategoryAxisItem();

$categoryAxis->labels(array('rotation' => -90))
			 ->crosshair(array('visible' => true));

$tooltip = new \Kendo\Dataviz\UI\ChartTooltip();
$tooltip->visible(true)
        ->format('N0')
		->shared(true);

$transport = new \Kendo\Data\DataSourceTransport();
$transport->read(array('url' => 'remote-data-binding.php', 'type' => 'POST', 'dataType' => 'json'));

$dataSource = new \Kendo\Data\DataSource();

$dataSource->transport($transport)
           ->addSortItem(array('field' => 'year', 'dir' => 'asc'));

$chart = new \Kendo\Dataviz\UI\Chart('chart');
$chart->title(array('text' => 'Spain electricity production (GWh)'))
      ->dataSource($dataSource)
      ->legend(array('position' => 'top'))
      ->addSeriesItem($nuclear, $hydro, $wind)
      ->addValueAxisItem($valueAxis)
      ->addCategoryAxisItem($categoryAxis)
      ->seriesDefaults(array('type' => 'line'))
      ->tooltip($tooltip);

echo $chart->render();
?>
</div>
<?php require_once '../include/footer.php'; ?>
