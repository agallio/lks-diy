<?php
	require_once '../../php/mysql.php';
	unset($_SESSION['admin']);
	$output['success'] = true;
	echo json_encode($output);
?>