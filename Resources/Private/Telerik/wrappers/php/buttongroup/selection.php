<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$align = new \Kendo\UI\ButtonGroup('align');

$alignLeft = new \Kendo\UI\ButtonGroupItem();
$alignLeft
    ->icon("align-left");
$alignCenter = new \Kendo\UI\ButtonGroupItem();
$alignCenter
    ->icon("align-center");
$alignRight = new \Kendo\UI\ButtonGroupItem();
$alignRight
    ->icon("align-right");

$align->addItem($alignLeft, $alignCenter, $alignRight);

$inlineFormatting = new \Kendo\UI\ButtonGroup('inlineFormatting');
$inlineFormatting->selection("multiple");
$bold = new \Kendo\UI\ButtonGroupItem();
$bold
    ->icon("bold");
$italic = new \Kendo\UI\ButtonGroupItem();
$italic
    ->icon("italic");
$underline = new \Kendo\UI\ButtonGroupItem();
$underline
    ->icon("underline");

$inlineFormatting->addItem($bold, $italic, $underline);

?>

<div class="demo-section k-content">
    <div>
        <div class="box-col">
            <h4>Single Selection</h4>
            <?php echo $align->render(); ?>
        </div>
        <div class="box-col">
            <h4>Multiple Selection</h4>
            <?php echo $inlineFormatting->render(); ?>
        </div>
    </div>
</div>

<style>
   .demo-section {
       text-align: center;
   }
</style>
<?php require_once '../include/footer.php'; ?>
