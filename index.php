<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- custom css file link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <link rel="stylesheet" href="csslog/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
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

    @media screen and (max-width: 767px) {
        /* Additional CSS for low-resolution tablets and iPads */
        /* You can add styles specific to this screen size here */
    }

    @media screen and (max-width: 1024px) {
        /* Additional CSS for tablets (portrait mode) */
        /* You can add styles specific to this screen size here */
    }

    @media screen and (max-width: 1280px) {
        /* Additional CSS for desktops */
        /* You can add styles specific to this screen size here */
    }

    @media screen and (min-width: 1281px) {
        /* Additional CSS for larger screens */
        /* You can add styles specific to this screen size here */
    }

</style>
<body class ="bodyy">
<div class="form-container">
    <form class="mx-auto"
          action="check-login.php"
          method="post"
          style="background-color: rgba(255, 250, 205, 0.8)">
        <img src="img/ourlogo.png" alt="Logo" class="logo">
        <h6 class="text-center p-1">Medicine Management System for Barangay Malitam</h6>
        <h2 class="text-center p-1">LOGIN</h2>
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
        
    <div class="form-field d-flex align-items-center"  action="check-login.php" method="post">
    <div class="input-icon">
    <span class="far fa-user"></span>
    <input type="email" name="email" id="email" placeholder="Email" style="font-size:15px; height: 50px; width:255px;"/>
    </div>
    </div>
    <small id="emailError" class="form-text text-danger">Email must be 6-28 characters.</small>
    <div class="form-field d-flex align-items-center">
        <div class="input-icon">
            <span class="fas fa-key"></span>
            <input type="password" name="password" id="password" oninput="togglePasswordButton('passwordToggle')" autocomplete="off" required placeholder="Password" style="font-size:15px; height: 50px; width:255px;"/>
            <button type="button" id="passwordToggle" class="toggle-password-btn" onclick="togglePasswordVisibility('password')">
            <i class="fas fa-eye-slash toggle-password"></i>
            </button>
        </div>
    </div>
        <input type="submit" class="btn btn-primary mt-0" value="Login">
        <br>
        <br>
        <a href="forgot-password.php" style="text-decoration: none;">Forgot Password?</a>
    </form>
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
</body>
</html>
