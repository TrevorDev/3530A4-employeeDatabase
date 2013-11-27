<?php include($_SERVER['DOCUMENT_ROOT'].'/view/include/header.php'); ?>

<html>
	<head>
	<title>CIS3530A4</title>
	</head>
	<body>
	<h1>CIS353 Databases Assignment 4</h1>
	<h3>Dan Robinson, Trevor Baron, Derek Dekroon</h3>
	<div class="container">
	<h1>Create an Employee</h1>
	<form method='post' id='createEmployeeForm' action='create-employee.php'>
		<?php print '<table>';
			echo implode(array_map(function($field){
				return '<tr><th>'.$field->Field.'</th><td><input name="'.$field->Field.'" type="text" /></td></tr>';
			},$fields));
		print '</table>'; ?>
		<input type='submit' value='Create Employee' name='submitCreateEmployee' />
		</form>
	</div>
	</body>
</html>

<?php include($_SERVER['DOCUMENT_ROOT'].'/view/include/bottom.php'); ?>