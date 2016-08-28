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
  <div class="col-lg-12">
  <?php 
			//"SELECT * FROM users INNER JOIN class ON users.class_id = class.class_id where id='".$user_id."'");
			$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$parts = explode('/', $actual_link);
			$value = $parts[count($parts) - 1];
			$query = mysqli_query($link,"SELECT * FROM materials INNER JOIN course_name ON course_name.id = materials.course_id");
			?>
            
            
			<table class="table table-bordered">
    <thead>
      <tr>
      	<th>#</th>
        <th>Course</th>
        <th>Chapter</th>
        <th>Description</th>
        <th>Reading Material</th>
        <th>Supporting Material</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
     	
            <?php $count = 1; while($result = mysqli_fetch_array($query)){?>
    		<tr>
            <td><?php echo $count; $count++;?></td>
        	<td><?php echo $result['name']?></td>
        	<td><?php echo $result['chapter']?></td>
            <td><?php echo $result['description']?></td>
            <td><?php echo $result['r_link']?></td>
            <td><?php echo $result['s_link']?></td>
            <td><a href="editform.php?id=<?php echo $result['id']?>"><button class="btn btn-info" type="button" method="post">Edit</button></a></td>
            <td><a href="deleteuser.php?id=<?php echo $result['id']?>"><button class="btn btn-danger" type="button" method="post">Delete</button></a></td>
            <!--<td><?php //echo "doedituser.php?id=".$result['id']?></td>-->
      		</tr>
            
		<?php
	} 
	?>
    </tbody>
  			</table>
  </div>
  <?php else:
	header("location:admin.php?error=You must login first");
endif;?> 
</div>
</body>
</html>