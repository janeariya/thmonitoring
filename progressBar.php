      	<?php 
      	include 'dbcon.php';
      	 $query = "SELECT trainee_id, trainee_weight, trainee_height, trainee_age FROM trainee WHERE trainee_id =".$_POST["id"];
		 $exec = mysqli_query($condb,$query);
		 while($row = mysqli_fetch_array($exec)){
 			echo "['".$row['trainee_id']."',".$row['trainee_weight'].",".$row['trainee_height'].",".$row['trainee_age']."],";
 		}
      	?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses', 'Profit'],
        // ['2014', 1000, 400, 200],
        //  ['2015', 1170, 460, 250],
        //  ['2016', 660, 1120, 300],
        //  ['2017', 1030, 540, 350]
      	<?php 
      	include 'dbcon.php';
      	 $query = "SELECT trainee_id, trainee_weight, trainee_height, trainee_age FROM trainee";
		 $exec = mysqli_query($condb,$query);
		 while($row = mysqli_fetch_array($exec)){
 			echo "['".$row['trainee_id']."',".$row['trainee_weight'].",".$row['trainee_height'].",".$row['trainee_age']."],";
 		}
 			mysqli_close($condb);
      	?>
       
       ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>