<?php

$link = mysqli_connect('localhost', 'root', '','school');
session_start();

$title = $_POST['title'];
$body = $_POST['body'];
$course_name = $_POST['courseid'];

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$parts = explode('=', $actual_link);
			$value = $parts[count($parts) - 1];

$thread_id =  $value;

$cat_query = mysqli_query($link, "SELECT * FROM users INNER JOIN threads ON users.id = threads.name_id where threads.id='".$thread_id."'");
$cat_result = mysqli_fetch_array($cat_query);
$category = $cat_result['category_id'];

$course_query = mysqli_query($link, "SELECT course_name.id FROM course_name where course_name.category_id ='".$category."' AND course_name.name ='".$course_name."'");
$course_result = mysqli_fetch_array($course_query);
$course_id = $course_result['id'];

$query_check = mysqli_query($link, "SELECT * FROM threads INNER JOIN course_name ON threads.courses_id = course_name.id where threads.id='".$thread_id."'");
$user_check = mysqli_fetch_array($query_check);




if($title == "" || $title== NULL) {//set new value with original value from database (title name)

	$title = $user_check['title'];
	//header('location:doedituser.php?error=old name is'.$fullname);
	$query2 = mysqli_query($link,"UPDATE threads SET title='".$title."' WHERE threads.id='".$thread_id."'") or die(mysqli_error()); //, email ='".$email."', class_id ='".$classname."', role= '".$role."' 
										
	$link->query($query2); 
}  else {
	//header('location:doedituser.php?error=old name is'.$fullname);
	$query2 = mysqli_query($link,"UPDATE threads SET title='".$title."' WHERE threads.id='".$thread_id."'") or die(mysqli_error()); //, email ='".$email."', class_id ='".$classname."', role= '".$role."' 
										
	$link->query($query2); 
}


if($body == "" || $body == NULL) {//set new value with original value from database (title name)

	$body = $user_check['body'];
	//header('location:doedituser.php?error=old name is'.$fullname);
	$query2 = mysqli_query($link,"UPDATE threads SET body='".$body."' WHERE threads.id='".$thread_id."'") or die(mysqli_error()); //, email ='".$email."', class_id ='".$classname."', role= '".$role."' 
										
	$link->query($query2); 
}  else {
	$query2 = mysqli_query($link,"UPDATE threads SET body='".$body."' WHERE threads.id='".$thread_id."'") or die(mysqli_error()); //, email ='".$email."', class_id ='".$classname."', role= '".$role."' 
	
}

//course selection
$course_query2 = mysqli_query($link,"UPDATE threads SET threads.courses_id='".$course_id."'WHERE threads.id='".$thread_id."'") or die(mysqli_error()); //, email ='".$email."', class_id ='".$classname."', role= '".$role."' 
										
$link->query($course_query2); 
header("location:editthread.php?msg=Success");

?>