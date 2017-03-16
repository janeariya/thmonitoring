<?php
	session_start();
	
	$_SESSION["progress_id"] = $_POST['id'];
	
	echo $_SESSION["progress_id"];
	
	session_write_close();
	
	header("location:progress.php");
	
//	if(!$objResult)
//	{
//			echo "Username and Password Incorrect!";
//	}
//	else
//	{
//			$_SESSION["user_id"] = $objResult["user_id"];
//			$_SESSION["user_status"] = $objResult["user_status"];
//			$_SESSION["progress_id"] = 2;
//
//			session_write_close();
//			
//			if($objResult["user_status"] == "admin")
//			{
//				header("location:admin_page.php");
//			}
//			else
//			{
//				header("location:home.php");
//			}
//	}
//	mysqli_close($condb);
?>