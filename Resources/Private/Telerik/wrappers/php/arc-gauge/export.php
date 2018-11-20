<?php
require_once '../lib/Kendo/Autoload.php';

require_once '../include/header.php';
$gauge = new \Kendo\Dataviz\UI\ArcGauge('gauge');
$gauge->value(65)
      ->centerTemplate('#:value#%')
      ->scale(array( 'min' => 0, 'max' => 100));

?>

<div id="example">
    <div class="box">
        <h4>Advanced Export options</h4>
        <div class="box-col">
            <button class='export-pdf k-button'>Export as PDF</button>
        </div>
        <div class="box-col">
            <button class='export-img k-button'>Export as Image</button>
        </div>
        <div class="box-col">
            <button class='export-svg k-button'>Export as SVG</button>
        </div>
    </div>
    <div id="gauge-container" class="demo-section">
        <?php 
            echo $gauge->render();
        ?>
    </div>
    <script>
        $(".export-pdf").click(function() {
            var gauge = $("#gauge").getKendoArcGauge();
            gauge.exportPDF({ paperSize: "auto", margin: { left: "1cm", top: "1cm", right: "1cm", bottom: "1cm" } }).done(function (data) {
                kendo.saveAs({
                    dataURI: data,
                    fileName: "chart.pdf",
                    proxyURL: "http://demos.telerik.com/kendo-ui/service/export"
                });
            });
        });

        $(".export-img").click(function() {
            var gauge = $("#gauge").getKendoArcGauge();
            gauge.exportImage().done(function(data) {
                kendo.saveAs({
                    dataURI: data,
                    fileName: "chart.png",
                    proxyURL: "http://demos.telerik.com/kendo-ui/service/export"
                });
            });
        });

        $(".export-svg").click(function() {
            var gauge = $("#gauge").getKendoArcGauge();
            gauge.exportSVG().done(function(data) {
                kendo.saveAs({
                    dataURI: data,
                    fileName: "chart.svg",
                    proxyURL: "http://demos.telerik.com/kendo-ui/service/export"
                });
            });
        });
    </script>
    <style>
        #gauge-container {
            width: 300px;
            text-align: center;
            margin: 0 auto 30px auto;
        }

        .k-arcgauge-center-label {
            position: absolute;
            text-align: center;
            padding: 0;
            margin: 0;
        }

        .k-arcgauge-center-label {
            font-size: 30px;
        }
    </style>
</div>


<?php require_once '../include/footer.php'; ?>