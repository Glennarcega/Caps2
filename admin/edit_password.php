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
        <?php
            $query = $conn->query("SELECT * FROM `users`") or die(mysqli_error());
            $fetch = $query->fetch_array();
          ?>
          <img src = "../photo/<?php echo $_SESSION['user_data']['photo']?>"/>
        <div class="profile_content">
        <div class="name"><?php echo $_SESSION['user_data']['fname']; ?></div>    </div>
    </div>
    <a href="../logout.php" id="log_out"><i class="bx bx-log-out"></i></a>
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

    <div class="form-group">
        <label>Email </label>
        <input type="email" class="form-control" name="username"value="<?php echo $_SESSION['user_data']['username']; ?>" placeholder="example@gmail.com" required/>
    </div>
	  <div class = "form-group">
			<label>Password </label>
				<input type = "password"  class = "form-control" name = "password"  placeholder="Enter your password" required />
	  </div>	
	  <div class = "form-group">
			<label>Confirm Password </label>
				<input type = "password"  class = "form-control" name = "cpassword"  placeholder="Confirm your password" required/>
	  </div>	
      <?php
	require_once '../connection/connect.php';
	if(ISSET($_POST['submit'])){
		$username = $_POST['username'];
        $pass = md5($_POST['password']);
        $cpass = md5($_POST['cpassword']);
       
        if ($pass != $cpass) {
            echo '<script>alert("Password not matched!. Please Click OK to change.");</script>';
            echo '<script>window.history.pushState({}, "", "edit_password.php?id=' . $_REQUEST['id'] . '");</script>';
        
        
                } else {
                  
                    $query = $conn->query("UPDATE `users` SET  `username` = '$username', `password` = '$pass' WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
                    echo '<script>alert("Update Password Successfully. Click OK to logout and Login again to see changes.");</script>';
                      
                    // Automatically redirect to the logout page
                    echo '<script>window.location.href = "../index.php";</script>';
                }
            }
		?>

</div>
 <br></br>
	  <div class = "form-group">
			<button type = "submit" name="submit" class = "btn btn-success form-control"><i class = "bx bx-plus"></i> Update</button>
		</div>
  
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