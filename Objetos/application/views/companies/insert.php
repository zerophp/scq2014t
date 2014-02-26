<form method="post" 
	  enctype="multipart/form-data">
<ul>
<li>
Id: <input type="hidden" name="idcompany" value="<?=isset($_GET['id'])?$_GET['id']:'';?>"/><?=isset($_GET['id'])?$_GET['id']:'';?>
</li>
<li>
Company name: <input type="text" name="company" value="<?=isset($company['company'])?$company['company']:'';?>"/>
</li>
<li>
CIF/NIF: <input type="text" name="cif" size="9" value="<?=isset($company['cif'])?$company['cif']:'';?>"/>
</li>
<li>
Address: <input type="text" name="address" value="<?=isset($company['address'])?$company['address']:'';?>"/>
</li>
<li>
Location: <input type="text" name="location" value="<?=isset($company['location'])?$company['location']:'';?>"/>
</li>
<li>
Send: <input type="submit" name="Send"/>
</li>
<li>
Clear: <input type="reset" name="Clear"/>
</li>
</ul>
</form>