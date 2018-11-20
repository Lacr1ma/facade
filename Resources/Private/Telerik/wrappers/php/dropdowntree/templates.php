<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
require_once '../include/dropdowntree_data.php';

?>

<?php
    $data = documents();
    $dataSource = new \Kendo\Data\DataSource();
    $dataSource->data($data);

    $dropdowntree = new \Kendo\UI\DropDownTree('dropdowntree');
    $dropdowntree
        ->templateId('dropdowntree-template')
        ->valueTemplateId('dropdowntree-value-template')
        ->dataTextField('text')
        ->dataSpriteCssClassField('spriteCssClass')
        ->height('auto')
        ->dataSource($dataSource);
?>

<div id="example">
    <div class="demo-section k-content">
        <h4>Select an item</h4>
        <?php echo $dropdowntree->render(); ?>
    </div>
</div>

<script id="dropdowntree-template" type="text/kendo-ui-template">
    #: item.text #
</script>

<script id="dropdowntree-value-template" type="text/kendo-ui-template">
    <span class="k-sprite #: spriteCssClass #"></span>
    <span> #: data.text # </span>
</script>

<style>
    .k-dropdowntree  { width: 100%; }

    .k-dropdowntree .k-sprite, .k-popup .k-sprite {
        background-image: url("../content/web/treeview/coloricons-sprite.png");
    }

    .rootfolder {
        background-position: 0 0;
    }

    .folder {
        background-position: 0 -16px;
    }

    .pdf {
        background-position: 0 -32px;
    }

    .html {
        background-position: 0 -48px;
    }

    .image {
        background-position: 0 -64px;
    }
</style>

<?php require_once '../include/footer.php'; ?>
