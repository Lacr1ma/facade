<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

?>

<div class="demo-section hidden-on-narrow k-content wide">
        <div id="bike">
            <div id="bike-tail"></div><div id="bike-head"></div>
        </div>

        <div class="picker-wrapper">
            <h4>Tail color</h4>
<?php
    $tail = new \Kendo\UI\FlatColorPicker('tail');
    $tail->attr('class', 'picker')
         ->preview(false)
         ->value('#000')
         ->change('select');

    echo $tail->render();
?>
    </div>
        <div class="picker-wrapper">
            <h4>Front &amp; side color</h4>
<?php
    $head = new \Kendo\UI\FlatColorPicker('head');
    $head->attr('class', 'picker')
         ->preview(false)
         ->value('#e15613')
         ->change('select');

    echo $head->render();
?>
     </div>
    </div>

    <div class="responsive-message"></div>

<script>

    function select(e) {
        $("#bike-" + this.element.attr("id")).css("background-color", e.value);
    }

</script>

<style>
    .demo-section {
        text-align: center;
        padding: 0 0 16px;
    }

    #bike {
        margin: 0 0 10px;
        background: url(../content/web/colorpicker/background.png);
    }

    #bike-head, #bike-tail {
        background: url(../content/web/colorpicker/motor.png);
        display: inline-block;
        height: 299px;
        width: 241px;
    }

    #bike-tail {
        background-color: #000;
    }

        #bike-head {
        background-color: #e15613;
        background-position: -241px 0;
    }

    .picker-wrapper {
        display: inline-block;
        text-align: left;
        width: 252px;
        margin: 0 18px;
    }

    .picker-wrapper .k-hsv-gradient {
         height: 140px;
    }

    .picker-wrapper h3 {
        padding: 13px 0 5px;
        text-align: left;
    }
</style>

<?php require_once '../include/footer.php'; ?>

