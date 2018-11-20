<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

?>

<div class="demo-section k-content">
<h4>TreeView with images</h4>
<?php
    $treeview = new \Kendo\UI\TreeView('treeview-images');

    // helper function that creates TreeViewItem with imageUrl
    function ImageTreeViewItem($text, $imageUrl) {
        $item = new \Kendo\UI\TreeViewItem($text);
        $item->imageUrl($imageUrl);
        return $item;
    }

    $inbox = ImageTreeViewItem('Inbox', '../content/web/treeview/mail.png');
    $inbox->addItem(
        ImageTreeViewItem('Read Mail', '../content/web/treeview/readmail.png')
    );

    $drafts = ImageTreeViewItem('Drafts', '../content/web/treeview/edit.png');

    $search = ImageTreeViewItem('Search Folders', '../content/web/treeview/search.png');
    $search->expanded(true);
    $search->addItem(
        ImageTreeViewItem('Categorized Mail', '../content/web/treeview/search.png'),
        ImageTreeViewItem('Large Mail', '../content/web/treeview/search.png'),
        ImageTreeViewItem('Unread Mail', '../content/web/treeview/search.png')
    );

    $settings = ImageTreeViewItem('Settings', '../content/web/treeview/settings.png');

    $dataSource = new \Kendo\Data\HierarchicalDataSource();

    // add root-level nodes as datasource data
    $dataSource->data(array($inbox, $drafts, $search, $settings));

    $treeview->dataSource($dataSource);

    echo $treeview->render();
?>
</div>

<div class="demo-section k-content">
<h4>TreeView with sprites</h4>
<?php
    $treeview = new \Kendo\UI\TreeView('treeview-sprites');

    // helper function that creates TreeViewItem with spriteCssClass
    function TreeViewItem($text, $spriteCssClass) {
        $item = new \Kendo\UI\TreeViewItem($text);
        $item->spriteCssClass($spriteCssClass);
        return $item;
    }

    $documents = TreeViewItem('My Documents', 'rootfolder');
    $documents->expanded(true);

    $kendoproject = TreeViewItem('Kendo UI Project', 'folder');
    $kendoproject->expanded(true);
    $kendoproject->addItem(TreeViewItem('about.html', 'html'))
                 ->addItem(TreeViewItem('index.html', 'html'))
                 ->addItem(TreeViewItem('logo.png', 'image'));

    $newsite = TreeViewItem('New Web Site', 'folder');
    $newsite->expanded(true);
    $newsite->addItem(TreeViewItem('mockup.jpg', 'image'))
            ->addItem(TreeViewItem('Research.pdf', 'pdf'));


    $reports = TreeViewItem('Reports', 'folder');
    $reports->expanded(true);
    $reports->addItem(TreeViewItem('February.pdf', 'pdf'))
            ->addItem(TreeViewItem('March.pdf', 'pdf'))
            ->addItem(TreeViewItem('April.pdf', 'pdf'));

    $documents->addItem($kendoproject, $newsite, $reports);

    $dataSource = new \Kendo\Data\HierarchicalDataSource();

    $dataSource->data(array($documents));

    $treeview->dataSource($dataSource);

    echo $treeview->render();
?>
</div>

<style>
    #treeview-sprites .k-sprite {
        background-image: url("../content/web/treeview/coloricons-sprite.png");
    }

    .rootfolder { background-position: 0 0; }
    .folder { background-position: 0 -16px; }
    .pdf { background-position: 0 -32px; }
    .html { background-position: 0 -48px; }
    .image { background-position: 0 -64px; }
</style>

<?php require_once '../include/footer.php'; ?>
