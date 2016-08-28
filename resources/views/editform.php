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
  <div class="col-sm-3">
  <div class="container-fluid">
	<div class="row">
		<div class="col-md-12"><em></em>
        <?php 
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$parts = explode('=', $actual_link);
			$value = $parts[count($parts) - 1];
			
		
		?>
<form action="doedituser.php?id=<?php echo $value ?>" method="post" enctype="multipart/form-data">
	 
   <label for="exampleInputEmail1">
		
		<?php 
			
			
            $query = mysqli_query($link, "SELECT * FROM users INNER JOIN classes ON users.class_id = classes.id where users.id = '".$value."'");
            $row = mysqli_fetch_array($query);
			?>
            
            <label>Full Name</label>
            <?php
		
		?>
	</label>
    <input type="text" name="fullname" class="form-control" placeholder="<?php echo $row['name']?>"/><br />
    <label for="exampleInputEmail1">
		<label>E-mail</label>
	</label>
    <input type="text" name="email" class="form-control" placeholder="<?php echo $row['email']?>" /><br />
    
    <label for "exampleInputEmail1">
    	<label>Current Class: <?php echo $row['class_name']?></label>
    </label><br />

    <select name="classid">
    <?php
		$query = mysqli_query($link, "SELECT * FROM classes");
		while($result = mysqli_fetch_array($query)) {?>
			<option name="classid"> <?php echo $result['class_name']?></option>
		<?php }?>

	</select>
    <br />
    <br />
	<br />
     
     <label for "exampleInputEmail1">
    	<label>Current Role</label>
    </label><br />

     <select name="role">
    <option><?php echo $row['role']?></option>
    <?php
		$query = mysqli_query($link, "SELECT DISTINCT role from users");
		while($result = mysqli_fetch_array($query)) {?>
			<option name="classid"> <?php echo $result['role']?></option>
		<?php }?>

	</select>
     <br>
<br>
<br>

      
    <button class='btn btn-flock btn-primary' type='submit'>Submit</button>
</form>
</div>

		</div>
	</div>
</div>
  </div>
  <div class="col-sm-3">
  </div>
  
  
  <div class="col-sm-3"></div>
  <?php else:
	header("location:admin.php?error=You must login first");
endif;?> 
</div>
</body>
</html>