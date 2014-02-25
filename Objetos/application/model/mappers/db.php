<?php

class model_mappers_db
{
	
	/**
	 * Get DBMS link conection
	 * @param unknown $config
	 * @return link
	 */
	function connect($config)
	{
		$link = mysqli_connect($config['host'],
				$config['user'],
				$config['password']
		);
		return $link;
	}
	
	
	/**
	 * Select database
	 * @param unknown $config
	 * @return null
	 */
	function selectDb($link, $config)
	{
		mysqli_select_db($link, $config['db'] );
		mysqli_query($link, 'SET NAMES utf8');
		return;
	}
	
	function insert($tablename, $data, $config)
	{
		$fields = getFields($tablename, $data, $config);
		$sql = "INSERT INTO ".$tablename." SET ";
		foreach ($fields[1] as $key => $value)
		{
			$sql.=$key . "='".$value."',";
		}
		$sql = substr($sql, 0, strlen($sql)-1);
	
		$link = connect($config);
		selectDb($link, $config);
		$result = mysqli_query($link, $sql);
		return $result;
	}
	
	function update($tablename, $data, $config)
	{
		$fields = getFields($tablename, $data, $config);
		$sql = "UPDATE ".$tablename." SET ";
		foreach ($fields[1] as $key => $value)
		{
			$sql.=$key . "='".$value."',";
		}
		$sql = substr($sql, 0, strlen($sql)-1);
		$sql.= " WHERE ";
		foreach ($fields[0] as $key => $value)
		{
			$sql.=$value."='".$data[$value]."' AND ";
		}
		$sql = substr($sql, 0, strlen($sql)-4);
	
		$link = connect($config);
		selectDb($link, $config);
		$result = mysqli_query($link, $sql);
		return $result;
	}
	
	function getFields($tablename, $data, $config)
	{
		$sql = "DESCRIBE ".$tablename;
		$link = connect($config);
		selectDb($link, $config);
		$result = mysqli_query($link, $sql);
		while($row = mysqli_fetch_assoc($result))
		{
			if($row['Key']!=='PRI')
				$fields[] = $row['Field'];
			else
				$pkey[]=$row['Field'];
		}
		foreach ($data as $key => $value)
		{
			if(!in_array($key, $fields))
				unset($data[$key]);
				
		}
		return array($pkey, $data);
	}

}