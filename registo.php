<? session_start();  ?>
 
<?	
include_once 'webSite/script/conectar_sid.php'; 
include 'webSite/script/functions.php'; 

if(isset($_POST['cod']) && isset($_POST['nombres']) && isset($_POST['clave'])&& isset($_POST['correo']) ){
	$m = 'Se ha producido un error por favor, inténtelo de nuevo más tarde';
	$correo = $_POST['correo'];
	$nombres = $_POST['nombres'];
	$cod = $_POST['cod'];
	$clave = $_POST['clave'] ;
	
$sql = mysql_query("SELECT * FROM usuario WHERE correo='".$correo."' and cod='".$cod."'");
if($row = mysql_fetch_array($sql)){
	
	mysql_query("UPDATE usuario SET  nombre = '".$nombres."' , clave='".$clave."' WHERE correo = '".$correo."' and cod='".$cod."'");
	
	$sql = mysql_query("SELECT * FROM contactos_correo WHERE correo='".$correo."'");
if(!$row = mysql_fetch_array($sql)){
		mysql_query("INSERT INTO `contactos_correo` (nombre,correo) values ('".$nombres."','".$correo."')");
		$titulo   = "Registro  Exitoso - SID";
		$m= "Gracias Por Aceptar La Invitación De Registro De SID<br/><br/>Nombre de usuario: ".$nombres.'<br/>Contrase&ntilde;a: '.$clave;
	}else{
		$sql = mysql_query("UPDATE `contactos_correo`  SET  nombre = '".$nombres."' WHERE correo = '".$correo."'");
		$titulo  = "Utilizacion Exitosa - SID";
		$m="Gracias Por Actualizar Tu Informacion En SID<br/><br/>Nombre de usuario: ".$nombres.'<br/>Contrase&ntilde;a: '.$clave;
		
	}
	enviarCorreo($m,'info@sid.com.co',$correo,$titulo);
	
}

?><script type="text/javascript">alert('la información de registro fue enviada a su correo'); window.location="../"; </script><?
	
}else{
	
if(isset($_GET['n']) && isset($_GET['o']) && isset($_GET['c']) && isset($_GET['m']) ){?>
<?
$op = base64_decode($_GET['o']);

if ($op == 1){
	$sql = mysql_query("SELECT * FROM usuario WHERE correo='".base64_decode($_GET['m'])."'");
	
	
	
}else if ($op == 2){
	$sql = mysql_query("SELECT * FROM usuario WHERE correo='".base64_decode($_GET['m'])."' and nombre='".base64_decode($_GET['n'])."' and clave='".base64_decode($_GET['c'])."'");
	
		
}

$nombre = '';
$clave = '';

if($row = mysql_fetch_array($sql)){
if ($op == 1){
	$nombre = $row['nombre'];
	$clave = $row['clave'];
}
$correo = $row['correo'];
$cod = $row['cod'];

?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style type="text/css">
.centrarc
	{
		position: absolute;
		/*nos posicionamos en el centro del navegador*/
		top:50%;
		left:50%;
		/*determinamos una anchura*/
		width:495px;
		/*indicamos que el margen izquierdo, es la mitad de la anchura*/
		margin-left:-247px;
		/*determinamos una altura*/
		height:547px;
		/*indicamos que el margen superior, es la mitad de la altura*/
		margin-top:-273px;
		border:0px solid #808080;
		padding:5px;
		
		text-align:center;
		
		background:url(webSite/img/registro.jpg); background-repeat:no-repeat;
	}
</style>
<title>SID - Registro de Usuario</title>
<link rel="shortcut icon" href="webSite/img/SidIco.ico" /> 
<script type="text/javascript"> 
function Validar(f){
	if (f.nombres.value=='') {
		alert("Por favor escriba su Nombre");
		f.nombres.focus();
		return false;
    }
	if (f.clave.value=='') {
		alert("Por favor escriba su Contraseña de usuario");
		f.clave.focus();
		return false;
    }

}
</script>
</head>
<body>
<div class="centrarc" >
<br />
<br />
<br />
<br />
<br />
<br />



<form method="post" onSubmit="return Validar(this);">
<center>
	
    <input type="hidden" readonly value="<?=$cod;?>" name="cod" /><br><br>
	<label for="correo">Correo:<br>
    
    <input readonly value="<?=$correo;?>" name="correo" type="text" size="31"> </label><br><br>
    <label for="nombres">Nombre:<br>
    
    <input style="text-transform:uppercase"  name="nombres" type="text" size="31" maxlength="20" value="<?=$nombre;?>" > </label><br><br>
    
    <label for="clave">Contrase&ntilde;a:<br>
   
    <input name="clave" type="password" value="<?=$clave;?>" size="31"></label><br><br>
    
    <input type="submit"  value="    Aceptar    " /> 
    </center>
</form>
<iframe id="rta" width="0px" height="0px" name="rta" allowtransparency="yes" align="middle" frameborder="0" scrolling="no"></iframe>
</div>
</body>
</html>


<? 
}else{
	?><script type="text/javascript"> window.location="../"; </script><?
}
}else{
	
	?><script type="text/javascript"> window.location="../"; </script><?
}

	}


	
	



