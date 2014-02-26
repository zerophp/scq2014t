<?php 


class controllers_acl extends controllers_frontcontroller
{
	
	public function login()
	{
		$content = "login";
		$this->setLayout('login');
		return $content;
	}
	
	public function logout()
	{
		return 'logout';
	}	
}



