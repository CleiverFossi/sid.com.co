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
<div  style="background-color:#ff6600; ">
<form id="form2" name="form2" method="post" action="cerrar.php">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
<tr>
<td align="right" valign="top"><span class="Estilo4">Bienvenido</span> <span class="label"> <? echo $usuario;?> </span>
<input name="Submit" type="submit" class="campos" value="Cerrar Sesion" /></td>
     </tr>
     </table>
    </form>
         
       
             <?	include("pro_one.html");?>
</div>  
<html>
<head>
<title>Formulario de Contacto en PHP por Dasumo</title>
<!-- Inicio enlace al archivo de validaciÃƒÆ’Ã‚Â³n -->

<!-- Fin enlace al archivo de validaciÃƒÆ’Ã‚Â³n -->
</head>
<body>
 <center>
<h2>Envio a facebook</h2> 



<table width="1000" border="1">
  <tr>
    <td>
    <!-- Inicio Formulario de Contacto por Dasumo-->
<div >
<form name="conta"   method="post" action="send.php" onSubmit="true">
    
    <label for="descriptionxx">Descripción:<br>
    <input id="descriptionxx" name="descriptionxx" type="text" size="31"> </label><br><br>
    
    <label for="captionxx">Caption:<br>
    <input id="captionxx" name="captionxx" type="text" size="31"> </label><br><br>
        
    <label for="namexx">Nombre:<br>
    <input id="namexx" name="namexx" type="text" size="31"></label><br><br>
    
    <label for="picturexxx">Pintura url:<br>
    <input id="picturexxx" name="picturexxx" type="text" size="31"></label><br><br>
    
    <label for="urlxxx">url:<br>
    <input id="urlxxx" name="urlxxx" type="text" size="31"></label><br><br>
    
    <label for="messagexx">Mensaje: <br>
    <textarea name="messagexx" id="messagexx" rows="5" cols="25"></textarea></label><br><br>
    
    <center><input type="submit" name="submit" value="  Enviar Mensaje  " /></center>
</form>
</div>
<!-- Fin Formulario de contacto -->    
    </td>
    <td>
    <img src="ejemplo.png" width="736" height="249" alt="ejemplo"><br>
    
    </td>
  </tr>
</table>
</center>

</body>
</html>
            
  <?	   
}
?>