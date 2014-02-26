<?php 

include('../application/model/functions.php');
include('../application/autoload.php');

// include('../application/model/users/users.php');


$config=parse_ini_file('../application/configs/settings.ini', true);


if(isset($_GET['action']))
	$action = $_GET['action'];
else
	$action = "select";

switch ($action)
{
	case 'update':	
		if($_POST)
		{
			$obj = new model_users_users($config);
			$obj->updateUser('users', $_POST);		
			header("Location: /users.php");
			// TODO: change image
		}
		else
		{			
			$obj = new model_users_users($config);
			$usuario = $obj->getUser($_GET['id']);
			ob_start();
				include('../application/views/usuarios/insert.php');
				$content=ob_get_contents();
			ob_end_clean();
		}		
	break;
	
	case 'insert':
		if($_POST)
		{
			$filename=getFileName($_SERVER['DOCUMENT_ROOT'], $_FILES['photo']['name']);
			uploadImage($filename, $_SERVER['DOCUMENT_ROOT'], $_FILES['photo']);
			if(isset($filename))
				$_POST['photo']=$filename;	
			$obj = new model_users_users($config);
			$obj->insertUser('users', $_POST);			
			header("Location: /users.php");
		}
		else 
		{
			ob_start();
				include('../application/views/usuarios/insert.php');
				$content=ob_get_contents();
			ob_end_clean();
		}				
	break;
	
	case 'delete':
		if($_POST)
		{
			if($_POST['Borrar']=="Si")
			{	
				$obj = new model_users_users($config);
				$obj->deleteUser($_POST['iduser'], $config['database']);
				// TODO: remove image				
			}
			header("Location: /users.php");
		}
		else
		{
			$obj = new model_users_users($config);
			$usuario = $obj->getUser($_GET['id']);
			ob_start();
				include('../application/views/usuarios/delete.php');
				$content=ob_get_contents();
			ob_end_clean();
		}
	break;
	
	case 'select':
		$obj = new model_users_users($config);
		$filas = $obj->getUsers();
		ob_start();
			include ('../application/views/usuarios/select.php');
			$content=ob_get_contents();
		ob_end_clean();		
	break;
	
	default:
	break;
}


include('../application/views/layouts/backend.phtml');



