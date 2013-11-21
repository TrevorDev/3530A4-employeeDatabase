<?php require_once('connect.php');

$commentObjs = array();

if(!$dbFieldQuery = $dbConnection->query("SHOW COLUMNS FROM Employee")) {
	echo 'Could not run query: ' . $dbConnection->error;
}

$fieldNames=array();
if ($dbFieldQuery->num_rows > 0) {
	while ($column = $dbFieldQuery->fetch_object()) {
		$fieldNames[] =  $column->Field;
	}
} else {
	print 'No available columns';
	$pageFrame->printFooter();
	exit(0);
}
$result = $dbConnection->query("SELECT * FROM Employee");
if($result->num_rows > 0) {
	while($obj = $result->fetch_object()) {
		$commentObjs[] = $obj;
	}
}

?>


<html>
	<head>
		<title>CIS3530A4</title>
	</head>
	<body>
		<h1>CIS353 Databases Assignment 4</h1>
		<h3>Dan Robinson, Trevor Baron, Derek Dekroon</h3>
		<div class="container">
			      <h1>Edit Employee Data</h1>
      
<?php 
print '<table class="no-style" style="text-align:center;"><tr>';
foreach($fieldNames as $field) {
	print '<th>'.$field.'</th>';
}
print '</tr>';
if(count($commentObjs) > 0) {
	foreach($commentObjs as $commentSurvey) {
		print '<tr>';
		foreach($commentSurvey as $key => $value) {
			print '<td>'.htmlentities($value, ENT_QUOTES).'</td>';
		}
		print '</tr>';
	}
} else {
	print '<tr><td colspan='.$dbFieldQuery->num_rows.'>No data in the general comments table</td></tr>';
}
print '</table>';?>
		</div>
	</body>
</html>



