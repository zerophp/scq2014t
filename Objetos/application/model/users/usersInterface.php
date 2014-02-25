<?php


interface model_users_usersInterface
{		
	function getUsers();	
	function getUser($iduser);
	function deleteUser($iduser);
	function updateUser($iduser, $data);
}

