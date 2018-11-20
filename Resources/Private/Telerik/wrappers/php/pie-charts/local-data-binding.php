<?php
require_once '../lib/Kendo/Autoload.php';

require_once '../include/header.php';

$series = new \Kendo\Dataviz\UI\ChartSeriesItem();
$series->type('pie')
       ->field('percentage')
       ->categoryField('source')
       ->explodeField('explode');

$dataSource = new \Kendo\Data\DataSource();

$dataSource->data(array(
    array('source' => 'Hydro', 'percentage' => 22, 'explode' => true),
    array('source' => 'Solar', 'percentage' => 2),
    array('source' => 'Nuclear', 'percentage' => 49),
    array('source' => 'Wind', 'percentage' => 27)
));

$chart = new \Kendo\Dataviz\UI\Chart('chart');

$chart->title(array('text' => 'Break-up of Spain Electricity Production for 2008'))
      ->dataSource($dataSource)
      ->addSeriesItem($series)
      ->legend(array('position' => 'bottom'))
      ->seriesColors(array("#03a9f4", "#ff9800", "#fad84a", "#4caf50"))
      ->tooltip(array('visible' => true, 'template' => '${ category } - ${ value }%'));
?>
<div class="demo-section k-content wide">
<?php
echo $chart->render();
?>
</div>
<?php require_once '../include/footer.php'; ?>
