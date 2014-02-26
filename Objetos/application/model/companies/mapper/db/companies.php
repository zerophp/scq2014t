<?php
class model_companies_mapper_db_companies extends model_mappers_db
{
	function __construct($config)
	{
		parent::__construct($config);
	}
	
	function getCompany($idcompany)
	{
		$sql = "SELECT companies.*
			FROM companies
			WHERE companies.idcompany = " . $idcompany;
		
		$result = mysqli_query($this->link, $sql);
		while($row = mysqli_fetch_assoc($result))
		{
			$rows[]=$row;
		}
		
		return $rows[0];
	}
	
	function getCompanies()
	{	
		$sql = "SELECT companies.idcompany, companies.company, companies.cif, companies.address, companies.location
				FROM companies";
		$result = mysqli_query($this->link, $sql);
		$rows = array();
		while($row = mysqli_fetch_assoc($result))
		{
			$rows[]=$row;
		}
		return $rows;
	}
	
	function insertCompany($data)
	{
		$this->insert("companies", $data);
	}
	
	function updateCompany($data)
	{
		$this->update("companies", $data);
	}
	
	function deleteCompany($idcompany)
	{
		$this->delete($idcompany);
	}
	
	/**
	 * Delete company from database, taking its id
	 * @param string $idcompany
	 * @param array:string $config
	 * @return string
	 */
	function delete($idcompany) {
		$sql = "DELETE FROM companies WHERE idcompany = " . $idcompany;
		$result = mysqli_query($this->link, $sql);
	
		return $result;
	}
}