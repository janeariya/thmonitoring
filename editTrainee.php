<?php
	session_start();
	if($_SESSION['user_id'] == "")
	{
		echo "Please Login!";
		exit();
	}
	
	include('dbcon.php');
	$sql = "SELECT trainee_id, trainee_name, trainee_gender, trainee_weight, trainee_height, floor(datediff(curdate(),trainee_birthdate) / 365) AS trainee_age FROM trainee ";
	$sql .="WHERE trainee_id = '".$_GET["trainee_id"]."' ";
	$result = mysqli_query($condb, $sql);
	$row = mysqli_fetch_array($result);
?>

<?php
	include 'user_menu.php';
?>

  <!-- Add trainee -->
  <div class="w3-container" id="editTrainee" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-blue-grey"><b>Edit Trainee.</b></h1>
    <hr style="width:50px;border:5px solid #607d8b" class="w3-round">
    <p>Edit information about your trainee!</p>
    <form name="form1" method="post" action="/save_editTrainee.php?trainee_id=<?php echo $row["trainee_id"];?> target="_blank">
      <div class="w3-group">
        <label>ID</label>
        <table class="w3-input w3-border"><tr><td><?php echo $row["trainee_id"];?></td></tr></table>
      </div>
      <div class="w3-group">
        <label>Name</label>
        <table class="w3-input w3-border"><tr><td><?php echo $row["trainee_name"];?></td></tr></table>
      </div>
      <div class="w3-group">
        <label>Gender</label>
        <table class="w3-input w3-border"><tr><td><?php echo $row["trainee_gender"];?></td></tr></table>
      </div>
      <div class="w3-group">
        <label>Weight</label>
        <input class="w3-input w3-border" name="Weight" type="text" value="<?php echo $row["trainee_weight"];?>" required>
      </div>
      <div class="w3-group">
        <label>Height</label>
        <table class="w3-input w3-border"><tr><td><?php echo $row["trainee_height"];?></td></tr><table>
      </div>
      <div class="w3-group">
        <label>Age</label>
        <table class="w3-input w3-border"><tr><td><?php echo $row["trainee_age"];?></td></tr></table>
      </div>
      <button type="submit" class="w3-btn-block w3-padding-large w3-blue-grey w3-margin-bottom">Edit Trainee</button>
    </form>  
  </div>

<!-- End page content -->

<?php
	include 'footpage.php';
?>