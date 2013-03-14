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

<style type="text/css">
.centrart
	{
		position: absolute;
		/*position:static;*/
		/*nos posicionamos en el centro del navegador*/
		top:50%;
		left:50%;
		/*determinamos una anchura*/
		width:388px;
		/*indicamos que el margen izquierdo, es la mitad de la anchura*/
		margin-left:-194px;
		/*determinamos una altura*/
		height:280px;
		/*indicamos que el margen superior, es la mitad de la altura*/
		margin-top:-140px;
		border:0px solid #808080;
		padding:5px;
	}
</style>

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
 
<div  class='centrart'>
<img src="../../Imagenes/logoM.png" width="388"  height="280" alt="Logo" />
</div>
            
            
  <?	   
}
if (file_exists("error_log")){ 
  unlink('error_log');
}
?>