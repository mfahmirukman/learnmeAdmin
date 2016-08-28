<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Password</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<?php include('css/predefined.php')?>
    <?php include('css/predefined footer.php')?>
</head>

<body>
<?php 
	$link = mysqli_connect('localhost','root','', 'school');
	session_start();
	
?>
<?php if(isset($_SESSION['username'])): ?>
<?php include('css/predefined navbar.php')?>
<br />
<br />
<br />
<br />
<br />

<div class="row">
  <div class="col-sm-2">  </div>
  <div class="col-sm-5">
	<?php 
			
			$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$parts = explode('=', $actual_link);
			$value = $parts[count($parts) - 1];
			$thread_id = $value;
			
			$query = mysqli_query($link,"SELECT threads.id, threads.title, threads.body, course_name.id as course_name_id, course_name.name as course_name, users.name, classes.class_name FROM threads INNER JOIN course_name ON threads.courses_id = course_name.id INNER JOIN users ON threads.name_id = users.id INNER JOIN classes ON classes.id = users.class_id where threads.id ='".$thread_id."'");
			?>
            
            
			<table class="table table-bordered">
    <thead>
      <tr>
      	<th>#</th>
        <th>Course</th>
        <th>Title</th>
        <th>Body</th>
        <th>Class</th>
        <th>Posted by</th>
      </tr>
    </thead>
    <tbody>
      
            
           <?php $count = 1; while($result = mysqli_fetch_array($query)){?>
    		<tr>
            <td><?php echo $count; $count++;?></td>
        	<td><?php echo $result['course_name']?></td>
        	<td><?php echo $result['title']?></td>
            <td><?php echo $result['body']?></td>
            <td><?php echo $result['class_name']?></td>
            <td><?php echo $result['name']?></td>
            </tr>
            
		<?php }
	?>
    </tbody>
  	</table>

    <label>Are you sure you want to delete this data?</label> <br />

    <a href= <?php echo "dodeletethread.php?id=".$thread_id ?>><button class='btn btn-success' type='submit'> Yes</button></a>
    <a href= "threadlist.php" ><button class="btn btn-danger" type='submit'> No</button></a>


  </div>
  <div class="col-sm-2"></div>
  </div>
  <?php else:
	header("location:admin.php?error=You must login first");
endif;?> 
</div>
</body>
</html>