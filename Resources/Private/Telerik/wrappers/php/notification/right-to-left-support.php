<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>

<?php

$position = new \Kendo\UI\NotificationPosition();
$position->top(30);
$position->left(30);

$popupNotification = new \Kendo\UI\Notification('popupNotification');
$popupNotification->position($position);
$popupNotification->button(true);

echo $popupNotification->render();

$staticNotification = new \Kendo\UI\Notification('staticNotification');
$staticNotification->appendTo('#appendto');
$staticNotification->button(true);

echo $staticNotification->render();

?>

<div class="k-rtl">
    <span id="popupNotification"></span>
    <span id="staticNotification"></span>

    <div class="demo-section k-content">
       <h4>Show notification</h4>
       <p>
           <button id="showPopupNotification" class="k-button">As a popup at top-left</button><br />
           <button id="showStaticNotification" class="k-button">Static in the panel below</button>
       </p>
       <div style="padding-top: 1em;">
           <h4>Hide notification</h4>
           <button id="hideAllNotifications" class="k-button">Hide All Notifications</button>
       </div>
   </div>
   
   <div id="appendto" class="demo-section k-content"></div>
</div>

<style>
    .demo-section p {
        margin: 3px 0 20px;
        line-height: 40px;
    }
    .demo-section .k-button {
        width: 250px;
    }
</style>
<script>
  $(document).ready(function() {
  var popupNotification = $("#popupNotification").data("kendoNotification");
  var staticNotification = $("#staticNotification").data("kendoNotification");

  $("#showPopupNotification").click(function(){
    var d = new Date();
    popupNotification.show(kendo.toString(d, 'HH:MM:ss.') + kendo.toString(d.getMilliseconds(), "000"), "error");
  });

  $("#showStaticNotification").click(function(){
    var d = new Date();
    staticNotification.show(kendo.toString(d, 'HH:MM:ss.') + kendo.toString(d.getMilliseconds(), "000"), "info");
    var container = $(staticNotification.options.appendTo);
    container.scrollTop(container[0].scrollHeight);
  });

  $("#hideAllNotifications").click(function(){
    popupNotification.hide();
    staticNotification.hide();
  });

  });
</script>

<?php require_once '../include/footer.php'; ?>