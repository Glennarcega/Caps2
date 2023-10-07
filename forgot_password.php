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
          action=""
          method="post"
          style="background-color: #FFFACD">
        <img src="img/ourlogo.png" alt="Logo" class="logo">
        <h6 class="text-center p-1">Medicine Management System for Barangay Malitam</h6>
        <h2 class="text-center p-1">Forgot Password</h2>

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


<form method="POST" action="send_email.php">
        <input type="text" required placeholder="Enter Email address"
               class="form-control"
               name="username">

        <div class="password-container">            
        </div>
        <br>
        <input type="submit" class="btn btn-primary mt-0" value="Continue">
        <br>
    

    </form>
</div>
   

</style>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Check if URL contains 'error' parameter and remove it
    if (window.location.search.includes('error')) {
        var newUrl = window.location.protocol + '//' + window.location.host + window.location.pathname;
        window.history.replaceState({ path: newUrl }, '', newUrl);
    }
});
</script>
</body>
</html>
