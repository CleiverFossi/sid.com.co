	<?php
// message
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
'.$msn.'
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

// Para enviar un correo HTML mail, la cabecera Content-type debe fijarse
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
//$cabeceras .= 'To: '.$para . "\r\n";
//$cabeceras .= 'To: '.$nombre_para.' <'.$para.'>' . "\r\n";
$cabeceras .= 'From: '.$de. "\r\n";
//$cabeceras .= 'From: '.$nombre_de.' <'.$de.'>' . "\r\n";
//$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$cabeceras .= 'Bcc: info@sid.com.co' . "\r\n";

// Mail it
mail($para, $titulo, $mensaje, $cabeceras);
?>