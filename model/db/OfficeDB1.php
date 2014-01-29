<?php
require_once __DIR__ . '/../data/Office.php';

class OfficeDB {

	public $officeArray;
	public $err;
	
	public function __construct() {
		/* $this->param = $param; */
		
		//$db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)))(CONNECT_DATA=(SID=orcl)))" ;

		if ($c=oci_connect("ecd", "ecd", "//oratest.avensys.ch:1521/ECDP1")) {
			
			$s = oci_parse($c, "select * from office");  
			oci_execute($s);
			
			$this->officeArray = array();
			while ($res = oci_fetch_array($s)) {
				$office = new Office();
				$office->office_id = $res['OFFICEID'];
				$office->office_status = $res['OFFICESTATUS'];
				$office->company_id = $res['COMPANYID'];
				$office->office_type = $res['OFFICETYPE'];
				$office->office_name = $res['OFFICENAME'];
				$office->address = $res['ADDRESS'];
				$office->address_zip = $res['ADDRESSZIP'];
				$office->address_city_id = $res['ADDRESSCITYID'];
				$office->address_city = $res['ADDRESSCITY'];
				$office->postbox = $res['POSTBOX'];
				$office->website_url = $res['WEBSITEURL'];
				$office->website_priority = $res['WEBSITEPRIORITY'];
				$office->website_id = $res['WEBSITEID'];
				$office->representative = $res['REPRESENTATIVE'];
				$office->employees = $res['EMPLOYEES'];
				$office->agent_id = $res['AGENTID'];
				$office->last_modified = $res['LASTMODIFIED'];
				$office->office_language = $res['OFFICELANGUAGE'];
				$office->office_marketname = $res['OFFICEMARKETNAME'];
				$office->office_description = $res['OFFICEHRDESCRIPTION'];
				$office->office_keywords_german = $res['OFFICEKEYWORDSGERMAN'];
				$office->office_keywords_french = $res['OFFICEKEYWORDSFRENCH'];
				$office->office_keywords_italian = $res['OFFICEKEYWORDSITALIAN'];
				$office->office_keywords_english = $res['OFFICEKEYWORDSENGLISH'];
				array_push($this->officeArray, $office);
				/* echo $res['RUBRIC_ID'] . ', ' . $res['RUBRIC_NAME'] . "<br />"; */
			}
			
			oci_close($c);

		} else {

			$err = oci_error();

			/* echo "Connection failed." . $err[text]; */

		}
		
	}
	
	public function __construct($query) {
		/* $this->param = $param; */
		
		//$db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)))(CONNECT_DATA=(SID=orcl)))" ;

		if ($c=oci_connect("ecd", "ecd", "//oratest.avensys.ch:1521/ECDP1")) {
			
			$s = oci_parse($c, $query);  
			oci_execute($s);
			
			$this->officeArray = array();
			while ($res = oci_fetch_array($s)) {
				$office = new Office();
				$office->office_id = $res['OFFICEID'];
				$office->office_status = $res['OFFICESTATUS'];
				$office->company_id = $res['COMPANYID'];
				$office->office_type = $res['OFFICETYPE'];
				$office->office_name = $res['OFFICENAME'];
				$office->address = $res['ADDRESS'];
				$office->address_zip = $res['ADDRESSZIP'];
				$office->address_city_id = $res['ADDRESSCITYID'];
				$office->address_city = $res['ADDRESSCITY'];
				$office->postbox = $res['POSTBOX'];
				$office->website_url = $res['WEBSITEURL'];
				$office->website_priority = $res['WEBSITEPRIORITY'];
				$office->website_id = $res['WEBSITEID'];
				$office->representative = $res['REPRESENTATIVE'];
				$office->employees = $res['EMPLOYEES'];
				$office->agent_id = $res['AGENTID'];
				$office->last_modified = $res['LASTMODIFIED'];
				$office->office_language = $res['OFFICELANGUAGE'];
				$office->office_marketname = $res['OFFICEMARKETNAME'];
				$office->office_description = $res['OFFICEHRDESCRIPTION'];
				$office->office_keywords_german = $res['OFFICEKEYWORDSGERMAN'];
				$office->office_keywords_french = $res['OFFICEKEYWORDSFRENCH'];
				$office->office_keywords_italian = $res['OFFICEKEYWORDSITALIAN'];
				$office->office_keywords_english = $res['OFFICEKEYWORDSENGLISH'];
				array_push($this->officeArray, $office);
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