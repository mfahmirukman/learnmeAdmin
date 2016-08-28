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

		</div>
	</div>
</div>
  </div>
  </div>
  <div class="col-md-6">
<?php 

	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$parts = explode('=', $actual_link);
	$value = $parts[count($parts) - 1];
	$user_id = $value;
	$query = mysqli_query($link,"SELECT threads.id, threads.title, threads.body, course_name.id as course_name_id, course_name.name FROM threads INNER JOIN course_name ON threads.courses_id = course_name.id where threads.name_id = '".$user_id."' order by course_name.name asc");
	
	?>
   
    <table class="table table-bordered">
        <thead>
          <tr>
          	<th>#</th>
            <th>Course</th>
            <th>Title</th>
            <th>Body</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
    
			<?php $count = 1; while($result = mysqli_fetch_array($query)){?>
            <tr>
            <td><?php echo $count ?></td>
            <td><?php echo $result['name']?></td>
            <td><?php echo $result['title']?></td>
            <td><?php echo $result['body']?></td>
            <td><a href="editthreadform.php?id=<?php echo $result['id']?>"><button class="btn btn-info" type="button" method="post">Edit This Thread</button></a></td>
            <td><a href="deletethread.php?id=<?php echo $result['id']?>"><button class="btn btn-danger" type="button" method="post">Delete This Thread</button></a></td>
            <!--<td><?php //echo "doedituser.php?id=".$result['id']?></td>-->
            </tr>
            <?php $count++; }?>
    
        </tbody>
    </table>


  </div>
  <div class="col-md-6></div>
  <?php else:
	header("location:admin.php?error=You must login first");
endif;?> 
</div>
</body>
</html>