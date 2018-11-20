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

<div role="application">
    <div class="demo-section k-content">
<?php
    $dataSource = new \Kendo\Data\DataSource();

    $transport = new \Kendo\Data\DataSourceTransport();

    $read = new \Kendo\Data\DataSourceTransportRead();

    $read->url('api.php?type=read')
         ->contentType('application/json')
         ->type('POST');

    $transport->read($read);

    $dataSource->transport($transport)
               ->pageSize(10);

    $listbox1 = new \Kendo\UI\ListBox('listbox1');
    $listbox1->dataSource($dataSource)
             ->connectWith("listbox2")
             ->dataValueField("ProductID")
             ->dataTextField("ProductName");

    echo $listbox1->render();

    // print space for design improvements
    echo " ";

    $listbox2 = new \Kendo\UI\ListBox('listbox2');

    $listbox2->dataSource(array())
             ->dataValueField("ProductID")
             ->dataTextField("ProductName");

    echo $listbox2->render();
?>
        <div id="appendto"></div>
    </div>
    <span id="staticNotification"></span>

    <div class="box wide">
        <div class="box-col">
            <h3>Working with selected items</h3>
            <div class="box-col">
                <ul class="options">
                    <li>
                        <h4>Transfer item</h4>
                        <button id="transfer-right" class="k-button">To right</button>
                        <button id="transfer-left" class="k-button">To left</button>
                    </li>
                </ul>
            </div>
            <div class="box-col">
                <ul class="options">
                    <li>
                        <h4>Move item</h4>
                        <button id="move-up" class="k-button">Move Up</button>
                        <button id="move-down" class="k-button">Move Down</button>
                    </li>

                </ul>
            </div>
            <div class="box-col">
                <ul class="options">
                    <li>
                        <h4>Enable/Disable item</h4>
                        <button id="disable" class="k-button">Disable</button>
                        <button id="enable" class="k-button">Enable</button>
                    </li>

                </ul>
            </div>
        </div>
        <div class="box-col">
            <h3 class="clear">Add/Remove items</h3>
            <div class="box-col">
                <ul class="options">
                    <li>
                        <h4>Add item</h4>
                        <input type="text" id="add-textbox" class="k-input k-textbox" name="name" value="New Product" />
                        <button id="add-item" class="k-button">Add</button>
                    </li>
                </ul>
            </div>
            <div class="box-col">
                <ul class="options">
                    <li>
                        <h4>Remove by text (Contains)</h4>
                        <input type="text" id="remove-textbox" class="k-input k-textbox" name="name" value="Chef" />
                        <button id="remove-item" class="k-button">Remove</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var notification = $("#staticNotification").kendoNotification({
            autoHideAfter: 4000, appendTo: "#appendto",
            animation: {
                open: {
                    effects: "fade:in"
                },
                close: {
                    effects: "none"
                }
            }
        }).data("kendoNotification");

        var listbox1 = $("#listbox1").data("kendoListBox");

        var listbox2 = $("#listbox2").data("kendoListBox");

        function showMessage(message) {
            notification.hide();
            notification.error(message);
        }

        $("#transfer-left").click(function () {
            if (listbox2.select().length > 0) {
                listbox1.add(listbox2.dataItem(listbox2.select()));
                listbox2.remove(listbox2.select());
            }
            else {
                showMessage("Right ListBox should have selected item!");
            }
        })

        $("#transfer-right").click(function () {
            if (listbox1.select().length > 0) {
                listbox2.add(listbox1.dataItem(listbox1.select()));
                listbox1.remove(listbox1.select());
            }
            else {
                showMessage("Left ListBox should have selected item!");
            }
        })

        $("#enable").click(function () {
            listbox1.enable(".k-item", true);
            listbox2.enable(".k-item", true);
        })

        $("#disable").click(function () {
            if (listbox1.select().length > 0 || listbox2.select().length > 0) {
                listbox1.enable(listbox1.select(), false);
                listbox2.enable(listbox2.select(), false);
            }
            else {
                showMessage("You need to select an item to be disabled!");
            }
        })

        $("#move-up").click(function () {
            if (listbox1.select().length > 0) {
                if (listbox1.select().first().index() > 0) {
                    var item = listbox1.select().first();
                    listbox1.reorder(item, item.index() - 1);
                }
                else {
                    showMessage("Selected item is already at first position!");
                }
            }
            else {
                showMessage("Left ListBox should have selected item!");
            }
        })

        $("#move-down").click(function () {
            if (listbox1.select().length > 0) {
                if (listbox1.select().first().index() < listbox1.items().length - 1) {
                    var item = listbox1.select().first();
                    listbox1.reorder(item, item.index() + 1);
                }
                else {
                    showMessage("Selected item is already at last position!");
                }
            }
            else {
                showMessage("Left ListBox should have selected item!");
            }
        })

        var Product = kendo.data.Model.define({
            id: "ProductID",
            fields: {
                "ProductName": {
                    type: "string"
                }
            }
        });

        $("#add-item").click(function () {
            var text = $("#add-textbox").val();
            var item = listbox1.add(new Product({
                ProductName: text
            }));
        })

        $("#remove-item").click(function () {
            var text = $("#remove-textbox").val().toLowerCase();
            var items = listbox1.items();
            for (var i = 0; i < items.length; i++) {
                var dataItem = listbox1.dataItem(items[i]);
                if (dataItem.ProductName.toLowerCase().indexOf(text) >= 0) {
                    listbox1.remove(items[i]);
                }
            }
        })
    });
</script>

<style>
    .k-notification-wrap {
        padding: 8px 30px!important;
    }

    #appendto {
        margin-top: 5px;
        height: 15px;
    }

    #appendto .k-i-error {
        padding-right: 8px;
    }

    .box-col .options .k-textbox {
        width: 115px;
    }

    .box h4 {
        margin-top: 25px;
    }

    #example .demo-section {
        overflow: hidden;
        max-width: none;
        width: 555px;
    }

    #example .k-listbox {
        width: 275px;
        height: 310px;
    }

    #example .k-listbox:first-of-type {
        margin-right: 1px;
    }
</style>
<?php require_once '../include/footer.php'; ?>