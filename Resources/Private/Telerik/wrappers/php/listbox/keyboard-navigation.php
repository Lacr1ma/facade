<?php

require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $result = new DataSourceResult('sqlite:..//sample.db');
    $result = $result->read('Products', array('ProductID', 'ProductName'));
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

    $read->url('keyboard-navigation.php?type=read')
         ->contentType('application/json')
         ->type('POST');

    $transport->read($read);

    $dataSource->transport($transport);

    $listbox = new \Kendo\UI\ListBox('listbox');

    $listbox->dataSource($dataSource)
            ->dataValueField("ProductID")
            ->dataTextField("ProductName")
            ->connectWith("listbox2")
            ->selectable("multiple")
            ->navigatable(true);

    echo $listbox->render();

    // print space for design improvements
    echo " ";

    $listbox2 = new \Kendo\UI\ListBox('listbox2');
    $listbox2->dataSource(array())
             ->dataValueField("ProductID")
             ->dataTextField("ProductName")
             ->selectable("single")
             ->navigatable(true);

    echo $listbox2->render();
?>
    </div>
    <div class="box wide">
                <div class="box-col">
            <h4>Focus</h4>
            <ul class="keyboard-legend">
                <li>
                    <span class="button-preview">
                        <span class="key-button wider">Alt</span>
                        +
                        <span class="key-button">w</span>
                    </span>
                    <span class="button-descr">
                        focuses the widget
                    </span>
                </li>
            </ul>
        </div>
        <div class="box-col">
            <h4>Supported keys and user actions</h4>
            <ul class="keyboard-legend">
                <li>
                    <span class="button-preview">
                        <span class="key-button wider leftAlign">up arrow</span>
                    </span>
                    <span class="button-descr">
                        selects previous item
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button wider leftAlign">down arrow</span>
                    </span>
                    <span class="button-descr">
                        selects next item
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button">del</span>
                    </span>
                    <span class="button-descr">
                        deletes selected items
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button">ctrl</span>
                        <span class="key-button wider leftAlign">space</span>
                    </span>
                    <span class="button-descr">
                        selects/deselects item
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button">shift</span>
                        <span class="key-button wider leftAlign">up arrow</span>
                    </span>
                    <span class="button-descr">
                        adds the previous item to the selected items
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button">shift</span>
                        <span class="key-button wider leftAlign">down arrow</span>
                    </span>
                    <span class="button-descr">
                        adds the next item to the selected items
                    </span>
                </li>
            </ul>
        </div>
        <div class="box-col">
            <h4>&nbsp;</h4>
            <ul class="keyboard-legend">
                <li>
                    <span class="button-preview">
                        <span class="key-button">ctrl</span>
                        <span class="key-button wider leftAlign">right arrow</span>
                    </span>
                    <span class="button-descr">
                        adds the selected items to the connected ListBox
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button">ctrl</span>
                        <span class="key-button wider leftAlign">left arrow</span>
                    </span>
                    <span class="button-descr">
                        adds the selected items from the connected ListBox to the current
                    </span>
                </li>
                  <li>
                    <span class="button-preview">
                        <span class="key-button">ctrl</span>
                        <span class="key-button wider leftAlign">up arrow</span>
                    </span>
                    <span class="button-descr">
                        moves the focus to the previous item
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button">ctrl</span>
                        <span class="key-button wider leftAlign">down arrow</span>
                    </span>
                    <span class="button-descr">
                        moves the focus to the next item
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button">ctrl</span>
                        <span class="key-button">shift</span>
                        <span class="key-button wider leftAlign">up arrow</span>
                    </span>
                    <span class="button-descr">
                        shifts selected items upwards
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button">ctrl</span>
                        <span class="key-button">shift</span>
                        <span class="key-button wider leftAlign">down arrow</span>
                    </span>
                    <span class="button-descr">
                        shifts selected items downwards
                    </span>
                </li>
				<li>
                    <span class="button-preview">
                        <span class="key-button">ctrl</span>
                        <span class="key-button">shift</span>
                        <span class="key-button wider leftAlign">left arrow</span>
                    </span>
                    <span class="button-descr">
                        transfers all items to the connected ListBox
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button">ctrl</span>
                        <span class="key-button">shift</span>
                        <span class="key-button wider leftAlign">right arrow</span>
                    </span>
                    <span class="button-descr">
                        transfers all items from the connected ListBox
                    </span>
                </li>
            </ul>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $(document).on("keydown.examples", function (e) {
                if (e.altKey && e.keyCode === 87) {
                    $("#listbox").data("kendoListBox").focus();
                }
            });
        });
    </script>
</div>

<style>
   #example .demo-section {
        max-width: none;
        width: 515px;
    }

    #example .k-listbox {
        width: 255px;
        height: 310px;
    }

    #example .k-listbox:first-child {
        margin-right: 1px;
    }
</style>
<?php require_once '../include/footer.php'; ?>
