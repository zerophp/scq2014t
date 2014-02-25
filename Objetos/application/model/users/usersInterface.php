<?php


interface model_usersInterface
{		
	function getUsers($config);	
	function getUser($iduser, $config);
	function deleteUser($iduser, $config);
	function updateUser($iduser, $data, $config);
}

