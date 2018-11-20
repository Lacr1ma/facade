<?php

require_once '../lib/Kendo/Autoload.php';

require_once '../include/header.php';

$countries = array(
    "Argentina",
    "Australia",
    "Brazil",
    "Canada",
    "Chile",
    "China",
    "Egypt",
    "England",
    "France",
    "Germany",
    "India",
    "Indonesia",
    "Kenya",
    "Mexico",
    "New Zealand",
    "South Africa",
    "USA"
);
?>

<div id="example" role="application" dir="rtl">
    <div class="demo-section k-content wide">
<?php

    $listBox1 = new \Kendo\UI\ListBox('source');

    $toolbar1 = new \Kendo\UI\ListBoxToolbar();
    $toolbar1->position("left");
    $toolbar1->tools(array("transferFrom", "transferTo", "transferAllFrom", "transferAllTo"));

    $messages = new \Kendo\UI\ListBoxMessages();

    $toolsMessages = new \Kendo\UI\ListBoxMessagesTools();
    $toolsMessages->transferFrom("To Right")
                  ->transferTo("To Left")
                  ->transferAllFrom("transferAllFrom")
                  ->transferAllTo("All to Left");

    $messages->tools($toolsMessages);


    $listBox1->toolbar($toolbar1)
             ->dataSource($countries)
             ->messages($messages)
             ->connectWith("destination");

    echo $listBox1->render();

    // print space for design improvements
    echo " ";

    $listBox2 = new \Kendo\UI\ListBox('destination');

    $toolbar2 = new \Kendo\UI\ListBoxToolbar();
    $toolbar2->position("left");
    $toolbar2->tools(array("moveUp", "moveDown", "remove"));

    $listBox2->dataSource(array())
             ->toolbar($toolbar2)
             ->selectable("multiple");

    echo $listBox2->render();
?>
    </div>
</div>
<style>
    .k-listbox-toolbar {
        order: 2;
        margin-right: 5px!important;
    }
	
    #example .demo-section {
        max-width: none;
        width: 695px;
    }

    #example .k-listbox {
        width: 342px;
        height: 250px;
    }

    .k-i-arrow-60-right:before,
    .k-i-arrow-double-60-right:before {
        margin-left: -2px;
    }

    .k-i-arrow-60-right:before, .k-i-arrow-60-left:before,
    .k-i-arrow-double-60-right:before, .k-i-arrow-double-60-left:before {
        -moz-transform: scaleX(-1);
        -o-transform: scaleX(-1);
        -webkit-transform: scaleX(-1);
        transform: scaleX(-1);
        filter: FlipH;
        -ms-filter: "FlipH";
    }
</style>
<?php require_once '../include/footer.php'; ?>
