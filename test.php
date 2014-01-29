<!doctype html>
<?php session_start(); ?>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title> Mein Konto </title>
	<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.css">
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/jquery-ui-1.10.3.custom.js"></script>
	<link rel="stylesheet" href="css/test.css">
	<link href="lib/jquery-filestyle/css/jquery-filestyle.min.css" rel="stylesheet" />
	<!-- <script src="geolocation.js"> </script>
	<script src="js_mobile.js"> </script> -->
	<script>
	  $(function() {
		$("#accordion").accordion({
			active: false,
			collapsible: true,
			heightStyle: "content",
			icons: { "header": "ui-icon-circle-triangle-e", "activeHeader": "ui-icon-circle-triangle-s"},
			header: ".accordion_header"
		});
		$( "#datepicker_von" ).datepicker();
		$( "#datepicker_bis" ).datepicker();
	  });
	</script>
	<script>
		function init() {
			document.getElementById('form_upload').onsubmit=function() {
				document.getElementById('form_upload').target = 'message_text'; //'upload_target' is the name of the iframe
			}
		}
		window.onload=init;
	</script>

</head>
<body>
	<header>
		<div id="header_div">
			
				<button id="button_back" onclick="history.go(-1);">
				</button>
			<button id="button_three_lines">
				</button>
			<div id="images_div">
				<div id="header_image_div_local_guide">
					<image src="images/localguide_3.png" id="image_localguide">
					</image>
				</div>
				<div id="header_image_div_main_conto">
					<image src="images/mein konto_3.png" id="image_main_conto" >
					</image>
				</div>
			</div>
			
		</div>
	<header>
	<script type="text/javascript">
		$("#button_three_lines").click(function() {
				var menu = $("#side_menu_m");
				if ($(menu).is(":visible")) {	
					$(menu).animate({width: 0}, 500, function() {$(menu).hide();});
				} else {
					$(menu).show().animate({width: 300}, 500); 
				}
		});	
	</script>
	
	<div id="side_menu_m">
		<ul>
			<li>NEWS</li>
			<li>SHOP</li>
			<li>HOTLINE</li>
			<li>PRODUCTS</li>
			<li id="logout">logout</li>
		</ul>
	</div>
	
	<div style="position:relative">
	<section>
		<div id="username_and_datum">
			<div id="anmelden_div" class="user"> 
				<div id="anmelden"> Anmelden: </div>
				<div id="username"> <?php if(isset($_SESSION["email"]))echo $_SESSION["email"]; ?> </div>
			</div>
			<div id="letzte_div" class="user">
				<div id="letzte"> Letzte Aktivität:	</div>
				<div id="datum"> 01.12.2013. </div>
			</div>
		</div>
	</section>
	
	<section>
	<div id="separator">
	</div>
	
	<!-- <div id="buttons">
		<div id="button_1_div">
			<button id="button_1">
				<div>Button1
				</div>
			</button>
		</div>
		<div id="button_2_div">
			<button id="button_2">
				<div>Button2
				</div>
			</button>
		</div>
		<div id="button_3_div">
			<button id="button_3">
				<div>Button3
				</div>
			</button>
		</div>
	</div> -->
	
	<div id="accordion">
	
		<div id="header_div_00" class="accordion_header">
			<h3>Meine Firmeneinträge</h3>
			
		</div>
		<div >
			<div><image style="margin-left: -40px; margin-top: -10px; float: left" width= 40; height = 40; src="images/accord_pic.png"></image><label  id="name_street_zip">Meine Firmeneinträge</label><hr id="hr_big"/></div>
			<div style="position: relative; display: block;"><div id="help_div"><label  id="name_street_zip">Permadent, 1950 Sion Rue du Grand-Pont 34</label></div> <label  id="firm_id">ID *********</label></div>
			<br/>
			<div><br/><hr id="hr_small" /><label class="lab1">Firmenangaben editeren</label> <label class="lab2">AboTyp</label> <label class="lab3">Verfalisdatum</label> <label class="lab4">Status</label></div>
			
			<div><br/><hr id="hr_small" /><label class="lab1">Statistik/Kontaktnfragen ansehen</label></div>
			<br/><hr/>
		</div>
		
		<div id="header_div_01" class="accordion_header">
			<h3>Firmenangaben editieren</h3>
		</div>
		<div>
			<p>
				Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
				ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
				amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
				odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
			</p>
		</div>
		
		<div id="header_div_02" class="accordion_header">
			<!-- <div id="separator_h01_h02"></div> -->
			<h3>News verwalten</h3>
		</div>
		<div id="news_verwalten_div">
			<form name="news_verwalten_form">
				<div id="news_verwalten_form_div">
					 <div class="form-element">
						  <label for="news_title_readonly">Title</label>
						  <input readonly id="news_title_readonly" type="text" placeholder="News title...">
					 </div>
					 <div class="form-element">
						  <label for="news_text_readonly">Text</label>
						  <textarea readonly id="news_text_readonly" style="resize:none" rows="4" cols="50" placeholder="News text..."></textarea>
					 </div>
					 <div class="form-element">
						  <label for="news_beschreibung_readonly">Beschreibung</label>
						  <textarea readonly id="news_beschreibung_readonly" style="resize:none" rows="4" cols="50" placeholder="News beschreibung..."></textarea>
					 </div>
					 <a type="button" style="text-decoration:underline">News editieren</a>​
					 |
					 <a type="button" style="text-decoration:underline">News löschen</a>
				</div>
		   </form>
		</div>
		
		<div id="header_div_03" class="accordion_header">
			<!-- <div id="separator_h02_h03"></div> -->
			<h3>Neue news aufschalten</h3>
		</div>
		<div id="news_aufschalten_div">
			<!-- <form name="news_aufschalten_form"> -->
				<div id="news_aufschalten_form_div">
					<div class="form-element">
						<label for="news_title">Title</label>
						<input id="news_title" type="text" placeholder="News title...">
					</div>
					<div class="form-element">
						<label for="news_text">Text</label>
						<textarea id="news_text" rows="4" cols="50" placeholder="News text..."></textarea>
					</div>
					<div class="form-element">
						<label for="news_beschreibung">Beschreibung</label>
						<textarea id="news_beschreibung" rows="4" cols="50" placeholder="News beschreibung..."></textarea>
					</div>
					<div class="label">
						<label id="bilder">Bilder</label>
					</div>
					<div class="picture">
						<div class="loading" id="loader" style="display:none;">
							<image id="loading_image" width="100%" height="100%" src="images/loading.gif"></image>
						</div>
						<image id="news_picture" width="100%" height="100%" src="images/no-photo.png"></image>
					</div>
					<div class="links">
						<div id="upload_pic_01">
							<input id="upload" type="file" style="display:none;" />
							<input type="button" class="button_link" id="upload_link" value="Bilder hochladen" />
							|
							<input type="button" class="button_link" value="Bilder loschen"/>
							<script>
								$(function(){
									$("#upload_link").on('click', function(e){
										if(document.getElementById('upload_pic_02').style.display == "none")
											document.getElementById('upload_pic_02').style.display = "block";
										else
											document.getElementById('upload_pic_02').style.display = "none";
											
										if (navigator.userAgent.match(/(Android (1.0|1.1|1.5|1.6|2.0|2.1))|(Windows Phone (OS 7|8.0))|(XBLWP)|(ZuneWP)|(w(eb)?OSBrowser)|(webOS)|(Kindle\/(1.0|2.0|2.5|3.0))/)) {
											document.getElementById('form_upload_div').style.display = "none";
											document.getElementById('message_text').contentWindow.document.body.innerHTML = 
												'<label style="display:block;color:red;text-align:center;">Datei-Upload ist auf diesem Gerät nicht unterstützt!</label>';
										} 
									});
								});
							</script>
						</div>
						<div id="upload_pic_02" style="display:none;">
							<div id="form_upload_div">
								<form id="form_upload" action="php/ajaximage.php" enctype="multipart/form-data" method="post">
									<label>Dateinamen:</label>
									<input type="file" id="upload_file" name="upload_file" class="jfilestyle" 
										   data-size="300px" data-buttonText="Datei auswählen" onchange="readURL(this);" 
										   accept="image/x-png, image/gif, image/jpeg" >
									<output id="filesInfo"></output>
									<input type="submit" class="button_link" id="hochladen" value="Hochladen" />
									<iframe id="upload_target" name="upload_target" src="" style="width:0;height:0;border:0px solid #fff;"></iframe>
								</form>
								<script>
									function readURL(input) {
										if (input.files && input.files[0]) {
											var reader = new FileReader();

											reader.onload = function (e) {
												$('#news_picture')
													.attr('src', e.target.result)
													.width(500)
													.height(400);
											};
										reader.readAsDataURL(input.files[0]);
										}
									}
									$(function(){
										$('#hochladen').click(function(){
											var imgVal = $('#upload_file').val(); 
											if(imgVal!='') 
											{
												document.getElementById('loader').style.display = "block";
											}
										});
									});
								</script>
								<!-- <script language="javascript">
										$(function(){
											$('#hochladen').click(function(){
												var fd = new FormData();
												fd.append( "upload_file", $("#upload_file")[0].files[0]);
												$.ajax({
												  type: "POST",
												  url: "php/upload01.php",
												  data: { 'upload_file': testscore }
												})
												  .done(function( msg ) {
													alert( "Data Saved: " + msg );
												  });
											});

										});
								</script> -->
								
							<!-- 	<script>
									$('#submit').click(function(){
										$.ajax({
											url: upload01.php,
											type:'POST',
											data: {
												email: email_address,
												message: message
											},
											success: function(msg){
													alert('file uploaded');
												}                   
											});
										}
									});
								</script> -->
							</div>
							<iframe id="message_text" style="width: 400px; height: 40px;"></iframe>
							<script>
								document.getElementById('message_text').onload = function() {
									document.getElementById('loader').style.display = "none";
								};
							</script>
						</div>
					</div>
					<div class="form-element">
						<label for="laufzeit_von">Laufzeit von</label>
						<input id="datepicker_von" type="text" placeholder="Datum von...">
					</div>
					<div class="form-element">
						<label for="laufzeit_bis">Laufzeit bis</label>
						<input id="datepicker_bis" type="text" placeholder="Datum bis...">
					</div>
					<div class="form-element">
						<label for="rubriken">Rubriken</label>
						<select id="rubriken_message">
							<option value="" selected="selected"></option>
							<?php 
								include('model/db/RubricDB.php');
								include('model/data/Rubric.php');
								$rubricDB = new RubricDB();
								
								for ($i = 0; $i < count($rubricDB->rubricArray); ++$i) {
									$rubric = $rubricDB->rubricArray[$i];
									/* print $rubric->rubric_name; */
									echo '<option value="1">'.$rubric->rubric_name.'</option>';
								}
							?>
							<option value="1">Rubrik 1</option>
							<option value="2">Rubrik 2</option>
							<option value="2">Rubrik 3</option>
						</select>
					</div>
				
					<div id="news_aufschalten_buttons_div" class="submit">
						<input class="save" type="button" value="Speichern" />
						<input type="button" value="Abbrechen" />
					</div>
				</div>
			<!-- </form> -->
		</div>
	</div>
	</section>
	</div>
<!-- 	<form id="form_upload" action='php/ajaximage.php' method='POST' enctype='multipart/form-data'>
		<input type='file' name='upload_file'><br>
		<input type='submit' name='upload_btn' value='upload'>
	</form>
	<script type="text/javascript">
		$(document).ready(function() { 
			$('#upload_file').live('change', function() { 
				$("#picture").html('');
				$("#picture").html('<img src="loader.gif" alt="Uploading...."/>');
				$("#form_upload").ajaxForm( {
					target: '#picture'
				}).submit();
			});
		}); 
	</script> -->
	<!-- <script type="text/javascript" src="lib/jquery-form/jquery.min.js"></script> -->
	
	<script type="text/javascript" src="js/validation.js"></script>
	<script type="text/javascript" src="lib/jquery-form/jquery.form.js"></script>
	<script type="text/javascript" src="lib/jquery-filestyle/js/jquery-filestyle.min.js"></script>
</body>