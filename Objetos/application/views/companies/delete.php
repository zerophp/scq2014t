<form method="post" 
	  enctype="multipart/form-data">
<ul>
<li>
Id: <input type="hidden" name="idcompany" value="<?=$company['idcompany'];?>"/><?=$company['idcompany'];?>
</li>
<li>
Company name: <?=isset($company['company'])?$company['company']:'';?>
</li>
<li>
Address: <?=isset($company['address'])?$company['address']:'';?>
</li>
<li>
Si: <input type="submit" name="Borrar" value="Si"/>
</li>
<li>
No: <input type="submit" name="Borrar" value="No"/>
</li>

</ul>
</form>