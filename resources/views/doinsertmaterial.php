<?php

$link = mysqli_connect('localhost', 'root', '','school');
session_start();

$chapter = $_POST['chapter'];
$classnum = $_POST['class'];
$course = $_POST['course'];
$course_id = mysqli_query($link, "SELECT id FROM course_name where name = '".$course."'");
$description = $_POST['description'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$classname = $_POST['classid'];
$role = $_POST['role'];
$query = mysqli_query($link, "SELECT * from course_name where name ='".$classid."'");



if($chapter == "" || $chapter== NULL) {
	header("location:insertuser.php?error=Must input full name!");
} else {
	if($email == "" || $email== NULL) {
		header("location:insertuser.php?error=Must input email!");
	} else {
		if($password == "" || $password == NULL) {
			header("location:insertuser.php?error=Must input password!");
		} else {
			if($classid == "Select") {
				header("location:insertuser.php?error=Must select class");
			} else {
				if($role == "") {
					header("location:insertuser.php?error=Must select role");
				} else {
					$category = 0;
					if (strpos($classname,'IPA') !== false) {
						$category = 1;
					} else if(strpos($classname, 'IPS') !== false) {
						$category = 2;
					}
					$query_check = mysqli_query($link, "SELECT * from users where email = '".$email."'");
					$check = mysqli_fetch_array($query_check);
					if($check == false){
					$query = mysqli_query($link,"INSERT users (name, email, password, class_id, category_id, role) VALUES ('".$fullname."','".$email."','".$password."','".$classid."','".$category."','".$role."')");
					
						$link->query($query2); 
						header("location:insertuser.php?msg=Success");
					} else {
						header("location:insertuser.php?msg=There's already an e-mail like that");
					}
					
					
					
				}
			}
		}
		}
	}	