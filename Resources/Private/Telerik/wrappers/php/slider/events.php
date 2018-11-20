<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$slider = new \Kendo\UI\Slider('slider');
$slider->attr('class', 'temperature')
       ->change('sliderOnChange')
       ->slide('sliderOnSlide')
       ->min(0)
       ->max(30)
       ->smallStep(1)
       ->largeStep(10)
       ->value(18);

$rangeslider = new \Kendo\UI\RangeSlider('rangeslider');
$rangeslider->attr('class', 'humidity')
            ->change('rangeSliderOnChange')
            ->slide('rangeSliderOnSlide')
            ->min(0)
            ->max(10)
            ->smallStep(1)
            ->largeStep(2)
            ->tickPlacement('both');
?>

<div class="demo-section k-content">
    <ul id="fieldlist">
        <li>
            <label>Temperature</label>
            <?= $slider->render() ?>
        </li>
        <li>
            <label>Humidity</label>
            <?= $rangeslider->render() ?>
        </li>
    </ul>
</div>

<div class="box">
    <h4>Console log</h4>
    <div class="console"></div>
</div>

<script>
    function sliderOnSlide(e) {
        kendoConsole.log("Slide :: new slide value is: " + e.value);
    }

    function sliderOnChange(e) {
        kendoConsole.log("Change :: new value is: " + e.value);
    }

    function rangeSliderOnSlide(e) {
        kendoConsole.log("Slide :: new slide values are: " + e.value.toString().replace(",", " - "));
    }

    function rangeSliderOnChange(e) {
        kendoConsole.log("Change :: new values are: " + e.value.toString().replace(",", " - "));
    }
</script>
<style>
   #fieldlist {
       margin: 0 0 -2em;
       padding: 0;
       text-align: center;
   }

   #fieldlist > li {
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

<?php require_once '../include/footer.php'; ?>
