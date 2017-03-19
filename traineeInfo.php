<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.UI8;cursor:pointer}
.w3-half img:hover{opacity:1}
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
    		background-color: #607d8b;
    		color: white;
		}
	
</style>
<body>

<!-- Sidenav/menu -->
<nav class="w3-sidenav w3-blue-grey w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold" id="mySidenav"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-padding-xlarge w3-hide-large w3-display-topleft w3-hover-white" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>Health<br>Monitoring</b></h3>
  </div>
  <a href="/home.php#home" onclick="w3_close()" class="w3-padding w3-hover-white">Home</a> 
  <a href="/monitoring.php#monitoring" onclick="w3_close()" class="w3-padding w3-hover-white">Monitoring</a> 
  <a href="/progress.php#progress" onclick="w3_close()" class="w3-padding w3-hover-white">Progress</a> 
  <a href="/traineeInfo.php#traineeInfo" onclick="w3_close()" class="w3-padding w3-hover-white">Trainee Info</a> 
  <a href="/addTrainee.php#addTrainee" onclick="w3_close()" class="w3-padding w3-hover-white">Add Trainee</a>
  <a href="/logout.php" onclick="w3_close()" class="w3-padding w3-hover-white">Logout</a>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-blue-grey w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-btn w3-blue-grey w3-border w3-border-white w3-margin-right" onclick="w3_open()">☰</a>
  <span>Company Name</span>
</header>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Trainee Info -->
  <div class="w3-container" id="traineeInfo" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-blue-grey"><b>Trainee Information.</b></h1>
    <hr style="width:50px;border:5px solid #607d8b" class="w3-round">   
  </div>
 

<?php
	session_start();
	include 'dbcon.php';
	//trainee
	$sql = "SELECT * FROM `trainee` WHERE trainee_id IN (SELECT trainee_id FROM trainerAndTrainee WHERE trainer_id =".$_SESSION["user_id"].")";
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
					<a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='deleteTrainee.php?trainee_id=<?php echo $row["trainee_id"];?>';}">Delete</a>
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

<script>
// Script to open and close sidenav
function w3_open() {
    document.getElementById("mySidenav").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidenav").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
</script>

</body>
</html>