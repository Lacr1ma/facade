<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>

<div class="demo-section k-content" style="text-align: center;">
<h4>Pick a date</h4>
<?php
$calendar = new \Kendo\UI\Calendar('calendar');
$calendar->attr('style', 'width: 243px')
         ->change('onChange')
         ->navigate('onNavigate');

echo $calendar->render();
?>
</div>

<div class="box" style="text-align: center;">
    <h4>Events log</h4>
    <div class="console"></div>
</div>

<script>
    function onChange() {
        kendoConsole.log("Change :: " + kendo.toString(this.value(), 'd'));
    }

    function onNavigate() {
        kendoConsole.log("Navigate");
    }
</script>

<?php require_once '../include/footer.php'; ?>
