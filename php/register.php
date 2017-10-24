<?php
	require_once 'mysql.php';
	$nama = $mysql->real_escape_string($_POST['nama']);
	$no = $mysql->real_escape_string($_POST['no']);
	$tgl = strtotime($mysql->real_escape_string($_POST['tgl']));
	$sekolah = $mysql->real_escape_string($_POST['sekolah']);
	$kelas = $mysql->real_escape_string($_POST['kelas']);
	$username = $mysql->real_escape_string($_POST['username']);
	$password = $mysql->real_escape_string($_POST['password']);
	$cpassword = $mysql->real_escape_string($_POST['cpassword']);
	$lomba = $mysql->real_escape_string($_POST['lomba']);

	if ($cpassword == $password) {
		$passwordhashed = sha1($password);
		$output = array();
		$sql = "SELECT * FROM peserta WHERE peserta_no='$no' AND peserta_username='$username' ";
		$query = $mysql->query($sql) or die("SQL Error : ".$mysql->error);
		if ($query->num_rows < 1) {
			$sql = "INSERT INTO peserta VALUES (NULL,'$nama','$no','$tgl','$kelas','$sekolah','$username','$passwordhashed','$lomba')";
			$query = $mysql->query($sql) or die("SQL Error : ".$mysql->error);
			$output['success'] = true;
		} else {
			$output['success'] = false;
			$output['messages'] = "Akun sudah terdaftar";
		} 
	} else {
		$output['success'] = false;
		$output['messages'] = "Kata sandi tidak cocok";
	}
	$mysql->close();
	echo json_encode($output);
	
?>