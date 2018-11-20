<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$numeric = new \Kendo\UI\NumericTextBox('numerictextbox');
$numeric->attr('style', 'width: 100%');
?>
<div class="demo-section k-content">
    <h4>Set value</h4>
<?php
echo $numeric->render();
?>
</div>

<script>
    $(document).ready(function() {
        var numerictextbox = $("#numerictextbox").data("kendoNumericTextBox");

        var setValue = function () {
            numerictextbox.value($("#value").val());
        };

        $("#enable").click(function() {
            numerictextbox.enable();
        });

        $("#disable").click(function() {
            numerictextbox.enable(false);
        });

        $("#readonly").click(function() {
            numerictextbox.readonly();
        });

        $("#focus").click(function() {
            numerictextbox.focus();
        });

        $("#value").kendoNumericTextBox({
            change: setValue
        });

        $("#set").click(setValue);

        $("#get").click(function() {
            alert(numerictextbox.value());
        });
    });
</script>
<div class="box wide">
    <div class="box-col">
        <h4>Get / Set Value</h4>
        <ul class="options">
            <li>
               <button id="get" class="k-button">Get value</button> or <button id="focus" class="k-button">Focus</button>
           </li>
           <li>
               <input id="value" value="10" style="float:none" />
               <button id="set" class="k-button">Set value</button>
           </li>
        </ul>
    </div>
    <div class="box-col">
        <h4>Enable / Disable</h4>
        <ul class="options">
            <li>
                <button id="enable" class="k-button">Enable</button>
                <button id="disable" class="k-button">Disable</button>
            </li>
            <li>
                <button id="readonly" class="k-button">Readonly</button>
            </li>
        </ul>
    </div>
</div>
<?php require_once '../include/footer.php'; ?>
