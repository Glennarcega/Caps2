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
    <br>
    <div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<h3><div class = "alert alert-info">Account / Change Account</div></h3>
				<?php
					$query = $mysqli->query("SELECT * FROM `user` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
					$fetch = $query->fetch_array();
				?>
				<br />
				<div class = "col-md-4">	
					<form method = "POST" action = "../admin_query/edit_query_account.php?id=<?php echo $fetch['id']?>">
            <div class = "form-group">
            <label>First Name </label>
            <input type = "text"  class = "form-control" value = "<?php echo $fetch['fname']?>" name = "fname" />
            </div>
            <div class = "form-group">
              <label>Last Name </label>
                <input type = "text"  class = "form-control" value = "<?php echo $fetch['lname']?>" name = "lname" />
            </div>
            <div class = "form-group">
            <label> Address </label>
              <input type = "text"  class = "form-control" value = "<?php echo $fetch['address']?>" name = "address" required/>
            </div>
            <div class = "form-group">
              <label>Mobile Number </label>
                <input type = "text"  class = "form-control" value = "<?php echo $fetch['mobile_number']?>" name = "mobile_number" required/>
            </div>
						<div class = "form-group">
							<label>Email </label>
							<input type = "text" class = "form-control" value = "<?php echo $fetch['email']?>" name = "email" />
						</div>
						<div class = "form-group">
							<label>Role</label>
							<select class="form-control" required="required" name="usertype" id="usertypeSelect">
                <option value="" disabled selected>Select User Type</option>
                <option value="2">BHW</option>
                <option value="1">Admin</option>
               </select>
						</div>
				
						<div class = "form-group">
							<label>Password </label>
							<input type = "password" class = "form-control" value = "<?php echo $fetch['password']?>" name = "password" />
						</div>
						<br />
						<div class = "form-group">
							<button name = "edit_account" class = "btn btn-warning form-control"><i class = "bx bx-save"></i>  Save Changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
</body>
  <!-- Scripts -->
  <script src="../cssmainmenu/script.js"></script>
</html>
<?php
}
else{
	header("Location:.././index.php?error=UnAuthorized Access");
}