<?php require_once($_SERVER['DOCUMENT_ROOT'].'/helper/connect.php');

function getDependentFields(){
	global $dbConnection;
	if(!$result = $dbConnection->query("SHOW COLUMNS FROM Dependent")) {
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

function getAllNewDependent(){
	global $dbConnection;
	if(!$result = $dbConnection->query("SELECT * FROM Dependent WHERE date_created > 0")) {
		echo 'Could not run query: ' . $dbConnection->error;
	}
	return convertToRowArray($result);
}

function addDependent($data) {
	global $dbConnection;

	foreach($data as $key => $value) {
		if(isset($value)) {
			$data[$key] = str_replace(array("'", '"', ';', ':'), '', $value);
		}
	}
	if(errorcheckDependentData($data) == 0) {
		return 0;
	}

	$essn = mysql_escape_string($data['Essn']);
	$depName = mysql_escape_string($data['Dependent_name']);
	$sex = mysql_escape_string($data['Sex']);
	$bDate = $data['Bdate'];
	$relationship = $data['Relationship'];
	$userid = mysql_escape_string($data['userid']);
	

	$queryString = "INSERT INTO Dependent (Essn, Dependent_name, Sex, Bdate, Relationship, userid) 
		VALUES ($essn, '$depName', '$sex', $bDate, '$relationship', '$userid')";
	//print $queryString;
	if(!$dbConnection->query($queryString)) {
			echo 'Could not run query: '.$dbConnection->error;
			return 0;
	}

	echo 'Dependent successfully created';
	return 1;
}

function errorcheckDependentData($data) {

	$essn = mysql_escape_string($data['Essn']);
	$depName = mysql_escape_string($data['Dependent_name']);
	$sex = mysql_escape_string($data['Sex']);
	$bDate = $data['Bdate'];
	$relationship = $data['Relationship'];
	$userid = mysql_escape_string($data['userid']);

	$errorString = '';
	$errorCode = 0;
	if(strlen($depName) < 5) {
		$errorCode = 1;
		$errorString .= '<p>Name < 5 characters</p>';
	}
	if($relationship != 'Spouse' && $relationship != 'Daughter' && $relationship != 'Son') {
		$errorCode = 1;
		$errorString .= '<p>Invalid relationship status</p>';
	}
	if (!(is_numeric($essn)) || strlen($essn) != 9) {
		$errorCode = 1;
		$errorString .= '<p>bad ESSN, must be numeric value between 100 000 000 and 999 999 999</p>';
	}
	if($sex != 'M' && $sex != 'F') {
		$errorCode = 1;
		$errorString .= '<p>invalid gender</p>';
	}
	if(!is_int(intval($bDate)) || intval($bDate) < 1900 || intval($bDate) > DATE('Y') - 13) {
		$errorCode = 1;
		$errorString .= '<p>bad birthday year, employee is either dead or too young... probably not both</p>';
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