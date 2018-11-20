<?php
require_once '../lib/Kendo/Autoload.php';

require_once '../include/header.php';
?>
<div class="demo-section k-content wide">
<?php
$ft3 = new \Kendo\Dataviz\UI\ChartSeriesItem();
$ft3->name('at 3 ft')
    ->data(array(
           array(150, 3), array(150, 3.1), array(152, 3.2),
           array(152, 3.1), array(151, 3.2), array(153, 3.3),
           array(149, 3)
       ));

$ft7 = new \Kendo\Dataviz\UI\ChartSeriesItem();
$ft7->name('at 7 ft')
    ->data(array(
           array(270, 5), array(250, 7), array(259, 4),
           array(270, 7), array(265, 5), array(250, 7),
           array(263, 8), array(261, 5)
       ));

$yAxis = new \Kendo\Dataviz\UI\ChartYAxisItem();
$yAxis->max(10);

$chart = new \Kendo\Dataviz\UI\Chart('chart');
$chart->title(array('text' => 'Buck spread'))
      ->addSeriesItem($ft3, $ft7)
      ->seriesDefaults(array('type' => 'polarScatter'))
      ->legend(array('position' => 'bottom'))
      ->addYAxisItem($yAxis);

echo $chart->render();
?>
</div>
<?php require_once '../include/footer.php'; ?>
