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
	
	function getCredential($email, $password)
	{
		return $this->mapper->getCredential($email, $password);
	}
	
	function getAcl($iduser, $request)
	{
		return $this->mapper->getAcl($iduser, $request);
	}
		
	function updateUser($tablename, $data)
	{
		return $this->mapper->updateUser($tablename, $data);
	}
	
	function insertUser($tablename, $data)
	{
		return $this->mapper->insertUser($tablename, $data);
	}
}