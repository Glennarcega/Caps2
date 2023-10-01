<?php
session_start();
@include "../connection/connect.php";
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']!=2){
		header("Location:.././admin/Dashboard.php");
	}


	$data=array();
	$qr=mysqli_query($conn,"select * from users where usertype='1'");
	while($row=mysqli_fetch_assoc($qr)){
		array_push($data,$row);
	}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] == UPLOAD_ERR_OK) {
        // Debugging: Check the uploaded file details
        var_dump($_FILES);

        $uploadDir = 'C:/xampp/htdocs/Caps2/img//'; // Create an "uploads" directory to store uploaded avatars
        $avatarName = $_SESSION['user_data']['username'] . "_" . $_FILES["avatar"]["name"];
        $targetFilePath = $uploadDir . $avatarName;
        
        // Check if the file type is allowed (you can customize this based on your requirements)
        $allowedTypes = array("jpg", "jpeg", "png", "gif");
        $fileExtension = strtolower(pathinfo($avatarName, PATHINFO_EXTENSION));

        // Debugging: Check the file extension
        echo "File Extension: " . $fileExtension;

        if (in_array($fileExtension, $allowedTypes)) {
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetFilePath)) {
                // Debugging: Check if the file was moved successfully
                echo "File moved successfully.";

                // Update the user's profile with the new avatar filename
                $updateAvatarQuery = "UPDATE users SET avatar = '$avatarName' WHERE id = " . $_SESSION['user_data']['id'];
                if (mysqli_query($conn, $updateAvatarQuery)) {
                    $_SESSION['user_data']['avatar'] = $avatarName; // Update the user's avatar session data
                    echo '<script>alert("Avatar updated successfully.");</script>';
                } else {
                    echo '<script>alert("Error updating avatar in the database.");</script>';
                }
            } else {
                echo '<script>alert("Sorry, there was an error uploading your file.");</script>';
            }
        } else {
            echo '<script>alert("Invalid file type. Allowed file types are jpg, jpeg, png, and gif.");</script>';
        }
    }
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
<style>
.form-control:focus {
    box-shadow: none;
    border-color: #04c487;
}

/* Simplify button styles */
.profile-button {
    background: #04c487;
    border: none;
    color: #fff;
}

/* Change button background on hover and focus */
.profile-button:hover,
.profile-button:focus {
    background: #04c487;
}

/* Adjust hover effect for back link */
.back:hover {
    color: #04c487;
    cursor: pointer;
}

/* Increase font size for labels on smaller screens */
@media (max-width: 768px) {
    .labels {
        font-size: 14px;
    }
}

/* Adjust hover effect for add-experience button */
.add-experience:hover {
    background: #04c487;
    color: #fff;
    cursor: pointer;
    border: solid 1px #04c487;
}
</style>
<body>
  <div class="sidebar">
    <div class="logo_details">
      <div class="logo_name">Barangay Health Worker</div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="homemedd.php">
          <i class="bx bx-grid-alt"></i>
          <span class="link_name">Dashboard</span>
        </a>
        <span class="tooltip">Dashboard</span>
      </li>
      <li>
        <a href="../logout.php">
          <i class="bx bx-chat"></i>
          <span class="link_name">Anouncements</span>
        </a>
        <span class="tooltip">Anouncements</span>
      </li>
      <li>
        <a href="#">
          <i class="bx bx-pie-chart-alt-2"></i>
          <span class="link_name">Analytics</span>
        </a>
        <span class="tooltip">Analytics</span>
      </li>
      <li>
        <a href="userRecMed.php">
          <i class="bx bx-folder"></i>
          <span class="link_name">Records</span>
        </a>
        <span class="tooltip">Records</span>
      </li>
      <li>
        <a href="medicinee.php">
          <i class="bx bx-plus-medical"></i>
          <span class="link_name">Medicine</span>
        </a>
        <span class="tooltip">Medicine</span>
      </li>
      <li>
        <a href="contraceptives.php">
            <i class="bx bx-capsule"></i>
            <span class="link_name">Contraceptives</span>
        </a>
        <span class="tooltip">Contraceptives</span>
        </li>
      <li>
        <a href="settings.php">
          <i class="bx bx-cog"></i>
          <span class="link_name">Settings</span>
        </a>
        <span class="tooltip">Settings</span>
      </li>
      <li class="profile">
  <div class="profile_details">
  <img src="../img/admin-default.png" alt="profile image">
    <div class="profile_content">
    <div class="name"><?php echo $_SESSION['user_data']['name']; ?></div>    </div>
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
  <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
        <div class="row mt-3">
        <div class="col-md-12">
        <label class="labels"><br>Change Avatar</label>
         <div class = "well" style = "height:200px; width:100%;">
							<img src = "photo/<?php echo $fetch['photo']?>" height = "150" width = "100"/>
						</div>
        <input type="file" name="avatar" id="avatar" class="form-control">
    </div>
</div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="row mt-2">
                <?php
					$query = $conn->query("SELECT * FROM `users`") or die(mysqli_error());
					$fetch = $query->fetch_array();
				?>
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" value = "<?php echo $_SESSION['user_data']['name']; ?>" class="form-control" placeholder="First Name" value=""></div>
                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value="" placeholder="Last Name"></div>
                    
                    <div class="col-md-6"><label class="labels"><br>Email</label><input type="text" value = "<?php echo $_SESSION['user_data']['username']; ?>" class="form-control" value="" placeholder="Email"></div>

                </div>
                <div class="row mt-3">
                <div class="col-md-6"><label class="labels"><br>Mobile Number</label><input type="text" value = "<?php echo $_SESSION['user_data']['mobile_number']; ?>" class="form-control" value="" placeholder="Ex.0946"></div>
                    <div class="col-md-12"><label class="labels"><br>Address</label><input type="text" value = "<?php echo $_SESSION['user_data']['address']; ?>" class="form-control" placeholder="Address" value=""></div>
                </div>
                <br>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
  </section>
  

  <script src="../cssmainmenu/script.js"></script>
  <script type = "text/javascript">
	function confirmationDelete(anchor){
		var conf = confirm("Are you sure you want to delete this record?");
		if(conf){
			window.location = anchor.attr("href");
		}
	} 
</script>
<script src = "../js/jquery.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script>	
<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();
	});
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Check if URL contains 'success' parameter and remove it
    if (window.location.search.includes('success')) {
        var newUrl = window.location.protocol + '//' + window.location.host + window.location.pathname;
        window.history.replaceState({ path: newUrl }, '', newUrl);
    }
});
</script>
</body>
</html>
<?php
}
else{
	header("Location:.././index.php?error=UnAuthorized Access");
}