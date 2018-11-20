<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$media = new \Kendo\UI\MediaPlayerMedia('MediaPlayerMedia') ;
$media ->source("https://www.youtube.com/watch?v=ykQhk1zFVeg");
$media ->title("Cognitive first");
$mediaPlayer = new \Kendo\UI\MediaPlayer('MediaPlayer') ;
$mediaPlayer->media($media)
            ->play('onPlay')
            ->pause('onPause')
            ->end('onEnd')
            ->ready('onReady')
            ->timeChange('onTimeChange')
            ->volumeChange('onVolumeChange');
$mediaPlayer->autoPlay(true);
?>

<div class="demo-section k-content wide" style="max-width: 644px;">
<?php
echo $mediaPlayer->render();
?>
</div>

<div class="box wide" style="max-width:644px; text-align: center;">
    <h4 class="title">Events log</h4>
    <div class="console"></div>
</div>

<script>
    function onPlay() {
        kendoConsole.log("event :: play");
    }

    function onPause() {
        kendoConsole.log("event :: pause");
    }

    function onEnd() {
        kendoConsole.log("event :: end");
    }

    function onReady() {
        kendoConsole.log("event :: ready");
    }

    function onTimeChange() {
        kendoConsole.log("event :: timeChange");
    }

    function onVolumeChange() {
        kendoConsole.log("event :: volumeChange");
    }
</script>
<style>
    .k-mediaplayer {
        height: 360px;
    }
</style>  
<?php require_once '../include/footer.php'; ?>
