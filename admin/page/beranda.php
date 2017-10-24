<?php
require_once '../../php/mysql.php';
$sql = "SELECT * FROM peserta";
$query = $mysql->query($sql);
$peserta_count = $query->num_rows;

$sql = "SELECT * FROM lomba";
$query = $mysql->query($sql);
$lomba_count = $query->num_rows;

$sql = "SELECT * FROM juri";
$query = $mysql->query($sql);
$juri_count = $query->num_rows;

$sql = "SELECT * FROM nilai";
$query = $mysql->query($sql);
$nilai_count = $query->num_rows;
?>
<!-- Dashboard -->
<div class="content beranda">
	<h2>Beranda</h2>
	<div class="section group">
		<div class="col g3 kotak-dash red">
			<p><?php echo $peserta_count; ?></p>
			<div class="btm"><p>Jumlah Peserta</p></div>
		</div>
		<div class="col g3 kotak-dash green">
			<p><?php echo $lomba_count; ?></p>
			<div class="btm"><p>Jumlah Lomba</p></div>
		</div>
		<div class="col g3 kotak-dash indigo">
			<p><?php echo $juri_count; ?></p>
			<div class="btm"><p>Jumlah Juri</p></div>
		</div>
		<div class="col g3 kotak-dash teal">
			<p><?php echo $nilai_count; ?></p>
			<div class="btm"><p>Jumlah Nilai Peserta</p></div>
		</div>
	</div>
</div>