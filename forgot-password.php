<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- custom css file link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <link rel="stylesheet" href="csslog/style.css">
    <link rel="stylesheet" href="csslog/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<style>
    
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

.form-fieldd {
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

}
</style>
<body>
<div class="column">
        <div class="card">
<div class="form-container">
<div class="form-field d-flex align-items-center" method="post">
    <form class="mx-auto" method="post" action="send-password-reset.php"
        style="background-color: rgba(255, 250, 205, 0.8)">
        <img src="img/ourlogo.png" alt="Logo" class="logo">
        <h6 class="text-center p-1">Medicine Management System for Barangay Malitam</h6>
        <br>
        <h3 class="text-center p-1">Forgot Password</h3>
    <div class="form-fieldd d-flex align-items-center" method="post">
    <div class="input-icon">
    <span class="far fa-user"></span>
    <input type="email" name="email" id="email" placeholder="Email" style="font-size:15px; height: 50px; width:255px;"/>
    </div>
    </div>
    <small id="emailError" class="form-text text-danger">Email must be 6-28 characters.</small>
    <div class="password-container">            
        </div>
        <br>
        <button class="btn btn-primary mt-0">Send</button>
        <br>
</div>
        </form>
    </form>
</div>
</div>
</div>
<script>
    document.querySelector('#email').addEventListener('input', function () {
        const input = this.value;
        const emailError = document.querySelector('#emailError');
        
        if (input.length > 27) {
            this.value = input.slice(0, 27); // Truncate the input to 24 characters
        }

        if (input.length < 6 || input.length > 27) {
            emailError.textContent = 'Email must be 6-24 characters.';
            emailError.style.display = 'block'; // Ensure the error message is displayed
            this.setCustomValidity('Email must be 6-24 characters.');
        } else {
            emailError.textContent = '';
            emailError.style.display = 'none'; // Hide the error message
            this.setCustomValidity('');
        }
    });
</script>
</body>
</html>
