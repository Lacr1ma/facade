<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

?>
 <div class="demo-section k-content">
	<h4>Inline data (default settings)</h4>
	<?php
		$inlineDefault = new \Kendo\Data\HierarchicalDataSource();
		$inlineDefault -> data(array(
			array('text' => 'Furniture', 'items' => array(
				array('text' => 'Tables & Chairs'),
				array('text' => 'Sofas'),
				array('text' => 'Occasional Furniture')
			)),
			array('text' => 'Decor', 'items' => array(
				array('text' => 'Bed Linen'),
				array('text' => 'Curtains & Blinds'),
				array('text' => 'Carpets')
			))			
		));
	
		$treeviewLeft = new \Kendo\UI\TreeView('treeview-left');		
		$treeviewLeft -> dataSource($inlineDefault);
				
		echo $treeviewLeft->render();		
	?>
</div>

 <div class="demo-section k-content">
	<h4>Inline data</h4>
	<?php
	
		$model = new \Kendo\Data\HierarchicalDataSourceSchemaModel();
		$model ->children("subCategories");
		
		$schema = new \Kendo\Data\HierarchicalDataSourceSchema();
		$schema->model($model);
		
		$inline = new \Kendo\Data\HierarchicalDataSource();
		$inline -> schema($schema)
				-> data(array(
					array('categoryName' => 'Storage', 'subCategories' => array(
						array('subCategoryName' => 'Wall Shelving'),
						array('subCategoryName' => 'Floor Shelving'),
						array('subCategoryName' => 'Kids Storage')
					)),
					array('categoryName' => 'Lights', 'subCategories' => array(
						array('subCategoryName' => 'Ceiling'),
						array('subCategoryName' => 'Table'),
						array('subCategoryName' => 'Floor')
					))			
				));
				
		$treeviewRight = new \Kendo\UI\TreeView('treeview-right');
		$treeviewRight -> dataSource($inline)
					   -> dataTextField(array('categoryName', 'subCategoryName'));
		
		echo $treeviewRight->render();		
	?>	
</div>

<style>
	 #example {
        text-align: center;
    }

    .demo-section {
        display: inline-block;
        vertical-align: top;
        text-align: left;
        margin: 0 2em;
    }
</style>

<?php require_once '../include/footer.php'; ?>