<?php

$link = mysqli_connect('localhost', 'root', '','school');
session_start();


$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$parts = explode('=', $actual_link);
			$value = $parts[count($parts) - 1];

$thread_id =  $value;

$comment_query = mysqli_query($link, "DELETE FROM comments where thread_id='".$thread_id."'");

$link->query($comment_query);
$query = mysqli_query($link, "DELETE FROM threads where id='".$thread_id."'");
$link->query($query);
header('location:threadlist.php?msg="Thread was successfully deleted');


		
		