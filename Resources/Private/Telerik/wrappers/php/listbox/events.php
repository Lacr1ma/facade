<?php

require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $result = new DataSourceResult('sqlite:..//sample.db');
    $result = $result->read('Customers', array('CustomerID', 'ContactName'));
    echo json_encode($result['data'], JSON_NUMERIC_CHECK);

    exit;
}

require_once '../include/header.php';

?>
<div role="application">
    <div class="demo-section k-content wide">
<?php

    $dataSource = new \Kendo\Data\DataSource();

    $transport = new \Kendo\Data\DataSourceTransport();

    $read = new \Kendo\Data\DataSourceTransportRead();

    $read->url('events.php?type=read')
         ->contentType('application/json')
         ->type('POST');

    $transport->read($read);

    $dataSource->transport($transport);

    $listBox1 = new \Kendo\UI\ListBox('optional');

    $toolbar1 = new \Kendo\UI\ListBoxToolbar();
    $toolbar1->tools(array("moveUp", "moveDown", "transferTo", "transferFrom", "transferAllTo", "transferAllFrom", "remove"));

    $listBox1->dataSource($dataSource)
             ->dataTextField("ContactName")
             ->dataValueField("CustomerID")
             ->connectWith("selected")
             ->selectable("multiple")
             ->draggable(true)
             ->dropSources(array("selected"))
             ->toolbar($toolbar1);

    // events
    $listBox1->addEvent("onAdd")
             ->change("onChange")
             ->dataBound("onDataBound")
             ->dragStart("onDragStart")
             ->drag("onDrag")
             ->drop("onDrop")
             ->dragEnd("onDragEnd")
             ->remove("onRemove")
             ->reorder("onReorder");

    echo $listBox1->render();

    // print space for design improvements
    echo " ";

    $listBox2 = new \Kendo\UI\ListBox('selected');

    $toolbar2 = new \Kendo\UI\ListBoxToolbar();
    $toolbar2->tools(array("moveUp", "moveDown", "remove"));


    $listBox2->dataSource(array())
             ->dataTextField("ContactName")
             ->dataValueField("CustomerID")
             ->connectWith("optional")
             ->selectable("multiple")
             ->draggable(true)
             ->dropSources(array("optional"))
             ->toolbar($toolbar2);

    // events
    $listBox2->addEvent("onAdd")
             ->change("onChange")
             ->dataBound("onDataBound")
             ->dragStart("onDragStart")
             ->drag("onDrag")
             ->drop("onDrop")
             ->dragEnd("onDragEnd")
             ->remove("onRemove")
             ->reorder("onReorder");

    echo $listBox2->render();

?>
    </div>
    <div class="demo-section k-content wide">
        <h4>Console log</h4>
        <div class="console"></div>
    </div>
    <script>
        function onAdd(e) {
            kendoConsole.log("add : " + getWidgetName(e) + " : " + e.dataItems.length + " item(s)");
        }

        function onChange(e) {
            kendoConsole.log("change : " + getWidgetName(e));
        }

        function onDataBound(e) {
            if ("kendoConsole" in window) {
                kendoConsole.log("dataBound : " + getWidgetName(e));
            }
        }

        function onRemove(e) {
            kendoConsole.log("remove : " + getWidgetName(e) + " : " + e.dataItems.length + " item(s)");
        };

        function onReorder(e) {
            kendoConsole.log("reorder : " + getWidgetName(e));
        }

        function onDragStart(e) {
            kendoConsole.log("dragstart : " + getWidgetName(e));
        }

        function onDrag(e) {
            kendoConsole.log("drag : " + getWidgetName(e));
        }

        function onDrop(e) {
            kendoConsole.log("drop : " + getWidgetName(e));
        }

        function onDragEnd(e) {
            kendoConsole.log("dragend : " + getWidgetName(e));
        }

        function getWidgetName(e) {
            var listBoxId = e.sender.element.attr("id");
            var widgetName = listBoxId === "optional" ? "left widget" : "right widget";
            return widgetName;
        }
    </script>
</div>

<style>
    #example .demo-section {
        max-width: none;
        width: 580px;
    }

    #example .k-listbox {
        width: 285px;
        height: 310px;
    }

    #example .k-listbox:first-child {
        margin-right: 1px;
    }
</style>
<?php require_once '../include/footer.php'; ?>