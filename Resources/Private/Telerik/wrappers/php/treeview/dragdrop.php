<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

?>

<div class="demo-section k-content">
    <h4>Treeview One</h4>

<?php
    $treeview = new \Kendo\UI\TreeView('treeview-left');
    $treeview->dragAndDrop(true);

    $furniture = new \Kendo\UI\TreeViewItem('Furniture');
    $furniture->expanded(true);
    $furniture->addItem(
        new \Kendo\UI\TreeViewItem('Tables & Chairs'),
        new \Kendo\UI\TreeViewItem('Sofas'),
        new \Kendo\UI\TreeViewItem('Occasional Furniture')
    );

    $decor = new \Kendo\UI\TreeViewItem('Decor');
    $decor->addItem(
        new \Kendo\UI\TreeViewItem('Bed Linen'),
        new \Kendo\UI\TreeViewItem('Curtains & Blinds'),
        new \Kendo\UI\TreeViewItem('Carpets')
    );

    $datasource = new \Kendo\Data\HierarchicalDataSource();
    $datasource->data(array( $furniture, $decor));

    $treeview->dataSource($datasource);

    echo $treeview->render();
?>
<h4 style="padding-top: 2em;">Treeview Two</h4>
<?php
    $treeview = new \Kendo\UI\TreeView('treeview-right');
    $treeview->dragAndDrop(true);

    $storage = new \Kendo\UI\TreeViewItem('Storage');
    $storage->expanded(true);
    $storage->addItem(
        new \Kendo\UI\TreeViewItem('Wall Shelving'),
        new \Kendo\UI\TreeViewItem('Floor Shelving'),
        new \Kendo\UI\TreeViewItem('Kids Storage')
    );

    $lights = new \Kendo\UI\TreeViewItem('Lights');
    $lights->addItem(
        new \Kendo\UI\TreeViewItem('Ceiling'),
        new \Kendo\UI\TreeViewItem('Table'),
        new \Kendo\UI\TreeViewItem('Floor')
    );

    $datasource = new \Kendo\Data\HierarchicalDataSource();
    $datasource->data(array( $storage, $lights));

    $treeview->dataSource($datasource);

    echo $treeview->render();
?>
</div>

<style>
    #treeview-left,
    #treeview-right
    {
        overflow: visible;
    }
</style>

<?php require_once '../include/footer.php'; ?>
