<?php

$link = mysqli_connect('localhost', 'root', '','school');
session_start();

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$classname = $_POST['classid'];


//if (strpos($a, 'are') !== false) {
 //   echo 'true';
//}



$link->query($query_cat); 

//$query2 = mysqli_query($link,"UPDATE users SET name='".$fullname."'WHERE id='".$user_id."'") or die(mysqli_error()); //, email ='".$email."', class_id ='".$classname."', role= '".$role."' 
$role = $_POST['role'];

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$parts = explode('=', $actual_link);
			$value = $parts[count($parts) - 1];

$user_id =  $value;

$query = mysqli_query($link, "SELECT * from classes where class_name ='".$classname."'");
$classid = "";

while($result = mysqli_fetch_array($query)) {
	$classid = $result['id'];
}

$query_check = mysqli_query($link, "SELECT * FROM users INNER JOIN classes ON users.class_id = classes.id where users.id='".$user_id."'");
$user_check = mysqli_fetch_array($query_check);




if($fullname == "" || $fullname== NULL) {//set new value with original value from database (full name)

	$fullname = $user_check['name'];
	//header('location:doedituser.php?error=old name is'.$fullname);
	$query2 = mysqli_query($link,"UPDATE users SET name='".$fullname."'WHERE id='".$user_id."'") or die(mysqli_error()); //, email ='".$email."', class_id ='".$classname."', role= '".$role."' 
										
	$link->query($query2); 
						
   
} else {
	//header('location:doedituser.php?error=old name is'.$fullname);
	$query2 = mysqli_query($link,"UPDATE users SET name='".$fullname."'WHERE id='".$user_id."'") or die(mysqli_error()); //, email ='".$email."', class_id ='".$classname."', role= '".$role."' 
										
	$link->query($query2); 
	 header("location:edituser.php?msg=Success");
}




if($email == "" || $email== NULL) { //set new value with original value from database (e-mail)
		$email = $user_check['email'];

	//header('location:doedituser.php?error=old name is'.$fullname);
	$query2 = mysqli_query($link,"UPDATE users SET email='".$email."'WHERE id='".$user_id."'") or die(mysqli_error()); //, email ='".$email."', class_id ='".$classname."', role= '".$role."' 
										
	$link->query($query2); 
} else {
	$query3 = mysqli_query($link, "SELECT * FROM users where email='".$email."'");
	$email_check = mysqli_fetch_array($query3);
	
	if($email_check){
		header("location:edituser.php?error=email is already in the database");
	} else {
	//header('location:doedituser.php?error=old name is'.$fullname);
	$query2 = mysqli_query($link,"UPDATE users SET email='".$email."'WHERE id='".$user_id."'") or die(mysqli_error()); //, email ='".$email."', class_id ='".$classname."', role= '".$role."' 
										
	$link->query($query2); 
	 header("location:edituser.php?msg=Success");
	}
}


if($classname == "" || $classname== NULL) { //set new value with original value from database (e-mail)//setting class value (cannot be empty since it's a select type)
	$classid = $user_check['class_id'];
	$query2 = mysqli_query($link,"UPDATE users SET class_id='".$classid."'WHERE id='".$user_id."'") or die(mysqli_error()); //, email ='".$email."', class_id ='".$classname."', role= '".$role."' 
	
	$cat = 0;
	if(strpos($classname, 'IPA') !== false) {
		$cat = 1;
		$query_cat = mysqli_query($link, "update users set category_id ='".$cat."' where id = '".$user_id."'") or die(mysqli_error());

		$link->query($query_cat);	
	} else {
		$cat = 2;
		$query_cat = mysqli_query($link, "update users set category_id ='".$cat."' where id = '".$user_id."'") or die(mysqli_error());

		$link->query($query_cat);	
	}
									
	$link->query($query2); 
} else {
	$query2 = mysqli_query($link,"UPDATE users SET class_id='".$classid."'WHERE id='".$user_id."'") or die(mysqli_error()); //, email ='".$email."', class_id ='".$classname."', role= '".$role."' 
									
$link->query($query2); 

$cat = 0;
	if(strpos($classname, 'IPA') !== false) {
		$cat = 1;
		$query_cat = mysqli_query($link, "update users set category_id ='".$cat."' where id = '".$user_id."'") or die(mysqli_error());

		$link->query($query_cat);	
	} else {
		$cat = 2;
		$query_cat = mysqli_query($link, "update users set category_id ='".$cat."' where id = '".$user_id."'") or die(mysqli_error());

		$link->query($query_cat);	
	}
	header("location:edituser.php?msg=Success");
}
	
if($role == "" || $role== NULL) { //set new value with original value from database (e-mail)
	$role = $user_check['role'];
	$query2 = mysqli_query($link,"UPDATE users SET role='".$role."'WHERE id='".$user_id."'") or die(mysqli_error()); //, email ='".$email."', class_id ='".$classname."', role= '".$role."' 
										
	$link->query($query2);
	
} else {
	//setting role value (cannot be empty since it's a select type)
	$query3 = mysqli_query($link,"UPDATE users SET role='".$role."'WHERE id='".$user_id."'") or die(mysqli_error()); //, email ='".$email."', class_id ='".$classname."', role= '".$role."' 
										
	$link->query($query3); 
	
	header("location:edituser.php?msg=Success");
}


	



		
		