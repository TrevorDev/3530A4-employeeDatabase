<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/employee.php');

$employeeSSN = $_GET['employeeSSN'];
if($employeeSSN == '') {
	$employeeSSN = 0;
}

if(isset($_POST['submitEditEmployee'])) {
	$errorCode = updateEmployee($_POST, $employeeSSN); //error code 1 means good, 0 means bad
}
if($errorCode == 1) {
	$employeeSSN = $_POST['SSN'];
}
$employeeObj = getEmployeeObject($employeeSSN);

include($_SERVER['DOCUMENT_ROOT'].'/view/edit-individual-employee.php');
?>