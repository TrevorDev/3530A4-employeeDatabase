<?php include($_SERVER['DOCUMENT_ROOT'].'/view/include/header.php'); ?>
	
<h3>All Employees</h3>
	<table class="table table-hover">
		<tr>
			<?php echo implode(array_map(function($field){return '<th>'.$field->Field.'</th>';},$employeeFields)); ?>
		</tr>
		<?php
			foreach($employee as $emp) {
                print '<tr>';
                foreach($emp as $key => $value) {
                	if($key != 'date_created') {
                    	
	                	if($key == 'SSN') {
	                        print '<td><a href="edit-individual-employee.php?employeeSSN='.$value.'">'.htmlentities($value, ENT_QUOTES).'</a></td>';
	                    } else {
	                    	print '<td>'.htmlentities($value, ENT_QUOTES).'</td>';
	                    }
	                    
                	}
                }
                print '</tr>';
        	}
		?>
	</table>

	<h3>All New Dependents</h3>
	<table class="table table-hover">
		<tr>
			<?php echo implode(array_map(function($field){return '<th>'.$field->Field.'</th>';},$dependentFields)); ?>
		</tr>
		<?php
			foreach($dependent as $emp) {
                print '<tr>';
                foreach($emp as $key => $value) {
                    	if($key != 'date_created') {
                    	print '<td>'.htmlentities($value, ENT_QUOTES).'</td>';
                    	}
                }
                print '</tr>';
        	}
		?>
	</table>

	<h3>All New WorksOn</h3>
	<table class="table table-hover">
		<tr>
			<?php echo implode(array_map(function($field){return '<th>'.$field->Field.'</th>';},$worksOnFields)); ?>
		</tr>
		<?php
			foreach($worksOn as $emp) {
                print '<tr>';
                foreach($emp as $key => $value) {
                	if($key != 'date_created') {
                    	print '<td>'.htmlentities($value, ENT_QUOTES).'</td>';
                    }
                }
                print '</tr>';
        	}
		?>
	</table>



<?php include($_SERVER['DOCUMENT_ROOT'].'/view/include/bottom.php'); ?>