<?php
session_start();
@include "../connection/connect.php";
if(isset($_SESSION['user_data'])){
    if($_SESSION['user_data']['usertype'] != 2){
        header("Location:.././admin/Dashboard.php");
    }

    $data = array();
    $qr = mysqli_query($mysqli, "select * from user where usertype='1'");
    while($row = mysqli_fetch_assoc($qr)){
        array_push($data, $row);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Barangay Health Worker</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="../cssmainmenu/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
    <link rel="stylesheet" type="text css" href="../css/style.css" />

    <!-- graph -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    
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
</style>
    </style>
</head>
<body>
<?php
try {
    include_once('side_menu.php');
} catch (Exception $e) {
    // Handle the error, e.g., log it or display a user-friendly message.
    echo "Error: " . $e->getMessage();
}
?>

<section class="home-section">
    <br>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3><div class="alert alert-info">Dashboard</div></h3>

                <?php
                include "../connection/connect.php";
                $query = $mysqli->query("SELECT * from medicines ");

                foreach ($query as $data) {
                    $productName[] = $data['productName'];
                    $total[] = $data['total'];
                }
                ?>

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
           <div class="row">
  <div class="column">
    <div class="card">
      <h3>Card 1</h3>
      <p>Some text</p>
      <p>Some text</p>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <h3>Card 2</h3>
      <p>Some text</p>
      <p>Some text</p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3>Card 3</h3>
      <p>Some text</p>
      <p>Some text</p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3>Card 4</h3>
      <p>Some text</p>
      <p>Some text</p>
    </div>
  </div>
</div>

              <div class="chart-container" style="width: 100%; max-width: 500px; float:right;">
                  <canvas id="myChart" width="1000" height="500"></canvas>
              </div>

              <div class="chart-container" style="width: 100%; max-width: 500px;">
                  <canvas id="myChart1" width="1000" height="500"></canvas>
              </div>
               

                <script>
                    // === include 'setup' then 'config' above ===
                    const labels = <?php echo json_encode($productName) ?>;
                    const data = {
                        labels: labels,
                        datasets: [{
                            label: 'medicine',
                            data: <?php echo json_encode($total) ?>,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 205, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(201, 203, 207, 0.2)'
                            ],
                            borderColor: [
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(54, 162, 235)',
                                'rgb(153, 102, 255)',
                                'rgb(201, 203, 207)'
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

                <script>
                    // === include 'setup' then 'config' above ===
                    const labels2 = <?php echo json_encode($address) ?>;
                    const data2 = {
                        labels: labels2,
                        datasets: [{
                            label: 'address',
                            data: <?php echo json_encode($total_quantity) ?>,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 205, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(201, 203, 207, 0.2'
                            ],
                            borderColor: [
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(54, 162, 235)',
                                'rgb(153, 102, 255)',
                                'rgb(201, 203, 207)'
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
} else {
    header("Location:.././index.php?error=UnAuthorized Access");
}
?>
