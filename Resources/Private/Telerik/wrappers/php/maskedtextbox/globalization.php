<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>

<script src="../content/js/cultures/kendo.culture.en-US.min.js"></script>
<script src="../content/js/cultures/kendo.culture.en-GB.min.js"></script>
<script src="../content/js/cultures/kendo.culture.de-DE.min.js"></script>
<script src="../content/js/cultures/kendo.culture.fr-FR.min.js"></script>
<script src="../content/js/cultures/kendo.culture.bg-BG.min.js"></script>

<div id="product-view" class="demo-section k-content">
    <ul id="fieldlist">
        <li>
            <label for="culture">Choose culture:</label>
            <input id="culture" value="en-US" style="width: 100%;" />
    </li>
    <li>
            <label for="initial">Initial price:</label>
            <?php
            $initial = new \Kendo\UI\MaskedTextBox('initial');

            $initial->mask('9,999.99 $');
            $initial->value('1234.56');
            $initial->attr('style', 'width: 100%');

            echo $initial->render();
            ?>
        </li>
    </ul>
</div>

<style>
    #fieldlist {
        margin: 0 0 -2em;
        padding: 0;
    }

    #fieldlist li {
        list-style: none;
        padding-bottom: 2em;
    }

    #fieldlist label {
        display: block;
        padding-bottom: 1em;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 12px;
        color: #444;
    }

</style>

<script>
    $(document).ready(function() {
        var initial = $("#initial").data("kendoMaskedTextBox");

        function changeCulture() {
            kendo.culture(this.value());

            initial.setOptions(initial.options);
        }

        $("#culture").kendoDropDownList({
            change: changeCulture,
            dataTextField: "text",
            dataValueField: "value",
            dataSource: [
                {text: "de-DE"},
                {text: "en-US"},
                {text: "en-GB"},
                {text: "fr-FR"},
                {text: "bg-BG"}
            ]
        });
    });
</script>

<?php require_once '../include/footer.php'; ?>
