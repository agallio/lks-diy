<?php
	require_once '../../php/mysql.php';
	$id = $mysql->real_escape_string($_POST['id']);
	$oldpassword = $mysql->real_escape_string($_POST['oldpassword']);
	$password = $mysql->real_escape_string($_POST['password']);
	$cpassword = $mysql->real_escape_string($_POST['cpassword']);
	$oldpasswordhash = sha1($oldpassword);
	
	$output = array();

	$sql = "SELECT * FROM juri WHERE juri_password='$oldpasswordhash' ";
	$query = $mysql->query($sql) or die("SQL Error : ".$mysql->error);
	$result = $query->fetch_assoc();

	if ($query->num_rows == 1) {
		if ($oldpassword == $password) {
			$output['success'] = false;
			$output['messages'] = 'Kata sandi tidak berubah';
		} else {
			if ($cpassword == $password) {
				$passwordhash = sha1($password);
				$sql = "UPDATE juri SET juri_password='$passwordhash' WHERE juri_id='$id' ";
				$query = $mysql->query($sql) or die("SQL Error : ".$mysql->error);
				if ($query) {
					$output['success'] = true;
				} else {
					$output['success'] = false;
					$output['messages'] = 'Ubah Kata Sandi Gagal';
				}
			} else {
				$output['success'] = false;
				$output['messages'] = 'Kata Sandi tidak cocok';
			}
		}
	} else {
		$output['success'] = false;
		$output['messages'] = 'Pengguna tidak terdaftar';
	}
	
	$mysql->close();
	echo json_encode($output);
?>