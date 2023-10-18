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
  <title>Responsive Sidebar</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="../cssmainmenu/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
  <link rel = "stylesheet" type = "text/css" href = "../css/style.css" />



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
  <div class="text">Medicine</div>
    <div class="container-fluid">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="alert alert-info">Medicine</div>
           <br /> <br />
      
          <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success" role="alert">
              <?=$_GET['success']?>
            </div>
            <?php } ?>
  
            <table id="table" class="table table-striped">
    <thead>
        <tr>
            <th>Sponsor</th>
            <th>Product Name</th>
            <th>Unit</th>
            <th>Quantity</th>
            <th>Expiration Date</th>
            <th>Status</th>
            <th>Request</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = $mysqli->query("SELECT * FROM medicines") or die(mysqli_error());
        while ($fetch = $query->fetch_array()) {
            $status = ($fetch['total'] == 0) ? 'unavailable' : $fetch['status']; // Check if quantity is zero

            // Add a condition to skip rows where 'unit' is equal to 'Insert'
            if ($fetch['unit'] != 'Insert') {
                continue;
            }
        ?>
        <tr>
            <td><?php echo $fetch['sponsor'] ?></td>
            <td><?php echo $fetch['productName'] ?></td>
            <td><?php echo $fetch['unit'] ?></td>
            <td><?php echo $fetch['total'] ?></td>
            <td><?php echo $fetch['expDate'] ?></td>
            <td><?php echo $status ?></td>
            <td>
                <center>
                    <?php if ($status == 'unavailable' || $fetch['total'] == 0): ?>
                        <button class="btn btn-warning" disabled>Request</button>
                    <?php else: ?>
                        <?php
                        if (isset($_GET['residentId'])) {
                            $residentId = $_GET['residentId'];
                            if ($fetch['unit'] == 'Insert') {
                                echo '<a class="btn btn-primary profile-button" href="contraceptives_form.php?residentId=' . $residentId . '&productName=' . urlencode($fetch['productName']) . '"> Request</a>';
                            } else {
                                echo '<a class="btn btn-primary profile-button" href="contraceptives_request_update.php?residentId=' . $residentId . '&productName=' . urlencode($fetch['productName']) . '"> Request</a>';
                            }
                        } else {
                            echo '<p>Resident ID not provided.</p>';
                        }
                        ?>
                    <?php endif; ?>
                </center>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</body>


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

</html>
<?php
}
else{
	header("Location:.././index.php?error=UnAuthorized Access");
}