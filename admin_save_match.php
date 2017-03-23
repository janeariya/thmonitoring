<?php
	session_start();
	//if($_SESSION['user_id'] == "")
	//{
	//	echo "Please Login!";
	//	exit();
	//}	
	
	include('dbcon.php');
	
	if(trim($_POST["trainer_id"]) == "")
	{
		echo "Please input ID!";
		exit();	
	}
	
	if(trim($_POST["trainee_id"]) == "")
	{
		echo "Please input Name!";
		exit();	
	}
	

		
	
	$strSQL = "SELECT * FROM trainerandtrainee WHERE trainer_id = '".$_POST['trainer_id']."' AND trainee_id = '".trim($_POST['trainee_id'])."'";
	$objQuery = mysqli_query($condb,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
			echo "This match already exists!";
	}
	else
	{	
		//add to trainee table
		$sqlAddtrainee = "INSERT INTO trainerandtrainee (trainer_id,trainee_id) VALUES ('".$_POST["trainer_id"]."','".$_POST["trainee_id"]."')";
		$queryAddtrainee = mysqli_query($condb,$sqlAddtrainee);
			
		header("location:admin_matchInfo.php");
	
		
	}

	mysqli_close($condb);
?>