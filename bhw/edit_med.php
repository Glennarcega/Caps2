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
  <div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Edit</div>
				<br />
				<div class = "col-md-4">
					<?php
						$query = $mysqli->query("SELECT * FROM `medicines` WHERE `productId` = '$_REQUEST[productId]'") or die(mysqli_error());
						$fetch = $query->fetch_array();
					?>
					<form method = "POST" enctype = "multipart/form-data">
          <div class = "form-group">
							<label>Sponsor </label>
							<input type = "text"  class = "form-control" name = sponsor value = "<?php echo $fetch['sponsor']?>" />
						</div>
					<div class = "form-group">
							<label>Product Name </label>
							<input type = "text"  class = "form-control" name = "productName" value = "<?php echo $fetch['productName']?>" required/>
						</div>
            <div class = "form-group">
							<label>Unit </label>
							<input type = "text"  class = "form-control" name = "unit" value = "<?php echo $fetch['unit']?>" required/>
						</div>
          <div class = "form-group">
							<label>Batch </label>
							<input type = "text"  class = "form-control" name = "batch" value = "<?php echo $fetch['batch']?>" required/>
						</div>
					<div class = "form-group">
							<label>Quantity </label>
							<input type = "number" min = "0" max = "999999999" class = "form-control" name = "total" value = "<?php echo $fetch['total']?>" readonly/>
						</div>
						<div class = "form-group">
							<label>Add Quantity </label>
							<input type = "number"  min = "0" max = "999999999" class = "form-control" name = "quantity1" value=0 />
						</div>
						<div class = "form-group">
							<label>Expiration Date </label>
								<input type = "date"  class = "form-control" name = "expDate" value = "<?php echo $fetch['expDate']?>" required/>
						</div>
						<div class = "form-group">
							<label>Status</label>
							<select class = "form-control" required = required name = "status">
                <option value="" disabled selected>Status</option>
								<option value="available">Available</option>
								<option value="unavailable">Unavailable</option>
							</select>
						</div>
						
						<br />
						<div class = "form-group">
							<button name = "edit_med" class = "btn btn-warning form-control"><i class = "bx bx-save"></i> Save Changes</button>
						</div>
					</form>
					<?php require_once '../admin_query/edit_query_med.php'?>
				</div>
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

</html>

<?php
}
else{
	header("Location:.././index.php?error=UnAuthorized Access");
}