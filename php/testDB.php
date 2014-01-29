<?php

	/* $db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)))(CONNECT_DATA=(SID=orcl)))" ; */

	if ($c=oci_connect("ecd", "ecd", "//oratest.avensys.ch:1521/ECDP1")) {

		echo "Successfully connected to Oracle.\n";
		
		$s = oci_parse($c, "select * from agent");  
		oci_execute($s);
		/* while(($row = oci_fetch_array($s, OCI_ASSOC)) != false)
			foreach($row as $item)
				print($item);  */
		
		echo '<br/><br/>';
		while ($res = oci_fetch_array($s)) {
			echo $res['AGENTUSERID'] . ', ' . $res['AGENTPASSWORD'] . "<br />";
		}
		
		oci_close($c);

	} else {

		$err = OCIError();

		echo "Connection failed." . $err[text];

	}

?>