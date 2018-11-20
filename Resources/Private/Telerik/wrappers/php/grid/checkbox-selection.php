<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $request = json_decode(file_get_contents('php://input'));

    $result = new DataSourceResult('sqlite:..//sample.db');

    $type = $_GET['type'];

    echo json_encode($result->read('Products', array('ProductID', 'ProductName', 'UnitPrice', 'UnitsInStock', 'Discontinued'), $request));

    exit;
}

require_once '../include/header.php';

$transport = new \Kendo\Data\DataSourceTransport();

$read = new \Kendo\Data\DataSourceTransportRead();

$read->url('checkbox-selection.php?type=read')
     ->contentType('application/json')
     ->type('POST');

$transport->read($read);

$model = new \Kendo\Data\DataSourceSchemaModel();
$model->id('ProductID');

$schema = new \Kendo\Data\DataSourceSchema();
$schema->data('data')
       ->model($model)
       ->total('total');

$dataSource = new \Kendo\Data\DataSource();

$dataSource->transport($transport)
           ->pageSize(10)
           ->schema($schema);

$grid = new \Kendo\UI\Grid('grid');

$selectColumn = new \Kendo\UI\GridColumn();
$selectColumn->selectable(true)
             ->width(50);

$productName = new \Kendo\UI\GridColumn();
$productName->field('ProductName')
            ->title('Product Name');

$unitPrice = new \Kendo\UI\GridColumn();
$unitPrice->field('UnitPrice')
          ->format('{0:c}')
          ->width(120)
          ->title('Unit Price');

$unitsInStock = new \Kendo\UI\GridColumn();
$unitsInStock->field('UnitsInStock')
          ->width(120)
          ->title('Units In Stock');

$discontinued = new \Kendo\UI\GridColumn();
$discontinued->field('Discontinued')
          ->width(120);

$grid->addColumn($selectColumn,$productName, $unitPrice, $unitsInStock, $discontinued)
     ->dataSource($dataSource)
     ->persistSelection(true)
     ->sortable(true)
     ->change('onChange')
     ->pageable(true);

echo $grid->render();
?>

<script>
    function onChange(arg) {
        kendoConsole.log("The selected product ids are: [" + this.selectedKeyNames().join(", ") + "]");
    }
</script>
<div class="box wide">
    <h4>Console log</h4>
    <div class="console"></div>
</div>
<style>
    .console div {
        height: 3.3em;
    }
</style>

<?php require_once '../include/footer.php'; ?>
