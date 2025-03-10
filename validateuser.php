<?php
session_start();
include 'assets/connection/condb.php';

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE username= '$username'";
	$query = $db->query($sql);

	if ($query->num_rows < 1) {
		$_SESSION['error'] = 'Wrong Credentials ';
	} else {
		$row = $query->fetch_assoc();
		if (password_verify($password, $row['userpassword'])) {
			$_SESSION['hr'] = $row['userid'];
		} else {
			$_SESSION['error'] = 'Wrong Credentials';
		}
	}
} else {
	$_SESSION['error'] = 'Input user credentials first';
}

header('location: login.php');
