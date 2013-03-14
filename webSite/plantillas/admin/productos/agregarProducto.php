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
<title>Agragar Producto</title>
<!-- Inicio enlace al archivo de validaciÃƒÆ’Ã‚Â³n -->

<!-- Fin enlace al archivo de validaciÃƒÆ’Ã‚Â³n -->

<script type="text/JavaScript">
function ption()
	{
			//alert(form1.estilo.options);
			
			document.form1.target='null'; 
	  		document.form1.action='buscar.php';
	  		document.form1.agregar.value=" Editar ";
			
			alert(document.form1.producto.options[document.form1.producto.selectedIndex].text);
	}
</script>
</head>
<body >
<div class="centrar"  >

<!-- Inicio Formulario de Contacto por Dasumo-->

<h2>Agragar Producto</h2> 
<form name="form1"   method="post" enctype="multipart/form-data"  action="agregarP.php">


<select name="producto"   onchange="ption()" >
				<option value="0">SELECCIONE ...</option>
                    <?
						include_once('conectar.php');
						$sql = mysql_query('SELECT * FROM Productos	 WHERE cod<>0 ORDER BY cod');
						while($row = mysql_fetch_array($sql)){
							$seleccionado='';
							if($id_empleado==$row['id_empleado'])
								$seleccionado='selected="selected"';
							echo '<option value="'.$row['id_empleado'].'" '.$seleccionado.'>'.$row['cod'].'-'.$row['nombre'].'</option>';
						}
					?>
                    </select><br><br>


    <label for="name">Nombre<br>
    <input style="text-transform:uppercase" id="name" name="name" type="text" size="50"> </label><br><br>
    
    <label for="tipo">Tipo<br>
    <input style="text-transform:uppercase" id="tipo" name="tipo" type="text" size="50"> </label><br><br>
    
    <label for="costo">Costo<br>
    <input style="text-transform:uppercase" id="costo" name="costo" type="text" size="50"> </label><br><br>
    
    <label for="img">Imagen<br>
    <input name="archivo" type="file" size="53" />
 
  <input name="action" type="hidden" value="upload" />   
    
  
    </label><br><br>
    <label  for="Descripcion">Descripcion: <br>
    <textarea style="text-transform:uppercase" name="Descripcion" id="Descripcion" rows="5" cols="40"></textarea>
    </label><br><br>
    <center>
    <input type="submit" name="agregar" value="  Agregar Producto  " />
        </center>
</form>




<!-- Fin Formulario de contacto -->

</div>
</body>
</html>
  <?	   
}
?>