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
  <title>Responsive Sidebar</title>
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
            <span class="link_name">Registered Admin/User</span>
          </a>
          <span class="tooltip">Registered</span>
      </li>
        <li>
          <a href="account.php">
            <i class="bx bx-user-pin"></i>
            <span class="link_name">Accout</span>
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
          <br></br>
          <div class="container-fluid">
            <div class="panel panel-default">
            <div class="panel-body">
          <div class="text">User Profile</div>
            <?php if (isset($_GET['success'])) { ?>
              <div class="alert alert-success" role="alert">
                  <?=$_GET['success']?>
          </div>
          <?php } ?>
        <div class="container rounded bg-white mt-5 mb-5">
          <div class="row">
              <div class="col-md-3 border-right">
              <div class="row mt-3">
          <div class="col-md-12">
          <form method = "POST" enctype="multipart/form-data">
              <label class="labels"><br>Change Avatar</label>
              <div class = "well" style = "height:200px; width:265px;">
                  <img src = "../photo/<?php echo $_SESSION['user_data']['photo']?>" height = "160" width = "225"/>
                  </div>
          </div>  
        </div>           
      </div>
      <div class="col-md-5 border-right">
            <div class="p-3 py-5">
              <div class="row mt-2">
                <div class="col-md-6"><label class="labels">Name</label><label class="form-control"><?php echo $_SESSION['user_data']['fname']; ?></label></div>
                <div class="col-md-6"><label class="labels">Last Name</label><label class="form-control"><?php echo $_SESSION['user_data']['lname']; ?></label></div>
                <div class="col-md-6"><label class="labels"><br>Email</label><label class="form-control"><?php echo $_SESSION['user_data']['username']; ?></label></div>
                <div class="col-md-6"><label class="labels"></label><label class="form-control">  <p> <a href="">Change Password</a></p></label></div>

              </div>
              <div class="row mt-3">
                <div class="col-md-6"><label class="labels"><br>Mobile Number</label><label class="form-control"><?php echo $_SESSION['user_data']['mobile_number']; ?></label></div>
                <div class="col-md-12"><label class="labels"><br>Address</label><label class="form-control"><?php echo $_SESSION['user_data']['address']; ?></label></div>
              </div>
              <br>
              <div class="mt-5 text-center">
              <div class="mt-5 text-center">
              <a href="edit_profile.php?id=<?php echo $_SESSION['user_data']['id']; ?>" class="btn btn-primary profile-button">Edit Profile</a>
                </div>
              </div>
                </div>
              </div>
            </div>
        </div>
        </div>
      </div>
  </section>
</body>
<script src="../cssmainmenu/script.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Check if URL contains 'success' parameter and remove it
    if (window.location.search.includes('success')) {
        var newUrl = window.location.protocol + '//' + window.location.host + window.location.pathname;
        window.history.replaceState({ path: newUrl }, '', newUrl);
    }
});
</script>
</html>
<?php
}
else{
	header("Location:.././index.php?error=UnAuthorized Access");
}
           
  