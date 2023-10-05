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
  <div class="text">Contraceptives</div>
    <div class="container-fluid">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="alert alert-info">Contraceptives</div>
          <div class="col-md-8 col-md-offset-3">
          <div class="container">
    <form class="fpform" id="form1">
      <h1><b>Family Planning Form</b></h1><br>
      <h4><b>Personal Information</b></h4>
      <label class="lbl">Last Name</label>
      <input type="text" id="last_name" placeholder="e.g. Suayan">
      <label class="lbl">First Name</label>
      <input type="text" id="first_name" placeholder="e.g. Juan">
      <label class="lbl">Middle Initial</label>
      <input type="text" id="middle_initial" placeholder="e.g. S.">
      <label class="lbl">Birthdate</label>
      <input type="date" id="birthdate">
      <label class="lbl">Age</label>
      <input type="number" id="age" placeholder="Enter your age">
      <label class="lbl">Sex</label>
      <select id="sex">
        <option value="" disabled selected>Sex</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>
      <label class="lbl">Educational Attainment</label>
      <select id="educational_attainment">
        <option value="" disabled selected>Educational Attainment</option>
        <option value="elementary">Elementary</option>
        <option value="high_school">High School</option>
        <option value="college">College</option>
        <option value="graduate_school">Graduate School</option>
      </select>
      <input type="button" value="Next >" class="nextbtn" onclick="nextForm()">
    </form>
    <form class="fpform hidden" id="form2"><!--Pangalawang Form -->
      <h1><b>Family Planning Form</b></h1><br>
      <h4><b>Personal Information</b></h4>
      <label class ="lbl">House Number</label>
      <input type="number" id="house_number" placeholder="e.g 123">
      <label class="lbl">Street</label>
      <select id="street">
        <option value="" disabled selected>Street</option>
        <option value="IlangIlang">Ilang Ilang</option>
        <option value="Camia">Camia</option>
        <option value="Rosal">Rosal</option>
        <option value="Sampaguita">Sampaguita</option>
        <option value="Malitam Dos">Malitam Dos</option>
        <option value="Malitam Tres">Malitam Tres</option>
        <option value="BadjCom">Badjao Community</option>
      </select>
      <label class="lbl">Contact Number</label>
      <input type="number" id="contact_number" placeholder="e.g 0946">
      <label class="lbl">Civil Status</label>
      <select id="civil_status">
        <option value="" disabled selected>Civil Status</option>
        <option value="single">Single</option>
        <option value="married">Married</option>
        <option value="widowed">Widowed</option>
        <option value="divorced">Divorced</option>
      </select>
      <label class="lbl">Select Religion:</label>
    <select id="religion">
    <option value="" disabled selected>Religion</option>
      <option value="Roman Catholicism">Roman Catholicism</option>
      <option value="Islam">Islam</option>
      <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
      <option value="Members Church of God International (MCGI)">Members Church of God International (MCGI)</option>
      <option value="Protestantism">Protestantism</option>
      <option value="Buddhism">Buddhism</option>
      <option value="Hinduism">Hinduism</option>
      <option value="Indigenous Beliefs">Indigenous Beliefs</option>
      <option value="Sikhism">Sikhism</option>
      <option value="Bahá'í Faith">Bahá'í Faith</option>
      <option value="Judaism">Judaism</option>
      <option value="Other Minority Religions">Other Minority Religions</option>
</select>
    <label class="lbl">Others: please specify</label>
      <input type="text" id="others" placeholder="please specify your religion">
      <input type="button" value="< Previous" class="prevbtn" onclick="prevForm()">
      <input type="button" value="Next >" class="nextbtn" onclick="nextForm()">
    </form>
    <form class="fpform hidden" id="form3"><!--Pangatlong Form -->
      <h1><b>Family Planning Form</b></h1><br>
      <h4><b>Medical Information </b></h4>
      <label class="lblcheck">Severe headaches/ Migraine</label>
        <div class="checkbox-container">
        <label class="checkcontainer">Yes
      <input type="checkbox">
      <span class="checkmark"></span>
    </label>
    <label class="checkcontainer">No
      <input type="checkbox">
      <span class="checkmark"></span>
    </label>
</label><br>
<label class="lblcheck">Severe Chest Pain</label>
        <div class="checkbox-container">
        <label class="checkcontainer">Yes
      <input type="checkbox">
      <span class="checkmark"></span>
    </label>
    <label class="checkcontainer">No
      <input type="checkbox">
      <span class="checkmark"></span>
    </label><br>
    <label class="lblcheck">Unexplained Vaginal Bleeding</label>
        <div class="checkbox-container">
        <label class="checkcontainer">Yes
      <input type="checkbox">
      <span class="checkmark"></span>
    </label>
    <label class="checkcontainer">No
      <input type="checkbox">
      <span class="checkmark"></span>
    </label><br>
    <label class="lblcheck">Abnormal Vaginal Discharge</label>
        <div class="checkbox-container">
        <label class="checkcontainer">Yes
      <input type="checkbox">
      <span class="checkmark"></span>
    </label>
    <label class="checkcontainer">No
      <input type="checkbox">
      <span class="checkmark"></span>
    </label><br>
    <label class="lblcheck">Menstrual Flow</label>
    <div class="checkbox-container">
        <label class="checkcontainer">Scanty(1-2 pads/day)
      <input type="checkbox">
      <span class="checkmark"></span>
    </label>
    <label class="checkcontainer">Moderate(3-5 pads/day)
      <input type="checkbox">
      <span class="checkmark"></span>
    </label>
    <label class="checkcontainer">Heavy(5 pads a day)
      <input type="checkbox">
      <span class="checkmark"></span>
    </label>
  </div>
    <div class="date-container">
        <label for="menstruationDate">Last Menstruation:</label>
        <input type="date" id="menstruationDate" name="menstruationDate">
    </div>
      <input type="button" value="< Previous" class="prevbtn" onclick="prevForm()">
      <input type="button" value="Submit" class="submitbtn" onclick="nextForm()">
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

function toggleCheckbox(event) {
            var checkbox = event.target;
            var customCheckbox = checkbox.parentNode.querySelector(".custom-checkbox");
            if (checkbox.checked) {
                customCheckbox.classList.add("checked");
            } else {
                customCheckbox.classList.remove("checked");
            }
        }
</script>
</body>
</html>
<?php
}
else{
	header("Location:.././index.php?error=UnAuthorized Access");
}