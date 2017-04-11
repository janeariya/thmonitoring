<?php
	include 'user_menu.php';
?>

  <!-- Monitoring -->
  <div class="w3-container" id="monitoring" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-blue-grey"><b>Monitoring.</b></h1>
    <hr style="width:50px;border:5px solid #607d8b" class="w3-round">
  </div>
  
 
 
 <?php
	session_start();
	include 'dbcon.php';
	
	//trainer
	$strSQL = "SELECT * FROM user WHERE user_id = '".$_SESSION['user_id']."' ";
	$objQuery = mysqli_query($condb,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	
	$numT = "SELECT workout.trainee_id,trainee.trainee_name,trainee.trainee_gender,floor(datediff(curdate(),trainee_birthdate) / 365) AS trainee_age,workout.trainee_hr FROM workout,trainee WHERE workout.trainee_id = trainee.trainee_id AND timestamp IN (SELECT MAX(timestamp) FROM workout WHERE  timestamp >= now() - interval 15 minute AND trainee_id IN (SELECT trainee_id FROM trainerAndTrainee WHERE trainer_id = ".$_SESSION["user_id"].") group by trainee_id) order by trainee_id";
	$resultnumT = mysqli_query($condb, $numT);
	$number = mysqli_num_rows($resultnumT);
	//echo $number;
	
?>
	<!--print trainer name-->
	<div class="w3-group">
        <h4 class="w3-opacity"><b>Trainer Name : <?php echo $objResult["user_name"] ?> </b></h4>
   	</div>
  
  
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script type="text/javascript">
	window.onload = function () {

	//test switch case 10
	var numTrainee = <?php echo $number; ?>;   //2; //count of chart
	console.log("numTrainee : "+numTrainee);
	var updateInterval = 15000; //update every updateInterval
	var dataLength = 20; // number of dataPoints visible at any point
	var numArray = 0;
	var numA1,numA2,numA3,numA4,numA5,numA6,numA7,numA8,numA9,numA10 ;
	var traineeName = [];
	var totalrow = numTrainee;
	
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
			subtitles: [{text: "Trainee Name : ",fontSize: 20,fontFamily: "Courier New", horizontalAlign: "left"},	{text: "Heart Rate : ",fontSize: 20 , fontFamily: "Courier New" , horizontalAlign: "left" },	{text: "Zone : ",fontSize: 20,fontFamily: "Courier New" , horizontalAlign: "left"}],
			data: [{type: "line",dataPoints: dps8}]
		});
		chart8.render();
		setInterval(function(){updateChartData(xVal8,yVal8,dps8,chart8,1,numA8)}, updateInterval);
		//console.log(numArray);
		numArray++;
	
  case 2:
    	var dps9 = []; var xVal9 = 0; var yVal9 = 100;
		var chart9 = new CanvasJS.Chart("chartContainer9",{
			subtitles: [{text: "Trainee Name : ",fontSize: 20,fontFamily: "Courier New", horizontalAlign: "left"},	{text: "Heart Rate : ",fontSize: 20 , fontFamily: "Courier New" , horizontalAlign: "left"},	{text: "Zone : ",fontSize: 20,fontFamily: "Courier New" , horizontalAlign: "left"}],
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
			subtitles: [{text: "Trainee Name : ",fontSize: 20,fontFamily: "Courier New", horizontalAlign: "left"},	{text: "Heart Rate : ",fontSize: 20 , fontFamily: "Courier New" , horizontalAlign: "left"},	{text: "Zone : ",fontSize: 20,fontFamily: "Courier New" , horizontalAlign: "left"}],
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
      			
      			if(totalrow != json[pArr].row){
      				totalrow = json[pArr].row;
      				location.reload();
      			}
      
				//chart.options.title.text = "Trainee Name : " + json[pArr].trainee_name;
				chart.subtitles[0].set("text","Trainee Name : " + json[pArr].trainee_name);
				chart.subtitles[1].set("text","Heart Rate : " + json[pArr].trainee_hr);
				chart.subtitles[2].set("text","Zone : " + calzone(json[pArr].trainee_gender,json[pArr].trainee_hr,json[pArr].trainee_age,json[pArr].trainee_name) );
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
	 
	var calzone = function(gender,hr,age,name){
		
		var maxHR=0;
		
		if(gender ==0){
		  maxHR = 212.9 - (0.67*age);
		}else{
		  maxHR = 206.9 - (0.67*age);
		}
		
		if(hr>maxHR){
			alert("Trainee : " + name +  "\n Heart rate exceeding maximum heart rate with : " + hr);
		}
		
		if(hr >= (90/100)*maxHR){
		  zone = 5;
		}else if((hr >= (80/100)*maxHR)&&(hr < (90/100)*maxHR)){
		  zone = 4;
		}else if((hr >= (70/100)*maxHR)&&(hr < (80/100)*maxHR)){
		  zone = 3;
		}else if((hr >= (60/100)*maxHR)&&(hr < (70/100)*maxHR)){
		  zone = 2;
		}else if((hr >= (50/100)*maxHR)&&(hr < (60/100)*maxHR)){
		  zone = 1;
		}
		
		return zone;
	}


	}
	
	</script>
	<script type="text/javascript" src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>



<?php 
	$numTrainee = $number;//2;
	switch($numTrainee){
		case 10 : ?> <div id="chartContainer1" style="height: 300px; width:100%;"></div><br> <?php
		case 9 : ?> <div id="chartContainer2" style="height: 300px; width:100%;"></div><br> <?php
		case 8 : ?> <div id="chartContainer3" style="height: 300px; width:100%;"></div><br> <?php
		case 7 : ?> <div id="chartContainer4" style="height: 300px; width:100%;"></div><br> <?php
		case 6 : ?> <div id="chartContainer5" style="height: 300px; width:100%;"></div><br> <?php
		case 5 : ?> <div id="chartContainer6" style="height: 300px; width:100%;"></div><br> <?php
		case 4 : ?> <div id="chartContainer7" style="height: 300px; width:100%;"></div><br> <?php
		case 3 : ?> <div id="chartContainer8" style="height: 300px; width:100%;"></div><br> <?php 
		case 2 : ?> <div id="chartContainer9" style="height: 300px; width:100%;"></div><br> <?php
		case 1 : ?> <div id="chartContainer10" style="height: 300px; width:100%;"></div><br> <?php
		default: echo "";
	} 
?>	



<!-- End page content -->
<!-- End page content -->

<?php
	include 'footpage.php';
?>

