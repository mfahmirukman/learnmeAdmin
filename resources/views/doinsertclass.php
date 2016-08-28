<?php

$link = mysqli_connect('localhost', 'root', '','school');
session_start();

$classname = $_POST['classname'];



if($classname == "" || $classname== NULL) {
	header("location:insertclass.php?error=Must input class name!");
} else {

	$query_check = mysqli_query($link, "SELECT * from classes where class_name = '".$classname."'");
	$check = mysqli_fetch_array($query_check);
	if($check == false){
	$query = mysqli_query($link,"INSERT classes (class_name) VALUES ('".$classname."')");
	
		$link->query($query2); 
		header("location:insertclass.php?msg=Success");
	} else {
		header("location:insertclass.php?msg=There's already a class like that");
	}
	
}
