<?php

require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

require_once '../include/header.php';

?>

<div class="demo-section k-content">
    <h4>Select movie</h4>
<?php
$multicolumncomboBox = new \Kendo\UI\MultiColumnComboBox('movies');

$multicolumncomboBox->dataTextField('text')
         ->dataValueField('value')
         ->attr('style', 'width: 100%;')
         ->dataSource(array(
            array('text' => '12 Angry Men', 'value' => 1),
            array('text' => 'Il buono, il brutto, il cattivo.', 'value' => 2),
            array('text' => 'Inception', 'value' => 3),
            array('text' => "One Flew Over the Cuckoo's Nest", 'value' => 4),
            array('text' => 'Pulp Fiction', 'value' => 5),
            array('text' => "Schindler's List", 'value' => 6),
            array('text' => 'The Dark Knight', 'value' => 7),
            array('text' => 'The Godfather', 'value' => 8),
            array('text' => 'The Godfather: Part II', 'value' => 9),
            array('text' => 'The Shawshank Redemption', 'value' => 10),
            array('text' => 'The Shawshank Redemption 2', 'value' => 11)
         ))
         ->addColumn(
            array('field' => 'text', 'title' => 'Text', 'width' => 400),
            array('field' => 'value', 'title' => 'Value', 'width' => 100)
           );

echo $multicolumncomboBox->render();
?>
</div>

<div class="box wide">
    <div class="box-col">
    <h4>API Functions</h4>
    <ul class="options">
        <li>
            <button id="enable" class="k-button">Enable</button> <button id="disable" class="k-button">Disable</button>
        </li>
        <li>
            <button id="readonly" class="k-button">Readonly</button>
        </li>
        <li>
            <button id="open" class="k-button">Open</button> <button id="close" class="k-button">Close</button>
        </li>
        <li>
            <button id="getValue" class="k-button">Get value</button> <button id="getText" class="k-button">Get text</button>
        </li>
    </ul>
    </div>
    <div class="box-col">
    <h4>Filter</h4>
    <ul class="options">
        <li>
            <select id="filter">
                <option value="none">None</option>
                <option value="startswith">Starts with</option>
                <option value="contains">Contains</option>
                <option value="eq">Equal</option>
            </select>
        </li>
        <li>
            <input id="word" value="The" class="k-textbox" style="width: 149px; margin: 0;" />
        </li>
        <li>
            <button id="find" class="k-button">Find item</button>
        </li>
    </ul>
    </div>
    <div class="box-col">
    <h4>Select</h4>
    <ul class="options">
        <li>
            <input id="index" value="0" class="k-textbox" /> <button id="select" class="k-button">Select by index</button>
        </li>
        <li>
            <input id="value" value="1" class="k-textbox" /> <button id="setValue" class="k-button">Select by value</button>
        </li>
    </ul>
    </div>
</div>

<script>
$(function() {
    $("#filter").kendoDropDownList({
        change: filterTypeOnChanged
    });

    var multicolumncombobox = $("#movies").data("kendoMultiColumnComboBox"),
        setValue = function(e) {
            if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode)
            multicolumncombobox.value($("#value").val());
        },
        setIndex = function(e) {
            if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                var index = parseInt($("#index").val());
                multicolumncombobox.select(index);
            }
        },
        setSearch = function (e) {
            if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode)
            multicolumncombobox.search($("#word").val());
        };

    $("#enable").click(function() {
        multicolumncombobox.enable();
    });

    $("#disable").click(function() {
        multicolumncombobox.enable(false);
    });

    $("#readonly").click(function () {
        multicolumncombobox.readonly();
    });

    $("#open").click(function() {
        multicolumncombobox.open();
    });

    $("#close").click(function() {
        multicolumncombobox.close();
    });

    $("#getValue").click(function() {
        alert(multicolumncombobox.value());
    });

    $("#getText").click(function() {
        alert(multicolumncombobox.text());
    });

    $("#setValue").click(setValue);
    $("#value").keypress(setValue);

    $("#select").click(setIndex);
    $("#index").keypress(setIndex);

    $("#find").click(setSearch);
    $("#word").keypress(setSearch);

    function filterTypeOnChanged() {
        multicolumncombobox.options.filter = $("#filter").val();
    }
});
</script>
<style>
    .box .k-textbox {
        width: 40px;
    }
    .k-button {
        min-width: 80px;
    }
</style>
<?php require_once '../include/footer.php'; ?>
