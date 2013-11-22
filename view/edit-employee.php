<?php include($_SERVER['DOCUMENT_ROOT'].'/view/include/header.php'); ?>

<html>
	<head>
	<title>CIS3530A4</title>
	</head>
	<body>
	<h1>CIS353 Databases Assignment 4</h1>
	<h3>Dan Robinson, Trevor Baron, Derek Dekroon</h3>
	<div class="container">
	<h1>Edit Employee Data</h1>
	<table class="no-style" style="text-align:center;">
		<tr>
			<?php echo implode(array_map(function($field){return '<th>'.$field->Field.'</th>';},$fields)); ?>
		</tr>
		<?php
			foreach($employees as $emp) {
                print '<tr>';
                foreach($emp as $key => $value) {
                        print '<td>'.htmlentities($value, ENT_QUOTES).'</td>';
                }
                print '</tr>';
        	}
		?>
	</table>
	</div>
	</body>
</html>

<?php include($_SERVER['DOCUMENT_ROOT'].'/view/include/bottom.php'); ?>