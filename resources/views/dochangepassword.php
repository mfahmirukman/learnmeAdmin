<?php

$link = mysqli_connect('localhost', 'root', '','school');
session_start();

$oldpw = $_POST['oldpw'];
$newpw = $_POST['newpw'];
$confpw = $_POST['confpw'];
$username = $_SESSION['username'];

if($oldpw == "" || $oldpw== NULL) {
	header("location:changepassword.php?error=Must Input Old Password");
} else {
	if($newpw == "" || $newpw== NULL) {
		header("location:changepassword.php?error=Must Input New Password");
	} else {
		if($confpw == "" || $confpw == NULL) {
			header("location:changepassword.php?error=Must Confirm Password");
		} else {
			if($newpw == $confpw) {
				$query = mysqli_query($link,"SELECT * FROM admin where username ='".$username."' AND password ='".$oldpw."'");
				if(mysqli_num_rows($query) > 0){
					$query2 = mysqli_query($link, "UPDATE admin set password = '".$newpw."' WHERE username='".$username."'");
					$link->query($query2); 
					header("location:changepassword.php?msg=Success changing password");
				} else {
					header("location:changepassword.php?error=Password doesn't match with current user");
				}
			}
		}
	}
}
			