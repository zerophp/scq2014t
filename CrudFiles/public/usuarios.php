<?php 


if(isset($_GET['action']))
	$action = $_GET['action'];
else
	$action = "select";


switch ($action)
{
	case 'update':
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
		foreach($filas as $fila)
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
			echo "<a href=\"#\">Update</a>";
			echo "<a href=\"#\">Delete</a>";
			echo "</td>";
		
			echo "</tr>";
		}
		echo "</table>";
		
		
	break;
	
	default:
	break;
}

