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
  <title>Barangay Health Worker</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="../cssmainmenu/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
  <link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
  
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
        var table = $('#medicinesTable').DataTable({
            "paging": false,
            "processing": true,
            "serverSide": true,
            'serverMethod': 'post',
            "ajax": "server.php",
            "searching": false, // Disable searching
            dom: 'Bfrtip',
            buttons: [
                {extend: 'copy', attr: {id: 'medicines'}}, 'csv', 'excel', 'pdf'
            ]
        });
    });
</script>

</head>
<body>
  <div class="sidebar">
    <div class="logo_details">
      <div class="logo_name">Barangay Health Worker</div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="homemedd.php">
          <i class="bx bx-grid-alt"></i>
          <span class="link_name">Dashboard</span>
        </a>
        <span class="tooltip">Dashboard</span>
      </li>
      <li>
        <a href="#">
          <i class="bx bx-chat"></i>
          <span class="link_name">Anouncements</span>
        </a>
        <span class="tooltip">Anouncements</span>
      </li>
      <li>
        <a href="#">
          <i class="bx bx-pie-chart-alt-2"></i>
          <span class="link_name">Analytics</span>
        </a>
        <span class="tooltip">Analytics</span>
      </li>
      <li>
        <a href="userRecMed.php">
          <i class="bx bx-folder"></i>
          <span class="link_name">Records</span>
        </a>
        <span class="tooltip">Records</span>
      </li>
      <li>
        <a href="medicinee.php">
          <i class="bx bx-plus-medical"></i>
          <span class="link_name">Medicine</span>
        </a>
        <span class="tooltip">Medicine</span>
      </li>
      <li>
        <a href="contraceptives.php">
            <i class="bx bx-capsule"></i>
            <span class="link_name">Contraceptives</span>
        </a>
        <span class="tooltip">Contraceptives</span>
        </li>
      <li>
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
        <div class="text">Records</div>
          <div class = "container-fluid">
            <div class = "panel panel-default">
              <div class = "panel-body">
                <div class = "alert alert-info">Records</div>
                <br />
                
        <table name="medicinesTable" id="medicinesTable" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                   
                        <th>Sponsor</th>
                        <th>Product Name</th>
                        <th>Unit</th>
                        <th>Quantity</th>
                        <th>Expiration Date</th>
    
              </tr>

            </thead>
          <tbody>
                </tr>
            </thead>
        </table>

    </div>
                			
        	
            </tbody>
          </table>
        </div>
	
	</div>         
  </section>
</body>
  <!-- Scripts -->
  <script src="../cssmainmenu/script.js"></script>

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
