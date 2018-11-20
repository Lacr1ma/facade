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
       ->close('onClose')
       ->addAction($skipAction, $remindAction, $intallAction)
       ->content('<p>A new version of <strong>Kendo UI</strong> is available. Would you like to download and install it now?<p>');

echo $dialog->render();
?>

<div style="position: relative;height:40px;">
    <span id="show" style="display:none" class="k-button hidden-on-narrow">Click here to open the dialog.</span>
</div>

<div class="box wide hidden-on-narrow">
    <div class="box-col">
        <h4>Supported keys and user actions</h4>
        <ul class="keyboard-legend">
            <li>
                <span class="button-preview">
                    <span class="key-button leftAlign wider">alt</span>
                    <span class="key-button">w</span>
                </span>
                <span class="button-descr">
                    focuses dialog
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">esc</span>
                </span>
                <span class="button-descr">
                    closes dialog
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button leftAlign wider">enter</span> /
                    <span class="key-button">space</span>
                </span>
                <span class="button-descr">
                    triggers the focused action and the close button if focused
                </span>
            </li>
        </ul>
    </div>
</div>

<div class="responsive-message"></div>

<script>
    function onClose() {
        $("#show").fadeIn();
    }

    $("#show").click(function () {
        $("#dialog").data("kendoDialog").open();
        $("#show").fadeOut();
    });

    // focus the widget's element
    $(document).on("keydown.examples", function (e) {
        if (e.altKey && e.keyCode === 87 /* w */) {
            $("#dialog").get(0).focus();
        }
    });
</script>

<style>
    #example {
        min-height: 350px;
    }
    
    #example {
        margin-top: 250px;
    }

    #show {
        text-align: center;
        position: absolute;
        white-space: nowrap;
        padding: 1em;
        cursor: pointer;
    }
</style>

<?php require_once '../include/footer.php'; ?>
