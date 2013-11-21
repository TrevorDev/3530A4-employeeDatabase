<?php require_once('connect.php');

if(!($queryResult = $dbConnection->query("SELECT * FROM Employee"))) {
	printf("Error - %s\n", $dbConnection->error);
}

while($result = $queryResult->fetch_object()) {
	$resultObj[] = $result;
} ?>

<html>
	<head>
		<title>CIS3530A4</title>
	</head>
	<body>
		<h1>CIS353 Databases Assignment 4</h1>
		<h3>Dan Robinson, Trevor Baron, Derek Dekroon</h3>
		<div class="container">
			<?php foreach($resultObj as $employee) {
				printf("~%s", $employee->Fname.' '.$employee->Lname);
			} ?>
		</div>
	</body>
</html>



