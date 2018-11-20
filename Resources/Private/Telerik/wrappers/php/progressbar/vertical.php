<?php
	require_once '../lib/Kendo/Autoload.php';
	require_once '../include/header.php';
?>

 <div class="demo-section k-content">
        <div class="loading">
            <?php 
            	$pbtotal = new \Kendo\UI\ProgressBar('totalProgressBar');

            	$pbtotal->type('chunk')
            	   ->chunkCount(4)
            	   ->min(0)
            	   ->max(4)
            	   ->orientation('vertical')
            	   ->complete('onTotalComplete');

            	echo $pbtotal->render();
            ?>

            <?php 
            	$pb = new \Kendo\UI\ProgressBar('loadingProgressBar');

            	$pb->orientation('vertical')
            	   ->showStatus(false)
            	   ->animation(false)
            	   ->change('onChange')
            	   ->complete('onComplete');

            	echo $pb->render();
            ?>
        </div>
        <div class="loadingInfo">
            <h4>Loading styles</h4>
            <div class="statusContainer">
                <p>
                Loaded: <span class="loadingStatus">0%</span> <br />
                Item <span class="chunkStatus">1</span> of 4
                </p>
            </div>
            <button class="k-button reloadButton">Reload</button>
        </div>
    </div>

    <?php require_once '../include/footer.php'; ?>

    <script>
        $(document).ready(function () {
            load();
        });

        function onChange(e) {
            $(".loadingStatus").text(e.value + "%");
        }

        function onComplete(e) {
            var total = $("#totalProgressBar").data("kendoProgressBar");
            total.value(total.value() + 1);

            if (total.value() < total.options.max) {
                $(".chunkStatus").text(total.value() + 1);
                $(".loadingInfo h4").text("Loading " + itemsToLoad[total.value()]);

                load();
            }
        }

        function onTotalComplete(e) {
            $(".loadingInfo h4").text("All items loaded");
            $(".statusContainer").hide();
            $(".reloadButton").show();
        }

        function load() {
            var pb = $("#loadingProgressBar").data("kendoProgressBar");
            pb.value(0);

            var interval = setInterval(function () {
                if (pb.value() < 100) {
                    pb.value(pb.value() + 1);
                } else {
                    clearInterval(interval);
                }
            }, 30);
        }

        $(".reloadButton").click(function () {
            $(this).hide();
            $(".statusContainer").show();

            $("#totalProgressBar").data("kendoProgressBar").value(0);
            $("#loadingProgressBar").data("kendoProgressBar").value(0);
            $(".loadingInfo h4").text("Loading " + itemsToLoad[0]);
            $(".chunkStatus").text(1);

            load();
        });

        var itemsToLoad = ["styles", "scripts", "images", "fonts"];
    </script>
    <style>
        .demo-section {
            overflow: auto;
        }
        .k-progressbar
        {
            width: 8px;
            height: 100px;
        }
        
        #loadingProgressBar
        {
            margin-left: 10px;
        }
        
        .loading
        {
            float: left;
        }
        .loadingInfo
        {
            float: left;
            margin: 20px 0 0 30px;
        }

        .reloadButton
        {
            display: none;
            margin-top: 10px;
        }
    </style>
