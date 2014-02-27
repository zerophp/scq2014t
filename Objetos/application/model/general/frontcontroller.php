<?php


class model_general_frontcontroller
{
	public static function getRequest()
	{		
		$data = explode('/', $_SERVER['REQUEST_URI']);
		
		if($data[1]=='')
		{
			$request['controller']='index';
			$request['action']='index';
		}
		else if(file_exists('../application/controllers/'.
							$data[1].'.php'))
		{
			$request['controller']=$data[1];
			if(isset($data[2])&&$data[2]!=='')
				$request['action']=$data[2];
			else
				$request['action']='index';			
		}
		else 
		{
			$request['controller']='error';
			$request['action']='_404';
		}
		
		for ($i=3;$i<count($data);$i+=2)
		{
			$request['params'][$data[$i]]=$data[$i+1];
		}
		return $request;
	}
	
}