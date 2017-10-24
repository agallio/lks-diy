<?php
	require_once '../../php/mysql.php';
	$id = $mysql->real_escape_string($_POST['id']);
	$nama = $mysql->real_escape_string($_POST['lomba_nama']);

	$sql = "SELECT * FROM lomba WHERE lomba_nama='$nama' ";
	$query = $mysql->query($sql) or die("SQL Error : ".$mysql->error);

	if ($query->num_rows < 1) {
		$sql = "UPDATE lomba SET lomba_nama='$nama' WHERE lomba_id='$id'";
		$query = $mysql->query($sql) or die("SQL Error : ".$mysql->error);
		$output['success'] = true;
	} else {
		$output['success'] = false;
		$output['messages'] = 'Bidang lomba sudah ada';
	}
	
	$mysql->close();
	echo json_encode($output);
?>