<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $request = json_decode(file_get_contents('php://input'));

    $result = new DataSourceResult('sqlite:..//sample.db');

    $type = $_GET['type'];

    $operation = $_GET['operation'];

    if ($type == "dependency") {
        $columns = array('ID', 'PredecessorID', 'SuccessorID', 'Type');

        $table = "GanttDependencies";
    } else {
        $columns = array('ID', 'ParentID', 'OrderID', 'Title', 'Start', 'End', 'PercentComplete', 'Expanded', 'Summary');

        $table = "GanttTasks";
    }

    switch($operation) {
        case 'create':
            $result = $result->create($table, $columns, $request, 'ID');
            break;
        case 'update':
            $result = $result->update($table, $columns, $request, 'ID');
            break;
        case 'destroy':
            $result = $result->destroy($table, $request, 'ID');
            break;
        default:
            $result = $result->read($table, $columns, $request);
            break;
    }

    echo json_encode($result, JSON_NUMERIC_CHECK);

    exit;
}

require_once '../include/header.php';

// tasks datasource
$transport = new \Kendo\Data\DataSourceTransport();

$read = new \Kendo\Data\DataSourceTransportRead();

$read->url('index.php?type=task&operation=read')
     ->contentType('application/json')
     ->type('POST');

$transport->read($read)
          ->parameterMap('function(data) {
              return kendo.stringify(data);
          }');

$taskModel = new \Kendo\Data\DataSourceSchemaModel();

$idField = new \Kendo\Data\DataSourceSchemaModelField('id');
$idField->type('number')
        ->from('ID')
        ->nullable(true);

$orderIdField = new \Kendo\Data\DataSourceSchemaModelField('orderId');
$orderIdField->from('OrderID')
        ->type('number');

$parentIdField = new \Kendo\Data\DataSourceSchemaModelField('parentId');
$parentIdField->from('ParentID')
        ->defaultValue(null)
        ->type('number');

$startField = new \Kendo\Data\DataSourceSchemaModelField('start');
$startField->from('Start')
        ->type('date');

$endField = new \Kendo\Data\DataSourceSchemaModelField('end');
$endField->from('End')
        ->type('date');

$titleField = new \Kendo\Data\DataSourceSchemaModelField('title');
$titleField->from('Title')
        ->defaultValue('')
        ->type('string');

$percentCompleteField = new \Kendo\Data\DataSourceSchemaModelField('percentComplete');
$percentCompleteField->from('PercentComplete')
        ->type('number');

$summaryField = new \Kendo\Data\DataSourceSchemaModelField('summary');
$summaryField->from('Summary')
        ->type('boolean');

$expandedField = new \Kendo\Data\DataSourceSchemaModelField('expanded');
$expandedField->from('Expanded')
        ->defaultValue(true)
        ->type('boolean');

$taskModel->id('id')
    ->addField($idField)
    ->addField($parentIdField)
    ->addField($orderIdField)
    ->addField($startField)
    ->addField($endField)
    ->addField($titleField)
    ->addField($percentCompleteField)
    ->addField($summaryField)
    ->addField($expandedField);

$schema = new \Kendo\Data\DataSourceSchema();
$schema->model($taskModel)
    ->data("data");

$tasks = new \Kendo\Data\DataSource();

$tasks->transport($transport)
    ->schema($schema)
    ->batch(false);

// dependencies datasource
$transport = new \Kendo\Data\DataSourceTransport();

$read = new \Kendo\Data\DataSourceTransportRead();

$read->url('index.php?type=dependency&operation=read')
     ->contentType('application/json')
     ->type('POST');

$transport->read($read)
          ->parameterMap('function(data) {
              return kendo.stringify(data);
          }');

$dependenciesModel = new \Kendo\Data\DataSourceSchemaModel();

$idField = new \Kendo\Data\DataSourceSchemaModelField('id');
$idField->from('ID')
        ->type('number');

$typeField = new \Kendo\Data\DataSourceSchemaModelField('type');
$typeField->from('Type')
        ->type('number');

$predecessorIdField = new \Kendo\Data\DataSourceSchemaModelField('predecessorId');
$predecessorIdField->from('PredecessorID')
        ->type('number');

$successorIdField = new \Kendo\Data\DataSourceSchemaModelField('successorId');
$successorIdField->from('SuccessorID')
        ->type('number');

$dependenciesModel->id('id')
    ->addField($idField)
    ->addField($typeField)
    ->addField($predecessorIdField)
    ->addField($successorIdField);

$schema = new \Kendo\Data\DataSourceSchema();
$schema->model($dependenciesModel)
    ->data("data");

$dependencies = new \Kendo\Data\DataSource();

$dependencies->transport($transport)
    ->schema($schema)
    ->batch(false);

// columns
$idColumn = new \Kendo\UI\GanttColumn();
$idColumn->field("id")
         ->title("ID")
         ->width(50);

$titleColumn = new \Kendo\UI\GanttColumn();
$titleColumn->field("title")
            ->title("Title")
            ->editable(true)
            ->sortable(true);

$startColumn = new \Kendo\UI\GanttColumn();
$startColumn->field("start")
            ->title("Start Time")
            ->format("{0:MM/dd/yyyy}")
            ->width(100)
            ->editable(true)
            ->sortable(true);

$endColumn = new \Kendo\UI\GanttColumn();
$endColumn->field("end")
          ->title("End Time")
          ->format("{0:MM/dd/yyyy}")
          ->width(100)
          ->editable(true)
          ->sortable(true);

// gantt
$gantt = new \Kendo\UI\Gantt('gantt');
$gantt->dataSource($tasks)
      ->dependencies($dependencies)
      ->height(700)
      ->addView(
          array(
			'type' => 'day',
			'date' => new DateTime('6/2/2014'),
			'range' => array(
				'start' => new DateTime('6/2/2014'),
				'end' => new DateTime('6/8/2014')
			)),
          array(
			'type' => 'week', 
			'selected' => true, 
			'date' => new DateTime('6/1/2014'), 
			'range' => array(
				'start' => new DateTime('6/1/2014'), 
				'end' => new DateTime('7/13/2014')
			)),
          array(
			'type' => 'month', 
			'date' => new DateTime('5/18/2014'), 
			'range' => array(
				'start' => new DateTime('5/18/2014'), 
				'end' => new DateTime('8/3/2014')
			))
      )
      ->addColumn($idColumn, $titleColumn, $startColumn, $endColumn)
      ->showWorkHours(false)
      ->showWorkDays(false)
      ->snap(false)
	  ->editable(false)
	  ->navigate("onNavigate");

// date pickers
$startRange = new \Kendo\UI\DatePicker('startRange');
$startRange->value(new DateTime('6/1/2014'), new DateTimeZone('UTC'))
	->disableDates('startDisabledDatesHandler')
	->open('openHandler')
	->change('changeStartHandler');

$endRange = new \Kendo\UI\DatePicker('endRange');
$endRange->value(new DateTime('7/13/2014'), new DateTimeZone('UTC'))
	->disableDates('endDisabledDatesHandler')
	->open('openHandler')
	->change('changeEndHandler');

$selectedDate = new \Kendo\UI\DatePicker('selectedDate');
$selectedDate->value(new DateTime('6/1/2014'), new DateTimeZone('UTC'))
	->disableDates('dateDisabledDatesHandler')
	->open('openHandler')
	->change('changeDateHandler');
?>


<div class="box wide">
    <div class="box-col">
        <h4>Set Visible Range</h4>
        <p>Start date of range</p>
		<?php
			echo $startRange->render();
		?>
		<br />
        <br />
        <p>End date of range</p>
		<?php
			echo $endRange->render();
		?>
	</div>
	<div class="box-col">
        <h4>Set Selected Date</h4>
        <br />
		<?php
			echo $selectedDate->render();
		?>
	</div>
</div>
<?php
	echo $gantt->render();
?>

<script>
	var gantt, startRange, endRange, date;
	
    function onNavigate(e) {
        var viewsOptions = e.sender.options.views;
        viewsOptions.forEach(function (view) {
            if (view.type === e.view) {
                startRange.value(view.range.start);
                endRange.value(view.range.end);
                date.value(view.date);
                return;
            }
        });
    }
	
	function openHandler(e) {
        e.sender.setOptions(e.sender.options);
    };

    function startDisabledDatesHandler(date) {
        var end = endRange ? endRange.value() : new Date("2014/7/13");

        if (date >= end) {
            return true;
        } else {
            return false;
        }
    };

    function changeStartHandler(e) {
        var range = gantt.range();
        range.start = this.value();
        gantt.range(range);
        if (this.value() > date.value()) {
            date.value("");
        }
    };

    function endDisabledDatesHandler(date) {
        var start = startRange ? startRange.value() : new Date("2014/6/1");

        if (date <= start) {
            return true;
        } else {
            return false;
        }
    };

    function changeEndHandler(e) {
        var range = gantt.range();
        range.end = this.value();
        gantt.range(range);
        if (this.value() <= date.value()) {
            date.value("");
        }
    };

    function dateDisabledDatesHandler(date) {
        var start = startRange ? startRange.value() : new Date("2014/6/1");
        var end = endRange ? endRange.value() : new Date("2014/7/13");

        if (date < start || date >= end) {
            return true;
        } else {
            return false;
        }
    };

    function changeDateHandler(e) {
        gantt.date(this.value());
    };

    $(document).ready(function () {
        gantt = $('#gantt').data('kendoGantt');
        startRange = $('#startRange').data('kendoDatePicker');
        endRange = $('#endRange').data('kendoDatePicker');
        date = $('#selectedDate').data('kendoDatePicker');
    });
</script>

<?php require_once '../include/footer.php'; ?>
