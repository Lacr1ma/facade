<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';

$transport = new \Kendo\Data\DataSourceTransport();

$read = new \Kendo\Data\DataSourceTransportRead();
$read->url(new \Kendo\JavaScriptFunction('function (item) {
    if (item.hasOwnProperty("id")) {
        return "https://demos.telerik.com/kendo-ui/service-v4/odata/Employees(" + item.id + ")/Subordinates";
    } else {
        return "https://demos.telerik.com/kendo-ui/service-v4/odata/Employees/Default.TopEmployees()/";
    }
}'));

$transport ->read($read);

$model = new \Kendo\Data\DataSourceSchemaModel();

$firstNameField = new \Kendo\Data\DataSourceSchemaModelField('FirstName');
$firstNameField->type('string');

$lastNameField = new \Kendo\Data\DataSourceSchemaModelField('LastName');
$lastNameField->type('string');

$phoneField = new \Kendo\Data\DataSourceSchemaModelField('HomePhone');
$phoneField->type('string');

$extentionField = new \Kendo\Data\DataSourceSchemaModelField('Extension');
$extentionField->type('string');

$addressField = new \Kendo\Data\DataSourceSchemaModelField('Address');
$addressField->type('string');

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
    ->addField($phoneField)
    ->addField($extentionField)
    ->addField($addressField);

$schema = new \Kendo\Data\DataSourceSchema();
$schema->model($model);

$dataSource = new \Kendo\Data\DataSource();
$dataSource->transport($transport)
           ->schema($schema)
           ->type("odata-v4");

$treeList = new \Kendo\UI\TreeList('treelist');

$firstName = new \Kendo\UI\TreeListColumn();
$firstName->field('FirstName')
            ->title('First Name')
            ->width(280);

$lastName = new \Kendo\UI\TreeListColumn();
$lastName->field('LastName')
            ->title('Last Name')
            ->width(160);

$phone = new \Kendo\UI\TreeListColumn();
$phone->field('HomePhone')
            ->width(200);

$extension = new \Kendo\UI\TreeListColumn();
$extension->field('Extension')
            ->width(140);

$address = new \Kendo\UI\TreeListColumn();
$address->field('Address');

$treeList->addColumn($firstName, $lastName, $phone, $extension, $address)
     ->dataSource($dataSource)
     ->sortable(true)
     ->filterable(true);
?>

<?php
echo $treeList->render();
?>

<?php require_once '../include/footer.php'; ?>
