<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/worksOn.php');

$fields = getWorksOnFields();
if(isset($_POST['submitCreateWorksOn'])) {
	$errorCode = addWorksOn($_POST); //error code 1 means good, 0 means bad
}
$worksOn = getAllWorksOn();

require($_SERVER['DOCUMENT_ROOT'].'/view/create-worksOn.php');
?>