<?php
if (isset($_SESSION['iduser'])) {
	$iduser = $_SESSION['iduser'];
	$user_query = mysqli_query($con, "select * from users where iduser = '$iduser'");
	$user_data = mysqli_fetch_array($user_query, MYSQLI_ASSOC);
}
?>
<?php $path_array = explode('/', $_SERVER['REQUEST_URI']);
$path1 = $path_array[2];
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Novena- Health Care &amp; Medical template</title>

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Health Care Medical Html5 Template">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
	<meta name="author" content="Themefisher">
	<meta name="generator" content="Themefisher Novena HTML Template v1.0">

	<!-- theme meta -->
	<meta name="theme-name" content="novena" />

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />

	<!-- 
  Essential stylesheets
  =====================================-->
	<link rel="stylesheet" href="assets/plugins/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugins/icofont/icofont.min.css">
	<link rel="stylesheet" href="assets/plugins/slick-carousel/slick/slick.css">
	<link rel="stylesheet" href="assets/plugins/slick-carousel/slick/slick-theme.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
	<!-- Main Stylesheet -->
	<link rel="stylesheet" href="assets/css/style.css">

</head>

<body iduser="top">
	<header>
		<div class="header-top-bar">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<ul class="top-bar-info list-inline-item pl-0 mb-0">
							<li class="list-inline-item"><a href="mailto:support@gmail.com"><i class="icofont-support-faq mr-2"></i>support@novena.com</a></li>
							<li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>Address Ta-134/A, New York, USA </li>
						</ul>
					</div>
					<div class="col-lg-6">
						<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
							<a href="tel:+23-345-67890">
								<span>Call Now : </span>
								<span class="h4">823-4565-13456</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navigation" iduser="navbar">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="assets/images/logo-dark.png" alt="" class="img-fluid">
				</a>

				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icofont-navigation-menu"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarmain">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item <?= $path1 == 'home' ? 'active' : '' ?>"><a class="nav-link" href="home">Home</a></li>
						<li class="nav-item <?= $path1 == 'about' ? 'active' : '' ?>"><a class="nav-link" href="about">About</a></li>
						<li class="nav-item <?= $path1 == 'service' ? 'active' : '' ?>"><a class="nav-link" href="service">Services</a></li>
						<li class="nav-item <?= $path1 == 'contact' ? 'active' : '' ?>"><a class="nav-link" href="contact">Contact</a></li>
						<?php if (!isset($_SESSION['iduser'])) { ?>
							<li class="nav-item mt-1">
								<button style="font-size:10px; background: #223A66;" type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
									Login
								</button>
							</li>
						<?php } else { ?>
							<li class="nav-item mt-1">
								<a href="dashboard" style="font-size:10px; background: #223A66;" class="btn btn-sm btn-primary">
									Dashboard
								</a>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</nav>
	</header>