<?php

require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $request = json_decode(file_get_contents('php://input'));

    $result = new DataSourceResult('sqlite:..//sample.db');

    $type = $_GET['type'];

    switch($type) {
        case 'categories':
            $result = $result->read('Categories', array('CategoryID', 'CategoryName'), $request);
            break;
        case 'products':
            $result = $result->read('Products', array('ProductID', 'ProductName', 'CategoryID'), $request);
            break;
        case 'orders':
            $result = $result->read('[Order Details]', array('OrderID', 'ProductID', 'Quantity'), $request);
            break;
    }

    echo json_encode($result);

    exit;
}

require_once '../include/header.php';

$transport = new \Kendo\Data\DataSourceTransport();

$read = new \Kendo\Data\DataSourceTransportRead();

$read->url('cascadingcombobox.php?type=categories')
     ->contentType('application/json')
     ->type('POST');

$transport->read($read)
          ->parameterMap('function(data) {
              return kendo.stringify(data);
           }');

$schema = new \Kendo\Data\DataSourceSchema();
$schema->data('data')
       ->total('total');

?>
<div class="demo-section k-content">
    <ul id="fieldlist">
    <li>
        <label for="categories">Categories:</label>
<?php
$categories = new \Kendo\UI\ComboBox('categories');
$categories->dataSource(array('transport' => $transport, 'schema' => $schema, 'serverFiltering' => true))
           ->dataTextField('CategoryName')
           ->dataValueField('CategoryID')
           ->attr('style', 'width:100%;')
           ->filter('contains')
           ->placeholder('Select category ...');

echo $categories->render();
?>
    </li>
    <li>
        <label for="products">Products:</label>
<?php

$read->url('cascadingcombobox.php?type=products');
$transport->read($read);

$products = new \Kendo\UI\ComboBox('products');
$products->dataSource(array('transport' => $transport, 'schema' => $schema, 'serverFiltering' => true))
         ->autoBind(false)
         ->cascadeFrom('categories')
         ->dataTextField('ProductName')
         ->dataValueField('ProductID')
         ->attr('style', 'width:100%;')
         ->filter('contains')
         ->placeholder('Select product ...');

echo $products->render();
?>
    </li>
    <li>
        <label for="orders">Orders:</label>
<?php

$read->url('cascadingcombobox.php?type=orders');
$transport->read($read);

$products = new \Kendo\UI\ComboBox('orders');
$products->dataSource(array('transport' => $transport, 'schema' => $schema, 'serverFiltering' => true))
         ->autoBind(false)
         ->cascadeFrom('products')
         ->dataTextField('OrderID')
         ->dataValueField('OrderID')
         ->attr('style', 'width:100%;')
         ->filter('contains')
         ->placeholder('Select order ...');

echo $products->render();
?>
    </li>
    <li>
        <button class="k-button k-primary" id="get">View Order</button>
    </li>
    </ul>
</div>
<script>
    $(document).ready(function () {
        var categories = $("#categories").data("kendoComboBox"),
            products = $("#products").data("kendoComboBox"),
            orders = $("#orders").data("kendoComboBox");

        $("#get").click(function () {
            var categoryInfo = "\nCategory: { id: " + categories.value() + ", name: " + categories.text() + " }",
                productInfo = "\nProduct: { id: " + products.value() + ", name: " + products.text() + " }",
                orderInfo = "\nOrder: { id: " + orders.value() + ", name: " + orders.text() + " }";

            alert("Order details:\n" + categoryInfo + productInfo + orderInfo);
        });
    });
</script>
<style>
    #fieldlist {
        margin: 0;
        padding: 0;
    }

    #fieldlist li {
        list-style: none;
        padding-bottom: 1.5em;
        text-align: left;
    }

    #fieldlist label {
        display: block;
        padding-bottom: .3em;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 12px;
    }
</style>
<?php require_once '../include/footer.php'; ?>
