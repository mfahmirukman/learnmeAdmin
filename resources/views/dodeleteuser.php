<?php

$link = mysqli_connect('localhost', 'root', '','school');
session_start();

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$classname = $_POST['classid'];
$role = $_POST['role'];

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$parts = explode('=', $actual_link);
			$value = $parts[count($parts) - 1];

$user_id =  $value;


$query = mysqli_query($link, "DELETE FROM users where id='".$user_id."'");
header('location:userlist.php?msg="User was successfully deleted');


		
		