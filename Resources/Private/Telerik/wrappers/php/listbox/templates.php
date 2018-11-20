<?php

require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $result = new DataSourceResult('sqlite:..//sample.db');
    $result = $result->read('Customers', array('CustomerID', 'ContactName', "CompanyName"));
    echo json_encode($result['data'], JSON_NUMERIC_CHECK);

    exit;
}

require_once '../include/header.php';

?>

<div id="example" role="application">
    <div class="demo-section k-content wide">
<?php
    $dataSource = new \Kendo\Data\DataSource();

    $transport = new \Kendo\Data\DataSourceTransport();

    $read = new \Kendo\Data\DataSourceTransportRead();

    $read->url('templates.php?type=read')
         ->contentType('application/json')
         ->type('POST');

    $transport->read($read);

    $dataSource->transport($transport);

    $customPlaceholder = new \Kendo\JavaScriptFunction("customPlaceholder");

    $listbox1 = new \Kendo\UI\ListBox('optional');

    $toolbar = new \Kendo\UI\ListBoxToolbar();
    $toolbar->tools(array("moveUp", "moveDown", "transferTo", "transferFrom", "transferAllTo", "transferAllFrom", "remove"));

    $draggable1 = new \Kendo\UI\ListBoxDraggable();
    $draggable1->placeholder($customPlaceholder);

    $listbox1->dataSource($dataSource)
             ->dataValueField("CustomerID")
             ->dataTextField("ContactName")
             ->connectWith("selected")
             ->templateId("customer-item-template")
             ->toolbar($toolbar)
             ->draggable($draggable1)
             ->dropSources(array("selected"));

    echo $listbox1->render();

    // print space for design improvements
    echo " ";

    $listbox2 = new \Kendo\UI\ListBox('selected');

    $draggable2 = new \Kendo\UI\ListBoxDraggable();
    $draggable2->placeholder($customPlaceholder);

    $listbox2->dataSource(array())
             ->templateId("customer-item-template")
             ->connectWith("optional")
             ->dataValueField("CustomerID")
             ->dataTextField("ContactName")
             ->draggable($draggable2)
             ->dropSources(array("optional"));

    echo $listbox2->render();
?>
    </div>
</div>

<script id="customer-item-template" type="text/x-kendo-template">
    <span class="k-state-default" style="background-image: url('../content/web/Customers/#:data.CustomerID#.jpg')"></span>
    <span class="k-state-default"><h3>#: data.ContactName #</h3><p>#: data.CompanyName #</p></span>
</script>

<script>
    function customPlaceholder(draggedItem) {
        return draggedItem
                .clone()
                .addClass("custom-placeholder")
                .removeClass("k-ghost");
    }
</script>

<style>
    #example .demo-section {
        max-width: none;
        width: 695px;
    }

    #example .k-listbox {
        width: 326px;
        height: 310px;
    }

        #example .k-listbox:first-child {
            width: 360px;
            margin-right: 1px;
        }

    .k-ghost {
        display:none!important;
    }

    .custom-placeholder {
        opacity: 0.4;
    }

    #example .k-item {
        line-height: 1em;
    }

    /* Material Theme padding adjustment*/

    .k-material #example .k-item,
    .k-material #example .k-item.k-state-hover,
    .k-materialblack #example .k-item,
    .k-materialblack #examplel .k-item.k-state-hover {
        padding-left: 5px;
        border-left: 0;
    }

    .k-item > span {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        display: inline-block;
        vertical-align: top;
        margin: 20px 10px 10px 5px;
    }

    #example .k-item > span:first-child,
    .k-item.k-drag-clue > span:first-child {
        -moz-box-shadow: inset 0 0 30px rgba(0,0,0,.3);
        -webkit-box-shadow: inset 0 0 30px rgba(0,0,0,.3);
        box-shadow: inset 0 0 30px rgba(0,0,0,.3);
        margin: 10px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-size: 100%;
        background-repeat: no-repeat;
    }

    #example h3,
    .k-item.k-drag-clue h3 {
        font-size: 1.2em;
        font-weight: normal;
        margin: 0 0 1px 0;
        padding: 0;
    }

    #example p {
        margin: 0;
        padding: 0;
        font-size: .8em;
    }
</style>
<?php require_once '../include/footer.php'; ?>
