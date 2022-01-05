<?php
	set_time_limit(0);
	
	// CRYPTO OPTIONS
	define("CRYPTONAME",		"BDCash Protocol");
	define("CRYPTOSHORTNAME",	"BDCASH");
	
	//DAEMON OPTIONS
	define("WALLET_RPC_USER",	"bdcashrpc");
	define("WALLET_RPC_PASS",	"2371283812");
	define("WALLET_RPC_SERVER",	"127.0.0.1");
	define("WALLET_RPC_PORT",	"36263");

	//DATABASE SETTINGS
	define("DATABASE_NAME",		"explorer");
	define("DATABASE_HOST",		"localhost");
	define("DATABASE_USER",		"root");
	define("DATABASE_PASS",		"");
	
	require_once("classes/json-rpc-client.php");
	require_once("classes/database.class.php");
	require_once("classes/daemon.class.php");
	require_once("classes/client.class.php");
	
	Connect();
?>
