<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/employee.php');

$fields = getEmployeeFields();
$employees = getAllEmpoyee();

require($_SERVER['DOCUMENT_ROOT'].'/view/edit-employee.php');
?>