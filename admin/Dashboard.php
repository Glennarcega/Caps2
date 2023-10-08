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
<?php try {
    include_once('side_menu.php');
} catch (Exception $e) {
    // Handle the error, e.g., log it or display a user-friendly message.
    echo "Error: " . $e->getMessage();
}
 ?>
  <section class="home-section">
    <div class="text">Dashboard</div>
     <div class="container-fluid">

	<div class="chart-container">
        <!-- Medicine graph -->
        <div class="chart">
            <div id="medicineChartContainer" style="height: 300px;"></div>
        </div>
	<br><br /><br />
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
<!--   <script src="../cssmainmenu/script.js"></script> -->

</html>
<?php
}
else{
	header("Location:.././index.php?error=UnAuthorized Access");
}
