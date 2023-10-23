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
  <title>Responsive Sidebar</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="../cssmainmenu/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
    <link rel="stylesheet" type="text css" href="../css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- graph -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;

}
.card:hover{
    background: #04c487; 
    color:  #f1f1f1;
}
.icon-box{
        font-size: 50px;
        color: #04c487;
}
.icon-box:hover{
    color: #fff;
}
</style>

</head>

<body>
<?php try {
    include_once('side_menu.php');
} catch (Exception $e) {
    // Handle the error, e.g., log it or display a user-friendly message.
    echo "Error: " . $e->getMessage();
}?>


<section class="home-section">
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3><div class="alert alert-info">Dashboard</div></h3>
           <div class="row">
           <div class="column">
                    <div class="card">
                    <h4>Registered Accounts</h4>
                    <div class="icon-box">
                        <i class="fas fa-users"></i>
                    </div>
                    <?php
                    // Include the database connection
                    include "../connection/connect.php";

                    // SQL query to count medicines
                    $sql = "SELECT COUNT(*) as user_count FROM user";
                    $result = $mysqli->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $userCount = $row["user_count"];
                    } else {
                        $userCount = 0;
                    }

                    // Output the result
                    echo "<h5>Registered Account: " . $userCount . "</h5>";
                   ?>
                    </div>
                </div>

                <div class="column">
                    <div class="card">
                    <h4>Medicines</h4>
                    <div class="icon-box">
                        <i class="fas fa-pills"></i>
                    </div>
                    <?php
                    // Include the database connection
                    include "../connection/connect.php";

                    // SQL query to count medicines
                    $sql = "SELECT COUNT(*) as medicine_count FROM medicines";
                    $result = $mysqli->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $medicineCount = $row["medicine_count"];
                    } else {
                        $medicineCount = 0;
                    }

                    // Output the result
                    echo "<h5>Number of Medicines: " . $medicineCount . "</h5>";
                   ?>
                    </div>
                </div>
                
                <div class="column">
                    <div class="card">
                    <h4>Resident Records</h4>
                    <div class="icon-box">
                        <i class="bx bx-plus"></i>
                    </div>
                    <?php
                    // Include the database connection
                    include "../connection/connect.php";

                    // SQL query to count medicines
                    $sql = "SELECT COUNT(*) as residentrecords_count FROM residentrecords";
                    $result = $mysqli->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $residentrecordsCount = $row["residentrecords_count"];
                    } else {
                        $residentrecordsCount = 0;
                    }

                    // Output the result
                    echo "<h5>Number of Residents: " . $residentrecordsCount . "</h5>";
                   ?>
                    </div>
                </div>
                
                <div class="column">
                    <div class="card">
                    <h4>Contraceptive Records</h4>
                    <div class="icon-box">
                        <i class="bx bx-plus"></i>
                    </div>
                    <?php
                    // Include the database connection
                    include "../connection/connect.php";

                    // SQL query to count medicines
                    $sql = "SELECT COUNT(*) as contraceptivemethod_count FROM contraceptivemethod_request";
                    $result = $mysqli->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $contraceptivemethodCount = $row["contraceptivemethod_count"];
                    } else {
                        $contraceptivemethodCount = 0;
                    }

                    // Output the result
                    echo "<h5>Number of Contraceptive : " . $contraceptivemethodCount . "</h5>";
                   ?>
                    </div>
                </div>
                </div>
                <br>
                <div>

                <div class="chart-container" style="width: 100%; max-width: 500px; float:right;">
                  <canvas id="myChart" width="1000" height="500"></canvas>
                </div>
                <?php
                include "../connection/connect.php";
                $query = $mysqli->query("SELECT * from medicines ");

                foreach ($query as $data) {
                    $productName[] = $data['productName'];
                    $total[] = $data['total'];
                }
                ?>
                <script>
                    // === include 'setup' then 'config' above ===
                    const labels = <?php echo json_encode($productName) ?>;
                    const data = {
                        labels: labels,
                        datasets: [{
                            label: 'Medicine',
                            data: <?php echo json_encode($total) ?>,
                            backgroundColor: [
                                'rgba(75, 0, 0, 0.2)',      // Dark Red
                                'rgba(153, 102, 0, 0.2)',  // Dark Orange
                                'rgba(102, 75, 0, 0.2)',  // Dark Yellow
                                'rgba(0, 51, 51, 0.2)',   // Dark Teal
                                'rgba(0, 34, 51, 0.2)',   // Dark Blue
                                'rgba(51, 0, 51, 0.2)',   // Dark Purple
                                'rgba(51, 51, 51, 0.2)'   // Dark Gray
                            ],
                            borderColor: [
                                'rgb(75, 0, 0)',        // Dark Red
                                'rgb(153, 102, 0)',    // Dark Orange
                                'rgb(102, 75, 0)',     // Dark Yellow
                                'rgb(0, 51, 51)',      // Dark Teal
                                'rgb(0, 34, 51)',      // Dark Blue
                                'rgb(51, 0, 51)',      // Dark Purple
                                'rgb(51, 51, 51)'      // Dark Gray
                            ],
                            borderWidth: 1
                        }]
                    };

                    const config = {
                        type: 'bar',
                        data: data,
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        },
                    };

                    var myChart = new Chart(
                        document.getElementById('myChart'),
                        config
                    );
                </script>

              <div class="chart-container" style="width: 100%; max-width: 500px;">
                  <canvas id="myChart1" width="1000" height="500"></canvas>
              </div>
              <br>
              <form method="post" action="">
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date">
                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date">
                <input type="submit" name="filter" value="Apply Filter" style="display: inline-block; padding: 5px; background-color: #3498db; color: #fff; border: none; border-radius: 5px; cursor: pointer;">
            </form>
            
            <?php
                include "../connection/connect.php";
                $query = $mysqli->query("SELECT residentrecords.address, SUM(request_medicine.quantity_req) AS total_quantity
                FROM residentrecords LEFT JOIN request_medicine ON residentrecords.residentId = request_medicine.residentId
                GROUP BY residentrecords.address");

                foreach ($query as $data) {
                    $address[] = $data['address'];
                    $total_quantity[] = $data['total_quantity'];
                }
                ?>
            <?php
                include "../connection/connect.php";

                // Initialize data arrays
                $address = array();
                $total_quantity = array();

                if (isset($_POST['filter'])) {
                    $start_date = $_POST['start_date'];
                    $end_date = $_POST['end_date'];

                    // Use prepared statements to filter data based on date range
                    $query = $mysqli->prepare("SELECT residentrecords.address, SUM(request_medicine.quantity_req) AS total_quantity
                        FROM residentrecords
                        LEFT JOIN request_medicine ON residentrecords.residentId = request_medicine.residentId
                        WHERE request_medicine.givenDate BETWEEN ? AND ?
                        GROUP BY residentrecords.address");
                    $query->bind_param("ss", $start_date, $end_date);
                    $query->execute();

                    // Fetch and populate the filtered data
                    $result = $query->get_result();
                    while ($data = $result->fetch_assoc()) {
                        $address[] = $data['address'];
                        $total_quantity[] = $data['total_quantity'];
                    }

                    // Close the prepared statement
                    $query->close();
                } else {
                    // Default query if no filter applied
                    $default_query = $mysqli->query("SELECT residentrecords.address, SUM(request_medicine.quantity_req) AS total_quantity
                        FROM residentrecords
                        LEFT JOIN request_medicine ON residentrecords.residentId = request_medicine.residentId
                        GROUP BY residentrecords.address");

                    // Fetch and populate the data
                    while ($data = $default_query->fetch_assoc()) {
                        $address[] = $data['address'];
                        $total_quantity[] = $data['total_quantity'];
                    }
                }
                // Check if no records are found
                if (empty($address)) {
                    echo "No records found.";
                }
                ?>
            </div>

                <script>
                    // === include 'setup' then 'config' above ===
                    const labels2 = <?php echo json_encode($address) ?>;
                    const data2 = {
                        labels: labels2,
                        datasets: [{
                            label: 'Address',
                            data: <?php echo json_encode($total_quantity) ?>,
                            backgroundColor: [
                'rgba(75, 0, 0, 0.2)',      // Dark Red
                'rgba(153, 102, 0, 0.2)',  // Dark Orange
                'rgba(102, 75, 0, 0.2)',  // Dark Yellow
                'rgba(0, 51, 51, 0.2)',   // Dark Teal
                'rgba(0, 34, 51, 0.2)',   // Dark Blue
                'rgba(51, 0, 51, 0.2)',   // Dark Purple
                'rgba(51, 51, 51, 0.2)'   // Dark Gray
            ],
            borderColor: [
                'rgb(75, 0, 0)',        // Dark Red
                'rgb(153, 102, 0)',    // Dark Orange
                'rgb(102, 75, 0)',     // Dark Yellow
                'rgb(0, 51, 51)',      // Dark Teal
                'rgb(0, 34, 51)',      // Dark Blue
                'rgb(51, 0, 51)',      // Dark Purple
                'rgb(51, 51, 51)'      // Dark Gray
            ],
                            borderWidth: 1
                        }]
                    };

                    const config2 = {
                        type: 'bar',
                        data: data2,
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    };

                    var myChart2 = new Chart(
                        document.getElementById('myChart1'),
                        config2
                    );
                </script>
                  <!-- end -->
            </div>
        </div>
    </div>
</section>

</body>
<script type="text/javascript">
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>
   <script src="../cssmainmenu/script.js"></script>

</html>
<?php
}
else{
	header("Location:.././index.php?error=UnAuthorized Access");
}
