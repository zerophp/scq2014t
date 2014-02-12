<form action="procesar.php" method="post" 
	  enctype="multipart/form-data">
<ul>
<li>
Id: <input type="hidden" name="Id" value="1"/>
</li>
<li>
Name: <input type="text" name="name"/>
</li>
<li>
Lastname: <input type="text" name="lastname"/>
</li>
<li>
Email: <input type="text" name="email"/>
</li>
<li>
Password: <input type="password" name="password"/>
</li>
<li>
Age: <input type="text" name="age"/>
</li>
<li>
Pets: Gato<input type="checkbox" name="pets[]" value="gato"/>
Perro<input type="checkbox" name="pets[]" value="perro"/>
Tigre<input type="checkbox" name="pets[]" value="tigre" checked/>
</li>
<li>
Languages:<select multiple name="languages[]">
<option value="english">English</option>
<option value="galego">Galego</option>
<option value="castellano" selected>Castellano</option>
</select>
</li>
<li> 
Description: <textarea rows="10" cols="10" name="description"></textarea>
</li>
<li>
Photo: <input type="file" name="photo"/>
</li>
<li>
City: <select name="cities">
<option value="santiago">Santiago</option>
<option value="vigo">Vigo</option>
<option value="coruna">La Coruña</option>
</select>
</li>
<li> 
Gender: 
Otros<input type="radio" name="gender" value="otros"/>
Mujer<input type="radio" name="gender" value="mujer"/>
Hombre<input type="radio" name="gender" value="hombre"/>
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