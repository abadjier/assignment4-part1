<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
?>
<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="UTF-8" />
	<title>PHP multtable</title>
	<style type="text/css">
		th, td { padding: 10px; }
		tr { border: solid white; }
		tr { background-color: #efefef; }
	</style>
</head>
<body>	
<?php
function validate() {
	if(isset($_GET['min-multiplier'])){
		$min_multiplier = (int)$_GET['min-multiplier'];	
	} else {
		echo "<p>Missing parameter min-multiplier.</p>";
		return;
	}

	if(isset($_GET['max-multiplier'])){
		$max_multiplier =(int)$_GET['max-multiplier'];	
	} else {
		echo "<p>Missing parameter max-multiplier.</p>";
		return;
	}

	if(isset($_GET['min-multiplicand'])){
		$min_multiplicand = (int)$_GET['min-multiplicand'];	
	} else {
		echo "<p>Missing parameter min-multiplicand.</p>";
		return;
	}

	if(isset($_GET['max-multiplicand'])){
		$max_multiplicand = (int)$_GET['max-multiplicand'];	
	} else {
		echo "<p>Missing parameter max-multiplicand.</p>";
		return;
	}
 
	// Check if all inputs are integers
	foreach ($_GET as $key => $value) {	
		//source: http://stackoverflow.com/questions/2012187/how-to-check-that-a-string-is-an-int-but-not-a-double-etc
		if (!ctype_digit($value)) {
			echo "$key must be an integer.";
			return;
		}
	}
	
	if ($min_multiplicand > $max_multiplicand) {
		echo "Minimum multiplicand larger than maximum";
		return;
  }
	
	if ($min_multiplier > $max_multiplier) {
		echo "Minimum multiplier larger than maximum";
		return;
	}
	
	$table_height = $max_multiplicand -$min_multiplicand + 2;
	$table_width = $max_multiplier - $min_multiplier + 2;
	
	echo "<p><table>";	
	
	for( $i = 0; $i < $table_height; $i++ ){
		echo "<tr>";
			
		for($j = 0; $j < $table_width; $j++ ){		
			if($i == 0 && $j == 0){
				echo "<td></td>";	//create one empty cell
			} else if ($i == 0) {
				//print header
				echo "<th>" . $j ."</th>";
			} else {
				if ($j == 0) {
					echo "<th>" . $i . "</th>";
				} else {
					$result = ($i * $j);
					echo "<td>$result</td>";  
				}
			}			
		}			
		echo "</tr>";
	}	
	echo "</table></p>";				
}
validate();
?>	
</body>
</html>