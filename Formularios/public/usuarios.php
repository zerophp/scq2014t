<?php

// Leer el contenido del fichero en un string
$data = file_get_contents('alumnos.txt');

// Dividir el string por saltos de linea en un array 
$filas = explode("\n",$data); 

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
	
	echo "</tr>";
}
echo "</table>";

