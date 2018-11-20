<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>
<div class="k-rtl">
    <div class="demo-section k-content">
        <h4>Pick a day:</h4>
<?php
$calendar = new \Kendo\UI\Calendar('calendar');
echo $calendar->render();
?>
    </div>
</div>
<?php require_once '../include/footer.php'; ?>
