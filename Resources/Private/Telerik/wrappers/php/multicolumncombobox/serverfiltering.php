<?php

require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $request = json_decode(file_get_contents('php://input'));

    $result = new DataSourceResult('sqlite:..//sample.db');

    echo json_encode($result->read('Products', array('ProductID', 'ProductName'), $request));

    exit;
}

require_once '../include/header.php';

$transport = new \Kendo\Data\DataSourceTransport();

$read = new \Kendo\Data\DataSourceTransportRead();

$read->url('serverfiltering.php')
     ->contentType('application/json')
     ->type('POST');

$transport->read($read)
          ->parameterMap('function(data) {
              if(!data["filter"].filters.length) {
                  delete data["filter"];
              }
              return kendo.stringify(data);
           }');

$schema = new \Kendo\Data\DataSourceSchema();
$schema->data('data')
       ->total('total');

$dataSource = new \Kendo\Data\DataSource();

$dataSource->transport($transport)
           ->schema($schema)
           ->serverFiltering(true);

$multicollumncomboBox = new \Kendo\UI\MultiColumnComboBox('products');

$multicollumncomboBox->dataSource($dataSource)
         ->placeholder('Select product')
         ->dataTextField('ProductName')
         ->dataValueField('ProductID')
         ->addColumn(
             array('field' => 'ProductName', 'title' => 'Name'),
             array('field' => 'ProductID', 'title' => 'ID')
            )
         ->filter('contains')
         ->ignoreCase(false)
         ->attr('style', 'width:100%;');
?>

<div class="demo-section k-content">
    <h4>Find a product</h4>
<?php
echo $multicollumncomboBox->render();
?>
</div>
<?php require_once '../include/footer.php'; ?>
