<?php
// Debug
echo "<pre>Get: ";
print_r($_GET);
echo "</pre>";

echo "<pre>Post: ";
print_r($_POST);
echo "</pre>";

echo "<pre>Files: ";
print_r($_FILES);
echo "</pre>";


//Tomar el destino
$destino = $_SERVER['DOCUMENT_ROOT'];

//Tomar el nombre del fichero
$fichero = $_FILES['photo']['name'];

// Datos del fichero
$datafichero = pathinfo($destino."/".$fichero);

$a=0;
//Mientras que el fichero exista en el destino
while (file_exists($destino."/".$fichero))	// hasta que no exista
{
	//aumentar la variable 
	$a++;
	//concatenarsela al nombre del fichero
	$fichero = $datafichero['filename'].
				"_".
				$a.
				".".
				$datafichero['extension'];
}

// Agregar informacion de la foto al final del POST
$_POST[]=$fichero;

// Subir foto
move_uploaded_file($_FILES['photo']['tmp_name'], 
					$destino."/".$fichero);


// Separar por comas los datos
$data=implode(',',$_POST);
// Salto de linea
$data.="\n";


// Estibir datos en un archivo de texto
file_put_contents('alumnos.txt', $data, FILE_APPEND);










