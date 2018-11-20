
<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $request = json_decode(file_get_contents('php://input'));

    $result = new DataSourceResult('sqlite:..//sample.db');

    echo json_encode($result->read('Products', array('ProductName', 'UnitPrice', 'UnitsInStock'), $request));

    exit;
}

require_once '../include/header.php';

$transport = new \Kendo\Data\DataSourceTransport();

$read = new \Kendo\Data\DataSourceTransportRead();

$read->url('api.php')
     ->contentType('application/json')
     ->type('POST');

$transport->read($read)
          ->parameterMap('function(data) {
              return kendo.stringify(data);
          }');

$schema = new \Kendo\Data\DataSourceSchema();
$schema->data('data')
       ->groups('groups')
       ->total('total');

$dataSource = new \Kendo\Data\DataSource();
$group = new \Kendo\Data\DataSourceGroupItem();
$group->field('UnitsInStock');

$dataSource->transport($transport)
           ->pageSize(5)
           ->addGroupItem($group)
           ->schema($schema)
           ->serverSorting(true)
           ->serverGrouping(true)
           ->serverPaging(true);

$grid = new \Kendo\UI\Grid('grid');

$productName = new \Kendo\UI\GridColumn();
$productName->field('ProductName')
            ->title('Product Name');

$unitPrice = new \Kendo\UI\GridColumn();
$unitPrice->field('UnitPrice')
          ->format('{0:c}')
          ->title('Unit Price');

$unitsInStock = new \Kendo\UI\GridColumn();
$unitsInStock->field('UnitsInStock')
          ->title('Units In Stock');

$grid->addColumn($productName, $unitPrice, $unitsInStock)
     ->selectable('row multiple')
     ->pageable(true)
     ->sortable(true)
     ->groupable(true)
     ->dataSource($dataSource);
?>

 <div class="box wide">
    <div class="box-col">
    <h4>Selection</h4>
    <ul class="options">
        <li>
            <input type="text" value="0" id="selectRow" class="k-textbox"/>
            <button class="selectRow k-button">Select row</button>
        </li>
        <li>
            <button class="clearSelection k-button">Clear selected rows</button>
        </li>
    </ul>
    </div>
    <div class="box-col">
    <h4>Expand / Collapse</h4>
    <ul class="options">
        <li>
            <input type="text" value="0" id="groupRow" class="k-textbox"/>
            <button class="toggleGroup k-button">Collapse/Expand group</button>
        </li>
    </ul>
    </div>
    <div class="box-col">
        <h4>Resize Column</h4>
        <ul class="options">
            <li>
                <input type="text" placeholder="Column Index" id="colIndex" class="k-textbox" />
                <input type="text" placeholder="Width value" id="colWidth" class="k-textbox" />
            </li>
            <li>
                <button class="changeColWidth k-button">Resize</button>
            </li>
        </ul>
    </div>
</div>

<?php
echo $grid->render();
?>

<script>
    $(document).ready(function() {
        $(".clearSelection").click(function() {
            $("#grid").data("kendoGrid").clearSelection();
        });

        var selectRow = function(e) {
            if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                var grid = $("#grid").data("kendoGrid"),
                    rowIndex = $("#selectRow").val(),
                                        row = grid.tbody.find(">tr:not(.k-grouping-row)").eq(rowIndex);

                grid.select(row);
            }
        },
        toggleGroup = function(e) {
            if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                var grid = $("#grid").data("kendoGrid"),
                    rowIndex = $("#groupRow").val(),
                                    row = grid.tbody.find(">tr.k-grouping-row").eq(rowIndex);

                if(row.has(".k-i-collapse").length) {
                    grid.collapseGroup(row);
                } else {
                    grid.expandGroup(row);
                }
            }
        },
        changeColWidth = function (e) {
            if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                var grid = $("#grid").data("kendoGrid"),
                    colIndex = $("#colIndex").val(),
                    width = $("#colWidth").val(),
                    column = grid.columns[colIndex];
                if (parseInt(colIndex) >= 0 && parseInt(width) >= 0) {
                    grid.resizeColumn(column, width);
                }
            }
        };

        $(".selectRow").click(selectRow);
        $("#selectRow").keypress(selectRow);

        $(".toggleGroup").click(toggleGroup);
        $("#groupRow").keypress(toggleGroup);

        $(".changeColWidth").click(changeColWidth);
        $("#colWidth").keypress(changeColWidth);
        $("#colIndex").keypress(changeColWidth);
    });
</script>

<?php require_once '../include/footer.php'; ?>
