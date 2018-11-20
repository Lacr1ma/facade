<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$player = new \Kendo\UI\ButtonGroup('player');

$play = new \Kendo\UI\ButtonGroupItem();
$play
    ->icon("play")
    ->text("Play");
$pause = new \Kendo\UI\ButtonGroupItem();
$pause
    ->icon("pause")
    ->text("pause");
$stop = new \Kendo\UI\ButtonGroupItem();
$stop
    ->icon("stop")
    ->text("stop");

$player->addItem($play, $pause, $stop);

$player2 = new \Kendo\UI\ButtonGroup('player2');

$play = new \Kendo\UI\ButtonGroupItem();
$play
    ->icon("play");
$pause = new \Kendo\UI\ButtonGroupItem();
$pause
    ->icon("pause");
$stop = new \Kendo\UI\ButtonGroupItem();
$stop
    ->icon("stop");

$player2->addItem($play, $pause, $stop);

?>

<div class="demo-section k-content">
    <div>
        <h4>ButtonGroup with text and icon</h4>
        <?php echo $player->render(); ?>
        <br/><br/>
        <h4>ButtonGroup only with icons</h4>
        <?php echo $player2->render(); ?>
    </div>
</div>

<style>
   .demo-section {
       text-align: center;
   }
</style>
<?php require_once '../include/footer.php'; ?>
