<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$buttonGroup = new \Kendo\UI\ButtonGroup('select-period');
$one = new \Kendo\UI\ButtonGroupItem();
$one
    ->badge("3")
    ->text("One");
$two = new \Kendo\UI\ButtonGroupItem();
$two->text("Two");
$three = new \Kendo\UI\ButtonGroupItem();
$three->text("Three");

$buttonGroup->addItem($one, $two, $three);
?>

<div class="demo-section k-content">
    <div>
        <?php echo $buttonGroup->render(); ?>
    </div>
</div>

<style>
   .demo-section {
       text-align: center;
   }
</style>
<?php require_once '../include/footer.php'; ?>
