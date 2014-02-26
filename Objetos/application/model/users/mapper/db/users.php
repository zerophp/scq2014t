<?php


class model_users_mapper_db_users extends model_mappers_db
{
	function __construct($config)
	{
		parent::__construct($config);
	}
	
	
	function getUsers()
	{
		$sql = "SELECT users.iduser,users.name, users.photo,
						cities.name as city,
						genders.name as gender
				FROM users
				INNER JOIN cities ON
					cities.idcity = users.cities_idcity
				INNER JOIN genders ON
					genders.idgender = users.genders_idgender";
		$result = mysqli_query($this->link, $sql);
		while($row = mysqli_fetch_assoc($result))
		{
			$row['pets'] = $this->getPets($row['iduser']);
			$row['languages'] =	$this->getLanguages($row['iduser']);
			$rows[]=$row;
		}
		return $rows;
	}
	
	
	function getPets($iduser)
	{
		$sql = "SELECT users.name,
				GROUP_CONCAT(pets.name SEPARATOR '|') as pets
				FROM users
				INNER JOIN users_has_pets ON
				users_has_pets.users_iduser = users.iduser
				INNER JOIN pets ON
				pets.idpet = users_has_pets.pets_idpet
				WHERE users.iduser=".$iduser;
		$result = mysqli_query($this->link, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row['pets'];
	}
	
	function getLanguages($iduser)
	{
		$sql = "SELECT users.name,
				GROUP_CONCAT(languages.name SEPARATOR '|') as languages
				FROM users
				INNER JOIN users_has_languages ON
					users_has_languages.users_iduser = users.iduser
				INNER JOIN languages ON
					languages.idlanguage = users_has_languages.languages_idlanguage
				WHERE users.iduser=".$iduser;
		$result = mysqli_query($this->link, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row['languages'];
	}
	
	
	
	
	
	function getUser($iduser)
	{
		$sql = "SELECT users.*,
						cities.name as city,
						genders.name as gender
				FROM users
				INNER JOIN cities ON
					cities.idcity = users.cities_idcity
				INNER JOIN genders ON
					genders.idgender = users.genders_idgender
				WHERE users.iduser = ".$iduser;
		$result = mysqli_query($this->link, $sql);
		while($row = mysqli_fetch_assoc($result))
		{
			$row['pets'] = explode('|',$this->getPets($row['iduser']));
			$row['languages'] =	explode('|',$this->getLanguages($row['iduser']));
			$rows[]=$row;
		}
			
		return $rows[0];
	}
	
	
	function deleteUser($iduser)
	{
		$sql = "DELETE FROM users WHERE iduser = ".$iduser;
		$result = mysqli_query($this->link, $sql);
	
		return $result;
	}
	
	
	
	function updateUser($tablename, $data)
	{
		$this->update($tablename, $data);
	}
	
	function insertUser($tablename, $data)
	{
		$this->insert($tablename, $data);
	}
}