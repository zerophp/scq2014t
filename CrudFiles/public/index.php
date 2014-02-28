<form action="https://cntg.xunta.es:443/web/cnt/iniciar?p_p_id=58&amp;p_p_action=1&amp;p_p_state=normal&amp;p_p_mode=view&amp;p_p_col_id=column-1&amp;p_p_col_count=1&amp;_58_struts_action=%2Flogin%2Fview&amp;_58_cmd=update" method="post" name="_58_fm">
<input name="save_last_path" type="hidden" value="0">
<input name="_58_rememberMe" type="hidden" value="false">
<input name="_58_redirect" type="hidden" value="">
<table class="lfr-table">
<tbody><tr>
<td>
Acceso
</td>
<td>
<input name="_58_login" style="width: 120px;" type="text" value="@oteucorreo.com">
</td>
</tr>
<tr>
<td>
Contrasinal
</td>
<td>
<input id="_58_password" name="_58_password" style="width: 120px;" type="password" value="">
<span id="_58_passwordCapsLockSpan" style="display: none;">O bloqueo de maiúsculas está habilitado.</span>
</td>
</tr>
<tr>
<td>
<span style="font-size: xx-small;">
Recórdame
</span>
</td>
<td>
<input type="checkbox" onclick="
if (this.checked) {
document._58_fm._58_rememberMe.value = 'on';
}
else {
document._58_fm._58_rememberMe.value = 'off';
}">
</td>
</tr>
</tbody></table>
<br>
<input type="submit" value="Acceder">
<input type="button" value="Crear conta" onclick="self.location = 'https://cntg.xunta.es:443/web/cnt/iniciar?p_p_id=2&amp;p_p_action=1&amp;p_p_state=maximized&amp;p_p_mode=view&amp;p_p_col_id=column-1&amp;p_p_col_count=1&amp;_2_struts_action=%2Fmy_account%2Fcreate_account';">
<br><br>
<a href="/c/portal/login?tabs1=forgot-password" style="font-size: xx-small;">
¿Olvidou o seu contrasinal?
</a>
</form>
 <?php 


die;

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ONIX Responsive Business &amp; Portfolio Template</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <!-- CSS files begin-->
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700|Open+Sans+Condensed:700,300,300italic|Open+Sans:400,300italic,400italic,600,600italic,700,700italic,800,800italic|PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="assets/css/responsiveslides.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/prettyPhoto.css" type='text/css'>
    <link rel="stylesheet" href="assets/build/mediaelementplayer.min.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="assets/css/slide-in.css" />
	<!--[if lt IE 9]><link rel="stylesheet" type="text/css" media="screen" href="assets/css/slide-in.ie.css" /><![endif]-->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Color Style Setting CSS file-->
    <link href="assets/css/color-green.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
   
</head>

<body>

<!-- Head
================================================== -->
<?php include('../application/views/layouts/partials/head.html');?>
<!-- Logo / Menu
================================================== -->
<?php include('../application/views/layouts/partials/header.html');?>
<?php //include('../application/views/layouts/partials/slider.html');?>
<div class="container">
	<?php include('../application/views/layouts/partials/container.html');?>
 </div>
<!-- Footer
================================================== -->
<?php include('../application/views/layouts/partials/footer.html');?> 

<!-- JavaScript files begin-->
<!-- Placed at the end of the document so the pages load faster -->
<?php include('../application/views/layouts/partials/js.html');?>
  </body>
</html>
