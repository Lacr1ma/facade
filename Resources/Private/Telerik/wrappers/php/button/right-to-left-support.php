<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>

<div class="demo-section k-rtl k-content">
    <h4>Basic Button</h4>
    <p>

<?php

$textButton = new \Kendo\UI\Button('textButton');
$textButton->attr('type', 'button')
           ->content('Submit');

echo $textButton->render();

?>
    </p>
    
    <h4>Buttons with icons</h4>
    <p>
<?php

$iconTextButton = new \Kendo\UI\Button('iconTextButton');
$iconTextButton->tag('a')
               ->icon('funnel')
               ->content('Filter');

echo $iconTextButton->render();

echo " ";

$iconButton = new \Kendo\UI\Button('iconButton');
$iconButton->tag('em')
           ->icon('refresh')
           ->content('<span class="k-icon">Refresh</span>');

echo $iconButton->render();

?>
    </p>
    
    <h4>Disabled Button</h4>
    <p>
<?php

$disabledButton = new \Kendo\UI\Button('disabledButton');
$disabledButton->tag('span')
               ->enable(false)
               ->content('Disabled');

echo $disabledButton->render();

?>

</div>

<style>
    .demo-section p {
        margin: 0 0 30px;
        line-height: 4em;
    }
    .demo-section .k-button {
        margin-left: 10px;
    }
    #textButton, #disabledButton {
        width: 150px;
    }
</style>

<?php require_once '../include/footer.php'; ?>