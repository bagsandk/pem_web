<?php
ob_start();
session_start();
if (isset($_SESSION['iduser'])) {
	if (isset($_POST['action'])) {
		include '../../../config/db.php';
		$action = input($_POST['action']);
		if ($action == 'create') {
			$nmpasien = input($_POST['nmpasien']);
			$nik = input($_POST['nik']);
			$jk = input($_POST['jk']);
			$agama = input($_POST['agama']);
			$pekerjaan = input($_POST['pekerjaan']);
			$alamat = input($_POST['alamat']);
			$tanggal_lahir = input($_POST['tanggal_lahir']);
			$tempat_lahir = input($_POST['tempat_lahir']);
			mysqli_query($con, "insert ignore into pasien (nmpasien, nik, jk, agama, pekerjaan, alamat,tanggal_lahir, tempat_lahir) values ('$nmpasien', '$nik', '$jk', '$agama', '$pekerjaan', '$alamat','$tanggal_lahir', '$tempat_lahir' )");
			echo 'Data has been added.';
		}
		if ($action == 'update') {
			$id = input($_POST['id']);
			$nmpasien = input($_POST['nmpasien']);
			$nik = input($_POST['nik']);
			$jk = input($_POST['jk']);
			$agama = input($_POST['agama']);
			$pekerjaan = input($_POST['pekerjaan']);
			$alamat = input($_POST['alamat']);
			$tanggal_lahir = input($_POST['tanggal_lahir']);
			$tempat_lahir = input($_POST['tempat_lahir']);
			mysqli_query($con, "update pasien set nmpasien = '$nmpasien', nik = '$nik', jk = '$jk', agama = '$agama', pekerjaan = '$pekerjaan', alamat = '$alamat', tanggal_lahir = '$tanggal_lahir', tempat_lahir = '$tempat_lahir' where idpasien = '$id'");
			echo 'Data has been edited.';
		}
		if ($action == 'delete') {
			$id = input($_POST['id']);
			mysqli_query($con, "delete from pasien where idpasien = '$id'");
			echo 'Data has been removed.';
		}
	}
}
