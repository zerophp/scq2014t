<?php 

switch ($request['action'])
{
	case 'update':	
		if($_POST)
		{
			$valid = array(1, 2);
			if (isset($_POST['cif']) && !in_array(valida_nif_cif_nie($_POST['cif']), $valid)) { $_POST['cif'] = ""; }
			$obj = new model_companies_companies($config);
			$obj->updateCompany($_POST);
			header("Location: /companies.php");
		}
		else
		{
			$obj = new model_companies_companies($config);
			$company = $obj->getCompany($_GET['id']);
			ob_start();
				include('../application/views/companies/insert.php');
				$content=ob_get_contents();
			ob_end_clean();
		}		
	break;
	
	case 'insert':
		if($_POST)
		{	
			$valid = array(1, 2);
			if (isset($_POST['cif']) && !in_array(valida_nif_cif_nie($_POST['cif']), $valid)) { $_POST['cif'] = ""; }
			$obj = new model_companies_companies($config);
			$obj->insertCompany($_POST);
			header("Location: /companies.php");
		}
		else 
		{
			ob_start();
				include('../application/views/companies/insert.php');
				$content=ob_get_contents();
			ob_end_clean();
		}				
	break;
	
	case 'delete':
		if($_POST)
		{
			if($_POST['Borrar']=="Si")
			{	
				$obj = new model_companies_companies($config);
				$obj->deleteCompany($_POST['idcompany']);
			}
			header("Location: /companies.php");
		}
		else
		{
			$obj = new model_companies_companies($config);
			$company = $obj->getCompany($_GET['id']);
			ob_start();
				include('../application/views/companies/delete.php');
				$content=ob_get_contents();
			ob_end_clean();
		}
	break;
	
	case 'select':
		$obj = new model_companies_companies($config);
		$filas = $obj->getCompanies();
		ob_start();
			include ('../application/views/companies/select.php');
			$content=ob_get_contents();
		ob_end_clean();		
	break;
	
	default:
	break;
}



