<?php

	if(ISSET($_POST['add_med'])){
		$productName = $_POST['productName'];
		$total = $_POST['total'];
		$expDate = $_POST['expDate'];
		$status = $_POST['status'];
		$conn->query("INSERT INTO `medicines` (productName,total,expDate,status) VALUES('$productName', '$total','$expDate','$status')") or die(mysqli_error());
		header("Location: ../bhw/medicinee.php?success=Add Medicine Succesfully");
		if ($quantity_req > 0) {
		} else {
			// Quantity is 0 or less, display an error message
			echo "<div class='alert alert-danger'>Quantity must be greater than 0.</div>";
		}
	}
?>