<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $request = json_decode(file_get_contents('php://input'));

    $result = new DataSourceResult('sqlite:..//sample.db');

    $type = $_GET['type'];

    $columns =  array('EmployeeID', 'ReportsTo', 'FirstName', 'LastName', 'Position', 'Phone', 'Extension', 'HireDate');

    switch($type) {
        case 'create':
            $result = $result->create('EmployeeDirectory', $columns, $request->models, 'EmployeeID');
            break;
        case 'read':
            $result = $result->read('EmployeeDirectory', $columns, $request);
            break;
        case 'update':
            $result = $result->update('EmployeeDirectory', $columns, $request->models, 'EmployeeID');
            break;
        case 'destroy':
            $result = $result->destroy('EmployeeDirectory', $request->models, 'EmployeeID');
            break;
    }

    echo json_encode($result, JSON_NUMERIC_CHECK);

    exit;
}

require_once '../include/header.php';

$transport = new \Kendo\Data\DataSourceTransport();

$read = new \Kendo\Data\DataSourceTransportRead();

$read->url('editing.php?type=read')
     ->contentType('application/json')
     ->type('POST');

$update = new \Kendo\Data\DataSourceTransportUpdate();

$update->url('editing.php?type=update')
     ->contentType('application/json')
     ->type('POST');

$destroy = new \Kendo\Data\DataSourceTransportDestroy();

$destroy->url('editing.php?type=destroy')
     ->contentType('application/json')
     ->type('POST');

$transport->create($create)
          ->read($read)
          ->update($update)
          ->destroy($destroy)
          ->parameterMap('function(data) {
              return kendo.stringify(data);
          }');

$model = new \Kendo\Data\DataSourceSchemaModel();

$firstNameField = new \Kendo\Data\DataSourceSchemaModelField('FirstName');
$firstNameField->type('string')
            ->validation(array('required' => true));

$lastNameField = new \Kendo\Data\DataSourceSchemaModelField('LastName');
$lastNameField->type('string')
            ->validation(array('required' => true));

$positionField = new \Kendo\Data\DataSourceSchemaModelField('Position');
$positionField->type('string');

$phoneField = new \Kendo\Data\DataSourceSchemaModelField('Phone');
$phoneField->type('string');

$extensionField = new \Kendo\Data\DataSourceSchemaModelField('Extension');
$extensionField->type('number')
            ->validation(array('required' => true, 'min' => 0));

$hireDateField = new \Kendo\Data\DataSourceSchemaModelField('HireDate');
$hireDateField->type('date');

$employeeIDField = new \Kendo\Data\DataSourceSchemaModelField('EmployeeID');
$employeeIDField->type('number')
               ->editable(false)
               ->nullable(false);

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
    ->addField($phoneField)
    ->addField($extensionField)
    ->addField($hireDateField);

$schema = new \Kendo\Data\DataSourceSchema();
$schema->data('data')
       ->model($model);

$dataSource = new \Kendo\Data\DataSource();

$dataSource->transport($transport)
        ->batch(true)
       ->schema($schema);

$treeList = new \Kendo\UI\TreeList('treelist');

$firstName = new \Kendo\UI\TreeListColumn();
$firstName->field('FirstName')
            ->title('First Name')
            ->width(220);

$lastName = new \Kendo\UI\TreeListColumn();
$lastName->field('LastName')
            ->title('Last Name')
            ->width(100);

$position = new \Kendo\UI\TreeListColumn();
$position->field('Position');

$phone = new \Kendo\UI\TreeListColumn();
$phone->field('Phone');

$extension = new \Kendo\UI\TreeListColumn();
$extension->field('Extension')
            ->title('Ext')
            ->format('{0:#}');

$hireDate = new \Kendo\UI\TreeListColumn();
$hireDate->field('HireDate')
        ->title('Hire Date')
        ->format('{0:MMMM d, yyyy}');

$command = new \Kendo\UI\GridColumn();
$command->addCommandItem('edit')
        ->addCommandItem('destroy')
        ->title('Edit')
        ->width(250);

$treeList->addColumn($firstName, $lastName, $position, $hireDate, $phone, $extension, $command)
     ->dataSource($dataSource)
     ->editable(true)
     ->navigatable(true)
     ->sortable(true)
     ->selectable("multiple, row")
     ->attr('style', 'height:540px');

?>

<?php
echo $treeList->render();
?>
<script>
    $(document.body).keydown(function (e) {
        if (e.altKey && e.keyCode == 87) {
            $("#treelist").data("kendoTreeList").table.focus();
        }
    });
</script>

<div class="box wide">
    <div class="box-col">
        <h4>Focus</h4>
        <ul class="keyboard-legend" style="margin-bottom: 1em;">
            <li>
                <span class="button-preview">
                    <span class="key-button leftAlign">Alt</span>
                    +
                    <span class="key-button">w</span>
                </span>
                <span class="button-descr">
                    focuses the widget
                </span>
            </li>
        </ul>

        <h4>Actions applied on TreeList header</h4>
        <ul class="keyboard-legend">
            <li>
                <span class="button-preview">
                    <span class="key-button">Enter</span>
                </span>
                <span class="button-descr">
                    sort by the column
                </span>
            </li>
        </ul>
    </div>

    <div class="box-col">
        <h4>Actions applied on TreeList data table</h4>
        <ul class="keyboard-legend">
            <li>
                <span class="button-preview">
                    <span class="key-button wider">Arrow Keys</span>
                </span>
                <span class="button-descr">
                    to navigate over the cells
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">Space</span>
                </span>
                <span class="button-descr">
                    selects the row holding the currently highlighted cell
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button leftAlign">Ctrl</span>
                    +
                    <span class="key-button">Space</span>
                </span>
                <span class="button-descr">
                    selects or deselects the current row, while persisting previously selected rows (only for selection mode "multiple")
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button leftAlign">Shift</span>
                    +
                    <span class="key-button">Space</span>
                </span>
                <span class="button-descr">
                    performs range selection, selects all the rows between the last selected one (with SPACE or mouse click) and the one holding the focused cell
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button leftAlign">Shift</span>
                    +
                    <span class="key-button">Arrow Keys</span>
                </span>
                <span class="button-descr">
                    adds the row which holds the focused cell to the selection (only for selection mode "multiple")
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button wider">Enter or F2</span>
                </span>
                <span class="button-descr">
                    Puts the item in edit mode, if performed over a command column will focus the first focusable element inside it.
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button wider">Esc</span>
                </span>
                <span class="button-descr">
                    Cancels the edit or returns the focus to the table if an element inside a cell is focused.
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button wider">Alt</span>
                    +
                    <span class="key-button">Right Arrow</span>
                </span>
                <span class="button-descr">
                    Expands the current item.
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button wider">Alt</span>
                    +
                    <span class="key-button">Left Arrow</span>
                </span>
                <span class="button-descr">
                    Collapses the current item.
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button wider">Ctrl</span>
                    +
                    <span class="key-button">Home</span>
                </span>
                <span class="button-descr">
                    Focuses the first focusable element inside the body
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button wider">Ctrl</span>
                    +
                    <span class="key-button">End</span>
                </span>
                <span class="button-descr">
                    Focuses the last focusable element inside the body
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button wider">Home</span>
                </span>
                <span class="button-descr">
                    Focuses the first focusable cell in the row
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button wider">End</span>
                </span>
                <span class="button-descr">
                    Focuses the last focusable cell in the row
                </span>
            </li>
        </ul>
    </div>
</div>
<?php require_once '../include/footer.php'; ?>
