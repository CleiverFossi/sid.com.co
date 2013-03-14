<?php
	$status = "";

    // obtenemos los datos del archivo
    $tamano = $_FILES["archivo"]['size'];
    $tipo = $_FILES["archivo"]['type'];
    $archivo = $_FILES["archivo"]['name'];
    $prefijo = substr(md5(uniqid(rand())),0,6);
	//echo $tamano." - " .$tipo." - ".$archivo." - ".$prefijo."<br />";
   
    if ($archivo != "") {
        // guardamos el archivo a la carpeta files
        $destino =  "../../imgP/".$prefijo."_".$archivo;
        if (copy($_FILES['archivo']['tmp_name'],$destino)) {
            $status = "Archivo subido: <b>".$archivo."</b>";
        } else {
           $status = "Error al subir el archivo";  
		   ?><script type="text/javascript"> 
		   alert(<?php echo $status ?>);
	window.location="agregarProducto.php"; 
	</script> <?php
        }
    } else {
        $status = "Error al subir archivo";
		?><script type="text/javascript"> 
		   alert(<?php echo $status ?>);
	window.location="agregarProducto.php"; 
	</script> <?php
    }



//Importamos las variables del formulario
include_once('conectar.php');
@$name = addslashes($_POST['name']);
$name = strtoupper($name); 
@$tipo = addslashes($_POST['tipo']);
$tipo = strtoupper($tipo); 
@$costo = addslashes($_POST['costo']);
@$Descripcion = addslashes($_POST['Descripcion']);
$Descripcion = strtoupper($Descripcion); 
//echo $name." - ".$tipo." - ".$costo." - ".$Descripcion. "<br />".$status ;

mysql_query("INSERT INTO `Productos` (nombre,tipo,costo,descripcion,img) values ('".$name."','".$tipo."','".$costo."','".$Descripcion."','".$prefijo."_".$archivo."')");


?>

	<script type="text/javascript"> 
	window.location="agregarProducto.php"; 
	</script> 
	