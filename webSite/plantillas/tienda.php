<div  class="nuevoDiv" style="width:600px; display:inline;  ">
<style>
.vitrina p{
	display:block;
	text-align:center;
	font-weight:bold;
	font-size:23px;
}
.vitrina a{
	color:#000;
	font-weight:bold;	display:inline-block;background-position:top left;	background-repeat:no-repeat;font-size:13px;	height:30px;line-height:30px;
	float:right;
}
.vitrina a:hover{
	color:#00F;
}
</style>
<div class="vitrina" style="font-size:16px;text-align:justify; width:550px; margin:0px auto;color:#000; padding:15px; background-image:url(webSite/img/loguitosFondo.png); background-color:#FFF;border-radius: 8px;-moz-border-radius: 8px;-webkit-border-radius: 8px;">
<?
	include_once('../script/conectar_sid.php');
	$sql = mysql_query("SELECT * FROM Productos WHERE cod<>'0' ORDER BY tipo");


	if($row = mysql_fetch_array($sql)){
	?><table id="listdo" width="540px"  border="0"><?
		do {
		?><tr><td width="100px" height="100px">
        
        <img src="http://www.sid.com.co/imgP/<? echo $row['img'] ?>"  width="99px" height="99px" alt="Imagen">
        
        
        </td><td><table width="440px" height="99px"  border="0">     <tr><td colspan="4" height="60px">
        <br/>Descripcion: <?  echo " " .$row['descripcion'];
		?></td></tr><tr><td>
        Tipo: <? echo " " .$row['tipo'];
		?></td>
        <td width="100px">  </td>
        
        <td width="100px">
		<!-- Costo: <? //echo " $" .$row['costo']; ?>      -->
        </td>
             
         <td width="70px">
	
       <a href="#" onclick="abrirW('contactanos.php','Correo','webSite/img/icoContactanos.png');" style="text-indent:45px;background-image:url(webSite/img/icoContactanos.png);">Interesad@</a>
        </td>
        </tr></table></td></tr><?		
			
		}while($row = mysql_fetch_array($sql));
	
	?></table><?
		
	}else {
		echo "¡ La base de datos está vacia !";
	}

?>
</div></div>
<? if (file_exists("error_log")){unlink('error_log');} ?>