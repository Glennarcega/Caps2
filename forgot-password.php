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
    flex: 1;
    width: 100%;
    border: none;
    border-radius: 20px;
    outline: none;
    background: #fff;
    font-size: 1.2rem;
    color: #666;
    padding: 10px 15px 10px 10px;
    margin-left: 25px;
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
</style>
<body class =bodyy>
<div class="form-container">
<div class="form-field d-flex align-items-center" method="post">
    <form class="mx-auto" method="post" action="send-password-reset.php"
        style="background-color: rgba(255, 250, 205, 0.8)">
        <img src="img/ourlogo.png" alt="Logo" class="logo">
        <h6 class="text-center p-1">Medicine Management System for Barangay Malitam</h6>
        <br>
        <h3 class="text-center p-1">Forgot Password</h3>
        <div>
        <div class="input-icon">
            <span class="far fa-user"></span>
            <input type="email" name="email" id="email" placeholder="Enter Email Address" />
        </div>  
        <div class="password-container">            
        </div>
        <br>
        <button class="btn btn-primary mt-0">Send</button>
        <br>
</div>
        </form>
    </form>
</div>
   
</body>
</html>
