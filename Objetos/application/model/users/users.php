<?php


class model_users_users implements model_users_usersInterface
{
	var $mapper;
	
	public function __construct($config)
	{

		$txt = 'model_users_mapper_'.$config['repository']['users'].'_users';
		$mapper = new $txt($config['database']);
		$this->mapper = $mapper;
	}
	
	/**
	 * Get users array
	 * @param array $config
	 * @return array
	 */
	function getUsers()
	{
		return $this->mapper->getUsers();		
	}
	
	
	function getUser($iduser)
	{
		return $this->mapper->getUser($iduser);
	}
	
	
	function deleteUser($iduser)
	{
		return $this->mapper->deleteUser($iduser);
	}
		
	function updateUser($iduser, $data)
	{
		return $this->mapper->updateUser($iduser, $data);
	}
}