<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';

$transport = new \Kendo\Data\DataSourceTransport();

$batch = new \Kendo\Data\DataSourceTransportBatch();
$batch->url(new \Kendo\JavaScriptFunction('function () {
    return "https://demos.telerik.com/kendo-ui/service-v4/odata/$batch";
}'));

$create = new \Kendo\Data\DataSourceTransportCreate();
$create->url(new \Kendo\JavaScriptFunction('function (dataItem) {
    delete dataItem.ProductID;
    return "https://demos.telerik.com/kendo-ui/service-v4/odata/Products";
}'));

$read = new \Kendo\Data\DataSourceTransportRead();

$read->url(new \Kendo\JavaScriptFunction('function () {
    return "https://demos.telerik.com/kendo-ui/service-v4/odata/Products";
}'));

$update = new \Kendo\Data\DataSourceTransportUpdate();

$update->url(new \Kendo\JavaScriptFunction('function (dataItem) {
    return "https://demos.telerik.com/kendo-ui/service-v4/odata/Products(" + dataItem.ProductID + ")";
}'));

$destroy = new \Kendo\Data\DataSourceTransportDestroy();

$destroy->url(new \Kendo\JavaScriptFunction('function (dataItem) {
    return "https://demos.telerik.com/kendo-ui/service-v4/odata/Products(" + dataItem.ProductID + ")";
}'));

$transport->create($create)
          ->read($read)
          ->update($update)
          ->destroy($destroy)
          ->batch($batch);

$model = new \Kendo\Data\DataSourceSchemaModel();

$productIDField = new \Kendo\Data\DataSourceSchemaModelField('ProductID');
$productIDField->type('number')
               ->editable(false)
               ->nullable(true);

$productNameField = new \Kendo\Data\DataSourceSchemaModelField('ProductName');
$productNameField->type('string')
                 ->validation(array('required' => true));


$unitPriceValidation = new \Kendo\Data\DataSourceSchemaModelFieldValidation();
$unitPriceValidation->required(true)
                    ->min(1);

$unitPriceField = new \Kendo\Data\DataSourceSchemaModelField('UnitPrice');
$unitPriceField->type('number')
               ->validation($unitPriceValidation);

$unitsInStockField = new \Kendo\Data\DataSourceSchemaModelField('UnitsInStock');
$unitsInStockField->type('number');

$discontinuedField = new \Kendo\Data\DataSourceSchemaModelField('Discontinued');
$discontinuedField->type('boolean');

$model->id('ProductID')
    ->addField($productIDField)
    ->addField($productNameField)
    ->addField($unitPriceField)
    ->addField($unitsInStockField)
    ->addField($discontinuedField);

$schema = new \Kendo\Data\DataSourceSchema();
$schema->model($model);

$dataSource = new \Kendo\Data\DataSource();

$dataSource->transport($transport)
           ->batch(true)
           ->pageSize(30)
           ->type("odata-v4")
           ->schema($schema);

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

$discontinued = new \Kendo\UI\GridColumn();
$discontinued->field('Discontinued')
          ->width(100);

$command = new \Kendo\UI\GridColumn();
$command->addCommandItem('destroy')
        ->title('&nbsp;')
        ->width(110);

$grid->addColumn($productName, $unitPrice, $unitsInStock, $discontinued, $command)
     ->dataSource($dataSource)
     ->addToolbarItem(new \Kendo\UI\GridToolbarItem('create'),
        new \Kendo\UI\GridToolbarItem('save'), new \Kendo\UI\GridToolbarItem('cancel'))
     ->height(400)
     ->navigatable(true)
     ->editable(true)
     ->pageable(true);

echo $grid->render();
?>

<?php require_once '../include/footer.php'; ?>
