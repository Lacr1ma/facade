<?php

require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>

<?php
$start = new \Kendo\UI\DateTimePicker('start');
$start->value(new DateTime('now', new DateTimeZone('UTC')))
      ->parseFormats(array('MM/dd/yyyy'))
      ->change('startChange')
      ->attr('style', 'width: 100%;');

$end = new \Kendo\UI\DateTimePicker('end');
$end->value(new DateTime('now', new DateTimeZone('UTC')))
    ->parseFormats(array('MM/dd/yyyy'))
    ->change('endChange')
    ->attr('style', 'width: 100%;');
?>
<div class="demo-section k-content">
    <h4>Start date</h4>
    <?= $start->render() ?>

    <h4 style="margin-top: 2em;">End date</h4>
    <?= $end->render() ?>
</div>
<script>
    var start, end;

    function startChange() {
        var startDate = start.value();

        if (startDate) {
            startDate = new Date(startDate);
            startDate.setDate(startDate.getDate() + 1);
            end.min(startDate);
        }
    }

    function endChange() {
        var endDate = end.value();

        if (endDate) {
            endDate = new Date(endDate);
            endDate.setDate(endDate.getDate() - 1);
            start.max(endDate);
        }
    }

    $(document).ready(function() {
        start = $("#start").data("kendoDateTimePicker");
        end = $("#end").data("kendoDateTimePicker");

        start.max(end.value());
        end.min(start.value());
    });

</script>
<?php require_once '../include/footer.php'; ?>
