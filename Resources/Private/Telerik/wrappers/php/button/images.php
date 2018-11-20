<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>

<div class="demo-section k-content">
    <h4>Kendo UI Button with icons</h4>

<?php

$iconButton = new \Kendo\UI\Button('iconButton');
$iconButton->attr('type', 'button')
           ->spriteCssClass('k-icon netherlandsFlag')
           ->content('Sprite icon');

echo $iconButton->render();

echo " ";

$kendoIconButton = new \Kendo\UI\Button('kendoIconButton');
$kendoIconButton->attr('type', 'button')
                ->icon('funnel')
                ->content('Kendo UI sprite icon');

echo $kendoIconButton->render();

echo " ";

$imageButton = new \Kendo\UI\Button('imageButton');
$imageButton->attr('type', 'button')
            ->imageUrl('../content/shared/icons/sports/snowboarding.png')
            ->content('Image icon');

echo $imageButton->render();

?>

</div>

<style>
    .demo-section {
        line-height: 4em;
    }
    .demo-section .k-button {
        margin-right: 10px;
    }
    .k-button .k-image {
        height: 16px;
    }
    .netherlandsFlag {
        background-image: url("../content/shared/styles/flags.png");
        background-position: 0 -64px;
    }
</style>

<?php require_once '../include/footer.php'; ?>