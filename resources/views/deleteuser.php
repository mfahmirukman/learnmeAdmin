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
			$user_id = $value;
			$query = mysqli_query($link,"SELECT * FROM users INNER JOIN classes ON users.class_id = classes.id where users.id = '".$user_id."'");
			?>
            
            
			<table class="table table-bordered">
    <thead>
      <tr>
        <th>Full Name</th>
        <th>E-mail</th>
        <th>Class</th>
        <th>Role</th>
      </tr>
    </thead>
    <tbody>
      
            
            <?php while($result = mysqli_fetch_array($query)){?>
    		<tr>
        	<td><?php echo $result['name']?></td>
        	<td><?php echo $result['email']?></td>
            <td><?php echo $result['class_name']?></td>
            <td><?php echo $result['role']?></td>
      		</tr>
            
		<?php }
	?>
    </tbody>
  	</table>

    <label>Are you sure you want to delete this data?</label> <br />

    <a href= <?php echo "dodeleteuser.php?id=".$user_id ?>><button class='btn btn-success' type='submit'> Yes</button></a>
    <a href= "userlist.php" ><button class='btn btn-danger' type='submit'> No</button></a>


  </div>
  <div class="col-sm-2"></div>
  </div>
  <?php else:
	header("location:admin.php?error=You must login first");
endif;?> 
</div>
</body>
</html>