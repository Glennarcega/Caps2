
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
    <div class="text">Add Medicine</div>
     <div class = "container-fluid">
		  <div class = "panel panel-default">
		  	<div class = "panel-body">
				<div class = "alert alert-info">Add Medicine</div>
				<br />
				<div class = "col-md-4">	

				<?php if (isset($_GET['success'])) { ?>
      	      <div class="alert alert-success" role="alert">
				  <?=$_GET['success']?>
			  </div>
			  <?php } ?>

					<form method = "POST" enctype = "multipart/form-data">
          <div class="form-group">
              <label for="sponsor">Sponsor </label>
              <input type="text" class="form-control" id="sponsor" name="sponsor" placeholder ="Name of the Sponsor" required/>
          </div>
						<div class = "form-group">
							<label>Product Name </label>
							<input type = "text"  class = "form-control" id="prodname" name = "productName" required/>
						</div>
            <div class = "form-group">
							<label>Unit </label>
							<input type = "text"  class = "form-control" name = "unit" placeholder ="" required/>
						</div>
            <div class = "form-group">
							<label>Batch </label>
							<input type = "text"  class = "form-control" id ="batch" name = "batch" placeholder ="Ex. Batch 1" required/>
						</div>
						<div class = "form-group">
							<label>Quantity </label>
							<input type = "number" min = "0" max = "999999999" class = "form-control" name = "total" placeholder ="" required/>
						</div>
						<div class = "form-group">
							<label>Expiration Date </label>
								<input type = "date"  class = "form-control" name = "expDate" required/>
						</div>
						
						<div class = "form-group">
							<label>Status</label>
							<select class = "form-control" required = required name = "status">
                <option value="" disabled selected>Status</option>
								<option value="available">Available</option>
								<option value="unavailable">Unavailable</option>
							</select>
						</div>
						<br /><br />
						<div class = "form-group">
							<button name = "add_med" class = "btn btn-info form-control"><i class = "bx bx-save"></i> Saved</button>
						</div>
					</form>
             <?php
                if(isset($_POST['add_med'])){
                $sponsor = $_POST['sponsor'];
                $productName = $_POST['productName'];
                $unit = $_POST['unit'];
                $batch = $_POST['batch'];
                $total = $_POST['total'];
                $expDate = $_POST['expDate'];
                $status = $_POST['status'];
                $mysqli->query("INSERT INTO `medicines` (sponsor,productName,unit,batch,total,expDate,status) VALUES('$sponsor','$productName','$unit','$batch', '$total','$expDate','$status')") or die(mysqli_error());

                if($mysqli){
                    echo '<script>window.location.href = "./medicinee.php?success=Add Request Successfully";</script>';
                  }
                else{
                  header("Location:medicinee.php?error=Failed to Add Medicine");
                  }
                };
                ?>
				</div>
			</div>
		</div>
	</div>
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
    document.getElementById("sponsor").addEventListener("input", function () {
        var input = this.value;
        if (input.length > 0) {
            this.value = input.charAt(0).toUpperCase() + input.slice(1);
        }
    });
    document.getElementById("prodname").addEventListener("input", function () {
        var input = this.value;
        if (input.length > 0) {
            this.value = input.charAt(0).toUpperCase() + input.slice(1);
        }
    });
    document.getElementById("batch").addEventListener("input", function () {
        var input = this.value;
        if (input.length > 0) {
            this.value = input.charAt(0).toUpperCase() + input.slice(1);
        }
    });
</script>

</html>
<?php
}
else{
	header("Location:.././index.php?error=UnAuthorized Access");
}