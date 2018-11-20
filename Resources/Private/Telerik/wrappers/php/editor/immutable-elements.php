<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

?>
<style>
    .k-editor p {
        margin: 1em 0px;
    }

    .k-editor *[contenteditable='false'] {
        opacity: 0.5;
        cursor: default;
    }
    
    
    .k-editor .selected-immutable {
        background: rgba(128, 128, 128, 0.1);
    }
</style>

<?php
    $immutables = new \Kendo\UI\EditorImmutables();
    $immutables->serializationHandler("immutablesSerialization")
               ->deserialization("immutablesDeserialization");
     
    $editorSerialization = new \Kendo\UI\EditorSerialization();
    $editorSerialization->custom("customSerialization");

    
    $editor = new \Kendo\UI\Editor('editor');
    $editor->tag('div');
    $editor->immutables($immutables);
    $editor->select("onSelect");
    $editor->serialization($editorSerialization);
    // enable all tools
    $editor->addTool(
        "bold",
        "italic",
        "underline",
        "justifyLeft",
        "justifyCenter",
        "justifyRight",
        "justifyFull",
        "indent",
        "outdent",
        "createLink",
        "unlink",
        "createTable",
        "addRowAbove",
        "addRowBelow",
        "addColumnLeft",
        "addColumnRight",
        "deleteRow",
        "deleteColumn",
        "viewHtml"
    );

    $editor
        ->attr('style', 'width:100%;height:400px')
        ->startContent();
?>
    <div class="headerField" contenteditable="false" style="font-size:32px; color: #078e23; text-align:center;">
        <p>Company Name</p>
        <hr />
    </div>

    <div class="addressField" contenteditable="false" style="width: 100%; text-align:right;">
        1010 Street,<br />
        City,<br />
        Country, <br />
        +000 000 555 666<br />
    </div>

    <p><span contenteditable="false">Dear </span> Your Name,</p>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel nunc velit. Proin dictum ac justo eu varius. Fusce vehicula, erat ac sagittis consequat, leo libero tristique dolor, et maximus eros ante quis quam. Aliquam erat volutpat. Cras nec mattis dui, sed rhoncus magna. Maecenas eget tristique nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec nisl elementum, rhoncus ligula at, fringilla odio. Curabitur semper ultricies tristique. Donec dapibus placerat dui nec fermentum. Nunc non cursus nibh. Nulla rhoncus vitae erat id facilisis.
    </p>
    <p>
        Aenean lacinia eros eu interdum placerat. Pellentesque elit tellus, condimentum eu nulla quis, iaculis gravida sapien. Aliquam elementum dapibus eros sed pretium. Praesent porta odio magna, nec efficitur arcu pharetra a. Nulla lacus orci, pretium eu pellentesque id, ornare eget turpis. Quisque condimentum quam ante, ornare cursus nisl suscipit ac. Nulla non leo semper, finibus mauris eu, interdum ex.
    </p>

    <p contenteditable="false">Best regards,</p>
    <p>Your Name</p>
    <div class="addressField" contenteditable="false" style="width: 100%; text-align:left;">
        1010 Street,<br />
        City,<br />
        Country, <br />
        +000 000 555 666<br />
    </div>
<?php
    $editor->endContent();

    echo $editor->render();
?>

<script>
    function immutablesSerialization(node){
    	$("[contenteditable='false']", editor.body).removeClass("selected-immutable");
        var immutableName = node.className || node.nodeName.toLowerCase();
        var textAlign = node.style.textAlign;
        var result = textAlign ?
                        kendo.format("<{0} style='text-align:{1};'></{0}>", immutableName, textAlign) :
                        kendo.format("<{0}></{0}>", immutableName);

        return result;
    }
    
    function immutablesDeserialization(node, immutable){
    	immutable.style.textAlign = node.style.textAlign;
    }
    
    function onSelect(e){
    	var editor = e.sender;
        var selection = e.sender.getSelection();
        var selectedNode = selection.anchorNode;

        $("[contenteditable='false']", editor.body).removeClass("selected-immutable");
        $(selectedNode).closest("[contenteditable='false']").addClass("selected-immutable");
    }
    
    function customSerialization(html){
    	return html.replace(/selected-immutable/, "");
    }
</script>

<?php require_once '../include/footer.php'; ?>

