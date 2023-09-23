<?php
	 require_once '../connection/connect.php';
	 $conn->query("DELETE FROM `users` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
	 header("location: ../admin/account.php");