<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>
 <div class="demo-section k-content k-rtl">
    <h4>Select time</h4>
<?php
$timePicker = new \Kendo\UI\TimePicker('timepicker');
$timePicker->attr('style', 'width: 100%');

echo $timePicker->render();
?>
</div>
<?php require_once '../include/footer.php'; ?>
