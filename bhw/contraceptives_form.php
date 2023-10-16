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
      <br>
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3><div class="alert alert-info">Family Planning Form</div></h3>
                    <br />
                    <div class="col-md-4">
                        <?php
                        $productName = isset($_GET['productName']) ? $_GET['productName'] : '';
                        $query = $mysqli->query("SELECT * FROM `medicines` WHERE productName = '$productName'") or die(mysqli_error());
                        $fetch = $query->fetch_array();
                        ?>
                       
            <form method="POST" action="../admin_query/add_query_contraceptives.php" enctype="multipart/form-data">
                       <div id="Container1">
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
                                <label>Quantity</label>
                                <input type="number"  min="0" max="999999999" class="form-control"
                                    name="quantity_req"  placeholder ="Enter Quantity Request" required />
                            </div>
                            <div class="form-group" required="required" required>
                                <label>Given Date</label>
                                <input type="date" class="form-control" name="givenDate" id="givenDate" required />
                            </div>
                            <div class="form-group" required="required" required>                     
                                <label>Type of Client</label>
                            <select class="form-control" required name="clienType" id="clientType">
                            <option value="" disabled selected>Type of Client</option>
                            <option value="currentUser">Current User</option>
                            <option value="dropoutRestart">Dropout / Restart</option>
                            <option value="changingMethod">Changing Method</option>
                            <option value="others">Others</option>
                            </select>
                            </div>

                            <div class="form-group" required="required" required>
                            <div id="changingMethodSection" style="display: none;">
                            <label>Method Currently used (for Changing Method)</label>
                            <select class="form-control" required name="changingMethod">
                                <option value="" disabled selected>Changing Method</option>
                                <option value="COC">COC</option>
                                <option value="IUD">IUD</option>
                                <option value="POP">POP</option>
                                <option value="BOM/CMM">BOM/CMM</option>
                                <option value="Injectable">Injectable</option>
                                <option value="BBT">BBT</option>
                                <option value="Implant">Implant</option>
                                <option value="STM">STM</option>
                                <option value="LAM">LAM</option>
                                <option value="others">Others</option>
                            </select>
                            <div class="form-group">
                                <label>Reason</label>
                                <input type="comvobox" class="form-control" name="reason"/>
                            </div>
                            </div>

                            <div id="othersSection" style="display: none;">
                            <label>Others</label>
                            <input type="text" class="form-control" name="others" id="others" placeholder="others" required  />
                            </div>
                            <div class="mt-5 text-right" style="display: inline-block; float: right;">
                              <button type="button" name="button" class="btn btn-primary profile-button" onclick="showSecondForm()"></i> Next ></button>
                            </div>
                        </div>
                    </div>
                    <div id="Container2" style="display: none;">
                        <!-- Your second form contents here -->
                            <h4><b>Personal Information</b></h4>
                            <div class="form-group" required="required">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Enter your last Name" required  />
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
                                <input type="text" class="form-control" name="age" id ="age" />
                            </div>
                            <div class="form-group" required="required">
                                <label>Gender</label>
                                <select class="form-control" required="required" name="sex" id="usertypeSelect">
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            </div>
                            <div class="form-group" required="required" >
                                <label>Contact Number</label>
                                <input type="number" class="form-control" name="contactNumber" placeholder="Enter your Contact Number"  required />
                            </div>
      
                            <div class="form-group" required="required">
                                <label>Educational Attainment</label>
                                <select class="form-control" required="required" name="educationalAttainment" id="usertypeSelect">
                                <option value="" disabled selected>Select Educational Attainment</option>
                                <option value="elementary">Elementary</option>
                                <option value="high_school">High School</option>
                                <option value="college">College</option>
                                <option value="graduate_school">Graduate School</option>
                              </select>
                              <div class="form-group" >
                                <label>Occupation</label>
                                <input type="text" class="form-control" name="occupation" id ="occupation" placeholder="Optional"/>
                            </div>
                            <div class="form-group" >
                                <label>House no.</label>
                                <input type="text" class="form-control" name="houseNumber" id ="houseNumber" placeholder="Optional"/>
                            </div>

                            <div class="form-group">
                                <label>Street</label>
                                <select class="form-control" required="required" name="street" required>
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
                            <div class="form-group">
                            <label>Civil Status</label>
                                <select class="form-control" required="required" name="civilStatus" required>
                                  <option value="" disabled selected>Civil Status</option>
                                  <option value="single">Single</option>
                                  <option value="married">Married</option>
                                  <option value="widowed">Widowed</option>
                                  <option value="divorced">Divorced</option>
                                </select>
                            </div>
                            <div class="form-group" >
                                <label>Religion</label>
                                <input type="text" class="form-control" name="religion" id ="religion" placeholder="Optional"/>
                            </div>  
                           
                          <div class="mt-5 text-left" style="display: inline-block; margin-right: 10px;">
                            <button type="button" name="button" class="btn btn-primary profile-button" onclick="showFirstForm()"> &lt; Previous</button>
                          </div>    
                          <div class="mt-5 text-right" style="display: inline-block; float: right;">
                            <button type="button" name="button" class="btn btn-primary profile-button" onclick="showThirdForm()"></i> Next ></button>
                          </div>    
                      </div>
                  </div>
            <div id="Container3" style="display: none;">
                        <!-- Your second form contents here -->
                        <h4><b>Spouse Information</b></h4>
                            <div class="form-group" required="required">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="lastNamespouse" id="lastNamespouse" placeholder="Enter your last Name" required  />
                            </div>
                            <div class="form-group" required="required">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="firstNamespouse" id ="firstNamespouse" placeholder="Enter your First Name" required  />
                            </div>
                            <div class="form-group" >
                                <label>Middle Name</label>
                                <input type="text" class="form-control" name="middleNamespouse" id ="middleNamespouse" placeholder="Optional"/>
                            </div>
                            <div class="form-group" required="required">
                                <label>Date of Birth</label>
                                <input type="date" class="form-control" name="dateBirthspouse" id="dateOfBirthspouse" required/>
                            </div>
                            <div class="form-group" required="required">
                                <label>Age</label>
                                <input type="text" class="form-control" name="ageSpouse" id ="ageSpouse" />
                            </div>
                            <div class="mt-5 text-left" style="display: inline-block; margin-right: 10px;">
                            <button type="button" name="button" class="btn btn-primary profile-button" onclick="showSeconddForm()"> &lt; Previous</button>
                          </div>    
                          
                      </div>
                      <div class="mt-5 text-right" style="display: inline-block; float: right;">
                            <button name="add_rec" class="btn btn-primary profile-button"> Submit</button>
                          </div>
           <?php require_once '../admin_query/add_query_contraceptives.php'?>
        </form>


                                     <!-- script for type of client -->
                                     <script>
                                const clientTypeSelect = document.getElementById("clientType");
                                const changingMethodSection = document.getElementById("changingMethodSection");
                                const othersSection = document.getElementById("othersSection");
                                const changingMethodSelect = document.querySelector('#changingMethodSection select[name="changingMethod"]');

                                clientTypeSelect.addEventListener("change", function () {
                                    if (clientTypeSelect.value === "changingMethod") {
                                    changingMethodSection.style.display = "block";
                                    othersSection.style.display = "none";
                                    } else if (clientTypeSelect.value === "others") {
                                    changingMethodSection.style.display = "none";
                                    othersSection.style.display = "block";
                                    } else {
                                    changingMethodSection.style.display = "none";
                                    othersSection.style.display = "none";
                                    changingMethodSelect.value = ""; // Reset the "Changing Method" dropdown when it's not selected.
                                    }
                                });

                                changingMethodSelect.addEventListener("change", function () {
                                    if (changingMethodSelect.value === "others") {
                                    othersSection.style.display = "block";
                                    } else {
                                    othersSection.style.display = "none";
                                    }
                                });
                                </script>
 <!-- Script for form -->
            <script>
function showSecondForm() {
    document.getElementById("Container1").style.display = "none";
    document.getElementById("Container2").style.display = "block";
}
</script>
<script>
function showFirstForm() {
    document.getElementById("Container1").style.display = "block";
    document.getElementById("Container2").style.display = "none";
}
</script>
<script>
function showThirdForm() {
    document.getElementById("Container2").style.display = "none";
    document.getElementById("Container3").style.display = "block";
}
</script>
<script>
function showSeconddForm() {
    document.getElementById("Container2").style.display = "block";
    document.getElementById("Container3").style.display = "none";
}
</script>
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
    // Get references to the date of birth and age input fields
    var dateOfBirthInput = document.getElementById("dateOfBirth");
    var ageInput = document.getElementById("age");

    // Restrict the selection of future dates
    dateOfBirthInput.max = new Date().toISOString().split("T")[0];

    // Add an event listener to the date of birth input field
    dateOfBirthInput.addEventListener("change", function () {
    // Get the selected date of birth
    var selectedDate = new Date(dateOfBirthInput.value);

    // Calculate the age
    var today = new Date();
    var age = today.getFullYear() - selectedDate.getFullYear();

    // Check if the birthday has occurred this year
    if (
        today.getMonth() < selectedDate.getMonth() ||
        (today.getMonth() === selectedDate.getMonth() && today.getDate() < selectedDate.getDate())
    ) {
        age--;
    }

    // Update the age input field with the calculated age
    ageInput.value = age;
});
    /*------------*/
    /*This is for the Given Date not to be select previous years.months,days*/
     // Get the given date input element
     var givenDateInput = document.getElementById("givenDate");

    // Calculate today's date
        var today = new Date();
        today.setHours(0, 0, 0, 0); // Set hours, minutes, seconds, and milliseconds to zero

    // Set the maximum date for the input field to today
    givenDateInput.max = today.toISOString().split("T")[0];
    </script>
   <script src="../cssmainmenu/script.js"></script>
</html>
<?php
}
else{
	header("Location:.././index.php?error=UnAuthorized Access");
}
