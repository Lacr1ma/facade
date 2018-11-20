<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

?>

<div class="wrapper">
<?php
    $panelbar = new \Kendo\UI\PanelBar('panelbar');

    $panelbar->expandMode('single');

    $body = new \Kendo\UI\PanelBarItem("BODY");
    $body->contentUrl("../content/web/panelbar/ajax/ajaxContent1.html");

    $engine = new \Kendo\UI\PanelBarItem("ENGINE");
    $engine->contentUrl("../content/web/panelbar/ajax/ajaxContent2.html");

    $transmission = new \Kendo\UI\PanelBarItem("TRANSMISSION");
    $transmission->contentUrl("../content/web/panelbar/ajax/ajaxContent3.html");

    $performance = new \Kendo\UI\PanelBarItem("PERFORMANCE");
    $performance->contentUrl("../content/web/panelbar/ajax/ajaxContent4.html");

    $panelbar->addItem($body, $engine, $transmission, $performance);

    echo $panelbar->render();
?>
</div>

<div class="box wide">
    <h4>Note</h4>
    <p>
        Security restrictions in Chrome prevent this
        example from working when the page is
        loaded from the file system (via file:// protocol).
    </p>
</div>

<style>
    .wrapper {
        height: 320px;
        margin: 20px auto;
        padding: 20px 0 0;
        background: url('../content/web/panelbar/astonmartin.png') no-repeat center 50px transparent;
    }
    #panelbar {
        width: 250px;
        float: right;
        margin-bottom: 20px;
    }
    #panelbar p {
        padding: 1em;
    }
</style>

<?php require_once '../include/footer.php'; ?>
