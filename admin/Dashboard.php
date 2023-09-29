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
<?php

	// Fetch data for the medicine graph
	$link = mysqli_connect("localhost", "root", "");
	mysqli_select_db($link, "my_db");
	$medicines = array();

	$res = mysqli_query($link, "SELECT * FROM medicines");
	while ($row = mysqli_fetch_array($res)) {
		$medicine["label"] = $row["productName"];
		$medicine["y"] = $row["total"];
		$medicines[] = $medicine;
	}

// Fetch data for the address graph
$addresses = array();

// Assuming "resident_id" is the common identifier between tables
$res = mysqli_query($link, "SELECT residentrecords.address, SUM(request_medicine.quantity_req) AS total_quantity
FROM residentrecords LEFT JOIN request_medicine ON residentrecords.residentId = request_medicine.residentId
 GROUP BY residentrecords.address");

if (!$res) {
    // Handle the query error
    die("Query failed: " . mysqli_error($link));
}

while ($row = mysqli_fetch_array($res)) {
    $address["label"] = $row["address"];
    $address["y"] = $row["total_quantity"];
    $addresses[] = $address;
}

?>
<html lang="en">
<head>
  <title>Responsive Sidebar</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="../cssmainmenu/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <style>
    .chart-container {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    .chart {
        width: 48%;
    }
</style>
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
    <div class="text">Dashboard</div>
     <div class="container-fluid">

	<div class="chart-container">
        <!-- Medicine graph -->
        <div class="chart">
            <div id="medicineChartContainer" style="height: 300px;"></div>
        </div>

	<br>
	<br />
	<br />
	<!-- Address graph -->
	<div class="chart">
            <div id="addressChartContainer" style="height: 300px;"></div>
        </div>
    
    
    </div>
	<!-- Include the CanvasJS library -->
	<script src="../js/canvasjs.min.js"></script>
	<!-- Render the graphs -->
	<script>
		window.onload = function () {
			var medicineChart = new CanvasJS.Chart("medicineChartContainer", {
				animationEnabled: true,
				theme: "light3",
				title: {
					text: "Medicine"
				},
				axisY: {
					title: "Number of Medicine"
				},
				axisX: {
					title: "Product Name"
				},
				data: [{
					type: "column",
					dataPoints: <?php echo json_encode($medicines, JSON_NUMERIC_CHECK); ?>
				}]
			});

			medicineChart.render();

			var addressChart = new CanvasJS.Chart("addressChartContainer", {
				animationEnabled: true,
				theme: "light3",
				title: {
					text: "Address"
				},
				axisY: {
					title: "Quantity Request"
				},
				axisX: {
					title: "Sitio"
				},
				data: [{
					type: "column",
					dataPoints: <?php echo json_encode($addresses, JSON_NUMERIC_CHECK); ?>
				}]
			});
			addressChart.render();
		}
	</script>
</body>
<script type="text/javascript">
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>
</html>
	<!--   <script src="../cssmainmenu/script.js"></script> -->

<?php
}
else{
	header("Location:.././index.php?error=UnAuthorized Access");
}
