<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

?>

<?php
    $editor = new \Kendo\UI\Editor('editor');

    $editor
        ->attr('style', 'height:240px')
        ->startContent();
?>
    &lt;p&gt;&lt;img src=&quot;../content/web/editor/kendo-ui-web.png&quot; alt=&quot;Editor for PHP logo&quot; style=&quot;display:block;margin-left:auto;margin-right:auto;&quot; /&gt;&lt;/p&gt;
    &lt;p&gt;
        Kendo UI Editor allows your users to edit HTML in a familiar, user-friendly way.&lt;br /&gt;
        In this version, the Editor provides the core HTML editing engine, which includes basic text formatting, hyperlinks, lists,
        and image handling. The widget &lt;strong&gt;outputs identical HTML&lt;/strong&gt; across all major browsers, follows
        accessibility standards and provides API for content manipulation.
    &lt;/p&gt;

<?php
    $editor->endContent();

    echo $editor->render();
?>
<div class="box wide">
<h4>Keyboard legend</h4>
<ul class="keyboard-legend">
    <li>
        <span class="button-preview">
            <span class="key-button">F10</span>
        </span>
        <span class="button-descr">
            focuses toolbar
        </span>
    </li>
    <li>
        <span class="button-preview">
            <span class="key-button">Tab</span>
        </span>or
        <span class="button-preview">
            <span class="key-button">Right</span>
        </span>
        <span class="button-descr">
            focuses next tool icon
        </span>
    </li>
    <li>
        <span class="button-preview">
            <span class="key-button wide rightAlign">Shift</span>
            +
            <span class="key-button">Tab</span>
        </span>or
        <span class="button-preview">
            <span class="key-button">Left</span>
        </span>
        <span class="button-descr">
            focuses previous tool icon
        </span>
    </li>
    <li>
        <span class="button-preview">
            <span class="key-button">Home</span>
        </span>
        <span class="button-descr">
            focuses first tool
        </span>
    </li>
    <li>
        <span class="button-preview">
            <span class="key-button">End</span>
        </span>
        <span class="button-descr">
            focuses last tool
        </span>
    </li>
    <li>
        <span class="button-preview">
            <span class="key-button">Enter</span>
        </span>or
        <span class="button-preview">
            <span class="key-button">Space</span>
        </span>
        <span class="button-descr">
            activates tool
        </span>
    </li>
</ul>
</div>

<?php require_once '../include/footer.php'; ?>

