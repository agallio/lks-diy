<?php
require_once '../php/mysql.php';
if (!isset($_SESSION['peserta'])) {
	header("Location: ../");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>LKS DIY - 2017</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/grid.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>
	
	<!-- Navbar -->
	<nav class="nav">
		<ul>
			<li><img src="../assets/img/logo.png" alt="logo"></li>
			<li><a href="beranda">LKS DIY - 2017</a></li>
		</ul>
		<ul class="nav-right">
			<li><a href="logout">Keluar</a></li>
			<?php
				$sql = "SELECT *,lomba.lomba_id,lomba.lomba_nama FROM peserta LEFT JOIN lomba ON peserta.peserta_id_lomba=lomba.lomba_id WHERE peserta_id='".$_SESSION['peserta_id']."' ";
				$query = $mysql->query($sql);
				$row = $query->fetch_assoc();
			?>
			<li><a href="profil" modal-toggle="mo-dpeserta" data-id="<?php echo $row['peserta_id'] ?>" data-nama="<?php echo $row['peserta_nama']; ?>" data-no="<?php echo $row['peserta_no']; ?>" data-tgl="<?php echo date('d-m-Y',$row['peserta_tgl']) ?>" data-kls="<?php echo $row['peserta_kls']; ?>" data-sekolah="<?php echo $row['peserta_sekolah']; ?>" data-username="<?php echo $row['peserta_username']; ?>" data-lomba="<?php echo $row['lomba_id']; ?>">Profil</a></li>
			<li><a href="nilai">Nilai</a></li>
		</ul>
	</nav>

	<!-- Hero -->
	<div class="hero">
		<div class="hero-inner">
			<div class="hero-header">
				Laman Peserta<br> LKS DIY - 2017
			</div>
		</div>
	</div>

	<div class="page"></div>
	
	<!-- Footer -->
	<div class="footer">
		<div class="container">
			<p class="left">Copyright &copy; LKS DIY - 2017</p>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal mo-dpeserta">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-h2">Detail Data Peserta</h2>
			</div>
			<div class="modal-body">
				<div class="messages"></div>
				<form action="php/epeserta.php" method="POST" class="form" id="fdpeserta">
					<input type="hidden" name="id">
					<input type="text" class="form-control" name="nama" placeholder="Nama Peserta" required>
					<input type="number" class="form-control" name="no" placeholder="Nomor Peserta (max = 999)" max="999" required>
					<input type="text" class="form-control" name="tgl" placeholder="Tanggal Lahir (DD-MM-YYYY)" required>
					<input type="text" class="form-control" name="sekolah" placeholder="Asal Sekolah" required>
					<input type="text" class="form-control" name="username" placeholder="Nama Pengguna" disabled>
					<select name="kelas" class="form-control" required>
						<option disabled selected>Pilih Kelas</option>
						<option value="10">X</option>
						<option value="11">XI</option>
						<option value="12">XII</option>
					</select>
					<select name="lomba" class="form-control" required>
						<option disabled selected>Pilih Bidang Lomba</option>
						<?php
							$sql = "SELECT * FROM lomba";
							$query = $mysql->query($sql);
							while ($row = $query->fetch_assoc()) {
						?>
						<option value="<?php echo $row['lomba_id']; ?>"><?php echo $row['lomba_nama']; ?></option>
						<?php } ?>
					</select>
					<button type="submit" class="btn btnp btn-block">Ubah</button>
				</form>
				<button modal-toggle="mo-eppeserta" type="submit" class="btn btne btn-block">Ubah Kata Sandi</button>
				<!-- Edit Password -->
				<div class="modal mo-eppeserta">
					<div class="modal-content">
						<div class="modal-header">
							<h2 class="modal-h2">Ubah Kata Sandi</h2>
						</div>
						<div class="modal-body">
							<div class="messages messagesdel"></div>
							<form action="php/eppeserta.php" method="POST" class="form" id="feppeserta">
								<input type="hidden" name="id">
								<input type="password" class="form-control" name="oldpassword" placeholder="Kata Sandi Lama" pattern=".{8,}" title="Min 8 Huruf" required>
								<input type="password" class="form-control" name="password" placeholder="Kata Sandi Baru" pattern=".{8,}" title="Min 8 Huruf" required>
								<input type="password" class="form-control" name="cpassword" placeholder="Ulangi Kata Sandi Baru" pattern=".{8,}" title="Min 8 Huruf" required>
								<button type="submit" class="btn btnp">Ubah</button>
								<a href="profil" class="btn btne">Kembali</a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/modal.js"></script>
<script src="../assets/js/peserta.js"></script>
<script src="../assets/js/page-peserta.js"></script>
</html>