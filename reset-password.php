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
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Reset Password</title> 
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
     crossorigin="anonymous">
    <link rel="stylesheet" href="csslog/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  </head>
  <body>
    <div class="container">
      <div class="wrapper">
      <form method="post" method="post" action="process-reset-password.php">
        <img src="img/ourlogo.png" alt="Logo" class="logo">
        <h6 class="text-center p-1" style="text-align: center;">Medicine Management System for Barangay Malitam</h6>
        <h2 style="text-align: center;">Reset Password</h2>
        <?php if (isset($_GET['error'])) { ?>
          <div class="alertwarning alert-danger" role="alert">
              <?= $_GET['error'] ?>
          </div>
      <?php } ?>
      
      <?php if (isset($_GET['success'])) { ?>
          <div class="alertsuc alert-success" role="alert">
              <?= $_GET['success'] ?>
          </div>
      <?php } ?>
      <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
      
        <div class="input-icon password">
        <span class="fas fa-key"></span>
        <input type="password" name="password" id="password" autocomplete="off" placeholder="Enter New Password" required/>
        <button type="button" id="passwordToggle" class="toggle-password-btn" onclick="togglePasswordVisibility('password', 'passwordToggle')" style="border: none; background-color: transparent;">
            <span class="fas fa-eye-slash toggle-password" style="text-decoration: none;"></span>
        </button>
    </div><br>

    <div class="">
        <div class="input-icon password">
            <span class="fas fa-key"></span>
            <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="off" placeholder="Confirm Password" required/>
            <button type="button" id="passwordConfirmationToggle" class="toggle-password-btn" onclick="togglePasswordVisibility('password_confirmation', 'passwordConfirmationToggle')" style="border: none; background-color: transparent;">
                <span class="fas fa-eye-slash toggle-password" style="text-decoration: none;"></span>
            </button>
        </div>
    </div><br>
                   
          <div class="row button">
            <input type="submit" value="Submit">
          </div><br>
        </form>
      </div>
    </div>
  </body>
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

    function togglePasswordVisibility(inputId, buttonId) {
        var passwordInput = document.getElementById(inputId);
        var showPasswordBtn = document.getElementById(buttonId);

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
  document.addEventListener("DOMContentLoaded", function() {
      // Check if URL contains 'error' parameter and remove it
      if (window.location.search.includes('error')) {
          var newUrl = window.location.protocol + '//' + window.location.host + window.location.pathname;
          window.history.replaceState({ path: newUrl }, '', newUrl);
      }
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
      // Check if URL contains 'error' parameter and remove it
      if (window.location.search.includes('success')) {
          var newUrl = window.location.protocol + '//' + window.location.host + window.location.pathname;
          window.history.replaceState({ path: newUrl }, '', newUrl);
      }
  });
  </script>
</html>