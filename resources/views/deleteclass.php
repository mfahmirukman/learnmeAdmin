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
			
			$query = mysqli_query($link,"SELECT * FROM classes where classes.id = '".$value."'");
			?>
            
            
			<table class="table table-bordered">
    <thead>
      <tr>
        <th>Class Name</th>
      </tr>
    </thead>
    <tbody>
      
            
            <?php while($result = mysqli_fetch_array($query)){?>
    		<tr>
        	<td><?php echo $result['class_name']?></td>
      		</tr>
            
		<?php }
	?>
    </tbody>
  	</table>

    <label>Are you sure you want to delete this data?</label> <br />

    <a href= <?php echo "dodeleteclass.php?id=".$value ?>><button class='btn btn-flock btn-primary' type='submit'> Yes</button></a>
    <a href= "classlist.php" ><button class='btn btn-flock btn-primary' type='submit'> No</button></a>


  </div>
  <div class="col-sm-2"></div>
  </div>
  <?php else:
	header("location:admin.php?error=You must login first");
endif;?> 
</div>
</body>
</html>