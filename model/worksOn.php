<?php require_once($_SERVER['DOCUMENT_ROOT'].'/helper/connect.php');

function getWorksOnFields(){
	global $dbConnection;
	if(!$result = $dbConnection->query("SHOW COLUMNS FROM WorksOn")) {
		echo 'Could not run query: ' . $dbConnection->error;
	}
	$ret = convertToRowArray($result);
	$ret=array_filter($ret,function($f){
		if($f->Field=="date_created"){
			return false;
		}
		return true;
	});
	return $ret;
}

function getAllWorksOn(){
	global $dbConnection;
	if(!$result = $dbConnection->query("SELECT * FROM WorksOn")) {
		echo 'Could not run query: ' . $dbConnection->error;
	}
	return convertToRowArray($result);
}


function addWorksOn($data) {
	global $dbConnection;

	foreach($data as $key => $value) {
		if(isset($value)) {
			$data[$key] = str_replace(array("'", '"', ';', ':'), '', $value);
		}
	}
	if(errorcheckWorksOnData($data) == 0) {
		return 0;
	}

	$essn = mysql_escape_string($data['Essn']);
	$pno = mysql_escape_string($data['Pno']);
	$hours = mysql_escape_string($data['Hours']);
	$userid = mysql_escape_string($data['userid']);
	

	$queryString = "INSERT INTO WorksOn (Essn, Pno, Hours, userid) 
		VALUES ('$essn', '$pno', '$hours', '$userid')";
	//print $queryString;
	if(!$dbConnection->query($queryString)) {
			echo 'Could not run query: '.$dbConnection->error;
			return 0;
	}
	echo 'User successfully created';
	return 1;
}

function errorcheckWorksOnData($data) {

	$ssn = $data['Essn'];
	$userid = mysql_escape_string($data['userid']);

	$errorString = '';
	$errorCode = 0;
	
	if (!(is_numeric($ssn)) || strlen($ssn) != 9) {
		$errorCode = 1;
		$errorString .= '<p>bad SSN, must be numeric value between 100 000 000 and 999 999 999</p>';
	}
	if(strlen($userid) < 2) {
		$errorCode = 1;
		$errorString .= '<p>Invalid userid</p>';
	}


	if ($errorCode == 1) {
		print $errorString;
		return 0;
	} else {
		return 1;
	}
}

?>