<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $request = json_decode(file_get_contents('php://input'));

    $result = new DataSourceResult('sqlite:..//sample.db');

    if (array_key_exists('type', $_GET)) {
        echo json_encode($result->read('Categories', array('CategoryID', 'CategoryName'), $request));
    } else {
        echo json_encode($result->read('Products', array('ProductID', 'ProductName', 'UnitPrice', 'QuantityPerUnit', 'CategoryID'), $request));
    }

    exit;
}

require_once '../include/header.php';

$transport = new \Kendo\Data\DataSourceTransport();

$read = new \Kendo\Data\DataSourceTransportRead();

$read->url('toolbar-template.php')
     ->contentType('application/json')
     ->type('POST');

$transport->read($read)
          ->parameterMap('function(data) {
              return kendo.stringify(data);
          }');

$model = new \Kendo\Data\DataSourceSchemaModel();

$schema = new \Kendo\Data\DataSourceSchema();
$schema->data('data')
       ->total('total');

$dataSource = new \Kendo\Data\DataSource();

$dataSource->transport($transport)
           ->schema($schema)
           ->serverSorting(true)
           ->serverFiltering(true)
           ->serverPaging(true);

$grid = new \Kendo\UI\Grid('grid');

$productID = new \Kendo\UI\GridColumn();
$productID->field('ProductID')
            ->width(100)
            ->title('Product ID');


$productName = new \Kendo\UI\GridColumn();
$productName->field('ProductName')
            ->title('Product Name');

$unitPrice = new \Kendo\UI\GridColumn();
$unitPrice->field('UnitPrice')
          ->width(150)
          ->title('Unit Price');

$quantityPerUnit = new \Kendo\UI\GridColumn();
$quantityPerUnit->field('QuantityPerUnit')
          ->title('Quantity Per Unit');

$grid->addColumn($productID, $productName, $unitPrice, $quantityPerUnit)
     ->dataSource($dataSource)
     ->height(550)
     ->sortable(true)
     ->toolbarTemplateId('toolbar');

echo $grid->render();
?>

<script id="toolbar" type="text/x-kendo-template">
<div class="refreshBtnContainer">
    <a href="\\#" class="k-pager-refresh k-link k-button k-button-icon" title="Refresh"><span class="k-icon k-i-reload"></span></a>
</div>
<div class="toolbar">
    <label class="category-label" for="category">Show products by category:</label>

    <?php

        $transport = new \Kendo\Data\DataSourceTransport();

        $read = new \Kendo\Data\DataSourceTransportRead();

        $read->url('toolbar-template.php?type=categories')
            ->contentType('application/json')
            ->type('POST');

        $transport->read($read)
            ->parameterMap('function(data) {
                return kendo.stringify(data);
              }');

        $schema = new \Kendo\Data\DataSourceSchema();
        $schema->data('data');

        $dataSource = new \Kendo\Data\DataSource();

        $dataSource->transport($transport)
                ->schema($schema);

        $dropDownList = new \Kendo\UI\DropDownList('category');
        $dropDownList->dataSource($dataSource)
                ->dataTextField('CategoryName')
                ->dataValueField('CategoryID')
                ->autoBind(false)
                ->change('categoryChange')
                ->optionLabel('All');

        echo $dropDownList->renderInTemplate();
    ?>

</div>

</script>

<script>
    $(function () {
        var grid = $("#grid");
        grid.find(".k-grid-toolbar").on("click", ".k-pager-refresh", function (e) {
            e.preventDefault();
            grid.data("kendoGrid").dataSource.read();
        });

    });

    function categoryChange() {
        var value = this.value(),
            grid = $("#grid").data("kendoGrid");

        if (value) {
            grid.dataSource.filter({ field: "CategoryID", operator: "eq", value: parseInt(value) });
        } else {
            grid.dataSource.filter({});
        }
    }
</script>

<style>
    #grid .k-grid-toolbar
    {
        padding: .6em 1.3em .6em .4em;
    }
    .category-label
    {
        vertical-align: middle;
        padding-right: .5em;
    }
    #category
    {
        vertical-align: middle;
    }
    .refreshBtnContainer {
        display: inline-block;
    }
    .toolbar {
        float: right;
        margin-right: .8em;
    }
</style>

<?php require_once '../include/footer.php'; ?>
