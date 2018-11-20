<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>
<div class="demo-section k-content">
    <div id="special-days">
<?php

$month = new \Kendo\UI\CalendarMonth();
$month->content(<<<TEMPLATE
# if ($.inArray(+data.date, birthdays) != -1) { #
<div class="
   # if (data.value < 10) { #
       exhibition
   # } else if ( data.value < 20 ) { #
       party
   # } else { #
       cocktail
   # } #
">#= data.value #</div>
# } else { #
#= data.value #
# } #
TEMPLATE
);
$month->weekNumber(<<<TEMPLATE
     <a class="italic">#= data.weekNumber #</a>
TEMPLATE
);

$calendar = new \Kendo\UI\Calendar('calendar');
$calendar->value(new DateTime('today', new DateTimeZone('UTC')))
         ->weekNumber(true)
         ->month($month)
         ->footer(" ");

echo $calendar->render();
?>
    </div>
    <script>
    var today = new Date();
    var birthdays = [
       +new Date(today.getFullYear(), today.getMonth(), 8),
       +new Date(today.getFullYear(), today.getMonth(), 12),
       +new Date(today.getFullYear(), today.getMonth(), 24),
       +new Date(today.getFullYear(), today.getMonth() + 1, 6),
       +new Date(today.getFullYear(), today.getMonth() + 1, 7),
       +new Date(today.getFullYear(), today.getMonth() + 1, 25),
       +new Date(today.getFullYear(), today.getMonth() + 1, 27),
       +new Date(today.getFullYear(), today.getMonth() - 1, 3),
       +new Date(today.getFullYear(), today.getMonth() - 1, 5),
       +new Date(today.getFullYear(), today.getMonth() - 2, 22),
       +new Date(today.getFullYear(), today.getMonth() - 2, 27)
    ];
    </script>
</div>
<style>

    #calendar {
         width: 100%;
    }

    /* Template Days */

    .exhibition,
    .party,
    .cocktail {
        font-weight: bold;
    }

    .exhibition {
        color: #ff9e00;
    }

    .party {
        color: #ff4081;
    }

    .cocktail {
        color: #00a1e8;
    }
    .italic {
        font-style: italic;
    }

</style>
<?php require_once '../include/footer.php'; ?>
