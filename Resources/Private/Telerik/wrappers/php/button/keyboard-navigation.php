<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>
<div class="box">
    <div class="box-col">
        <h4>Focus</h4>
        <ul class="keyboard-legend">
            <li>
                <span class="button-preview">
                    <span class="key-button leftAlign">Alt</span>
                    +
                    <span class="key-button">W</span>
                </span>
                <span class="button-descr">
                    Focuses the first button (clicking on it or tabbing will also work).
                </span>
            </li>
        </ul>
    </div>
    <div class="box-col">
        <h4>Supported keys and user actions</h4>
        <ul class="keyboard-legend">
            <li>
                <span class="button-preview">
                    <span class="key-button">Enter</span> or <span class="key-button">Space</span>
                </span>
                <span class="button-descr">
                    Trigger click event.
                </span>
            </li>
        </ul>
    </div>
</div>

<div class="demo-section k-content">                
    <h4>Buttons</h4>
<?php
$textButton = new \Kendo\UI\Button('textButton');
$textButton->attr('type', 'button')
           ->content('Text button')
           ->click('onClick');

echo $textButton->render();

echo " ";

$iconTextButton = new \Kendo\UI\Button('iconTextButton');
$iconTextButton->tag('span')
               ->icon('ungroup')
               ->content('Icon and text')
               ->click('onClick');

echo $iconTextButton->render();

echo " ";

$iconButton = new \Kendo\UI\Button('iconButton');
$iconButton->tag('em')
           ->icon('refresh')
           ->click('onClick');

echo $iconButton->render();

echo " ";

$disabledButton = new \Kendo\UI\Button('disabledButton');
$disabledButton->tag('a')
               ->enable(false)
               ->content('Disabled button')
               ->click('onClick');

echo $disabledButton->render();

?>
</div>

<div class="box">                
    <h4>Console log</h4>
    <div class="console"></div>
</div>

<script>
  function onClick(e) {
    kendoConsole.log("event :: click (" + $(e.event.target).closest(".k-button").attr("id") + ")");
  }

  $(document.body).keydown(function (e) {
    if (e.altKey && e.keyCode == 87) {
      $("#textButton")[0].focus();
    }
  });
</script>

<style>
    .demo-section {
        line-height: 4em;
    }

    .demo-section .k-button {
        margin-right: 10px;
    }
</style>

<?php require_once '../include/footer.php'; ?>