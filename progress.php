<?php
	include 'user_menu.php';
?>
  
  <!-- progress -->
  
    <div class="w3-container" id="traineeInfo" style="margin-top:75px">
    	<h1 class="w3-xxxlarge w3-text-blue-grey"><b>Progress.</b></h1>
    	<hr style="width:50px;border:5px solid #607d8b" class="w3-round">   
  	</div>
  	
  	  	
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Time', 'Average Heart Rate', 'Calories burned', 'Total time'],
      //    ['2014', 1000, 400, 200],
      //    ['2015', 1170, 460, 250],
      //    ['2016', 660, 1120, 300],
      //   ['2017', 1030, 540, 350]
         <?php 
         	session_start();	
      		include 'dbcon.php';
      		$queryInfo = "SELECT trainee_name, trainee_gender, trainee_weight, floor(datediff(curdate(),trainee_birthdate) / 365) AS trainee_age FROM trainee WHERE trainee_id = ".$_SESSION["progress_id"];	 	
		 	$execInfo = mysqli_query($condb,$query);
      	 	
      	 	$query = "SELECT min(timestamp) as minTimestamp, max(timestamp) as maxTimestamp, avg(trainee_hr) as avgHR, TIMESTAMPDIFF(MINUTE, min(timestamp), max(timestamp)) as totalTime FROM workout WHERE trainee_id = ".$_SESSION["progress_id"]." GROUP BY trainee_workout ORDER BY min(timestamp)";	 	
		 	$exec = mysqli_query($condb,$query);
		 	while($row = mysqli_fetch_array($exec)){
 				echo "['".$row['minTimestamp']."',".$row['avgHR'].",".cal($execInfo["trainee_gender"], $row['avgHR'], $execInfo["trainee_weight"], $execInfo["trainee_age"], $row['totalTime']).",".$row['totalTime']."],";
 			}
 			
 			function cal($gender, $hr, $weight, $age, $time) {
    			if($gender == "female"){
    				$cal = (0.4472*$hr-0.05741*($weight*2.2046)+0.074*$age-20.4022)*$time/4.18;
    			}else{
    				$cal = (0.6309*$hr+0.09036*($weight*2.2046)+0.2017*$age-55.0969)*$time/4.184;
    			}
    			return $cal;
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
        	<option value = 0>Select a trainee</option>
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

<?php
	include 'footpage.php';
?>
