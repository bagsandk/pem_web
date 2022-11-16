<?php
ob_start();
session_start();
if (isset($_POST['username']) and isset($_POST['password'])) {
	include '../../../config/db.php';
	$username = input($_POST['username']);
	$password = input($_POST['password']);
	$query = mysqli_query($con, "select * from users where username = '$username'");
	if (mysqli_num_rows($query) <> 0) {
		$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
		$hash = $data['password'];
		if (password_verify($password, $hash)) {
			$_SESSION['iduser'] = $data['iduser'];
			$_SESSION['role'] = $data['role'];
			echo 'ok';
		}
	}
	mysqli_close($con);
}
