<?php session_start();
include_once 'conectar_sid.php'; 

$uid=$_POST['uid'];
$access_token = $_POST['access_token'];
$ano = $_POST['ano'];
$dia=$_POST['dia'];
$mes=$_POST['mes'];
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];

$birthday = $ano.'-'.$mes.'-'.$dia;



$sql = mysql_query("SELECT * FROM fb_session WHERE uid='".$uid."'");
	if($row = mysql_fetch_array($sql)){
		
		if($row['Cliente']=='1'){ $_SESSION['estado'] = 'cliente'; }else{unset ( $_SESSION['estado']);}
		
		$sql = mysql_query("UPDATE fb_session SET  access_token = '".$access_token."', birthday = '".$birthday."',Dia = '".$dia."',Mes = '".$mes."',last_login =now() WHERE uid='".$uid."'");
		
	}else{
	
		$sql = mysql_query( "INSERT INTO  `sidcom_database`.`fb_session` (`uid` ,`access_token` ,`birthday` ,`last_login` ,`Dia` ,`Mes`)
VALUES ('".$uid."',  '".$access_token."',  '".$birthday."',  NOW(),  '".$dia."',  '".$mes."')" );
		
		
		$data = array(
			"access_token" => $access_token,
			"link" => 'https://www.facebook.com/dialog/oauth?client_id=147927995290586&redirect_uri=http%3A%2F%2Fsid.com.co%2F&state=97481fdd03c08638d661d84027aa112f&scope=email%2Cuser_birthday%2Cpublish_stream%2Coffline_access',
			"name" => "SID - Soluciones E Innovaciones Digitales",
			"description" => "Al suscribirte estarás al tanto de nuestros desarrollos y avances",
			"caption" => "Profesionales En El Desarrollo En Software Y Sistemas Web A La Medida",
			"picture" => "http://www.sid.com.co/webSite/img/logoM.png"
		);
		
	require  'gfacebook.php';
	$GraphFacebook_post		=	new GraphFacebook( $uid, $data );
	$GraphFacebook_post->Publish( );


	}
		
		

	$sql = mysql_query("SELECT * FROM contactos_correo WHERE correo='".$correo."'");
	if($row = mysql_fetch_array($sql)){
		$sql = mysql_query("UPDATE contactos_correo SET  nombre = '".$nombre."' WHERE correo = '".$correo."'");
	} 
	else {
		mysql_query("INSERT INTO `contactos_correo` (nombre,correo) values ('".$nombre."','".$correo."')");
	}
$_SESSION['uid'] = $uid;
$_SESSION['nombre'] = $nombre;
$_SESSION['correo'] = $correo;
$_SESSION['tipo'] = 'facebook';

if (file_exists("error_log")){unlink('error_log');} ?>