<?php

require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>
<div class="demo-section k-content">
    <div class="k-rtl">
        <h4>RTL ComboBox</h4>
<?php
$multicolumncomboBox = new \Kendo\UI\MultiColumnComboBox('combobox');

$multicolumncomboBox->dataTextField('text')
         ->dataValueField('value')
         ->attr('style', 'width: 100%;')
         ->dataSource(array(
             array('text' => 'Item 1', 'value' => '1'),
             array('text' => 'Item 2', 'value' => '2'),
             array('text' => 'Item 3', 'value' => '3')
         ))
         ->addColumn(
            array('field' => 'text', 'title' => 'Text'),
            array('field' => 'value', 'title' => 'Value')
           );
echo $multicolumncomboBox->render();
?>
    </div>
</div>
<?php require_once '../include/footer.php'; ?>
