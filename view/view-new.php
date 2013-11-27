<?php include($_SERVER['DOCUMENT_ROOT'].'/view/include/header.php'); ?>
	<h1>Edit An Employee</h1>
	<form method='post' id='editEmployeeForm' action='/controller/edit-individual-employee.php?employeeSSN=<?php print $employeeSSN ?>'>
	<?php if(isset($employeeObj)) {
		print '<table>';
		foreach($employeeObj as $key => $value) {
			print '<tr><td>'.$key.'</td><td><input type="text" name="'.$key.'" value="'.htmlentities($value, ENT_QUOTES).'" /></td></tr>';
		}
	}
	print '</table>'; ?>
	<input type='submit' value='Edit Employee' name='submitEditEmployee' />
	</form>

<?php include($_SERVER['DOCUMENT_ROOT'].'/view/include/bottom.php'); ?>