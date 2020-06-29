<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?> | PT. DIMAS REIZA PERWIRA - Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?php echo base_url('assets/img/drp_icon.png'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-4.0.0/css/bootstrap.min.css'); ?>" >
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css'); ?>">
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
</head>
<body>
	<div>
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-blue static-top">
			<div class="container">
				<a class="navbar-brand" href="<?php echo base_url('notloggedin');?>">
					<img src="<?php echo base_url('assets/img/drp_icon_white.png');?>" alt="">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="<?php echo base_url('notloggedin');?>">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Data
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="<?php echo base_url('notloggedin/terima'); ?>">Penerimaan</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?php echo base_url('notloggedin/proses'); ?>">Proses</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?php echo base_url('notloggedin/packing'); ?>">Packing</a>
							</div>
						</li>
						<!-- <li class="nav-item">
							<a class="nav-link" href="#">Services</a>
						</li> -->
					</ul>
					<ul class="navbar-nav ml-auto">
						<div class="nav-item ">
							<a class="nav-link active" href="<?php echo base_url('login');?>" >
								Login
							</a>
						</div>
					</ul>
				</div>
			</div>
		</nav>