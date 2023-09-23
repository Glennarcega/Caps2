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
                    <i class="bx bx-cart-alt"></i>
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
                    <div class="alert alert-info">Request Form</div>
                    <br />
                    <div class="col-md-4">
                        <?php
                        $productName = isset($_GET['productName']) ? $_GET['productName'] : '';
                        $query = $conn->query("SELECT * FROM `medicines` WHERE productName = '$productName'") or die(mysqli_error());
                        $fetch = $query->fetch_array();
                        ?>

                        <form method="POST" enctype="multipart/form-data">
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
                                <label>Product Quantity</label>
                                <input type="text" class="form-control" name="total"
                                    value="<?php echo $fetch['total']; ?>" readonly />
                            </div>
                            <div class="form-group" required="required">
                                <label>Resident Name</label>
                                <input type="text" class="form-control" name="residentName" required  />
                            </div>
                            <div class="form-group" required="required">
                                <label>Date of Birth</label>
                                <input type="date" class="form-control" name="dateBirth" required/>
                            </div>
                            <div class="form-group" required="required">
                                <label>Age</label>
                                <input type="text" class="form-control" name="age" required />
                            </div>
                            <div class="form-group" required="required">
                                <label>Sex</label>
                                <select class="form-control" required="required" name="sex">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sitio</label>
                                <select class="form-control" required="required" name="address">
                                    <option value="IlangIlang">Ilang-Ilang</option>
                                    <option value="Orchids">Orchids</option>
                                    <option value="Sampagita">Sampagita</option>
                                    <option value="Camia">Camia</option>
                                    <option value="Rosal">Rosal</option>
                                </select>
                            </div>
                            <div class="form-group" required="required" required>
                                <label>Contact Number</label>
                                <input type="text" class="form-control" name="contactNumber" />
                            </div>
                            <div class="form-group" required="required" required>
                                <label>Quantity</label>
                                <input type="number" value=0 min="0" max="999999999" class="form-control"
                                    name="quantity_req" />
                            </div>
                            <div class="form-group" required="required" required>
                                <label>Given Date</label>
                                <input type="date" class="form-control" name="givenDate" />
                            </div>
                            <div class="form-group">
                                <button name="add_rec" class="btn btn-warning form-control"><i
                                        class="glyphicon glyphicon-edit"></i> Request</button>
                            </div>
                            <?php require_once '../admin_query/add_query_records.php'?>
						</form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="../cssmainmenu/script.js
    <?php
}
else{
	header("Location:.././index.php?error=UnAuthorized Access");
}
