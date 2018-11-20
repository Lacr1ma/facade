<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>
<div role="application">
    <div class="demo-section k-content">
	<img src="../content/web/listbox/arrow-left2right.png" alt="left to right" class="arrow" /><br />
<?php
    $listbox1 = new \Kendo\UI\ListBox('discontinued');

    $listbox1->dataValueField("ProductID")
             ->dataTextField("ProductName")
             ->draggable(true)
             ->dropSources(array("available"))
             ->connectWith("available")
             ->selectable("Single");

    $listbox1->addEvent("function(e){ setDiscontinued(e, true)}")
             ->remove("function(e){ setDiscontinued(e, false)}");

    echo $listbox1->render();
?>
       
<?php
    $listbox2 = new \Kendo\UI\ListBox('available');

    $listbox2->dataValueField("ProductID")
             ->dataTextField("ProductName")
             ->draggable(true)
             ->dropSources(array("discontinued"))
             ->connectWith("discontinued")
             ->selectable("single");

    echo $listbox2->render();
?>
        <img src="../content/web/listbox/arrow-right2left.png" alt="right to left" class="arrow" />
        <button id="save-changes-btn">Save changes</button>
    </div>
</div>

<script>
    var crudServiceBaseUrl = "https://demos.telerik.com/kendo-ui/service",
        dataSource;

    $(document).ready(function () {
            dataSource = new kendo.data.DataSource({
                serverFiltering: false,
                transport: {
                    read: {
                        url: crudServiceBaseUrl + "/Products",
                        dataType: "jsonp"
                    },
                    update: {
                        url: crudServiceBaseUrl + "/Products/Update",
                        dataType: "jsonp"
                    },
                    parameterMap: function (options, operation) {
                        if (operation !== "read" && options.models) {
                            return { models: kendo.stringify(options.models) };
                        }
                    }
                },
				requestStart: function () { 
					kendo.ui.progress($(".demo-section"), true);
				},
				requestEnd: function () {
					kendo.ui.progress($(".demo-section"), false);
				},
                batch: false,
                schema: {
                    model: {
                        id: "ProductID",
                        fields: {
                            ProductID: { editable: false, nullable: true },
                            Discontinued: { type: "boolean" },
                        }
                    }
                }
            });

        dataSource.fetch(function () {
            var data = this.data();
            var discontinued = $("#discontinued").data("kendoListBox");
            var available = $("#available").data("kendoListBox");

            for (var i = 0; i < data.length; i++) {
                if (data[i].Discontinued) {
                    discontinued.add(data[i]);
                }
                else {
                    available.add(data[i]);
                }
            }
        });

        $("#save-changes-btn").kendoButton({
            click: function (e) {
                dataSource.sync();
            }
        });
    });

    function setDiscontinued(e, flag) {
        var removedItems = e.dataItems;
        for (var i = 0; i < removedItems.length; i++) {
            var item = dataSource.get(removedItems[i].ProductID);
            item.Discontinued = flag;
            item.dirty = !item.dirty;
        }
    }
</script>

<style>
    #example .k-listbox .k-item{
        cursor: move;
    }

    #example .arrow {
        padding: 8px 0 5px 238px;
    }

    #save-changes-btn {
        float: right;
        margin-top: 20px;    
    }

    #example .demo-section {
        max-width: none;
        width: 555px;
    }

    #example .k-listbox {
        width: 275px;
        height: 310px;
    }
</style>
<?php require_once '../include/footer.php'; ?>
