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
          <a class="btn btn-success" href="add_med.php?"><i class="glyphicon glyphicon-plus"></i> Add Medicine</a>
          <br />
          <br />
      
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
                        <th>Batch</th>
                        <th>Quantity</th>
                        <th>Expiration Date</th>
                        <th>Status</th>
                        <th>Request</th>
                        <th><center>Action</center></th>
                        <th>Report</th>
                    </tr>
                </thead>
              <tbody>
                    <?php
                      $query = $conn->query("SELECT * FROM medicines") or die(mysqli_error());
                      while ($fetch = $query->fetch_array()) {
                          $status = ($fetch['total'] == 0) ? 'unavailable' : $fetch['status']; // Check if quantity is zero

                      ?>
                        <tr>
                          <td><?php echo $fetch['sponsor'] ?></td>
                          <td><?php echo $fetch['productName'] ?></td>
                          <td><?php echo $fetch['unit'] ?></td>
                          <td><?php echo $fetch['batch'] ?></td>
                          <td><?php echo $fetch['total'] ?></td>
                          <td><?php echo $fetch['expDate'] ?></td>
                          <td><?php echo $status ?></td>
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
                      <td>
                          <center>
                              <a class="btn btn-warning" href="report.php?productId=<?php echo $fetch['productId'] ?>"></i> View</a>
                          </center>
                      </td>
                    </tr>
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