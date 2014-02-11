<?php
$name = "Agustin Calderon";
$city = "Santiago de Compostela";
$address = array ("Rua das Rosas",
				  "8",
				  "\"Santiago\"");
$edad = 67;

$mascotas = false;



echo is_int($name);
echo is_int($edad);

echo "<br/>";

var_dump(is_int($name));
echo "<br/>";
var_dump($address);
echo "<br/>";

echo "<pre>";
print_r($address);
echo "</pre>";


echo "<hr/>";

echo $name;
echo "<hr/>";

echo $name[2];
















