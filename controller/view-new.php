<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/employee.php');
//require_once($_SERVER['DOCUMENT_ROOT'].'/model/dependent.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/worksOn.php');

/*if(isset($_POST['submitEditEmployee'])) {
	$errorCode = updateEmployee($_POST, $employeeSSN); //error code 1 means good, 0 means bad
}

if($errorCode == 1) {
	$employeeSSN = $_POST['SSN'];
}

$employeeObj = getEmployeeObject($employeeSSN);*/

include($_SERVER['DOCUMENT_ROOT'].'/view/edit-individual-employee.php');
?>