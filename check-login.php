<?php  
session_start();
include "./connection/connect.php";


if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){

	//mysqli real escape prevent from sql injection which filter the user input
	$username=mysqli_real_escape_string($conn,$_REQUEST['username']);
	$password=mysqli_real_escape_string($conn,$_REQUEST['password']);
	$qr=mysqli_query($conn,"select * from users where username='".$username."' and password='".md5($password)."'");
	if(mysqli_num_rows($qr)>0){
		$data=mysqli_fetch_assoc($qr);
		$_SESSION['user_data']=$data;
		if($data['usertype']==1){
			header("Location:./admin/Dashboard.php");	
		}
		else{
			header("Location:./bhw/homemedd.php");
		}

	}
	else{
		header("Location:index.php?error=Invalid Login Details");		
	}
}
else{
	header("Location:index.php?error=Please Enter Email and Password");
}



