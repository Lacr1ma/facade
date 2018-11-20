<?php

require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';

$media = new \Kendo\UI\MediaPlayerMedia('MediaPlayerMedia') ;
$media ->source(array(
          array('quality' => '360p', 'url' => "http://telerik-media.s3.amazonaws.com/digital-factory/digital-factory-360.mp4"),
          array('quality' => '480p', 'url' => "http://telerik-media.s3.amazonaws.com/digital-factory/digital-factory-480.mp4"),
          array('quality' => '720p', 'url' => "http://telerik-media.s3.amazonaws.com/digital-factory/digital-factory-720.mp4"),
      )
);
$media ->title("Digital Transformation: A New Way of Thinking");
$mediaPlayer = new \Kendo\UI\MediaPlayer('MediaPlayer') ;
$mediaPlayer->media($media);
$mediaPlayer->autoPlay(true);
$mediaPlayer->navigatable(true);
?>

<div class="demo-section k-content wide" style="max-width: 644px;">
<?php
echo $mediaPlayer->render();
?>
</div>
    <div class="box wide" style="max-width:644px;">
        <div class="box-col">
            <h4>Focus</h4>
            <ul class="keyboard-legend">
                <li>
                    <span class="button-preview">
                        <span class="key-button wider">Alt</span>
                        +
                        <span class="key-button">W</span>
                    </span>
                    <span class="button-descr">
                        Focuses the widget
                    </span>
                </li>
            </ul>
        </div>
        <div class="box-col">
            <h4>Supported keys and user actions</h4>
            <ul class="keyboard-legend">
                <li>
                    <span class="button-preview">
                        <span class="key-button wider">Space</span>
                    </span>
                    <span class="button-descr">
                        Toggles Play and Pause
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button wider">Enter</span>
                    </span>
                    <span class="button-descr">
                        Opens the video in the FullScreen mode
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button wider">Esc</span>
                    </span>
                    <span class="button-descr">
                        Exits the FullScreen mode
                    </span>
                </li>
                <li>
                    <span class="button-preview">
                        <span class="key-button wider">M</span>
                    </span>
                    <span class="button-descr">
                        Toggles Mute and Unmute
                    </span>
                </li>
            </ul>
        </div>
    </div>
<script>
       $(document).ready(function () {
            //focus the widget
            $(document).on("keydown.examples", function (e) {
                if (e.altKey && e.keyCode === 87 /* w */) {
                    $("#MediaPlayer").focus();
                }
            });
        });
</script> 
<style>
    .k-mediaplayer {
        height: 360px;
    }
</style>  
<?php require_once '../include/footer.php'; ?>
