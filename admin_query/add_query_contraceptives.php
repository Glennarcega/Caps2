<?php
if (isset($_POST['add_rec'])) {
    // product information
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $unit = $_POST['unit'];
    $quantity_req = $_POST['quantity_req'];
    $givenDate = $_POST['givenDate'];
    $clientType = $_POST['clientType'];
    $changingMethod = $_POST['changingMethod'];
    $reason = $_POST['reason'];
    $others = $_POST['others'];
    // personal information
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $dateBirth = $_POST['dateBirth'];//
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $address = $_POST['address'];
    $contactNumber = $_POST['contactNumber'];
    $educationaAttainement = $_POST['educationaAttainment'];
    $occupation = $_POST['occupation'];
    $houseNumber = $_POST['houseNumber'];
    $street = $_POST['street'];
    $civilStatus = $_POST['civilStatus'];
    $religion = $_POST['religion'];

    //spouse information
    $lastNamespouse = $_POST['lastNamespouse'];
    $firstNamespouse = $_POST['firstNamespouse'];
    $middleNamespouse = $_POST['middleNamespouse'];
    $dateBirthspouse = $_POST['dateBirthspouse'];
    $ageSpouse = $_POST['ageSpouse'];
 
    // Fetch the data from the 'medicines' table
    $fetchQuery = $mysqli->query("SELECT total FROM medicines WHERE productId = '$productId'");
    $fetch = $fetchQuery->fetch_assoc();

    if ($fetchQuery && $fetch) {
        $availableQuantity = $fetch['total'];

        if ($availableQuantity >= $quantity_req) {
            // Sufficient quantity available, update and insert
            $quantity = $availableQuantity - $quantity_req;
            $mysqli->query("UPDATE medicines SET total = '$quantity' WHERE productId = '$productId'");
            $query = $mysqli->query("INSERT INTO residentrecords (productId, lastName, firstName,middleName, dateBirth, age, sex, address, contactNumber) 
            VALUES ('$productId', '$lastName','$firstName','$middleName', '$dateBirth', '$age', '$sex', '$address', '$contactNumber')");

            if ($query) {
                $residentId = mysqli_insert_id($mysqli);
                $query = $mysqli->query("INSERT INTO contraceptives (residentId, lastName, firstName, middleName,dateBirth, age, sex,houseNumber, address, contactNumber, productId, productName,changingMethod,reason,others, unit, quantity_req, givenDate,civilStatus,occupation,educationalAttainment,religion,lastNamespouse,firstNamespouse,middleNamespouse,dateBirthspouse,ageSpouse)
              VALUES('$residentId','$lastName','$firstName','$middleName','$dateBirth','$age','$sex','$houseNumber','$address','$contactNumber','$productId','$productName','$changingMethod','$reason','$others','$unit', '$quantity_req','$givenDate','$civilStatus,'$occupation','$educationalAttainment','$religion','$lastNamespouse','$firstNamespouse','$middleNamespouse','$dateBirthspouse','$ageSpouse'')");
              
              echo '<script>window.location.href = "./contraceptives.php?success=Add Request Successfully";</script>';
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
