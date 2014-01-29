<style>
.label_message {
	display:block;
	color:red;
	text-align:center;
}
</style>
<?php
/* include('db.php');
session_start();
$session_id='1'; // User session id */
/* echo '<form id="form_upload" action="php/ajaximage.php" enctype="multipart/form-data" method="post">
			<label>Dateinamen:</label>
			<input type="file" id="upload_file" name="upload_file" class="jfilestyle" 
				   data-size="300px" data-buttonText="Datei auswählen" onchange="readURL(this);" 
				   accept="image/x-png, image/gif, image/jpeg" >
			<output id="filesInfo"></output>
			<input type="submit" class="button_link" id="hochladen" value="Hochladen" />
			<iframe id="upload_target" name="upload_target" src="" style="width:0;height:0;border:0px solid #fff;"></iframe>
	  </form>'; */

$path = "../upload/";
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
	$name = $_FILES['upload_file']['name'];
	$size = $_FILES['upload_file']['size'];
	if(strlen($name)) {
		if (strpos($name,'.') !== false) {
			list($txt, $ext) = explode(".", $name);
			if(in_array(strtolower($ext),$valid_formats)) {
				if($size<(1024*1024)) { // Image size max 1 MB
					$actual_image_name = time().".".$ext;
					$tmp = $_FILES['upload_file']['tmp_name'];
					if(move_uploaded_file($tmp, $path.$actual_image_name)) {
						/* mysql_query("UPDATE users SET profile_image='$actual_image_name' WHERE uid='$session_id'"); */
						/* echo "<img src='../upload/".$actual_image_name."'>"; */
						echo '<label class="label_message">Success!</label>';
					} else
						echo '<label class="label_message">Upload failed!</label>';
				} else
					echo '<label class="label_message">Image file size max 1 MB!</label>'; 
			} else
				echo '<label class="label_message">Invalid file format!</label>'; 
		} else
			echo '<label class="label_message">Invalid file format! (no dot)</label>';
	} else
		echo '<label class="label_message">Please select image!</label>';
	exit;
}
?>