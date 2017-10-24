<!-- Peserta -->
<div class="content nilai">
<?php 
	require_once '../../php/mysql.php';
	$sql = "SELECT * FROM lomba WHERE lomba_id='".$_SESSION['lomba_id']."' ";
	$query = $mysql->query($sql) or die("SQL Error : ".$mysql->error);
	$row = $query->fetch_assoc()
?>
<h2>Penilaian - <?php if (isset($_SESSION['lomba_id'])) { echo $row['lomba_nama']; } ?></h2>
<div class="kotak">
	<form class="form searchform">
		<input type="search" name="search" class="form-control" placeholder="Cari Data">
	</form>
	<a modal-toggle="mo-cnilai" href="#" class="btn btnp fleft">Tambah</a>
	<div class="tabel"></div>
</div>
</div>
<script src="../assets/js/search.js"></script>