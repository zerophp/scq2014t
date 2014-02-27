<?php


class frontcontroller
{
	var $request;
	var $config;
	
	public function __construct($config)
	{
		$this->request = $this->getRequest();
		$this->config = $config;
		$bootstrap = new bootstrap($config,$this->request);
		$bootstrap -> run();
		
	}
		
	public function getRequest()
	{
		$request = model_general_frontcontroller::getRequest();
		return $request;
	}
	
	
}