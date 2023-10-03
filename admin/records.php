<?php
session_start();
@include "../connection/connect.php";
if(isset($_SESSION['user_data'])){
  if($_SESSION['user_data']['usertype']!=1){
		header("Location:.././bhw/homemedd.php");
	}

	$data=array();
	$qr=mysqli_query($conn,"select * from users where usertype='2'");
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
  <script src="vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
  <link rel="stylesheet"  href="vendor/DataTables/jquery.datatables.min.css">	
  <script src="vendor/DataTables/jquery.dataTables.min.js" type="text/javascript"></script> 
  <script src="vendor/DataTables/jszip.min.js" type="text/javascript"></script> 
  <script src="vendor/DataTables/pdfmake.min.js" type="text/javascript"></script> 
  <script src="vendor/DataTables/vfs_fonts.js" type="text/javascript"></script> 
  <script src="vendor/DataTables/buttons.html5.min.js" type="text/javascript"></script> 
  <link rel="stylesheet"  href="vendor/DataTables/buttons.datatables.min.css">    
  <script src="vendor/DataTables/dataTables.buttons.min.js" type="text/javascript"></script> 

    <script>
        $(document).ready(function () {
            var table = $('#request_medicineTable').DataTable({
                "paging": false,
                "processing": true,
                "serverSide": true,
                'serverMethod': 'post',
                "ajax": "server.php",
                dom: 'Bfrtip',
                buttons: [
                    {extend: 'copy', attr: {id: 'request_medicineTable'}}, 'csv', 'excel', 'pdf'
                ]
            });

        });
    </script>
</head>
<body>
  <div class="sidebar">
    <div class="logo_details">
      <div class="logo_name">Admin</div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="Dashboard.php">
          <i class="bx bx-grid-alt"></i>
          <span class="link_name">Dashboard</span>
        </a>
        <span class="tooltip">Dashboard</span>
      </li>
      <li>
        <a href="medicinerecords.php">
          <i class="bx bx-plus-medical"></i>
          <span class="link_name">Medicine Records</span>
        </a>
        <span class="tooltip">Medicine</span>
      </li>
      <li>
        <a href="Contraceptives.php">
          <i class="bx bx-capsule"></i>
          <span class="link_name">Contraceptive Records</span>
        </a>
        <span class="tooltip">Contraceptives</span>
      </li>
      <li>
        <a href="records.php">
          <i class="bx bx-folder"></i>
          <span class="link_name">Resident Records</span>
        </a>
        <span class="tooltip">Records</span>
      </li>
      <li>
          <a href="RegisteredUserAdmin.php">
            <i class="bx bx-user-pin"></i>
            <span class="link_name">Registered Accounts</span>
          </a>
          <span class="tooltip">Registered Accounts</span>
      </li>
      <li>
          <a href="account.php">
            <i class="bx bx-user-pin"></i>
            <span class="link_name">Account</span>
          </a>
          <span class="tooltip">Account</span>
        </li>
      <li>
      <a href="settings.php?id=<?php echo $_SESSION['user_data']['id']; ?>">
          <i class="bx bx-cog"></i>
          <span class="link_name">Settings</span>
        </a>
        <span class="tooltip">Settings</span>
      </li>
      <li class="profile">
        <div class="profile_details">
        <img src = "../photo/<?php echo $_SESSION['user_data']['photo']?>"/>
        <div class="profile_content">
        <div class="name"><?php echo $_SESSION['user_data']['fname']; ?></div>
      </div>
    </div>
  <a href="../logout.php" id="log_out">
    <i class="bx bx-log-out"></i>
  </a>
  </li>
    </ul>
  </div>
  <section class="home-section">
  <div class="text">Medicine</div>
  <div class="container-fluid">
		<div class="panel panel-default">
			<div class="panel-body">
      <div class = "alert alert-info">Medicine Records</div>
				<table id="table" class="table table-bordered">
        <table name="medicinesTable" id="request_medicineTable" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                   
                        <th>Sponsor</th>
                        <th>Product Name</th>
                        <th>Unit</th>
                        <th>Quantity</th>
                        <th>Expiration Date</th>
    
              </tr>

            </thead>
      </table>
				</table>
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