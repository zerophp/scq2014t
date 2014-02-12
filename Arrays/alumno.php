<?php
$alumno = array(
		'id'=>0,
		'nombre'=>'Agustin',
		'apellido'=>'Calderon',
		'email'=>'agustincl@gmail.com',
		'password'=>'1234',
		'edad'=>'3',
		'mascotas'=>'gato',
		'idiomas'=>array('english','español'),
		'descripcion'=>'esto es la descripcion',
		'foto'=>'/images/agustin.jpg',
		'ciudad'=>'santiago',
		'sexo'=>'otros'
);

echo "<pre>";
print_r($alumno);
echo "</pre>";