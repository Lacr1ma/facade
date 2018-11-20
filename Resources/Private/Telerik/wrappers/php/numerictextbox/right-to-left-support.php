<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$numeric = new \Kendo\UI\NumericTextBox('numerictextbox');
$numeric->attr('style', 'width: 100%');
?>
 <div class="demo-section k-content k-rtl">
    <h4>Set Value</h4>
<?= $numeric->render() ?>
</div>

<?php require_once '../include/footer.php'; ?>
