<?php 


class controllers_users extends controllers_frontcontroller
{
	public function insert()
	{
		if($_POST)
		{
			$filename=getFileName($_SERVER['DOCUMENT_ROOT'], $_FILES['photo']['name']);
			uploadImage($filename, $_SERVER['DOCUMENT_ROOT'], $_FILES['photo']);
			if(isset($filename))
				$_POST['photo']=$filename;
			$obj = new model_users_users($this->config);
			$obj->insertUser('users', $_POST);
			header("Location: /users.php");
		}
		else
		{
			$data=array();
			$content=model_general_views::renderView($this->request, $data);
			return $content;
		}
	}
	public function update()
	{
		if($_POST)
		{
			$obj = new model_users_users($this->config);
			$obj->updateUser('users', $_POST);
			header("Location: /users.php");
			// TODO: change image
		}
		else
		{
			$obj = new model_users_users($this->config);
			$usuario = $obj->getUser($this->request['params']['id']);
			$data=array('usuario'=>$usuario);
			$content=model_general_views::renderView(array('controller'=>'users', 'action'=>'insert'), $data);
			return $content;
		}
	}
	
	public function delete()
	{
		if($_POST)
		{
			if($_POST['Borrar']=="Si")
			{
				$obj = new model_users_users($this->config);
				$obj->deleteUser($_POST['iduser'], $config['database']);
				// TODO: remove image
			}
			header("Location: /users.php");
		}
		else
		{
			$obj = new model_users_users($this->config);
			$usuario = $obj->getUser($this->request['params']['id']);
			$data=array('usuario'=>$usuario);
			$content=model_general_views::renderView($this->request, $data);
			return $content;
		}
	}
	
	public function select()
	{
		$obj = new model_users_users($this->config);
		$filas = $obj->getUsers();
		$data=array('filas'=>$filas);
		$content=model_general_views::renderView($this->request, $data);
		return $content;
	}
	
	public function index()
	{
	
	}
	
	public function error()
	{
	
	}
}



