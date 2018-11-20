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

$read->url('events.php')
     ->contentType('application/json')
     ->type('POST');

$transport->read($read)
          ->parameterMap('function(data) {
              return kendo.stringify(data);
          }');
$model = new \Kendo\Data\DataSourceSchemaModel();

$productNameField = new \Kendo\Data\DataSourceSchemaModelField('ProductName');
$productNameField->type('string');

$unitPriceField = new \Kendo\Data\DataSourceSchemaModelField('UnitPrice');
$unitPriceField->type('number');

$unitsInStockField = new \Kendo\Data\DataSourceSchemaModelField('UnitsInStock');
$unitsInStockField->type('number');

$model->addField($productNameField)
      ->addField($unitPriceField)
      ->addField($unitsInStockField);

$schema = new \Kendo\Data\DataSourceSchema();
$schema->data('data')
       ->groups('groups')
       ->model($model)
       ->total('total');

$dataSource = new \Kendo\Data\DataSource();

$dataSource->transport($transport)
           ->pageSize(10)
           ->schema($schema)
           ->serverFiltering(true)
           ->serverGrouping(true)
           ->serverSorting(true)
           ->serverPaging(true);

$grid = new \Kendo\UI\Grid('grid');

$productName = new \Kendo\UI\GridColumn();
$productName->field('ProductName')
            ->title('Product Name');

$unitPrice = new \Kendo\UI\GridColumn();
$unitPrice->field('UnitPrice')
          ->format('{0:c}')
          ->width(150)
          ->title('Unit Price');

$unitsInStock = new \Kendo\UI\GridColumn();
$unitsInStock->field('UnitsInStock')
          ->width(150)
          ->title('Units In Stock');

$grid->addColumn($productName, $unitPrice, $unitsInStock)
     ->height(350)
     ->selectable('cell multiple')
     ->pageable(true)
     ->sortable(true)
     ->filterable(true)
     ->groupable(true)
     ->dataSource($dataSource)
     ->page('onPaging')
     ->sort('onSorting')
     ->group('onGrouping')
     ->filter('onFiltering')
     ->change('onChange')
     ->dataBound('onDataBound')
     ->dataBinding('onDataBinding')
     ->groupCollapse('onGroupCollapse')
     ->groupExpand('onGroupExpand');

echo $grid->render();
?>

<script>
    function onChange(arg) {
        var selected = $.map(this.select(), function(item) {
            return $(item).text();
        });

        kendoConsole.log("Selected: " + selected.length + " item(s), [" + selected.join(", ") + "]");
    }

    function onDataBound(arg) {
        kendoConsole.log("Grid data bound");
    }

    function onDataBinding(arg) {
        kendoConsole.log("Grid data binding");
    }

    function onSorting(arg) {
        kendoConsole.log("Sorting on field: " + arg.sort.field + ", direction:" + (arg.sort.dir || "none"));
    }

    function onFiltering(arg) {
        kendoConsole.log("Filter on " + kendo.stringify(arg.filter));
    }

    function onPaging(arg) {
        kendoConsole.log("Paging to page index:" + arg.page);
    }

    function onGrouping(arg) {
        kendoConsole.log("Group on " + kendo.stringify(arg.groups));
    }

    function onGroupExpand(arg) {
        kendoConsole.log("The group to be expanded: " + kendo.stringify(arg.group));
    }

    function onGroupCollapse(arg) {
        kendoConsole.log("The group to be collapsed: " + kendo.stringify(arg.group));
    }
</script>

 <div class="box wide">
    <h4>Console log</h4>
    <div class="console"></div>
</div>
<style>
    div.console div {
        height: auto;
    }
</style>

<?php require_once '../include/footer.php'; ?>
