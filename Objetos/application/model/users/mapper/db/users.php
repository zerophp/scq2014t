<?php


class model_users_mapper_db_users extends model_mappers_db
{
	function getUsers($config)
	{
		$link = $this->mapper->connect($config);
		$this->mapper->selectDb($link, $config);
	
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
}