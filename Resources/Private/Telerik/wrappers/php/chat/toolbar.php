<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>

<?php
$chat = new \Kendo\UI\Chat('chat');

$button = new \Kendo\UI\ChatToolbarButton();
$button->name("sendimage")
       ->iconClass("k-icon k-i-image");

$toolbar = new \Kendo\UI\ChatToolbar();
$toolbar->addButton($button)
        ->toggleable(true);

$chat->toolbar($toolbar);

$chat->toolClick('function(e) { if(e.name === "sendimage") $("#files").click(); }');
?>

<?php
$images=['.jpg', ',jpeg', '.png', '.bmp', '.gif'];
$upload = new \Kendo\UI\Upload('files');
$upload->async(array(
        'saveUrl' => '../upload/customdropzone.php?type=save',
        'removeUrl' => '../upload/customdropzone.php?type=remove',
        'autoUpload' => true,
        'removeField' => 'fileNames[]'
       ))
	   ->validation(array(
		'allowedExtensions'=>$images
		))
	   ->showFileList(false)
	   ->dropZone('#chat')
	   ->success('onSuccess');

echo $upload->render();
?>

<div class="demo-section k-content">
    <?php echo $chat->render(); ?>
    <div class="demo-hint">You can use the Image tool in the toolbar to send an image. Or drop an image on the Chat component.</div>
</div>

<script>
    var chat;
    $(document).ready(function () {
        chat = $("#chat").getKendoChat();
        $("#files").getKendoUpload().wrapper.hide();
    });

    function onSuccess(e) {
            if (e.operation === "upload") {
                for (var i = 0; i < e.files.length; i++) {
                    var file = e.files[i].rawFile;

                    if (file) {
                        var reader = new FileReader();

                        reader.onloadend = function () {
                            chat.renderAttachments({
                                attachments: [{
                                    contentType: "image_card",
                                    content: {
                                        image: this.result
                                    }
                                }],
                                attachmentLayout: "list"
                            });
                        };

                        reader.readAsDataURL(file);
                    }
                }
            }
        }

        var IMAGE_CARD_TEMPLATE = kendo.template(
            '<div class="k-card k-card-type-rich">' +
            '<div class="k-card-body quoteCard">' +
            '<img class="image-attachment" src="#: image #" />' +
            '</div>' +
            '</div>'
        );

        kendo.chat.registerTemplate("image_card", IMAGE_CARD_TEMPLATE);
</script>

<style>
    .k-card .image-attachment {
        max-height: 120px;
    }
</style>

<?php require_once '../include/footer.php'; ?>