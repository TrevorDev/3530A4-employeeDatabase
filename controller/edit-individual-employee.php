<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/employee.php');

if(isset($_POST['submitEditEmployee'])) {
	$employeeSSN = updateEmployee($_POST);
}

if($employeeSSN == '') {
	$employeeSSN = $_GET['employeeSSN'];
	if($employeeSSN == '') {
		$employeeSSN = 0;
	}
}
$employeeObj = getEmployeeObject($employeeSSN);

include($_SERVER['DOCUMENT_ROOT'].'/view/edit-individual-employee.php');
?>