<?php
	require_once '../connection/connect.php';
	if(ISSET($_POST['edit_med'])){
		$sponsor = $_POST['sponsor'];
		$productName = $_POST['productName'];
		$batch = $_POST['batch'];
		$quantity1 = $_POST['quantity1'];
		$total = $_POST['quantity1'] + $_POST['total'];
		$expDate = $_POST['expDate'];
		$status = $_POST['status'];
		$conn->query("UPDATE `medicines` SET `sponsor` = '$sponsor',`productName` = '$productName',`batch` = '$batch',`quantity1` = '$quantity1',`total` = '$total',`expDate` = '$expDate',`status` = '$status' WHERE `productId` = '$_REQUEST[productId]'") or die(mysqli_error());
		echo '<script>window.location.href = " ../bhw/medicinee.php?success=Update Succesfully";</script>';

	}
?>