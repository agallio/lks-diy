<?php
	session_start();
	$mysql = new mysqli('localhost','root','','db_lks');
	if ($mysql->connect_errno) {
		die("MySQL Error : ".$mysql->connect_error);
	}
?>