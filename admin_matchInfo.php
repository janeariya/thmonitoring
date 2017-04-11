	<?php
	include 'admin_menu.php'; ?>

  <!-- Add trainee -->
  <div class="w3-container" id="matchInfo" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-blue-grey"><b>Trainer Information.</b></h1>
    <hr style="width:50px;border:5px solid #607d8b" class="w3-round">
  </div>
  
  <?php
	session_start();
	include 'dbcon.php';
	//trainee
	$sql = "SELECT c.user_id, c.user_name, b.trainee_id, b.trainee_name FROM trainerandtrainee a INNER JOIN (user c, trainee b) ON (a.trainer_id = c.user_id AND a.trainee_id = b.trainee_id)";
	$result = mysqli_query($condb, $sql);
?>


<?php
	if (mysqli_num_rows($result) > 0) {
?>
		<table>
		<tr>
		<th>Trainer ID</th>
		<th>Trainer Name</th>
		<th>Trainee ID</th>
		<th>Trainee Name</th>
		<th>Action</th>
		</tr>
<?php
     	// output data of each row
     	while($row = mysqli_fetch_assoc($result)) { 
?>
			<tr>
				<td><?php echo $row["user_id"]; ?></td>
				<td><?php echo $row["user_name"]; ?></td>
				<td><?php echo $row["trainee_id"]; ?></td>
				<td><?php echo $row["trainee_name"]; ?></td>
				<td>
						<a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='admin_save_deleteMatch.php?trainer_id=<?php echo $row["user_id"];?>&trainee_id=<?php echo $row["trainee_id"];?>';}">Delete</a>
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
	mysqli_close($condb);
?>  




	<?php
	include 'footpage.php'; ?>
