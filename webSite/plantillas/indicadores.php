<div  class="nuevoDiv" style="width:400px; display:inline;  ">
<style>
.indicadores {
}
.indicadores h2 {
	text-align:center;
}
</style>
<div class="indicadores" style=" font-size:16px;text-align:justify; width:350px; margin:0px auto;color:#000; padding:15px; background-image:url(webSite/img/loguitosFondo.png); background-color:#FFF;border-radius: 8px;-moz-border-radius: 8px;-webkit-border-radius: 8px;">
<h2>Indicadores Económicos (Cucuta)</h2><br/>
<?
if(!isset($_SESSION['indicadores'])){
	
	$options = array('http' => array('method'  => 'GET',));

	$config= stream_context_create($options);
	
	$config_final=file_get_contents('http://www.laopinion.com.co/demo/index.php',false, $config);
	
	preg_match_all("|<div style=\"background-color: #ffffff; padding:0 8px; border: 1px solid #ddd;\">(.*)</div>|sU", $config_final, $tiempo);
	
	preg_match_all("|<table class=\"indicadores\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">(.*)</tbody>|sU",$tiempo[0][0], $tiempo);
	
	$u = str_replace('images','webSite/img', $tiempo[0][0]);
	
	$u .='</table>';
	
	$indicadores =$u;
	
	$_SESSION['indicadores']=$indicadores;
}else{
	$indicadores=$_SESSION['indicadores'];
}

echo $indicadores;
?>





</div></div>