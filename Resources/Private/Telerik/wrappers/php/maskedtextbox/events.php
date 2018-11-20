<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$maskedtextbox = new \Kendo\UI\MaskedTextBox('maskedtextbox');

$maskedtextbox->mask("(999) 000-0000");

$maskedtextbox->change('onChange');
$maskedtextbox->attr('style', 'width: 100%');

?>

<div class="demo-section k-content">
    <h4>Enter phone number</h4>
<?php
echo $maskedtextbox->render();
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
</script>
<?php require_once '../include/footer.php'; ?>
