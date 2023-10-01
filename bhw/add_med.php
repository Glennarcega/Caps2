
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
        <a href="#">
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
    <div class="text">Add Medicine</div>
    <div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
			
				<div class = "alert alert-info">Add Medicine</div>
				<br />
				<div class = "col-md-4">	

				<?php if (isset($_GET['success'])) { ?>
      	      <div class="alert alert-success" role="alert">
				  <?=$_GET['success']?>
			  </div>
			  <?php } ?>
					<form method = "POST" enctype = "multipart/form-data">
          <div class="form-group">
              <label for="sponsor">Sponsor </label>
              <input type="text" class="form-control" id="sponsor" name="sponsor" placeholder ="Name of the Sponsor" required/>
          </div>
						<div class = "form-group">
							<label>Product Name </label>
							<input type = "text"  class = "form-control" id="prodname" name = "productName" required/>
						</div>
            <div class = "form-group">
							<label>Unit </label>
							<input type = "text"  class = "form-control" name = "unit" placeholder ="" required/>
						</div>
            <div class = "form-group">
							<label>Batch </label>
							<input type = "text"  class = "form-control" id ="batch" name = "batch" placeholder ="Ex. Batch 1" required/>
						</div>
						<div class = "form-group">
							<label>Quantity </label>
							<input type = "number" min = "0" max = "999999999" class = "form-control" name = "total" placeholder ="" required/>
						</div>
						<div class = "form-group">
							<label>Expiration Date </label>
								<input type = "date"  class = "form-control" name = "expDate" required/>
						</div>
						
						<div class = "form-group">
							<label>Status</label>
							<select class = "form-control" required = required name = "status">
                <option value="" disabled selected>Status</option>
								<option value="available">Available</option>
								<option value="unavailable">Unavailable</option>
							</select>
						</div>
						
						<br />
						<br />
						<div class = "form-group">
							<button name = "add_med" class = "btn btn-info form-control"><i class = "bx bx-save"></i> Saved</button>
						</div>
					</form>
          <?php
                if(isset($_POST['add_med'])){
                $sponsor = $_POST['sponsor'];
                $productName = $_POST['productName'];
                $unit = $_POST['unit'];
                $batch = $_POST['batch'];
                $total = $_POST['total'];
                $expDate = $_POST['expDate'];
                $status = $_POST['status'];
                $conn->query("INSERT INTO `medicines` (sponsor,productName,unit,batch,total,expDate,status) VALUES('$sponsor','$productName','$unit','$batch', '$total','$expDate','$status')") or die(mysqli_error());
                if($conn){
                  echo '<script>window.location.href = "./medicinee.php?success=Add Request Successfully";</script>';
                }
                else{
                  header("Location:medicinee.php?error=Failed to Add Medicine");
                }
                };
                ?>

				</div>
			</div>
		</div>
	</div>
  <!-- Scripts -->
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
    document.getElementById("sponsor").addEventListener("input", function () {
        var input = this.value;
        if (input.length > 0) {
            this.value = input.charAt(0).toUpperCase() + input.slice(1);
        }
    });
    document.getElementById("prodname").addEventListener("input", function () {
        var input = this.value;
        if (input.length > 0) {
            this.value = input.charAt(0).toUpperCase() + input.slice(1);
        }
    });
    document.getElementById("batch").addEventListener("input", function () {
        var input = this.value;
        if (input.length > 0) {
            this.value = input.charAt(0).toUpperCase() + input.slice(1);
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