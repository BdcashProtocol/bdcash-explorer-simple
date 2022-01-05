<?php
	require_once('config.php');
	
	// print_r($_REQUEST);
	
	$id = $_REQUEST["id"];
	
?>
<a href="explorer.php">Return to explorer</a>
<form action="search.php" method="post">
	<input name="id" type="text" placeholder="enter block, txid or address" style="width:450px;"/>
	<input type="submit" value="Submit">	
</form>
<?php
	
	$data = array();
	$cnt = 0;
	
	if(strlen($id) == 34){
		$addressData	= Client::getAddress($id);
		$balance 		= Client::getBalance($id);
		
		$in = 0;
		$out = 0;
		$total = 0;
		$tx_cnt = 0;
		foreach ($addressData as $data){
			if($data["amount"] < 0)
				$out += $data["amount"];
			if($data["amount"] > 0)
				$in += $data["amount"];
			$total += $data["amount"];
			$tx_cnt++;
		}
		
		echo "<p><span style='font-size:16px;font-weight:bold;'>Address</span><span style='font-size:14px;'> {$total}</span></p>";
		echo "<p>$id</p>";
		echo "<p>Total Received $in</p>";
		echo "<p>Total Sent $out</p>";
		echo "<p>Final Balance $total</p>";
		echo "<p>No. Transactions $tx_cnt</p>";
		foreach($addressData as $val){
			if($val["amount"] > 0 || $val["amount"] < 0){
				if($val["amount"] > 0) {
					echo "+" . $val["amount"] . '	<a href="search.php?id='.$val["txid"].'">'.$val["txid"].'</a><br>';
				} else {
					echo $val["amount"] . '	<a href="search.php?id='.$val["txid"].'">'.$val["txid"].'</a><br>';
				}
			}
		}
	} else if (strlen($id) > 34) {
		$txData	= Client::getTransaction($id);
		
		$txArray = array();
		
		foreach($txData as $val){
			if(!in_array($val["txid"], $txArray)){
				$txArray[] = $val["txid"];
				echo "<strong>Transaction</strong><br>";
				echo "<pre>";
				echo "Transaction ".'<a href="search.php?id='.$val["txid"].'">'.$val["txid"].'</a>';
				echo "<br>";
				echo "Found in block ".'<a href="search.php?id='.$val["block"].'">'.$val["block"].'</a><br><br>';
				$txData = Daemon::getTransaction($val["txid"]);
				print_r($txData);
				echo "</pre>";
			}
		}
	} else {
		echo "<strong>Transactions</strong><br>";
		$blockInfo = Daemon::getBlock($id);
		//echo "<pre>".print_r($blockInfo, true)."</pre>";
		foreach($blockInfo["tx"] as $txid){
			$txData = Daemon::getTransaction($txid);
			echo "<pre>";
			echo '<a href="search.php?id='.$txid.'">'.$txid.'</a><br>';
			print_r($txData);
			echo "</pre>";
		}
	}
	
?>