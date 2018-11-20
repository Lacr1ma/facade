<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

?>

 <div class="demo-section k-content wide">

<?php
    $menu = new \Kendo\UI\Menu('menu');

    $first = new \Kendo\UI\MenuItem("First Item");
    $first->addItem(
        new \Kendo\UI\MenuItem("Sub Item 1"),
        new \Kendo\UI\MenuItem("<strong>Sub Item 2</strong>"),
        new \Kendo\UI\MenuItem("Sub Item 3"),
        new \Kendo\UI\MenuItem("Sub Item 4")
    );
    $menu->addItem($first);

    $second = new \Kendo\UI\MenuItem("<strong>Second Item</strong>");
    $second->addItem(
        new \Kendo\UI\MenuItem("Sub Item 1"),
        new \Kendo\UI\MenuItem("Sub Item 2"),
        new \Kendo\UI\MenuItem("Sub Item 3"),
        new \Kendo\UI\MenuItem("Sub Item 4")
    );
    $menu->addItem($second);

    $third = new \Kendo\UI\MenuItem("<strong>Third Item</strong>");
    $third->addItem(
        new \Kendo\UI\MenuItem("Sub Item 1"),
        new \Kendo\UI\MenuItem("Sub Item 2"),
        new \Kendo\UI\MenuItem("Sub Item 3"),
        new \Kendo\UI\MenuItem("Sub Item 4")
    );
    $menu->addItem($third);

    $fourth = new \Kendo\UI\MenuItem("Fourth Item");
    $fourth->addItem(
        new \Kendo\UI\MenuItem("Sub Item 1"),
        new \Kendo\UI\MenuItem("<strong>Sub Item 2</strong>"),
        new \Kendo\UI\MenuItem("Sub Item 3"),
        new \Kendo\UI\MenuItem("Sub Item 4")
    );
    $menu->addItem($fourth);

    $fifth = new \Kendo\UI\MenuItem("Fifth Item");
    $fifth->addItem(
        new \Kendo\UI\MenuItem("Sub Item 1"),
        new \Kendo\UI\MenuItem("Sub Item 2"),
        new \Kendo\UI\MenuItem("Sub Item 3"),
        new \Kendo\UI\MenuItem("Sub Item 4")
    );
    $menu->addItem($fifth);

    echo $menu->render();
?>

 </div>

<div class="box wide">
    <div class="box-col">
        <h4>Enable / Disable</h4>
        <ul class="options">
            <li>
                <input type="text" id="toggleIndex" class="k-textbox"/> <button class="toggleItem k-button">Enable/Disable</button>
            </li>
            <li>
                <button class="toggleTextItems k-button">Enable/Disable all Sub Item 3</button>
            </li>
            <li>
                <button class="toggleStrongItems k-button">Enable/Disable <strong>strong</strong> elements</button>
            </li>
        </ul>
    </div>
    <div class="box-col">
        <h4>Add / Remove</h4>
        <ul class="options">
            <li>
                <input type="text" id="removeIndex" class="k-textbox"/> <button class="removeItem k-button">Remove</button>
            </li>
            <li>
                <input type="text" value="Item" id="appendText" class="k-textbox"/> <span class="append-position">under</span> <input type="text" value="0.0" id="appendIndex" class="k-textbox"/> <button class="appendItem k-button">Append</button>
            </li>
            <li>
                <input type="text" value="Item" id="beforeText" class="k-textbox"/> <span class="append-position">before</span> <input type="text" value="0" id="beforeIndex" class="k-textbox"/> <button class="beforeItem k-button">Append</button>
            </li>
            <li>
                <input type="text" value="Item" id="afterText" class="k-textbox"/> <span class="append-position">after</span> <input type="text" value="0" id="afterIndex" class="k-textbox"/> <button class="afterItem k-button">Append</button>
            </li>
        </ul>
    </div>
    <div class="box-col">
        <h4>Open / Close</h4>
        <ul class="options">
            <li>
                <input type="text" id="triggerIndex" class="k-textbox"/> <button class="triggerItem k-button">Open/Close</button>
            </li>
        </ul>
    </div>
</div>

<script>
    $(document).ready(function() {
        var menu = $("#menu").data("kendoMenu");

        var getItem = function (target) {
                var itemIndexes = target.val().split(/[.,]/),
                    item = menu.element;

                if (itemIndexes[0] !== "") {
                    for (var i = 0, len = itemIndexes.length; i < len; i++) {
                        item = item.children("li").eq(itemIndexes[i]);
                        if (i < len-1) {
                            item = item.find("ul:first");
                        }
                    }
                }

                return item;
            },
            toggle = function (e) {
                if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                    var item = getItem($("#toggleIndex"));
                    menu.enable(item, item.hasClass("k-state-disabled"));
                }
            },
            trigger =  function (e) {
                if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                    var item = getItem($("#triggerIndex"));

                    if (item.children().eq(0).hasClass("k-state-active")) {
                        menu.close(item);
                    } else {
                        menu.open(item);
                    }
                }
            },
            remove = function (e) {
                if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode)
                    menu.remove(getItem($("#removeIndex")));
            },
            append = function (e) {
                if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                    menu.append({
                            text: $("#appendText").val()
                        }, getItem($("#appendIndex")));
                }
            },
            before = function (e) {
                if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                    menu.insertBefore({
                            text: $("#beforeText").val()
                        }, getItem($("#beforeIndex")));
                }
            },
            after = function (e) {
                if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
                    menu.insertAfter({
                            text: $("#afterText").val()
                        }, getItem($("#afterIndex")));
                }
            },
            toggleText = function () {
                var items = $("#menu").find(".k-link:contains(Sub Item 3)").parent();
                menu.enable(items, items.hasClass("k-state-disabled"));
            },

            toggleStrong = function () {
                var items = $("#menu").find(":has(> strong)").parent();
                menu.enable(items, items.hasClass("k-state-disabled"));
            };

        $(".toggleItem").click(toggle);
        $("#toggleIndex").keypress(toggle);

        $(".triggerItem").click(trigger);
        $("#triggerIndex").keypress(trigger);

        $(".removeItem").click(remove);
        $("#removeIndex").keypress(remove);

        $(".appendItem").click(append);
        $("#appendText,#appendIndex").keypress(append);

        $(".beforeItem").click(before);
        $("#beforeText,#beforeIndex").keypress(before);

        $(".afterItem").click(after);
        $("#afterText,#afterIndex").keypress(after);

         $(".toggleTextItems").click(toggleText);
        $(".toggleStrongItems").click(toggleStrong);
    });
</script>
<style>
    .box .k-textbox {
        width: 60px;
    }
    .box-col {
        width: 320px;
        margin-bottom: -20px;
    }
    .box-col .options {
        margin-bottom: 20px;
    }
    .append-position {
        display: inline-block;
        min-width: 45px;
    }
    .redText,
    .redText > .k-link {
        color: red;
    }

    .redText.k-state-disabled > .k-link {
        color: lightcoral;
    }
</style>

<?php require_once '../include/footer.php'; ?>

