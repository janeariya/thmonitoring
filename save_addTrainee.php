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
		
	
	$strSQL = "SELECT * FROM trainee WHERE trainee_id = '".trim($_POST['ID'])."' ";
	$objQuery = mysqli_query($condb,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
			echo "This trainee already exists!";
	}
	else
	{	
		//add to trainee table
		$sqlAddtrainee = "INSERT INTO trainee (trainee_id,trainee_name,trainee_gender,trainee_weight,trainee_height,trainee_age) VALUES ('".$_POST["ID"]."','".$_POST["Name"]."','".$_POST["Gender"]."','".$_POST["Weight"]."','".$_POST["Height"]."','".$_POST["Age"]."')";
		$queryAddtrainee = mysqli_query($condb,$sqlAddtrainee);
			

		header("location:admin_traineeInfo.php");
	
		
	}

	mysqli_close($condb);
?>