<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Forgot Password</title> 
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
        <h2 style="text-align: center;">Forgot Password</h2>
        <form action="send-password-reset.php" method ="post">
          <div class="">
            <div class="input-icon email">
                <span class="far fa-user"></span>
                <input type="email" name="email" id="email" placeholder="Email" />
            </div>
        </div><br> 
          <div class="row button">
                <input type="submit" value="Send">
          </div><br>
        </form>
      </div>
    </div>
  </body>
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
</html>