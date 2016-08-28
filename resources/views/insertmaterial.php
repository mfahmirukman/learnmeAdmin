<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert Material</title>
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
        
<form action="doinsertmaterial.php" method="post" enctype="multipart/form-data">
	 <label for="exampleInputEmail1">
		Category
	</label>
    <select class="form-control" name="category">
    	<option name"category">IPA</option>
        <option name"category">IPS</option>
    </select><br>
    <label for="exampleInputEmail1">
		Class
	</label>
    <select class="form-control" name="class">
    	<option name"class">12</option>
        <option name"class">11</option>
        <option name"class">10</option>
    </select><br>
<br>
	
     
     <label for="exampleInputEmail1">
		Insert Material for Course
	</label>
    <select class="form-control" name="course">

    <?php

		$teacher = "teacher";
		$category = category;
		$cat = 0;
		if($category == 'IPA') {
			$cat = 1;
		}
		else {
			$cat = 2;
		}
		$query = mysqli_query($link, "SELECT * FROM course_name where category = '".$cat."'");
		while($result = mysqli_fetch_array($query)) {?>
			<option name="course"> <?php echo $result['name']?></option>
		<?php }?>

	</select>
    <br>
	<br>
<br>

   <label for="exampleInputEmail1">
		Chapter
	</label>
    <input type="text" name="chapter" class="form-control" /><br />
    <label for="exampleInputEmail1">
		Description
	</label>
    <textarea name="description" rows="5" class="form-control"> </textarea><br />
    <label for="exampleInputEmail1">
	
    <label for="exampleInputEmail1">
		Reading Link
	</label>
    <input type="text" name="chapter" class="form-control" /><br />
	
    <label for="exampleInputEmail1">
		Supporting Link
	</label>
    <input type="text" name="chapter" class="form-control" /><br />
    
    <br />
    <br />
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
	header("location:admin.php?error=You Must Login First!");
    endif; 
?>
</body>
</html>