<?php 

					function mensaje()
					{
					include_once('conectar.php');
					$sql = mysql_query('SELECT count(*) as num FROM   MensajesBriday	 WHERE id<>0 ORDER BY id');
					if($row = mysql_fetch_array($sql)){
					srand (time());
					$numero_aleatorio = rand(1,$row['num']);
					$sql = mysql_query('SELECT *  FROM   MensajesBriday	 WHERE id<>0 ORDER BY id');
					while($numero_aleatorio >= 1){
						$row = mysql_fetch_array($sql);
						$numero_aleatorio = $numero_aleatorio -1;
					}
					return  $row['Mensaje'];
					}}


$op=$_GET['op'];

if($op==1){
require  'src/gfacebook.php';
}
include_once('conectar.php');



$sql = mysql_query("SELECT * FROM fb_session WHERE Mes='".date('m')."' AND Dia='".date('d')."'");

$sq2 = mysql_query("SELECT * FROM birthday WHERE fecha='".date('Y-m-d')."'");
if (!$row2 = mysql_fetch_array($sq2)){
if ($row = mysql_fetch_array($sql)){
	do{
		$mens= mensaje();
		$post = array( 
		"access_token"=>$row['access_token'],
		"description"=>"Al suscribirte estar&#225;s al tanto de nuestras promociones y avances",
		"link"=>"http://apps.facebook.com/sid-software/",
		"caption"=>"Para SID tu eres importante",
		"message"=> $mens,
		"picture"=>"http://sid.com.co/Imagenes/logoM.png",
		"name"=>"SID - Soluciones E Innovaciones Digitales"
		); 
		$GraphFacebook =  new GraphFacebook($row['uid'], $post );
		$res = $GraphFacebook->Publish();
		
		

		mysql_query("INSERT INTO `birthday` (uid,fecha) values ('".$row['uid']."','".date('Y-m-d')."')");
		
	
		
	}while($row = mysql_fetch_array($sql));
}

}

?>
