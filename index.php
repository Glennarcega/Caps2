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
<body>
<div class="form-container">
    <form class="mx-auto"
          action="check-login.php"
          method="post"
          style="background-color: #FFFACD">
        <img src="img/ourlogo.png" alt="Logo" class="logo">
        <h6 class="text-center p-1">Medicine Management System for Barangay Malitam</h6>
        <h2 class="text-center p-1">LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?= $_GET['error'] ?>
            </div>
        <?php } ?>

        <input type="text" required placeholder="Username"
               class="form-control"
               name="username"
               id="username">

        <div class="password-container">
            <input type="password" required placeholder="Password"
                   name="password"
                   class="form-control"
                   id="password"
                   oninput="togglePasswordButton()"
                   autocomplete="off">
            <span class="password-toggle" id="passwordToggle" onclick="togglePassword()">
                &#x1F441; <!-- Unicode for eye icon -->
            </span>
        </div>
        <input type="submit" class="btn btn-primary mt-0" value="Login">
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
