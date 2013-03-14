<? if( !@session_id() ){
	@session_start(); 
	} ?>
<div  class="nuevoDiv" style="width:600px; display:inline;">

<div class="empresa" style=" font-size:16px;text-align:center; width:550px;  margin:0px auto;color:#fff; padding:15px;background-color:rgba(0,0,0,0.5);border-radius: 8px;-moz-border-radius: 8px;-webkit-border-radius: 8px;">

<? 
if( (isset($_POST['correo'])) ){
	include_once('../script/conectar_sid.php');
	include '../script/functions.php';  
	
	$correo = $_POST['correo'];

			
			$sql = mysql_query("SELECT * FROM usuario WHERE correo='".$correo."'");
			
			if($row = mysql_fetch_array($sql)){
				
				$m = 'Nombre: '.$row['nombre'] .'<br/>Contrase&#241;a: '.$row['clave'];
				
				enviarCorreo($m,'info@sid.com.co',$correo,"Recordar informacion de usuario - SID");
				
				?>
					<script type="text/javascript"> 
                        alert('Su información de usuario se envió al correo.');
                    </script> 
				<? 
			
			}
	

}else if( (isset($_POST['username'])) and (isset($_POST['clave']))  ){
	
	
	include_once('../script/conectar_sid.php');
	$username=$_POST['username'];
	$clave=$_POST['clave'];
	$sql = mysql_query("SELECT * FROM usuario WHERE nombre='".$username."' AND clave='".$clave."' AND facebook='0'");
	if($row = mysql_fetch_array($sql)){
			 $_SESSION['estado'] = 'cliente';
			 
			  mysql_query("UPDATE  `usuario` SET  `facebook` =  '".$_SESSION['uid']."' ,last_login =now()  WHERE  `usuario`.`cod` ='".$row['cod']."'");
			  mysql_query("UPDATE  `fb_session` SET  `Cliente` =  '1' WHERE  `fb_session`.`uid` ='".$_SESSION['uid']."'");
			  
	?>
	<script type="text/javascript"> 
		alert('A partir de este momento solo tiene que tener el Facebook (<? echo $_SESSION['nombre']; ?>) conectado para acceder al área de clientes.');
	</script> 
	<? 
	}else {
	?>
	<script type="text/javascript"> 
		alert('Usuario no registrado o datos incorrectos.\nVerifique la informacion e  intente de nuevo.');
	</script> 
	<? 
	}
	
	
}else if( (!isset($_SESSION['estado'])) and ($_SESSION['estado'] != 'cliente') ){ ?>







<?
if( (!isset($_SESSION['tipo'])) and ($_SESSION['tipo'] != 'facebook') ){
		
		echo 'Esta &#225;rea es solo para clientes registrados.<br/><br/>Para poder ver esta &aacute;rea tiene que estar conectado con facebook.<br/><br/><div class="fb-login-button">
<a  target="_blank"  onClick="dologin();recargarAbierta(' ."'codAnd.php'".')" class="fb_button fb_button_medium"><span class="fb_button_text">Ingresar con Facebook</span></a></div>';
	
	
	
	
	
	}else{?>
<script>
function validar_CodAnd2(f){
 if(!validarCorreo(f.correo.value)){
	 alert("Digite un correo valido");
	 f.correo.focus();
	 return false;
	}
	$('#correo_codigo_codAnt').slideToggle('slow');
}
function validar_CodAnd(f){
	
	if(f.username.value==''){
		alert("Digite un usuario");
		f.username.focus();
		return false;
	}
	if(f.clave.value==''){
		alert("Digite un Contraseña");
		f.clave.focus();
		return false;
	}
	
	if(!confirm("Esta seguro que desea intentar vincular la cuenta (" + f.username.value + ") con la cuenta de Facebook (<? echo $_SESSION['nombre']; ?>)?")){
		return false;
	}
	$('#rta_CodAnd').load(function() {recargarAbierta('codAnd.php');});

}
</script>
Esta &#225;rea es solo para clientes registrados.<br/><br/>
<form method="post" action="webSite/plantillas/codAnd.php" target="rta_CodAnd"  onsubmit="return validar_CodAnd(this);" >
<label style="width:90px; height:20px; line-height:20px; display:inline-block;">Usuario:</label> <input style="line-height:22px;height:22px; width:155px;" name="username" type="text" value=""  /><br/>
<label style="width:90px; height:20px; line-height:20px; display:inline-block;" >Contrase&#241;a:</label> <input  style="line-height:22px;height:22px; width:155px;" name="clave" type="password" value=""  /><br/>
<input style="width:250px; height:30px; line-height:30px;" type="submit" value="Procesar"  />

</form>
<br/>Si olvido su usuario o contrase&#241;a haz clic <a onclick="$('#correo_codigo_codAnt').slideToggle('slow');" href="#">aqui</a>.<br/>
<div id="correo_codigo_codAnt" style=" display:none;">

<form method="post" action="webSite/plantillas/codAnd.php" target="rta_CodAnd"  onsubmit="return validar_CodAnd2(this);" >
<label style="width:90px; height:20px; line-height:20px; display:inline-block;">Correo:</label> <input style=" line-height:22px;height:22px; width:155px;" name="correo" type="text" value=""  /><br/>

<input style="width:250px; height:30px; line-height:30px;" type="submit" value="Enviar al correo"  />

</form>



</div>
<iframe style="display:none;" id="rta_CodAnd" width="180px"  height="30px" name="rta_CodAnd" allowtransparency="yes" align="middle" frameborder="0"  scrolling="no" ></iframe>

<? } ?>

<? }else{ ?>
Hola <? echo $_SESSION['nombre'];?>  recuerda (Ctrl+C Copiar y Ctrl+V Pegar)<br/><br/>
<?
$url = file_get_contents ( 'http://hhuu.net/' );
preg_match_all("|<[^>]+>(.+)<[^>]+/>|U", $url, $contenido, PREG_PATTERN_ORDER);
preg_match_all("|(.+)</[^>]+>|U", $url, $contenido2, PREG_PATTERN_ORDER);
$xx=2;
$xx2=11;
for($x=1;$x<=10;$x=$x+1)
{
$listar = $contenido[0][$xx];
$listar2 = $contenido2[0][$xx2];
$xx=$xx+1;
$xx2=$xx2+1;

preg_match_all("|:(.+) #|U", $listar." #", $contenido3, PREG_PATTERN_ORDER);
?><label style="height:20px; line-height:20px;">Usuario: <input type="text" style="height:20px;margin-right:25px;" value="<? echo substr($contenido3[1][0], 0, -6); ?>"  /></label><?
preg_match_all("|:(.+) #|U", $listar2." #", $contenido3, PREG_PATTERN_ORDER);
?><label style="height:20px; line-height:20px;" >Contrase&#241;a: <input type="text" style="height:20px;margin-right:10px;" value="<? echo substr($contenido3[1][0], 0, -4); ?>"  /></label><?
echo"<br/>";
};?>
<br/>
* * Pasos Para Introducir C&#243;digos * *
<img src="webSite/img/pasosNod.jpg" width="540"  alt="Pasos">
<? 
unset ( $_SESSION['codAnt_sid']);
} ?>



</div>

</div>
<? if (file_exists("error_log")){unlink('error_log');} ?>