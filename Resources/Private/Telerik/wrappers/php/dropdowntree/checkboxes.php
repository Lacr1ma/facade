<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
require_once '../include/dropdowntree_data.php';

?>

<?php
    $data = categories();
    $dataSource = new \Kendo\Data\DataSource();
    $dataSource->data($data);

    $dropdowntree = new \Kendo\UI\DropDownTree('dropdowntree');
    $dropdowntree
        ->placeholder('Select ...')
        ->checkboxes(true)
        ->checkAll(true)
        ->autoClose(false)
        ->dataSource($dataSource);
?>

<div id="example">
    <div class="demo-section k-content">
        <h4>Select one or more items</h4>
        <?php echo $dropdowntree->render(); ?>
    </div>
</div>

<style>
    .k-dropdowntree  { width: 100%; }
</style>

<?php require_once '../include/footer.php'; ?>
