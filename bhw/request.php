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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" href="../cssmainmenu/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3><div class="alert alert-info">Request Form</div></h3>
                    <br />
                    <div class="col-md-4">
                        <?php
                        $productName = isset($_GET['productName']) ? $_GET['productName'] : '';
                        $query = $mysqli->query("SELECT * FROM `medicines` WHERE productName = '$productName'") or die(mysqli_error());
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
                                <label>Unit</label>
                                <input type="text" class="form-control" name="unit"
                                    value="<?php echo $fetch['unit']; ?>" readonly />
                            </div>
                            <div class="form-group">
                                <label>Product Quantity</label>
                                <input type="text" class="form-control" name="total"
                                    value="<?php echo $fetch['total']; ?>" readonly />
                            </div>
                            <div class="form-group" required="required">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="lastName" id="lastName"  placeholder="Enter your last Name" required  />
                            </div>
                            <div class="form-group" required="required">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="firstName" id ="firstName" placeholder="Enter your First Name" required  />
                            </div>
                            <div class="form-group" >
                                <label>Middle Name</label>
                                <input type="text" class="form-control" name="middleName" id ="middleName" placeholder="Optional"/>
                            </div>
                            <div class="form-group" required="required">
                                <label>Date of Birth</label>
                                <input type="date" class="form-control" name="dateBirth" id="dateOfBirth" required/>
                            </div>
                            <div class="form-group" required="required">
                                <label>Age</label>
                                <input type="text" class="form-control" name="age" id="age" required readonly/>
                            </div>
                            <div class="form-group" required="required">
                                <label>Gender</label>
                                <select class="form-control" required="required" name="sex" id="usertypeSelect">
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            </div>
        
                            <div class="form-group">
                                <label>Sitio</label>
                                <select class="form-control" required="required" name="address" required>
                                    <option value="" disabled selected>Select Sitio</option>
                                    <option value="IlangIlang">Ilang-Ilang</option>
                                    <option value="Orchids">Orchids</option>
                                    <option value="Sampaguita">Sampaguita</option>
                                    <option value="Camia">Camia</option>
                                    <option value="Rosal">Rosal</option>
                                    <option value="MalitamDos">Malitam Dos</option>
                                    <option value="MalitamTres">Malitam Tres</option>
                                    <option value="BadjCom">Badjao Community</option>
                                </select>
                            </div>
                            <div class="form-group" required="required" >
                                <label>Contact Number</label>
                                <input type="number" class="form-control" name="contactNumber" placeholder="Enter your Contact Number"  required />
                            </div>
                            <div class="form-group" required="required" required>
                                <label>Quantity</label>
                                <input type="number"  min="0" max="999999999" class="form-control"
                                    name="quantity_req" id="quantityInput" placeholder ="Enter Quantity Request" required />
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function () {
                                            const quantityInput = document.getElementById("quantityInput");
                                            quantityInput.addEventListener("input", function () {
                                                if (quantityInput.value === "0") {
                                                    alert("You entered zero. Please make sure to enter a quantity greater than zero.");
                                                }
                                            });
                                        });
                                    </script>
                            </div>
                            <div class="form-group" required="required" required>
                                <label>Given Date</label>
                                <input type="date" class="form-control" name="givenDate" id="givenDate" required />
                            </div>
                            <div class="form-group">
                                <button name="add_rec" class="btn btn-primary profile-button form-control"><i
                                        class="bx bx-pencil"></i> Request</button>
                            </div>
                            <?php require_once '../admin_query/add_query_records.php'?>
						</form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
    <script>
        document.getElementById("residentName").addEventListener("input", function () {
        var input = this.value;
        if (input.length > 0) {
            this.value = input.charAt(0).toUpperCase() + input.slice(1);
        }
    });
    /*Date of Birth and Age(for automatic calculation)*/
    const dateOfBirthInput = document.getElementById('dateOfBirth');
    const ageInput = document.getElementById('age');
    
    // Add an event listener to the dateOfBirth input
    dateOfBirthInput.addEventListener('input', function () {
        const selectedDate = new Date(dateOfBirthInput.value);
        const today = new Date();
        const age = today.getFullYear() - selectedDate.getFullYear();
        
        if (selectedDate > today) {
            dateOfBirthInput.setCustomValidity("Please select a date in the past.");
            dateOfBirthInput.reportValidity();
        } else {
            dateOfBirthInput.setCustomValidity("");
            ageInput.value = age;
        }
    });
    </script>
   <script src="../cssmainmenu/script.js"></script>

  
</html>
<?php
}
else{
	header("Location:.././index.php?error=UnAuthorized Access");
}
