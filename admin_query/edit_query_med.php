<?php
	require_once '../connection/connect.php';
	if(ISSET($_POST['edit_med'])){
		$productName = $_POST['productName'];
		$quantity1 = $_POST['quantity1'];
		$total = $_POST['quantity1'] + $_POST['total'];
		$expDate = $_POST['expDate'];
		$status = $_POST['status'];
		$conn->query("UPDATE `medicines` SET `productName` = '$productName',`quantity1` = '$quantity1',`total` = '$total',`expDate` = '$expDate',`status` = '$status' WHERE `productId` = '$_REQUEST[productId]'") or die(mysqli_error());
		header("Location: ../bhw/medicinee.php?success=Update Succesfully");
	}
?>