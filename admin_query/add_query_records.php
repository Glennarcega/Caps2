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
    $quantity_req = $_POST['quantity_req'];
    $givenDate = $_POST['givenDate'];

    // Fetch the data from the 'medicines' table
    $fetchQuery = $conn->query("SELECT `total` FROM `medicines` WHERE `productId` = '$productId'");
    $fetch = $fetchQuery->fetch_assoc();

    if ($fetchQuery && $fetch) {
        $quantity = $fetch['total'] - $quantity_req;
        $conn->query("UPDATE `medicines` SET `total` = '$quantity' WHERE `productId` = '$productId'");
        $query = $conn->query("INSERT INTO `residentrecords` (productId, residentName, dateBirth, age, sex, address, contactNumber, productName, quantity_req, givenDate) VALUES ('$productId', '$residentName', '$dateBirth', '$age', '$sex', '$address', '$contactNumber', '$productName', '$quantity_req', '$givenDate')");

        if ($query) {
            echo '<script>window.location.href = "./userRecMed.php?success=Add Request Successfully";</script>';
            exit(); // Add this line to stop further script execution
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: Failed to fetch medicine data.";
    }
}
?>
