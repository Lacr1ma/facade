<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$window = new \Kendo\UI\Window('window');
$draggable = new \Kendo\UI\WindowDraggable();
$draggable->containment('#container');

$window->title('About Alvar Aalto')
       ->width('300px')
       ->height('200px')
       ->draggable($draggable)
       ->actions(array("Minimize", "Maximize", "Pin"))
       ->startContent();
?>
    <p>
        Alvar Aalto is one of the greatest names in modern architecture and design.
        Glassblowers at the iittala factory still meticulously handcraft the legendary vases
        that are variations on one theme, fluid organic shapes that let the end user decide the use.
    </p>
<?php
    $window->endContent();

    echo $window->render();
?>
<div id="container">
</div>
<script>
    $(document).ready(function () {
        $("#window").data("kendoWindow").open();
    });
</script>
<style>
    #container {
        height: 400px;
        width: 600px;
        position: relative;
        border: 1px solid rgba(20,53,80,0.14);
    }
</style>

<?php require_once '../include/footer.php'; ?>
