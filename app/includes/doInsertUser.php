<?php

	$link = mysqli_connect('localhost', 'root', '', 'school');
	start_session();

	$username = $_POST['email'];
	$class = $_POST['class'];
	$fullname = $_POST['name'];
	$password = $_POST['password'];
	$role = $_POST['role'];


	if(!empty($_POST['password'])) {
		header('location:insertDoctor.php?error=Please Input a Password');
	} else if($username == '' || $username == NULL) {
		header('location:insertDoctor.php?error=Please Input an E-mail');
	}


