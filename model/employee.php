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
		echo 'Could not get employee obj '.$employeeSSN.': ' . $dbConnection->error;
		return;
	}
	return $result->fetch_object();
}

function updateEmployee($data, $oldSSN) {

	foreach($data as $key => $value) {
		$data[$key] = str_replace(array("'", '"', ';', ':'), '', $value);
	}

	if(errorcheckData($data) == 0) {
		return 0;
	}
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

	$queryString = "UPDATE Employee SET Fname = '$fName', Minit = '$minit', Lname = '$lName', SSN = $ssn, Address = '$address', Sex = '$sex', 
		Salary = $salary, Super_ssn = $superSSN, Dno = $dNo, BDate = $bDate, EmpDate = $empDate, userid = '$userid'
		WHERE SSN = $oldSSN";
	//print $queryString;
	if(!$dbConnection->query($queryString)) {
			echo 'Could not run query: '.$dbConnection->error;
			return 0;
	}
	echo 'User successfully updated';
	return 1;

}

function addEmployee($data) {
	global $dbConnection;

	foreach($data as $key => $value) {
		if(isset($value)) {
			$data[$key] = str_replace(array("'", '"', ';', ':'), '', $value);
		}
	}
	if(errorcheckData($data) == 0) {
		return 0;
	}

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
	

	$queryString = "INSERT INTO Employee (Fname, Minit, Lname, SSN, Address, Sex, Salary, Super_ssn, Dno, BDate, EmpDate, userid) 
		VALUES ('$fName', '$minit', '$lName', $ssn, '$address', '$sex', $salary, $superSSN, $dNo, $bDate, $empDate, '$userid')";
	//print $queryString;
	if(!$dbConnection->query($queryString)) {
			echo 'Could not run query: '.$dbConnection->error;
			return 0;
	}

	$queryString = "INSERT INTO History (ESSN, Employee_Added, WorksOn_Added, dependant_Added, PNumber) 
		VALUES ($ssn, 1, 0, 0, 0, 0)";
	//print $queryString;
	if(!$dbConnection->query($queryString)) {
			echo 'Could not create user history: '.$dbConnection->error;
			return 0;
	}

	echo 'User successfully created';
	return 1;
}

function errorcheckData($data) {

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

	$errorString = '';
	$errorCode = 0;
	if(strlen($fName) < 3) {
		$errorCode = 1;
		$errorString .= '<p>First name < 3 characters</p>';
	}
	if(strlen($minit) != 1) {
		$errorCode = 1;
		$errorString .= '<p>Middle Initial != 1 character</p>';
	}
	if(strlen($lName) < 2) {
		$errorCode = 1;
		$errorString .= '<p>Last name < 2 characters</p>';
	}
	if (!(is_numeric($ssn)) || strlen($ssn) != 9) {
		$errorCode = 1;
		$errorString .= '<p>bad SSN, must be numeric value between 100 000 000 and 999 999 999</p>';
	}
	if (!(is_numeric($superSSN)) || strlen($superSSN) != 9) {
		$errorCode = 1;
		$errorString .= '<p>bad Super_SSN, must be numeric value between 100 000 000 and 999 999 999</p>';
	}
	if($sex != 'M' && $sex != 'F') {
		$errorCode = 1;
		$errorString .= '<p>invalid gender</p>';
	}
	if(!is_int(intval($bDate)) || intval($bDate) < 1900 || intval($bDate) > DATE('Y') - 13) {
		$errorCode = 1;
		$errorString .= '<p>bad birthday year, employee is either dead or too young... probably not both</p>';
	}
	if(!is_int(intval($empDate)) || intval($empDate) < 1900 || intval($empDate) > DATE('Y') || intval($bDate) > intval($empDate)
		|| intval($empDate) - intval($bDate) < 13) {
		$errorCode = 1;
		$errorString .= '<p>bad employment year, employee is either dead or too young... or was working before they were born</p>';
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