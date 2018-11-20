<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$numeric = new \Kendo\UI\NumericTextBox('numerictextbox');

$numeric->change('onChange')
        ->spin('onSpin')
        ->attr('style', 'width: 100%');

?>

<div class="demo-section k-content">
    <h4>Set value</h4>
<?php
echo $numeric->render();
?>
</div>

<div class="box">
    <h4>Console log</h4>
    <div class="console"></div>
</div>

<script>
    function onChange() {
        kendoConsole.log("Change :: " + this.value());
    }

    function onSpin() {
        kendoConsole.log("Spin :: " + this.value());
    }
</script>
<?php require_once '../include/footer.php'; ?>
