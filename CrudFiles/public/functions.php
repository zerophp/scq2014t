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
	file_put_contents($filename, $data,FILE_APPEND);
	return;	
}

/**
 * Get users from file
 *
 * @param string $filename
 * @param int:null $id 
 * @return array:string $usuario:
 */
function getUserFromFile($filename, $id = null)
{
	
}
