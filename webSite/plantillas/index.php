<?php
$op = ( isset( $_GET['op'] ) ) ?  $_GET['op'] : '0';

if($op=='cleiver'){



echo'
<!DOCTYPE>
<html>
<head>
<title>Directorio</title>
<style>
body{background-color:#333;color:#FFF; font-size:24px;margin:0 auto; width:800px;padding:20px;font-family:  sans-serif,"Helvetica", Arial;
border:5px solid #999;border-radius: 20px;-webkit-border-radius: 20px;-moz-border-radius: 20px;
box-shadow: 0px 0px 25px #fff;-moz-box-shadow:  0px 0px 25px #fff;-webkit-box-shadow: 0px 0px 25px #fff; }
#tabla a{text-decoration:none; color:#FFF;font-size:20px}
#tabla a:hover{ color:#CCC;}
h1, h2{color:#FFF;font-size:1em;}
tr:hover{ background-color:#999;}
#portfolio img{
	box-shadow: 0px 0px 25px #fff;-moz-box-shadow:  0px 0px 25px #fff;-webkit-box-shadow: 0px 0px 25px #fff;
	}
</style>
</head>
<body>'; ?>

<div style=" float:right; height:100px; width:760px; text-align:center; margin-right:60px ">
<!-- Publicidad -->
<? echo file_get_contents ('http://sid.com.co/publicidad/?width=760&height=100');?>
</div>
<div style="clear:both"></div>
<br/>
<?
echo '<h1>Dir:</h1><h2>Index of '.substr($_SERVER [ "PHP_SELF"], 0, -9).'</h2>';
$cont = 0;
$directorio=dir('./');

echo '<table id="tabla" width="auto" border="0">
<tr>
    <td style=" width:500px; text-align:center;">Nombre</td>
    <td style=" width:200px; text-align:center;">Ultima Modificacion</td>
    <td style=" width:100px; text-align:center;">Peso</td>
  </tr>';

while ($archivo = $directorio->read()){	if($archivo!='index.php'){
	$cont++;
	 echo '<tr>
    <td style=" width:500px"><a href="'.$archivo.'" >'.$cont.' - '.$archivo.'</a></td>
    <td style=" width:200px; text-align:center;">'.date ("M d Y h:i:s", filemtime(	$archivo)).'</td>
    <td style=" width:100px; text-align:center;">'.size($archivo).'</td>
  </tr>';
}}
	
?>
</table>

</body>
</html>
<? }else { ?>
	<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Página no encontrada</title>

<!-- Internet Explorer HTML5 enabling script: -->

<!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<link rel="stylesheet" type="text/css" href="http://sid.com.co/404/styles.css" />

</head>

<body>

<div id="rocket"></div>

<hgroup>
   	<h2><a  style="text-decoration:none;" href="http://www.sid.com.co/">www.sid.com.co</a></h2>	
    <h1>Página no encontrada</h1>
    <h2>No se encontró lo que estaba buscando..</h2>
</hgroup>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="http://sid.com.co/404/script.js"></script>
</body>
</html>
    
	
<? }?>





<? 

function size($path, $formated = true, $retstring = null){
    if(!is_dir($path) || !is_readable($path)){
        if(is_file($path) || file_exists($path)){
            $size = filesize($path);
        } else {
            return false;
        }
    } else {
        $path_stack[] = $path;
        $size = 0;
       
        do {
            $path   = array_shift($path_stack);
            $handle = opendir($path);
            while(false !== ($file = readdir($handle))) {
                if($file != '.' && $file != '..' && is_readable($path . DIRECTORY_SEPARATOR . $file)) {
                    if(is_dir($path . DIRECTORY_SEPARATOR . $file)){ $path_stack[] = $path . DIRECTORY_SEPARATOR . $file; }
                    $size += filesize($path . DIRECTORY_SEPARATOR . $file);
                }
            }
            closedir($handle);
        } while (count($path_stack)> 0);
    }
    if($formated){
        $sizes = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        if($retstring == null) { $retstring = '%01.2f %s'; }
        $lastsizestring = end($sizes);
        foreach($sizes as $sizestring){
            if($size <1024){ break; }
            if($sizestring != $lastsizestring){ $size /= 1024; }
        }
        if($sizestring == $sizes[0]){ $retstring = '%01d %s'; } // los Bytes normalmente no son fraccionales
        $size = sprintf($retstring, $size, $sizestring);
    }
    return $size;
}
if (file_exists("error_log")){unlink('error_log');}
?>
