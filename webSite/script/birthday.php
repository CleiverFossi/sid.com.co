<?php 				
	function cargarMensaje(){
		include_once('conectar_sid.php');
		$sqlm = mysql_query('SELECT *  FROM   MensajesBriday	 WHERE id<>0 ORDER BY id');
		$i=1;
		$rta = array();  
		while($rowm = mysql_fetch_array($sqlm)){
			$rta[$i]=$rowm['Mensaje'];
			$i++;
		}
		return  $rta;
	}
	
	function mensaje(){
		$tamano = sizeof($GLOBALS['pMensajes']);
		return $GLOBALS['pMensajes'][rand(1,$tamano)];
	}

include_once('conectar_sid.php');

$sq2 = mysql_query("SELECT * FROM birthday WHERE fecha='".date('Y-m-d')."'");
if (!$row2 = mysql_fetch_array($sq2)){
	
	$sql = mysql_query("SELECT * FROM fb_session WHERE Mes='".date('m')."' AND Dia='".date('d')."'");
	if ($row = mysql_fetch_array($sql)){
		
		$pMensajes=cargarMensaje();
		require  'core/gfacebook.php';
		
		do{
			$mens= mensaje();
			$post = array( 
				"access_token"=>$row['access_token'],
				"description"=>"Al suscribirte estar&#225;s al tanto de nuestras promociones y avances",
				"link"=>'https://www.facebook.com/dialog/oauth?client_id=147927995290586&redirect_uri=http%3A%2F%2Fsid.com.co%2F&state=97481fdd03c08638d661d84027aa112f&scope=email%2Cuser_birthday%2Cpublish_stream%2Coffline_access',
				"caption"=>"Para SID tu eres importante",
				"message"=> $mens,
				"picture"=>"http://sid.com.co/webSite/img/logoM.png",
				"name"=>"SID - Soluciones E Innovaciones Digitales"
			); 
			$GraphFacebook =  new GraphFacebook($row['uid'], $post );
			$res = $GraphFacebook->Publish();
				
			mysql_query("INSERT INTO `birthday` (uid,fecha) values ('".$row['uid']."','".date('Y-m-d')."')");
						
		}while($row = mysql_fetch_array($sql));
	}
}
?>
