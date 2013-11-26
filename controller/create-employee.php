<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/employee.php');

$fields = getEmployeeFields();
$employees = getAllEmpoyee();

include($_SERVER['DOCUMENT_ROOT'].'/view/create-employee.php');
?>