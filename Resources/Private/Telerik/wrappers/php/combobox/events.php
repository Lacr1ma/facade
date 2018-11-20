<?php

require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

require_once '../include/header.php';

$comboBox = new \Kendo\UI\ComboBox('combobox');

$comboBox->dataTextField('text')
         ->dataValueField('value')
         ->dataSource(array(
            array('text' => 'Item 1', 'value' => '1'),
            array('text' => 'Item 2', 'value' => '2'),
            array('text' => 'Item 3', 'value' => '3')
         ))
         ->filter('startswith')
         ->dataBound('onDataBound')
         ->filtering('onFiltering')
         ->select('onSelect')
         ->change('onChange')
         ->close('onClose')
         ->open('onOpen')
         ->attr('style', 'width: 100%;');
?>
<div class="demo-section k-content">
    <h4>ComboBox</h4>
<?php
echo $comboBox->render();
?>
</div>

<script>
    function onOpen() {
        if ("kendoConsole" in window) {
            kendoConsole.log("event: open");
        }
    }

    function onClose() {
        if ("kendoConsole" in window) {
            kendoConsole.log("event: close");
        }
    }

    function onChange() {
        if ("kendoConsole" in window) {
            kendoConsole.log("event: change");
        }
    }

    function onDataBound() {
        if ("kendoConsole" in window) {
            kendoConsole.log("event: dataBound");
        }
    };

    function onFiltering() {
        kendoConsole.log("event :: filtering");
    };

    function onSelect(e) {
        if ("kendoConsole" in window) {
            var dataItem = this.dataItem(e.item.index());
            kendoConsole.log("event: select (" + dataItem.text + " : " + dataItem.value + ")" );
        }
    };
</script>
<div class="box">                
    <h4>Console log</h4>
    <div class="console"></div>
</div>
<?php require_once '../include/footer.php'; ?>
