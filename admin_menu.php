<?php
	session_start();
	if($_SESSION['user_id'] == "")
	{
		echo "Please Login!";
		exit();
	}	
	
?>

<!DOCTYPE html>
<html>
<title>Health Monitoring</title>
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
  <a href="/admin_page.php#addTrainer" onclick="w3_close()" class="w3-padding w3-hover-white">Add Trainer</a> 
  <a href="/admin_addTrainee.php#addTrainee" onclick="w3_close()" class="w3-padding w3-hover-white">Add Trainee</a> 
  <a href="/admin_match.php#match" onclick="w3_close()" class="w3-padding w3-hover-white">Match</a> 
  <a href="/admin_trainerInfo.php#trainerInfo" onclick="w3_close()" class="w3-padding w3-hover-white">Trainer Information</a> 
  <a href="/admin_traineeInfo.php#traineeInfo" onclick="w3_close()" class="w3-padding w3-hover-white">Trainee Informaion</a> 
  <a href="/admin_matchInfo.php#matchInfo" onclick="w3_close()" class="w3-padding w3-hover-white">Match Informaion</a> 
  <a href="https://watsoniotplatform.mybluemix.net" onclick="w3_close()" class="w3-padding w3-hover-white"  target="_blank">Add Device</a> 
  <a href="/logout.php" onclick="w3_close()" class="w3-padding w3-hover-white">Logout</a>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-blue-grey w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-btn w3-blue-grey w3-border w3-border-white w3-margin-right" onclick="w3_open()">☰</a>
  <span>Health Monitoring</span>
</header>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">