<?php
session_start();
@include "../connection/connect.php";
if(isset($_SESSION['user_data'])){
    if($_SESSION['user_data']['usertype'] != 2){
        header("Location:.././admin/Dashboard.php");
    }

    $data = array();
    $qr = mysqli_query($conn, "select * from users where usertype='1'");
    while($row = mysqli_fetch_assoc($qr)){
        array_push($data, $row);
    }

    // Initialize variables
    $residentName = ""; // Resident name
    $selectedResidentId = isset($_POST['resident_id']) ? $_POST['resident_id'] : '';

    if (!empty($selectedResidentId)) {
        // Fetch the resident's name based on the selected resident ID
        $residentQuery = mysqli_query($conn, "SELECT resident_name FROM users WHERE user_id = '$selectedResidentId'");
        if ($residentQuery && $residentRow = mysqli_fetch_assoc($residentQuery)) {
            $residentName = $residentRow['resident_name'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Barangay Health Worker</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" href="../cssmainmenu/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                <a href="../logout.php">
                    <i class="bx bx-chat"></i>
                    <span class="link_name">Announcements</span>
                </a>
                <span class="tooltip">Announcements</span>
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
                <a href="#">
                    <i class="bx bx-cog"></i>
                    <span class="link_name">Settings</span>
                </a>
                <span class="tooltip">Settings</span>
            </li>
            <li class="profile">
                <div class="profile_details">
                    <img src="../img/admin-default.png" alt="profile image">
                    <div class="profile_content">
                        <div class="name"><?php echo $name; ?></div>
                    </div>
                </div>
                <a href="../logout.php" id="log_out">
                    <i class="bx bx-log-out"></i>
                </a>
            </li>
        </ul>
    </div>

    <section class="home-section">
    
        <div class="text">Request</div>
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="alert alert-info">Request Medicine</div>
                    <br />
        
				<?php if (isset($_GET['success'])) { ?>
					<div class="alert alert-success" role="alert">
						<?=$_GET['success']?>
					</div>
					<?php } ?>
                   
                    <div class="col-md-4">
                    <?php
      if (isset($_GET['residentId'])) {
        $desiredResidentId = $_GET['residentId'];
        
        // Replace 'residentrecords' with your actual table name and 'resident_id' with the actual column name
        $query = $conn->query("SELECT * FROM residentrecords WHERE residentId = '$desiredResidentId'");
        while ($fetch = $query->fetch_assoc()) {
            
          // Display the records within the table rows
      
          
          // Assuming $fetch['residentName'] contains the desired name
          $residentName = isset($fetch['residentName']) ? $fetch['residentName'] : '';
      }
    } else {
        echo '<tr><td colspan="3">Resident ID not provided in the URL.</td></tr>';
    }
    ?>
                        <?php
                        $productName = isset($_GET['productName']) ? $_GET['productName'] : '';
                        $query = $conn->query("SELECT * FROM `medicines` WHERE productName = '$productName'") or die(mysqli_error());
                        $fetch = $query->fetch_array();
                        ?>

                        <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
       
                                <?php
                                if (isset($_GET['residentId'])) {
                                    // Retrieve the 'residentId' value from the URL
                                    $residentId = $_GET['residentId'];
                                  
                                    
                                    // Now, you have the 'residentId' value in the $residentId variable
                                    // You can use it for database operations or any other purpose
                                    echo "Resident ID: " . $residentId;
                                
                                } else {
                                    // Handle the case where 'residentId' is not provided in the URL
                                    echo "Resident ID not found in the URL.";
                                }
                                ?>
                              
                            </div>
                            
                            <div class="form-group">
                                <label>Resident Name</label>
                                <input type="text" class="form-control" name="residentName" 
                                value="<?php echo $residentName; ?> "readonly />
                                  
                            </div>
                            <div class="form-group">
                                <label>Product ID</label>
                                <input type="text" class="form-control" name="productId"
                                    value="<?php echo $fetch['productId']; ?>" readonly />
                            </div>
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control" name="productName"
                                    value="<?php echo $fetch['productName']; ?>" readonly />
                            </div>
                            <div class="form-group">
                                <label>Unit</label>
                                <input type="text" class="form-control" name="unit"
                                    value="<?php echo $fetch['unit']; ?>" readonly />
                            </div>
                            <div class="form-group">
                                <label>Product Quantity</label>
                                <input type="text" class="form-control" name="total"
                                    value="<?php echo $fetch['total']; ?>" readonly />
                            </div>
                            
                            <div class="form-group" required="required" required>
                                <label>Quantity Request</label>
                                <input type="number" value=0 min="0" max="999999999" class="form-control"
                                    name="quantity_req" />
                            </div>
                            <div class="form-group" required="required" required>
                                <label>Given Date</label>
                                <input type="date" class="form-control" name="givenDate" required/>
                            </div>
                            <div class="form-group">
                                <button name="add_rec" class="btn btn-warning form-control"><i
                                        class="bx bx-pencil"></i> Request</button>
                            </div>
                            <?php require_once '../admin_query/add_query_records2.php'?>
						</form>
                    </div>
                </div>
            </div>
        </div>
    </section>

= </body>
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
