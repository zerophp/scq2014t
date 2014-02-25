<form method="post" 
	  enctype="multipart/form-data">
<ul>
<li>
Id: <input type="hidden" name="iduser" value="<?=isset($_GET['id'])?$_GET['id']:'';?>"/>
</li>
<li>
Username: <input type="text" name="username" value="<?=isset($usuario['username'])?$usuario['username']:'';?>"/>
</li>
<li>
Name: <input type="text" name="name" value="<?=isset($usuario['name'])?$usuario['name']:'';?>"/>
</li>
<li>
Lastname: <input type="text" name="lastname" value="<?=isset($usuario['lastname'])?$usuario['lastname']:'';?>"/>
</li>
<li>
Email: <input type="text" name="email" value="<?=isset($usuario['email'])?$usuario['email']:'';?>"/>
</li>
<li>
Password: <input type="password" name="password"/>
</li>
<li>
Age: <input type="text" name="age" value="<?=isset($usuario['age'])?$usuario['age']:'';?>"/>
</li>
<li>
Pets: Gato<input type="checkbox" name="pets[]" value="gato" <?=(isset($usuario['pets'])&&in_array('gato', $usuario['pets']))?'checked':'';?>/>
Perro<input type="checkbox" name="pets[]" value="perro" <?=(isset($usuario['pets'])&&in_array('perro', $usuario['pets']))?'checked':'';?>/>
Tigre<input type="checkbox" name="pets[]" value="tigre" <?=(isset($usuario['pets'])&&in_array('tigre', $usuario['pets']))?'checked':'';?>/>
</li>
<li>
Languages:<select multiple name="languages[]">
<option value="english" <?=(isset($usuario['languages'])&&in_array('english', $usuario['languages']))?'selected':'';?>>English</option>
<option value="galego" <?=(isset($usuario['languages'])&&in_array('galego', $usuario['languages']))?'selected':'';?>>Galego</option>
<option value="castellano" <?=(isset($usuario['languages'])&&in_array('castellano', $usuario['languages']))?'selected':'';?>>Castellano</option>
</select>
</li>
<li> 
Description: <textarea rows="10" cols="10" name="description"><?=isset($usuario['description'])?$usuario['description']:'';?></textarea>
</li>
<li>
Photo: <input type="file" name="photo"/>
<?php 
if(isset($usuario['photo']))
{
	echo "<img width=\"100px\" src=\"".$usuario['photo']."\"/>";
	echo "<input type=\"hidden\" name=\"photo\" value=\"".$usuario['photo']."\" />";
}
	
	?>
</li>
<li>
City: <select name="cities_idcity">
<option value="1" <?=(isset($usuario['cities_idcity'])&&$usuario['cities_idcity']=='1')?'selected':'';?>>Santiago</option>
<option value="2" <?=(isset($usuario['cities_idcity'])&&$usuario['cities_idcity']=='2')?'selected':'';?>>Vigo</option>
<option value="3" <?=(isset($usuario['cities_idcity'])&&$usuario['cities_idcity']=='3')?'selected':'';?>>La Coruña</option>
</select>
</li>
<li> 
Gender: 
Otros<input type="radio" name="genders_idgender" value="1" <?=(isset($usuario['genders_idgender'])&&$usuario['genders_idgender']=='1')?'checked':'';?>/>
Mujer<input type="radio" name="genders_idgender" value="2" <?=(isset($usuario['genders_idgender'])&&$usuario['genders_idgender']=='2')?'checked':'';?>/>
Hombre<input type="radio" name="genders_idgender" value="3" <?=(isset($usuario['genders_idgender'])&&$usuario['genders_idgender']=='3')?'checked':'';?>/>
</li>
<li>
Enviar: <input type="submit" name="Enviar"/>
</li>
<li>
Borrar: <input type="reset" name="Borrar"/>
</li>
<li>
Boton: <input type="button" name="Boton" value="El boton"/>
</li>
</ul>
</form>