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
  
    <!-- graph -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
    /* Default styles for larger screens */
    .container-fluid {
        padding: 20px;
    }
    .panel-body {
        padding: 20px;
    }

    /* Responsive styles for screens smaller than 1400px */
    @media (max-width: 1400px) {
        .container-fluid {
            padding: 15px;
        }
        .panel-body {
            padding: 15px;
        }
    }

    /* Responsive styles for screens smaller than 1200px */
    @media (max-width: 1200px) {
        .container-fluid {
            padding: 10px;
        }
        .panel-body {
            padding: 10px;
        }
    }

    /* Responsive styles for screens smaller than 992px */
    @media (max-width: 992px) {
        .container-fluid {
            padding: 8px;
        }
        .panel-body {
            padding: 8px;
        }
    }

    /* Responsive styles for screens smaller than 768px */
    @media (max-width: 768px) {
        .container-fluid {
            padding: 5px;
        }
        .panel-body {
            padding: 5px;
        }
        .container {
            max-width: 100%;
        }
    }

    /* Responsive styles for screens smaller than 576px */
    @media (max-width: 576px) {
        .container-fluid {
            padding: 3px;
        }
        .panel-body {
            padding: 3px;
        }
    }

    /* You can continue to add more media queries for other screen sizes as needed */

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

              <div class="chart-container" style="width: 100%; max-width: 500px;">
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
}
else{
	header("Location:.././index.php?error=UnAuthorized Access");
}
