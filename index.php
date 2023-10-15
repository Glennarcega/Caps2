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

    /* Responsive adjustments */
    @media screen and (max-width: 480px) {
        .toggle-password-btn {
            right: 5px; /* Adjust the button's position for smaller screens */
        }
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
<body class =bodyy>
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

        <input type="text" placeholder="Email" class="form-control" name="email" id="email" required>

        <div class="form-group">
        <div class="password-container">
            <input type="password" placeholder="Password" name="password" class="form-control" id="password" oninput="togglePasswordButton('passwordToggle')" autocomplete="off" required style="padding-right: 40px;" />
            <button type="button" id="passwordToggle" class="toggle-password-btn" onclick="togglePasswordVisibility('password')">
                <i class="fas fa-eye-slash"></i>
            </button>
        </div>
    </div>
        <input type="submit" class="btn btn-primary mt-0" value="Login">
        <br>
        <br>
        <a href="forgot-password.php">Forgot Password?</a>
    </form>
</div>

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

        /* Responsive adjustments */
        @media screen and (max-width: 768px) {
            .toggle-password-btn {
                right: 5px; /* Adjust the button's position for smaller screens */
            }
        }
</style>
</body>
</html>
