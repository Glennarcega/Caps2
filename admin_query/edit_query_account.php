<?php
	require_once '../connection/connect.php';
	if(ISSET($_POST['edit_account'])){
		$name = $_POST['name'];
		$username = $_POST['username'];
		$role = $_POST['role'];
		$password = md5($_POST['password']);
		$query = $conn->query("UPDATE `users` SET `name` = '$name', `username` = '$username', `role` = '$role', `password` = '$password' WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
	
		header("location:../admin/account.php?success=Edit Account Succesfully!");

	}	