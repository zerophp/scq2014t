<?php

interface model_companies_companiesInterface {
	function getCompany($idcompany);
	function getCompanies();
	function updateCompany($data);
	function deleteCompany($idcompany);
}
