<?php
	require_once '../php/mysql.php';
	if (!isset($_SESSION['admin'])) {
		header("Location: ../");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ruang Kendali - LKS DIY - 2017</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/grid.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/admin.css">
</head>
<body>
	
	<!-- Navbar -->
	<nav class="nav">
		<ul>
			<li><img src="../assets/img/logo.png" alt="logo"></li>
			<li><a href="index.php">LKS DIY - 2017</a></li>
		</ul>
		<ul class="nav-right">
			<li><a href="logout">Keluar</a></li>
		</ul>
	</nav>

	<!-- Sidenav -->
	<div class="left">
		<nav class="sidenav">
			<ul>
				<li><a href="beranda"><i class="fa fa-home"></i>Beranda</a></li>
				<li><a href="peserta"><i class="fa fa-user-circle"></i>Peserta</a></li>
				<li><a href="lomba"><i class="fa fa-server"></i>Lomba</a></li>
				<li><a href="juri"><i class="fa fa-user-circle-o"></i>Juri</a></li>
				<li><a href="nilai"><i class="fa fa-wpforms"></i>Nilai</a></li>
			</ul>
		</nav>
	</div>

	<div class="right"></div>

</body>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/page-admin.js"></script>
<script src="../assets/js/modal.js"></script>
<script src="../assets/js/admin.js"></script>
</html>