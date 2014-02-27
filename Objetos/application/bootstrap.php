<?php


class bootstrap
{
	var $request;
	var $config;
	
	public function __construct($config, $request)
	{
		$this->request = $request;
		$this->config = $config;
		
		$this->initSession();
		$this->initAcl();
				
	}
	public function run()
	{
		
		$txt = 'controllers_'.$this->request['controller'];
		$obj = new $txt($this->config, $this->request);
		$content = $obj->{$this->request['action']}();
		$this->getLayout($obj->getLayout(), $content);
		
	}
	
	public function initSession()
	{
		session_start();
	}
	
	public function initAcl()
	{
		$publicControllers = array('index','author','error');
		
		if(in_array($this->request['controller'], $publicControllers))
		{
				
		}
		elseif(isset($_SESSION['username']) && $_SESSION['username']!=='')
		{
			//echo "logueado";
			$acl = new model_users_users($this->config);
			$data = $acl->getAcl($_SESSION['iduser'], $this->request);
			
			if(!isset($data['idacl']))
			{
				header("Location: /error/_403");
			}
			
		}
		
		else
		{
			//echo "no logueado";
			header("Location: /author/login");
		}
		
	}
	
	public function initLayout()
	{
		
	}
	
	public function getLayout($layout, $content)
	{
		include('../application/views/layouts/'.$layout.'.phtml');
	}
	
	
	public function initRegister()
	{
		$_SESSION['register']=array();
	}
	
	public function initDB()
	{
		$_SESSION['register']['writelink'] = $linkWrite;
		$_SESSION['register']['readlink'] = $linkRead;
	}
	
	
	
}