<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Admin Home</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<?php include('css/predefined.php')?>
<?php include('css/predefined footer.php')?>

</head>

<body id="app-layout">

<?php session_start(); 
	if(isset($_SESSION['username'])): ?>
<?php include('css/predefined navbar.php')?>
<br />
<br />
<br />
<br />
<br />


<div class="container-fluid" style="margin-top:20%; text-align:center;">
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
			<h3 class="text-primary">
				<?php
				echo 'Welcome, '.$_SESSION['username'];
				?>
			</h3>
		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>
<?php else: ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-5">
		</div>
        
		<div class="col-md-2" style="padding-top:10%;">
 <label style="text-align:center"><h2>78 E-Learning Backend
    </h2></label>
			<form role="form" action="login.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>
						Username
					</label>
					<input type="text" class="form-control" name="username" />
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">
						Password
					</label>
					<input type="password" class="form-control" name="password" />
				</div>
				<button type="submit" class="btn btn-block btn-primary">
					Login
				</button>

			</form>
		</div>
		<div class="col-md-5">
		</div>
	</div>
    
    
    <div class="row" style="margin-top:10px;">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
        	<?php if(isset($_GET['error'])): ?>
                        <div class="alert alert-dismissable alert-danger">
                            <h4>
                                Alert!
                            </h4> <strong>Warning!</strong> <?php echo $_GET['error']; ?>
                        </div>
            <?php endif; ?>
		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>
<?php endif; ?>
</body>

</html>