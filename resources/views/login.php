<?php 
	$link = mysqli_connect('localhost','root','', 'school');
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];

	
	if(($username == NULL || $username == '') && ($password == NULL || $password == ''))
	{
		header('location:admin.php?error=Username and Password Must Be Filled');
	}
	else if($username == NULL || $username == '')
	{
		header('location:admin.php?error=Username Must Be Filled');
	}
	else if($password == NULL || $password == '')
	{
		header('location:admin.php?error=Password Must Be Filled');
	}
	else
	{
		$check_user = mysqli_query($link, "SELECT * FROM admin WHERE username = '".$username."' AND password = '".$password."'");
		
		if(mysqli_num_rows($check_user) > 0)
		{
			$_SESSION['username'] = $username;
			header('location:admin.php?msg='.$_SESSION['username']);
		}
		else
		{
			
			header('location:admin.php?error=Wrong ID/Password');
			
		}
	}