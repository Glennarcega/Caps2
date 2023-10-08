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
  
  <?php try {
    include_once('side_menu.php');
} catch (Exception $e) {
    // Handle the error, e.g., log it or display a user-friendly message.
    echo "Error: " . $e->getMessage();
}
 ?>
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
