<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>

<div class="demo-section k-content">
        <ul class="forms">
            <li>
                <label>New Password</label>
                <input id="userPass" type="password" name="userPass" value="" class="k-textbox" style="width: 100%;" />
            </li>
            <li>
                <label>Password strength</label>
                    <?php 
                    	$pb = new \Kendo\UI\ProgressBar('passStrength');

                    	$pb->type('value')
                    	   ->max(9)
                           ->attr('style', 'width: 100%')
                    	   ->animation(false)
                    	   ->change('onChange');

                    	echo $pb->render();
                    ?>
            </li>
            <li>
                <label></label>
                <button id ="submitButton" class="k-button">Done</button>
            </li>
        </ul>
    </div>

    <?php require_once '../include/footer.php'; ?>

    <script>
        var passProgress;
        $(document).ready(function () {
            passProgress = $("#passStrength").data("kendoProgressBar");
            passProgress.progressStatus.text("Empty");
        });

        $("#userPass").keyup(function () {
            passProgress.value(this.value.length);
        });

        $("#submitButton").click(function () {
            var strength = passProgress.progressStatus.first().text();
            alert(strength + " password!");
        });

        function onChange(e) {
            this.progressWrapper.css({
                "background-image": "none",
                "border-image": "none"
            });

            if (e.value < 1) {
                this.progressStatus.text("Empty");
            } else if (e.value <= 3) {
                this.progressStatus.text("Weak");

                this.progressWrapper.css({
                    "background-color": "#EE9F05",
                    "border-color": "#EE9F05"
                });
            } else if (e.value <= 6) {
                this.progressStatus.text("Good");

                this.progressWrapper.css({
                    "background-color": "#428bca",
                    "border-color": "#428bca"
                });
            } else {
                this.progressStatus.text("Strong");

                this.progressWrapper.css({
                    "background-color": "#8EBC00",
                    "border-color": "#8EBC00"
                });
            }
        }
    </script>

    <style>
    	.forms {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        
        .forms label {
            display: block;
            font-size: 12px;
            line-height: 1em;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 1em;
        }
        
        .forms li {
            margin-bottom: 1.5em;
        }
        
        #submitButton {
            width: 100%;
        }
    </style>
</div>
