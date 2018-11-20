<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
require_once '../include/dropdowntree_data.php';

?>

<?php
    $data = categories_extended();
    $dataSource = new \Kendo\Data\DataSource();
    $dataSource->data($data);

    $dropdowntree = new \Kendo\UI\DropDownTree('items');
    $dropdowntree
        ->placeholder('Select item...')
        ->dataTextField('text')
        ->dataValueField('id')
        ->filter('startswith')
        ->dataSource($dataSource);
?>

<div id="example">
    <div class="demo-section k-content">
        <?php echo $dropdowntree->render(); ?>
    </div>
    <div class="box wide">
        <div class="box-col">
            <h4>Open/Close</h4>
            <ul class="options">
                <li>
                    <button id="open" class="k-button">Open</button> <button id="close" class="k-button">Close</button>
                </li>
            </ul>
        </div>
        <div class="box-col">
            <h4>Enable/Disable</h4>
            <ul class="options">
                <li>
                    <button id="enable" class="k-button">Enable</button> <button id="disable" class="k-button">Disable</button>
                </li>
                <li>
                    <button id="readonly" class="k-button">Readonly</button>
                </li>
            </ul>
        </div>
        <div class="box-col">
            <div class="box-col">
                <h4>Select</h4>
                <ul class="options">
                    <li>
                        <button id="getValue" class="k-button">Get values</button>
                    </li>
                    <li>
                        <input id="value" value="1" class="k-textbox" style="width: 40px; margin: 0;" /> <button id="setValue" class="k-button">Select by value</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<div>

<script>
    $(document).ready(function() {
        var dropdowntree = $("#items").data("kendoDropDownTree");

        function setValue (e) {
            if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                dropdowntree.dataSource.filter({}); //clear applied filter before setting value
                dropdowntree.value($("#value").val().split(","));
            }
        };

        function filterTypeOnChanged() {
            dropdowntree.options.filter = $("#filter").val();
        }

        $("#enable").click(function () {
            dropdowntree.enable();
        });

        $("#disable").click(function () {
            dropdowntree.enable(false);
        });

        $("#readonly").click(function () {
            dropdowntree.readonly();
        });

        $("#open").click(function () {
            dropdowntree.open();
        });

        $("#close").click(function () {
            dropdowntree.close();
        });

        $("#getValue").click(function () {
            alert(dropdowntree.value());
        });

        $("#setValue").click(setValue);
        $("#value").keypress(setValue);


    });
</script>

<style>
    .k-dropdowntree  { width: 100%; }

    .box-col .k-textbox {
        width: 40px;
    }

    .k-button {
        min-width: 80px;
    }
</style>

<?php require_once '../include/footer.php'; ?>