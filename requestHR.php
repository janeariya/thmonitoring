<?php

 	include 'dbcon.php';

	$strSQL = "SELECT Name FROM customer order by CustomerID DESC LIMIT 1";
		$objQuery = mysqli_query($condb,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	
	mysqli_close($condb);
?>
<html>
<head>
<title>Health Monitoring</title>
</head>
<body>
  Welcome to User Page! <br>
  <table border="1" style="width: 300px">
    <tbody>
      <tr>
        <td width="87"> &nbsp;Username</td>
        <td width="197"><?php echo $objResult["Name"];?>
        </td>
      </tr>
      <!--<tr>
        <td> &nbsp;Name</td>
        <td><?php echo $objResult["Name"];?></td>
      </tr> !-->
    </tbody>
  </table>
  <br>
  <a href="edit_profile.php">Edit</a><br>
  <br>
  <a href="logout.php">Logout</a>
</body>
</html>
