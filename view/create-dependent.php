<?php include($_SERVER['DOCUMENT_ROOT'].'/view/include/header.php'); ?>
	<h1>Create a Dependent</h1>
	<form method='post' id='createDepedentForm' action='create-dependent.php'>
	<?php print '<table>';
		echo implode(array_map(function($field){
			if($field->Field != 'date_created') {
				return '<tr><th>'.$field->Field.'</th><td><input name="'.$field->Field.'" type="text" /></td></tr>';
			}
		},$fields));
	print '</table>'; ?>
	<input type='submit' value='Create Dependent' name='submitCreateDependent' />
	</form>

<?php include($_SERVER['DOCUMENT_ROOT'].'/view/include/bottom.php'); ?>