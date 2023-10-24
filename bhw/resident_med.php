<?php
session_start();
@include "../connection/connect.php";
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']!=2){
		header("Location:.././admin/Dashboard.php");
	}

	$data=array();
	$qr=mysqli_query($mysqli,"select * from user where usertype='1'");
	while($row=mysqli_fetch_assoc($qr)){
		array_push($data,$row);
	}
  if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo '<div class="success-message">Medicine request added successfully!</div>';
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  
<!--theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

</head>
<body>
<?php try {
    include_once('side_menu.php');
} catch (Exception $e) {
    // Handle the error, e.g., log it or display a user-friendly message.
    echo "Error: " . $e->getMessage();
}
 ?>
  </div>
  <section class="home-section">
   <br>
				<div class="container-fluid">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3><div class="alert alert-info">Medicine Records</div></h3>
        <div>
                  <?php
                if (isset($_GET['residentId'])) {
                      $desiredResidentId = $_GET['residentId'];
                      
                      // Replace 'residentrecords' with your actual table name and 'resident_id' with the actual column name
                      $query = $mysqli->query("SELECT * FROM residentrecords WHERE residentId = '$desiredResidentId'");
                      while ($fetch = $query->fetch_assoc()) {
                          
                        // Display the records within the table rows    
                        echo '<h2>' .  $fetch['lastName'] . ' ' . $fetch['firstName'] . ' ' . $fetch['middleName']. '</h2>';

                    }
                  } else {
                    echo '<tr><td colspan="3">Resident ID not provided in the URL.</td></tr>';
                }
                ?>
              </div>
              <br />
                <?php
                    if (isset($_GET['residentId'])) {
                        $residentId = $_GET['residentId'];
                        echo '<a class="btn btn-success" href="add_med_res.php?residentId=' . $residentId . '"><i class="glyphicon glyphicon-plus"></i> Add Medicine</a>';
                    } else {
                        echo '<p>Resident ID not provided.</p>';
                    }
                  ?>
                  
                  <br /><br />
              
                  <?php if (isset($_GET['success'])) { ?>
                    <div class="alert alert-success" role="alert">
                      <?=$_GET['success']?>
                    </div>
                  <?php } ?>
                  
                  <table id="table" class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Product Name</th>
                        <th>Unit</th>
                        <th>Quantity</th>
                        <th>Given Date</th>
                      </tr>
                    </thead>
                <tbody>
              <?php  
              if (isset($_GET['residentId'])) {
                  $desiredResidentId = $_GET['residentId'];
                  
                  // Replace 'residentrecords' with your actual table name and 'resident_id' with the actual column name
                  $query = $mysqli->query("SELECT * FROM request_medicine WHERE residentId = '$desiredResidentId' ORDER BY givenDate DESC");

                  if ($query->num_rows > 0) {
                      while ($fetch = $query->fetch_assoc()) {
                      
                          // Display the records within the table rows
                          echo '<tr>';
                          echo '<td>' . $fetch['productName'] . '</td>';
                          echo '<td>' . $fetch['unit'] . '</td>';
                          echo '<td>' . $fetch['quantity_req'] . '</td>';
                          echo '<td>' . $fetch['givenDate'] . '</td>';
                          echo '</tr>';
                      }
                  } else {
                      echo '<tr><td colspan="3">No records found! </td></tr>';
                  }
              } else {
                  echo '<tr><td colspan="3">Resident ID not provided in the URL.</td></tr>';
              }
              ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</body>
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
</html>
<?php
}
else{
	header("Location:.././index.php?error=UnAuthorized Access");
}



