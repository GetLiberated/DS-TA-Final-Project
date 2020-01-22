	<?php 
	include("database/config.php");
	if(isset($_POST['admin_login'])){
		$Name = mysqli_real_escape_string($connection, $_POST['Name']);
		$Pass = mysqli_real_escape_string($connection, $_POST['Pass']);
	
		if($Name == '1' && $Pass == '1'){
			header("Location: home.php?");
			
		}
		
		else{
			header("Location: index.php?Failed");
		}					
	}
	 ?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Admin page</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


	    <link rel="stylesheet" href="main.css">
	    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>	
	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="js/smoothScroll.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
		<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
		<!-- Bootstrap Date-Picker Plugin -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
		<style type="text/css">
		.video-container {
		  position: relative;
		}

		.overlay-desc {
		  background: rgba(0,0,0,0);
		  position: absolute;
		  top: 0; right: 0; bottom: 0; left: 0;
		  display: flex;
		  align-items: center;
		  justify-content: center;
		  margin-bottom: 100px
		}
		.header-link{
			color: black
		}
		.header-link:hover{
			color: white
		}
		</style>
	</head>
	<body style="background-color: white">
	<img style="width: 100%;opacity: 0.2" src="assets/logo1.jpg" alt="">
	<div class="overlay-desc" style="margin-top: -210px">
     		<h4>Admin Login</h4>
     	</div>

     	<div class="overlay-desc">
     		<form action="" method="post">
			  <div class="form-group">
			    <label for="exampleInputEmail1"></label>
			    <input type="text" name="Name" class="form-control" placeholder="username" id="exampleInputEmail1" aria-describedby="emailHelp">
			  </div>
			  <div class="form-group">
			    <input type="password" name="Pass" class="form-control" placeholder="password" id="exampleInputPassword1">
			  </div>

			  <button name="admin_login" style="width: 100%" type="submit" class="btn btn-primary">login</button>
				<?php if(isset($_GET['Failed'])) {

			   ?>
			 	<div class="form-group">
			 		<label style="color: red">Wrong Username or password</label>
			 	</div>
			 <?php } ?>
			</form>

   	</div>

		
     
	</div>
