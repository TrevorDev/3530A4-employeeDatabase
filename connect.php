<?php
$dbservertype='mysql';
$servername='localhost';
$dbusername='root';
$dbpassword='pal';
$dbname='company';

$dbConnection = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($dbConnection->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}
?>
