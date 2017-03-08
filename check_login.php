<?php
	session_start();
	//$condb = mysqli_connect("us-cdbr-iron-east-04.cleardb.net","ba7e6dcfa1653e","5ddeaaf0","ad_67c8190313684df","3306");
	include 'dbcon.php';
	
	//check connection
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$strSQL = "SELECT * FROM member WHERE Username = '"
	.mysqli_real_escape_string($condb,$_POST['txtUsername'])
	."' and Password = '".mysqli_real_escape_string($condb,$_POST['txtPassword'])
	."'";
	$objQuery = mysqli_query($condb,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	
	if(!$objResult)
	{
			echo "Username and Password Incorrect!";
	}
	else
	{
			$_SESSION["UserID"] = $objResult["UserID"];
			$_SESSION["Status"] = $objResult["Status"];

			session_write_close();
			
			if($objResult["Status"] == "ADMIN")
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