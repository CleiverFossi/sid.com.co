<? 
	session_start(); 
	if ( !isset ( $_SESSION['nombre'] ) ) {
		?>
	<script type="text/javascript"> 
	window.location="inicio.php"; 
	</script> 
		<?
	} else {

	session_start(); 
	if ( isset($_SESSION['nombre']) or !empty($_SESSION['nombre']) ) {
			$usuario=$_SESSION['nombre'];
	}
?>
<script type="text/javascript">
function ValidaMail(mail) {
var exr = /^[0-9a-z_\-\.]+@[0-9a-z\-\.]+\.[a-z]{2,4}$/i;
return exr.test(mail);
}

function Validar(f) {

if (f.email.value=='' || !ValidaMail( f.email.value)) {

    alert("Por favor escriba un Correo correcto");

    f.email.focus();

    return (false);
}
}
 </script>
<div  class="encabe">
<form id="form2" name="form2" method="post" action="cerrar.php">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
<tr>
<td align="right" valign="top"><span >Bienvenido</span> <span class="label"> <? echo $usuario;?> </span>
<input name="Submit" type="submit" class="campos" value="Cerrar Sesion" /></td>
     </tr>
     </table>
    </form>
         
       
             <?	include("pro_one.html");?>
</div> 
 
<div  class='centrar' style="width:960px; ">
 <center>
<h2>Invitar Usuario</h2>

<br/>
<form name="conta"   method="post" action="enviarinvitacion.php" onSubmit="return Validar(this);">

<label for="email">Correo:<br>
<input id="email" name="email" type="text" size="31"> </label><br><br>
    <input type="submit" name="submit" value="  Enviar Mensaje  " /></center>
</form>
</form>
<br/>
</div>

<div  class='centrar' style="width:960px; ">
 <center>
<h2>Usuarios</h2>



<form name="form1"   method="post" enctype="multipart/form-data"  action="agregarP.php">


<select name="producto"   onchange="ption()" >
                    <?
						include_once('conectar.php');
						$sql = mysql_query('SELECT * FROM usuario where cod<>0 ORDER BY nombre');
						while($row = mysql_fetch_array($sql)){
							
							$seleccionado='';
							
	$seleccionado='selected="selected"';
							echo '<option value="'.$row['correo'].'" '.$seleccionado.'>'.$row['last_login'].' - '.$row['nombre'].' - '.$row['correo'].'</option>';
						
							
						}
					?>
                    </select><br><br>


<br/>
</div>


            
            
  <?	   
}
?>