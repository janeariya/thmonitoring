<html>
<head>
	<title>Health Monitoring</title>
		<meta charset="utf-8">
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
</head>
<body>
	 <!-----start-main---->
	 <div class="main">
		<div class="login-form">
			<h1>Member Login</h1>
					<div class="head">
						<img src="images/user3.png" alt=""/>
					</div>
				<form name="form1" method="post" action="check_login.php">
						<input type="text" name="txtUsername" class="text" value="USERNAME" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'USERNAME';}" >
						<input type="password" name="txtPassword" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
						<div class="submit">
							<input type="submit" name="Submit" onclick="myFunction()" value="LOGIN" >
					</div>
					<!--<p><a href="#">Forgot Password ?</a></p>-->
				</form>
			</div>
			<!--//End-login-form-->
			 <!-----start-copyright---->
   					<div class="copy-right">
						<!--<p>Template by <a href="http://w3layouts.com">w3layouts</a></p> -->
					</div>
				<!-----//end-copyright---->
		</div>
			 <!-----//end-main---->

</body>
</html>