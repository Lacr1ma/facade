<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

?>
<div class="demo-section k-content">
        <h4>Vertical menu</h4>
<?php
    $menu = new \Kendo\UI\Menu('verticalMenu');

    $menu->orientation('vertical');

    $menu->attr('style', 'width: 140px; margin-bottom: 30px');

    $first = new \Kendo\UI\MenuItem("First Item");
    $first->addItem(
        new \Kendo\UI\MenuItem("Sub Item 1"),
        new \Kendo\UI\MenuItem("Sub Item 2"),
        new \Kendo\UI\MenuItem("Sub Item 3")
    );
    $menu->addItem($first);

    $second = new \Kendo\UI\MenuItem("Second Item");
    $second->addItem(
        new \Kendo\UI\MenuItem("Sub Item 1"),
        new \Kendo\UI\MenuItem("Sub Item 2"),
        new \Kendo\UI\MenuItem("Sub Item 3")
    );
    $menu->addItem($second);

    $third = new \Kendo\UI\MenuItem("Third Item");
    $third->addItem(
        new \Kendo\UI\MenuItem("Sub Item 1"),
        new \Kendo\UI\MenuItem("Sub Item 2"),
        new \Kendo\UI\MenuItem("Sub Item 3")
    );
    $menu->addItem($third);

    echo $menu->render();
?>

 <h4 style="padding-top: 2em;">Horizontal menu</h4>

<?php
    $menu = new \Kendo\UI\Menu('horizontalMenu');

    $first = new \Kendo\UI\MenuItem("First Item");
    $first->addItem(
        new \Kendo\UI\MenuItem("Sub Item 1"),
        new \Kendo\UI\MenuItem("Sub Item 2"),
        new \Kendo\UI\MenuItem("Sub Item 3")
    );
    $menu->addItem($first);

    $second = new \Kendo\UI\MenuItem("Second Item");
    $second->addItem(
        new \Kendo\UI\MenuItem("Sub Item 1"),
        new \Kendo\UI\MenuItem("Sub Item 2"),
        new \Kendo\UI\MenuItem("Sub Item 3")
    );
    $menu->addItem($second);

    $third = new \Kendo\UI\MenuItem("Third Item");
    $third->addItem(
        new \Kendo\UI\MenuItem("Sub Item 1"),
        new \Kendo\UI\MenuItem("Sub Item 2"),
        new \Kendo\UI\MenuItem("Sub Item 3")
    );
    $menu->addItem($third);

    echo $menu->render();
?>

</div>

<script>
    $(document.body).keydown(function(e) {
        if (e.altKey && e.keyCode == 87) {
            $("#verticalMenu").focus();
        } else if (e.altKey && e.keyCode == 81) {
            $("#horizontalMenu").focus();
        }
    });
</script>

<div class="box wide">
    <div class="box-col">
        <h4>Focus</h4>
        <ul class="keyboard-legend">
            <li>
                <span class="button-preview">
                    <span class="key-button leftAlign">Alt</span>
                    +
                    <span class="key-button">W</span>
                </span>
                <span class="button-descr">
                    focuses vertical menu (clicking on it or tabbing also work)
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button leftAlign">Alt</span>
                    +
                    <span class="key-button">Q</span>
                </span>
                <span class="button-descr">
                    focuses the horizontal menu (clicking on it or tabbing also work)
                </span>
            </li>
        </ul>
    </div>
    <div class="box-col">
        <h4>Supported keys and user actions</h4>
        <ul class="keyboard-legend">
            <li>
                <span class="button-preview">
                    <span class="key-button">Home</span>
                </span>
                <span class="button-descr">
                    Goes to the first item
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">End</span>
                </span>
                <span class="button-descr">
                    Goes to the last item
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">Right</span>
                </span>
                <span class="button-descr">
                    Goes to the next item or opens an item group
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">Left</span>
                </span>
                <span class="button-descr">
                    Goes to the previous item or closes an item group
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">Down</span>
                </span>
                <span class="button-descr">
                    Opens an item group or goes to the next item in a group
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">Up</span>
                </span>
                <span class="button-descr">
                    Goes to the previous item in a group
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">Enter</span>
                </span>
                <span class="button-descr">
                    Select or navigate item (same as click)
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">Space</span>
                </span>
                <span class="button-descr">
                    Select or navigate item (same as click)
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">Esc</span>
                </span>
                <span class="button-descr">
                    closes the innermost open group
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">Tab</span>
                </span>
                <span class="button-descr">
                    tabs away from the Menu on the next focusable page element
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button leftAlign">Shift</span>
                    +
                    <span class="key-button">Tab</span>
                </span>
                <span class="button-descr">
                    tabs away from the Menu on the previous focusable page element
                </span>
            </li>
        </ul>
    </div>
</div>

<?php require_once '../include/footer.php'; ?>

