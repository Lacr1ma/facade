<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

?>
<div class="demo-section k-content">
	<?php
	
		$dialog = new \Kendo\UI\Dialog('dialog');
		$cancelAction = new \Kendo\UI\DialogAction();
		$cancelAction->text("Cancel")
					 ->action(onCancelClick);

		$okAction = new \Kendo\UI\DialogAction();
		$okAction->text("Ok")
				 ->primary(true)
				 ->action(onOkClick);

		$dialog->title('Categories')
			   ->width('400px')
			   ->visible(true)
			   ->close(onClose)
			   ->addAction($cancelAction, $okAction)
			   ->startContent();
			   
	?>
	<div class="dialogContent">
		<input id="filterText" type="text" placeholder="Search categories" onkeyup="onFilterKeyUp()" />
		<div class="selectAll">
			<input type="checkbox" id="chbAll" class="k-checkbox" onchange="chbAllOnChange()" />
			<label class="k-checkbox-label" for="chbAll">Select All</label>
			<span id="result">0 categories selected</span>
		</div>
		<?php
		
			$treeview = new \Kendo\UI\TreeView('treeview');

			$checkboxes = new \Kendo\UI\TreeViewCheckboxes();
			$checkboxes->checkChildren(true);
			$treeview->checkboxes($checkboxes);

			$treeview->check("onCheck");

			// helper function that creates TreeViewItem with id and spriteCssClass
			function TreeViewItem($id, $text) {
				$item = new \Kendo\UI\TreeViewItem($text);
				$item->id = $id;
				return $item;
			}

			$furniture = TreeViewItem(1, 'Furniture');
			$furniture->expanded(true);

			$tables = TreeViewItem(2, 'tables & chairs');
			$sofas = TreeViewItem(3, 'sofas');
			$occasional = TreeViewItem(4, 'occasional furniture');
			$childrens = TreeViewItem(5, 'childrens furniture');
			$beds = TreeViewItem(6, 'beds');

			$furniture->addItem($tables, $sofas, $occasional, $childrens, $beds);

			$decor = TreeViewItem(7, 'Decor');
			$decor->expanded(true);

			$bedlinen = TreeViewItem(8, 'bed linen');
			$throws = TreeViewItem(9, 'throws');
			$curtains = TreeViewItem(10, 'curtains & blinds');
			$rugs = TreeViewItem(11, 'rugs');
			$carpets = TreeViewItem(12, 'carpets');

			$decor->addItem($bedlinen, $throws, $curtains, $rugs, $carpets);

			$storage = TreeViewItem(13, 'Storage');
			$storage->expanded(true);

			$wall = TreeViewItem(14, 'wall shelving');
			$kids = TreeViewItem(15, 'kids storage');
			$multimedia = TreeViewItem(16, 'multimedia storage');
			$floor = TreeViewItem(17, 'floor shelving');
			$rollholders = TreeViewItem(18, 'toilet roll holders');
			$storagejars = TreeViewItem(19, 'storage jars');
			$drawers = TreeViewItem(20, 'drawers');
			$boxes = TreeViewItem(21, 'boxes');

			$storage->addItem($wall, $kids, $multimedia, $floor, $rollholders, $storagejars, $drawers, $boxes);

			$dataSource = new \Kendo\Data\HierarchicalDataSource();

			$dataSource->data(array($furniture, $decor, $storage));

			$treeview->dataSource($dataSource);

			echo $treeview->render();
			
		?>
	</div>
    <?php
	
    $dialog->endContent();

    echo $dialog->render();
	
	?>
	<?php
	
		$multiselect = new \Kendo\UI\MultiSelect('multiselect');

		$multiselect->dataTextField('text')
					->dataValueField('id');
					
		echo $multiselect->render();
		
	?>
	<br />
	<?php
	
		$button = new \Kendo\UI\Button('openWindow');
		
		$button->attr('class', 'k-primary')
		->content('SELECT CATEGORIES');
				
		echo $button->render();
				
	?>
</div>			
	
<script>			
	$(document).ready(function () {
		var dialog = $("#dialog");
		var multiSelect = $("#multiselect").data("kendoMultiSelect");
		
		multiSelect.readonly(true);

		$("#openWindow").click(function () {
		dialog.data("kendoDialog").open();
		$(this).fadeOut();
		});

		dialog.data("kendoDialog").open();		
	});

	function onCancelClick(e) {
	e.sender.close();
	}

	function onOkClick(e) {
	var checkedNodes = [];
	var treeView = $("#treeview").data("kendoTreeView");

	getCheckedNodes(treeView.dataSource.view(), checkedNodes);
	populateMultiSelect(checkedNodes);

	e.sender.close();
	}

	function onClose() {
	$("#openWindow").fadeIn();
	}

	function populateMultiSelect(checkedNodes) {
		var multiSelect = $("#multiselect").data("kendoMultiSelect");
		multiSelect.dataSource.data([]);

		var multiData = multiSelect.dataSource.data();
		if (checkedNodes.length > 0) {
		var array = multiSelect.value().slice();
		for (var i = 0; i < checkedNodes.length; i++) {
				multiData.push({ text: checkedNodes[i].text, id: checkedNodes[i].id });
				array.push(checkedNodes[i].id.toString());
			}

			multiSelect.dataSource.data(multiData);
			multiSelect.dataSource.filter({});
			multiSelect.value(array);
		}
	}

	function checkUncheckAllNodes(nodes, checked) {
		for (var i = 0; i < nodes.length; i++) {
			nodes[i].set("checked", checked);

			if (nodes[i].hasChildren) {
				checkUncheckAllNodes(nodes[i].children.view(), checked);
			}
		}
	}

	function chbAllOnChange() {
		var checkedNodes = [];
		var treeView = $("#treeview").data("kendoTreeView");
		var isAllChecked = $('#chbAll').prop("checked");

		checkUncheckAllNodes(treeView.dataSource.view(), isAllChecked)

		if (isAllChecked) {
			setMessage($('#treeview input[type="checkbox"]').length);
		}
		else {
			setMessage(0);
		}
	}

	function getCheckedNodes(nodes, checkedNodes) {
		var node;

		for (var i = 0; i < nodes.length; i++) {
			node = nodes[i];

			if (node.checked) {
				checkedNodes.push({ text: node.text, id: node.id });
			}

			if (node.hasChildren) {
				getCheckedNodes(node.children.view(), checkedNodes);
			}
		}
	}

	function onCheck() {
		var checkedNodes = [];
		var treeView = $("#treeview").data("kendoTreeView");

		getCheckedNodes(treeView.dataSource.view(), checkedNodes);
		setMessage(checkedNodes.length);
	}

	function setMessage(checkedNodes) {
		var message;

		if (checkedNodes > 0) {
			message = checkedNodes + " categories selected";
		}
		else {
			message = "0 categories selected";
		}

		$("#result").html(message);
	}

	function onFilterKeyUp() {
		var filterText = $("#filterText").val();
		debugger;
		if (filterText !== "") {
			$(".selectAll").css("visibility", "hidden");
			$("#treeview .k-group .k-group .k-in").closest("li").hide();
			$("#treeview .k-group .k-group .k-in:contains(" + filterText + ")").each(function () {
				$(this).parents("ul, li").each(function () {
					$(this).show();
				});
			});
		}
		else {
			$("#treeview .k-group").find("li").show();
			$(".selectAll").css("visibility", "visible");
		}
	}
</script>
<style>
	html .k-dialog .k-window-titlebar {
	padding-left: 17px;
	}

	.k-dialog .k-content {
	padding: 17px;
	}

	#filterText {
	width: 100%;
	box-sizing: border-box;
	padding: 6px;
	border-radius: 3px;
	border: 1px solid #d9d9d9;
	}

	.selectAll {
	margin: 17px 0;
	}

	#result {
	color: #9ca3a6;
	float: right;
	}

	#treeview {
	height: 300px;
	overflow-y: auto;
	border: 1px solid #d9d9d9;
	}

	#openWindow {
	min-width: 180px;
	}
</style>

<?php require_once '../include/footer.php'; ?>
