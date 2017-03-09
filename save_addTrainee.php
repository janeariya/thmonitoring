<?php
	seesion_start();
//	if($_SESSION['UserID'] == "")
//	{
//		echo "Please Login!";
//		exit();
//	}
	
	include('dbcon.php');
	
	if(trim($_POST["Name"]) == "")
	{
		echo "Please input Name!";
		exit();	
	}
	
	if(trim($_POST["Gender"]) == "")
	{
		echo "Please input Gender!";
		exit();	
	}	
	
	if(trim($_POST["Weight"]) == "")
	{
		echo "Please input Weight!";
		exit();	
	}
	
	if(trim($_POST["Height"]) == "")
	{
		echo "Please input Height!";
		exit();	
	}
	
	if(trim($_POST["Age"]) == "")
	{
		echo "Please input Age!";
		exit();	
	}
		
	
	//find max id and add by 1 
	$sqlMaxID = "SELECT MAX(trainee_id) FROM trainee";
	$QueryMaxID = mysqli_query($condb,$sqlMaxID);
	$ResultMaxID = mysqli_fetch_array($QueryMaxID);
	echo $ResultMaxID["MAX(trainee_id)"];
	$Max = $ResultMaxID["MAX(trainee_id)"];
	$newMax = intval($ResultMaxID["MAX(trainee_id)"])+1;
	echo $newMax;
	
	
	
	if($objResult)
	{
			echo "Username already exists!";
	}
	else
	{	
		//add to trainee table
		$sqlAddtrainee = "INSERT INTO trainee (trainee_name,trainee_gender,trainee_weight,trainee_height,trainee_age) VALUES ('".$_POST["Name"]."', 
		'".$_POST["Gender"]."','".$_POST["Weight"]."','".$_POST["Height"]."','".$_POST["Age"]."')";
		$queryAddtrainee = mysqli_query($condb,$sqlAddtrainee);
		
		
		//add to trainerandtrainee table
		//$sqlAddID = "INSERT INTO `trainerAndTrainee`(`tt_id`, `trainer_id`, `trainee_id`) VALUES ([value-1],[value-2],[value-3])";
		//$queryAddID = musqli_query($condb,$sqlAddID);
		
		echo $sqlAddtrainee;
		
		echo "Register Completed!<br>";		
	
		echo "<br> Go to <a href='login.php'>Login page</a>";
		
	}

	mysqli_close($condb);
?>