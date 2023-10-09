
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
    <form class="mx-auto" method="post" action="send-password-reset.php"
          style="background-color: #FFFACD">
        <img src="img/ourlogo.png" alt="Logo" class="logo">
        <h6 class="text-center p-1">Medicine Management System for Barangay Malitam</h6>
        <br>
        <h3 class="text-center p-1">Forgot Password</h3>
        <input type="email" required placeholder="Enter Email address"
               class="form-control"
               name="email" id="email">

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
