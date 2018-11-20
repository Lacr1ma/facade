<?php

require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>

<script src="../content/js/cultures/kendo.culture.en-US.min.js"></script>
<script src="../content/js/cultures/kendo.culture.en-GB.min.js"></script>
<script src="../content/js/cultures/kendo.culture.de-DE.min.js"></script>
<script src="../content/js/cultures/kendo.culture.fr-FR.min.js"></script>
<script src="../content/js/cultures/kendo.culture.bg-BG.min.js"></script>
<div id="example">
    <div class="demo-section k-content">
        <ul class="fieldlist">
            <li class="culture">
                <label for="culture">Choose culture:</label>
                <?php
                    $culture = new \Kendo\UI\DropDownList('culture');

                    $culture->value("en-US")
                          ->change('changeCulture')
                          ->dataTextField('text')
                          ->dataValueField('value')
                          ->dataSource(array(
                              array('text' => 'bg-BG', 'value' => 'bg-BG'),
                              array('text' => 'de-DE', 'value' => 'de-DE'),
                              array('text' => 'en-US', 'value' => 'en-US'),
                              array('text' => 'en-GB', 'value' => 'en-GB')
                          ))
                          ->attr('style', 'width: 100%');
                      
                    echo $culture->render();
                ?>
            </li>
            <li class="language">
                <label for="language">Choose language:</label>
                <?php
                    $language = new \Kendo\UI\DropDownList('language');

                    $language->value("en-US")
                          ->change('changeLanguage')
                          ->dataTextField('text')
                          ->dataValueField('value')
                          ->dataSource(array(
                              array('text' => 'English', 'value' => 'en-US'),
                              array('text' => 'Bulgarian', 'value' => 'bg-BG')
                          ))
                          ->attr('style', 'width: 100%');
                      
                    echo $language->render();
                ?>
            </li>
        </ul>
    </div>
    
    <div id="product-view" class="demo-section k-content">
        <h4>Enter a date</h4>
        <?php
            $dateInput = new \Kendo\UI\DateInput('dateinput');
            $dateInput->value(new DateTime())
                      ->attr('style', 'width: 100%');
            echo $dateInput->render();
        ?>
    </div>
    <style>
        .fieldlist {
            margin: 0 0 -1em;
            padding: 0;
        }

        .fieldlist li {
            list-style: none;
            padding-bottom: 1em;
            line-height: 3em;
        }

        .fieldlist label {
            display: block;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 12px;
            color: #444;
        }
    </style>
    <script>
        function createDateInput() {
            var element = $("#dateinput");
            if (element.data("dateinput")) {
                element.data("dateinput").destroy();
                element.empty();
            }
            element.kendoDateInput({
                format: "F" ,
                value:new Date()
            });            
        }
        function changeCulture() {
            kendo.culture(this.value());
            $("#dateinput").data("kendoDateInput").setOptions({
                format: kendo.culture().calendar.patterns.F
            });
        }
        
        function changeLanguage() {
            kendo.ui.progress($("#dateinput"), true);                
            var baseUrl = '../content/js/messages/kendo.messages.';
            $.getScript(baseUrl + this.value() + ".min.js", function () {
                kendo.ui.progress($("#dateinput"), false);
                createDateInput();
            });
        }
    </script>
</div>
<?php require_once '../include/footer.php'; ?>
