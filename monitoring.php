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
</header>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Monitoring -->
  <div class="w3-container" id="monitoring" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-blue-grey"><b>Monitoring.</b></h1>
    <hr style="width:50px;border:5px solid #607d8b" class="w3-round">
  </div>
  
 
 
 <?php
	session_start();
	include 'dbcon.php';
	//trainee
	$sql = "SELECT * FROM `trainee` WHERE trainee_id IN (SELECT trainee_id FROM trainerAndTrainee WHERE trainer_id =".$_SESSION["user_id"].")";
	$result = mysqli_query($condb, $sql);
	//$row = mysqli_fetch_assoc($result);
	
	//trainer
	$strSQL = "SELECT * FROM user WHERE user_id = '".$_SESSION['user_id']."' ";
	$objQuery = mysqli_query($condb,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	
	$numT = "SELECT workout.trainee_id,trainee.trainee_name,workout.trainee_hr FROM workout,trainee WHERE workout.trainee_id = trainee.trainee_id AND timestamp IN (SELECT MAX(timestamp) FROM workout WHERE trainee_id IN (SELECT trainee_id FROM trainerAndTrainee WHERE trainer_id = ".$_SESSION["user_id"].") group by trainee_id) order by trainee_id";
	$resultnumT = mysqli_query($condb, $numT);
	$number = mysqli_num_rows($resultnumT);
	//echo $number;
	
?>
	<!--print trainer name-->
	<div class="w3-group">
        <h5 class="w3-opacity"><b>Trainer Name : <?php echo $objResult["user_name"] ?> </b></h5>
   	</div>
  
  
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script type="text/javascript">
	window.onload = function () {

	//test switch case 10
	var numTrainee = <?php echo $number; ?>;   //2; //count of chart
	console.log("numTrainee : "+numTrainee);
	var updateInterval = 15000; //update every updateInterval
	var dataLength = 80; // number of dataPoints visible at any point
	var numArray = 0;
	var numA1,numA2,numA3,numA4,numA5,numA6,numA7,numA8,numA9,numA10 ;
	var traineeName = [];
	
switch (numTrainee) {
  case 10:
    	var dps1 = []; var xVal1 = 0; var yVal1 = 100;
		var chart1 = new CanvasJS.Chart("chartContainer1",{
			title :{text: "Heart Rate"},
			data: [{type: "line",dataPoints: dps1}]
		});
		chart1.render();
		numA1 = numArray;
		setInterval(function(){updateChartData(xVal1,yVal1,dps1,chart1,1,numA1)}, updateInterval);
		//console.log(numArray);
		numArray++;
		
  case 9:
		var dps2 = []; var xVal2 = 0; var yVal2 = 100;
		var chart2 = new CanvasJS.Chart("chartContainer2",{
			title :{text: "Heart Rate"},
			data: [{type: "line",dataPoints: dps2}]
		});
		chart2.render();
		numA2 = numArray;
		setInterval(function(){updateChartData(xVal2,yVal2,dps2,chart2,1,numA2)}, updateInterval);
		//console.log(numArray);
		numArray++;
	
  case 8:
    	var dps3 = []; var xVal3 = 0; var yVal3 = 100;
		var chart3 = new CanvasJS.Chart("chartContainer3",{
			title :{text: "Heart Rate"},
			data: [{type: "line",dataPoints: dps3}]
		});
		chart3.render();
		numA3 = numArray;
		setInterval(function(){updateChartData(xVal3,yVal3,dps3,chart3,1,numA3)}, updateInterval);
		//console.log(numArray);
		numArray++;

  case 7:
    	var dps4 = []; var xVal4 = 0; var yVal4 = 100;
		var chart4 = new CanvasJS.Chart("chartContainer4",{
			title :{text: "Heart Rate"},
			data: [{type: "line",dataPoints: dps4}]
		});
		chart4.render();
		numA4 = numArray;
		setInterval(function(){updateChartData(xVal4,yVal4,dps4,chart4,1,numA4)}, updateInterval);
		//console.log(numArray);
		numArray++;
 
  case 6:
		var dps5 = []; var xVal5 = 0; var yVal5 = 100;
		var chart5 = new CanvasJS.Chart("chartContainer5",{
			title :{text: "Heart Rate"},
			data: [{type: "line",dataPoints: dps5}]
		});
		chart5.render();
		numA5 = numArray;
		setInterval(function(){updateChartData(xVal5,yVal5,dps5,chart5,1,numA5)}, updateInterval);
		//console.log(numArray);
		numArray++;
	
  case 5:
    	var dps6 = []; var xVal6 = 0; var yVal6 = 100;
		var chart6 = new CanvasJS.Chart("chartContainer6",{
			title :{text: "Heart Rate"},
			data: [{type: "line",dataPoints: dps6}]
		});
		chart6.render();
		numA6 = numArray;
		setInterval(function(){updateChartData(xVal6,yVal6,dps6,chart6,1,numA6)}, updateInterval);
		console.log(numArray);
		numArray++;

  case 4:
    	var dps7 = []; var xVal7 = 0; var yVal7 = 100;
		var chart7 = new CanvasJS.Chart("chartContainer7",{
			title :{text: "Heart Rate"},
			data: [{type: "line",dataPoints: dps7}]
		});
		chart7.render();
		numA7 = numArray;
		setInterval(function(){updateChartData(xVal7,yVal7,dps7,chart7,1,numA7)}, updateInterval);
		//console.log(numArray);
		numArray++;
  case 3:
		var dps8 = [];  var xVal8 = 0; var yVal8 = 100; 
		numA8 = numArray;
		var chart8 = new CanvasJS.Chart("chartContainer8",{
			title :{text: "Heart Rate"},
			data: [{type: "line",dataPoints: dps8}]
		});
		chart8.render();
		setInterval(function(){updateChartData(xVal8,yVal8,dps8,chart8,1,numA8)}, updateInterval);
		//console.log(numArray);
		numArray++;
	
  case 2:
    	var dps9 = []; var xVal9 = 0; var yVal9 = 100;
		var chart9 = new CanvasJS.Chart("chartContainer9",{
			title :{text: "Heart Rate"},
			data: [{type: "line",dataPoints: dps9}]
		});
		chart9.render();
		numA9 = numArray;
		setInterval(function(){updateChartData(xVal9,yVal9,dps9,chart9,1,numA9)}, updateInterval);
		//console.log(numArray);
		numArray++;
		
  case 1:
		var dps10 = []; var xVal10 = 0; var yVal10 = 100;
		var chart10 = new CanvasJS.Chart("chartContainer10",{
			title :{text: "Heart Rate"},
			data: [{type: "line",dataPoints: dps10}]
		});
		chart10.render();	
		numA10 = numArray;		
		setInterval(function(){updateChartData(xVal10,yVal10,dps10,chart10,1,numA10)}, updateInterval);
		//console.log(numArray);
	
  default:
    console.log('Please pick a number of your trainee (10)!');
}

	 //ข้อมูลจริง
	 var updateChartData = function (xVal,yVal,dps,chart,count,pArr) {
			count = count;
			// count is number of times loop runs to generate random dataPoints.
		 	$.ajax({
        	url: '/testgetdata.php',
        	method: 'GET'
      		}).done(function(response) {
      			//console.log(response);
      			var json = JSON.parse(response);
      
	      		for(var i=0; i<numTrainee; i++) {
					//เอาข้อมูลลง array 
					traineeName.push(json[i].trainee_name);
					
				}
				chart.options.title.text = "Heart rate trainee : " + traineeName[pArr];
				//console.log(traineeName[pArr]);
				
			
				for (var j = 0; j < count; j++) {
					console.log("pArr : "+pArr);
					yVal = parseInt(json[pArr].trainee_hr);
      				console.log("hr : "+yVal);
					dps.push({
						x: new Date(),
						y: yVal
					});
					xVal++;
				};
				if (dps.length > dataLength)
				{
					dps.shift();
				}

				chart.render();

		});
	 };
	


	}
	
	</script>
	<script type="text/javascript" src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>



<?php 
	$numTrainee = $number;//2;
	switch($numTrainee){
		case 10 : ?> <div id="chartContainer1" style="height: 300px; width:100%;"></div> <?php
		case 9 : ?> <div id="chartContainer2" style="height: 300px; width:100%;"></div> <?php
		case 8 : ?> <div id="chartContainer3" style="height: 300px; width:100%;"></div> <?php
		case 7 : ?> <div id="chartContainer4" style="height: 300px; width:100%;"></div> <?php
		case 6 : ?> <div id="chartContainer5" style="height: 300px; width:100%;"></div> <?php
		case 5 : ?> <div id="chartContainer6" style="height: 300px; width:100%;"></div> <?php
		case 4 : ?> <div id="chartContainer7" style="height: 300px; width:100%;"></div> <?php
		case 3 : ?> <div id="chartContainer8" style="height: 300px; width:100%;"></div> <?php
		case 2 : ?> <div id="chartContainer9" style="height: 300px; width:100%;"></div> <?php
		case 1 : ?> <div id="chartContainer10" style="height: 300px; width:100%;"></div> <?php
		default: echo "html 10 chart";
	} 
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
