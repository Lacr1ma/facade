<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $type = $_GET['type'];
    if ($type == 'save') {
        $fileName = $_POST['fileName'];
        $contentType = $_POST['contentType'];
        $base64 = $_POST['base64'];

        $data = base64_decode($base64);

        header('Content-Type:' . $contentType);
        header('Content-Length:' . strlen($data));
        header('Content-Disposition: attachment; filename=' . $fileName);

        echo $data;
    } else {
        header('Content-Type: application/json');

        $request = json_decode(file_get_contents('php://input'));

        $result = new DataSourceResult('sqlite:..//sample.db');

        echo json_encode($result->read('Customers', array('CustomerID', 'ContactName', 'ContactTitle', 'CompanyName', 'Country'), $request));
    }

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
           ->pageSize(10)
           ->serverPaging(true)
           ->serverSorting(true)
           ->serverGrouping(true)
           ->schema($schema);

$grid = new \Kendo\UI\Grid('grid');

$contactName = new \Kendo\UI\GridColumn();
$contactName->field('ContactName')
            ->template("<div class='customer-photo'style='background-image: url(../content/web/Customers/#:data.CustomerID#.jpg);'></div><div class='customer-name'>#: ContactName #</div>")
            ->title('Contact Name')
            ->width(240);

$contactTitle = new \Kendo\UI\GridColumn();
$contactTitle->field('ContactTitle')
            ->title('Contact Title');

$companyName = new \Kendo\UI\GridColumn();
$companyName->field('CompanyName')
            ->title('Company Name');

$Country = new \Kendo\UI\GridColumn();
$Country->field('Country')
        ->width(150);

$pageable = new Kendo\UI\GridPageable();
$pageable->refresh(true)
      ->pageSizes(true)
      ->buttonCount(5);

$margin = new \Kendo\UI\GridPdfMargin();
$margin->top("2cm")
       ->left("1cm")
       ->right("1cm")
       ->bottom("1cm");

$pdf = new \Kendo\UI\GridPdf();
$pdf->allPages(true)
    ->avoidLinks(true)
    ->paperSize("A4")
    ->margin($margin)
    ->landscape(true)
    ->repeatHeaders(true)
    ->templateId("page-template")
    ->scale(0.8)
    ->fileName('Kendo UI Grid Export.pdf')
    ->proxyURL('pdf-export.php?type=save');

$grid->addColumn($contactName, $contactTitle, $companyName, $Country)
     ->addToolbarItem(new \Kendo\UI\GridToolbarItem('pdf'))
     ->pdf($pdf)
     ->dataSource($dataSource)
     ->sortable(true)
     ->groupable(true)
     ->pageable($pageable)
     ->attr('style', 'height:550px');
?>

<div class="box wide">
    <p style="margin-bottom: 1em"><b>Important:</b></p>

    <p style="margin-bottom: 1em">
        This page loads
        <a href="https://github.com/nodeca/pako">pako zlib library</a> (pako_deflate.min.js)
        to enable compression in the PDF. This is highly recommended as it improves
        performance and rises the limit on the size of the content that can be exported.
    </p>

    <p>
        The Standard PDF fonts do not include Unicode support.

        In order for the output to match what you see in the browser
        you must provide source files for TrueType fonts for embedding.

        Please read the documentation about
        <a href="http://docs.telerik.com/kendo-ui/framework/drawing/drawing-dom#custom-fonts-and-pdf">custom fonts</a>
        and
        <a href="http://docs.telerik.com/kendo-ui/framework/drawing/pdf-output#using-custom-fonts">drawing</a>.
    </p>
</div>

<?php
    echo $grid->render();
?>

<style>
    /*
        Use the DejaVu Sans font for display and embedding in the PDF file.
        The standard PDF fonts have no support for Unicode characters.
    */
    .k-grid {
        font-family: "DejaVu Sans", "Arial", sans-serif;
    }

    /* Hide the Grid header and pager during export */
    .k-pdf-export .k-grid-toolbar,
    .k-pdf-export .k-pager-wrap
    {
        display: none;
    }
</style>

<!-- Load Pako ZLIB library to enable PDF compression -->
<script src="../content/shared/js/pako.min.js"></script>

<script type="x/kendo-template" id="page-template">
  <div class="page-template">
    <div class="header">
      <div style="float: right">Page #: pageNum # of #: totalPages #</div>
      Multi-page grid with automatic page breaking
    </div>
    <div class="watermark">KENDO UI</div>
    <div class="footer">
      Page #: pageNum # of #: totalPages #
    </div>
  </div>
</script>

<style type="text/css">
    /* Page Template for the exported PDF */
    .page-template {
      font-family: "DejaVu Sans", "Arial", sans-serif;
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
    }
    .page-template .header {
      position: absolute;
      top: 30px;
      left: 30px;
      right: 30px;
      border-bottom: 1px solid #888;
      color: #888;
    }
    .page-template .footer {
      position: absolute;
      bottom: 30px;
      left: 30px;
      right: 30px;
      border-top: 1px solid #888;
      text-align: center;
      color: #888;
    }
    .page-template .watermark {
      font-weight: bold;
      font-size: 400%;
      text-align: center;
      margin-top: 30%;
      color: #aaaaaa;
      opacity: 0.1;
      transform: rotate(-35deg) scale(1.7, 1.5);
    }

    /* Content styling */
    .customer-photo {
        display: inline-block;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background-size: 32px 35px;
        background-position: center center;
        vertical-align: middle;
        line-height: 32px;
        box-shadow: inset 0 0 1px #999, inset 0 0 10px rgba(0,0,0,.2);
        margin-left: 5px;
    }

    .customer-name {
        display: inline-block;
        vertical-align: middle;
        line-height: 32px;
        padding-left: 3px;
    }
</style>

