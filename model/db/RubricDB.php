<?php
require_once __DIR__ . '/../data/Rubric.php';

class RubricDB {

	public $rubricArray;
	public $err;
	
	public function __construct() {
		/* $this->param = $param; */
		
		//$db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)))(CONNECT_DATA=(SID=orcl)))" ;

		if ($c=oci_connect("ecd", "ecd", "//oratest.avensys.ch:1521/ECDP1")) {
			
			$s = oci_parse($c, "select * from rubric");  
			oci_execute($s);
			/* while(($row = oci_fetch_array($s, OCI_ASSOC)) != false)
				foreach($row as $item)
					print($item);  */
			
			/* echo '<br/><br/>'; */
			
			$this->rubricArray = array();
			while ($res = oci_fetch_array($s)) {
				$rubric = new Rubric();
				$rubric->rubric_id = $res['RUBRIC_ID'];
				$rubric->rubric_name = $res['RUBRICGERMAN'];
				array_push($this->rubricArray, $rubric);
				/* echo $res['RUBRIC_ID'] . ', ' . $res['RUBRIC_NAME'] . "<br />"; */
			}
			
			oci_close($c);

		} else {

			$err = oci_error();

			/* echo "Connection failed." . $err[text]; */

		}
		
	}

}
?>