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
          <i class="bx bx-cart-alt"></i>
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
        <a href="#">
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
  <div class="text">Medicine</div>
    <div class="container-fluid">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="alert alert-info">Contraceptives</div>
          <a href="add_med.php" class="btn btn-success"> Add Contraceptives</a>
</a>

           <br />
          <br />
      
          <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success" role="alert">
              <?=$_GET['success']?>
            </div>
            <?php } ?>
  

<table id="table" class="table table-bordered">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Expiration Date</th>
            <th>Status</th>
            <th>Request</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = $conn->query("SELECT * FROM medicines") or die(mysqli_error());
        while ($fetch = $query->fetch_array()) {
            $status = $fetch['status'];
            $disableButton = ($status == 'unavailable' || $fetch['total'] == 0) ? 'disabled' : ''; // Check status and quantity

            // ...
        ?>
            <!-- ... -->
            <tr>
                <td><?php echo $fetch['productName'] ?></td>
                <td><?php echo $fetch['total'] ?></td>
                <td><?php echo $fetch['expDate'] ?></td>
                <td><?php echo $status ?></td>
                <!-- ... -->
                <td>
                    <center>
                        <?php if ($status == 'unavailable' || $fetch['total'] == 0): ?>
                            <button class="btn btn-warning" disabled>Request</button>
                        <?php else: ?>
                            <a class="btn btn-warning" href="request.php?productName=<?php echo urlencode($fetch['productName']); ?>">Request</a>
                        <?php endif; ?>
                    </center>
                </td>
                
                    <td>
                      <center>
                        <a class="btn btn-warning" href="edit_med.php?productId=<?php echo $fetch['productId'] ?>"></i> Edit</a>
                        <a class="btn btn-danger" onclick="confirmationDelete(this); return false;" href="../admin_query/delete_med.php?productId=<?php echo $fetch['productId'] ?>">Delete</a>
                      </center>
                    </td>
                  </tr>
                <!-- ... -->
            </tr>
            <!-- ... -->
        <?php
        }
        ?>
    </tbody>
</table>

                

            </tbody>
          </table>
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