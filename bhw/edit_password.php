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
  <title>Edit Account</title>
  <!-- Link Styles -->
  <link rel="stylesheet" href="../cssmainmenu/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
  <link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<style>
.form-control:focus {
    box-shadow: none;
    border-color: #04c487;
}

/* Simplify button styles */
.profile-button {
    background: #04c487;
    border: none;
    color: #fff;
}

/* Change button background on hover and focus */
.profile-button:hover,
.profile-button:focus {
    background: #04c487;
}

/* Adjust hover effect for back link */
.back:hover {
    color: #04c487;
    cursor: pointer;
}

/* Increase font size for labels on smaller screens */
@media (max-width: 768px) {
    .labels {
        font-size: 14px;
    }
}

/* Adjust hover effect for add-experience button */
.add-experience:hover {
    background: #04c487;
    color: #fff;
    cursor: pointer;
    border: solid 1px #04c487;
}
.password-input-container { /*Password button*/ 
            position: relative;
        }

.toggle-password-btn {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
        }

        /* Para di maibo ang button sa pass (to make it responsive) */
@media screen and (max-width: 768px) {
            .toggle-password-btn {
                right: 5px; /* Adjust the button's position for smaller screens */
            }
        }
@media screen and (max-width: 600px) {
            .password-input-container {
                position: relative;
            }
            .password-toggle {
                position: absolute;
                right: 10px;
                top: 50%;
                transform: translateY(-50%);
            }
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
    <div class="text">Account</div>
    <div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Account / Create Account</div>
				<div class = "col-md-4">	
    <div class="form-container">
    <form action="" method="POST">
    <?php if (isset($_SESSION['error_message'])) { ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['error_message']; ?>
    </div>
    <?php unset($_SESSION['error_message']); ?>
    <?php } ?>
	   <br></br>

    <div class="form-group">
        <label>Email </label>
        <input type="email" class="form-control" name="email"value="<?php echo $_SESSION['user_data']['email']; ?>" placeholder="example@gmail.com" required/>
    </div>
    <div class="form-group">
        <label>Password</label>
    <div class="password-input-container">
        <input type="password" placeholder="Enter your password" name="password" class="form-control" id="password" oninput="validatePassword()" autocomplete="off" required style="padding-right: 40px;" />
        <button type="button" id="passwordToggle" class="toggle-password-btn" onclick="togglePasswordVisibility('password')">
            <i class="fas fa-eye-slash"></i>
        </button>
    </div>
    <div id="password-validation-msg" style="color: red;"></div>
</div>	
	  <div class = "form-group">
			<label>Confirm Password </label>
            <div class="password-input-container">
            <input type="password" placeholder="Type your password again" name="cpassword" class="form-control" id="cpassword" oninput="togglePasswordButton('cpasswordToggle')" autocomplete="off" required style="padding-right: 40px;" />
            <button type="button" id="cpasswordToggle" class="toggle-password-btn" onclick="togglePasswordVisibility('cpassword')">
                <i class="fas fa-eye-slash"></i>
            </button>
        </div>
	  </div>	
</div>
 <br></br>
	  <div class = "form-group">
			<button type = "submit" name="submit" class = "btn btn-success form-control"><i class = "bx bx-plus"></i> Update</button>
		</div>
        <?php
	require_once '../connection/connect.php';
	if(ISSET($_POST['submit'])){
		$email = $_POST['email'];
        $pass = md5($_POST['password']);
        $cpass = md5($_POST['cpassword']);
       
        if ($pass != $cpass) {
            echo '<script>alert("Password not matched!");</script>';
            echo '<script>window.history.pushState({}, "", "edit_password.php?id=' . $_REQUEST['id'] . '");</script>';
        
        
                } else {
                  
                    $query = $mysqli->query("UPDATE `user` SET  `email` = '$email', `password` = '$pass' WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
                    echo '<script>alert("Update Password Successfully. Click OK to logout and Login again to see changes.");</script>';
                      
                    // Automatically redirect to the logout page
                    echo '<script>window.location.href = "../index.php";</script>';
                }
            }
		?>
</section>
</body>
<!-- Scripts -->
<script>
    function togglePasswordButton(buttonId) {
            var passwordInput = document.getElementById(buttonId.replace('Toggle', ''));
            var showPasswordBtn = document.getElementById(buttonId);

            if (passwordInput.value.length > 0) {
                showPasswordBtn.style.display = "block";
            } else {
                showPasswordBtn.style.display = "none";
            }
        }

        function togglePasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            var showPasswordBtn = document.getElementById(inputId + "Toggle");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPasswordBtn.innerHTML = '<i class="fas fa-eye"></i>';
            } else {
                passwordInput.type = "password";
                showPasswordBtn.innerHTML = '<i class="fas fa-eye-slash"></i>';
            }
        }
</script>
<script>
function validatePassword() {
    const passwordInput = document.getElementById("password");
    const password = passwordInput.value;
    const passwordValidationMsg = document.getElementById("password-validation-msg");

    // Define a regular expression pattern for allowed characters.
    const allowedCharacters = /^[a-zA-Z0-9!@#]+$/;

    if (password.length < 8) {
        passwordValidationMsg.textContent = "Password must be at least 8 characters long.";
    } else if (!allowedCharacters.test(password)) {
        passwordValidationMsg.textContent = "Password contains disallowed characters. Only letters, numbers, !, @, and # are allowed.";
    } else {
        passwordValidationMsg.textContent = ""; // Clear any previous validation message.
    }
}
</script>

<script src="../cssmainmenu/script.js"></script>
  <script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>

</html>

<?php
}
else{
	header("Location:.././index.php?error=UnAuthorized Access");
}