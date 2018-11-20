<?php
require_once '../lib/Kendo/Autoload.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $type = $_GET['type'];

    if ($type == 'save') {
        $files = $_FILES['files'];
        // Save the uploaded files
        /*
        for ($index = 0; $index < count($files['name']); $index++) {
            $file = $files['tmp_name'][$index];
            if (is_uploaded_file($file)) {
                move_uploaded_file($file, './' . $files['name'][$index]);
            }
        }
        */
    } else if ($type == 'remove') {
        $fileNames = $_POST['fileNames'];
        // Delete uploaded files
        /*
        for ($index = 0; $index < count($fileNames); $index++) {
            unlink('./' . $fileNames[$index]);
        }
        */
    }

    // Return an empty string to signify success
    echo '';

    exit;
}

require_once '../include/header.php';
?>
<style>
        .dropZoneElement {
            position: relative;
            display: inline-block;
            background-color: #f8f8f8;
            border: 1px solid #c7c7c7;
            width: 230px;
            height: 110px;
            text-align: center;
        }

        .textWrapper {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            font-size: 24px;
            line-height: 1.2em;
            font-family: Arial,Helvetica,sans-serif;
            color: #000;
        }

        .dropImageHereText {
            color: #c7c7c7;
            text-transform: uppercase;
            font-size: 12px;
        }

        .product {
            float: left;
            position: relative;
            margin: 0 10px 10px 0;
            padding: 0;
        }
        .product img {
            width: 110px;
            height: 110px;
        }

        .wrapper:after {
            content: ".";
            display: block;
            height: 0;
            clear: both;
            visibility: hidden;
        }
    </style>
<div id="example" class="k-content">

    <div class="demo-section k-content wide">
        <div class="wrapper">
            <div id="products"></div>
            <div class="dropZoneElement">
                <div class="textWrapper">
                <p><span>+</span>Add Image</p>
                <p class="dropImageHereText">Drop image here to upload</p>
            </div>
            </div>
         </div>
    </div>

<?php
$images=['.jpg', ',jpeg', '.png', '.bmp', '.gif'];
$upload = new \Kendo\UI\Upload('files[]');
$upload->async(array(
        'saveUrl' => 'customdropzone.php?type=save',
        'removeUrl' => 'customdropzone.php?type=remove',
        'autoUpload' => true,
        'removeField' => 'fileNames[]'
       ))
	   ->validation(array(
		'allowedExtensions'=>$images
		))
	   ->showFileList(false)
	   ->dropZone('.dropZoneElement')
	   ->success('onSuccess');

echo $upload->render();
?>
</div>
<?php require_once '../include/footer.php'; ?>
<script type="text/x-kendo-template" id="template">
	<div class="product">
		<img src="../content/web/foods/#= name #" alt="#: name # image" />
	</div>       
</script>

<script>
    var template = kendo.template($("#template").html());
    var initialFiles = [{ name: "1.jpg" }, { name: "2.jpg" }, { name: "3.jpg" }, { name: "4.jpg" }, { name: "5.jpg" }, { name: "6.jpg" }];

    $("#products").html(kendo.render(template, initialFiles));

    function onSuccess(e) {
        if (e.operation == "upload") {
            for (var i = 0; i < e.files.length; i++) {
                var file = e.files[i].rawFile;

                if (file) {
                    var reader = new FileReader();

                    reader.onloadend = function () {
                        $("<div class='product'><img src=" + this.result + " /></div>").appendTo($("#products"));
                    };

                    reader.readAsDataURL(file);
                }
            }
        }
    }
</script>
