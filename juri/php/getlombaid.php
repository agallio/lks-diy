<?php
	require_once '../../php/mysql.php';
	$id = $mysql->real_escape_string($_POST['id']);
	$sql = "SELECT * FROM peserta WHERE peserta_id='$id'";
	$query = $mysql->query($sql);
	$result = $query->fetch_assoc();

	if ($query->num_rows>0) {
		$output['success'] = true;
		$output['lomba_id'] = $result['peserta_id_lomba'];
	} else {
		$output['success'] = false;
	}
	$mysql->close();
	echo json_encode($output);
?>