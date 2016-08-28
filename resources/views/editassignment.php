<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
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
  <div class="col-sm-3">
  <div class="container-fluid">
	<div class="row">
		<div class="col-md-12"><em></em>
<form action="#" method="post" enctype="multipart/form-data">
	 
   <label for="exampleInputEmail1">
		Search Assignment Name
	</label>
    <input type="text" name="assignmentname" class="form-control" /><br />
    
    <button class='btn btn-flock btn-primary' type='submit'>Search</button>
</form><br />
<br />

</div>

		</div>
	</div>
</div>
  </div>
  </div>
  <div class="col-md-3">
	<?php 
	if(isset($_POST['assignmentname'])) {

		$assignmentname = $_POST['assignmentname'];


		if($assignmentname == "" || $assignmentname== NULL) {
			header("location:editassignment.php?error=Must input assignment name!");
		} 
		else {
			$query = mysqli_query($link,"SELECT assignments.id, assignments.title, assignments.link, course_name.name as course_name, users.name as creator_name, classes.class_name as for_class_name FROM assignments INNER JOIN course_name ON assignments.course_id = course_name.id INNER JOIN classes ON assignments.for_class_id = classes.id INNER JOIN users ON assignments.creator_id = users.id where assignments.title like '"."%".$assignmentname."%"."'");
			$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$parts = explode('/', $actual_link);
			$value = $parts[count($parts) - 1];
			?>
            
            
			<table class="table table-bordered">
    <thead>
      <tr>
        <th>Title</th>
        <th>Link</th>
        <th>Course</th>
        <th>Created By</th>
        <th>For Class</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      
      
    
            
            <?php while($result = mysqli_fetch_array($query)){?>
    		<tr>
        	<td><?php echo $result['title']?></td>
        	<td><?php echo $result['link']?></td>
            <td><?php echo $result['course_name']?></td>
        	<td><?php echo $result['creator_name']?></td>
            <td><?php echo $result['for_class_name']?></td>
            <td><a href="editassignmentform.php?id=<?php echo $result['id']?>"><button class="btn btn-info" type="button" method="post">Edit</button></a></td>
            <td><a href="deleteassignment.php?id=<?php echo $result['id']?>"><button class="btn btn-danger" type="button" method="post">Delete</button></a></td>
            <!--<td><?php //echo "doedituser.php?id=".$result['id']?></td>-->
      		</tr>
            
		<?php }}
	} else {
		
	}
	?>
    </tbody>
  			</table>


  </div>
  <div class="col-sm-3"></div>
  <div class="col-sm-3"></div>
  <?php else:
	header("location:admin.php?error=You must login first");
endif;?> 
</div>
</body>
</html>