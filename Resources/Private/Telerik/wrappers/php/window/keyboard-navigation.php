<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$window = new \Kendo\UI\Window('window');

$window->title('About Alvar Aalto')
       ->width('600px')
       ->close('onClose')
       ->startContent();
?>
    <p>
        Alvar Aalto is one of the greatest names in modern architecture and design.
        Glassblowers at the iittala factory still meticulously handcraft the legendary
        vases that are variations on one theme, fluid organic shapes that let the end user
        decide the use. Interpretations of the shape in new colors and materials add to the
        growing Alvar Aalto Collection that remains true to his original design.
    </p>
    <p>
        Born Hugo Alvar Henrik Aalto (February 3, 1898 - May 11, 1976) in Kuortane, Finland,
        was noted for his humanistic approach to modernism. He studied architecture at the
        Helsinki University of Technology from 1916 to 1921. In 1924 he married architect
        Aino Marsio.
    </p>
    <p>
        Alvar Aalto was one of the first and most influential architects of the Scandinavian
        modern movement, and a member of the Congres Internationaux d'Architecture Moderne.
        Major architectural works include the Finlandia Hall in Helsinki, Finland,
        and the campus of Helsinki University of Technology.
    </p>
<?php
    $window->endContent();

    echo $window->render();
?>

<span id="undo" style="display:none" class="k-button hidden-on-narrow">Click here to open the window.</span>


<div class="box wide hidden-on-narrow">
    <div class="box-col">
    <h4>Supported keys and user actions</h4>
    <ul class="keyboard-legend">
        <li>
            <span class="button-preview">
                <span class="key-button leftAlign wider">Alt</span>
                <span class="key-button">w</span>
            </span>
            <span class="button-descr">
                focuses window
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button leftAlign wider">Alt</span>
                <span class="key-button">p</span>
            </span>
            <span class="button-descr">
                toggles pin
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button leftAlign wider">Alt</span>
                <span class="key-button">up arrow</span>
            </span>
            <span class="button-descr">
                maximizes and restores the window
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button leftAlign wider">Alt</span>
                <span class="key-button">down arrow</span>
            </span>
            <span class="button-descr">
                minimizes and restores the window
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button leftAlign wider">Alt</span>
                <span class="key-button">r</span>
            </span>
            <span class="button-descr">
                refreshes the window
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button">esc</span>
            </span>
            <span class="button-descr">
                closes window
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button wider leftAlign">left arrow</span>
            </span>
            <span class="button-descr">
                moves window to the left
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button wider leftAlign">right arrow</span>
            </span>
            <span class="button-descr">
                moves window to the right
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button wider leftAlign">up arrow</span>
            </span>
            <span class="button-descr">
                moves window up
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button wider leftAlign">down arrow</span>
            </span>
            <span class="button-descr">
                moves window down
            </span>
        </li>
    </ul>
    </div>

    <div class="box-col">
    <h4>&nbsp;</h4>
    <ul class="keyboard-legend">
        <li>
            <span class="button-preview">
                <span class="key-button">ctrl</span>
                <span class="key-button wider leftAlign">left arrow</span>
            </span>
            <span class="button-descr">
                narrows window in horizontal direction
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button">ctrl</span>
                <span class="key-button wider leftAlign">right arrow</span>
            </span>
            <span class="button-descr">
                expands window in horizontal direction
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button">ctrl</span>
                <span class="key-button wider leftAlign">down arrow</span>
            </span>
            <span class="button-descr">
                expands window in vertical direction
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button">ctrl</span>
                <span class="key-button wider leftAlign">up arrow</span>
            </span>
            <span class="button-descr">
                narrows window in vertical direction
            </span>
        </li>
    </ul>
    </div>

</div>

<div class="responsive-message"></div>

<script>
    function onClose() {
        $("#undo").show();
    }

    $("#undo")
        .bind("click", function() {
            $("#window").data("kendoWindow").open();
            $("#undo").hide();
        });

    // focus the widget
    $(document).on("keydown.examples", function(e) {
        if (e.altKey && e.keyCode === 87 /* w */) {
            $("#window").focus();
        }
    });
</script>

<style>
    #example .box {
        margin-top: 350px;
    }
    .button-container {
        position: absolute;
    }

    @media screen and (max-width: 1023px) {
        div.k-window {
            display: none !important;
        }
    }
</style>

<?php require_once '../include/footer.php'; ?>
