<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$dialog = new \Kendo\UI\Dialog('dialog');
$skipAction = new \Kendo\UI\DialogAction();
$skipAction->text("Skip this version");

$remindAction = new \Kendo\UI\DialogAction();
$remindAction->text("Remind me later");

$intallAction = new \Kendo\UI\DialogAction();
$intallAction->text("Install update")
             ->primary(true);

$dialog->title('Software Update')
       ->width('400px')
       ->closable(false)
       ->modal(false)
       ->addAction($skipAction, $remindAction, $intallAction)
       ->content('<p>A new version of <strong>Kendo UI</strong> is available. Would you like to download and install it now?<p>');

echo $dialog->render();
?>

<div class="box wide hidden-on-narrow" style="z-index:10000">
    <div class="box-col">
        <h4>API Functions</h4>
        <ul class="options">
            <li>
                <button id="open" class="k-button">Open</button>
                <button id="close" class="k-button">Close</button>
            </li>
        </ul>
    </div>
</div>

<div class="responsive-message"></div>

<script>
    $("#open").click(function (e) {
        $("#dialog").data("kendoDialog").open();
    });

    $("#close").click(function (e) {
        $("#dialog").data("kendoDialog").close();
    });
</script>
<style>
    #example {
        min-height: 200px;
    }
</style>
<?php require_once '../include/footer.php'; ?>
