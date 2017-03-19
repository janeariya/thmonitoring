<html>
<head>
<title>Health Monitoring</title>
</head>
<body>
<?php
	session_start();
	include 'dbcon.php';


	//delete in trainerAndTrsinee
	$sqlID = "DELETE FROM trainerAndTrainee ";
	$sqlID .="WHERE trainee_id = '".$_GET["trainee_id"]."' AND trainer_id =".$_SESSION['user_id'];
	$resultID = mysqli_query($condb, $sqlID);


	if($resultID)
	{
		header("location:traineeInfo.php");
		//echo "Record Deleted.";
		//echo $sql;
		//echo "<br> Go to <a href='traineeInfo.php'>Trainee info page</a>";
	}
	else
	{
		echo "Error Delete [".$sql."]";
	}
	mysql_close($objConnect);
?>
</body>
</html>