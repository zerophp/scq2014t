<?php 
// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";


session_start();
echo "sesid:".session_id();
$seed="kaka";

echo "<br/>";
$_SESSION['user_agent']=$_SERVER['HTTP_USER_AGENT'];
$token = md5(session_id().$seed.$_SERVER['REMOTE_PORT']
.$_SERVER['HTTP_USER_AGENT']);
$_SESSION['token']=$token;

echo $token;



echo "<pre>ses2:";
print_r($_SESSION);
echo "</pre>";
?>



<form class="user-login" 
action="procesar.php" 
method="post" 
id="user-login" accept-charset="UTF-8">
<input type="hidden" name="token" value="<?php echo $token;?>"/>

<div><div class="form-item form-type-textfield form-item-name">
  <label for="edit-name">Correo-e <span class="form-required" title="Este campo é necesario.">*</span></label>
 <input type="text" id="edit-name" name="name" value="<?php echo $token;?>" size="60" maxlength="60" class="form-text required error" />
<div class="description">Escriba a súa dirección de correo electrónico.</div>
</div>
<div class="form-item form-type-password form-item-pass">
  <label for="edit-pass">Contrasinal <span class="form-required" title="Este campo é necesario.">*</span></label>
 <input type="password" id="edit-pass" name="pass" size="60" maxlength="128" class="form-text required" />
<div class="description">Escriba o contrasinal para o seu correo.</div>
</div>
<input type="hidden" name="form_build_id" value="form-8y8eXxfuPlYERKdM6-Df3KJeGihGubUa86DuxjOhTXQ" />
<input type="hidden" name="form_id" value="user_login" />
<div class="form-actions form-wrapper" id="edit-actions"><input type="submit" id="edit-submit" name="op" value="Iniciar sesión" class="form-submit" /></div></div></form>	


