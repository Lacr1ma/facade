<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>

<div class="box wide">
        <div class="box-col">
            <h4>Toggle state</h4>
            <ul class="options">
                <li>
                    <button class="k-button" id="enableProgressBar">Enable</button>
                    <button class="k-button" id="disableProgressBar">Disable</button>
                </li>
            </ul>
        </div>
        <div class="box-col">
            <h4>Value</h4>
            <ul class="options">
                <li>
                    <input type="text" id="newValue" value="25" class="k-textbox" placeholder="e.g. 23"/>             
                    <button class="k-button" id="setProgressBarValue">Set value</button>
                    <button class="k-button" id="getProgressBarValue">Get value</button>
                </li>
            </ul>
        </div>
        <div class="box-col">
            <h4>Indeterminate</h4>
            <ul class="options">
                <li>
                    <button class="k-button" id="setIndeterminate">Set indeterminate</button>
                </li>
            </ul>
        </div>
    </div>
    <div class="demo-section k-content">
        <?php 
            $pb = new \Kendo\UI\ProgressBar('progressBar');

            $animation = new \Kendo\UI\ProgressBarAnimation();
            $animation->duration(400);

            $pb->min(0)
               ->max(100)
               ->type('value')
               ->attr('style', 'width: 100%')
               ->animation($animation);

            echo $pb->render();
        ?>
    </div>

     <?php require_once '../include/footer.php'; ?>

    <script>
        $(document).ready(function () {
            var pb = $("#progressBar").data("kendoProgressBar");

            $("#setProgressBarValue").click(function () {
                pb.value($("#newValue").val());
            });

            $("#getProgressBarValue").click(function () {
                alert("Current ProgressBar value is: " + pb.value());
            });

            $("#setIndeterminate").click(function () {
                pb.value(false);
            });

            $("#enableProgressBar").click(function () {
                pb.enable();
            });

            $("#disableProgressBar").click(function () {
                pb.enable(false);
            });
        });
    </script>

    <style>
        .box .k-textbox {
            margin: 0;
            width: 80px;
        }
        .k-button {
            min-width: 80px;
        }
    </style>
