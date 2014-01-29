<?php
require_once __DIR__ . '/../data/Office.php';

class OfficeDB {

	public $officeArray;
	public $err;
	public $word;
	public $numberOfOffices;
	public $numOfPage;
	
	public function __construct($word , $numOfPage ) {
		$this->word = $word;
		$this->numOfPage = $numOfPage;
		
		if ($c=oci_connect("ecd", "ecd", "//oratest.avensys.ch:1521/ECDP1")) {
			//$s1 = oci_parse($c, "SELECT count(*) AS n FROM OFFICE WHERE OFFICENAME LIKE '" . $word . "%'");  
			//oci_execute($s1); 
			$stmt= oci_parse($c, "SELECT count(*) AS NUMBER_OF_ROW FROM OFFICE WHERE upper(OFFICENAME) LIKE upper('" . $word . "%')");
			oci_define_by_name($stmt, 'NUMBER_OF_ROW', $this->numberOfOffices);
			oci_execute($stmt);
			oci_fetch($stmt);
			
			//echo $this->numberOfOffices;
			$r_min=$numOfPage*10;
			$r_max= $r_min +10 ;
			//$s = oci_parse($c, "SELECT * FROM OFFICE WHERE OFFICENAME LIKE '" . $word . "%'");
			$s = oci_parse($c, "select * from ( select m.*, rownum r from office m where upper(officename) like upper('" . $word . "%')) where r >".$r_min." and r <= ".$r_max."");
			oci_execute($s);
			
			$this->officeArray = array();
			while ($res = oci_fetch_array($s)) {
				$office = new Office();
				$office->office_id = $res['OFFICEID'];
				$office->office_name = $res['OFFICENAME'];
				$office->office_address = $res['ADDRESS'];
				$office->office_zip = $res['ADDRESSZIP'];
				$office->office_description = $res['DESCRIPTIONGERMAN'];
				array_push($this->officeArray, $office);
			}
			
			oci_close($c);

		} else {

			$err = oci_error();

			 echo "Connection failed." . $err[text]; 

		}
		
	}
	
	

}
?>