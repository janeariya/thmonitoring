<?php
	session_start();
	//if($_SESSION['user_id'] == "")
	//{
	//	echo "Please Login!";
	//	exit();
	//}	
	
	include('dbcon.php');
	
	if(trim($_POST["ID"]) == "")
	{
		echo "Please input ID!";
		exit();	
	}
	
		
	
	$strSQL = "SELECT * FROM trainerAndtrainee WHERE trainee_id = ".$_POST['ID']." AND trainer_id = ".$_SESSION["user_id"];
	$objQuery = mysqli_query($condb,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
			echo "This trainee already exists!";
	}
	else
	{	
		//add to trainerandtrainee table
		$sqlAddID = "INSERT INTO `trainerAndTrainee`(`trainer_id`, `trainee_id`) VALUES ('".$_SESSION["user_id"]."','".$_POST["ID"]."')";
		$queryAddID = mysqli_query($condb,$sqlAddID);
		
		//echo $sqlAddtrainee;
		//echo $sqlAddID;
	
		//echo "Register Completed!<br>";		

		header("location:traineeInfo.php");
	
		//echo "<br> Go to <a href='login.php'>Login page</a>";
		
	}

	mysqli_close($condb);
?>