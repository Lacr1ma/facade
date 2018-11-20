<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $result = new DataSourceResult('sqlite:..//sample.db');

    echo json_encode($result->read('Customers', array('ContactName', 'CustomerID', 'CompanyName')));

    exit;
}

require_once '../include/header.php';
?>
<div class="demo-section k-content">
    <h4>Customers</h4>
<?php
$read = new \Kendo\Data\DataSourceTransportRead();
$read->url('template.php')
     ->type('POST');

$transport = new \Kendo\Data\DataSourceTransport();
$transport->read($read);

$schema = new \Kendo\Data\DataSourceSchema();
$schema->data('data')
       ->total('total');

$dataSource = new \Kendo\Data\DataSource();
$dataSource->transport($transport)
           ->schema($schema);

$multicolumncomboBox = new \Kendo\UI\MultiColumnComboBox('customers');
$multicolumncomboBox->minLength(1)
         ->dataValueField('CustomerID')
         ->dataTextField('ContactName')
         ->dataSource($dataSource)
         ->addColumn(
            array('field' => 'ContactName',
                'template' => '<span class="photo" style="background-image: url(\'../content/web/Customers/#:data.CustomerID#.jpg\')"></span>',
                'headerTemplate' => '<span class="dropdown-header">Photo</span>',
                'width' => 100
            ),
            array('field' => 'CustomerID',
                'template' => '<span class="k-state-default"><h3>#: data.ContactName #</h3><p>#: data.CompanyName #</p></span>',
                'headerTemplate' => '<span class="dropdown-header">Contact info</span>'
            )
           )
         ->attr("style", "width:100%;");

echo $multicolumncomboBox->render();
?>
    <p class="demo-hint">
        Open the ComboBox to see the customized appearance.
    </p>
</div>

<style>
    #customers-list .dropdown-header {
        text-transform: uppercase;
        font-weight: 600;
    }

    #customers-list .photo {
        box-shadow: inset 0 0 30px rgba(0,0,0,.3);
        margin: 0 10px 0 0;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-size: 100%;
        background-repeat: no-repeat;
        display: inline-block;
    }

    #customers-list h3 {
        margin: 0 0 1px 0;
        padding: 0;
        font-size: 1.2em;
        font-weight: normal;
    }

    #customers-list p {
        margin: 0;
        padding: 0;
        font-size: .8em;
    }

</style>

<?php require_once '../include/footer.php'; ?>
