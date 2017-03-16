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
  	
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Time', 'Sales', 'Expenses', 'Profit'],
      //    ['2014', 1000, 400, 200],
      //    ['2015', 1170, 460, 250],
      //    ['2016', 660, 1120, 300],
      //   ['2017', 1030, 540, 350]
         <?php 
         	session_start();	
      		include 'dbcon.php';
      	 	$query = "SELECT trainee_id, trainee_name, trainee_weight, trainee_height, trainee_age FROM trainee WHERE trainee_id = ".$_SESSION["progress_id"];
      	 	
		 	$exec = mysqli_query($condb,$query);
		 	while($row = mysqli_fetch_array($exec)){
 				echo "['".$row['trainee_id']."',".$row['trainee_weight'].",".$row['trainee_height'].",".$row['trainee_age']."],";
 			}
 			mysqli_close($condb);
 			
      	?>
       ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
      }
    </script>
  
  
</header>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">
  
  <!-- progress -->
  
    <div class="w3-container" id="traineeInfo" style="margin-top:75px">
    	<h1 class="w3-xxxlarge w3-text-blue-grey"><b>Progress.</b></h1>
    	<hr style="width:50px;border:5px solid #607d8b" class="w3-round">   
  	</div>
  	
  	<!-- Dropdow for select trainee -->
  	
  	<?php
		include 'dbcon.php';
		$sql = "SELECT trainee_id, trainee_name FROM `trainee` WHERE trainee_id IN (SELECT trainee_id FROM `trainerAndTrainee` WHERE trainer_id =".$_SESSION["user_id"].")";
		$result = mysqli_query($condb, $sql);
   	?>
   
	<?php
		if (mysqli_num_rows($result) > 0) {
	?>
		 <form name="form1" method="post" action="/assignProgressID.php" target="_self">
		 <div class="w3-group">
        	<label>Trainee name</label>
        	<select class="w3-input w3-border" type="text" name="id" >
        	<option value=0>Select a trainee</option>
	<?php
     	// output data of each row
     	while($row = mysqli_fetch_assoc($result)) {
			echo '<option value="'.$row["trainee_id"].'">'.$row["trainee_name"].'</option>';	
     	}
	?>
		</select>
      	</div>
		<button type="submit" class="w3-btn-block w3-padding-large w3-blue-grey w3-margin-bottom">Select Trainee</button>
		</form>  
		<div id="showcontent" class=""></div>
	<?php
		} else {
     		echo "0 results";
		}
		mysqli_close($conn);
	?>  

	<!--Display name of trainee and chart-->
 
    <div style="width:800px; margin:0 auto;">
       <br>
         <h5 class="w3-opacity"><b>Name : 
         <?php  
         include 'dbcon.php';
		 $sql = "SELECT trainee_name FROM trainee WHERE trainee_id = ".$_SESSION["progress_id"];
		 $query = mysqli_query($condb,$sql);
		 $result = mysqli_fetch_array($query);
		 echo $result["trainee_name"];       
         ?> </b></h5>
       <div id="columnchart_material" align="center" style="width: 900px; height: 500px;"></div>
    </div>


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
