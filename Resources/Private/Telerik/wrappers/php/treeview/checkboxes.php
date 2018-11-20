<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

?>

<div class="demo-section k-content">
    <div>
        <h4>Check nodes</h4>
<?php
    $treeview = new \Kendo\UI\TreeView('treeview');

    $checkboxes = new \Kendo\UI\TreeViewCheckboxes();
    $checkboxes->checkChildren(true);
    $treeview->checkboxes($checkboxes);

    $treeview->check("onCheck");

    // helper function that creates TreeViewItem with id and spriteCssClass
    function TreeViewItem($id, $text, $spriteCssClass) {
        $item = new \Kendo\UI\TreeViewItem($text);
        $item->spriteCssClass($spriteCssClass);
        $item->id = $id;
        return $item;
    }

    $documents = TreeViewItem(1, 'My Documents', 'rootfolder');
    $documents->expanded(true);

    $kendoproject = TreeViewItem(2, 'Kendo UI Project', 'folder');
    $kendoproject->expanded(true);
    $kendoproject->addItem(TreeViewItem(3, 'about.html', 'html'))
                 ->addItem(TreeViewItem(4, 'index.html', 'html'))
                 ->addItem(TreeViewItem(5, 'logo.png', 'image'));

    $newsite = TreeViewItem(6, 'New Web Site', 'folder');
    $newsite->expanded(true);
    $newsite->addItem(TreeViewItem(7, 'mockup.jpg', 'image'))
            ->addItem(TreeViewItem(8, 'Research.pdf', 'pdf'));


    $reports = TreeViewItem(9, 'Reports', 'folder');
    $reports->expanded(true);
    $reports->addItem(TreeViewItem(10, 'February.pdf', 'pdf'))
            ->addItem(TreeViewItem(11, 'March.pdf', 'pdf'))
            ->addItem(TreeViewItem(12, 'April.pdf', 'pdf'));

    $documents->addItem($kendoproject, $newsite, $reports);

    $dataSource = new \Kendo\Data\HierarchicalDataSource();

    $dataSource->data(array($documents));

    $treeview->dataSource($dataSource);

    echo $treeview->render();
?>
</div>
    <div style="padding-top: 2em;">
        <h4>Status</h4>
        <p id="result">No nodes checked.</p>
    </div>
</div>

<script type="text/javascript">
     // function that gathers IDs of checked nodes
        function checkedNodeIds(nodes, checkedNodes) {
            for (var i = 0; i < nodes.length; i++) {
                if (nodes[i].checked) {
                    checkedNodes.push(nodes[i].id);
                }

                if (nodes[i].hasChildren) {
                    checkedNodeIds(nodes[i].children.view(), checkedNodes);
                }
            }
        }

        // show checked node IDs on datasource change
        function onCheck() {
            var checkedNodes = [],
                treeView = $("#treeview").data("kendoTreeView"),
                message;

            checkedNodeIds(treeView.dataSource.view(), checkedNodes);

            if (checkedNodes.length > 0) {
                message = "IDs of checked nodes: " + checkedNodes.join(",");
            } else {
                message = "No nodes checked.";
            }

            $("#result").html(message);
        }
    </script>

<style>

    #treeview .k-sprite {
        background-image: url("../content/web/treeview/coloricons-sprite.png");
    }

    .rootfolder { background-position: 0 0; }
    .folder     { background-position: 0 -16px; }
    .pdf        { background-position: 0 -32px; }
    .html       { background-position: 0 -48px; }
    .image      { background-position: 0 -64px; }
</style>

<?php require_once '../include/footer.php'; ?>
