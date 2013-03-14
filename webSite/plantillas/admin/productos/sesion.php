<?
	include_once('conectar.php');
	$username=$_POST['username'];
	$clave=$_POST['clave'];
	$sql = mysql_query("SELECT * FROM usuario WHERE nombre='".$username."' AND clave='".$clave."'");
	if($row = mysql_fetch_array($sql)){
			session_start(); 
			$_SESSION['cod'] = $row['cod'];	
			
			if($row['tipo']==1){
			$_SESSION['nombre'] = $row['nombre'];
			$_SESSION['pagina'] = "indexAdmin.php"; 
						
			?>
				<script type="text/javascript"> 
					window.location="indexAdmin.php"; 
				</script> 
			<?		
			}
			if($row['tipo']==2){
			$_SESSION['pagina'] = "index.php"; 	
			
			?>
				<script type="text/javascript"> 
					window.location="../"; 
				</script> 
			<?		
			}
	} 
	else {
	?>
	<script type="text/javascript"> 
		alert('Usuario no registrado o datos incorrectos.\nVerifique la información e  intente de nuevo.');
		window.location="inicio.php"; 
	</script> 
	<?
	}
?>
