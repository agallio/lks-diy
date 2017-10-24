<?php
	require_once '../../php/mysql.php';
	$id = $mysql->real_escape_string($_POST['id']);
	$nilai = $mysql->real_escape_string($_POST['nilai']);

	$sql = "UPDATE nilai SET nilai_jml='$nilai' WHERE nilai_id='$id'";
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