<?php
require_once '../lib/Kendo/Autoload.php';
if($_SERVER['REQUEST_METHOD']=='POST') {
    $type=$_GET['type'];
    if($type=='save') {
        $files=$_FILES['files'];
        // Save the uploaded files
        /*
        for ($index = 0; $index < count($files['name']); $index++) {
            $file = $files['tmp_name'][$index];
            if (is_uploaded_file($file)) {
                move_uploaded_file($file, './' . $files['name'][$index]);
            }
        }
        */
    }
    elseif($type=='remove') {
        $fileNames=$_POST['fileNames'];
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

<div class="demo-section k-content">
	<h4>Upload PDF</h4>
<?php
$allowed=['.pdf'];
$upload=new \ Kendo\ UI\ Upload('files[]');
$upload->async(array(
		'saveUrl'=>'validation.php?type=save',
		'removeUrl'=>'validation.php?type=remove',
		'autoUpload'=>true,
		'removeField'=>'fileNames[]'
	))
	->validation(array(
	'allowedExtensions'=>$allowed
	));
echo $upload->render();
?>
	<div class="demo-hint">You can only upload <strong>PDF</strong> files.</div>
	
	<h4 style="margin-top: 2em;">Upload Image</h4>
<?php
$images=['.gif','.jpg','.png'];
$upload=new \ Kendo\ UI\ Upload('images[]');
$upload->async(array(
		'saveUrl'=>'validation.php?type=save',
		'removeUrl'=>'validation.php?type=remove',
		'autoUpload'=>true,
		'removeField'=>'fileNames[]'))
	->validation(array(
		'allowedExtensions'=>$images
	));
echo $upload->render();
?>
	<div class="demo-hint">You can only upload <strong>GIF</strong>, <strong>JPG</strong>, <strong>PNG</strong> files.</div>
</div>
<div class="demo-section k-content">
   <h4>Upload Documents</h4>
   <?php
$upload=new \ Kendo\ UI\ Upload('documents[]');
$upload->async(array(
		'saveUrl'=>'validation.php?type=save',
		'removeUrl'=>'validation.php?type=remove',
		'autoUpload'=>true,
		'removeField'=>'fileNames[]'
	))
	->validation(array(
		'maxFileSize'=>'4194304'
	));
echo $upload->render();
?>
   	<div class="demo-hint">Maximum allowed file size is <strong>4MB</strong>.</div>
</div>
<?php require_once '../include/footer.php';?>
