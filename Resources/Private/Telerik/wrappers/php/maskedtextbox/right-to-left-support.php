<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$maskedtextbox = new \Kendo\UI\MaskedTextBox('maskedtextbox');
$maskedtextbox->mask("(999) 000-0000");
$maskedtextbox->attr('style', 'width: 100%');
?>
<div class="demo-section k-content k-rtl">
    <h4>Set Value</h4>
    <?= $maskedtextbox->render() ?>
</div>

<?php require_once '../include/footer.php'; ?>
