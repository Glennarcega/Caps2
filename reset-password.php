<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/connection/connect.php";

$sql = "SELECT * FROM user
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    die("token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
     <!-- custom css file link -->
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <link rel="stylesheet" href="csslog/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
.password-container {
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
.form-field input {
    width: 100%;
    display: block;
    border: none;
    outline: none;
    font-size: 1.2rem;
    color: #666;
    padding: 10px 15px 10px 10px;
    border-radius: 20px;
}

.form-field {
    display: flex;
    align-items: center;
    padding-left: 10px;
    margin-bottom: 20px;
    border-radius: 20px;
    background-color: #fff;
}

.form-field input {
    flex: 1;
    width: 100%;
    border: none;
    outline: none;
    background: none;
    font-size: 1.2rem;
    color: #666;
    padding: 10px 15px 10px 10px;
    margin-left:30px;
}

.input-icon {
    position: relative;
    display: flex;
    align-items: center;
}

.input-icon span {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 1.2rem;
    color: #555;
}

.toggle-password {
    cursor: pointer;
    transition: color 0.3s;
    margin-left: -30px; /* I-adjust ang margin para ilagay ang icon sa kanan ng password field */
}

.toggle-password.active {
    color: #555; /* Baguhin ang kulay ng mata icon kapag ito ay active (password visible) */
}
#emailError {
    color: red;
    display: none;
    margin-top: -20px;
}



/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
    

  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 20px;
  text-align: center;
  background-image: url("./img/opening.jpg");
  font-size: 16px;
    display: block;
    background-repeat: no-repeat;
    background-size: cover;
    padding: 20px;
    text-align: center;
}



</style>
</head>

<body>
<div class="column">
        <div class="card">
<div class="form-container">
    <form method="post" class="mx-auto" method="post" action="process-reset-password.php"
          style="background-color: #FFFACD">
        <img src="img/ourlogo.png" alt="Logo" class="logo">
        <h6 class="text-center p-1">Medicine Management System for Barangay Malitam</h6>
        <h2 class="text-center p-1">Reset Password</h2>
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?= $_GET['error'] ?>
            </div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success" role="alert">
                <?= $_GET['success'] ?>
            </div>
        <?php } ?>

        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
        <div class="form-field d-flex align-items-center">
            <div class="input-icon">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="password" oninput="togglePasswordButton('passwordToggle')" autocomplete="off" required placeholder="Enter New Password" style="font-size: 15px; height: 50px; width: 255px;" />
                <button type="button" id="passwordToggle" class="toggle-password-btn" onclick="togglePasswordVisibility('password')">
                    <i class="fas fa-eye-slash toggle-password"></i>
                </button>
            </div>
            <p id="password-validation-msg" class="form-text text-danger"></p> <!-- Add a paragraph for validation messages -->
        </div>
        

        <div class="form-field d-flex align-items-center">
            <div class="input-icon">
                <span class="fas fa-key"></span>
                <input type="password" name="password_confirmation" id="password_confirmation" oninput="togglePasswordButton('passwordConfirmationToggle')" autocomplete="off" required placeholder="Confirm Password" style="font-size: 15px; height: 50px; width: 255px;" />
                <button type="button" id="passwordConfirmationToggle" class="toggle-password-btn" onclick="togglePasswordVisibility('password_confirmation')">
                    <i class="fas fa-eye-slash toggle-password"></i>
                </button>
            </div>
        </div>

        <br>
        <button class="btn btn-primary mt-0">Send</button>
        <br>
    </form>
</div>
</body>

<script>
function togglePasswordButton(inputId) {
    var passwordInput = document.getElementById(inputId);
    var showPasswordBtn = document.getElementById(inputId + "Toggle");

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
        showPasswordBtn.querySelector("i").classList.remove("fa-eye-slash");
        showPasswordBtn.querySelector("i").classList.add("fa-eye");
    } else {
        passwordInput.type = "password";
        showPasswordBtn.querySelector("i").classList.remove("fa-eye");
        showPasswordBtn.querySelector("i").classList.add("fa-eye-slash");
    }
}
</script>

<script>
       function validatePassword() {
    const passwordInput = document.getElementById("password");
    const password = passwordInput.value;
    const passwordValidationMsg = document.getElementById("password-validation-msg");
    const submitButton = document.getElementById("submit-button"); // Get the submit button.

    // Define a regular expression pattern for allowed characters.
    const allowedCharacters = /^[a-zA -Z0-9 /^!@#$%^&*()\-_=+\{}|;:,<.>\/?+$/]+$/;

    if (password.length < 8) {
        passwordValidationMsg.textContent = "Password must be at least 8 characters long.";
        submitButton.disabled = true; // Disable the submit button.
        return false; // Prevent form submission
    } else if (!allowedCharacters.test(password)) {
        passwordValidationMsg.textContent = "Password contains disallowed that characters.";
        submitButton.disabled = true; // Disable the submit button.
        return false; // Prevent form submission
    } else {
        passwordValidationMsg.textContent = ""; // Clear any previous validation message.
        submitButton.disabled = false; // Enable the submit button.
        return true; // Allow form submission
    }
}

    </script>
</html>
