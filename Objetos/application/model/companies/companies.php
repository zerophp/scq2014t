<?php
class model_companies_companies implements model_companies_companiesInterface {
	var $mapper;

	public function __construct($config)
	{
		$txt = "model_companies_mapper_" . $config['repository']['companies'] . "_companies";
		$mapper = new $txt($config['database']);
		$this->mapper = $mapper;
	}

	function getCompany($idcompany)
	{		
		return $this->mapper->getCompany($idcompany);
	}

	function getCompanies()
	{
		return $this->mapper->getCompanies();
	}
	
	function insertCompany($data)
	{
		return $this->mapper->insertCompany($data);
	}
	
	function updateCompany($data)
	{
		return $this->mapper->updateCompany($data);
	}
	
	function deleteCompany($idcompany)
	{
		return $this->mapper->deleteCompany($idcompany);
	}
}