<?php
$counterQuery = 0;
	function connect()
	{
		global $data;
        $data = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS);
          if ($data->connect_error) {
         die("Connection failed: " . $data->connect_error);
}
	}
	
	function query($q, $returnKey = false, $errordie = true)
	{
		global $counterQuery;
		global $data;
		$counterQuery ++;
		$start = microtime();
		
		$result = mysqli_query($q,$data);
		
		if($returnKey){
			$returnKey = mysqli_fetch_array(mysqli_query($data,"SELECT LAST_INSERT_ID()"));
			$returnKey = $returnKey[0];
		}

		if($returnKey){
			return $returnKey;
		} else {
			return $result;
		}
	}
	
	
	function close() {
		global $data;
		mysqli_close($data);
	}
	
	function getRecursiveDataByQuery($query)
	{
		$return = array();
		$result = query($data,$query);
		$subs    = 'menu_subs';
		
		while($row = mysqli_fetch_assoc($result))
		{
			$keys 	= array_keys($row);
			$id 	= $row[$keys[0]];
			$parent = $row[$keys[1]];
			
			if(!isset($return[$id])){
				$return[$id]	= $row;
			} else {
				$row[$subs] 	= $return[$id][$subs];
				$return[$id]	= $row;
			}
			
			if(!isset($return[$parent])){
				$return[$parent] 		= array();
				$return[$parent][$subs]	= array($id);
			} else {
				if(!isset($return[$parent][$subs])){
					$return[$parent][$subs] = array();
				}
				array_push($return[$parent][$subs],$id);
			}
		}
		return $return;
	}
	
	function getKeyedMultiDataByQuery($query)
	{
		$return = array();
		$result = query($data,$query);
		
		while($row = mysqli_fetch_assoc($result))
		{
			$id 			= array_shift($row);
			$return[$id]	= $row;
		}
		return $return;
	}
	
	function getDataByQuery($query){
		return getRowsByQuery($data,$query);
	}
	function getKeyedDataByQuery($query){
		$return = array();
		$result = query($data,$query);
		while($row = mysqli_fetch_row($result)) {
			$return[$row[0]] = $row[1];
   		}
		return $return;
	}
	
	function getRowsByQuery($query, $fetch_type = MYSQLI_ASSOC)
	{
		$return = array();
		$result = query($data,$query);
		
		while($row = mysqli_fetch_array($result,$fetch_type)) {
       		$return[] = $row;
   		}
		return $return;
	}
	
	function getKeyedMultiRowsByQuery($query, $key)
	{
		$return = array();
		$result = query($data,$query);
		
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
       		$return[$row[$key]] = $row;
   		}
		return $return;
	}
	
	function getRowByQuery($query)
	{
		$return = array();
		$result = query($data,$query);
		while($row = mysqli_fetch_assoc($result)){
       		$return[] = $row;
   		}
		return reset($return);
	}
	
	function getValueByQuery($query)
	{
		$return = "";
		$result = query($data,$query);
		while($row = mysqli_fetch_row($result)){
       		$return = $row[0];
   		}
		return $return;
	}
	
	function getValuesByQuery($query)
	{
		$return = array();
		$result = query($data,$query);
		while($row = mysqli_fetch_row($result)){
			$return[] = $row[0];
   		}
		return $return;
	}
	
	function create_insert_query($data, $table, $excludes = false)
	{
		if($excludes){
			foreach($excludes as $x){ unset($data[$x]); }
		}
		$keys = implode(",",array_keys($data));
		$values = implode("\",\"",$data);
		$query = "INSERT INTO ".$table." (".$keys.") VALUES (\"".$values."\");";
		return $query;
	}
	
	function create_update_query($data, $table, $where = "", $exclude = false){
		$q = "UPDATE ".$table." SET ";
		foreach($data as $key => $value){
			$q .= $key." = \"".addslashes($value)."\", ";
		}
		$q = substr($q,0,-2);
		$q .= " ".$where;
		return $q;
	}