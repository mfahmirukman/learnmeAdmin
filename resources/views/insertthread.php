<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert User</title>
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
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
  <div class="container-fluid">
	<div class="row">
		<div class="col-md-12"><em></em>
<form action="doinsertuser.php" method="post" enctype="multipart/form-data">
	 
   <label for="exampleInputEmail1">
		Title
	</label>
    <input type="text" name="fullname" class="form-control" /><br />
    <label for="exampleInputEmail1">
		E-mail
	</label>
    <input type="text" name="email" class="form-control" /><br />
    <label for="exampleInputEmail1">
		Password
	</label>
    <input type="text" name="password" class="form-control" /><br />
    
    
    
    <select name="classid">
    <option >Select</option>
    <?php
		$query = mysqli_query($link, "SELECT * FROM classes");
		while($result = mysqli_fetch_array($query)) {?>
			<option name="classid"> <?php echo $result['class_name']?></option>
		<?php }?>

	</select>
    <br />
    <br />
	<br />
    
  	<input type="radio" name="role" value="student">Student<br>
  	<input type="radio" name="role" value="teacher">Teacher<br>
    <br />

     
    
    <button class='btn btn-flock btn-primary' type='submit'>Submit</button>
</form>
</div>

		</div>
	</div>
</div>
  </div>
  <div class="col-sm-4"></div>
</div>

<?php else: 
	header("location:adminHome.php?error=You Must Login First!");
    endif; 
?>
</body>
</html>