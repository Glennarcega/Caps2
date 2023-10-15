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
          <h3><div class="alert alert-info">Contraceptives</div></h3> 
          <div class="col-md-8 col-md-offset-3">
          <div class="container">
          <?php
        $productName = isset($_GET['productName']) ? $_GET['productName'] : '';
         $query = $mysqli->query("SELECT * FROM medicines WHERE productName = '$productName'") or die(mysqli_error());
         $fetch = $query->fetch_array();
         ?>

                      <form class="fpform" id="form1">
                      <h1><b>Family Planning Form</b></h1><br>
                        <h4><b>Family Planning Method Request</b></h4>

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

                              <br>
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
                                <input type="text" class="form-control" name="age" id ="age" required readonly/>
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
                                <select class="form-control" required="required" name="educAttainment" id="usertypeSelect">
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
                                <input type="text" class="form-control" name="housenumber" id ="housenumber" placeholder="Optional"/>
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
                            <label>Civil Status</label>
                                <select class="form-control" required="required" name="civilstatus" required>
                                  <option value="" disabled selected>Civil Status</option>
                                  <option value="single">Single</option>
                                  <option value="married">Married</option>
                                  <option value="widowed">Widowed</option>
                                  <option value="divorced">Divorced</option>
                                </select>
                            <div class="form-group" >
                                <label>Religion</label>
                                <input type="text" class="form-control" name="religionr" id ="religion" placeholder="Optional"/>
                            </div>  
          <div class="mt-5 text-right"> <button type = "button" name="button" class = "btn btn-primary profile-button" onclick="nextForm('')"> Next ></button></div>    
    </form>

                     <form class="fpform hidden" id="form3"><!--Pangalawang Form -->
                            <h4><b>Spouse Information</b></h4>
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
                                <input type="text" class="form-control" name="agespouse" id ="agespouse" required readonly/>
                            </div>
                          <div class="mt-5 text-left" style="display: inline-block; margin-right: 10px;">
                            <button type="button" name="button" class="btn btn-primary profile-button" onclick="prevForm()"> &lt; Previous</button>
                          </div>    
                          <div class="mt-5 text-right" style="display: inline-block; float:right;">
                            <button type="button" name="button" class="btn btn-primary profile-button" onclick="nextForm()">Next &gt;</button>
                          </div>    
                        </div>
            </form>

    <form class="fpform hidden" id="form4"><!--Pangatlong Form -->
      <h1><b>Family Planning Form</b></h1><br>
      
      <label>Type of Client</label>
<select class="form-control" required name="civilstatus" id="clientType">
  <option value="" disabled selected>Type of Client</option>
  <option value="currentUser">Current User</option>
  <option value="dropoutRestart">Dropout / Restart</option>
  <option value="changingMethod">Changing Method</option>
  <option value="others">Others</option>
</select>

<div id="changingMethodSection" style="display: none;">
  <label>Changing Method</label>
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
</div>
<div id="othersSection" style="display: none;">
  <label>Others</label>
  <input type="text" class="textbox" name="others" id="others" placeholder="Others">
</div>

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


      <label class="lblcheck"></label>
          <div class="checkbox-container">
            <label class="checkcontainer">New Acceptor
              <input type="checkbox" name="menstrualFlow">
              <span class="checkmark"></span>
            </label><br>
            <label class="checkcontainer">Current User
              <input type="checkbox" name="menstrualFlow">
              <span class="checkmark"></span>
            </label><br>
            <label class="checkcontainer">Dropout / Restart
              <input type="checkbox" name="menstrualFlow">
              <span class="checkmark"></span>
            </label><br>
            <label class="checkcontainer">Changing Method
              <input type="checkbox" name="menstrualFlow">
              <span class="checkmark"></span>
            </label><br>
            <div>
            <label class="lbl">Reason</label>
            <br>
            <label class="checkcontainer">Medical Condition
              <input type="checkbox" name="menstrualFlow">
              <span class="checkmark"></span>
            </label><br>
            <label class="checkcontainer">Others
              <input type="checkbox" name="menstrualFlow">
              <span class="checkmark"></span>
            </label>
</div>
<div>
            <label class="lbl">Method for currently use (for changing Method)</label>
            <br>
            <label class="checkcontainer">COC
              <input type="checkbox" name="coc">
              <span class="checkmark"></span>
            </label>
            <label class="checkcontainer">Iud
              <input type="checkbox" name="iud">
              <span class="checkmark"></span>
            </label>
            <label class="checkcontainer">POP
              <input type="checkbox" name="pop">
              <span class="checkmark"></span>
            </label><br>
            <label class="checkcontainer">BOM/CMM
              <input type="checkbox" name="bom/cmm">
              <span class="checkmark"></span>
            </label><br>
            <label class="checkcontainer">Injectable
              <input type="checkbox" name="injectible">
              <span class="checkmark"></span>
            </label>
             <label class="checkcontainer">BBT
              <input type="checkbox" name="bbt">
              <span class="checkmark"></span>
            </label><br>
            <label class="checkcontainer">Implant
              <input type="checkbox" name="implant">
              <span class="checkmark"></span>
            </label><br>
            <label class="checkcontainer">STM
              <input type="checkbox" name="stm">
              <span class="checkmark"></span>
            </label>
            <label class="checkcontainer">LAM
              <input type="checkbox" name="lam">
              <span class="checkmark"></span>
            </label>
            <label class="checkcontainer">Others
              <input type="checkbox" name="stm">
              <span class="checkmark"></span>
            </label>
</div>
<input type="text" class ="textbox" id="others" id="others" placeholder="others">

</div>
<br>
<label class="lblcheck">Reason For Fp</label>
<div class="checkbox-container">
  <label class="checkcontainer">Spacing
    <input type="checkbox" name="spacing">
    <span class="checkmark"></span>
  </label><br>
  <label class="checkcontainer">Limiting
    <input type="checkbox" name="limiting">
    <span class="checkmark"></span>
  </label><br>
  <label class="checkcontainer">Others
    <input type="checkbox" name="others">
    <span class="checkmark"></span>
    <input type="text" class ="textbox" name="others">
  </label>
  <input type="text" class ="textbox" id="others" id="others" placeholder="others">

</div>
<br>
    
  <div class="mt-5 text-left" style="display: inline-block; margin-right: 10px;">
    <button type="button" name="button" class="btn btn-primary profile-button" onclick="prevForm()"> &lt; Previous</button>
  </div>    
  <div class="mt-5 text-right" style="display: inline-block; float:right;">
    <button type="button" name="button" class="btn btn-primary profile-button" onclick="nextForm()">Submit &gt;</button>
  </div>    
</div>
    </form>
  </div>
    </tbody>
</table>
            </tbody>
          </table>
        </div>
      </div>
    </div>


  </section>
  

  <script src="../cssmainmenu/script.js"></script>
  <script type = "text/javascript">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="../js.js"></script>
<script src = "../js/jquery.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script>	
<script type = "text/javascript">
  /*Button na next at prev*/ 
  
  function nextForm() {
    var currentStep = document.querySelector('.fpform:not(.hidden)');
    if (currentStep) {
      var nextStep = currentStep.nextElementSibling;
      if (nextStep) {
        currentStep.classList.add('hidden');
        nextStep.classList.remove('hidden');
      }
    }
  }

  /* Button to move to the previous form step */
  function prevForm() {
    var currentStep = document.querySelector('.fpform:not(.hidden)');
    if (currentStep) {
      var prevStep = currentStep.previousElementSibling;
      if (prevStep) {
        currentStep.classList.add('hidden');
        prevStep.classList.remove('hidden');
      }
    }
  }
/*Checkboxes*/

const checkboxes = document.querySelectorAll("input[type='checkbox']");
  checkboxes.forEach(checkbox => {
    checkbox.addEventListener("change", () => {
      if (checkbox.checked) {
        uncheckOtherCheckboxes(checkbox);
      }
    });
  });

  function uncheckOtherCheckboxes(checkbox) {
    const groupName = checkbox.getAttribute("name");
    const groupCheckboxes = document.querySelectorAll(`input[type='checkbox'][name='${groupName}']`);
    groupCheckboxes.forEach(cb => {
      if (cb !== checkbox) {
        cb.checked = false;
      }
    });
  }
  /*Date of Birth and Age*/
  /*This is for the date(not to select future dates) and age computation*/
  // Get references to the date of birth and age input fields
  var dateOfBirthInput = document.getElementById("dateOfBirth");
    var ageInput = document.getElementById("age");

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
        
        // Restrict the selection of future dates
        var maxDate = new Date(today);
        maxDate.setFullYear(today.getFullYear() - 1); // Set the maximum date to one year ago
        dateOfBirthInput.max = maxDate.toISOString().split("T")[0];
    });

    // Set the initial maximum date for the dateOfBirthInput
    var today = new Date();
    dateOfBirthInput.max = today.toISOString().split("T")[0];
</script>
</body>
</html>
<?php
}
else{
	header("Location:.././index.php?error=UnAuthorized Access");
}