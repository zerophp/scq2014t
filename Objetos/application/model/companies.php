<?php
class companies implements companiesInterface {
	var $mapper;
	
	public function __construct($config)
	{
		$txt = $config['repository'] . "Mapper";
		$mapper = new $txt();
		$this->mapper = $mapper;
	}
	
	function getCompany($idcompany, $config) {
		$link = $this->mapper->connect($config);
		$this->mapper->selectDb($link, $config);
		
		$sql = "SELECT companies.*
				FROM companies
				WHERE companies.idcompany = " . $idcompany;
	
		$result = mysqli_query($link, $sql);
		while($row = mysqli_fetch_assoc($result))
		{
			$rows[]=$row;
		}
			
		return $rows[0];
	}

	function getCompanies($config)
	{
		$link = $this->mapper->connect($config);
		$this->mapper->selectDb($link, $config);
	
		$sql = "SELECT companies.idcompany, companies.company, companies.cif, companies.address, companies.location
			FROM companies";
		$result = mysqli_query($link, $sql);
		$rows = array();
		while($row = mysqli_fetch_assoc($result))
		{
			$rows[]=$row;
		}
		return $rows;
	}
}
