<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/employee.php');

$fields = getEmployeeFields();

if(isset($_POST['submitCreateEmployee'])) {

	$errorCode = addEmployee($_POST); //error code 1 means good, 0 means bad
}


include($_SERVER['DOCUMENT_ROOT'].'/view/create-employee.php');
?>