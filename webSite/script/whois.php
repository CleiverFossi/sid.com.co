<?php
if (isSet($_POST['dom']))
	{
	$query = $_POST['dom'];
	
	include_once('../plantillas/phpwhois/whois.main.php');
	include_once('../plantillas/phpwhois/whois.utils.php');

	$whois = new Whois();

	$allowproxy = false;


 	$whois->deep_whois = empty($_GET['fast']);

	$whois->non_icann = true;

	$result = $whois->Lookup($query);
	echo $result['regrinfo']['registered'];
	
}


?>