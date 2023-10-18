<?php

if (isset($_POST['add_rec'])) {
    $productId = $_POST['productId'];
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $dateBirth = $_POST['dateBirth'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $address = $_POST['address'];
    $contactNumber = $_POST['contactNumber'];
    $productName = $_POST['productName'];
    $unit = $_POST['unit'];
    $quantity_req = $_POST['quantity_req'];
    $givenDate = $_POST['givenDate'];
    $clientType = $_POST['clientType'];
    $changingMethod = $_POST['changingMethod'];
    $reason = $_POST['reason'];

 

    
    // Check if quantity_req is greater than zero
    if ($quantity_req <= 0) {
        echo '<script>alert("Quantity requested must be greater than zero.");</script>';
    } else {
    // Fetch the data from the 'medicines' table
    $fetchQuery = $mysqli->query("SELECT total FROM medicines WHERE productId = '$productId'");
    $fetch = $fetchQuery->fetch_assoc();

    if ($fetchQuery && $fetch) {
        $availableQuantity = $fetch['total'];

        if ($availableQuantity >= $quantity_req) {
            // Sufficient quantity available, update and insert
            $quantity = $availableQuantity - $quantity_req;
            $mysqli->query("UPDATE medicines SET total = '$quantity' WHERE productId = '$productId'");
            $query = $mysqli->query("INSERT INTO residentrecords (productId, lastName, firstName,middleName, dateBirth, age, sex, address, contactNumber) VALUES ('$productId', '$lastName','$firstName','$middleName', '$dateBirth', '$age', '$sex', '$address', '$contactNumber')");

            if ($query) {
                $familyplanningId = mysqli_insert_id($mysqli);
                $query = $mysqli->query("INSERT INTO contraceptivemethod_request (familyplanningId, lastName, firstName, middleName, productId, productName, unit, quantity_req, givenDate,clientType,changingMethod,reason) VALUES ('$familyplanningId','$lastName','$firstName','$middleName','$productId','$productName','$unit', '$quantity_req', '$givenDate', '$clientType','$changingMethod','$reason')");

                echo '<script>window.location.href = "./userRecMed.php?success=Add Request Successfully";</script>';
                exit(); // Add this line to stop further script execution
            } else {
                echo "Error: " . mysqli_error($mysqli);
            }
        } else {
            // Insufficient quantity, show an error message
            echo '<script>alert("Insufficient quantity available.");</script>';
        }
    } else {
        echo "Error: Failed to fetch medicine data.";
    }
}
}
?>
