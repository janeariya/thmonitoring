<?php
	session_start();
	if($_SESSION['user_id'] == "")
	{
		echo "Please Login!";
		exit();
	}

	if($_SESSION['user_status'] != "admin")
	{
		echo "This page for Admin only!";
		exit();
	}	
	
	//$condb = mysqli_connect("us-cdbr-iron-east-04.cleardb.net","ba7e6dcfa1653e","5ddeaaf0","ad_67c8190313684df","3306");
	include 'dbcon.php';
	$strSQL = "SELECT * FROM user WHERE user_id = '".$_SESSION['user_id']."' ";
	
	$objQuery = mysqli_query($condb,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	mysqli_close($condb);
?>
<html>
<head>
<title>Health Monitoring</title>
</head>
<body>
  Welcome to Admin Page! <br>
  <table border="1" style="width: 300px">
    <tbody>
      <tr>
        <td width="87"> &nbsp;Username</td>
        <td width="197"><?php echo $objResult["user_username"];?>
        </td>
      </tr>
      <tr>
        <td> &nbsp;Name</td>
        <td><?php echo $objResult["user_name"];?></td>
      </tr>
    </tbody>
  </table>
  <br>
  <a href="edit_profile.php">Edit</a><br>
  <br>
  <a href="logout.php">Logout</a>
</body>
</html>