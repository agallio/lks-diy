<?php
	require_once '../../php/mysql.php';
	unset($_SESSION['juri']);
	$output['success'] = true;
	echo json_encode($output);
?>