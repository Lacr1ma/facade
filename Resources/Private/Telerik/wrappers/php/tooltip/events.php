<?php
require_once '../lib/Kendo/Autoload.php';

require_once '../include/header.php';

$tooltip = new \Kendo\UI\Tooltip('#autohide-true'); // select the container for the tooltip
$tooltip->show('onShow')
    ->hide('onHide')
    ->content('Hello!')
    ->position('top');

echo $tooltip->render();

$tooltip = new \Kendo\UI\Tooltip('#autohide-false'); // select the container for the tooltip
$tooltip->show('onShow')
    ->hide('onHide')
    ->autoHide(false)
    ->content('Hello!')
    ->position('top');

echo $tooltip->render();
?>

    <div class="demo-section k-content">
        <span id="autohide-true" class="k-button wider">Hover me!</span>
        <span id="autohide-false" class="k-button wider">Hover me too!</span>
    </div>

    <div class="box">
        <h4>Console log</h4>
        <div class="console"></div>
    </div>
            

    <script>
        function onShow(e) {
            kendoConsole.log("event :: show");
        }

        function onHide(e) {
            kendoConsole.log("event :: hide");
        }
    </script>

    <style>
        .demo-section {
            text-align: center;
        }
        .wider {
            display: block;
            margin: 20px 0;
            padding: 15px 8px;
            line-height: 23px;
            width: 100%;
        }
    </style>

<?php require_once '../include/footer.php'; ?>
