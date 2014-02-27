<?php


class frontview
{
	var $config;
	var $request;
	protected $layout;
	
	public function __construct($config, $request)
	{
		$this->config = $config;
		$this->request = $request;
		$this->layout = $this->config['layouts']['default'];
	}
	
	public function getLayout()
	{
		return $this->layout;
	}
	
	public function setLayout($layout)
	{
		$this->layout = $layout;
	}
}