<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';

$transport = new \Kendo\Data\DataSourceTransport();

$read = new \Kendo\Data\DataSourceTransportRead();
$read->url('https://demos.telerik.com/aspnet-core/service/api/graphql/')
     ->contentType('application/json')
     ->type('POST')
     ->data(new \Kendo\JavaScriptFunction('readProductsData'));

$create = new \Kendo\Data\DataSourceTransportCreate();
$create->url('https://demos.telerik.com/aspnet-core/service/api/graphql/')
     ->contentType('application/json')
     ->type('POST')
     ->data(new \Kendo\JavaScriptFunction('createProductData'));

$update = new \Kendo\Data\DataSourceTransportUpdate();
$update->url('https://demos.telerik.com/aspnet-core/service/api/graphql/')
     ->contentType('application/json')
     ->type('POST')
     ->data(new \Kendo\JavaScriptFunction('updateProductData'));

$destroy = new \Kendo\Data\DataSourceTransportUpdate();
$destroy->url('https://demos.telerik.com/aspnet-core/service/api/graphql/')
     ->contentType('application/json')
     ->type('POST')
     ->data(new \Kendo\JavaScriptFunction('destroyProductData'));

$transport ->read($read)
    ->create($create)
    ->update($update)
    ->destroy($destroy)
    ->parameterMap(new \Kendo\JavaScriptFunction('parameterMap'));

$model = new \Kendo\Data\DataSourceSchemaModel();

$productIDField = new \Kendo\Data\DataSourceSchemaModelField('productID');
$productIDField->type('number');
$productIDField->editable(false);

$productNameField = new \Kendo\Data\DataSourceSchemaModelField('productName');
$productNameField->type('string');

$unitPriceField = new \Kendo\Data\DataSourceSchemaModelField('unitPrice');
$unitPriceField->type('string');

$unitsInStockField = new \Kendo\Data\DataSourceSchemaModelField('unitsInStock');
$unitsInStockField->type('string');

$model->id('productID')
      ->addField($productIDField)
      ->addField($productNameField)
      ->addField($unitPriceField)
      ->addField($unitsInStockField);

$schema = new \Kendo\Data\DataSourceSchema();
$schema->model($model)
    ->data(new \Kendo\JavaScriptFunction('getSchemaData'))
    ->total(new \Kendo\JavaScriptFunction('getSchemaTotal'));

$dataSource = new \Kendo\Data\DataSource();

$dataSource->transport($transport)
           ->pageSize(20)
           ->batch(false)
           ->schema($schema);

$grid = new \Kendo\UI\Grid('grid');

$productID = new \Kendo\UI\GridColumn();
$productID->field('productID')
            ->title('Product ID');

$productName = new \Kendo\UI\GridColumn();
$productName->field('productName')
            ->title('Product Name');

$unitPrice = new \Kendo\UI\GridColumn();
$unitPrice->field('unitPrice')
        ->title('Unit Price');

$unitsInStock = new \Kendo\UI\GridColumn();
$unitsInStock->field('unitsInStock')
            ->title("Units in stock");

$command = new \Kendo\UI\GridColumn();
$command->addCommandItem('edit')
        ->addCommandItem('destroy')
        ->title('Options')
        ->width(250);

$grid->addColumn($productID, $productName, $unitPrice, $unitsInStock, $command)
     ->dataSource($dataSource)
     ->sortable(true)
     ->groupable(true)
     ->pageable(true)
     ->editable("inline")
     ->addToolbarItem(new \Kendo\UI\GridToolbarItem('create'))
     ->attr('style', 'height:550px');

echo $grid->render();
?>

<script>
    var READ_PRODUCTS_QUERY = "query {" +
        "products { productID, productName, unitPrice, unitsInStock }" +
    "}";

    var ADD_PRODUCT_QUERY = "mutation CreateProductMutation($product: ProductInput!){" +
        "createProduct(product: $product){" +
            "productID,"+
            "productName,"+
            "unitPrice,"+
            "unitsInStock"+
        "}"+
    "}";

    var UPDATE_PRODUCT_QUERY = "mutation UpdateProductMutation($product: ProductInput!){" +
        "updateProduct(product: $product){" +
            "productID,"+
            "productName,"+
            "unitPrice,"+
            "unitsInStock"+
        "}" +
    "}";

    var DELETE_PRODUCT_QUERY = "mutation DeleteProductMutation($product: ProductInput!){" +
        "deleteProduct(product: $product){" +
            "productID,"+
            "productName,"+
            "unitPrice,"+
            "unitsInStock"+
        "}"+
    "}";

    function readProductsData (model) {
        return {
            "query": READ_PRODUCTS_QUERY,
            "variables": {"product": model}
        }
    }

    function createProductData (model) {
        return {
            "query": ADD_PRODUCT_QUERY,
            "variables": {"product": model}
        }
    }

    function updateProductData (model) {
        return {
            "query": UPDATE_PRODUCT_QUERY,
            "variables": {"product": model}
        }
    }

    function destroyProductData (model) {
        return {
            "query": DELETE_PRODUCT_QUERY,
            "variables": {"product": model}
        }
    }

    function parameterMap (options, operation) {
        return  kendo.stringify({
            query: options.query,
            variables: options.variables
        });
    }

    function getSchemaData (response) {
        var data = response.data;

        if (data.products) { return data.products; }
        else if (data.createProduct) { return data.createProduct; }
        else if (data.updateProduct) { return data.updateProduct; }
        else if (data.deleteProduct) { return data.deleteProduct; }
    }

    function getSchemaTotal (response) {
        return response.data.products.length;
    }
</script>

<?php require_once '../include/footer.php'; ?>
