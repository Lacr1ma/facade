<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

?>

<div class="box">
    <div class="box-col">
        <h4>Button API Functions</h4>
        <ul class="options">
            <li>
                <button class="k-button" id="enableButton" type="button">Enable</button>
                <button class="k-button" id="disableButton" type="button">Disable</button>
            </li>
        </ul>
    </div>
</div>

<div class="demo-section k-content">
<?php

$iconTextButton = new \Kendo\UI\Button('iconTextButton');
$iconTextButton->attr('type', 'button')
               ->icon('ungroup')
               ->content('Kendo UI Button');

echo $iconTextButton->render();

?>
</div>

<script>

  $(document).ready(function () {
    var buttonObject = $("#iconTextButton").data("kendoButton");

    $("#enableButton").click(function () {
      buttonObject.enable(true);
    });

    $("#disableButton").click(function () {
      buttonObject.enable(false);
    });
  });

</script>

<style>
3

<?php require_once '../include/footer.php'; ?>