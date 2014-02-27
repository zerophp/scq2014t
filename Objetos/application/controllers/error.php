<?php 


class controllers_error extends frontview
{
	
	public function _404()
	{
		$this->setLayout('error');
		$content=model_general_views::renderView($this->request, array());
		
		return $content;
	}
	
	public function _403()
	{
		$this->setLayout('error');
		$content=model_general_views::renderView($this->request, array());
	
		return $content;
	}
	
		
}



