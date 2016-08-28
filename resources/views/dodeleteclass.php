<?php

$link = mysqli_connect('localhost', 'root', '','school');
session_start();

$classname = $_POST['classname'];

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$parts = explode('=', $actual_link);
			$value = $parts[count($parts) - 1];
$class_id =  $value;


$query = mysqli_query($link, "DELETE FROM classes where id='".$class_id."'");
header('location:classlist.php?msg="Class was successfully deleted');


		
		