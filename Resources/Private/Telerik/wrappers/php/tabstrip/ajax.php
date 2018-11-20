<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

?>

<div class="wrapper">
<?php
    $tabstrip = new \Kendo\UI\TabStrip('tabstrip');

    $dimensions = new \Kendo\UI\TabStripItem();
    $dimensions
        ->text("Dimensions & Weights")
        ->selected(true)
        ->contentUrl('../content/web/tabstrip/ajax/ajaxContent1.html');
    $tabstrip->addItem($dimensions);

    $engine = new \Kendo\UI\TabStripItem();
    $engine->text("Engine")
        ->contentUrl('../content/web/tabstrip/ajax/ajaxContent2.html');
    $tabstrip->addItem($engine);

    $chassis = new \Kendo\UI\TabStripItem();
    $chassis->text("Chassis")
        ->contentUrl('../content/web/tabstrip/ajax/ajaxContent3.html');
    $tabstrip->addItem($chassis);

    // set animation
    $animation = new \Kendo\UI\TabStripAnimation();
    $openAnimation = new \Kendo\UI\TabStripAnimationOpen();
    $openAnimation->effects("fadeIn");
    $animation->open($openAnimation);

    $tabstrip->animation($animation);

    echo $tabstrip->render();
?>
</div>

<style>
    .wrapper {
        height: 455px;
        margin: 20px auto;
        padding: 20px 0 0 0;
        background: url('../content/web/tabstrip/bmw.png') no-repeat center 60px transparent;
    }
    #tabstrip {
        max-width: 400px;
        float: right;
        margin-bottom: 20px;
    }
    #tabstrip .k-content
    {
        height: 320px;
        overflow: auto;
    }
    .specification {
        max-width: 670px;
        margin: 10px 0;
        padding: 0;
    }
    .specification dt, dd {
        max-width: 140px;
        float: left;
        margin: 0;
        padding: 5px 0 8px 0;
    }
    .specification dt {
        clear: left;
        width: 100px;
        margin-right: 7px;
        padding-right: 0;
        opacity: 0.7;
    }
    .specification:after, .wrapper:after {
        content: ".";
        display: block;
        clear: both;
        height: 0;
        visibility: hidden;
    }
</style>

<?php require_once '../include/footer.php'; ?>


