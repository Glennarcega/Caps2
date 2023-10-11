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