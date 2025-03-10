<!DOCTYPE html>
<html lang="en">
<head>
<title>NIS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/s">
    <link rel="stylesheet" href="css/utilities.css">
    <link rel="stylesheet" href="css/styles.css">
	  <!-- Favicon -->
	  <link rel="icon" href="images/favicon.ico" type="image/ico">  

<!--===============================================================================================-->
<?php
  	session_start();
    if(isset($_SESSION['teacher'])){
      header('location: index.php');
	}
	
	include 'changepass.php';
?>
</head>
<body>
	<div class="limiter">
	<div class="container-login100 overlay" style="background-image: url('images/lgss3c.jpg')">
			<div class="wrap-login100 p-t-100 p-b-30">
				<form class="login100-form validate-form" action="changePassword.php" method="post">
					<div class="login100-form-avatar">
					<img src="images/LLGSSlogo2.png" alt="AVATAR">
					</div>
					<span class="login100-form-title p-t-20 p-b-45">
						Change Password
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username" maxlength="20">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="curr_password" placeholder="Old Password" maxlength="20">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="new_password" placeholder="New Password" maxlength="20">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="conf_password" placeholder="Confirm Password" maxlength="20">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10 p-b-20">
						<button class="login100-form-btn" type="submit" name="changepass">
							Save
						</button>
					</div>

					<div class="login100-form-alert p-t-10 p-b-10">
					<?php
  		if(isset($_SESSION['error'])){
			echo "
			<div class='text-center'>
			<div class='container-login100-form-btn p-t-10'>
						<button class='login100-form-btn1'>
						<p>".$_SESSION['error']."</p> 
						</button>
					</div>
			</div>
		";
		unset($_SESSION['error']);
	}
	if(isset($_SESSION['success'])){
		echo "
		<div class='text-center'>
		<div class='container-login100-form-btn p-t-10'>
					<button class='login100-form-btn2'>
					<p>".$_SESSION['success']."</p> 
					</button>
				</div>
		</div>
	";
	unset($_SESSION['success']);
}
  	?>
					</div>

					<div class="text-center w-full">
						<a class="txt1" href="login.php">
                            <i class="fa fa-long-arrow-left"></i>
							 Login		
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>