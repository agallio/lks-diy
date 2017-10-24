<?php
	require_once '../../php/mysql.php';
	unset($_SESSION['peserta']);
	$output['success'] = true;
	echo json_encode($output);
?>