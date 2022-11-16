<?php
ob_start();
session_start();
define('FILE_ACCESS', TRUE);
include 'page/config/db.php';

if (!isset($_SESSION['iduser'])) {
	$p = input($_GET['p']);
	include header;
	$p_array = array(
		'404',
		'home',
		'service',
		'contact',
		'about',
	);
	if (!in_array($p, $p_array)) {
		header('Location: home');
	}
	if (in_array($p, $p_array)) {
		include 'page/view/' . $p . '/index.php';
	}
	include footer;
} else {
	if (!isset($_GET['p'])) {
		$p = 'dashboard';
		include header;
		include 'page/view/dashboard/index.php';
		include footer;
	}
	if (isset($_GET['p'])) {
		$p = input($_GET['p']);
		$p_array_home = array(
			'home',
			'service',
			'contact',
			'about',
		);
		$p_array = array(
			'404',
			'dashboard',
			'user',
			'pasien',
		);
		if (!in_array($p, $p_array)) {
			include 'page/view/404/index.php';
		}
		if (in_array($p, $p_array_home)) {
			include header;
			include 'page/view/' . $p . '/index.php';
			include footer;
		}
		if (in_array($p, $p_array)) {
			include header_admin;
			include 'page/view/' . $p . '/index.php';
			include footer_admin;
		}
	}
}
mysqli_close($con);
