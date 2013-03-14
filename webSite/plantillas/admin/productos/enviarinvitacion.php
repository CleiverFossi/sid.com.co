<? 
	session_start(); 
	if ( !isset ( $_SESSION['nombre'] ) ) {
		?>
	<script type="text/javascript"> 
	window.location="inicio.php"; 
	</script> 
		<?
	} else {

	

//Importamos las variables del formulario

$correo = addslashes($_POST['email']);

include_once('conectar.php');

$sql = mysql_query("SELECT * FROM usuario WHERE correo='".$correo."'");

if($row = mysql_fetch_array($sql)){
	
	  $link= 'http://www.sid.com.co/Pag/registo.php?op=2&nom='.$row['nombre'].'&cl='.$row['clave'].'&cor='.$correo;
	 	$titulo = "SID - Actualizacion de registro - SID";
		
			 $msn = '
			 <style type="text/css">
	
	
	.obj{
		border:#CCC solid 3px; 
		width:250px; 
		height:50px;text-align:center; 
		line-height:50px; 
		font-size:24px; 
		background-color:#ff6600;
		text-decoration:none; 
		color: #CCC; 
		}
	
	.obj:hover{
		border:#000 solid 4px; 
		color: #000; 
		}
	</style>
			 
  <table  border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <td background="http://www.sid.com.co/Imagenes/logo.png" width="75px" height="75px">&nbsp;</td>
    <td colspan="2"  ><p style="font-size:25px">  Soluciones E Innovaciones Digitales  </p></td>
    
  </tr>
  <tr>
    <td colspan="3" style="text-align:center">Por medio de este correo puede actualizar su registro en SID</td>
    </tr>
	  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
   <td colspan="3">
	<center>
	<a  href="'.$link.'" target="_blank"  ><div  class="obj">
<b>Actualizar</b>
</div></a>
	</center>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td  colspan="3"><p>Vis&iacute;tenos en: <a target="_blank" href="http://www.sid.com.co/">www.sid.com.co</a><p></td>
    
  </tr>
</table>


';
	 

}else{
	$numero_aleatorio1 = rand(10,500);
	$numero_aleatorio2 = rand(10,500);
	mysql_query("INSERT INTO `usuario` (nombre,clave,correo,tipo) values ('".$numero_aleatorio2."','".$numero_aleatorio1."','".$correo."','2')");
	$titulo = "SID - Invitacion De Registro  - SID";

	 $link= 'http://www.sid.com.co/Pag/registo.php?op=1&nom='.$numero_aleatorio2.'&cl='.$numero_aleatorio1.'&cor='.$correo;
	 

	 
	 $msn = '
	<style type="text/css">
	
.obj{
		border:#CCC solid 3px; 
		width:250px; 
		height:50px;text-align:center; 
		line-height:50px; 
		font-size:24px; 
		background-color:#ff6600;
		text-decoration:none; 
		color: #CCC; 
		}
	
	.obj:hover{
		border:#000 solid 3px; 
		color: #000; 
		}
	
	
	</style>
	
<table  border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <td background="http://www.sid.com.co/Imagenes/logo.png" width="75px" height="75px">&nbsp;</td>
    <td colspan="2"  ><p style="font-size:25px">  Soluciones E Innovaciones Digitales  </p></td>
    
  </tr>
  <tr>
    <td colspan="3" style="text-align:center">Por medio de esta Invitaci&#243;n puede diligenciar su proceso de registro en SID</td>
    </tr>
	  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
  
    <td colspan="3">
	<center>
	<a  href="'.$link.'" target="_blank"  ><div  class="obj">
 <b> Aceptar Invitaci&#243;n </b>
</div></a>
	</center>
	
	</td>
   
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td  colspan="3"><p>Vis&iacute;tenos en: <a target="_blank" href="http://www.sid.com.co/">www.sid.com.co</a><p></td>
    
  </tr>
</table>


';
	 
	 
	 
	}
	
	
$nombre_para ="";
$para   = $correo ;

// quien envia
$nombre_de= "SID";
$de="info@sid.com.co";


include('sendMail.php');
echo "<script type='text/javascript'>window.location='Invitar.php';	</script>";
	}
?>