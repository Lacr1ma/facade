<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
  $buttonGroup = new \Kendo\UI\ButtonGroup('select-period');
  $month = new \Kendo\UI\ButtonGroupItem();
  $month->text("Month");
  $quarter = new \Kendo\UI\ButtonGroupItem();
  $quarter->text("Quarter");
  $year = new \Kendo\UI\ButtonGroupItem();
  $year->text("Year");

  $buttonGroup->addItem($month, $quarter, $year);
?>

<div class="box">
  <div class="box-col">
      <h4>Enable / Disable</h4>
      <ul class="options">
          <li>
              <button class="k-button" id="enableButtonGroup" type="button">Enable</button>
              <button class="k-button" id="disableButtonGroup" type="button">Disable</button>
          </li>
      </ul>
  </div>

  <div class="box-col">
      <h4>Select</h4>
      <ul class="options">
          <li>
              <input type="text" value="0" id="buttonIndex" class="k-textbox" /> <button type="button" id="selectButton" class="k-button">Select</button>
          </li>
      </ul>
  </div>
</div>

<div class="demo-section k-content">
  <?php echo $buttonGroup->render(); ?>
</div>

<script>
  $(document).ready(function() {
    var buttonGroup = $("#select-period").data("kendoButtonGroup");

    $("#enableButtonGroup").click(function(){
        buttonGroup.enable(true);
    });

    $("#disableButtonGroup").click(function () {
        buttonGroup.enable(false);
    });

    $("#selectButton").click(function () {
        buttonGroup.select(parseInt($("#buttonIndex").val()));
    });
  });
</script>

<style>
    .demo-section {
        text-align: center;
    }
    .box .k-textbox {
        margin: 0;
        width: 80px;
    }
</style>
<?php require_once '../include/footer.php'; ?>