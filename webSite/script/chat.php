<?php session_start();
include_once 'conectar_sid.php'; 

$op = ( isset( $_POST['op'] ) ) ?  $_POST['op'] : '0';

if ($op=="1"){
	
	$msj = ( isset( $_POST['msg'] ) ) ?  $_POST['msg'] : '';
	
	if ($msj != ''){
		$nombre= explode(" ",trim($_SESSION['nombre']));
		
		mysql_query("INSERT INTO `chat` (`uid`, `mensaje`, `fecha`, `name`, `user`, `estado`, `name2`) VALUES ('".$_SESSION['uid']."', '".$msj."', now(), '".$nombre[0]."', '0', '0', 'SID')");
	
}}elseif ($op=="2"){
	$up=false;
	
	$sql = mysql_query("SELECT * FROM `chat` WHERE `uid`= '".$_SESSION['uid']."' ORDER BY `fecha`");
		
	while($row = mysql_fetch_array($sql)){
		
		if ($row['estado'] == '0' and $row['user']!='0'){$up=true;}
		
		echo '<p class="user">'.$row['name'].' dice:</p><p>'.$row['mensaje'].'</p>';
	}
	
	if($up){mysql_query("UPDATE  `chat` SET `estado` = '1' WHERE  `chat`.`uid` ='".$_SESSION['uid']."' AND `chat`.`user` <>  '0'");}
}
if (file_exists("error_log")){unlink('error_log');} ?>