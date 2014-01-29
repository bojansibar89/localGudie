<!doctype html>
<?php 
	session_start();
?>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title> Local Guide </title>
	<script type="text/javascript">
		var is_touch_device = 'ontouchstart' in document.documentElement;		
		var $ = document; 
		var cssId = 'myCss';
		if (!$.getElementById(cssId))
		{
			var head  = $.getElementsByTagName('head')[0];
			var link  = $.createElement('link');
			link.id   = cssId;
			link.rel  = 'stylesheet';
			link.type = 'text/css'; 
			
			if(is_touch_device)
				link.href = 'css/css_mobile.css';
			else
				link.href = 'css/css_desktop.css';
			
			link.media = 'all';
			head.appendChild(link);
		}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
	
	<script>
	function showMap(){
		var map_canvas = $("#map_canvas_m");
			if ($(map_canvas).is(":visible")) {			
				$(map_canvas).animate({width: 0}, 0, function() {$(map_canvas).hide();});
			} else {
				$(map_canvas).show().animate({width: 800}, 0); 
			}
		
	}
	</script>
	
	<script>
		function initErrorMessage() {
			document.getElementById('login_form_d').onsubmit=function() {
				alert('123333333');
				/* var login_success=<?php echo $_SESSION["loginsuccess"]; ?>;
				alert(login_success);
				if (login_success==0)
					document.getElementById('login_form_d').target = '_top';
				if (login_success==1) */
					document.getElementById('login_form_d').target = 'error_message';
			}
		}
		
		function start(){
			/* initErrorMessage(); */
			init();
		}
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript">
	 
	$(function() {
	 
		$(".search_button").click(function() {
			var div_below_canvas = $("#div_below_canvas_m");
			var gray_line = $("#gray_line_m");
			var map_canvas = $("#map_canvas_m");
			var back_button = $("#back_button_m");
			var suche_result = $("#suche_result_m");
			var white_line = $("#white_line_m");
			var seaech_result_text = $("#seaech_result_text_m");
			var search_mobile = $ ("#search_mobile_m");
			//seaech_result_text.contents().filter(function(){return this.nodeType === 3;})​.remove();​
			
			//seaech_result_text.text("1109 Treffer zur Suche" + " \"" + search_mobile.val() + "\"" )
			white_line.hide();
			back_button.show();
			div_below_canvas.hide();
			map_canvas.hide();
			gray_line.css("top", "450px");
			suche_result.show();
			suche_result.css("top", "520px");
			seaech_result_text.show();
			$('#map_close_m').hide();
			$("#seaech_result_text_m").show();
		
		
		
			// getting the value that user typed
			var searchString    = $("#search_mobile_m").val();
			// forming the queryString
			var data            = 'search='+ searchString;
			 
			// if searchString is not empty
			if(searchString) {
				// ajax call
				$.ajax({
					type: "POST",
					url: "php/doSearch.php",
					data: data,
					beforeSend: function(html) { // this happens before actual call
						$("#load_search").css('display','block');
						$("#results").html(''); 
						$("#searchresults").show();
						$(".word").html(searchString);
				   },
				   success: function(html){ // this happens after we get results
						$("#load_search").hide();
						$("#results").show();
						$("#results").append(html);
						//alert(html);
						//var hight_100 = $( document ).height();
						//var temp_hight_100 = hight_100 + 50;
						$("#footer").css('top', 2000 + 'px');
				  }
				});    
			}
			return false;
			
		});
	});
</script>
	
	
	<!-- <link rel="stylesheet" type="text/css" href="css_desktop.css" media='screen and (min-width: 981px)' />
	<link rel="stylesheet" type="text/css" href="css_mobile.css" media='screen and (min-width: 200px) and (max-width: 980px)' /> -->
	<!-- <link rel="stylesheet" href="css_mobile.css"> -->
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/jquery-ui-1.10.3.custom.js"></script>
	<script src="js/geolocation.js"> </script>
	
	<script src="js/jquery.bxslider.min.js"></script>
	<link href="css/jquery.bxslider.css" rel="stylesheet" />
	<!-- <script src="js/detection.js"> </script> -->
</head>
<body onload="start();" >

	<div id="div_mobile" >
		<header id="top_header_m">
			<div id="top_header_div_m">	
				<div id="arrow_m">
					<image id="arrow_canvas_m" width="50" height="50" src="images/arrow.png"></image>
				</div>
				<div id="current_location_m"> Aktueller Standort</div>
				<div id="search_bar_m"><input  readonly="readonly" id="input_search_bar_m" type="text"   value="Current location..." /></div>	
			</div>
		</header>
	
		<div id="solid_line_m"></div>
	
		<div id="menu_m">
			<div id="link_list_div_div_m">
				<div id="side_menu_m">Anmelden:</div>
				<form id="login_form_m" action="" method="post">
					<div>
						<div id="email_m">
							<input  id="input_email_m" name="input_email_m"type="text" placeholder="E-Mail-Adresse" />
						</div>
					</div>
					<div id="space_pass_and_email_m"></div>
					<div>
						<div id="pass_m">
							<input  id="input_pass_m" name="input_pass_m" type="text" placeholder="Passwort" />
						</div>
					</div>
					<input class="login_button" type="submit" value="Anmelden"/>
				</form>
				<iframe id="error_message_m" style="width: 400px; height: 40px;"></iframe>
				<script>
						$("#login_form_m").submit(function() {
							var formData = $("#login_form_m").serialize();
							$.ajax({
							  type: "POST",  
							  url: "php/checklogin.php",  
							  data: formData,  
							  success: function(res) {  
								if(res=='0')
									document.getElementById('error_message_m').contentWindow.document.body.innerHTML = '<label class="label_message">Wrong username or password!</label>';
								else if(res=='2')
									document.getElementById('error_message_m').contentWindow.document.body.innerHTML = '<label class="label_message">You must enter username and password!</label>';
								else
									window.location = 'test.php';
							  }  
							});
							return false; // stop default form submit because we're using ajax
						});
				</script>
				<!-- <div id="space_pass_and_email_m"></div> -->
				<!-- <div id="space_pass_and_email_m"></div> -->
				<script type="text/javascript">
					function alertIt(){
						var div_below_canvas = $("#div_below_canvas_m");
						var gray_line = $("#gray_line_m");
						var map_canvas = $("#map_canvas_m");
						var back_button = $("#back_button_m");
						var suche_result = $("#suche_result_m");
						var white_line = $("#white_line_m");
						var seaech_result_text = $("#seaech_result_text_m");
						white_line.show();
						back_button.hide();
						div_below_canvas.show();
						map_canvas.hide();
						$('#map_close_m').hide();
						gray_line.css("top", "720px");
						suche_result.hide();
						seaech_result_text.text("");
						seaech_result_text.hide();
						var map_canvas = $('#map_canvas_m');
						map_canvas.hide();
						$(map_close_m).hide();						
						$("#menu_m").hide();
						$("#search_mobile_m").focus();
					}
				</script>
				<div> <div id="suche_m">Suche:</div></div>
				<div><div id="erweiterte_div_m"><a href="javascript:alertIt();" id="erweiterte_m">Suche |</a> <a href="#" id="erweiterte_m">Promotionen</a></div></div>
				<div id="space_pass_and_email_m"></div>
				<div> <div id="suche_m">Angebote:</div></div>
				<div><div id="erweiterte_div_m"><a href="captcha/html-contact-form.php"  id="erweiterte_m">Produkte/Abos |</a> <a href="#" id="erweiterte_m">Services</a></div></div>
				<div id="space_pass_and_email_m"></div>
				<div> <div id="suche_m">Change language:</div></div>
				<div><div id="language_div_m"><a href="#" id="german_m">DE |</a> <a href="#" id="english_m">EN |</a> <a href="#" id="french_m">FR |</a>  <a href="#" id="italy_m">IT</a> </div></div>
				<div id="space_pass_and_email_m"></div>
				<div> <div id="suche_m">Social media:</div></div>
				<div><div id="language_div_m"><a href="https://www.facebook.com/" id="german_m">Facebook |</a> <a href="https://twitter.com/" id="french_m">Tweeter |</a> <a href="http://www.google.com/+/business/" id="english_m">Google+</a></div></div>
				<div id="space_pass_and_email_m"></div>
				<div> <div id="suche_m">Kontakt:</div></div>
				<div><div id="language_div_m"><a href="contact_captcha/html-contact-form.php" id="german_m">Support |</a> <a href="contact_captcha/html-contact-form.php" id="french_m">Beratung </a> </div></div>
			</div>
		</div>
		<script type="text/javascript">
			$("#english_m").click(function() {
					window.location.replace("language/eng/local_guide_eng.html");;
			});	
		</script>
		<script type="text/javascript">
			$("#italy_m").click(function() {
					window.location.replace("language/itl/local_guide_itl.html");;
			});	
		</script>
		<script type="text/javascript">
			$("#french_m").click(function() {
					window.location.replace("language/fr/local_guide_fr.html");;
			});	
		</script>
		
		
		<div id="border_m"></div>
		<button id="openMenu_m"></button>
		<button id="back_button_m"></button>
		<script type="text/javascript">
			$("#openMenu_m").click(function() {
					var menu = $("#menu_m");
					if ($(menu).is(":visible")) {
						
						$(menu).animate({width: 0}, 500, function() {$(menu).hide();});
					} else {
						$(menu).show().animate({width: 500}, 500); 
					}
			});	
		</script>
		<script type="text/javascript">
			$("#back_button_m").click(function() {
				var div_below_canvas = $("#div_below_canvas_m");
				var gray_line = $("#gray_line_m");
				var map_canvas = $("#map_canvas_m");
				var back_button = $("#back_button_m");
				var suche_result = $("#suche_result_m");
				var white_line = $("#white_line_m");
				var seaech_result_text = $("#seaech_result_text_m");
				white_line.show();
				back_button.hide();
				div_below_canvas.show();
				map_canvas.hide();
				$('#map_close_m').hide();
				gray_line.css("top", "720px");
				suche_result.hide();
				seaech_result_text.text("");
				seaech_result_text.hide();	
				$("#load_search").hide();				
	
			});
		</script>
		<!-- <script src="js/jquery_d_slide.js"></script> -->
		
		<div id="div_flash_m">
			<div id="div_flash1_m">
				<div id="canvas_div_m">
					<image id="casnvas_text_m" width="800" height="350" src="images/picture.png"></image>
				</div>
				<div id="div_below_canvas_m">
					<form method="post" action="php/doSearch.php">
					<div id="edittext_m">
						<input type="text" name="search" id="search_mobile_m" class='search_box'>
					</div>
					<div id="batons_group_m">
						<div id="button_suche_div_m">
							<button id="button_suche_m" type="submit" class="search_button" > <div id="div_suche_m"> Suche</div></b >
						</div>
						<div id="button_auf_karate_div_m">
							<button id="button_auf_karate_m" type="button" onClick="refreshMap()"> <div id="div_auf_karate_m"> Auf Karte anzeigen</div></button >
						</div>
					</div>
				
					<div id="button_solo_m">
						<button id="umkreissuche_m" type="button">  <div id="div_umkreissuche_m"> Umkreissuche</div></button >
					</div>
				</div>
				</form>
				
				<div id="map_canvas_m"></div>
				<image style="display:none; margin: 500px auto;" src="images/loading.gif"  id="load_search"><image>
				<div id="suche_result_m">
				<div>
						<div id="searchresults"></div>
					
						<ul id="results" class="update">
						</ul>
				</div>
				
				</div>
			</div>
			<div id="gray_line_m"></div>
			<button id="map_close_m"></button>
			
			<div id="white_line_m"></div>
			<script type="text/javascript">
				$('#map_close_m').click(function(){
					var map_canvas = $('#map_canvas_m');
					map_canvas.hide();
					$(map_close_m).hide();
				});
			</script>
			<script type="text/javascript">
				$('#button_auf_karate_m').click(function(){
					var map_canvas = $('#map_canvas_m');
					$(map_close_m).show();
					map_canvas.show();	
				});
			</script>
			
		</div>
		<script type="text/javascript">
		
		
		function changeToDesktop(){
		alert('klik');
		stl = "css/css_desktop.css";
		$('#myCss[rel=stylesheet]').attr('href', stl);
		
		}
		</script>
		<div class="footer" id="footer">
			<div id="device_div_m"><a href="#" id="moblie_m">Mobile |</a> <a href="javascript:changeToDesktop();"  id="desktop_m">Desktop |</a> <a href="#" id="tablet_m">Tablet</a></div>
			<hr />
			<div id="impresum_div_m"> <a href="#" id="impresum_m">Impresum </a> <a href="css/css_desktop.css" id="swissguide_m">swissguide.ch </a> </div>
		</div>
		<script type="text/javascript">
			$("#button_suche_m").click(function() {
				/* $("#button_suche_m").click(function() {
				var div_below_canvas = $("#div_below_canvas_m");
				var gray_line = $("#gray_line_m");
				var map_canvas = $("#map_canvas_m");
				var back_button = $("#back_button_m");
				var suche_result = $("#suche_result_m");
				var white_line = $("#white_line_m");
				var seaech_result_text = $("#seaech_result_text_m");
				var search_mobile = $ ("#search_mobile_m");
				//seaech_result_text.contents().filter(function(){return this.nodeType === 3;})​.remove();​
				
				seaech_result_text.text("1109 Treffer zur Suche" + " \"" + search_mobile.val() + "\"" )
				white_line.hide();
				back_button.show();
				div_below_canvas.hide();
				map_canvas.hide();
				gray_line.css("top", "450px");
				suche_result.show();
				suche_result.css("top", "520px");
				suche_result.load('nestle.php');
				seaech_result_text.show();
				$('#map_close_m').hide();
			}); */
		</script>
			
	</div>	

	<div id="div_desktop" >
		<div id="solid_line_d"/>
			<div id="menu_d">
				<div id="link_list_div_div_d">
					<div id="side_menu_d">Anmelden:</div>
					<form id="login_form_d" action="" method="post">
						<div>
							<div id="email_d">
								<input  id="input_email_d" name="input_email_d" type="text" placeholder="E-Mail-Adresse" />
							</div>
						</div>
						<div id="space_pass_and_email_d"></div>
						<div>
							<div id="pass_d">
								<input  id="input_pass_d" name="input_pass_d" type="text" placeholder="Passwort" />
							</div>
						</div>
						<input class="login_button" type="submit" value="Anmelden"/>
					</form>
					<iframe id="error_message_d" style="width: 400px; height: 40px;"></iframe>
					<script>
						$("#login_form_d").submit(function() {
							var formData = $("#login_form_d").serialize();
							$.ajax({  
							  type: "POST",  
							  url: "php/checklogin.php",  
							  data: formData,  
							  success: function(res) {  
								if(res=='0')
									document.getElementById('error_message_d').contentWindow.document.body.innerHTML = '<label style="color: red; font-family: Calabria; font-size: 20px;" class="label_message">Wrong username or password!</label>';
								else if(res=='2')
									document.getElementById('error_message_d').contentWindow.document.body.innerHTML = '<label style="color: red; font-family: Calabria; font-size: 20px;" class="label_message">You must enter username and password!</label>';
								else
									window.location = 'test.php';
							  }  
							});
							return false; // stop default form submit because we're using ajax
						});
					</script>

					<div> <div id="suche_d">Suche:</div></div>
					<div><div id="erweiterte_div_d"><a href="#" id="erweiterte_d">Erweiterte Suche</a></div></div>
					<div id="space_pass_and_email_d"></div>
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
			
		<script type="text/javascript">
			$("#english_d").click(function() {
					window.location.replace("language/eng/local_guide_eng.html");;
			});	
		</script>
		<script type="text/javascript">
			$("#italy_d").click(function() {
					window.location.replace("language/itl/local_guide_itl.html");;
			});	
		</script>
		<script type="text/javascript">
			$("#french_d").click(function() {
					window.location.replace("language/fr/local_guide_fr.html");;
			});	
		</script>
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