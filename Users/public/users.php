<?php 

include('../application/model/functions.php');
include('../application/model/users.php');

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
			update('users', $_POST, $config['database']);		
			header("Location: /users.php");
			// TODO: change image
		}
		else
		{			
			$usuario = getUser($_GET['id'], $config['database']);
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
			insert('users', $_POST, $config['database']);			
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
				deleteUser($_POST['iduser'], $config['database']);
				// TODO: remove image				
			}
			header("Location: /users.php");
		}
		else
		{
			$usuario = getUser($_GET['id'], $config['database']);
			ob_start();
				include('../application/views/usuarios/delete.php');
				$content=ob_get_contents();
			ob_end_clean();
		}
	break;
	
	case 'select':
		$filas = getUsers($config['database']);
		ob_start();
			include ('../application/views/usuarios/select.php');
			$content=ob_get_contents();
		ob_end_clean();		
	break;
	
	default:
	break;
}


include('../application/views/layouts/backend.phtml');



