<?php

 	include 'dbcon.php';

	session_start();
	include 'dbcon.php';
	
	$hr = "SELECT workout.trainee_id,trainee.trainee_name,workout.trainee_hr FROM workout,trainee WHERE workout.trainee_id = trainee.trainee_id AND timestamp IN (SELECT MAX(timestamp) FROM workout WHERE trainee_id IN (SELECT trainee_id FROM trainerAndTrainee WHERE trainer_id = ".$_SESSION["user_id"].") group by trainee_id) order by trainee_id";
	$objhr = mysqli_query($condb,$hr) or die (mysqli_error());
	$intNumField = mysqli_num_fields($objQuery);	//return num of column in a result set
	//echo $intNumField;
	$resultArray = array();
	while($hrResult = mysqli_fetch_array($objhr))
	{
		$arrCol = array(trainee_id => $hrResult[trainee_id],trainee_name => $hrResult[trainee_name],trainee_hr => $hrResult[trainee_hr]);
		
		array_push($resultArray,$arrCol);  //return new num of element in array
	}

	
	mysqli_close($condb);
	
	echo json_encode($resultArray);
	
?>