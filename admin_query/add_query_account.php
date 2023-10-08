<?php

if (empty($_POST["name"])) {
    die("Name is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["cpassword"]) {
    die("Passwords must match");
}

$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/connection/connect.php";

$sql = "INSERT INTO user (fname,lname,address,mobile_number,email,usertype,password)
        VALUES (?, ?, ?,?, ?, ?,?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["fname"],
                  $_POST["lname"],
                  $_POST["address"],
                  $_POST["mobile_number"],
                  $_POST["email"],
                  $_POST["usertype"],
                  $password_hash);
                  
if ($stmt->execute()) {
    $_SESSION['success'] = "Add Account Successfully";
    echo '<script>window.location.href = "RegisteredUserAdmin.php?success=Add Account Successfully";</script>';
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}








