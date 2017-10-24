<?php
	require_once '../../php/mysql.php';
	$id = $mysql->real_escape_string($_POST['id']);
	$nama = $mysql->real_escape_string($_POST['juri_nama']);
	$username = $mysql->real_escape_string($_POST['juri_username']);
	$lomba = $mysql->real_escape_string($_POST['lomba']);

	$sql = "UPDATE juri SET juri_nama='$nama',juri_username='$username',juri_id_lomba='$lomba' WHERE juri_id='$id'";
	$query = $mysql->query($sql) or die("SQL Error : ".$mysql->error);
	if ($query) {
		$output['success'] = true;
	} else {
		$output['success'] = false;
		$output['messages'] = 'Ubah Data Gagal';
	}
	$mysql->close();
	echo json_encode($output);
?>