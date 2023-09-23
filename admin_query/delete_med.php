<?php
	require_once '../connection/connect.php';
	$conn->query("DELETE FROM `medicines` WHERE `productId` = '$_REQUEST[productId]'") or die(mysql_error());
	header("location:../bhw/medicinee.php");
?>