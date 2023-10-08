<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- custom css file link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <link rel="stylesheet" href="csslog/style.css">
</head>
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

        <input type="text" placeholder="Enter Email" class="form-control" name="email" id="email">
s
        <div class="password-container">
            <input type="password" placeholder="Password" name="password" class="form-control" id="password"
                   oninput="togglePasswordButton()" autocomplete="off">
            <span class="password-toggle" id="passwordToggle" onclick="togglePassword()">
                &#x1F441; <!-- Unicode for eye icon -->
            </span>
        </div>
        <input type="submit" class="btn btn-primary mt-0" value="Login">
        <br>
        <br>
        <a href="forgot-password.php">Forgot Password?</a>
    </form>
</div>

<script>
    function togglePasswordButton() {
        var passwordField = document.getElementById("password");
        var passwordToggle = document.getElementById("passwordToggle");

        if (passwordField.value === "") {
            passwordToggle.style.display = "none";
        } else {
            passwordToggle.style.display = "inline-block";
        }
    }

    function togglePassword() {
        var passwordField = document.getElementById("password");
        var passwordToggle = document.getElementById("passwordToggle");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            passwordToggle.innerHTML = "&#x1F440;"; // Unicode for crossed eye icon
        } else {
            passwordField.type = "password";
            passwordToggle.innerHTML = "&#x1F441;"; // Unicode for eye icon
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

    .password-toggle {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
    }
</style>
</body>
</html>
