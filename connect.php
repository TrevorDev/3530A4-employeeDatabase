<?php
$dbservertype='mysql';
$servername='131.104.48.208';
$dbusername='root';
$dbpassword='pal';
$dbname='company';

$dbConnection = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($dbConnection->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}
?>
