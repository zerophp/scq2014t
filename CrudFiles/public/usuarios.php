<?php 

include('functions.php');

if(isset($_GET['action']))
	$action = $_GET['action'];
else
	$action = "select";


switch ($action)
{
	case 'update':
		
		
		if($_POST)
		{
// 			echo "<pre>POST: ";
// 			print_r($_POST);
// 			echo "</pre>";
			
// 			echo "<pre>Files: ";
// 			print_r($_FILES);
// 			echo "</pre>";
			//die;
			// Dar formato al array post como una linea valida
			$usuario['id']=$_POST['id'];
			$usuario['name']=$_POST['name'];
			$usuario['lastname']=$_POST['lastname'];
			$usuario['email']=$_POST['email'];
			$usuario['password']=$_POST['password'];
			$usuario['age']=$_POST['age'];
			$usuario['pets']=$_POST['pets'];
			$usuario['languages']=$_POST['languages'];
			$usuario['description']=$_POST['description'];
			$usuario['cities']=$_POST['cities'];
			$usuario['gender']=$_POST['gender'];
			$usuario[]='Updated';
			$usuario['photo']=$_POST['photo'];
			
			foreach($usuario as $value)
			{
				if(!is_array($value))
					$array_out[]=$value;
				else
					$array_out[]=implode('|',$value);
			}
			
			echo "<pre>Files: ";
			print_r($array_out);
			echo "</pre>";
			
			$alumnos=file_get_contents('alumnos.txt');
			$alumnos=explode("\n",$alumnos);
			
			echo "<pre>alumnos: ";
			print_r($alumnos);
			echo "</pre>";
			
			$alumnos[$_GET['id']]=implode(',',$array_out);
			
			echo "<pre>alumnosssd: ";
			print_r($alumnos);
			echo "</pre>";
			
			$alumnos=implode("\n",$alumnos);
			file_put_contents('alumnos.txt', $alumnos);
			
			
		}
		else
		{
			$usuario=getUserFromFile('alumnos.txt', $_GET['id']); 
			include('formulario.php');
		}
		echo "esto es update";
	break;
	
	case 'insert':
		if($_POST)
		{
			$filename=getFileName($_SERVER['DOCUMENT_ROOT'], $_FILES['photo']['name']);
			uploadImage($filename, $_SERVER['DOCUMENT_ROOT'], $_FILES['photo']);
			$_POST[]=$filename;
			write2txt('alumno.txt', $_POST);			
			//Saltar a tabla de usuarios
			header("Location: /usuarios.php");
		}
		else 
		{
			include('formulario.php');
		}
		echo "esto es insert";
		
	break;
	
	case 'delete':
		echo "esto es delete";
	break;
	
	case 'select':
		echo "esto es select";
		
		// Leer el contenido del fichero en un string
		$data = file_get_contents('alumnos.txt');
		
		// Dividir el string por saltos de linea en un array
		$filas = explode("\n",$data);
		
		echo "<a href=\"usuarios.php?action=insert\">Insert Usuario</a>";
		// dibujar tabla
		echo "<table border=1>";
		// Para cada elemento del array
		foreach($filas as $key => $fila)
		{
			// Dibujar fila
			echo "<tr>";
			// Dividir el string fila por comas en un arrayfila
			$columns=explode(',',$fila);
		
			// Sacar la imagen
			$image=array_pop($columns);
		
			// Para cada elemento del arrayfila
			foreach($columns as $column)
			{
				// Dibujar columna
				echo "<td>";
				// Poner contenido
				echo $column;
				echo "</td>";
			}
			// Poner Imagen
			echo "<td>";
			echo "<img src=\"".$image."\" width=\"100px\";  />";
			echo "</td>";
		
			// Poner opciones
			echo "<td>";
			echo "<a href=\"usuarios.php?action=update&id=".$key."\">Update</a>";
			echo "<a href=\"#\">Delete</a>";
			echo "</td>";
		
			echo "</tr>";
		}
		echo "</table>";
		
		
	break;
	
	default:
	break;
}

