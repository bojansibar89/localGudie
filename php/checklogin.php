<?php
session_start();
 
// Connect to server and check for errors.
/* $db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)))(CONNECT_DATA=(SID=orcl)))" ; */
$conn = oci_connect("ecd", "ecd", "//oratest.avensys.ch:1521/ECDP1");

if (!$conn) {
   $e = oci_error();
   print htmlentities($e['message']);
   exit;
}

if(isset($_POST['input_email_d']) and isset($_POST['input_pass_d'])){					

	// username and password sent from form
	$email=$_POST['input_email_d'];
	$password=$_POST['input_pass_d'];
}

if(isset($_POST['input_email_m']) and isset($_POST['input_pass_m'])){					

	// username and password sent from form
	$email=$_POST['input_email_m'];
	$password=$_POST['input_pass_m'];
}

	if(!empty($email) and !empty($password)){

		$query="SELECT * FROM agent WHERE email='".$email."' and agentpassword= '".$password."' ";
		
		$stid = oci_parse($conn, $query);

		//oci_bind_by_name($stid, ":us", $username);
		//oci_bind_by_name($stid, ":pw", $password);

		$result=oci_execute($stid);

		// Mysql_num_row is counting table row
		/* $count=oci_num_rows($stid); */
		
		$count = oci_fetch_all($stid, $res);
		
		// If result matched $myusername and $mypassword, table row must be 1 row

		if($count==1){

			// Register $myusername, $mypassword and redirect to file "login_success.php"
			$_SESSION["email"]=$email;
			$_SESSION["password"]=$password;
			/* $_SESSION["loginsuccess"]='uspesno'; */
			/* echo $_SESSION["loginsuccess"]; */
			/* header("Location: ../test.php"); */
			/* echo '<script> window.location = "test.php" </script>'; */
			echo '1';
		} else if ($count==0){
			/* $_SESSION["loginsuccess"]='neuspesno'; */
			echo '0';
		}
	} else {
		echo '2';
	}

?>