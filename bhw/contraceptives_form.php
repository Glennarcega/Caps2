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
    <form class="fpform" id="form1">
      <h1><b>Family Planning Form</b></h1><br>
      <h4><b>Personal Information</b></h4>

      <?php
         $query = $mysqli->query("SELECT * FROM `residentrecords`") or die(mysqli_error());
         $fetch = $query->fetch_array();
      ?>

      <label class="lbl">Last Name</label>
      <input type="text" class ="textbox" id="lastName" name="lastName" value="<?php echo $fetch['lastName']; ?>"  placeholder="e.g. Dela Cruz">
      <label class="lbl">First Name</label>
      <input type="text" class ="textbox" id="firstName" id="firstName" value="<?php echo $fetch['firstName']; ?>" placeholder="e.g. Juan">
      <label class="lbl">Middle Initial</label>
      <input type="text" class ="textbox" id="middleName" id="middleName" value="<?php echo $fetch['middleName']; ?>" placeholder="e.g. S.">
      <label class="lbl">Birthdate</label>
      <input type="date" class ="textbox"  id="dateOfBirth">
      <label class="lbl">Age</label>
      <input type="number" class ="textbox" id="age" placeholder="Enter Your Age"  maxlength="3">
      <label class="lbl">Gender</label>
      <select id="sex" class ="textbox" >
        <option value="" disabled selected>Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>
      <label class="lbl">Contact Number</label>
      <input type="number" class ="textbox" id="contact_number" placeholder="e.g 0946">
      <label class="lbl">Educational Attainment</label>
      <select id="educational_attainment" class ="textbox" >
        <option value="" disabled selected>Educational Attainment</option>
        <option value="elementary">Elementary</option>
        <option value="high_school">High School</option>
        <option value="college">College</option>
        <option value="graduate_school">Graduate School</option>
      </select>
      <label class="lbl">Ocuupation</label>
      <input type="text" class ="textbox" id="occupation" name="occupation">
      <label class ="lbl">House Number</label>
      <input type="number" class ="textbox" id="house_number" placeholder="e.g 123">
      <label class="lbl">Street</label>
      <select id="street" class ="textbox" >
        <option value="" disabled selected>Street</option>
        <option value="IlangIlang">Ilang Ilang</option>
        <option value="Camia">Camia</option>
        <option value="Rosal">Rosal</option>
        <option value="Sampaguita">Sampaguita</option>
        <option value="Malitam Dos">Malitam Dos</option>
        <option value="Malitam Tres">Malitam Tres</option>
        <option value="BadjCom">Badjao Community</option>
      </select>
  
      <label class="lbl">Civil Status</label>
      <select id="civil_status" class ="textbox">
        <option value="" disabled selected>Civil Status</option>
        <option value="single">Single</option>
        <option value="married">Married</option>
        <option value="widowed">Widowed</option>
        <option value="divorced">Divorced</option>
      </select>
      <label class="lbl">Religion</label>
      <input type="text" class ="textbox" id="religion">
      <div class="mt-5 text-right"> <button type = "button" name="button" class = "btn btn-primary profile-button" onclick="nextForm()"> Next ></button></div>    
    </form>

    <form class="fpform hidden" id="form2"><!--Pangalawang Form -->
      <h1><b>Family Planning Form</b></h1><br>
      <h4><b>Spouse Information</b></h4>
      <label class="lbl">Last Name</label>
      <input type="text" class ="textbox" id="lastName" name="lastName"   placeholder="e.g. Dela Cruz">
      <label class="lbl">First Name</label>
      <input type="text" class ="textbox" id="firstName" id="firstName"  placeholder="e.g. Juan">
      <label class="lbl">Middle Initial</label>
      <input type="text" class ="textbox" id="middleName" id="middleName"  placeholder="e.g. S.">
      <label class="lbl">Birthdate</label>
      <input type="date" class ="textbox"  id="dateOfBirth">
      <label class="lbl">Age</label>
      <input type="number" class ="textbox" id="age" placeholder="Enter Your Age"  maxlength="3">
      <label class="lbl">Ocuupation</label>
      <input type="text" class ="textbox" id="occupation" name="occupation">
      <div>
  <div class="mt-5 text-left" style="display: inline-block; margin-right: 10px;">
    <button type="button" name="button" class="btn btn-primary profile-button" onclick="prevForm()"> &lt; Previous</button>
  </div>    
  <div class="mt-5 text-right" style="display: inline-block; float:right;">
    <button type="button" name="button" class="btn btn-primary profile-button" onclick="nextForm()">Next &gt;</button>
  </div>    
</div>

    </form>
    <form class="fpform hidden" id="form3"><!--Pangatlong Form -->
      <h1><b>Family Planning Form</b></h1><br>
      <h4><b>Type of Client </b></h4>
      
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
	let currentFormIndex = 0;
const forms = document.querySelectorAll('.fpform');

function nextForm() {
  if (currentFormIndex < forms.length - 1) {
    forms[currentFormIndex].classList.add('hidden');
    currentFormIndex++;
    forms[currentFormIndex].classList.remove('hidden');
  }
}

function prevForm() {
  if (currentFormIndex > 0) {
    forms[currentFormIndex].classList.add('hidden');
    currentFormIndex--;
    forms[currentFormIndex].classList.remove('hidden');
  }
};
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