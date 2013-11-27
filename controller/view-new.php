<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/employee.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/dependent.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/worksOn.php');

$dependentFields = getDependentFields();
$worksOnFields = getWorksOnFields();
$employeeFields = getEmployeeFields();

$dependent = getAllNewDependent();
$worksOn = getAllNewWorksOn();
$employee = getAllNewEmployee();

include($_SERVER['DOCUMENT_ROOT'].'/view/view-new.php');
?>