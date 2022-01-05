<?php
if (!defined('IN_SCRIPT')) {die('Invalid attempt!');}
$config = array(
    "name" => "BDCash Protocol", // Coin name/title
    "symbol" => "BDCASH", // Coin symbol
    "description" => "You could browse the NewBull block detail and transaction detail with NewBull Block Explorer.",
    "homepage" => "/explorer/",
    "root_path" => "/", //start with '/', end with '/'
    "copy_name" => "BDCash Protocol Explorer",
    "start_year" => 2020,
    "explorer_name" => "BDCash Explorer",
    "explorer_path" => "explorer/", //do not start with '/',  but end with '/', if root write ""
    "theme" => "theme1",
    "url_rewrite" => true,
    "rpc_host" => "localhost", // Host/IP for the daemon
    "rpc_port" => 36263, // RPC port for the daemon
    "rpc_user" => "bdcashrpc", // 'rpcuser' from the coin's .conf
    "rpc_password" => "2371283812", // 'rpcpassword' from the coin's .conf
    "proofof" => "pos", //pow,pos
    "nTargetTimespan" => 1209600, //14 * 24 * 60 * 60
    "nTargetSpacing" => 60, //3 * 60
    "blocks_per_page" => 20,
    "date_format" => "Y-m-d H:i:s",
    "refresh_interval" => 180, //seconds
    "retarget_diff_since" => 0,
);
