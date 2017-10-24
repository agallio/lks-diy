<?php
	require_once '../../php/mysql.php';
	$nama = $mysql->real_escape_string($_POST['juri_nama']);
	$username = $mysql->real_escape_string($_POST['juri_username']);
	$password = $mysql->real_escape_string($_POST['juri_password']);
	$cpassword = $mysql->real_escape_string($_POST['cpassword']);
	$lomba = $mysql->real_escape_string($_POST['lomba']);
	
	if ($cpassword == $password) {
		$passwordhashed = sha1($password);
		$sql = "SELECT * FROM juri WHERE juri_nama='$nama' OR juri_username='$username' ";
		$query = $mysql->query($sql) or die("SQL Error : ".$mysql->error);
		if ($query->num_rows<1) {
			$sql = "INSERT INTO juri VALUES (NULL,'$nama','$username','$passwordhashed','$lomba')";
			$query = $mysql->query($sql) or die("SQL Error : ".$mysql->error);
			$output['success'] = true;
		} else {
			$output['success'] = false;
			$output['messages'] = 'Juri sudah terdaftar';
		}
	} else {
		$output['success'] = false;
		$output['messages'] = 'Kata Sandi tidak cocok';
 	}
	$mysql->close();
	echo json_encode($output);
?>