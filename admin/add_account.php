<?php
session_start();
@include "../connection/connect.php";
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']!=1){
    header("Location:.././bhw/homemedd.php");
	}

	$data=array();
	$qr=mysqli_query($mysqli,"select * from user where usertype='2'");
	while($row=mysqli_fetch_assoc($qr)){
		array_push($data,$row);
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Add Account</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="../cssmainmenu/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
 <link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
</head>
<body>
<?php try {
    include_once('side_menu.php');
} catch (Exception $e) {
    // Handle the error, e.g., log it or display a user-friendly message.
    echo "Error: " . $e->getMessage();
}
 ?>
  <section class="home-section">
    <br>
    <div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<h3><div class = "alert alert-info">Account / Create Account</div></h3>
				<div class = "col-md-4">	
    <div class="form-container">
    <form action="" method="POST">
    <?php if (isset($_SESSION['error_message'])) { ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['error_message']; ?>
    </div>
    <?php unset($_SESSION['error_message']); ?>
    <?php } ?>
	   <br></br>
     <div class = "form-group">
			<label>First Name </label>
				<input type = "text"  class = "form-control" name = "fname" required/>
	  </div>
    <div class = "form-group">
			<label>Last Name </label>
				<input type = "text"  class = "form-control" name = "lname" required/>
	  </div>
    <div class = "form-group">
			<label> Address </label>
				<input type = "text"  class = "form-control" name = "address" required/>
	  </div>
    <div class = "form-group">
			<label>Mobile Number </label>
				<input type = "text"  class = "form-control" name = "mobile_number" required/>
	  </div>
    <div class="form-group">
        <label>Email </label>
        <input type="email" class="form-control" name="email" placeholder="example@gmail.com" required/>
    </div>
	  <div class = "form-group">
			<label>Password </label>
				<input type = "password"  class = "form-control" name = "password"  placeholder="Enter your password" required />
	  </div>	
	  <div class = "form-group">
			<label>Confirm Password </label>
				<input type = "password"  class = "form-control" name = "cpassword"  placeholder="Confirm your password" required/>
	  </div>	
    <label>Usertype</label>
<select class="form-control" required="required" name="usertype" id="usertypeSelect">
    <option value="" disabled selected>Select Usertype</option>
    <option value="2">BHW</option>
    <option value="1">Admin</option>
</select>
</div>
 <br></br>
	  <div class = "form-group">
			<button type = "submit" name="submit" class = "btn btn-success form-control"><i class = "bx bx-plus"></i> Add Account</button>
		</div>
  <?php
  if (isset($_POST['submit'])) {
    $fname = mysqli_real_escape_string($mysqli, $_POST['fname']);
    $lname = mysqli_real_escape_string($mysqli, $_POST['lname']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $address = $_POST['address'];
    $mobile_number = $_POST['mobile_number'];
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $usertype = $_POST['usertype'];

    // Check if "@" symbol is present in the email (email)
    if (strpos($email, "@") === false) {
        $_SESSION['error_message'] = "Invalid email address format!";
        echo '<script>window.location.href = "add_account.php?error=Invalid email address format!";</script>';
    } else {
        $select = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($mysqli, $select);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['error_message'] = "email already exists!";
            echo '<script>window.location.href = "add_account.php?error=email already exists!";</script>';
        } else {
            if ($pass != $cpass) {
                $_SESSION['error_message'] = "Password not matched!";
                echo '<script>window.location.href = "add_account.php?error=Password not matched!";</script>';
            } else {
                $insert = "INSERT INTO user(fname,lname,address,mobile_number,email, password,usertype) VALUES('$fname','$lname','$address','$mobile_number','$email','$pass','$usertype')";
                mysqli_query($mysqli, $insert);
                $_SESSION['success'] = "Add Account Successfully";
                echo '<script>window.location.href = "RegisteredUserAdmin.php?success=Add Account Successfully";</script>';
            }
        }
    }
}

?>
</section>
</body>
<!-- Scripts -->
<script src="../cssmainmenu/script.js"></script>
  <script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>

</html>

<?php
}
else{
	header("Location:.././index.php?error=UnAuthorized Access");
}