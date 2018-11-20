<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/chart_data.php';
require_once '../include/header.php';
?>
<div class="demo-section k-content wide">
<?php
$seriesA = new \Kendo\Dataviz\UI\ChartSeriesItem();
$seriesA->name('Task A')
        ->fromField('fromA')
        ->toField('toA')
        ->categoryField('day');

$valueAxis = new \Kendo\Dataviz\UI\ChartValueAxisItem();
$valueAxis->max(100);

$categoryAxis = new \Kendo\Dataviz\UI\ChartCategoryAxisItem();

$categoryAxis->majorGridLines(array('visible' => false));

$tooltip = new \Kendo\Dataviz\UI\ChartTooltip();
$tooltip->visible(true);

$dataSource = new \Kendo\Data\DataSource();

$dataSource->data(task_completeness());

$chart = new \Kendo\Dataviz\UI\Chart('chart');
$chart->title(array('text' => 'Task Completeness'))
      ->dataSource($dataSource)
      ->legend(array('visible' => true, 'position' => 'top'))
      ->addSeriesItem($seriesA)
      ->addValueAxisItem($valueAxis)
      ->addCategoryAxisItem($categoryAxis)
      ->seriesDefaults(array('type' => 'rangeArea', 'rangeArea' => array('line' => array('style' => 'smooth'))))
      ->tooltip($tooltip);

echo $chart->render();
?>
</div>
<?php require_once '../include/footer.php'; ?>