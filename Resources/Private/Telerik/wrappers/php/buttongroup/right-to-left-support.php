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
?>

<div class="demo-section k-rtl k-content">
    <div>
        <?php echo $player->render(); ?>
    </div>
</div>

<?php require_once '../include/footer.php'; ?>
