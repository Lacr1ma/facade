<?php

require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $request = json_decode(file_get_contents('php://input'), true);

    if (isset($request['EmployeeID'])) {
        $employeeId = $request['EmployeeID'];
    } else {
        $employeeId = null;
    }

    $db = new PDO('sqlite:..//sample.db');

    $sql = 'SELECT m.EmployeeID, m.FirstName, m.LastName, '
        . '(SELECT COUNT(*) FROM Employees x WHERE x.ReportsTo=m.EmployeeID) as HasEmployees '
        . 'FROM Employees m '
        . 'WHERE ReportsTo is ?';

    $statement = $db->prepare($sql);

    $statement->execute(array($employeeId));

    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    // iterate over data to set computed keys
    $employees = array();

    foreach ($data as $employee) {
        $employee["FullName"] = $employee["FirstName"] . " " . $employee["LastName"];
        $employee["HasEmployees"] = $employee["HasEmployees"] != 0;
        $employees[] = $employee;
    }

    echo json_encode($employees);

    exit;
}

require_once '../include/header.php';
?>

<?php
    $transport = new \Kendo\Data\DataSourceTransport();

    $read = new \Kendo\Data\DataSourceTransportRead();

    // Connecting to live service on demos.telerik.com/kendo-ui
    // $read->url('http://demos.telerik.com/kendo-ui/service/Employees')
    //     ->dataType('jsonp');

    // Bind to self
    $read->url('remote-data-binding.php')
        ->contentType('application/json')
        ->type('POST');

    $transport->read($read)
        ->parameterMap('function(data) {
            return kendo.stringify(data);
        }');

    $model = new \Kendo\Data\HierarchicalDataSourceSchemaModel();
    $model->id("EmployeeID")
        ->hasChildren("HasEmployees");

    $schema = new \Kendo\Data\HierarchicalDataSourceSchema();
    $schema->model($model);

    $dataSource = new \Kendo\Data\HierarchicalDataSource();
    $dataSource->transport($transport)
        ->schema($schema);

    $dropdowntree = new \Kendo\UI\DropDownTree('dropdowntree');
    $dropdowntree
        ->placeholder('Select ...')
        ->height('auto')
        ->dataTextField('FullName')
        ->dataSource($dataSource);
?>

<div id="example">
    <div class="demo-section k-content">
        <h4>Select an item</h4>
        <?php echo $dropdowntree->render(); ?>
    </div>
</div>

<style>
    .k-dropdowntree  { width: 100%; }
</style>

<?php require_once '../include/footer.php'; ?>
