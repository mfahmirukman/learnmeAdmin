<?php

$link = mysqli_connect('localhost', 'root', '','school');
session_start();

$classname = $_POST['classname'];


$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$parts = explode('=', $actual_link);
			$value = $parts[count($parts) - 1];

$class_id =  $value;

$query_check = mysqli_query($link, "SELECT * FROM classes where id ='".$class_id ."'");
$user_check = mysqli_fetch_array($query_check);




if($classname == "" || $classname== NULL) {//set new value with original value from database (full name)

	$classname = $user_check['class_name'];
	//header('location:doedituser.php?error=old name is'.$fullname);
	$query2 = mysqli_query($link,"UPDATE classes SET class_name='".$classname."'WHERE id='".$class_id."'") or die(mysqli_error()); //, email ='".$email."', class_id ='".$classname."', role= '".$role."' 
										
	$link->query($query2); 
	header("location:editclass.php?msg=Nothing was changed");
						
   
} else {
	//header('location:doedituser.php?error=old name is'.$fullname);
	$query2 = mysqli_query($link,"UPDATE classes SET class_name='".$classname."'WHERE id='".$class_id."'") or die(mysqli_error()); //, email ='".$email."', class_id ='".$classname."', role= '".$role."' 
										
	$link->query($query2); 
	 header("location:editclass.php?msg=Success");
}



if($classname == "" || $classname== NULL) { //set new value with original value from database (e-mail)//setting class value (cannot be empty since it's a select type)
	$classid = $user_check['class_id'];
	$query2 = mysqli_query($link,"UPDATE users SET class_id='".$classid."'WHERE id='".$user_id."'") or die(mysqli_error()); //, email ='".$email."', class_id ='".$classname."', role= '".$role."' 
										
	$link->query($query2); 
	
	
} else {
	$query2 = mysqli_query($link,"UPDATE users SET class_id='".$classid."'WHERE id='".$user_id."'") or die(mysqli_error()); //, email ='".$email."', class_id ='".$classname."', role= '".$role."' 
									
$link->query($query2); 
	header("location:classlist.php?msg=Success");
}

		