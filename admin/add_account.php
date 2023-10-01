<?php
session_start();

@include "../connection/connect.php";
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']!=1){
    header("Location:.././bhw/homemedd.php");
	}

	$data=array();
	$qr=mysqli_query($conn,"select * from users where usertype='2'");
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
  <div class="sidebar">
    <div class="logo_details">
      <div class="logo_name">Admin</div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="Dashboard.php">
          <i class="bx bx-grid-alt"></i>
          <span class="link_name">Dashboard</span>
        </a>
        <span class="tooltip">Dashboard</span>
      </li>
      <li>
        <a href="medicinerecords.php">
          <i class="bx bx-plus-medical"></i>
          <span class="link_name">Medicine Records</span>
        </a>
        <span class="tooltip">Medicine</span>
      </li>
      <li>
        <a href="Contraceptives.php">
          <i class="bx bx-capsule"></i>
          <span class="link_name">Contraceptive Records</span>
        </a>
        <span class="tooltip">Contraceptives</span>
      </li>
      <li>
        <a href="records.php">
          <i class="bx bx-folder"></i>
          <span class="link_name">Resident Records</span>
        </a>
        <span class="tooltip">Records</span>
      </li>
      <li>
          <a href="RegisteredUserAdmin.php">
            <i class="bx bx-user-pin"></i>
            <span class="link_name">Registered Accounts</span>
          </a>
          <span class="tooltip">Registered Accounts</span>
      </li>
        <li>
          <a href="account.php">
            <i class="bx bx-user-pin"></i>
            <span class="link_name">Account</span>
          </a>
          <span class="tooltip">Account</span>
        </li>
        <li>
        <a href="settings.php?id=<?php echo $_SESSION['user_data']['id']; ?>">
          <i class="bx bx-cog"></i>
          <span class="link_name">Settings</span>
        </a>
        <span class="tooltip">Settings</span>
      </li>
      <li class="profile">
        <div class="profile_details">
        <img src = "../photo/<?php echo $_SESSION['user_data']['photo']?>"/>
          <div class="profile_content">
          <div class="name"><?php echo $_SESSION['user_data']['name']; ?></div>
           <a href="../logout.php">
            <span class="link_name">Logout</span>
            </a>
          </div>
        </div>
        <i class="bx bx-log-out" id="log_out"></i>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <div class="text">Account</div>
    <div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Account / Create Account</div>
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
			<label>Name </label>
				<input type = "text"  class = "form-control" name = "name" />
	  </div>
    <div class = "form-group">
			<label> Address </label>
				<input type = "text"  class = "form-control" name = "address" required/>
	  </div>
    <div class = "form-group">
			<label>Mobile Number </label>
				<input type = "text"  class = "form-control" name = "mobile_number" required/>
	  </div>
	  <div class = "form-group">
			<label>Email </label>
				<input type = "text"  class = "form-control" name = "username" placeholder="@gmail.com" required/>
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
if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $address = $_POST['address'];
   $mobile_number = $_POST['mobile_number'];
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $usertype = $_POST['usertype'];
   

   $select = " SELECT * FROM users WHERE name = '$name'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
    $_SESSION['error_message'] = "Username already exists!";
    echo '<script>window.location.href = "add_account.php?error=Username already exist!";</script>';

   }else{

      if($pass != $cpass){
        $_SESSION['error_message'] = "Password not matched!";
        echo '<script>window.location.href = "add_account.php?error=Password not matched!";</script>';
      }else{
         $insert = "INSERT INTO users(name,aadress,mobile_number,username, password,usertype) VALUES('$name','$address','$mobile_number','$username','$pass','$usertype')";
         mysqli_query($conn, $insert);
         $_SESSION['success'] = "Add Account Succesfully";
         echo '<script>window.location.href = "RegisteredUserAdmin.php?success=Add Account Succesfully";</script>';

      }
   }

};

?>
  </section>
  <!-- Scripts -->
  <script src="../cssmainmenu/script.js"></script>
  <script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
</body>
</html>

<?php
}
else{
	header("Location:.././index.php?error=UnAuthorized Access");
}