<?php

require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>
<div class="demo-section k-content">
    <div class="k-rtl">
        <h4>Choose date:</h4>
<?php
$datePicker = new \Kendo\UI\DatePicker('datepicker');
$datePicker-> attr('style', 'width: 100%');
echo $datePicker->render();
?>
    </div>
</div>
<?php require_once '../include/footer.php'; ?>
