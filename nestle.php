<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/firm_m.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="js/jquery.bxslider.min.js"></script>
	<script src="js/getCount.js"> </script>
	<link href="css/jquery.bxslider.css" rel="stylesheet" />
</head>
<body onLoad="getCount(); ">
	
	
		
	<div id="firm_logo_m"><ul class="bxslider">
	<?php
		$directory = 'upload/';
		$images = glob($directory . '{*.JPG,*.jpg,*.gif,*.png,*.bmp}', GLOB_BRACE);
		$length = sizeof($images);
		for($x=0; $x<($length); $x++)
		{
			echo  "<img width='400px' height='400px' src=".$images[$x]." />";
		}
		
	?>
	  
	  <!-- <li><img width="100%" height="100%" src="images/nestle.jpg" /></li>
	  <li><img width="100%" height="100%" src="images/no-photo.png" /></li>
	  <li><img width="100%" height="100%" src="images/no-photo1.png" /></li>
	  <li><img width="100%" height="100%" src="images/no-photo.png" /></li> -->
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
		$('.bxslider').bxSlider();
		});
	</script>
	<div id="short_text_m">1985 geboren, 2002 zum Mediengestalten ausgelbited. Gesmanter Kick. Blindtext uber der Indermenhen. Genau 256 Zeichen. Danach wird ein weiter Button erzegut under de text muss  <button id="weiter">weiter</button></div>
	<script type="text/javascript">
			$("#weiter").click(function() {			
				 window.open('mini_site.html');
			});
		</script>
	
	
	<div id="footer_m"> 
		<div id="firm_name_m"> Frimenname & co.KG </div>
		<div id="firm_address_m"> Strabe and Hausnummer 12345 ABC </div>
		<div id="firm_place_m"> 12345666 Ortsname </div>
	</div>
</body>
</html>