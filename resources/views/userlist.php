<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User List</title>
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
	<div class="col-sm-3"></div>
  <div class="col-sm-6">
  
  <form action="" method="post">
  
  <label for="exampleInputEmail1">
		Select Class
	</label>
    <select class="form-control" name="classname">

    <?php
		$query = mysqli_query($link, "SELECT * FROM classes order by classes.class_name asc");
		while($result = mysqli_fetch_array($query)) {?>
			<option id="classname"> <?php echo $result['class_name']?></option>
		<?php }?>

	</select>
    <br />
    <button class='btn btn-flock btn-primary' >Submit</button>
    <br />
	<br />
    </form>
    
  
  <?php 	
			//"SELECT * FROM users INNER JOIN class ON users.class_id = class.class_id where id='".$user_id."'");
			if(isset($_POST['classname'])) {
				$classname = $_POST['classname'];
			
			if($classname == "" || $classname== NULL) {
				header("location:edituser.php?error=Must select class name!");
			} 
			else {
			$query = mysqli_query($link,"SELECT users.id, users.name, users.email, users.role, classes.class_name FROM users INNER JOIN classes on users.class_id = classes.id where classes.class_name = '".$classname."' order by users.id asc");
			?>
            
            
	<table class="table table-bordered">
    <thead>
      <tr>
      	<th>#</th>
        <th>Full Name</th>
        <th>E-mail</th>
        <th>Class</th>
        <th>Role</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
     	
            <?php 
			$count = 1; 
			while($result = mysqli_fetch_array($query)){?>
    		<tr>
            <td><?php echo $count; $count++;?></td>
        	<td><?php echo $result['name']?></td>
        	<td><?php echo $result['email']?></td>
            <td><?php echo $result['class_name']?></td>
            <td><?php echo $result['role']?></td>
            <td><a href="editform.php?id=<?php echo $result['id']?>"><button class="btn btn-info" type="button" method="post">Edit</button></a></td>
            <td><a href="deleteuser.php?id=<?php echo $result['id']?>"><button class="btn btn-danger" type="button" method="post">Delete</button></a></td>
            <!--<td><?php //echo "doedituser.php?id=".$result['id']?></td>-->
      		</tr>
            
		<?php
	} }
	?>
    </tbody>
  	</table>
    <?php 
	}
	?>
  </div>
  <div class="col-sm-3"></div>
  <?php else:
	header("location:admin.php?error=You must login first");
endif;?> 
</div>
</body>
</html>