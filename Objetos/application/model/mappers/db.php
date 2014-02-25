<?php

class model_mappers_db
{
	var $link;
	var $config;
	
	
	function __construct($config)
	{
		$this->config = $config;
		$this->link = $this->connect();
	}
	
	
	/**
	 * Get DBMS link conection
	 * @param unknown $config
	 * @return link
	 */
	function connect()
	{
		$this->link = mysqli_connect($this->config['host'],
				$this->config['user'],
				$this->config['password']
		);
		
		$this->selectDb($this->link);
		return $this->link;
	}
	
	
	/**
	 * Select database
	 * @param unknown $config
	 * @return null
	 */
	function selectDb($link)
	{
		mysqli_select_db($this->link, $this->config['db'] );
		mysqli_query($this->link, 'SET NAMES utf8');
		return;
	}
	
	function insert($tablename, $data)
	{
		$fields = $this->getFields($tablename, $data);
		$sql = "INSERT INTO ".$tablename." SET ";
		foreach ($fields[1] as $key => $value)
		{
			$sql.=$key . "='".$value."',";
		}
		$sql = substr($sql, 0, strlen($sql)-1);
	
		$result = mysqli_query($this->link, $sql);
		return $result;
	}
	
	function update($tablename, $data)
	{
		$fields = $this->getFields($tablename, $data);
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
	
		$result = mysqli_query($this->link, $sql);
		return $result;
	}
	
	function getFields($tablename, $data)
	{
		$sql = "DESCRIBE ".$tablename;
		
		$result = mysqli_query($this->link, $sql);
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