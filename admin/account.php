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
			<h3><div class = "alert alert-info">Account</div></h3>
				<a class = "btn btn-success" href = "add_account.php"><i class = "glyphicon glyphicon-plus"></i> Create New Account</a>
				<br />
				<br />
				<?php if (isset($_GET['success'])) { ?>
      	      <div class="alert alert-success" role="alert">
				  <?=$_GET['success']?>
			  </div>
			  <?php } ?>
        <table id = "table" class = "table table-striped">
					<thead>
						<tr>
					  	<th>Email</th>
							<th>Name</th>
							<th>Role</th>
              <th><center>Action</center></th>
						</tr>
					</thead>
					<tbody>
						<?php  
							$query = $mysqli->query("SELECT * FROM `user` WHERE usertype ='2'") or die(mysqli_error());
							while($fetch = $query->fetch_array()){
						?>
						<tr>
						<td><?php echo $fetch['email']?></td>
            <td><?php echo $fetch['fname'] . ' ' . $fetch['lname']; ?></td>
              <td>
            <?php echo ($fetch['usertype'] == 2) ? 'BHW' : ''; ?>
             </td>
                <td><center><a class = "btn btn-primary profile-button" href = "edit_account.php?id=<?php echo $fetch['id']?>"> Edit</a> <a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href = "../admin_query/delete_account.php?id=<?php echo $fetch['id']?>"> Delete</a></center></td>
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
<script src="../js/jquery.js"></script>
<script src="../js/jquery.dataTables.js"></script>
<script src="../js/dataTables.bootstrap.js"></script>

  <script type = "text/javascript">
	function confirmationDelete(anchor){
		var conf = confirm("Are you sure you want to delete this record?");
		if(conf){
			window.location = anchor.attr("href");
		}
	} 
</script>
<script type="text/javascript">
	$(document).ready(function () {
		$("#table").DataTable();
	});
</script>

</html>
<?php
}
else{
	header("Location:.././index.php?error=UnAuthorized Access");
}