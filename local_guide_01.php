<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title> Local Guide </title>
	<?php
		include '/php/Mobile_Detect.php';
		$detect = new Mobile_Detect();
		/* echo $detect->getUserAgent(); */
		if ($detect->isMobile() or $detect->isTablet())
			echo '<link rel="stylesheet" type="text/css" href="css/css_mobile.css" />';
		else
			echo '<link rel="stylesheet" type="text/css" href="css/css_desktop.css" />';
	?>
	<!-- <link rel="stylesheet" type="text/css" href="css_desktop.css" media='screen and (min-width: 981px)' />
	<link rel="stylesheet" type="text/css" href="css_mobile.css" media='screen and (min-width: 200px) and (max-width: 980px)' /> -->
	<!-- <link rel="stylesheet" href="css_mobile.css"> -->
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/jquery-ui-1.10.3.custom.js"></script>
	<script src="js/geolocation.js"> </script>
	<!-- <script src="js/detection.js"> </script> -->
</head>
<body onload="init()" >

	<div id="div_mobile" >
		<header id="top_header_m">
			<div id="top_header_div_m">	
				<div id="arrow_m">
					<image id="arrow_canvas_m" width="50" height="50" src="images/arrow.png"></image>
				</div>
				<div id="current_location_m"> Aktueller Standort</div>
				<div id="search_bar_m"><input  id="input_search_bar_m" type="text"   value="Current location..." /></div>	
			</div>
		</header>
	
		<div id="solid_lin_m"></div>
	
		<div id="menu_m">
			<div id="link_list_div_div_m">
				<div id="side_menu_m">Menu:</div>
				<form name="login_form_m" action="test.html" method="post">
					<div>
						<div id="email_m">
							<input  id="input_email_m" type="text" value="E-Mail-Adresse"
								onfocus="if(this.value == 'E-Mail-Adresse') {this.value=''}" 
								onblur="if(this.value == ''){this.value = 'E-Mail-Adresse'}" />
						</div>
					</div>
					<div id="space_pass_and_email_m"></div>
					<div>
						<div id="pass_m">
							<input  id="input_pass_m" type="text" value="Passwort" 
								onfocus="if(this.value == 'Passwort') {this.value=''}" 
								onblur="if(this.value == ''){this.value = 'Passwort'}" />
						</div>
					</div>
					<!-- <input id="submit_form_m" type="submit_m" style="position: absolute; height: 0px; width: 0px; border: none; padding: 0px;"
						  hidefocus="true" tabindex="-1" /> -->
					<input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
				
				</form>
				<div id="space_pass_and_email_m"></div>
				<div id="space_pass_and_email_m"></div>
				<div> <div id="suche_m">Suche:</div></div>
				<div><div id="erweiterte_div_m"><a href="#" id="erweiterte_m">Erweiterte Suche</a></div></div>
				<div> <div id="suche_m">Angebote:</div></div>
				<div><div id="erweiterte_div_m"><a href="#" id="erweiterte_m">Swisguide Angebote</a></div></div>
				<div id="space_pass_and_email_m"></div>
				<div> <div id="suche_m">Change language:</div></div>
				<div><div id="language_div_m"><a href="#" id="italy_m">Italy |</a> <a href="#" id="french_m">French |</a> <a href="#" id="english_m">English</a></div></div>
				<div id="space_pass_and_email_m"></div>
				<div> <div id="suche_m">Social media:</div></div>
				<div><div id="language_div_m"><a href="#" id="italy_m">Facebook |</a> <a href="#" id="french_m">Tweeter |</a> <a href="#" id="english_m">Google+</a></div></div>
				<div id="space_pass_and_email_m"></div>
				<div> <div id="suche_m">Kontakt:</div></div>
				<div><div id="language_div_m"><a href="#" id="italy_m">Support hotline |</a> <a href="#" id="french_m">Formular </a> </div></div>
			</div>
		</div>
		<div id="border_m"></div>
		<button id="openMenu_m"></button>
		<script type="text/javascript">
			$("#openMenu_m").click(function() {
					var menu = $("#menu_m");
					if ($(menu).is(":visible")) {
						
						$(menu).animate({width: 0}, 1000, function() {$(menu).hide();});
					} else {
						$(menu).show().animate({width: 600}, 1000); 
					}
			});	
		</script>
		<!-- <script src="js/jquery_d_slide.js"></script> -->
		
		<div id="div_flash_m">
			<div id="div_flash1_m">
				<div id="canvas_div_m">
					<image id="casnvas_text_m" width="800" height="350" src="images/picture.png"></image>
				</div>
				<div id="div_below_canvas_m">
					<div id="edittext_m">
						<input type="search"  id="search_mobile_m">
					</div>
					<div id="batons_group_m">
						<div id="button_suche_div_m">
							<button id="button_suche_m" type="button" > <div id="div_suche_m"> Suche</div></button >
						</div>
						<div id="button_auf_karate_div_m">
							<button id="button_auf_karate_m" type="button"> <div id="div_auf_karate_m"> Auf Karate anzeigen</div></button >
						</div>
					</div>
				
					<div id="button_solo_m">
						<button id="umkreissuche_m" type="button">  <div id="div_umkreissuche_m"> Umkreissuche</div></button >
					</div>
				</div>
			</div>
			
		</div>
	</div>	

	<div id="div_desktop" >
		<div id="solid_line_d"/>
			<div id="menu_d">
				<div id="link_list_div_div_d">
					<div id="side_menu_d">Menu:</div>
					<form name="login_form_d" action="test.html" method="post">
						<div>
							<div id="email_d">
								<input  id="input_email_d" type="text" value="E-Mail-Adresse"
									onfocus="if(this.value == 'E-Mail-Adresse') {this.value=''}" 
									onblur="if(this.value == ''){this.value = 'E-Mail-Adresse'}" />
							</div>
						</div>
						<div id="space_pass_and_email_d"></div>
					<div>
						<div id="pass_d">
							<input  id="input_pass_d" type="text" value="Passwort" 
								onfocus="if(this.value == 'Passwort') {this.value=''}" 
								onblur="if(this.value == ''){this.value = 'Passwort'}" />
						</div>
					</div>
					<input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
				
					</form>
					<div id="space_pass_and_email_d"></div>
					<div id="space_pass_and_email_d"></div>
					<div> <div id="suche_d">Suche:</div></div>
					<div><div id="erweiterte_div_d"><a href="#" id="erweiterte_d">Erweiterte Suche</a></div></div>
					<div> <div id="suche_d">Angebote:</div></div>
					<div><div id="erweiterte_div_d"><a href="#" id="erweiterte_d">Swisguide Angebote</a></div></div>
					<div id="space_pass_and_email_d"></div>
					<div> <div id="suche_d">Change language:</div></div>
					<div><div id="language_div_d"><a href="#" id="italy_d">Italy |</a> <a href="#" id="french_d">French |</a> <a href="#" id="english_d">English</a></div></div>
					<div id="space_pass_and_email_d"></div>
					<div> <div id="suche_d">Social media:</div></div>
					<div><div id="language_div_d"><a href="#" id="italy_d">Facebook |</a> <a href="#" id="french_d">Tweeter |</a> <a href="#" id="english_d">Google+</a></div></div>
					<div id="space_pass_and_email_d"></div>
					<div> <div id="suche_d">Kontakt:</div></div>
					<div><div id="language_div_d"><a href="#" id="italy_d">Support hotline |</a> <a href="#" id="french_d">Formular </a> </div></div>
				</div>
			</div>
		<div id="border_d"></div>
		<button id="openMenu_d"></button>
		<script type="text/javascript">
			$("#openMenu_d").click(function() {
					var menu = $("#menu_d");
					if ($(menu).is(":visible")) {
						
						$(menu).animate({width: 0}, 1000, function() {$(menu).hide();});
					} else {
						$(menu).show().animate({width: 600}, 1000); 
					}
			});	
		</script>
		<!-- <script src="js/jquery_d_slide.js"></script> -->

		<div id="div_flash_d">
			<div id="edittext_div_d">	
				<div id="edittext_d">
					<input type="input"  id="search_desktop_d" value="dein Standort..."
						onfocus="if(this.value == currentLocation) {this.value=''; this.style.color = 'black';}" 
						onblur="if(this.value == ''){this.value = currentLocation; this.style.color = 'gray';}" >
				</div>
			</div>
			<div id="canvas_div_d">
				<image id="casnvas_text_d" width="400" height="150" src="images/picture_d_jquery.png"></image>
			</div>
			<div id="anmelden_and_sprache_d">
				<div id="language_div_d"><a href="#" id="anmelden_d">Anmelden</a> | <a href="#" id="sprache_d">Sprache </a> </div>
			</div>	
		</div> 
	</div> 

</body>