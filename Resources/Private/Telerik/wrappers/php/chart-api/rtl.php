<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/chart_data.php';

require_once '../include/header.php';
?>

<?php
$total = new \Kendo\Dataviz\UI\ChartSeriesItem();
$total->name('Total Visits')
      ->data(array(56000, 63000, 74000, 91000, 117000, 138000))
      ->markers(array('type' => 'square'));

$unique = new \Kendo\Dataviz\UI\ChartSeriesItem();
$unique->name('Unique visitors')
       ->data(array(52000, 34000, 23000, 48000, 67000, 83000));

$valueAxis = new \Kendo\Dataviz\UI\ChartValueAxisItem();
$valueAxis->line(array('visible' => false));

$categoryAxis = new \Kendo\Dataviz\UI\ChartCategoryAxisItem();
$categoryAxis->categories(array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'))
             ->majorGridLines(array('visible' => true));

$chart = new \Kendo\Dataviz\UI\Chart('chart');
$chart->title(array('text' => 'Site Visitors Stats /thousands/'))
    ->legend(array('position' => 'bottom'))
    ->addValueAxisItem($valueAxis)
    ->addCategoryAxisItem($categoryAxis)
    ->seriesDefaults(array('type' => 'column'))
    ->addSeriesItem($total, $unique)
    ->tooltip(array('visible' => true, 'shared' => true));
?>

<div class="k-rtl">
    <div class="demo-section k-content wide">
        <?php
        echo $chart->render();
        ?>
    </div>
</div>
<?php require_once '../include/footer.php'; ?>
