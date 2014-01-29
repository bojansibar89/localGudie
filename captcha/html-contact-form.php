<?php 
$your_email ='yourname@your-website.com';// <<=== update to your email address

session_start();
$errors = '';
$name = '';
$firma = '';
$visitor_email = '';
$user_message = '';

if(isset($_POST['submit']))
{
	
	$name = $_POST['name'];
	$visitor_email = $_POST['email'];
	//$user_message = $_POST['message'];
	///------------Do Validations-------------
	if(empty($name)||empty($visitor_email))
	{
		$errors .= "\n Name and Email are required fields. ";	
	}
	if(IsInjected($visitor_email))
	{
		$errors .= "\n Bad email value!";
	}
	if(empty($_SESSION['6_letters_code'] ) ||
	  strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
	{
	//Note: the captcha code is compared case insensitively.
	//if you want case sensitive match, update the check above to
	// strcmp()
		$errors .= "\n The captcha code does not match!";
	}
	
	if(empty($errors))
	{
		//send the email
		$to = $your_email;
		$subject="New form submission";
		$from = $your_email;
		$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		
		$body = "A user  $name submitted the contact form:\n".
		"Name: $name\n".
		"Email: $visitor_email \n".
		"Message: \n ".
		"$user_message\n".
		"IP: $ip\n";	
		
		$headers = "From: $from \r\n";
		$headers .= "Reply-To: $visitor_email \r\n";
		
		mail($to, $subject, $body,$headers);
		
		header('Location: thank-you.html');
	}
}

// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact Us</title>
	
<!-- define some style elements-->
<style>
.err
{
	font-family : Verdana, Helvetica, sans-serif;
	font-size : 12px;
	color: red;
}
</style>	
<link href="registration.css" rel="stylesheet" />
<!-- a helper script for vaidating the form-->
<script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>	
</head>

<body>
<?php
if(!empty($errors)){
echo "<p class='err'>".nl2br($errors)."</p>";
}
?>

<form method="POST" name="contact_form" 
action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"> 

<fieldset >
	<dl>
		<dt>
			<label for="username">Anrede *</label>
			<br>
		</dt>
		<dd>
			<input type="radio" name="sex" value="male" /> Herr
			<input type="radio" name="sex" value="female" /> Frau 
		</dd>
	</dl>
	<dl>
		<dt>
			<label for='vonname'>Vonname *: </label><br>
			<br>
		</dt>
		<dd>
			<input type="text" name="vonname" value='<?php  ?>'>
		</dd>	
	</dl>
	<dl>
		<dt>
			<label for="name">Name *</label>
			<br>
		</dt>
		<dd>
			<input type="text" name="name" size="20" maxlength="30"  value='<?php echo htmlentities($name) ?>'/>
		</dd>
	</dl>
			<dl>
				<dt>
					<label for="firma">Firma *</label>
					<br>
				</dt>
				<dd>
					<input type="text" name="firma" size="20" maxlength="30"  value='<?php echo htmlentities($name) ?>'/>
				</dd>
			</dl>
			<dl>
				<dt>
					<label for="adresse">Adresse *</label>
					<br>
				</dt>
				<dd>
					<input type="text" name="adresse" size="20" maxlength="30"  value='<?php echo htmlentities($name) ?>'/>
				</dd>
			</dl>
			<dl>
				<dt>
					<label for="postleitzahl">Postleitzahl *</label>
					<br>
				</dt>
				<dd>
					<input type="text" name="postleitzahl" size="20" maxlength="30"  value='<?php echo htmlentities($name) ?>'/>
				</dd>
			</dl>
			<dl>
				<dt>
					<label for="ort">Ort *</label>
					<br>
				</dt>
				<dd>
					<input type="text" name="ort" size="20" maxlength="30"  value='<?php echo htmlentities($name) ?>'/>
				</dd>
			</dl>
			<dl>
				<dt>
					<label for="email">EMail *</label>
					<br>
				</dt>
				<dd>
					<input type="text" name="email" size="20" maxlength="30"  value='<?php echo htmlentities($visitor_email) ?>'/>
				</dd>
			</dl>
			<dl>
				<dt>
					<label for="korrenspondenz">Korrenspondenz * </label>
					<br>
				</dt>
				<dd>
					<select name="countries"> 
					<option value="Serbia"> DE </option>
					<option value="Bosnia"> EN </option>
					<option value="Hungary"> FR </option>
					<option value="Romania"> IT </option>
					</select>
				</dd>
			</dl>
			<dl>
				<dt>
					<label for="benutzername">Benutzername *</label>
					<br>
				</dt>
				<dd>
					<input type="text" name="benutzername" size="20" maxlength="30"  value='<?php echo htmlentities($name) ?>'/>
				</dd>
			</dl>
			<dl>
				<dt>
					<label for="passwort">Passwort *</label>
					<br>
				</dt>
				<dd>
					<input type="password" name="passwort" size="20" maxlength="30"  value=''/>
				</dd>
			</dl>
			<dl>
				<dt>
					<label for="passwortbestatingung">Passwortbestatigung *</label>
					<br>
				</dt>
				<dd>
					<input type="password" name="passwortbestatingung" size="20" maxlength="30"  value='' />
				</dd>
			</dl>
			<dl>
				<dt>
					<label for="username">Bitte ubertragen Sie den Conde *</label>
					<br/>
				</dt>
				<dd>
					<img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br>
					<br/>
					<input id="6_letters_code" name="6_letters_code" type="text"></br>
					<small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>
				</dd>
	
			<br/>
			<br/>
			<br/>
			
			<input type="checkbox" name="food" value="Bacon" /> Sie mussen mit den Nutzungsbedingungen einverstaden sein *
			</dl>
</fieldset>

<!-- <p>
<label for='name'>Name: </label><br>
<input type="text" name="name" value='<?php echo htmlentities($name) ?>'>
</p>
<p>
<label for='email'>Email: </label><br>
<input type="text" name="email" value='<?php echo htmlentities($visitor_email) ?>'>
</p> 
<p>
<label for='message'>Message:</label> <br>
<textarea name="message" rows=8 cols=30><?php echo htmlentities($user_message) ?></textarea>
</p> 
<p>
<img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br> 
<label for='message'>Enter the code above here :</label><br>
<input id="6_letters_code" name="6_letters_code" type="text"><br> 
<small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small> -->
</p>
<input type="submit" value="Submit" name='submit'>
<div id='contact_form_errorloc' class='err'></div>
</form>
<script language="JavaScript">
// Code for validating the form
// Visit http://www.javascript-coder.com/html-form/javascript-form-validation.phtml
// for details
var frmvalidator  = new Validator("contact_form");
//remove the following two lines if you like error message box popups
frmvalidator.EnableOnPageErrorDisplaySingleBox();
frmvalidator.EnableMsgsTogether();

frmvalidator.addValidation("sex","selone_radio","Please provide your sex");
frmvalidator.addValidation("name","req","Please provide your name"); 
frmvalidator.addValidation("email","req","Please provide your email"); 
frmvalidator.addValidation("vonname","req","Please provide your vonname"); 
frmvalidator.addValidation("firma","req","Please provide your firma");
frmvalidator.addValidation("adresse","req","Please provide your adresse"); 
frmvalidator.addValidation("postleitzahl","req","Please provide your postleitzahl"); 
frmvalidator.addValidation("ort","req","Please provide your ort"); 
frmvalidator.addValidation("benutzername","req","Please provide your benutzername");  
frmvalidator.addValidation("passwort","req","Please provide your passwort");  
frmvalidator.addValidation("passwortbestatingung","req","Please provide your passwortbestatingung"); 
frmvalidator.addValidation("email","email","Please enter a valid email address"); 
frmvalidator.addValidation("food","shouldselchk","You must accept terms of use ");
</script>
<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
</body>
</html>