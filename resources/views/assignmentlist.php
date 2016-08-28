<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Assignment List</title>
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
<?php if(isset($_SESSION['username'])){ ?>
<?php include('css/predefined navbar.php')?>
<br />
<br />
<br />
<br />
<br />

<div class="row">
	<div class="col-sm-3"></div>
  <div class="col-sm-6">
  
  <?php 
			//"SELECT * FROM users INNER JOIN class ON users.class_id = class.class_id where id='".$user_id."'");
			$query = mysqli_query($link,"SELECT * FROM assignments INNER JOIN course_name ON assignments.course_id = course_name.id INNER JOIN classes on assignments.for_class_id = classes.id");
			
			?>
            
            
		<table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Course</th>
                <th>For Class</th>
                <th>Link</th>
        
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            
            <tbody>
     	
            <?php $count = 1; while($result = mysqli_fetch_array($query)){?>
    		<tr>
            <td><?php echo $count; $count++;?></td>
        	<td><?php echo $result['name']?></td>
            <td><?php echo $result['class_name']?></td>
        	<td><?php echo $result['link']?></td>
            <td><a href="editassignmentform.php?id=<?php echo $result['id']?>"><button class="btn btn-info" type="button" method="post">Edit</button></a></td>
            <td><a href="dodeleteassignment.php?id=<?php echo $result['id']?>"><button class="btn btn-danger" type="button" method="post">Delete</button></a></td>
            </tr>
			<?php 	}
			?>
                      
            
    		</tbody>
  		</table>
        
           
  </div>
  <div class="col-sm-3"></div>
  <?php } else {
	header("location:admin.php?error=You must login first");
	}?> 
</div>
</body>
</html>