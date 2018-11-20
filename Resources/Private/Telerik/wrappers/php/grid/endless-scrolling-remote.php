<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';

$transport = new \Kendo\Data\DataSourceTransport();

$read = new \Kendo\Data\DataSourceTransportRead();
$read->url('https://demos.telerik.com/kendo-ui/service/Northwind.svc/Products')
     ->dataType('jsonp');

$create = new \Kendo\Data\DataSourceTransportCreate();
$create->url('https://demos.telerik.com/kendo-ui/service/products/create')
        ->dataType('jsonp');

$update = new \Kendo\Data\DataSourceTransportUpdate();
$update->url('https://demos.telerik.com/kendo-ui/service/products/update')
        ->dataType('jsonp');

$destroy = new \Kendo\Data\DataSourceTransportDestroy();
$destroy->url('https://demos.telerik.com/kendo-ui/service/products/destroy')
        ->dataType('jsonp');

$model = new \Kendo\Data\DataSourceSchemaModel();

$transport->read($read)
          ->update($update)
          ->create($create)
          ->destroy($destroy)
          ->parameterMap('parameterMap');

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
$schema->data(new \Kendo\JavaScriptFunction('function schemaData(response) {
            return response.d ? response.d.results : response;
        }'))
       ->model($model);

$dataSource = new \Kendo\Data\DataSource();

$dataSource->transport($transport)
           ->pageSize(20)
           ->type("odata")
           ->schema($schema)
           ->serverSorting(true)
           ->serverPaging(true);

$grid = new \Kendo\UI\Grid('grid');

$productName = new \Kendo\UI\GridColumn();
$productName->field('ProductName')
          ->title('Product Name');

$unitPrice = new \Kendo\UI\GridColumn();
$unitPrice->field('UnitPrice')
          ->title('Unit Price');

$unitsInStock = new \Kendo\UI\GridColumn();
$unitsInStock->field('UnitsInStock')
          ->title('Units In Stock');

$discontinued= new \Kendo\UI\GridColumn();
$discontinued->field('Discontinued')
          ->title('Discontinued');

$command = new \Kendo\UI\GridColumn();
$command->addCommandItem('edit')
        ->addCommandItem('destroy')
        ->title('&nbsp;')
        ->width(250);

$scrollable = new \Kendo\UI\GridScrollable();
$scrollable->endless(true);

$pageable = new \Kendo\UI\GridPageable();
$pageable ->numeric(false)
          ->previousNext(false);

$grid->addColumn($productName, $unitPrice, $unitsInStock, $discontinued, $command)
     ->dataSource($dataSource)
     ->sortable(true)
     ->height(550)
     ->addToolbarItem(new \Kendo\UI\GridToolbarItem('create'))
     ->scrollable($scrollable)
     ->editable('inline')
     ->pageable($pageable);

echo $grid->render();
?>
<script>
    function parameterMap(options, operation) {
        if (operation !== "read" && options.models) {
            return { models: kendo.stringify(options.models) };
        }
        return kendo.data.transports["odata"].parameterMap(options, operation);
    }
</script>
<?php require_once '../include/footer.php'; ?>
