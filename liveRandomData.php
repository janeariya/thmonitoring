<!DOCTYPE HTML>
<html>

<head>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script type="text/javascript">
	window.onload = function () {

		var dps = []; // dataPoints

		var chart = new CanvasJS.Chart("chartContainer",{
			title :{
				text: "Live Random Data"
			},
			data: [{
				type: "line",
				dataPoints: dps
			}]
		});

		var xVal = 0;
		var yVal = 100;
		var updateInterval =5000;
		var dataLength = 10; // number of dataPoints visible at any point

		var updateChart = function (count) {
			count = count || 1;
			// count is number of times loop runs to generate random dataPoints.
      $.ajax({
        url: '/testGetDataToGraph.php',
        method: 'GET'
      }).done(function(response) {
        for (var j = 0; j < count; j++) {
          yVal = parseInt(response);
          console.log(yVal);
          console.log(xVal);
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
        updateChart(dataLength);
      });
		};

		// generates first set of dataPoints
		updateChart(dataLength);

		// update chart after specified time.

	}
	</script>
	<script type="text/javascript" src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body>
	<div id="chartContainer" style="height: 300px; width:100%;">
	</div>
</body>
</html>
