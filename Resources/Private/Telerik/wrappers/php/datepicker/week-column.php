<?php

require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>
<div class="demo-section k-content">
        <h4>Show e-mails from:</h4>
<?php
$datePicker = new \Kendo\UI\DatePicker('datepicker');

$datePicker->value(new DateTime('10/10/2011', new DateTimeZone('UTC')))
           ->attr('style', 'width: 100%');

$datePicker->weekNumber(true);

echo $datePicker->render();
?>

</div>
<?php require_once '../include/footer.php'; ?>