<?php
require_once '../lib/Kendo/Autoload.php';

require_once '../include/header.php';
?>
<div id="gauge-container">
<?php
$gauge = new \Kendo\Dataviz\UI\RadialGauge('gauge');
$gauge->pointer(array('value' => 65))
      ->scale(array('minorUnit' => 5, 'max' => 180, 'startAngle' => -30, 'endAngle' => 210,
      'labels' => array('position' => 'inside'), 'ranges' => array(
          array('from' => 80, 'to' => 120, 'color' => '#ffc700'),
          array('from' => 120, 'to' => 150, 'color' => '#ff7a00'),
          array('from' => 150, 'to' => 180, 'color' => '#c20000'),
      )));

echo $gauge->render();
?>
</div>

<div class="box">
    <div class="box-col">
        <h4>Gauge Labels</h4>
        <ul class="options">
            <li>
                <input id="labels" checked="checked" type="checkbox" autocomplete="off">
                <label for="labels">Show labels</label>
            </li>
    
            <li>
                <input id="labels-inside" type="radio" value="inside" name="labels-position" checked="checked">
                <label for="labels-inside">- inside the gauge</label>
            </li>
    
            <li>
                <input id="labels-outside" type="radio" value="outside" name="labels-position">
                <label for="labels-outside">- outside of the gauge</label>
            </li>
        </ul>
    </div>
    <div class="box-col">
        <h4>Gauge Ranges</h4>
        <ul class="options">
            <li>
                <input id="ranges" checked="checked" type="checkbox" autocomplete="off">
                <label for="ranges">Show ranges</label>
            </li>
        </ul>
    </div>
</div>

<script>
    $(document).ready(function() {
        window.configuredRanges = $("#gauge").data("kendoRadialGauge").options.scale.ranges;
        $(".box").bind("change", refresh);
        function refresh() {
            var gauge = $("#gauge").data("kendoRadialGauge"),
                showLabels = $("#labels").prop("checked"),
                            showRanges = $("#ranges").prop("checked"),
                            positionInputs = $("input[name='labels-position']"),
                            labelsPosition = positionInputs.filter(":checked").val(),
                            options = gauge.options;

            options.transitions = false;
            options.scale.labels.visible = showLabels;
            options.scale.labels.position = labelsPosition;
            options.scale.ranges = showRanges ? window.configuredRanges : [];

            gauge.redraw();
        }
    });
</script>

<style>
    #gauge-container {
        background: transparent url("../content/dataviz/gauge/gauge-container.png") no-repeat 50% 50%;
        width: 404px;
        height: 404px;
        text-align: center;
        margin: 0 auto 30px auto;
    }

    #gauge {
        width: 330px;
        height: 330px;
        margin: 0 auto 0;
    }
</style>

<?php require_once '../include/footer.php'; ?>
