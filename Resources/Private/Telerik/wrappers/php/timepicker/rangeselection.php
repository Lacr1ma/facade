<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>
<div class="demo-section k-content">
    <h4>Start time</h4>
<?php
$start = new \Kendo\UI\TimePicker('start');

$start->value('8:00 AM')
      ->change('startChange')
      ->attr('style', 'width: 100%');

echo $start->render();
?>
    <h4 style="margin-top: 2em;">End time</h4>
<?php
$end = new \Kendo\UI\TimePicker('end');

$end->value('8:30 AM');
$end->attr('style', 'width: 100%');

echo $end->render();
?>
</div>
<script>
    var start, end;

    function startChange() {
        var startTime = start.value();

        if (startTime) {
            startTime = new Date(startTime);

            end.max(startTime);

            startTime.setMinutes(startTime.getMinutes() + this.options.interval);

            end.min(startTime);
            end.value(startTime);
        }
    }
    $(document).ready(function() {
        start = $("#start").data("kendoTimePicker");

        end = $("#end").data("kendoTimePicker");

        //define min/max range
        start.min("8:00 AM");
        start.max("6:00 PM");

        //define min/max range
        end.min("8:00 AM");
        end.max("7:30 AM");
    });
</script>

<?php require_once '../include/footer.php'; ?>
