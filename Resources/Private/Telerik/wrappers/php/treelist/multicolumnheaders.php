<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $request = json_decode(file_get_contents('php://input'));

    $result = new DataSourceResult('sqlite:..//sample.db');

    echo json_encode($result->read('EmployeeDirectory', array('EmployeeID', 'ReportsTo', 'FirstName', 'Position', 'LastName', 'City', 'Country', 'Phone'), $request));

    exit;
}

require_once '../include/header.php';

$transport = new \Kendo\Data\DataSourceTransport();

$read = new \Kendo\Data\DataSourceTransportRead();

$read->url('multicolumnheaders.php')
     ->contentType('application/json')
     ->type('POST');

$transport ->read($read)
          ->parameterMap('function(data) {
              return kendo.stringify(data);
          }');

$model = new \Kendo\Data\DataSourceSchemaModel();

$firstNameField = new \Kendo\Data\DataSourceSchemaModelField('FirstName');
$firstNameField->type('string');

$positionField = new \Kendo\Data\DataSourceSchemaModelField('Position');
$positionField->type('string');

$lastNameField = new \Kendo\Data\DataSourceSchemaModelField('LastName');
$lastNameField->type('string');

$cityField = new \Kendo\Data\DataSourceSchemaModelField('City');
$cityField->type('string');

$countryField = new \Kendo\Data\DataSourceSchemaModelField('Country');
$countryField->type('string');

$phoneField = new \Kendo\Data\DataSourceSchemaModelField('Phone');
$phoneField->type('string');

$employeeIDField = new \Kendo\Data\DataSourceSchemaModelField('EmployeeID');
$employeeIDField->type('number');

$parentIdField = new \Kendo\Data\DataSourceSchemaModelField('parentId');
$parentIdField->from("ReportsTo")
    ->nullable(true)
    ->type('number');

$model->id("EmployeeID")
    ->addField($employeeIDField)
    ->addField($parentIdField)
    ->addField($firstNameField)
    ->addField($lastNameField)
    ->addField($positionField)
    ->addField($cityField)
    ->addField($countryField)
    ->addField($phoneField);

$schema = new \Kendo\Data\DataSourceSchema();
$schema->data('data')
       ->model($model);

$dataSource = new \Kendo\Data\DataSource();

$dataSource->transport($transport)
           ->schema($schema);

$treeList = new \Kendo\UI\TreeList('treelist');

$firstName = new \Kendo\UI\TreeListColumn();
$firstName->field('FirstName')
            ->title('First Name')
            ->width(180);

$position = new \Kendo\UI\TreeListColumn();
$position->field('Position');

$lastName = new \Kendo\UI\TreeListColumn();
$lastName->field('LastName')
            ->title('Last Name')
            ->width(120);

$city = new \Kendo\UI\TreeListColumn();
$city->field('City')
            ->width(140);

$country = new \Kendo\UI\TreeListColumn();
$country->field('Country')
            ->width(140);

$phone = new \Kendo\UI\TreeListColumn();
$phone->field('Phone');

$locationGroup = new \Kendo\UI\TreeListColumn();
$locationGroup->title('Location')
            ->addColumns($city, $country);

$personalInfoGroup = new \Kendo\UI\TreeListColumn();
$personalInfoGroup ->title('Personal Info')
            ->addColumns($lastName, $locationGroup, $phone);

$treeList->addColumn($firstName, $position, $personalInfoGroup)
     ->dataSource($dataSource)
     ->sortable(true)
     ->resizable(true)
     ->reorderable(true)
     ->columnMenu(true)
     ->attr('style', 'height:540px');

?>

<?php
echo $treeList->render();
?>

<?php require_once '../include/footer.php'; ?>
