<?php
//Importamos las variables del formulario
$description = addslashes($_POST['descriptionxx']);
$caption = addslashes($_POST['captionxx']);
$message = addslashes($_POST['messagexx']);
$name = addslashes($_POST['namexx']);
$picture = addslashes($_POST['picturexxx']);
$url = addslashes($_POST['urlxxx']);

$db_host = "localhost";
$db_user = "sidcom_sid";
$db_pass = "C3GSM";
$db_name = "sidcom_database";
$table_fb_session1 = "fb_session";
$table_fb_status	=	"fb_status";
$appUrl = "http://apps.facebook.com/sid-software/";
require  'src/gfacebook.php';
require  'src/mysql.php';
$list = $GLOBALS['mysql']->results( "SELECT uid, access_token FROM " . $GLOBALS['table_fb_session1'] );
if( $GLOBALS['mysql']->num_rows > 0 )
	{
	foreach( $list as $user )
		{
		$post = array( 
		"access_token"=>$user->access_token,
		"description"=>$description,
		"link"=>$appUrl . "?redirect=" . base64_encode($url),
		"caption"=>$caption,
		"message"=>$message,
		"picture"=>$picture,
		"name"=>$name
		); 
		$GraphFacebook =  new GraphFacebook( $user->uid, $post );
		$res = $GraphFacebook->Publish();
		echo $res;
		$array = array( "uid"=>$user->uid, "result"=>$res, "send_dt"=>date("Y-m-d H:i:s") );
		$GLOBALS['mysql']->query( "INSERT INTO " . $table_fb_status . "( ".$GLOBALS['mysql']->set_keys($array)." ) VALUES(".$GLOBALS['mysql']->set_values($array).")" );
		}
	}
?>