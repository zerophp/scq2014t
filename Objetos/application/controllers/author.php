<?php 


class controllers_author extends frontview
{
	
	public function login()
	{
		
		if($_POST)
		{
			$obj = new model_users_users($this->config);
			$usuario = $obj->getCredential($_POST['email'], $_POST['password']);
			$_SESSION['username']=$usuario['username'];			
			$_SESSION['iduser']=$usuario['iduser'];
			header("Location: /users");
		}
		else
		{
			$content=model_general_views::renderView($this->request, array());
			$this->setLayout('login');
			return $content;
		}
		
		
	}
	
	public function logout()
	{
		session_destroy();
		header("Location: /");

	}	
}



