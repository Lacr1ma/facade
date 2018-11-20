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

$read->url('http://demos.telerik.com/kendo-ui/service/Northwind.svc/Customers');

$transport->read($read);

$group = new \Kendo\Data\DataSourceGroupItem();
$group->field('Country');

$dataSource = new \Kendo\Data\DataSource();

$dataSource->type('odata')
           ->transport($transport)
           ->addGroupItem($group);

$multicolumncomboBox = new \Kendo\UI\MultiColumnComboBox('customers');

$multicolumncomboBox->dataSource($dataSource)
         ->dataTextField('ContactName')
         ->dataValueField('CustomerID')
         ->addColumn(
            array('field' => 'ContactName', 'title' => 'Name'),
            array('field' => 'CustomerID', 'title' => 'ID')
           )
         ->height(400)
         ->attr('style', 'width: 100%;');

?>
<div class="demo-section k-content">
    <h4>Customers</h4>
<?php
echo $multicolumncomboBox->render();
?>
</div>
<?php require_once '../include/footer.php'; ?>
