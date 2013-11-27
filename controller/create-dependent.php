<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/dependent.php');

$fields = getDependentFields();

if(isset($_POST['submitCreateDependent'])) {
	$errorCode = addDependent($_POST); //error code 1 means good, 0 means bad
}

include($_SERVER['DOCUMENT_ROOT'].'/view/create-dependent.php');
?>