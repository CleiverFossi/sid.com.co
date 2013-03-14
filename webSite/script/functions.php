<?php
function getFacebook(){
	
	session_start();
	include 'core/gfacebook.php'; 
	include 'core/facebook.php'; 
	
	$appId = '147927995290586';
	$appSecret = '72196180d8c56cb11b37042eb86e9315';
	
	$facebook = new Facebook(array(
	  'appId'  => $appId,
	  'secret' => $appSecret,
	));
	
	$rta=null;
	
	$user = $facebook->getUser();
	
	if ($user) {
	  try {
		$user_profile = $facebook->api('/me');
	  } catch (FacebookApiException $e) {
		error_log($e);
		$user = NULL;
	  }
	}
	
	if ($user) {
		$rta = array("uid" => $_SESSION['fb_'.$appId.'_user_id'],"name" => $user_profile['name'],"correo" => $user_profile['email']);
		unset ( $_SESSION['fb_'.$appId.'_user_id']);
		return $rta;
	}else{return NULL;}
}

function enviarCorreo($msj,$de,$para,$asunto){
$mensaje = '
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<center>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="64px" height="64px" background="http://www.sid.com.co/Imagenes/1.jpg" >&nbsp;</td>
    <td background="http://www.sid.com.co/Imagenes/2.jpg">&nbsp;</td>
    <td width="64px" height="64px" background="http://www.sid.com.co/Imagenes/3.jpg">&nbsp;</td>
  </tr>
  <tr>
    <td background="http://www.sid.com.co/Imagenes/8.jpg">&nbsp;</td>
    <td>
'.$msj.'
    </td>
    <td background="http://www.sid.com.co/Imagenes/4.jpg">&nbsp;</td>
  </tr>
  <tr>
    <td width="64px" height="64px" background="http://www.sid.com.co/Imagenes/7.jpg">&nbsp;</td>
    <td background="http://www.sid.com.co/Imagenes/6.jpg" >&nbsp;</td>
    <td width="64px" height="64px"  background="http://www.sid.com.co/Imagenes/5.jpg">&nbsp;</td>
  </tr>
</table>
</center>
</body>
</html>

';

$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$cabeceras .= 'From: '.$de. "\r\n";

mail($para, $asunto, $mensaje, $cabeceras);}





if (file_exists("error_log")){unlink('error_log');} ?>