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

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Barangay Health Worker</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="../cssmainmenu/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
  <link rel = "stylesheet" type = "text/css" href = "../css/style.css" />

  <!--  theme -->
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
      <section class="home-section">
     <br>
          <div class = "container-fluid">
            <div class = "panel panel-default">
              <div class = "panel-body">
                <h3><div class = "alert alert-info">Resident Records</div></h3>
                <br />
              <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-success" role="alert">
                  <?=$_GET['success']?>
                </div>
                <?php } ?>
             
              <table id = "table" class = "table table-striped table-hover">
                <thead>
                  <tr>
                    <!-- Checkbox-->
                    <th>Resident Name</th>
                    <th>Date of Birth</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th style="text-align: center;">Medicine</th>
                    <th style="text-align: center;">Family Planning</th>
                  </tr>
                </thead>
              <tbody>
              <?php
                $query = $mysqli->query("SELECT * FROM `residentrecords`") or die(mysqli_error());
                while($fetch = $query->fetch_array()){
              ?>	
					  	<tr>	
                <td><?php echo $fetch['lastName'] . ' ' . $fetch['firstName'] . ' ' . $fetch['middleName']; ?></td>
                <td><?php echo $fetch['dateBirth']?></td>
                <td><?php echo $fetch['age']?></td>
                <td><?php echo $fetch['sex']?></td>
                <td><?php echo $fetch['address']?></td>
                <td><?php echo $fetch['contactNumber']?></td>
                <th style="text-align: center;"><a class="btn btn-primary profile-button" href="resident_med.php?residentId=<?php echo $fetch['residentId'] ?>"></i> Update</a>
                <th style="text-align: center;"><a class="btn btn-primary profile-button" href="individual_records_FP.php?residentId=<?php echo $fetch['residentId'] ?>"> Update</a>

              </tr>			
            <?php
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
</html>
<?php
}
else{
	header("Location:.././index.php?error=UnAuthorized Access");
}
