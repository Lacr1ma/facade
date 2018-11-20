<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $request = json_decode(file_get_contents('php://input'));

    $result = new DataSourceResult('sqlite:..//sample.db');

    echo json_encode($result->read('Customers', array('CustomerID', 'ContactName', 'ContactTitle', 'CompanyName', 'Country'), $request));

    exit;
}

require_once '../include/header.php';

$transport = new \Kendo\Data\DataSourceTransport();

$read = new \Kendo\Data\DataSourceTransportRead();

$read->url('index.php')
     ->contentType('application/json')
     ->type('POST');

$transport ->read($read)
          ->parameterMap('function(data) {
              return kendo.stringify(data);
          }');

$model = new \Kendo\Data\DataSourceSchemaModel();

$contactNameField = new \Kendo\Data\DataSourceSchemaModelField('ContactName');
$contactNameField->type('string');

$contactTitleField = new \Kendo\Data\DataSourceSchemaModelField('ContactTitle');
$contactTitleField->type('string');

$companyNameField = new \Kendo\Data\DataSourceSchemaModelField('CompanyName');
$companyNameField->type('string');

$countryField = new \Kendo\Data\DataSourceSchemaModelField('Country');
$countryField->type('string');

$model->addField($contactNameField)
      ->addField($contactTitleField)
      ->addField($companyNameField)
      ->addField($countryField);

$schema = new \Kendo\Data\DataSourceSchema();
$schema->data('data')
       ->errors('errors')
       ->groups('groups')
       ->model($model)
       ->total('total');

$dataSource = new \Kendo\Data\DataSource();

$dataSource->transport($transport)
           ->pageSize(20)
           ->serverPaging(true)
           ->serverSorting(true)
           ->serverGrouping(true)
           ->schema($schema);

$grid = new \Kendo\UI\Grid('grid');

$contactName = new \Kendo\UI\GridColumn();
$contactName->field('ContactName')
            ->title('Contact Name')
            ->media("(min-width: 450px)");

$contactTitle = new \Kendo\UI\GridColumn();
$contactTitle->field('ContactTitle')
            ->title('Contact Title')
            ->width(250)
            ->media("(min-width: 850px)");

$companyName = new \Kendo\UI\GridColumn();
$companyName->field('CompanyName')
            ->title('Company Name')
            ->width(250)
            ->media("(min-width: 850px)");

$Country = new \Kendo\UI\GridColumn();
$Country->field('Country')
        ->media("(min-width: 450px)");

$colTemplate = new \Kendo\UI\GridColumn();
$colTemplate->template("#=resColTemplate(data)#")
            ->title("Items")
            ->media("(max-width: 450px)");

$pageable = new Kendo\UI\GridPageable();
$pageable->refresh(true)
      ->pageSizes(true)
      ->buttonCount(5);

$grid->addColumn($contactName, $contactTitle, $companyName, $Country, $colTemplate)
     ->dataSource($dataSource)
     ->sortable(true)
     ->groupable(true)
     ->pageable($pageable)
     ->attr('style', 'height:550px');

echo $grid->render();
?>

<script id="responsive-column-template" type="text/x-kendo-template">
    <strong>Contact Name</strong>
    <p class="col-template-val">#=data.ContactName#</p>

    <strong>Contact Title</strong>
    <p class="col-template-val">#=data.ContactTitle#</p>

    <strong>Company Name</strong>
    <p class="col-template-val">#=data.CompanyName#</p>

    <strong>Country</strong>
    <p class="col-template-val">#=data.Country#</p>
</script>

<script>
    var resColTemplate = kendo.template($("#responsive-column-template").html());
</script>

<style>
    .col-template-val {
        margin: 0 0 1em .5em;
    }
</style>

<?php require_once '../include/footer.php'; ?>
