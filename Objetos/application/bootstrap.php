<?php


class bootstrap
{
	var $request;
	var $config;
	
	public function __construct($config)
	{
		$this->request = $this->getRequest();
		$this->config = $config;
	}
	public function run()
	{
		
		$txt = 'controllers_'.$this->request['controller'];
		$obj = new $txt($this->config, $this->request);
		$content = $obj->{$this->request['action']}();
		$this->getLayout($obj->getLayout(), $content);
	}
	
	public function getRequest()
	{
		$request = model_general_frontcontroller::getRequest();
		return $request;
	}
	
	public function getLayout($layout, $content)
	{		
		include('../application/views/layouts/'.$layout.'.phtml');
	}
	
}