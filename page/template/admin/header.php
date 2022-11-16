<?php
if (!DEFINED('FILE_ACCESS') or FILE_ACCESS !== TRUE) {
	exit("Sorry, you're doing something that is not normal! \r\n Please do normally.");
}
if (isset($_SESSION['iduser'])) {
	$iduser = $_SESSION['iduser'];
	$user_query = mysqli_query($con, "select * from users where iduser = '$iduser'");
	$user_data = mysqli_fetch_array($user_query, MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="zxx" class="js">
	<head>
		<base href="./">
		<meta charset="utf-8">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<title>Rekam Medis</title>
		<link rel="stylesheet" href="assets/admin/css/dashlite.css?ver=2.9.1">
		<link id="skin-default" rel="stylesheet" href="assets/admin/css/theme.css?ver=2.9.1">
	</head>
	<body class="nk-body bg-lighter npc-general has-sidebar ">
		<div class="nk-app-root">
			<div class="nk-main ">
				<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
					<div class="nk-sidebar-element nk-sidebar-head">
						<div class="nk-menu-trigger">
							<a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
							<a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
						</div>
						<div class="nk-sidebar-brand">
							<a href="dashboard" class="logo-link nk-sidebar-logo">
								<img class="logo-light logo-img" src="assets/images/logo.png" srcset="assets/images/logo2x.png 2x" alt="logo">
								<img class="logo-dark logo-img" src="assets/images/logo-dark.png" srcset="assets/images/logo-dark2x.png 2x" alt="logo-dark">
							</a>
						</div>
					</div>
					<?php include sidebar_admin; ?>
				</div>
				<div class="nk-wrap ">
					<div class="nk-header nk-header-fixed is-light">
						<div class="container-fluid">
							<div class="nk-header-wrap">
								<div class="nk-menu-trigger d-xl-none ml-n1">
									<a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
								</div>
								<div class="nk-header-brand d-xl-none">
									<a href="dashboard" class="logo-link">
										<img class="logo-light logo-img" src="assets/images/logo.png" srcset="assets/images/logo2x.png 2x" alt="logo">
										<img class="logo-dark logo-img" src="assets/images/logo-dark.png" srcset="assets/images/logo-dark2x.png 2x" alt="logo-dark">
									</a>
								</div>
								<div class="nk-header-tools">
									<ul class="nk-quick-nav">
										<li class="dropdown user-dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<div class="user-toggle">
													<div class="user-avatar sm">
														<em class="icon ni ni-user-alt"></em>
													</div>
													<div class="user-info d-none d-md-block">
														<div class="user-status"><?php echo $user_data['role']; ?></div>
														<div class="user-name dropdown-indicator"><?php echo $user_data['name']; ?></div>
													</div>
												</div>
											</a>
											<div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
												<div class="dropdown-inner">
													<ul class="link-list">
														<li><a href="#"><em class="icon ni ni-user-alt"></em><span>My Profile</span></a></li>
													</ul>
												</div>
												<div class="dropdown-inner">
													<ul class="link-list">
														<li><a href="logout"><em class="icon ni ni-signout"></em><span>Logout</span></a></li>
													</ul>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="nk-content ">
						<div class="container-fluid">
							<div class="nk-content-inner">
								<div class="nk-content-body">