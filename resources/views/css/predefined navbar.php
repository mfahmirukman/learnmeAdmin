<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<nav class="navbar navbar-default navbar-fixed-top" role="navigation"> 
	<div class="container">
    <div class="navbar-header">
         
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
             <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> 
                    <a class="navbar-brand" href="admin.php">SMAN 78</a>
                    
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							<a href="changepassword.php">Change Password</a>
						</li>
                        <?php if($_SESSION['username'] == 'admin'){ ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                User<span class="caret"></span>
                            </a>
							
                            
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="insertUser.php">Insert user</a></li>
                                
                                
                                <li><a href="editUser.php">Edit User</a></li>
                                <li><a href="userList.php">User List</a></li>
                            </ul>
                        </li>
                    	
                    
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Classes<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="insertClass.php">Insert Class</a></li>
                                <li><a href="editClass.php">Edit Class</a></li>
                                <li><a href="classList.php">Class List</a></li>
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Thread<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="editThread.php">Edit Thread</a>
                                </li>
                                <li>
                                    <a href="threadList.php">Thread List</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Assignment<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="insertAssignment.php">Insert Assignment</a>
                                </li>
                                <li>
                                    <a href="editAssignment.php">Edit Assignment</a>
                                </li>
                                <li>
                                    <a href="assignmentList.php">Assignment List</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Material<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="insertMaterial.php">Insert Material</a>
                                </li>
                                <li>
                                    <a href="editMaterial.php">Edit Material</a>
                                </li>
                                <li>
                                    <a href="materialList.php">Material List</a>
                                </li>
                            </ul>
                        </li>
                        
                        <?php } else { 
							
							if(isset($_SESSION['username'])) {
								$email = $_SESSION['username'];
								$teacher = "teacher";
								$link = mysqli_connect('localhost', 'root', '', 'school');
								
								$query = mysqli_query($link, "SELECT * FROM admin where username = '".$email."' AND role = '".$teacher."'");
								
								
								if(mysqli_num_rows($query) > 0){ ?>
                                	<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Assignment<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="insertAssignment.php">Insert Assignment</a>
                                </li>
                                <li>
                                    <a href="editAssignment.php">Edit Assignment</a>
                                </li>
                                <li>
                                    <a href="assignmentList.php">Assignment List</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Material<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="insertMaterial.php">Insert Material</a>
                                </li>
                                <li>
                                    <a href="editMaterial.php">Edit Material</a>
                                </li>
                                <li>
                                    <a href="materialList.php">Material List</a>
                                </li>
                            </ul>
                        </li>
                                
                                <?php
									
								}
							}
						
						
						?>
                        	
                            
                        <?php } ?>
                        
                        
                        
                        <li>
							<a href="logout.php">Logout</a>
						</li>
					</ul>
				</div>
				
			</nav>
		</div>
	</div>
    </div>
