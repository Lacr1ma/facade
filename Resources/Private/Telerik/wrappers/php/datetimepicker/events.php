<?php

require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>
<div class="demo-section k-content">
    <h4>Select date</h4>
<?php
$dateTimePicker = new \Kendo\UI\DateTimePicker('datetimepicker');
$dateTimePicker->open('onOpen')
           ->close('onClose')
           ->change('onChange')
           ->attr('style', 'width: 100%;');

echo $dateTimePicker->render();
?>
</div>
<div class="box">                
    <h4>Console log</h4>
    <div class="console"></div>
</div>
<script>
    function onOpen() {
        kendoConsole.log("Open");
    }

    function onClose() {
        kendoConsole.log("Close");
    }

    function onChange() {
        kendoConsole.log("Change :: " + kendo.toString(this.value(), 'd'));
    }
</script>
<?php require_once '../include/footer.php'; ?>
