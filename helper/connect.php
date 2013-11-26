<?php
$dbservertype='mysql';
$servername='131.104.48.208';
$dbusername='root';
$dbpassword='';
$dbname='company';

$dbConnection = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($dbConnection->connect_errno) {
	printf("Connect failed: %s\n", $dbConnection->error);
	exit();
}

function convertToRowArray($result){
	$commentObjs = array();
	while($obj = $result->fetch_object()) {
		$commentObjs[] = $obj;
	}
	return $commentObjs;
}

?>
