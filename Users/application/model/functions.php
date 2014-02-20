<?php

/**
 * Return an image name valid on path 
 * 
 * @param string $path
 * @param string $name
 * @return string $image_name
 */
function getFileName($path, $name)
{
	$datafichero=pathinfo($path."/".$name);
	$i=0;
	while (file_exists($path."/".$name))
	{
		$i++;
		$name=$datafichero['filename']."_".$i.".".$datafichero['extension'];
	}
	return $name;	
}

/**
 * Upload image to path
 * 
 * @param string $name
 * @param string $path
 * @param array $fileinfo $_FILE info
 * @return null
 * 
 */
function uploadImage($name, $path, $fileinfo)
{
	if(is_uploaded_file($fileinfo['tmp_name'])){
		$new_path = 'uploads/'.$name;
		move_uploaded_file($fileinfo['tmp_name'], $new_path);
	}	
}

/**
 * Write data to filename 
 * @param string $filename
 * @param array $data
 * @return null
 */
function write2txt($filename, $data)
{
	$array_out=array();
	foreach($data as $value)
	{
		if(!is_array($value))
			$array_out[]=$value;
		else
			$array_out[]=implode('|',$value);
	}
	$data=implode(',',$array_out);
	$data.="\n";	
	file_put_contents($filename, $data, FILE_APPEND);
}

/**
 * 
 * Get users from file
 * 
 * @param string $filename
 * @param int $id
 * @return array:string $usuario
 */
function getUserFromFile($filename, $id) {
	$lines = getArrayFromText($filename);
	$line = $lines[$id];
	$data = explode(",", $line);
	$alumno = array('id' => $data[0],
		'name' => $data[1],
		'lastname' => $data[2],
		'email' => $data[3],
		'password' => $data[4],
		'age' => $data[5],
		'pets' => explode("|", $data[6]),
		'languages' => explode("|", $data[7]),
		'description' => $data[8],
		'cities' => $data[9],
		'gender' => $data[10],
		'photo' => $data[12]
	);
	return $alumno;
}

/**
 *
 * Get an array with lines contained in a text file
 *
 * @param string $textfile
 * @return array:string $lines
 */
function getArrayFromText($textfile) {
	$lines = explode("\n", file_get_contents($textfile));
	return $lines;
}

/**
 * Format user from data
 * @param array $data
 * @return array
 */
function formatUser($data)
{
	$usuario=array();
	$usuario['id']=$data['id'];
	$usuario['name']=$data['name'];
	$usuario['lastname']=$data['lastname'];
	$usuario['email']=$data['email'];
	$usuario['password']=$data['password'];
	$usuario['age']=$data['age'];
	$usuario['pets']=$data['pets'];
	$usuario['languages']=$data['languages'];
	$usuario['description']=$data['description'];
	$usuario['cities']=$data['cities'];
	$usuario['gender']=$data['gender'];
	$usuario[]='Updated';
	$usuario['photo']=$data['photo'];
	foreach($usuario as $value)
	{
		if(!is_array($value))
			$array_out[]=$value;
		else
			$array_out[]=implode('|',$value);
	}
	return $array_out;
}
