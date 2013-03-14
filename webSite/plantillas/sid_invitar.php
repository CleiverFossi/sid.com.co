<? @session_start(); 
if (isset($_SESSION['uid']) && $_SESSION['uid']=='816237496'){ ?>

<? if (isset($_POST['correo'])){ 

$correo = $_POST['correo'];

include_once '../script/conectar_sid.php'; 
include '../script/functions.php'; 

$sql = mysql_query("SELECT * FROM usuario WHERE correo='".$correo."'");
if($row = mysql_fetch_array($sql)){
 
 $link= 'http://sid.com.co/registo.php?o='.base64_encode('1').'&n='.base64_encode($row['nombre']).'&c='.base64_encode($row['clave']).'&m='.base64_encode($correo);
 
$m = 'Por medio de este correo puede actualizar su registro en SID<br/>';
$m.='<a  href="'.$link.'" target="_blank"  >Actualizar</a>';				
enviarCorreo($m,'info@sid.com.co',$correo,"Recordar informacion de usuario - SID");
?><script>alert('el usuario ya existe y se le a enviado la informacion al correo de nuevo');</script><?
	
}else{
	
$numero_nombre = rand(10,5000);
$numero_clave = rand(10,5000);
	
mysql_query("INSERT INTO `usuario` (nombre,clave,correo,tipo) values ('".$numero_nombre."','".$numero_clave."','".$correo."','2')");
	
$link= 'http://sid.com.co/registo.php?o='.base64_encode('2').'&n='.base64_encode($numero_nombre).'&c='.base64_encode($numero_clave).'&m='.base64_encode($correo);

$m = 'Por medio de esta Invitaci&#243;n puede diligenciar su proceso de registro en SID<br/>';
$m.='<a  href="'.$link.'" target="_blank"  >Aceptar Invitaci&#243;n</a>';

enviarCorreo($m,'info@sid.com.co',$correo,"Invitacion De Registro - SID");

?><script>alert('Invitacion enviada a "<?=$correo?>"');</script><?


}



}else{

?>
<div  class="nuevoDiv" style="width:550px; display:inline;  ">

<script>
function ValidaMail(mail) {
	var exr = /^[0-9a-z_\-\.]+@[0-9a-z\-\.]+\.[a-z]{2,4}$/i;
	return exr.test(mail);
}

function Validar_inv(f) {

if (f.correo.value=='' || !ValidaMail( f.correo.value)) {

    alert("Por favor escriba un Correo correcto");

    f.correo.focus();

    return (false);
}
}
</script>
<div class="admin_invitar" style=" font-size:16px;text-align:justify; width:500px; margin:0px auto;color:#000; padding:15px; background-image:url(webSite/img/loguitosFondo.png); background-color:#FFF;border-radius: 8px;-moz-border-radius: 8px;-webkit-border-radius: 8px;">




<h2>Invitar Usuario</h2>

<br/>
<form method="post" target="admin_invitar_rta" action="webSite/plantillas/sid_invitar.php" onSubmit="return Validar_inv(this);">

<label>Correo: </label> <input  name="correo" type="text" /> <br>
<input type="submit" value="  Enviar Mensaje  " />

</form>
<br/>




<h2>Usuarios</h2>






<select name="producto" >
                    <?
						include_once '../script/conectar_sid.php'; 
						$sql = mysql_query('SELECT * FROM usuario where cod<>0 ORDER BY nombre');
						while($row = mysql_fetch_array($sql)){
							
							$seleccionado='';
							
	$seleccionado='selected="selected"';
							echo '<option value="'.$row['correo'].'" '.$seleccionado.'>'.$row['last_login'].' - '.$row['nombre'].' - '.$row['correo'].'</option>';
						
							
						}
					?>
                    </select>



<iframe id="admin_invitar_rta" width="0px" height="0px" name="admin_invitar_rta" allowtransparency="yes" align="middle" frameborder="0" scrolling="no"></iframe>
</div></div><? }?>

<? } ?>
