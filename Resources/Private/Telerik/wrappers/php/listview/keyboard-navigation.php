<?php

require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');

    $request = json_decode(file_get_contents('php://input'));

    $result = new DataSourceResult('sqlite:..//sample.db');

    $type = $_GET['type'];

    $columns = array('ProductID', 'ProductName', 'UnitPrice', 'UnitsInStock', 'Discontinued');

    switch($type) {
        case 'create':
            $result = $result->create('Products', $columns, $request->models, 'ProductID');
            break;
        case 'read':
            $result = $result->read('Products', $columns, $request);
            break;
        case 'update':
            $result = $result->update('Products', $columns, $request->models, 'ProductID');
            break;
        case 'destroy':
            $result = $result->destroy('Products', $request->models, 'ProductID');
            break;
    }

    echo json_encode($result, JSON_NUMERIC_CHECK);

    exit;
}

require_once '../include/header.php';

?>

    <script type="text/x-kendo-tmpl" id="template">
        <div class="product-view k-widget">
            <dl>
                <dt>Product Name</dt>
                <dd>#:ProductName#</dd>
                <dt>Unit Price</dt>
                <dd>#:kendo.toString(UnitPrice, "c")#</dd>
                <dt>Units In Stock</dt>
                <dd>#:UnitsInStock#</dd>
                <dt>Discontinued</dt>
                <dd>#:Discontinued#</dd>
            </dl>
            <div class="edit-buttons">
                <a class="k-button k-edit-button" href="\\#"><span class="k-icon k-i-edit"></span></a>
                <a class="k-button k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>
            </div>
        </div>
    </script>

    <script type="text/x-kendo-tmpl" id="editTemplate">
        <div class="product-view k-widget">
            <dl>
                <dt>Product Name</dt>
                <dd>
                    <input type="text" class="k-textbox" data-bind="value:ProductName" name="ProductName" required="required" validationMessage="required" />
                    <span data-for="ProductName" class="k-invalid-msg"></span>
                </dd>
                <dt>Unit Price</dt>
                <dd>
                    <input type="text" data-bind="value:UnitPrice" data-role="numerictextbox" data-type="number" name="UnitPrice" required="required" min="1" validationMessage="required" />
                    <span data-for="UnitPrice" class="k-invalid-msg"></span>
                </dd>
                <dt>Units In Stock</dt>
                <dd>
                    <input type="text" data-bind="value:UnitsInStock" data-role="numerictextbox" name="UnitsInStock" required="required" data-type="number" min="0" validationMessage="required" />
                    <span data-for="UnitsInStock" class="k-invalid-msg"></span>
                </dd>
                <dt>Discontinued</dt>
                <dd><input type="checkbox" name="Discontinued" data-bind="checked:Discontinued"></dd>
            </dl>
            <div class="edit-buttons">
                <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
                <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
            </div>
        </div>
    </script>

<div class="demo-section k-content wide">
    <a class="k-button k-button-icontext k-add-button" href="#"><span class="k-icon k-i-add"></span>Add new record</a>
<?php

    $transport = new \Kendo\Data\DataSourceTransport();

    $create = new \Kendo\Data\DataSourceTransportCreate();

    $create->url('keyboard-navigation.php?type=create')
         ->contentType('application/json')
         ->type('POST');

    $read = new \Kendo\Data\DataSourceTransportRead();

    $read->url('keyboard-navigation.php?type=read')
         ->contentType('application/json')
         ->type('POST');

    $update = new \Kendo\Data\DataSourceTransportUpdate();

    $update->url('keyboard-navigation.php?type=update')
         ->contentType('application/json')
         ->type('POST');

    $destroy = new \Kendo\Data\DataSourceTransportDestroy();

    $destroy->url('keyboard-navigation.php?type=destroy')
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

    $productIDField = new \Kendo\Data\DataSourceSchemaModelField('ProductID');
    $productIDField->type('number')
                   ->editable(false)
                   ->nullable(true);

    $productNameField = new \Kendo\Data\DataSourceSchemaModelField('ProductName');
    $productNameField->type('string');

    $unitPriceField = new \Kendo\Data\DataSourceSchemaModelField('UnitPrice');
    $unitPriceField->type('number');

    $unitsInStockField = new \Kendo\Data\DataSourceSchemaModelField('UnitsInStock');
    $unitsInStockField->type('number');

    $discontinuedField = new \Kendo\Data\DataSourceSchemaModelField('Discontinued');
    $discontinuedField ->type('boolean');

    $model->id('ProductID')
          ->addField($productIDField)
          ->addField($productNameField)
          ->addField($unitPriceField)
          ->addField($discontinuedField)
          ->addField($unitsInStockField);

    $schema = new \Kendo\Data\DataSourceSchema();
    $schema->data('data')
           ->errors('errors')
           ->model($model)
           ->total('total');

    $dataSource = new \Kendo\Data\DataSource();

    $dataSource->transport($transport)
               ->batch(true)
               ->schema($schema)
               ->pageSize(4);

    $listview = new \Kendo\UI\ListView('listView');
    $listview->dataSource($dataSource)
             ->templateId('template')
             ->editTemplateId('editTemplate')
             ->selectable(true)
             ->navigatable(true)
             ->pageable(true);

    echo $listview->render();
?>
</div>

<script>
    $(function() {
        $(".k-add-button").click(function(e) {
            var listView = $("#listView").data("kendoListView");

            listView.add();
            e.preventDefault();
        });

        $(document.body).keydown(function(e) {
            if (e.altKey && e.keyCode == 87) {
                $("#listView").focus();
            }
        });
    });
</script>

<div class="box wide">
    <div class="box-col">
        <h4>Focus</h4>
        <ul class="keyboard-legend">
            <li>
                <span class="button-preview">
                    <span class="key-button leftAlign">Alt</span>
                    +
                    <span class="key-button">W</span>
                </span>
                <span class="button-descr">
                    Focus the ListView
                </span>
            </li>
        </ul>
    </div>

    <div class="box-col">
        <h4>Supported keys and user actions</h4>
        <ul class="keyboard-legend">
            <li>
                <span class="button-preview">
                    <span class="key-button">Right</span>
                </span>
                <span class="button-descr">
                    Goes to the next item (same as Down)
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">Left</span>
                </span>
                <span class="button-descr">
                    Goes to the previous item (same as Up)
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">Home</span>
                </span>
                <span class="button-descr">
                    Goes to the first item
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">End</span>
                </span>
                <span class="button-descr">
                    Goes to the last item
                </span>
            </li>
        </ul>
    </div>

    <div class="box-col">
        <h4>&nbsp;</h4>
        <ul class="keyboard-legend">
            <li>
                <span class="button-preview">
                    <span class="key-button">Enter</span>
                </span>
                <span class="button-descr">
                    Enter Edit mode or Apply changes
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">Esc</span>
                </span>
                <span class="button-descr">
                    Exit Edit mode and Cancel changes
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">Tab</span>
                </span>
                <span class="button-descr">
                    Tabs away from the ListView on the next focusable page element
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button leftAlign">Shift</span>
                    +
                    <span class="key-button">Tab</span>
                </span>
                <span class="button-descr">
                    Tabs away from the ListView on the previous focusable page element
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">Space</span>
                </span>
                <span class="button-descr">
                    Select item
                </span>
            </li>
        </ul>
    </div>
</div>

<style>
    .product-view
    {
        float: left;
        width: 50%;
        height: 300px;
        box-sizing: border-box;
        border-top: 0;
        position: relative;
    }
    .product-view:nth-child(even) {
        border-left-width: 0;
    }
    .product-view dl
    {
        margin: 10px 10px 0;
        padding: 0;
        overflow: hidden;
    }
    .product-view dt, dd
    {
        margin: 0;
        padding: 0;
        width: 100%;
        line-height: 24px;
        font-size: 18px;
    }
    .product-view dt
    {
        font-size: 11px;
        height: 16px;
        line-height: 16px;
        text-transform: uppercase;
        opacity: 0.5;
    }
    
    .product-view dd
    {
        height: 46px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;

    }
    
    .product-view dd .k-widget,
    .product-view dd .k-textbox {
        font-size: 14px;
    }
    #example .k-listview
    {
        border-width: 1px 0 0;
        padding: 0;
        overflow: hidden;
        min-height: 298px;
    }
    .edit-buttons
    {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        text-align: right;
        padding: 5px;
        background-color: rgba(0,0,0,0.1);
    }
    .k-pager-wrap
    {
        border-top: 0;
    }
    span.k-invalid-msg
    {
        position: absolute;
        margin-left: 6px;
    }
    
    .k-add-button {
        margin-bottom: 2em;
    }
    
    @media only screen and (max-width : 620px) {
    
        .product-view
        {
            width: 100%;
        }
        .product-view:nth-child(even) {
            border-left-width: 1px;
        }
    }
</style>

<?php require_once '../include/footer.php'; ?>
