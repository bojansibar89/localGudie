<?php 
    
    $directory = '../upload/';

    $images = glob($directory . '{*.jpg,*.gif,*.png,*.bmp}', GLOB_BRACE);
	echo ($images[0]);
?>
