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
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <link rel="stylesheet" href="csslog/style.css">
</head>
<body>
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
        <input type="password" required placeholder="Enter New Password"
               class="form-control"
               name="password" id="password">

        <input type="password" required placeholder="Confirm Password"
               class="form-control"
               name="password_confirmation" id="password_confirmation">
        <div class="password-container">            
        </div>
        <br>
        <button class="btn btn-primary mt-0">Send</button>
        <br>
    
        </form>
    </form>
</div>
   
</body>
</html>
