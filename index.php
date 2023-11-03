<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>LOGIN</title> 
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
        <img src="img/ourlogo.png" alt="Logo" class="logo">
        <h6 class="text-center p-1" style="text-align: center;">Medicine Management System for Barangay Malitam</h6>
        <h2 style="text-align: center;">LOGIN</h2>
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
        <form action="check-login.php">
          <div class="" action="check-login.php" method="post">
            <div class="input-icon email">
                <span class="far fa-user"></span>
                <input type="email" name="email" id="email" placeholder="Email" />
            </div>
        </div><br>
        <small id="emailError" class="form-text text-danger">Email must be upto 28 characters only.</small>
        
        <div class="">
            <div class="input-icon password">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="password" placeholder="Password" />
                <button type="button" id="passwordToggle" class="toggle-password-btn" onclick="togglePasswordVisibility('password')" style="border: none; background-color: transparent;" >
                  <span class="fas fa-eye-slash toggle-password"style="text-decoration:none;" ></span>   
                </button>
            </div>
        </div><br>
                   
          <div class="row button">
            <input type="submit" value="Login">
          </div><br>
          <div class="pass" style="text-align: center;"><a href="forgot-password.php">Forgot Password?</a></div>
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
    const emailInput = document.getElementById('email');
    const emailError = document.getElementById('emailError');

    emailInput.addEventListener('input', () => {
        const inputValue = emailInput.value;
        if (inputValue.length > 28) {
            emailInput.value = inputValue.slice(0, 28); // Truncate the input to 28 characters
            emailError.style.display = 'block';
        } else {
            emailError.style.display = 'none';
        }
    });
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