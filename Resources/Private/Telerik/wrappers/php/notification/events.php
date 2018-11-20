<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>

<?php

$timeTemplate = new \Kendo\UI\NotificationTemplate();
$timeTemplate->type('time');
$timeTemplate->template("<div style='padding: .6em 1em'>Time is: <span class='timeWrap'>#: time #</span></div>");

$notification = new \Kendo\UI\Notification('notification');
$notification->width("12em");
$notification->addTemplate($timeTemplate);
$notification->show("onShow");
$notification->hide("onHide");

echo $notification->render();

?>

 <div class="demo-section k-content" style="text-align: center;">
    <p>
        <button id="showNotification" class="k-button k-primary">Show</button> &nbsp; &nbsp;

        <button id="hideAllNotifications" class="k-button">Hide All</button>
    </p>
</div>
 
 <div class="box">                
    <h4>Console log</h4>
    <div class="console"></div>
</div>

<script>

    function onShow(e) {
        kendoConsole.log("event :: show (" + $(e.element).find(".timeWrap").text() + ")");
    }

    function onHide(e) {
        kendoConsole.log("event :: hide (" + $(e.element).find(".timeWrap").text() + ")");
    }

    $(document).ready(function () {

        var notification = $("#notification").data("kendoNotification");

        $("#showNotification").click(function () {
            var d = new Date();
            notification.show({ time: kendo.toString(d, 'HH:MM:ss.') + kendo.toString(d.getMilliseconds(), "000") }, "time");
        });

        $("#hideAllNotifications").click(function () {
            notification.hide();
        });
    });
</script>

<?php require_once '../include/footer.php'; ?>