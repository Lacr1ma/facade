<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

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
    <div class="box-col">
    <h4>&nbsp;</h4>
    <ul class="options">
        <li>
            <button id="refresh" class="k-button">Refresh</button>
            <button id="center" class="k-button">Center</button>
        </li>
    </ul>
    </div>
    <div class="box-col">
    <h4>&nbsp;</h4>
    <ul class="options">
        <li>
            <button id="pin" class="k-button">Pin</button>
            <button id="unpin" class="k-button">Unpin</button>
        </li>
    </ul>
    </div>
</div>

<?php
    $window = new \Kendo\UI\Window('window');

    $window->title('Rams\'s Ten Principles of Good Design')
           ->width('505px')
           ->height('315px')
           ->actions(array("Pin", "Refresh", "Maximize", "Close"))
           ->content(array( "url" => "../content/web/window/ajax/ajaxContent1.html"));

    echo $window->render();
?>

<div class="responsive-message"></div>

<script>
    $(document).ready(function() {
        var myWindow = $("#window");

        $("#open").click( function (e) {
            myWindow.data("kendoWindow").open();
        });

        $("#close").click( function (e) {
            myWindow.data("kendoWindow").close();
        });

        $("#refresh").click( function (e) {
            myWindow.data("kendoWindow").refresh();
        });
        
        $("#center").click(function (e) {
            myWindow.data("kendoWindow").center();
        });

        $("#pin").click(function (e) {
            myWindow.data("kendoWindow").pin();
        });

        $("#unpin").click(function (e) {
            myWindow.data("kendoWindow").unpin();
        });
    });
</script>

<style>

    #example {
         min-height: 600px;
    }

    @media screen and (max-width: 1023px) {
        div.k-window {
            display: none !important;
        }
    }

</style>

<?php require_once '../include/footer.php'; ?>
