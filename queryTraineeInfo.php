<!DOCTYPE html>
<html>
<head>
  <title>Heart Monitoring</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		table {
    		border-collapse: collapse;
    		width: 100%;
		}

		th, td {
    		text-align: left;
    		padding: 8px;
		}

		tr:nth-child(even){background-color: #f2f2f2}

		th {
    		background-color: #4CAF50;
    		color: white;
		}
	</style>
</head>
<body>

<?php
	session_start();
	include 'dbcon.php';

	$sql = "SELECT * FROM `trainee` WHERE trainee_id IN (SELECT trainee_id FROM trainerAndTrainee WHERE trainer_id =".$_SESSION["user_id"].")";
	$result = mysqli_query($condb, $sql);

if (mysqli_num_rows($result) > 0) {
	 echo "<table><tr> <th>ID</th> <th>Name</th> <th>Gender</th> <th>Weight</th> <th>height</th> <th>Age</th></tr>";
     // output data of each row
     while($row = mysqli_fetch_assoc($result)) {
         echo "<tr><td>" . $row["trainee_id"]. "</td><td>" . $row["trainee_name"] ."</td><td>" . $row["trainee_gender"] ."</td><td>" . $row["trainee_weight"] ."</td><td>" . $row["trainee_height"] ."</td><td>" . $row["trainee_age"] . "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

mysqli_close($conn);
?>  

</body>
</html>