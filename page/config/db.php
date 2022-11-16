<?php
date_default_timezone_set("Asia/Jakarta");

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'rekam_medis';

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

include 'function.php';
?>