<?php
abstract class Client
{
	static private $updateCycles;
	
	static public function getUpdateCycles()
	{
		return self::$updateCycles = getRowsByQuery("
			SELECT id,	`update`
			FROM `update`
			WHERE cryptocurrency = '".CRYPTOSHORTNAME."'
			AND finished = 1
			ORDER BY `update` DESC
		");
	}
	
	static public function getNotes()
	{
		return getKeyedMultiRowsByQuery("
			SELECT address,	description, icon
			FROM notes
		",'address');
	}
	
	static public function getProcessingInfo()
	{
		return getValueByQuery("SELECT * FROM `update` WHERE finished = 1 ORDER BY id DESC LIMIT 1");
	}
	
	static public function getRichListData()
	{
		return getRowsByQuery("
			SELECT rl.* FROM richlist AS rl
			WHERE rl.update_id = ".self::getLastUpdate()." 
			ORDER BY rl.`position` ASC
		");
	}
	
	static public function getTransactionData($limit = 10)
	{
		return getRowsByQuery("
			SELECT tx.* FROM tx_data AS tx ORDER BY tx.`block` DESC LIMIT $limit 
		");
	}
	
	static public function getBlockData($limit = 5)
	{
		return getRowsByQuery("
			SELECT DISTINCT block, COUNT(DISTINCT txid) AS transactions FROM tx_data GROUP BY `block` ORDER BY `block` DESC LIMIT $limit 
		");
	}
	
	static public function getBlock($block)
	{
		return getRowsByQuery("
			SELECT * FROM tx_data WHERE `block`='$block'
		");
	}
	
	static public function getAddress($address)
	{
		return getRowsByQuery("
			SELECT * FROM tx_data WHERE `address`='$address'
		");
	}
	
	static public function getBalance($address)
	{
		return getRowsByQuery("
			SELECT SUM(amount) as amount FROM tx_data WHERE `address`='$address'
		");
	}
	
	static public function getTransaction($txid)
	{
		return getRowsByQuery("
			SELECT * FROM tx_data WHERE `txid`='$txid'
		");
	}
	
	static public function getLastUpdate()
	{
		return self::$updateCycles[0]['id'];
	}
}

?>