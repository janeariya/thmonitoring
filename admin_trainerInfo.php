	<?php
	include 'admin_menu.php'; ?>

  <!-- Add trainee -->
  <div class="w3-container" id="trainerInfo" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-blue-grey"><b>Trainer Information.</b></h1>
    <hr style="width:50px;border:5px solid #607d8b" class="w3-round">
  </div>
  
  <?php
	session_start();
	include 'dbcon.php';
	//trainee
	$sql = "SELECT * FROM `user` WHERE user_status = 'trainer' ";
	$result = mysqli_query($condb, $sql);
?>


<?php
	if (mysqli_num_rows($result) > 0) {
?>
		<table>
		<tr>
		<th>ID</th>
		<th>Name</th>
		<th>USERNAME</th>
		<th>PASSWORD</th>
		<th>Action</th>
		</tr>
<?php
     	// output data of each row
     	while($row = mysqli_fetch_assoc($result)) { 
?>
			<tr>
				<td><?php echo $row["user_id"]; ?></td>
				<td><?php echo $row["user_name"]; ?></td>
				<td><?php echo $row["user_username"]; ?></td>
				<td><?php echo $row["user_password"]; ?></td>
				<td>
					<a href="admin_editTrainer.php?trainer_id=<?php echo $row["user_id"];?>">Edit</a>
					<a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='admin_save_deleteTrainer.php?trainer_id=<?php echo $row["user_id"];?>';}">Delete</a>
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
