<?php
	include 'assets/dependencies/session.php';
	session_start();
	session_destroy();
	header('location: login.php');
	exit(); 
?>