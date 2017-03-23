<?php

	session_start();
	include 'dbcon.php';

	$strSQL = "SELECT * FROM user WHERE user_username = '".trim($_POST['username'])."' ";
	$objQuery = mysqli_query($condb,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
			echo "Username already exists!";
	}
	else
	{

		$sql = "UPDATE user SET user_username = '".trim($_POST['username'])."' , user_password = '".trim($_POST['password'])."'";
		$sql .="WHERE user_id = '".$_GET["user_id"]."' ";
		$result = mysqli_query($condb, $sql);
	
		
		if($result)
		{
			header("location:admin_trainerInfo.php");
		}
		else
		{
			echo "Error Edit [".$sql."]";
		}
	
	}

	
	mysqli_close($condb);
?>