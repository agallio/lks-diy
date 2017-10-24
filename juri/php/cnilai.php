<?php
	require_once '../../php/mysql.php';
	$peserta = $mysql->real_escape_string($_POST['peserta']);
	$lomba = $mysql->real_escape_string($_POST['lomba']);
	$nilai = $mysql->real_escape_string($_POST['nilai']);
	$output = array();
	
	$sql = "SELECT * FROM nilai WHERE nilai_id_peserta='$peserta'";
	$query = $mysql->query($sql) or die("SQL Error : ".$mysql->error);
	if ($query->num_rows < 1) {
		$sql = "INSERT INTO nilai VALUES (NULL,'$peserta','$lomba','$nilai')";
		$query = $mysql->query($sql) or die("SQL Error : ".$mysql->error);
		$output['success'] = true;
 	} else {
 		$output['success'] = false;
 		$output['messages']  = "Nilai peserta sudah ada";
 	}
 	$mysql->close();
 	echo json_encode($output);
?>