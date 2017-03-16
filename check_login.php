<?php
	session_start();
	//$condb = mysqli_connect("us-cdbr-iron-east-04.cleardb.net","ba7e6dcfa1653e","5ddeaaf0","ad_67c8190313684df","3306");
	include 'dbcon.php';
	
	//check connection
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$strSQL = "SELECT * FROM user WHERE user_username = '"
	.mysqli_real_escape_string($condb,$_POST['txtUsername'])
	."' and user_password = '".mysqli_real_escape_string($condb,$_POST['txtPassword'])
	."'";
	$objQuery = mysqli_query($condb,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	
	if(!$objResult)
	{
			echo "Username and Password Incorrect!";
	}
	else
	{
			$_SESSION["user_id"] = $objResult["user_id"];
			$_SESSION["user_status"] = $objResult["user_status"];
			$_SESSION["progress_id"] = 0;

			session_write_close();
			
			if($objResult["user_status"] == "admin")
			{
				header("location:admin_page.php");
			}
			else
			{
				header("location:home.php");
			}
	}
	mysqli_close($condb);
?>