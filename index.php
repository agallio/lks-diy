<?php
require_once 'php/mysql.php';
if (isset($_SESSION['peserta'])) {
	header("Location: ./peserta");
} elseif (isset($_SESSION['juri'])) {
	header("Location: ./juri");
} elseif (isset($_SESSION['admin'])) {
	header("Location: ./admin");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>LKS DIY - 2017</title>
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/grid.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	
	<!-- Navbar -->
	<nav class="nav">
		<ul>
			<li><img src="assets/img/logo.png" alt="logo"></li>
			<li><a href="beranda">LKS DIY - 2017</a></li>
		</ul>
		<ul class="nav-right">
			<li><a modal-toggle="mo-register" href="#">Daftar</a></li>
			<li><a modal-toggle="mo-login" href="#">Masuk</a></li>
		</ul>
	</nav>

	<!-- Hero -->
	<div class="hero">
		<div class="hero-inner">
			<div class="hero-header">
				Selamat Datang<br> LKS DIY - 2017
			</div>
		</div>
	</div>

	<div class="container">
		<!-- Konten -->
		<div class="konten">
			<div class="kotak">
				<div class="section group">
					<div class="col g2">
						<img src="assets/img/logo.png" alt="logo">
					</div>
					<div class="col g10">
						<h2>Selamat Datang</h2>
						<div class="separator"></div>
						<p>Lomba Kompetensi Siswa adalah kompetisi tahunan antar siswa pada jenjang SMK sesuai bidang keahlian yang diajarkan pada SMK peserta. LKS ini setara dengan OSN (Olimpiade Sains Nasional) yang diadakan di SMP/SMA. Pemenang LKS tingkat Nasional akan mewakili Indonesia ke ASEAN Skills (Kompetisi Keahlian tingkat ASEAN) dan World Skills International Competition (Kompetisi Keahlian tingkat Dunia). Siswa yang mengikuti LKS adalah siswa yang telah lolos seleksi tingkat kabupaten dan provinsi dan karenanya adalah siswa-siswa terbaik dari provinsinya masing-masing.
						<br><br>
						Lomba Kompetensi Siswa diadakan setiap tahunnya. Kegiatan ini merupakan salah satu bagian dari rangkaian seleksi untuk mendapatkan siswa-siswi terbaik dari seluruh Indonesia yang akan dibimbing lebih lanjut oleh tim bidang kompetisi masing-masing dan akan diikutsertakan pada kompetisi keahlian tingkat internasional.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<!-- Footer -->
	<div class="footer">
		<div class="container">
			<p class="left">Copyright &copy; LKS DIY - 2017</p>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal mo-login">
		<div class="modal-content">
			<div class="modal-header">
				<h2>Masuk</h2>
			</div>
			<div class="modal-body">
				<img src="assets/img/logo.png" alt="logo">
				<div class="messages"></div>
				<form action="php/login-valid.php" method="POST" class="form" id="flogin">
					<input type="text" class="form-control" name="username" placeholder="Nama Pengguna">
					<input type="password" class="form-control" name="password" placeholder="Kata Sandi">
					<button type="submit" class="btn btnp">Masuk</button>
				</form>
			</div>
		</div>
	</div>

	<div class="modal mo-register">
		<div class="modal-content">
			<div class="modal-header">
				<h2>Daftar</h2>
			</div>
			<div class="modal-body">
				<img src="assets/img/logo.png" alt="logo">
				<div class="messages"></div>
				<form action="php/register.php" method="POST" class="form" id="fregister">
					<div class="section group">
						<div class="col g6">
							<input type="text" name="nama" class="form-control" placeholder="Nama Peserta" required>
							<input type="number" name="no" class="form-control" placeholder="Nomor Peserta (max = 999)" max="999" required>
							<input type="text" name="tgl" class="form-control" placeholder="Tanggal Lahir (DD-MM-YYYY)" required>
							<input type="text" name="sekolah" class="form-control" placeholder="Asal Sekolah" required>
						</div>
						<div class="col g6">
							<select name="kelas" class="form-control" required>
								<option disabled selected>Pilih Kelas</option>
								<option value="10">X</option>
								<option value="11">XI</option>
								<option value="12">XII</option>
							</select>
							<input type="text" class="form-control" name="username" placeholder="Nama Pengguna" required>
							<input type="password" class="form-control" name="password" placeholder="Kata Sandi" pattern=".{8,}" title="Min. 8 Huruf" required>
							<input type="password" class="form-control" name="cpassword" placeholder="Ulangi Kata Sandi" pattern=".{8,}" title="Min. 8 Huruf" required>
						</div>
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
						<button type="submit" class="btn btnp">Daftar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/modal.js"></script>
<script src="assets/js/home.js"></script>
</html>