<?php
if (isset($_POST['add_rec'])) {
    @include "../connection/connect.php";
    // Include your database connection code here (e.g., $conn = new mysqli(...);)

    $residentId = isset($_GET['residentId']) ? $_GET['residentId'] : '';
    $residentName = $_POST['residentName'];
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $unit = $_POST['unit'];
    $quantity_req = $_POST['quantity_req'];
    $givenDate = $_POST['givenDate'];

    // Fetch the data from the 'medicines' table
    $fetchQuery = $conn->query("SELECT total FROM medicines WHERE productId = '$productId'");

    if ($fetchQuery) {
        $fetch = $fetchQuery->fetch_assoc();

        if ($fetch) {
            $availableQuantity = $fetch['total'];

            if ($availableQuantity >= $quantity_req) {
                // Sufficient quantity available, update and insert
                $quantity = $availableQuantity - $quantity_req;
                $updateQuery = $conn->query("UPDATE medicines SET total = '$quantity' WHERE productId = '$productId'");

                if ($updateQuery) {
                    $insertQuery = $conn->query("INSERT INTO request_medicine (residentId,residentName, productId, productName, unit, quantity_req, givenDate) VALUES ('$residentId','$residentName', '$productId', '$productName', '$unit', '$quantity_req', '$givenDate')");

                    if ($insertQuery) {
                        echo '<script>window.location.href = "resident_med.php?residentId=' . $residentId . '";</script>';
                        exit();
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                } else {
                    echo "Error: Failed to update medicine quantity.";
                }
            } else {
                // Insufficient quantity, show an error message
                echo '<script>alert("Insufficient quantity available.");</script>';
            }
        } else {
            echo "Error: Medicine with productId $productId not found.";
        }
    } else {
        echo "Error: Failed to fetch medicine data.";
    }
}
?>
