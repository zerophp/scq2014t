<?php

/**
 * Get users array
 * @param array $config
 * @return array
 */
function getUsers($config)
{
	$link = connect($config);
	selectDb($link, $config);
	
	$sql = "SELECT users.iduser,users.name, users.photo,
					cities.name as city, 
					genders.name as gender
			FROM users
			INNER JOIN cities ON
				cities.idcity = users.cities_idcity
			INNER JOIN genders ON
				genders.idgender = users.genders_idgender";
	$result = mysqli_query($link, $sql);
	while($row = mysqli_fetch_assoc($result))
	{
		$row['pets'] = getPets($row['iduser'], $config);
		$row['languages'] =	getLanguages($row['iduser'], $config);
		$rows[]=$row;
	}
	return $rows;
}


function getPets($iduser,$config)
{
	$link = connect($config);
	selectDb($link, $config);

	$sql = "SELECT users.name, 
			GROUP_CONCAT(pets.name SEPARATOR '|') as pets
			FROM users
			INNER JOIN users_has_pets ON
			users_has_pets.users_iduser = users.iduser
			INNER JOIN pets ON
			pets.idpet = users_has_pets.pets_idpet
			WHERE users.iduser=".$iduser;
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($result);
	return $row['pets'];
}

function getLanguages($iduser,$config)
{
	$link = connect($config);
	selectDb($link, $config);

	$sql = "SELECT users.name, 
			GROUP_CONCAT(languages.name SEPARATOR '|') as languages
			FROM users
			INNER JOIN users_has_languages ON
				users_has_languages.users_iduser = users.iduser
			INNER JOIN languages ON
				languages.idlanguage = users_has_languages.languages_idlanguage
			WHERE users.iduser=".$iduser;
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($result);
	return $row['languages'];
}
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

function getUser($iduser, $config)
{
	$link = connect($config);
	selectDb($link, $config);
	
	$sql = "SELECT users.*,
					cities.name as city,
					genders.name as gender
			FROM users
			INNER JOIN cities ON
				cities.idcity = users.cities_idcity
			INNER JOIN genders ON
				genders.idgender = users.genders_idgender
			WHERE users.iduser = ".$iduser;
	$result = mysqli_query($link, $sql);
	while($row = mysqli_fetch_assoc($result))
	{
		$row['pets'] = explode('|',getPets($row['iduser'], $config));
		$row['languages'] =	explode('|',getLanguages($row['iduser'], $config));
		$rows[]=$row;
	}
		
	return $rows[0];
}


function deleteUser($iduser, $config)
{
	$link = connect($config);
	selectDb($link, $config);	
	$sql = "DELETE FROM users WHERE iduser = ".$iduser;
	$result = mysqli_query($link, $sql);
	
	return $result;
}



function updateUser($iduser, $data, $config)
{
	echo "<pre>";
	print_r($data);
	echo "</pre>";
	
	$link = connect($config);
	selectDb($link, $config);
	
	$sql = "UPDATE users SET ";
	foreach ($data as $key => $value)
	{
		$sql.=$key . "='".$value."',";
	}
	$sql.= "WHERE iduser =".$iduser;
	echo $sql;

	die;
			
		
	$result = mysqli_query($link, $sql);
	
	return $result;
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



