<?php include($_SERVER['DOCUMENT_ROOT'].'/view/include/header.php'); ?>
	
	<h1>Edit Employee Data</h1>
	<a href="create-employee.php" class="btn btn-hover" hidefocus="true" style="outline: none;">
		<span>Create an Employee</span>
	</a>
	<h3>All Employees</h3>
	<table>
		<tr>
			<?php echo implode(array_map(function($field){return '<th>'.$field->Field.'</th>';},$fields)); ?>
		</tr>
		<?php
			foreach($employees as $emp) {
                print '<tr>';
                foreach($emp as $key => $value) {
                	if($key == 'SSN') {
                        print '<td><a href="edit-individual-employee.php?employeeSSN='.$value.'">'.htmlentities($value, ENT_QUOTES).'</a></td>';
                    } else {
                    	print '<td>'.htmlentities($value, ENT_QUOTES).'</td>';
                    }
                }
                print '</tr>';
        	}
		?>
	</table>

<?php include($_SERVER['DOCUMENT_ROOT'].'/view/include/bottom.php'); ?>