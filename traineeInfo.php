<?php
	include 'user_menu.php';
?>

  <!-- Trainee Info -->
  <div class="w3-container" id="traineeInfo" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-blue-grey"><b>Trainee Information.</b></h1>
    <hr style="width:50px;border:5px solid #607d8b" class="w3-round">   
  </div>
 

<?php
	session_start();
	include 'dbcon.php';
	//trainee
	$sql = "SELECT trainee_id, trainee_name, trainee_gender, trainee_weight, trainee_height, floor(datediff(curdate(),trainee_birthdate) / 365) AS trainee_age FROM `trainee` WHERE trainee_id IN (SELECT trainee_id FROM trainerAndTrainee WHERE trainer_id =".$_SESSION["user_id"].")";
	$result = mysqli_query($condb, $sql);
	
	//trainer
	$strSQL = "SELECT * FROM user WHERE user_id = '".$_SESSION['user_id']."' ";
	$objQuery = mysqli_query($condb,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	
?>
	<div class="w3-group">
        <h5 class="w3-opacity"><b>Trainer Name : <?php echo $objResult["user_name"] ?> </b></h5>
   	</div>

<?php
	if (mysqli_num_rows($result) > 0) {
?>
		<table>
		<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Gender</th>
		<th>Weight</th>
		<th>height</th>
		<th>Age</th>
		<th>Action</th>
		</tr>
<?php
     	// output data of each row
     	while($row = mysqli_fetch_assoc($result)) { 
?>
			<tr>
				<td><?php echo $row["trainee_id"]; ?></td>
				<td><?php echo $row["trainee_name"]; ?></td>
				<td><?php echo $row["trainee_gender"]; ?></td>
				<td><?php echo $row["trainee_weight"]; ?></td>
				<td><?php echo $row["trainee_height"]; ?></td>
				<td><?php echo $row["trainee_age"]; ?></td>
				<td>
					<a href="editTrainee.php?trainee_id=<?php echo $row["trainee_id"];?>">Edit</a>
				</td>
			</tr>
<?php 		
     	}
?>
		</table>
<?php
	} else {
     	echo "0 results";
	}
	mysqli_close($conn);
?>  


<!-- End page content -->

<?php
	include 'footpage.php';
?>