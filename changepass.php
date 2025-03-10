<?php
include 'assets/include/db_connect.php';

	if(isset($_POST['changepass'])){
        $username = $_POST['username'];
		$curr_password = $_POST['curr_password'];
		$newpass = $_POST['new_password'];
		$conf_password = $_POST['conf_password'];

				
		$sql = "SELECT * FROM teachers WHERE username= '$username'";
		$query = $con->query($sql);

		if($query->num_rows < 1){
			$query = null;
			$_SESSION['error'] = 'Invalid Credentials';
		}
		else{
			$row = $query->fetch_assoc();

	if(password_verify($curr_password, $row['password'])){
	if($newpass == $conf_password){
	if($newpass == $row['password']){
		$newpass = $row['password'];
	}
	else{
		$newpass  = password_hash($newpass, PASSWORD_DEFAULT);
	}

	$sql = "UPDATE teachers SET password = '$newpass' WHERE id = '".$row['id']."'";
	if($con->query($sql)){
	$_SESSION['success'] = 'Password Changed successfully';
	}
	else{
		$_SESSION['error'] = 'Change Password Failed';
	}
	
}
else{
	$_SESSION['error'] = 'Password dont much';
}
}
else{
	$_SESSION['error'] = 'Invalid Credentials';
}
	}
}
?>