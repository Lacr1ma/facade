<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>

<div class="demo-section k-content">
    <h4>Select time</h4>
<?php
$timePicker = new \Kendo\UI\TimePicker('timepicker');
$timePicker->attr('style', 'width: 100%');

echo $timePicker->render();

?>
</div>
<div class="box wide">
    <div class="box-col">
    <h4>API Functions</h4>
    <ul class="options">
       <li>
           <input id="value" value="10:30 AM" style="float:none" />
           <button id="set" class="k-button">Set value</button>
       </li>
       <li  style="text-align: right;">
           <button id="get" class="k-button">Get value</button>
       </li>
    </ul>
    </div>

    <div class="box-col">
    <h4>Enable / Disable</h4>
    <ul class="options">
       <li>
           <button id="enable" class="k-button">Enable</button>
           <button id="disable" class="k-button">Disable</button>
        
       </li>
       <li>
           <button id="readonly" class="k-button">Readonly</button>
       </li>
    </ul>
    </div>

    <div class="box-col">
    <h4>Calendar Open / Close</h4>
    <ul class="options">
       <li>
           <button id="open" class="k-button">Open</button>
           <button id="close" class="k-button">Close</button>
        
       </li>
    </ul>
    </div>
</div>            

<script>
    $(document).ready(function() {
        var timepicker = $("#timepicker").data("kendoTimePicker");

        var setValue = function () {
            timepicker.value($("#value").val());
        };

        $("#enable").click(function() {
            timepicker.enable();
        });

        $("#disable").click(function() {
            timepicker.enable(false);
        });

        $("#readonly").click(function() {
            timepicker.readonly();
        });

        $("#open").click(function() {
            timepicker.open();
        });

        $("#close").click(function() {
            timepicker.close();
        });

        $("#value").kendoTimePicker();

        $("#set").click(setValue);

        $("#get").click(function() {
            alert(timepicker.value());
        });
    });
</script>

<?php require_once '../include/footer.php'; ?>
