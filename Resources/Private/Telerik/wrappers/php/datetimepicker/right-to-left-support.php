<?php

require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>
<div class="demo-section k-content">
    <div class="k-rtl">
        <h4>Choose date:</h4>
<?php
$dateTimePicker = new \Kendo\UI\DateTimePicker('datetimepicker');
$dateTimePicker->attr('style', 'width: 100%;');

echo $dateTimePicker->render();
?>
    </div>
</div>
<?php require_once '../include/footer.php'; ?>
