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