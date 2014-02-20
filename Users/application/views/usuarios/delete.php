<form method="post" 
	  enctype="multipart/form-data">
<ul>
<li>
Id: <input type="hidden" name="id" value="<?=$_GET['id'];?>"/>
</li>
<li>
Name: <?=isset($usuario['name'])?$usuario['name']:'';?>
</li>
<li>
Email: <?=isset($usuario['email'])?$usuario['email']:'';?>
</li>
<li>
Si: <input type="submit" name="Borrar" value="Si"/>
</li>
<li>
No: <input type="submit" name="Borrar" value="No"/>
</li>

</ul>
</form>