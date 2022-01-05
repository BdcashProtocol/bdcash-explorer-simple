<?php
	require_once('config.php');
	
	(PHP_SAPI === 'cli' || isset($_SERVER['HTTP_USER_AGENT'])) && die('This daemon can only run in CLI');
	Daemon::init();
	close();
?>