<!DOCTYPE html>
<?php 
	$userid = 0;
	if(isset($_SESSION['userdata']->id))
		$userid = $_SESSION['userdata']->id;

	$jsondata = new Block_chain;
	$userdata = $jsondata->read_row_data('json/user.json',$userid);
?>
<html lang="en">
	<head>
		<meta name="description" content="">
		<meta property="twitter:card" content="summary_large_image">
		<meta property="twitter:site" content="">
		<meta property="twitter:creator" content="">
		<meta property="og:type" content="website">
		<meta property="og:site_name" content="">
		<meta property="og:title" content="">
		<meta property="og:url" content="">
		<meta property="og:image" content="">
		<meta property="og:description" content="">
		<title><?php echo APP_NAME; ?></title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="assets/admin/css/main.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
			.app-header, .app-header__logo {
				background-color: #6d4e8a !important;
			}
			.error {
				color: #FF0000;
			}
		</style>
	</head>
	<body class="app sidebar-mini">
		<header class="app-header">
			<a class="app-header__logo" href="dashboard.php"><?php echo APP_NAME; ?></a>
		</header>
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar">
			<div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="" alt="">
				<div>
					<p class="app-sidebar__user-name"><?php echo $userdata->name; ?></p>
					<p class="app-sidebar__user-designation"><?php echo $userdata->email; ?></p>
				</div>
			</div>
			<ul class="app-menu">
				<?php 
					if($userdata->role == 'admin')
					{
				?>
						<li>
							<a class="app-menu__item" href="tenders.php">
								<i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Tenders</span>
							</a>
						</li>
						<li>
							<a class="app-menu__item" href="companies.php">
								<i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Company List</span>
							</a>
						</li>

				<?php
					} else {
				?>
						<li>
							<a class="app-menu__item" href="profile.php">
								<i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Profile</span>
							</a>
						</li>
						<li>
							<a class="app-menu__item" href="works.php">
								<i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">My Works</span>
							</a>
						</li>
						<li>
							<a class="app-menu__item" href="all_tenders.php">
								<i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Tenders</span>
							</a>
						</li>
				<?php
					}
				?>
				<li>
					<a class="app-menu__item" href="logout.php">
						<i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">Logout</span>
					</a>
				</li>
			</ul>
		</aside>