<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>

<div class="demo-section k-content" style="text-align: center;">
    <h4>Pick a date</h4>
<?php
$calendar = new \Kendo\UI\Calendar('calendar');

$calendar->selectable("multiple");

echo $calendar->render();
?>
</div>
<div class="box">
    <div class="box-col">
        <h4>Focus</h4>
        <ul class="keyboard-legend">
            <li>
                <span class="button-preview">
                    <span class="key-button wider">Alt</span>
                    +
                    <span class="key-button">w</span>
                </span>
                <span class="button-descr">
                    focuses the widget
                </span>
            </li>
        </ul>
    </div>
    <div class="box-col">
        <h4>Supported keys and user actions</h4>
        <ul class="keyboard-legend">
            <li>
                <span class="button-preview">
                    <span class="key-button wider leftAlign">left arrow</span>
                </span>
                <span class="button-descr">
                    highlights previous day
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button wider leftAlign">right arrow</span>
                </span>
                <span class="button-descr">
                    highlights next day
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button wider leftAlign">up arrow</span>
                </span>
                <span class="button-descr">
                    highlights same day from the previous week
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button wider leftAlign">down arrow</span>
                </span>
                <span class="button-descr">
                    highlights same day from the next week
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">ctrl</span>
                    <span class="key-button wider leftAlign">left arrow</span>
                </span>
                <span class="button-descr">
                    navigates to previous month
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">ctrl</span>
                    <span class="key-button wider leftAlign">right arrow</span>
                </span>
                <span class="button-descr">
                    navigates to next month
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
                    <span class="key-button wider leftAlign">up arrow</span>
                </span>
                <span class="button-descr">
                    navigates to previous view
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">ctrl</span>
                    <span class="key-button wider leftAlign">down arrow</span>
                </span>
                <span class="button-descr">
                    navigates to next view
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">home</span>
                </span>
                <span class="button-descr">
                    highlights first day of the month
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">end</span>
                </span>
                <span class="button-descr">
                    highlights last day of the month
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button wider rightAlign">enter</span> or
                    <span class="key-button wider rightAlign">space</span>
                </span>
                <span class="button-descr">
                    if in "month" view selects the highlighted day. In other
                    views navigates to lower view
                </span>
            </li>
        </ul>
    </div>
    <div class="box-col">
        <h4>Multiple Selection mode</h4>
        <ul class="keyboard-legend">
            <li>
                <span class="button-preview">
                    <span class="key-button">ctrl</span>
                    <span class="key-button wider leftAlign">enter</span> or
                    <span class="key-button wider leftAlign">space</span>
                </span>
                <span class="button-descr">
                    adds the highlighted day to the current selection. If that day was already selected it is removed from the selection. 
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">shift</span>
                    <span class="key-button wider leftAlign">left arrow</span> or 
                    <span class="key-button wider leftAlign">right arrow</span>
                </span>
                <span class="button-descr">
                    adds the next/previous date to the selected items.
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">shift</span>
                    <span class="key-button wider leftAlign">up arrow</span> or
                    <span class="key-button wider leftAlign">down arrow</span>
                </span>
                <span class="button-descr">
                    extend selection up/down one row in month view.
                </span>
            </li>
            <li>
                <span class="button-preview">
                    <span class="key-button">shift</span>
                    <span class="key-button wider leftAlign">space</span>
                </span>
                <span class="button-descr">
                    perform range selection, selects all dates between the last selected one (with SPACE or mouse click) and the one holding the focused cell.
                </span>
            </li>
        </ul>
    </div>
</div>
 <script>
    $(document).ready(function() {
        //focus the widget
        $(document).on("keydown.examples", function(e) {
            if (e.altKey && e.keyCode === 87 /* w */) {
                $("#calendar").data("kendoCalendar").focus();
            }
        });
    });
</script>

<?php require_once '../include/footer.php'; ?>
