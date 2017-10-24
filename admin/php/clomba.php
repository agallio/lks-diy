<?php
	require_once '../../php/mysql.php';
	$nama = $mysql->real_escape_string($_POST['lomba_nama']);
	$output = array();
	
	$sql = "SELECT * FROM lomba WHERE lomba_nama='$nama'";
	$query = $mysql->query($sql) or die("SQL Error : ".$mysql->error);
	if ($query->num_rows < 1) {
		$sql = "INSERT INTO lomba VALUES (NULL, '$nama')";
		$query = $mysql->query($sql) or die("SQL Error : ".$mysql->error);
		$output['success'] = true;
 	} else {
 		$output['success'] = false;
 		$output['messages']  = "Bidang lomba sudah ada";
 	}
 	$mysql->close();
 	echo json_encode($output);
?>