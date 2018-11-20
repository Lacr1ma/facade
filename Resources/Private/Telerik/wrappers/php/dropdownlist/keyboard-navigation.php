<?php

require_once '../lib/Kendo/Autoload.php';
require_once '../include/header.php';
?>
 <div class="demo-section k-content">
   <h4>T-shirt Size</h4>
<?php
$dropDownList = new \Kendo\UI\DropDownList('select');

$dropDownList->attr('style', 'width: 200px')
             ->attr('accesskey', 'w')
             ->dataSource(array('X-Small', 'Small', 'Medium', 'Large', 'X-Large', '2X-Large'))
             ->attr('style', 'width: 100%');

echo $dropDownList->render();
?>
 </div>

<div class="box">
    <h4>Keyboard legend</h4>
    <ul class="keyboard-legend">
        <li>
            <span class="button-preview">
                <span class="key-button leftAlign wider"><a target="_blank" href="http://en.wikipedia.org/wiki/Access_key">Access key</a></span>
                +
                <span class="key-button">w</span>
            </span>
            <span class="button-descr">
                focuses the widget
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button wider leftAlign">up arrow</span>
            </span>
            <span class="button-descr">
                highlights previous item
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button wider leftAlign">left arrow</span>
            </span>
            <span class="button-descr">
                highlights previous item
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button wider leftAlign">down arrow</span>
            </span>
            <span class="button-descr">
                highlights next item
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button wider leftAlign">right arrow</span>
            </span>
            <span class="button-descr">
                highlights next item
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button">home</span>
            </span>
            <span class="button-descr">
                selects first item in the list
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button">end</span>
            </span>
            <span class="button-descr">
                selects last item in the list
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button wider rightAlign">enter</span>
            </span>
            <span class="button-descr">
                selects highlighted item
            </span>
        </li>
       <li>
            <span class="button-preview">
                <span class="key-button">esc</span>
            </span>
            <span class="button-descr">
                closes the popup
            </span>
        </li>
        <li>
            <span class="button-preview">
                <span class="key-button">alt</span>
                <span class="key-button wider leftAlign">down arrow</span>
            </span>
            <span class="button-descr">
                opens the popup
            </span>
        </li>
        <li>
			<span class="button-preview">
				<span class="key-button wider rightAlign">space</span>
			</span>
			<span class="button-descr">
				opens the popup / selects highlighted item
			</span>
		</li>
        <li>
            <span class="button-preview">
                <span class="key-button">alt</span>
                <span class="key-button wider leftAlign">up arrow</span>
            </span>
            <span class="button-descr">
                closes the popup
            </span>
        </li>
    </ul>
</div>
<?php require_once '../include/footer.php'; ?>
