<?php require_once('connect.php');


if(!($queryResult = $dbConnection->query("SELECT * FROM Employee"))) {
	printf("Error - %s\n", $dbConnection->error);
}

while($result = $queryResult->fetch_object()) {
	$resultObj[] = $result;
}

foreach($resultObj as $employee) {
	printf("~%s\n", $employee->Fname.' '.$employee->Lname);
}

?>
