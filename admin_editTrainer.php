 	<?php
	include 'admin_menu.php'; ?>
 
 <?php
	
	include('dbcon.php');
	$sql = "SELECT * FROM user ";
	$sql .="WHERE user_id = '".$_GET["trainer_id"]."' ";
	$result = mysqli_query($condb, $sql);
	$row = mysqli_fetch_array($result);
?>
 
 <!-- Add trainee -->
  <div class="w3-container" id="editTrainee" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-blue-grey"><b>Edit Trainee.</b></h1>
    <hr style="width:50px;border:5px solid #607d8b" class="w3-round">
    <p>Edit information about your trainer!</p>
    <form name="form1" method="post" action="/admin_save_editTrainer.php?user_id=<?php echo $row["user_id"];?> target="_self">
      <div class="w3-group">
        <label>ID</label>
        <table class="w3-input w3-border"><tr><td><?php echo $row["user_id"];?></td></tr></table>
      </div>
      <div class="w3-group">
        <label>Name</label>
        <table class="w3-input w3-border"><tr><td><?php echo $row["user_name"];?></td></tr></table>
      </div>
      <div class="w3-group">
        <label>USERNAME</label>
        <input class="w3-input w3-border" name="username" type="text" value="<?php echo $row["user_username"];?>" required>
      </div>
      <div class="w3-group">
        <label>PASSWORD</label>
        <input class="w3-input w3-border" name="password" type="text" value="<?php echo $row["user_password"];?>" required>
      </div>
      <button type="submit" class="w3-btn-block w3-padding-large w3-blue-grey w3-margin-bottom">Edit Trainer</button>
    </form>  
  </div>
  
  	<?php
	include 'footpage.php'; ?>