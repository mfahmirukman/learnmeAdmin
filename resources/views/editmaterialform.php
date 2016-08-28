<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Material Form</title>
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
  <div class="col-md-3">
  <div class="container-fluid">
	<div class="row">
		<div class="col-md-12"><em></em>
        <?php 
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$parts = explode('=', $actual_link);
			$value = $parts[count($parts) - 1];
			$thread_id = $value;
			
		
		?>
<form action="doeditthread.php?id=<?php echo $value ?>" method="post" enctype="multipart/form-data">
	 
   <label for="exampleInputEmail1">
		
		<?php 	
            $query = mysqli_query($link, "SELECT * FROM threads INNER JOIN course_name ON threads.courses_id = course_name.id where threads.id = '".$thread_id."'");
            $row = mysqli_fetch_array($query);
			?>
            
    <label>Title</label>
       
	</label>
    <input type="text" name="title" class="form-control" placeholder="<?php echo $row['title']?>"/><br />
    <label for="exampleInputEmail1">
		<label>Body</label>
	</label>
    <textarea name="body" rows="5" class="form-control" placeholder="<?php echo $row['body']?>" /></textarea><br />
    
    <label for "exampleInputEmail1">
    	<label>Course</label>
    </label><br />

    <select name="courseid">
    <?php
		$query2 = mysqli_query($link, "SELECT course_name.name FROM users INNER JOIN course_name ON users.category_id = course_name.category_id where users.id ='".$row['name_id']."'");
		while($result = mysqli_fetch_array($query2)) {?>
			<option name="courseid"> <?php echo $result['name']?></option>
		<?php }?>

	</select>
    <br />
    <br />
	<br />
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