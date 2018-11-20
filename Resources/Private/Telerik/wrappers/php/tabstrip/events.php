<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

?>

<div class="demo-section k-content">

<?php
    $tabstrip = new \Kendo\UI\TabStrip('tabstrip');

    // attach events
    $tabstrip
        ->select("onSelect")
        ->show("onShow")
        ->activate("onActivate")
        ->contentLoad("onContentLoad")
        ->error("onError");

    // add items
    $item = new \Kendo\UI\TabStripItem();
    $item->text("First Tab")
        ->selected(true)
        ->startContent();
?>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer felis libero, lobortis ac rutrum quis, varius a velit. Donec lacus erat, cursus sed porta quis, adipiscing et ligula. Duis volutpat, sem pharetra accumsan pharetra, mi ligula cursus felis, ac aliquet leo diam eget risus. Integer facilisis, justo cursus venenatis vehicula, massa nisl tempor sem, in ullamcorper neque mauris in orci. Proin sagittis elementum odio, eu vestibulum arcu rhoncus eu. Pellentesque lorem arcu, tempus at dapibus nec, tincidunt a ante. Cras eget arcu id augue sollicitudin fermentum. Quisque ullamcorper ultrices ante, ut mollis neque tincidunt nec. Aenean sollicitudin lobortis nibh, vitae sagittis justo placerat et. Fusce laoreet consequat arcu, quis placerat massa lacinia vel. Etiam fringilla purus ac ipsum euismod nec aliquet lorem aliquet. Aliquam a nunc ac lorem lobortis pulvinar. Integer eleifend lobortis risus vel commodo. Integer nisl turpis, facilisis a porttitor nec, tempus ac enim. Proin pulvinar vestibulum ligula id mattis. Integer posuere faucibus accumsan.</p>
                  
<?php
    $item->endContent();
    $tabstrip->addItem($item);

    $ajaxTab = new \Kendo\UI\TabStripItem();
    $ajaxTab
        ->text("Ajax Tab")
        ->contentUrl("../content/web/tabstrip/ajax/ajaxContent1.html");
    $tabstrip->addItem($ajaxTab);

    $errorTab = new \Kendo\UI\TabStripItem();
    $errorTab
        ->text("Error Tab")
        ->contentUrl("error.html");
    $tabstrip->addItem($errorTab);

    // set animation
    $animation = new \Kendo\UI\TabStripAnimation();
    $openAnimation = new \Kendo\UI\TabStripAnimationOpen();
    $openAnimation->effects("fadeIn");
    $animation->open($openAnimation);

    $tabstrip->animation($animation);

    echo $tabstrip->render();
?>
</div>
<script>
    function onShow(e) {
        kendoConsole.log("Shown: " + $(e.item).find("> .k-link").text());
    }

    function onSelect(e) {
        kendoConsole.log("Selected: " + $(e.item).find("> .k-link").text());
    }

    function onActivate(e) {
        kendoConsole.log("Activated: " + $(e.item).find("> .k-link").text());
    }

    function onContentLoad(e) {
        kendoConsole.log("Content loaded in <b>"+ $(e.item).find("> .k-link").text() + "</b> and starts with <b>" + $(e.contentElement).text().substr(0, 20) + "...</b>");
    }

    function onError(e) {
        kendoConsole.error("Loading failed with " + e.xhr.statusText + " " + e.xhr.status);
    }
</script>

<div class="box">
    <h4>Console log</h4>
    <div class="console"></div>
</div>
<style>
    .k-tabstrip > .k-content {
        padding: 1em;
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


