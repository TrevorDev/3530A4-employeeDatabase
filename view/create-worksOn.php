<?php include($_SERVER['DOCUMENT_ROOT'].'/view/include/header.php'); ?>

	<h1>Create WorksOn</h1>
		<form method='post' id='createWorksOnForm' action='create-worksOn.php'>
		<?php print '<table>';
			echo implode(array_map(function($field){
				return '<tr><th>'.$field->Field.'</th><td><input name="'.$field->Field.'" type="text" /></td></tr>';
			},$fields));
		print '</table>'; ?>
		<input type='submit'  value='Create WorksOn' name='submitCreateWorksOn' />
	</form>
	<h3>All WorksOn</h3>
	<table class="table table-hover">
		<tr>
			<?php echo implode(array_map(function($field){return '<th>'.$field->Field.'</th>';},$fields)); ?>
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