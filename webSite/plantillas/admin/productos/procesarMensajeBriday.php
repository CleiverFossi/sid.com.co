<?php

	$op=$_GET["op"];
	
	if($op==1){
		
		$men=$_POST['mensage'];
		include("conectar.php");
		mysql_query("INSERT INTO `MensajesBriday` (Mensaje) values ('".$men."')");
		
		?><script type="text/javascript"> 
		   alert("Regsitro Exitoso");
			window.location="birthdayGui.php"; 
			</script> <?
		
	}else if($op==2){
		$id=$_POST['Mensajes'];
		$men=$_POST['mensage'];
		include("conectar.php");
		$sql = mysql_query("DELETE FROM MensajesBriday WHERE id='".$id."'");
			?><script type="text/javascript"> 
		   alert("Regsitro Eliminado Exitosamente");
			window.location="birthdayGui.php"; 
			</script> <?
	
	}else if($op==3){
		$id=$_POST['Mensajes'];
		$men=$_POST['mensage'];
		
		include("conectar.php");
		$sql = mysql_query("UPDATE MensajesBriday SET  Mensaje = '".$men."' WHERE id='".$id."'");
		
		?><script type="text/javascript"> 
		    alert("Actulizacion Exitosa");
			window.location="birthdayGui.php"; 
			</script> <?

	}else{
	
	
	
	

	$ID=$_GET["opcion"];/*$cedulaFamiliar=$_GET["opcion"];*/
	$campo= $_GET["select"];
	
	$descripcion="mensage";
	

	
	include("conectar.php");
	$consulta =mysql_query("SELECT * FROM MensajesBriday WHERE id='$ID'");
	$row = mysql_fetch_array($consulta);
	
			if($campo=="mensage")
			{
				$registros= $row['Mensaje'];
				echo '<label for="mensage">Mensaje <br /><textarea name="mensage" id="mensage" rows="5" cols="40" nFocus="cambio()">'.$registros.'</textarea></label>';
				
			}
			
	}
?>