<?php

session_start();
session_regenerate_id(true);

echo "sesid:".session_id();



echo "<pre>";
print_r($_POST);
echo "</pre>";

echo "<pre>";
print_r($_SESSION);
echo "</pre>";


$seed="kaka";


$token = md5(session_id().$seed);
if ($_SESSION['user_agent'] != $_SERVER['HTTP_USER_AGENT'])
if ($_SESSION['token'] == $_POST['token'])
	echo "si";
else 
{
	echo "no";
	echo $_SERVER['REMOTE_ADDR'];
}







// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";

?>


