<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $request = json_decode(file_get_contents('php://input'));

    $result = new DataSourceResult('sqlite:..//sample.db');

    echo json_encode($result->read('Orders', array('OrderID', 'OrderDate', 'ShipCountry', 'ShipCity', 'ShipName', 'ShippedDate'), $request));

    exit;
}

require_once '../include/header.php';

$transport = new \Kendo\Data\DataSourceTransport();

$read = new \Kendo\Data\DataSourceTransportRead();

$read->url('column-reordering.php')
     ->contentType('application/json')
     ->type('POST');

$transport->read($read)
          ->parameterMap('function(data) {
              return kendo.stringify(data);
          }');

$model = new \Kendo\Data\DataSourceSchemaModel();

$orderIDField = new \Kendo\Data\DataSourceSchemaModelField('OrderID');
$orderIDField->type('number');

$orderDateField = new \Kendo\Data\DataSourceSchemaModelField('OrderDate');
$orderDateField->type('date');

$shipNameField = new \Kendo\Data\DataSourceSchemaModelField('ShipName');
$shipNameField->type('string');

$shipCityField = new \Kendo\Data\DataSourceSchemaModelField('ShipCity');
$shipCityField->type('string');

$shipCountryField = new \Kendo\Data\DataSourceSchemaModelField('ShipCountry');
$shipCountryField->type('string');

$shippedDateField = new \Kendo\Data\DataSourceSchemaModelField('ShippedDate');
$shippedDateField->type('date');

$model->addField($orderIDField)
      ->addField($shipNameField)
      ->addField($shipCityField)
      ->addField($shipCountryField)
      ->addField($shippedDateField)
      ->addField($orderDateField);


$schema = new \Kendo\Data\DataSourceSchema();
$schema->data('data')
       ->model($model)
       ->total('total');

$dataSource = new \Kendo\Data\DataSource();

$dataSource->transport($transport)
           ->pageSize(15)
           ->serverPaging(true)
           ->serverSorting(true)
           ->schema($schema);

$grid = new \Kendo\UI\Grid('grid');

$orderDate = new \Kendo\UI\GridColumn();
$orderDate->field('OrderDate')
    ->width(120)
    ->format('{0:MM/dd/yyyy}')
    ->title('Order Date');

$orderID = new \Kendo\UI\GridColumn();
$orderID->field('OrderID')
    ->width(120)   
    ->title('Order Id');

$shipCountry = new \Kendo\UI\GridColumn();
$shipCountry->field('ShipCountry')
    ->title('Ship Country');

$shipCity = new \Kendo\UI\GridColumn();
$shipCity->field('ShipCity')
    ->title('Ship City')
    ->width(220);

$shipName = new \Kendo\UI\GridColumn();
$shipName->field('ShipName')
    ->title('Ship Name')
    ->width(200);



$shippedDate = new \Kendo\UI\GridColumn();
$shippedDate->field('ShippedDate')
    ->title('Shipped Date')
    ->format('{0:MM/dd/yyyy}');

$grid->dataSource($dataSource)
     ->addColumn($orderDate,$shipCountry,$shipCity,$shipName, $shippedDate,$orderID)
     ->height(550)
     ->reorderable(true)
     ->pageable(true);

echo $grid->render();
?>

<?php require_once '../include/footer.php'; ?>
