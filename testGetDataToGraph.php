<?php

 	include 'dbcon.php';

	$strSQL = "SELECT trainee_hr FROM workout order by workout_id DESC LIMIT 1";
		$objQuery = mysqli_query($condb,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	echo $objResult["trainee_hr"]
	
	mysqli_close($condb);
?>
