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

function getEmployeeObject($employeeSSN) {
	global $dbConnection;
	if(!$result = $dbConnection->query("SELECT * FROM Employee WHERE SSN = $employeeSSN")) {
		echo 'Could not run query: ' . $dbConnection->error;
		return;
	}
	return $result->fetch_object();
}

function updateEmployee($data) {
	global $dbConnection;

	$fName = mysql_escape_string($data['Fname']);
	$minit = mysql_escape_string($data['Minit']);
	$lName = mysql_escape_string($data['Lname']);
	$ssn = $data['SSN'];
	$address = mysql_escape_string($data['Address']);
	$sex = mysql_escape_string($data['Sex']);
	$salary = $data['Salary'];
	$superSSN = $data['Super_ssn'];
	$dNo = $data['Dno'];
	$bDate = $data['BDate'];
	$empDate = $data['EmpDate'];
	$userid = mysql_escape_string($data['userid']);

	$queryString = "UPDATE EMPLOYEE SET (Fname, Minit, Lname, SSN, Address, Sex, Salary, Super_ssn, Dno, BDate, EmpDate, userid) 
		VALUES (`$fName`, `$minit`, `$lName`, $ssn, `$address`, `$sex`, $salary, $superSSN, $dNo, $bDate, $empDate, `$userid`)
		WHERE SSN = $employeeSSN";
	print $queryString;
	if(!$result = $dbConnection->query($querySting)) {
			echo 'Could not run query: ' . $dbConnection->error;
			return 0;
	}
	return 1;

}

?>