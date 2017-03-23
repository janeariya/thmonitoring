<?php
	session_start();
	if($_SESSION['user_id'] == "")
	{
		echo "Please Login!";
		exit();
	}	
	
	//$condb = mysqli_connect("us-cdbr-iron-east-04.cleardb.net","ba7e6dcfa1653e","5ddeaaf0","ad_67c8190313684df","3306");
	include 'dbcon.php';
	$strSQL = "SELECT * FROM user WHERE user_id = '".$_SESSION['user_id']."' ";
	
	$objQuery = mysqli_query($condb,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	
	mysqli_close($condb);
?>

<?php
	include 'user_menu.php';
?>

  <!-- Home -->
  <div class="w3-container" style="margin-top:80px" id="home">
    <!--<h1 class="w3-jumbo"><b>Interior Design</b></h1>-->
    <h1 class="w3-xxxlarge w3-text-blue-grey"><b>Home.</b></h1>
    <hr style="width:50px;border:5px solid #607d8b" class="w3-round">
     <h5 class="w3-opacity"><b> <?php echo $objResult["user_name"] ?> </b></h5>
  </div>
  

<!-- End page content -->

<?php
	include 'footpage.php';
?>
