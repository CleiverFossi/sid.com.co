<?php session_start();
include_once 'conectar_sid.php'; 

$op = ( isset( $_POST['op'] ) ) ?  $_POST['op'] : '0';

if ($op=="1"){
	$user = ( isset( $_POST['user'] ) ) ?  $_POST['user'] : '';
	$msj = ( isset( $_POST['msg'] ) ) ?  $_POST['msg'] : '';
	$name2 = ( isset( $_POST['name'] ) ) ?  $_POST['name'] : '';
	
	if ($msj != '' && $user!=''){
		
	mysql_query("INSERT INTO `chat` (`uid`, `mensaje`, `fecha`, `name`, `user`, `estado` , `name2`) VALUES ('".$user."', '".$msj."', now(), 'SID', '1', '0', '".$name2."')");
	
}}elseif ($op=="2"){
	$up=false;
	
	$sql = mysql_query("SELECT * FROM `chat` WHERE `uid` <> '0' ORDER BY `fecha`");
		
	while($row = mysql_fetch_array($sql)){
		
		if ($row['estado'] == '0' and $row['user']=='1'){$up=true;}
		
		if ($row['name']=='SID'){
		$names=$row['name2'];
		$names2="SID -> ".$row['name2'];	
		}else{
		$names=$row['name'];
		$names2	=$row['name'];
		}
		
		echo '<p class="user"><a onClick="selecUser('.$row['uid'].','."'".$names."'".')" href="#">'.$names2.' dice:</a></p><p>'.$row['mensaje'].'</p>';
	}
	
	if($up){mysql_query("UPDATE  `chat` SET `estado` = '1' WHERE  `chat`.`user` =  '0'");}
}
if (file_exists("error_log")){unlink('error_log');} ?>
