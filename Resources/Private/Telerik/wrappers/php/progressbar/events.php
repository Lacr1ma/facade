<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>

<div class="demo-section k-content">
        <h4>ProgressBar</h4>
        <?php
        	$pb = new \Kendo\UI\ProgressBar('progressBar');

        	$pb->type('percent')
        	   ->min(0)
        	   ->max(10)
        	   ->change('onChange')
        	   ->complete('onComplete');

        	echo $pb->render();
        ?>
       <button id="startProgress" class="k-button k-primary">Start progress</button>
    </div>
    <div class="box">
        <h4>Console log</h4>
        <div class="console"></div>
    </div>

     <?php require_once '../include/footer.php'; ?>

    <script>
        function onChange(e) {
            kendoConsole.log("Change event :: value is " + e.value);
        }

        function onComplete(e) {
            kendoConsole.log("Complete event :: value is " + e.value);

            $("#startProgress").text("Restart Progress").removeClass("k-state-disabled");
        }

        $("#startProgress").click(function () {
            if (!$(this).hasClass("k-state-disabled")) {
                $(this).addClass("k-state-disabled");
                progress();
            }
        });

        function progress() {
            var pb = $("#progressBar").data("kendoProgressBar");
            pb.value(0);

            var interval = setInterval(function () {
                if (pb.value() < 10) {
                    pb.value(pb.value() + 1);
                } else {
                    clearInterval(interval);
                }
            }, 100);
        }
    </script>

    <style>
        #progressBar {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
    </style> 
