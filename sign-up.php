<?php 

include 'check.php'
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Euro finance tracker sign up</title>
	<!--<link rel="stylesheet" type="text/css" href="./css/sign-up.css"> -->
	    <!-- CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Fonts  -->
	<link href="css/fontawesome.min.css">
</head>
<body>
	<section>
		<p class="first">euros.com</p>
		<p class="first_1">Analyse your financial habits, save more money!</p>
		<div class="sign-up">
			<div id="display">
				
					<?= $message?>
					
			</div>
			<h2 class = "pbtm-s sw-50 align_text_left">SIGN UP</h2>
			<br>
			<form class="sw-50" id="sign-up-form" method = "POST" action="<?=$_SERVER['SCRIPT_NAME']?>">				
				<div class="form-group">
                    <label for="InputName">First Name</label>
                    <input type="text" class="form-control" name="firstname" id="InputFirstName" aria-describedby="firstnameHelp" placeholder="Enter first Name" required>
				</div>

				<div class="form-group">
                    <label for="InputName">Last Name</label>
                    <input type="text" class="form-control" name="lastname" id="InputLastName" aria-describedby="lastnameHelp" placeholder="Enter last Name" required>
				</div>	

				<div class="form-group">
                    <label for="InputName">Email address</label>
                    <input type="text" class="form-control" name="email" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email address" required>
				</div>	
				<div class="form-group">
					<label for="InputPassword1">Password</label>
					<input type="password" class="form-control" name="password" id="InputPassword" placeholder="Password" min="8" required>
				</div>

				<div class="form-group">
					<label for="InputPassword1">Repeat Password</label>
					<input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm Password" min="8" required>
				</div>
				<div class="pbtm-s">
					<label>
						<input type="checkbox" checked="checked" name="remember"> Remember me
					</label>
				</div>
				<input type="submit" id="button" class="btn-black btn-lg btn-block" name="submit" value='SIGN UP' onclick="return validate()">
			</form>
	</section>


	<script src="index.js"></script>
	<script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
  
 </body>
</html>