<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>

<div class="demo-section k-content" style="text-align: center;">
<h4>Multiple Date Selection</h4>
<?php
$array = array(
    "sa", "su",
);

$calendar = new \Kendo\UI\Calendar('weekend-calendar');

$calendar->disableDates($array)
		 ->weekNumber(true)
		 ->selectable("multiple");

echo $calendar->render();
?>

</div>
<?php require_once '../include/footer.php'; ?>
