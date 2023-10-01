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
          <img src="../img/admin-default.png" alt="profile image">
        <div class="profile_content">
        <div class="name"><?php echo $_SESSION['user_data']['name']; ?></div>
      </div>
      </div>
  <a href="../logout.php" id="log_out">
    <i class="bx bx-log-out"></i>
  </a>
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
    <form method = "POST" enctype = "multipart/form-data">
        <label class="labels"><br>Change Avatar</label>
        <?php
					$query = $conn->query("SELECT * FROM `users`") or die(mysqli_error());
					$fetch = $query->fetch_array();
				?>
         <div class = "well" style = "height:200px; width:100%;">
							<img src = "../photo/<?php echo $_SESSION['user_data']['photo']?>" height = "160" width = "225"/>
						</div>
        <input type="file" name="photo" id="photo" class="form-control">
    </div>
    
</div>
            
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" name="name" value = "<?php echo $_SESSION['user_data']['name']; ?>" class="form-control" placeholder="First Name" value=""></div>
                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value="" placeholder="Last Name"></div>
                    <div class="col-md-6"><label class="labels"><br>Email</label><input type="text" name="username" value = "<?php echo $_SESSION['user_data']['username']; ?>" class="form-control" value="" placeholder="Email"></div>
                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value="" placeholder="Last Name"></div>

                </div>
                <div class="row mt-3">
                <div class="col-md-6"><label class="labels"><br>Mobile Number</label><input type="text" name="mobile_number" value = "<?php echo $_SESSION['user_data']['mobile_number']; ?>" class="form-control" value="" placeholder="Ex.0946"></div>
                    <div class="col-md-12"><label class="labels"><br>Address</label><input type="text" name="address" value = "<?php echo $_SESSION['user_data']['address']; ?>" class="form-control" placeholder="Address" value=""></div>
                </div>
                <br>
                <div class="mt-5 text-center"> <button type = "submit" name="submit" class = "btn btn-primary profile-button"> Save Profile</button></div>
            </div>
      </form>
                          
              <?php

              if(ISSET($_POST['submit'])){
                $name = $_POST['name'];
                $address = $_POST['address'];
                $mobile_number = $_POST['mobile_number'];
                $username = $_POST['username'];

              $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
              $photo_name = addslashes($_FILES['photo']['name']);
              $photo_size = getimagesize($_FILES['photo']['tmp_name']);
              move_uploaded_file($_FILES['photo']['tmp_name'],"../photo/" . $_FILES['photo']['name']);
              $query = $conn->query("UPDATE `users` SET `name` = '$name', `address` = '$address', `mobile_number` = '$mobile_number', `username` = '$username', `photo` = '$photo_name' WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
              header("location:settings.php?success=Edit Account Succesfully!");
              echo '<script>window.location.href = "settings.php?success=Update Successfully click logout to see changes!";</script>';

              }	
              ?>
        
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
  </section>
  <!-- Scripts -->
  <script src="../cssmainmenu/script.js"></script>
</body>
<script type = "text/javascript">
	$(document).ready(function(){
		$("#photo").change(function(){
			$("#lbl").remove();
			var files = !!this.files ? this.files : [];
			if(!files.length || !window.FileReader){
				$("#image").remove();
				$lbl.appendTo("#preview");
			}
			if(/^image/.test(files[0].type)){
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				reader.onloadend = function(){
					$pic.appendTo("#preview");
					$("#image").attr("src", this.result);
				}
			}
		});
	});
</script>
</html>
<?php
}
else{
	header("Location:.././index.php?error=UnAuthorized Access");
}