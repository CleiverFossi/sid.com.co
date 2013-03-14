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
	
	function cargarMensages()
{
	include("conectar.php");
	$consulta = mysql_query("SELECT * FROM MensajesBriday");
	if($row = mysql_fetch_array($consulta)){
		do{
	echo "<option value=".$row['id'].">".$row['Mensaje']."</option>";
		}while($row = mysql_fetch_assoc($consulta));
	}
}
	
	
	
?>
<style type="text/css">
.centrar
	{
		/*position: absolute;*/
		position:static;
		/*nos posicionamos en el centro del navegador*/
		top:50%;
		left:50%;
		/*determinamos una anchura*/
		width:400px;
		/*indicamos que el margen izquierdo, es la mitad de la anchura*/
		margin-left:-200px;
		/*determinamos una altura*/
		height:550px;
		/*indicamos que el margen superior, es la mitad de la altura*/
		margin-top:-275px;
		border:0px solid #808080;
		padding:5px;
	}
</style>
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
<title>Birthday</title>
<!-- Inicio enlace al archivo de validaciÃƒÆ’Ã‚Â³n -->

<!-- Fin enlace al archivo de validaciÃƒÆ’Ã‚Â³n -->
<script src="procesarMensajeBriday.js"></script>
<script type="text/JavaScript">
function option(f){
if(document.form1.Mensajes.options[document.form1.Mensajes.selectedIndex].text!="Seleccione"){
	document.form1.action='procesarMensajeBriday.php?op=2';
	 document.form1.boton.value="Eliminar";

	llenarDatos(f);
	document.form1.boton.focus();
	
	}else{
	
	 
	document.form1.action='procesarMensajeBriday.php?op=1';
	  	document.form1.boton.value="Registrar";
		document.form1.mensage.value="";
		document.form1.mensage.focus();
	}
}
function cambio(){
	if(document.form1.Mensajes.options[document.form1.Mensajes.selectedIndex].text!="Seleccione"){
	document.form1.action='procesarMensajeBriday.php?op=3';
	  	document.form1.boton.value="Actulizar";
	}}

</script>
</head>
<body >

<div style="float:left; border-right:dashed; border-bottom:dashed">
<?php 
include_once('conectar.php');

$sql = mysql_query("SELECT * FROM birthday ORDER BY fecha DESC LIMIT 12  ");
        ?><br /> <table   border="0"><?
while($row = mysql_fetch_array($sql)){
	?> 
    <tr>
    <td><a  target="_blank" href="http://www.facebook.com/profile.php?id=<?php echo $row['uid']; ?>" style="margin:5px;">
    		<img src="http://graph.facebook.com/<?php echo $row['uid']; ?>/picture" alt="Photo">
    	</a></td>
    <td><?php echo $row['fecha']; ?></td>
  </tr>
 	<?
}
?></table><?
?>
</div>

<div style="float:left; text-align:center; width:85%;">
<br>

<form  name="form1" action="procesarMensajeBriday.php?op=1" method="post">
 <div class="etiquetaRegistro">
        		<label>Mensajes : </label>
       	  </div>
<div class="campoRegistro">
        		<?php
                    echo "<select name='Mensajes' id='Mensajes'  onchange=option(this.id) >";
		            echo '<option value="0">Seleccione</option>';
					cargarMensages();
                    echo '</select>';

				?>
        	</div>
<label for="mensage">Mensaje <br />
<textarea name="mensage" id="mensage" rows="5" cols="40" onFocus="cambio()"></textarea>
</label><br />
<input  type="submit" name="boton" value=" Aceptar "  onBlur="cambio()"  />
</form>


</div>

					<?php 
					
					
					
					
					?>

</body>
</html>
  <?	   
}
?>