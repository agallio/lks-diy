<?php
	require_once 'mysql.php';

	$username = $mysql->real_escape_string($_POST['username']);
	$password = $mysql->real_escape_string($_POST['password']);
	$passwordhashed = sha1($password);

	$output = array();

	$sql1 = "SELECT * FROM peserta WHERE peserta_username='".$username."' ";
	// echo $sql1;
	$query1 = $mysql->query($sql1) or die("SQL Error : ".$mysql->error);
	// echo $query1->num_rows;
	$result1 = $query1->fetch_assoc();

	$sql2 = "SELECT * FROM juri WHERE juri_username='".$username."' ";
	// echo $sql2;
	$query2 = $mysql->query($sql2) or die("SQL Error : ".$mysql->error);
	// echo $query2->num_rows;
	$result2 = $query2->fetch_assoc();

	$sql3 = "SELECT * FROM admin WHERE admin_username='".$username."' ";
	// echo $sql3;
	$query3 = $mysql->query($sql3) or die("SQL Error : ".$mysql->error);
	// echo $query3->num_rows;
	$result3 = $query3->fetch_assoc();

	if ($query1->num_rows == 1) {
		if ($passwordhashed == $result1['peserta_password']) {
			$_SESSION['peserta'] = $result1;
			$_SESSION['peserta_id_lomba'] = $result1['peserta_id_lomba'];
			$_SESSION['peserta_id'] = $result1['peserta_id'];
			$_SESSION['nama'] = $result1['peserta_nama'];
			$output['success'] = true;
		} else {
			$output['success'] = false;
			$output['messages'] = 'Nama pengguna / Kata sandi tidak cocok';
		}
	} elseif ($query2->num_rows == 1) {
		if ($passwordhashed == $result2['juri_password']) {
			$_SESSION['juri'] = $result2;
			$_SESSION['lomba_id'] = $result2['juri_id_lomba'];
			$_SESSION['username'] = $result2['juri_username'];
			$output['success'] = true;
		} else {
			$output['success'] = false;
			$output['messages'] = 'Nama pengguna / Kata sandi tidak cocok';
		}
	} elseif ($query3->num_rows == 1) {
		if ($passwordhashed == $result3['admin_password']) {
			$_SESSION['admin'] = $result3;
			$output['success'] = true;
		} else {
			$output['success'] = false;
			$output['messages'] = 'Nama pengguna / Kata sandi tidak cocok';
		}
	} else {
		$output['success'] = false;
		$output['messages'] = 'Akun belum terdaftar';
	}

	$mysql->close();
	echo json_encode($output);

?>