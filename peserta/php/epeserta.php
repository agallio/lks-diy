<?php
	require_once '../../php/mysql.php';
	$id = $mysql->real_escape_string($_POST['id']);
	$nama = $mysql->real_escape_string($_POST['nama']);
	$no = $mysql->real_escape_string($_POST['no']);
	$tgl = strtotime($mysql->real_escape_string($_POST['tgl']));
	$sekolah = $mysql->real_escape_string($_POST['sekolah']);
	$username = $mysql->real_escape_string($_POST['username']);
	$kelas = $mysql->real_escape_string($_POST['kelas']);
	$lomba = $mysql->real_escape_string($_POST['lomba']);

	$sql = "UPDATE peserta SET peserta_nama='$nama',peserta_no='$no',peserta_tgl='$tgl',peserta_sekolah='$sekolah',peserta_username='$username',peserta_kls='$kelas',peserta_id_lomba='$lomba' WHERE peserta_id='$id' ";
	$query = $mysql->query($sql) or die("SQL Error : ".$mysql->error);

	if ($query) {
		$output['success'] = true;
		unset($_SESSION['peserta']);
	} else {
		$output['success'] = false;
		$output['messages'] = 'Ubah Data Gagal';
	}
	$mysql->close();
	echo json_encode($output);
?>