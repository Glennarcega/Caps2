<?php
	require_once '../connection/connect.php';
	if(ISSET($_POST['edit_account'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$address = $_POST['address'];
		$mobile_number = $_POST['mobile_number'];
		$username = $_POST['username'];
		$usertype = $_POST['usertype'];
		$password = md5($_POST['password']);
		$query = $conn->query("UPDATE `users` SET `fname` = '$fname', `lname` = '$lname', `address` = '$address', `mobile_number` = '$mobile_number', `username` = '$username', `usertype` = '$usertype', `password` = '$password' WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
	
		header("location:../admin/account.php?success=Edit Account Succesfully!");

	}	