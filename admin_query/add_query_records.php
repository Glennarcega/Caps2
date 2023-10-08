<?php
if (isset($_POST['add_rec'])) {
    $productId = $_POST['productId'];
    $residentName = $_POST['residentName'];
    $dateBirth = $_POST['dateBirth'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $address = $_POST['address'];
    $contactNumber = $_POST['contactNumber'];
    $productName = $_POST['productName'];
    $unit = $_POST['unit'];
    $quantity_req = $_POST['quantity_req'];
    $givenDate = $_POST['givenDate'];

    // Fetch the data from the 'medicines' table
    $fetchQuery = $mysqli->query("SELECT total FROM medicines WHERE productId = '$productId'");
    $fetch = $fetchQuery->fetch_assoc();

    if ($fetchQuery && $fetch) {
        $availableQuantity = $fetch['total'];

        if ($availableQuantity >= $quantity_req) {
            // Sufficient quantity available, update and insert
            $quantity = $availableQuantity - $quantity_req;
            $mysqli->query("UPDATE medicines SET total = '$quantity' WHERE productId = '$productId'");
            $query = $mysqli->query("INSERT INTO residentrecords (productId, residentName, dateBirth, age, sex, address, contactNumber) VALUES ('$productId', '$residentName', '$dateBirth', '$age', '$sex', '$address', '$contactNumber')");

            if ($query) {
                $residentId = mysqli_insert_id($mysqli);
                $query = $mysqli->query("INSERT INTO request_medicine (residentId, residentName, productId, productName, unit, quantity_req, givenDate) VALUES ('$residentId','$residentName','$productId','$productName','$unit', '$quantity_req', '$givenDate')");

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
?>
