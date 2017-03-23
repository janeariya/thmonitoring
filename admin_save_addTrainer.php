<?php
	session_start();
	include('dbcon.php');
	
	if(trim($_POST["Name"]) == "")
	{
		echo "Please input Name!";
		exit();	
	}
	
	if(trim($_POST["Username"]) == "")
	{
		echo "Please input Username!";
		exit();	
	}	
	
	if(trim($_POST["Password"]) == "")
	{
		echo "Please input Password!";
		exit();	
	}
	
	if(trim($_POST["ConPass"]) == "")
	{
		echo "Please input Confirm Password!";
		exit();	
	}
	if($_POST["Password"] != $_POST["ConPass"])
	{
		echo "Password not Match!";
		exit();
	}
	
		
	
	$strSQL = "SELECT * FROM user WHERE user_name = '".trim($_POST['Name'])."' ";
	$objQuery = mysqli_query($condb,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
			echo "Username already exists!";
	}
	else
	{
		//add to user table
		$sqlAddtrainer = "INSERT INTO user (user_name,user_username,user_password,user_status) VALUES ('".$_POST["Name"]."','".$_POST["Username"]."','".$_POST["Password"]."','trainer')";
		$queryAddtrainer = mysqli_query($condb,$sqlAddtrainer);
		
		
		header("location:admin_trainerInfo.php");;
		
	}

	mysqli_close($condb);
?>