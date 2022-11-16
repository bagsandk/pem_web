<?php
ob_start();
session_start();
unset($_SESSION['iduser']);
unset($_SESSION['role']);
if (session_destroy()) {
	header('Location: ./');
}
?>