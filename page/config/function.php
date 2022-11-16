<?php
define('header', 'page/template/header.php');
define('footer', 'page/template/footer.php');

define('header_admin', 'page/template/admin/header.php');
define('sidebar_admin', 'page/template/admin/sidebar.php');
define('footer_admin', 'page/template/admin/footer.php');

function bcrypt($password = '')
{
	$hash = password_hash($password, PASSWORD_BCRYPT);
	return $hash;
}

function input($input)
{
	$input = trim($input);
	$input = addslashes($input);
	$input = htmlspecialchars($input);
	global $con;
	$input = mysqli_real_escape_string($con, $input);
	return $input;
}

function tanggal($date)
{
	$tanggal = date('d-m-Y', strtotime($date));
	return $tanggal;
}
