<?php

echo "<pre>Get: ";
print_r($_GET);
echo "</pre>";

echo "<pre>Post: ";
print_r($_POST);
echo "</pre>";

echo "<pre>Files: ";
print_r($_FILES);
echo "</pre>";

$data=implode(',',$_POST);
$data.="\n";

file_put_contents('alumnos.txt', $data, FILE_APPEND);
move_uploaded_file($_FILES['photo']['tmp_name'], 
					$_SERVER['DOCUMENT_ROOT']."/".
					$_FILES['photo']['name']);