<?php require_once($_SERVER['DOCUMENT_ROOT'].'/helper/connect.php');

function getEmployeeFields(){
	global $dbConnection;
	if(!$result = $dbConnection->query("SHOW COLUMNS FROM Employee")) {
		echo 'Could not run query: ' . $dbConnection->error;
	}

	return convertToRowArray($result);
}

function getAllEmpoyee(){
	global $dbConnection;
	if(!$result = $dbConnection->query("SELECT * FROM Employee")) {
		echo 'Could not run query: ' . $dbConnection->error;
	}
	return convertToRowArray($result);
}

?>