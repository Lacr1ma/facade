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
       ->initOpen("onInitOpen")
       ->open(onOpen)
       ->show(onShow)
       ->hide(onHide)
       ->close(onClose)
       ->addAction($skipAction, $remindAction, $intallAction)
       ->content('<p>A new version of <strong>Kendo UI</strong> is available. Would you like to download and install it now?<p>');

echo $dialog->render();
?>

<div class="box hidden-on-narrow">
    <h4>Console log</h4>
    <div class="console"></div>
</div>
<span id="show" style="display:none" class="k-button hidden-on-narrow">Click here to open the window.</span>

<div class="responsive-message"></div>

<script>
    var dialog = $("#dialog");
    var show = $("#show");

    function onInitOpen(e) {
        kendoConsole.log("event :: initOpen");
    }

    function onOpen(e) {
        kendoConsole.log("event :: open");
    }

    function onShow(e) {
        kendoConsole.log("event :: show");
    }

    function onHide(e) {
        kendoConsole.log("event :: hide");
    }

    function onClose(e) {
        show.fadeIn();
        kendoConsole.log("event :: close");
    }

    show.click(function () {
        dialog.data("kendoDialog").open();
        show.fadeOut();
    });
</script>

<style>
    #example {
        min-height: 370px;
    }

        #example .box {
            margin: 0;
        }

    #show {
        text-align: center;
        position: absolute;
        white-space: nowrap;
        padding: 1em;
        cursor: pointer;
        margin-top: 30px;
    }
</style>
<?php require_once '../include/footer.php'; ?>