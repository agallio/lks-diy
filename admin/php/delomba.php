<?php
	require_once '../../php/mysql.php';
	$id = $mysql->real_escape_string($_POST['id']);
	$output = array();
	$sql = "DELETE FROM lomba WHERE lomba_id='$id'";
	$query = $mysql->query($sql) or die("SQL Error : ".$mysql->error);
	if ($query) {
		$output['success'] = true;
	} else {
		$output['success'] = false;
		$output['messages'] = "Gagal Menghapus Data";
	}
	$mysql->close();
	echo json_encode($output);
?>