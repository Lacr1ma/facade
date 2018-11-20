<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>
 <div class="demo-section k-content">            
    <h4>Select time</h4>
<?php
$timePicker = new \Kendo\UI\TimePicker('timepicker');

$timePicker->change('onChange')
           ->close('onClose')
           ->open('onOpen')
           ->attr('style', 'width: 100%');

echo $timePicker->render();
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
        kendoConsole.log("Change :: " + kendo.toString(this.value(), 't'));
    }
</script>
<?php require_once '../include/footer.php'; ?>
