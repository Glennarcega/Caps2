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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>

<!--theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

</head>
<style>
  .messageForm {
    background-color: #f5f5f5; /* Baguhin ang kulay base sa iyong estilo */
    border: 1px solid #ccc;
    padding: 20px;
    border-radius: 40px;
    width: 450px;
    margin: auto;
  }
  .selected-values{
    border: 1px solid #ccc;
    border-radius: 10px;
    width: 100%;
  }
  .sendbtn {
  margin-left: 160px;
  text-align: center;
}
.textmessagebox{
  width:100%;
}
</style>
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
        <h3><div class = "alert alert-info">SMS Announcement</div></h3>
 
    <div class="form-container">
      <form id="messageForm" class="messageForm">
        <label for="number">Residents: </label>
        <button id="contacts-button"><i class="fa-solid fa-user-plus"></i></button><br /><br />
        <textarea class="selected-values" type="text" name="number" required ></textarea><br /><br />

        <label for="message">Message:</label>
        <textarea  name="message" class="textmessagebox" rows="4" required></textarea><br /><br />
        <a class="btn btn-success sendbtn"  type="submit"
          value="Send Message"
          onclick="sendMessage(event)"> Send SMS</a>
      </form>
    </div>

    
      
          <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success" role="alert">
              <?=$_GET['success']?>
            </div>
          <?php } ?>
          <br> <br>
          <div id="table-container" style="display: none;">
            <table id="table" class="table table-striped">
                  <thead>
                      <tr>
                      <th>Select All <input type="checkbox" id="select-all"></th>
                          <th>Name</th>
                          <th>Number</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      $query = $mysqli->query("SELECT * FROM residentrecords") or die(mysqli_error());
                      while ($fetch = $query->fetch_array()) {
                      ?>
                          <tr>
                          <td><input type="checkbox" class="checkbox" name="selected_records[]" value="<?php echo $fetch['residentId']; ?>"
                     data-contact-number="<?php echo $fetch['contactNumber']; ?>">     </td>                         
                     <td><?php echo $fetch['lastName'] . ' ' . $fetch['firstName'] . ' ' . $fetch['middleName']; ?>
                              <td><?php echo $fetch['contactNumber'] ?>
                          </tr>
                      <?php
                      }
                      ?>
                  </tbody>
              </table>


<script>
const selectAllCheckbox = document.getElementById('select-all');
const selectedValues = document.querySelector('.selected-values');
let listArray = [];

const checkboxes = document.querySelectorAll('.checkbox');

selectAllCheckbox.addEventListener('change', function () {
    if (this.checked) {
        listArray = Array.from(checkboxes).map((checkbox) => {
            checkbox.checked = true;
            return checkbox.getAttribute('data-contact-number');
        });
    } else {
        checkboxes.forEach((checkbox) => {
            checkbox.checked = false;
        });
        listArray = [];
    }
    selectedValues.textContent = listArray.join(', ');
});

checkboxes.forEach((checkbox) => {
    checkbox.addEventListener('change', function () {
        if (this.checked === true) {
            listArray.push(this.getAttribute('data-contact-number'));
        } else {
            listArray = listArray.filter((e) => e !== this.getAttribute('data-contact-number'));
        }
        selectedValues.textContent = listArray.join(', ');
    });
});
</script> 


            </tbody>
          </table> 
          	
          </div>
      </div>
    </div>
  </section>
  
  
</body>

<script>
    // Add JavaScript to handle the "Select All" functionality
    document.getElementById('select-all').addEventListener('change', function () {
        var checkboxes = document.querySelectorAll('input[name="selected_records[]"]');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = this.checked;
        }
    });
</script>
<script>
      function sendMessage(event) {
        event.preventDefault() // Prevent the default form submission

        // Get form data
        const formData = new FormData(document.getElementById("messageForm"))

        // Create a new XMLHttpRequest object
        const xhr = new XMLHttpRequest()
        xhr.open("POST", "send_message.php", true)
        xhr.setRequestHeader(
          "Content-type",
          "application/x-www-form-urlencoded"
        )

        // Handle the request
        xhr.onreadystatechange = function () {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              // Display the API response to the user
              alert(xhr.responseText)
            } else {
              // Display an error message if the request fails
              alert("Failed to send the message.")
            }
          }
        }

        // Send the form data
        xhr.send(new URLSearchParams(formData).toString())
      }
    </script>
    <script>
  // Function to toggle the visibility of the table-container div
  function toggleTable() {
    var tableContainer = document.getElementById("table-container");
    tableContainer.style.display = tableContainer.style.display === "none" ? "block" : "none";
  }

  // Add a click event listener to the "Contacts" button
  document.getElementById("contacts-button").addEventListener("click", toggleTable);
</script>

  <!-- Scripts -->
  <script src="../cssmainmenu/script.js"></script>
  <script src = "../js/jquery.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script>	

<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();
	});
</script>
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
