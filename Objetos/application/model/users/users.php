<?php


class model_users_users implements model_usersInterface
{
	var $mapper;
	
	public function __construct($config)
	{
		$txt = $config['repository'].'Mapper';
		$mapper = new $txt();
		$this->mapper = $mapper;
	}
	
	/**
	 * Get users array
	 * @param array $config
	 * @return array
	 */
	function getUsers($config)
	{
		return $this->mapper->getUsers($config);		
	}
	
	
	function getUser($iduser, $config)
	{
		return $this->mapper->getUser($iduser, $config);
	}
	
	
	function deleteUser($iduser, $config)
	{
		return $this->mapper->deleteUser($iduser, $config);
	}
		
	function updateUser($iduser, $data, $config)
	{
		return $this->mapper->updateUser($iduser, $data, $config);
	}
}