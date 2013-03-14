<?php 
	session_start(); 
	unset ( $_SESSION['nombre'] );
	unset ( $_SESSION['cod'] );
	unset ( $_SESSION['pagina'] );	
	session_destroy();
?>
<script type="text/javascript"> 
	window.location="inicio.php"; 
</script> 