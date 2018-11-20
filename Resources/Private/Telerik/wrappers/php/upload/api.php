<?php
require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>
<div class="box">
    <h4>API Functions</h4>
    <ul class="options">
        <li>
            <button class="toggleEnabled k-button">Toggle enabled state</button>
        </li>
        <li>
            <button class="enable k-button">Enable</button> <button class="disable k-button">Disable</button>
        </li>
    </ul>
</div>
<form method="post">
    <div class="demo-section k-content">
<?php
$upload = new \Kendo\UI\Upload('files[]');

echo $upload->render();
?>
    </div>
</form>
<script>
    function getUpload() {
        return $("#files\\[\\]").data("kendoUpload");
    }

    $(document).ready(function() {
        $(".toggleEnabled").click(function() {
            getUpload().toggle();
        });

        $(".enable").click(function() {
            getUpload().enable();
        });

        $(".disable").click(function() {
            getUpload().disable();
        });
    });
</script>
<?php require_once '../include/footer.php'; ?>
