<?php

$persona = array(
	'nombre'=>'Agustin',
	'apellido'=>'Calderon',
	'sexo'=>'M',
	'edad'=>'2',
	8,
	true=>'que tal',
	'otra cosa',
	'77'=>'valor alto',
	"78"=>'mas string',
	'mas valores',
	1,2=>"flotante",
	2.4=>'menos...jajajaja',
	'direccion'=>array(3, 
					   'rua das rosas', 
					   'santiago de compostela'),
	'otro'	
);

echo "<pre>";
print_r($persona);
echo "</pre>";


// echo sizeof($persona);

// foreach($persona as $key => $value)
foreach($persona as $value)
{
// 	echo $key.": ".$value;	
	
	if(!is_array($value))
		echo $value;
	echo "<br/>";
}

echo $persona['direccion'][1];












//var_dump($persona);