<?php

if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']==1){
		header("Location:./admin/Dashboard.php");
	}
	else{
		header("Location:./bhw/homemedd.php");	
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	 <!-- custom css file link  -->
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	 <link rel="stylesheet" href="csslog/style.css">
   </head>
<body>
<div class="form-container">
			<form class="mx-auto"
		      action="check-login.php" 
		      method="post"
			  style ="background-color: #FFFACD">
			  <img src="img/ourlogo.png" alt="Logo" class="logo">
			  <h6 class="text-center p-1">Medicine Management System for Barangay Malitam</h6>
			  <h2 class="text-center p-1">LOGIN</h2>
      	      <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
				
		  
		    <input type="text" required placeholder="Username"
		           class="form-control" 
		           name="username" 
		           id="username">
		
		
		    <input type="password" required placeholder="Password"
		           name="password" 
		           class="form-control" 
		           id="password">
		  
		  
		
			 <input type="submit" class="btn btn-primary mt-0">
		</form>
      </div>
	  <script type="text/javascript">
		history.pushState(null, null, location.href);
		window.onpopstate = function (){
			history.go(1);
		};	
		</script>
</body>
</html>
