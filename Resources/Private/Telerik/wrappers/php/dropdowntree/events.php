<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
require_once '../include/dropdowntree_data.php';

?>

<?php
    $data = categories();
    $dataSource = new \Kendo\Data\DataSource();
    $dataSource->data($data);

    $dropdowntree = new \Kendo\UI\DropDownTree('dropdowntree');
    $dropdowntree
        ->dataTextField('text')
        ->dataValueField('value')
        ->dataSource($dataSource)
        ->filter('startswith')
        ->dataBound('onDataBound')
        ->filtering('onFiltering')
        ->change('onChange')
        ->select('onSelect')
        ->close('onClose')
        ->open('onOpen');
?>

<script>
    function onDataBound(args) {
        if ("kendoConsole" in window) {
            kendoConsole.log("event: dataBound");
        }
    }

    function onFiltering(args) {
        if ("kendoConsole" in window) {
            kendoConsole.log("event: filtering");
        }
    }

    function onChange(args) {
        if ("kendoConsole" in window) {
            kendoConsole.log("event: change");
        }
    }

    function onSelect(args) {
        if ("kendoConsole" in window) {
            kendoConsole.log("event: select");
        }
    }

    function onClose(args) {
        if ("kendoConsole" in window) {
            kendoConsole.log("event: close");
        }
    }

    function onOpen(args) {
        if ("kendoConsole" in window) {
            kendoConsole.log("event: open");
        }
    }
</script>

<div id="example">
    <div class="demo-section k-content">
        <?php echo $dropdowntree->render(); ?>
    </div>
</div>

<div class="box">
    <h4>Console log</h4>
    <div class="console"></div>
</div>

<style>
    .k-dropdowntree  { width: 100%; }
</style>

<?php require_once '../include/footer.php'; ?>
