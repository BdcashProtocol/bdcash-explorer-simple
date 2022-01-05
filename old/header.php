<?php
	require_once('config.php');
	
	$txData		= Client::getTransactionData(25); 
	$blockData	= Client::getBlockData(15); 
	
	 //print_r($txData);
	 //print_r($blockData);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=ucfirst(CRYPTONAME)?> - Explorer</title>
<script src="js/main.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {
        height: 550px;
        padding-top: 65px;
        }
    
    /* Set gray background color and 100% height */
    .sidenav {
    position: fixed;
      left: 225px;
      width: 225px;
      margin-left: -225px;
      background-color: #EDD710;
      color: #000000;
      height: 100%;
      width: 225px;
    
       
    }
    .sidenav li a{
      color: #000000;
    }   
     
    .navbar{
    background: #EDD710;
    color: #000000;
    border: none;
        }
    .navbar ul li a{
    color: #000000;
        }
        
    .bdcash-body{
    margin-top: 25px;
    margin-right: -115px;
    right:-140px;
    width: 95%;        
    padding: 0;
        margin-bottom:25px;
        }    
     
    /* Set black background color, white text and some padding */
    footer {
      background-color: #EDD710;
      color: #00000;
        position: fixed;
    }    
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
       .bdcash-body {width: auto;} 
    }
  </style>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid"  id="myNavbar">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
         <a class="navbar-brand" href="https://bryanrojasq.wordpress.com">
                <img src="http://placehold.it/200x50&text=LOGO" alt="LOGO">
            </a>
    </div>
      <div class="navbar-form navbar-left navbar navbar-inverse col-sm-9">
           <div class="collapse navbar-collapse">
    
          </div>
      </div> 
      
      
  </div>
</nav>
<div class="container">
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>Explorer</h2>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="./">Explorer</a></li>
        <li><a href="/masternodes.php">Masternodes</a></li>
        <li><a href="/richlist.php">Rick List</a></li>
        <li><a href="/networks.php">Metworks</a></li>
        <li><a href="/peers.php">Peers</a></li>
      </ul><br>
    </div> 
      
      <div class="col-sm-9 bdcash-body">
          
    <div class="well bg-info">
        <span class="badge bg bg-warning">Ads <?=ucfirst(CRYPTONAME)?></span>
        <h3>News <?=ucfirst(CRYPTONAME)?> about Ecosystem.</h3>
      </div>
          
    
    <div class="col-sm-12 well text-center">
    <form action="search.php" method="post" class="form-inline">
      <input name="id" type="text" placeholder="enter block, txid or address" class="form-control" style="width:80%;">
        <button type="submit" class="btn btn-warning"> Search >> </button>
    </form>
      </div>
    
      <div class="row">
        <div class="col-sm-4">
          <div class="well">
            <h4>Supply Total</h4>
            <p>0000000 <?=ucfirst(CRYPTOSHORTNAME)?> </p> 
          </div>
        </div>
          
           <div class="col-sm-4">
          <div class="well">
            <h4>Masternodes</h4>
            <p>10 Online</p> 
          </div>
        </div>
          
        <div class="col-sm-4">
          <div class="well">
            <h4>Price USD</h4>
            <p>0.01 (0.00BTC)</p> 
          </div>
        </div>