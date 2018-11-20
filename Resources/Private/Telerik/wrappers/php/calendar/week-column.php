<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>

<div class="demo-section k-content" style="text-align: center;">
    <h4>Pick a date</h4>
<?php
$calendar = new \Kendo\UI\Calendar('calendar');
$messages = new \Kendo\UI\CalendarMessages('calendarMessages');
$messages -> weekColumnHeader('Wk');

$calendar->weekNumber(true)
		 ->messages($messages);


echo $calendar->render();
?>
</div>

<?php require_once '../include/footer.php'; ?>