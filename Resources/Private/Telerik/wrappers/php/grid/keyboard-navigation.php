<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $request = json_decode(file_get_contents('php://input'));

    $result = new DataSourceResult('sqlite:..//sample.db');

    echo json_encode($result->read('Employees', array('FirstName', 'LastName', 'City', 'Address', 'HomePhone'), $request));

    exit;
}

require_once '../include/header.php';

$transport = new \Kendo\Data\DataSourceTransport();

$read = new \Kendo\Data\DataSourceTransportRead();

$read->url('keyboard-navigation.php')
     ->contentType('application/json')
     ->type('POST');

$transport->read($read)
          ->parameterMap('function(data) {
              return kendo.stringify(data);
          }');

$schema = new \Kendo\Data\DataSourceSchema();
$schema->data('data')
       ->groups('groups')
       ->total('total');

$dataSource = new \Kendo\Data\DataSource();
$group = new \Kendo\Data\DataSourceGroupItem();
$group->field('FirstName');

$dataSource->transport($transport)
           ->pageSize(10)
           ->addGroupItem($group)
           ->schema($schema)
           ->serverSorting(true)
           ->serverFiltering(true)
           ->serverGrouping(true)
           ->serverPaging(true);

$grid = new \Kendo\UI\Grid('grid');

$firstName = new \Kendo\UI\GridColumn();
$firstName->field("FirstName")
    ->title('First Name');

$lastName = new \Kendo\UI\GridColumn();
$lastName->field("LastName")
    ->title('Last Name');

$city = new \Kendo\UI\GridColumn();
$city->field('City');

$address = new \Kendo\UI\GridColumn();
$address->field('Address');

$phone = new \Kendo\UI\GridColumn();
$phone->field('HomePhone');

$grid->addColumn($firstName, $lastName, $city, $address, $phone)
     ->selectable('row multiple')
     ->pageable(true)
     ->navigatable(true)
	 ->groupable(true)
     ->sortable(true)
     ->filterable(true)
     ->reorderable(true)
     ->dataSource($dataSource);

echo $grid->render();
?>
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

                <h4>Actions applied on Grid header</h4>
                <ul class="keyboard-legend">
                    <li>
                        <span class="button-preview">
                            <span class="key-button">Enter</span>
                        </span>
                        <span class="button-descr">
                            sort by the column
                        </span>
                    </li>
                    <li>
                        <span class="button-preview">
                            <span class="key-button leftAlign">Alt</span>
                            +
                            <span class="key-button">Down</span>
                        </span>
                        <span class="button-descr">
                            opens the filter menu
                        </span>
                    </li>
                    <li>
                        <span class="button-preview">
                            <span class="key-button">Esc</span>
                        </span>
                        <span class="button-descr">
                            closes the filter menu
                        </span>
                    </li>
                    <li>
                        <span class="button-preview">
                            <span class="key-button">Tab</span>
                        </span>
                        <span class="button-descr">
                            navigates through the elements in the filter menu(default browser behavior)
                        </span>
                    </li>
                    <li>
                        <span class="button-preview">
                            <span class="key-button leftAlign">Shift</span>
                            +
                            <span class="key-button">Tab</span>
                        </span>
                        <span class="button-descr">
                            same as Tab, but in reverse order
                        </span>
                    </li>
                    <li>
                        <span class="button-preview">
                            <span class="key-button leftAlign">Ctrl</span>
                            +
                            <span class="key-button">Left Arrow</span>
                        </span>
                        <span class="button-descr">
                            reorders the column with the previous one
                        </span>
                    </li>
                    <li>
                        <span class="button-preview">
                            <span class="key-button leftAlign">Ctrl</span>
                            +
                            <span class="key-button">Right Arrow</span>
                        </span>
                        <span class="button-descr">
                            reorders the column with the next one
                        </span>
                    </li>
                </ul>
                </div>

                <div class="box-col">
                <h4>Actions applied on Grid data table</h4>
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
                            <span class="key-button">Enter</span>
                        </span>
                        <span class="button-descr">
                            on group row will toggle expand/collapse
                        </span>
                    </li>
                    <li>
                        <span class="button-preview">
                            <span class="key-button wider">Page Up</span>
                        </span>
                        <span class="button-descr">
                            pages on previouse page
                        </span>
                    </li>
                    <li>
                        <span class="button-preview">
                            <span class="key-button wider">Page Down</span>
                        </span>
                        <span class="button-descr">
                            pages on next page
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
                            <span class="key-button wider">Ctrl</span>
                            +
                            <span class="key-button">Home</span>
                        </span>
                        <span class="button-descr">
                            focuses the first focusable element inside the body
                        </span>
                    </li>
                    <li>
                        <span class="button-preview">
                            <span class="key-button wider">Ctrl</span>
                            +
                            <span class="key-button">End</span>
                        </span>
                        <span class="button-descr">
                            focuses the last focusable cell in the last row
                        </span>
                    </li>
                    <li>
                        <span class="button-preview">
                            <span class="key-button wider">Home</span>
                        </span>
                        <span class="button-descr">
                            focuses the first focusable cell in the row
                        </span>
                    </li>
                    <li>
                        <span class="button-preview">
                            <span class="key-button wider">End</span>
                        </span>
                        <span class="button-descr">
                            focuses the last focusable cell in the row
                        </span>
                    </li>
			          <li>
                        <span class="button-preview">
                            <span class="key-button leftAlign">Ctrl</span>
                            +
                            <span class="key-button">Space</span>
                        </span>
                        <span class="button-descr">
                            group/ungroup the focused column
                        </span>
                    </li>
                </ul>
                </div>
            </div>
<script>
    $(document.body).keydown(function(e) {
        if (e.altKey && e.keyCode == 87) {
            $("#grid").data("kendoGrid").table.focus();
        }
    });
</script>

<?php require_once '../include/footer.php'; ?>
