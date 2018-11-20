<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>

<div class="box hidden-on-narrow" style="margin-bottom: 30px;">                
    <h4>Console log</h4>
    <div class="console"></div>
</div>

<?php
    $window = new \Kendo\UI\Window('window');

    $window->title('Rams\'s Ten Principles of Good Design')
           ->width('630px')
           ->height('315px')
           ->actions(array("Refresh", "Close"))
           ->content(array( "url" => "../content/web/window/ajax/ajaxContent1.html"))
           ->open("onOpen")
           ->close("onClose")
           ->activate("onActivate")
           ->deactivate("onDeactivate")
           ->refresh("onRefresh")
           ->resize("onResize")
           ->dragstart("onDragStart")
           ->dragend("onDragEnd");

    echo $window->render();
?>


<span id="undo" style="display:none" class="k-button hidden-on-narrow">Click here to open the window.</span>

<div class="responsive-message"></div>

<script>
    function onOpen(e) {
        kendoConsole.log("event :: open");
    }

    function onClose(e) {
        $("#undo").show();
        kendoConsole.log("event :: close");
    }

    function onActivate(e) {
        kendoConsole.log("event :: activate");
    }

    function onDeactivate(e) {
        kendoConsole.log("event :: deactivate");
    }

    function onRefresh(e) {
        kendoConsole.log("event :: refresh");
    }

    function onResize(e) {
        kendoConsole.log("event :: resize");
    }

    function onDragStart(e) {
        kendoConsole.log("event :: dragstart");
    }

    function onDragEnd(e) {
        kendoConsole.log("event :: dragend");
    }

    $("#undo")
        .bind("click", function() {
            $("#window").data("kendoWindow").open();
            $("#undo").hide();
        });
</script>

<style>

    #example
    {
        min-height:600px;
    }

    #undo {
        text-align: center;
        position: absolute;
        white-space: nowrap;
        padding: 1em;
        cursor: pointer;
    }

    @media screen and (max-width: 1023px) {
        div.k-window {
            display: none !important;
        }
    }

</style>

<?php require_once '../include/footer.php'; ?>
