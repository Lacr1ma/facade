<?php

require_once '../lib/Kendo/Autoload.php';

require_once '../include/header.php';

$dropDownList = new \Kendo\UI\DropDownList('dropdownlist');

$dropDownList->dataTextField('text')
             ->dataValueField('value')
             ->dataSource(array(
                array('text' => 'Item1', 'value' => '1'),
                array('text' => 'Item2', 'value' => '2'),
                array('text' => 'Item3', 'value' => '3')
             ))
             ->filter('startswith')
             ->dataBound('onDataBound')
             ->filtering('onFiltering')
             ->select('onSelect')
             ->change('onChange')
             ->close('onClose')
             ->open('onOpen')
             ->attr('style', 'width: 100%');
?>

<div class="demo-section k-content">
     <h4 class="title">DropDownList</h4>
<?php
echo $dropDownList->render();
?>
 </div>
<div class="box">                
    <h4>Console log</h4>
    <div class="console"></div>
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
    }

    function onFiltering() {
        kendoConsole.log("event :: filtering");
    };

    function onSelect(e) {
        if ("kendoConsole" in window) {
            var dataItem = this.dataItem(e.item);
            kendoConsole.log("event: select (" + dataItem.text + " : " + dataItem.value + ")" );
        }
    };
</script>
<?php require_once '../include/footer.php'; ?>
