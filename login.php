<!doctype html>
<html>
<?php
session_start();
if (isset($_SESSION['hr'])) {
    header('location: index.php');
}
?>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>NIC Login</title>
    <link href='assets/css/login/bootstrap.min.css' rel='stylesheet'>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.jpg">
    <link rel="stylesheet" href="assets/css/login/login.css">

    <script type='text/javascript' src=''></script>
    <script type='text/javascript' src='assets/js/login/popper.min.js'></script>
    <script type='text/javascript' src='assets/js/login/bootstrap.min.js'></script>
</head>

<body oncontextmenu='return false' class='snippet-body'>
    <section class="body">
        <div class="container">
            <div class="login-box justify-content-center">
                <div class="row justify-content-center">
                    <div class="col-sm-6">
                        <div class="logo">
                            <span class="logo-font"></span><img src="assets/img/logo.png" alt="" height="40%" width="40%">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-6">
                        <h4 class="header-title text-white">NIC LOGIN</h4>

                        <?php
                        if (isset($_SESSION['error'])) {
                            echo "
			                        <div class='text-center'>
			                        <div style='color:red'>
				
						            <p>" . $_SESSION['error'] . "</p> 
					
					            </div>
			                    </div>
		                        ";
                            unset($_SESSION['error']);
                        }
                        ?>
                        <form class="login-form" action="validateuser.php" method="post">
                            <div class="form-group">

                                <input type="text" class="form-control" name="username" placeholder="Username" maxlength="20" autocomplete="on">
                            </div>
                            <div class="form-group">
                                <input type="Password" class="form-control" name="password" placeholder="Password" maxlength="20">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit" name="login">LOGIN</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script type='text/javascript'></script>
</body>

</html>