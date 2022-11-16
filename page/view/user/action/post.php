<?php
ob_start();
session_start();
if (isset($_SESSION['iduser'])) {
	if (isset($_POST['action'])) {
		include '../../../config/db.php';
		$action = input($_POST['action']);
		if ($action == 'create') {
			$username = input($_POST['username']);
			$password = input(bcrypt($_POST['password']));
			$name = input($_POST['name']);
			$role = input($_POST['role']);
			mysqli_query($con, "insert ignore into users (username, password, name, role) values ('$username', '$password', '$name', '$role')");
			echo 'Data has been added.';
		}
		if ($action == 'update') {
			$id = input($_POST['id']);
			$username = input($_POST['username']);
			$name = input($_POST['name']);
			$role = input($_POST['role']);
			mysqli_query($con, "update users set username = '$username', name = '$name', role = '$role' where iduser = '$id'");
			echo 'Data has been edited.';
		}
		if ($action == 'delete') {
			$id = input($_POST['id']);
			mysqli_query($con, "delete from users where iduser = '$id'");
			echo 'Data has been removed.';
		}
		if ($action == 'password') {
			$id = input($_POST['id']);
			$password = input(bcrypt($_POST['password']));
			mysqli_query($con, "update users set password = '$password' where iduser = '$id'");
			echo 'Password has been changed.';
		}
	}
}
?>