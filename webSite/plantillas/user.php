<?php session_start();?>
<div  class="nuevoDiv" style="width:600px; display:inline;  ">
<style>
.face_user a{ margin:0;
padding:0;}
.face_user p{ padding: 0 0 10px 0; }
.face_user #fb-login-button{ margin:auto 0 10px auto; }
</style>
<div class="face_user" style=" font-size:1em;text-align:justify; height:auto; width:550px; margin:0px auto;color:#000; padding:15px; background-image:url(webSite/img/loguitosFondo.png); background-color:#FFF;border-radius: 8px;-moz-border-radius: 8px;-webkit-border-radius: 8px;">
<? if (isset($_SESSION['nombre'])){ ?>
<center>
<div id="fb-login-button" class="fb-login-button"><a  target="_blank"  onClick="compartir();" class="fb_button fb_button_medium"><span class="fb_button_text">Compartir en el Facebook</span></a></div></center>
<? }else{ ?>
<center>
<div id="fb-login-button" class="fb-login-button"><a  target="_blank"  onClick="dologin();" class="fb_button fb_button_medium"><span class="fb_button_text">Usar SID en Facebook</span></a></div></center>
<? } ?>


<p>Algunos de los usuarios que nos apoyan usando nuestro aplicativo de facebook:</p>

 <?php 

	include_once('../script/conectar_sid.php');
	$sql = mysql_query("SELECT uid FROM fb_session");
	
 while($row = mysql_fetch_array($sql)){?>
    
    	<a  target="_blank" href="http://www.facebook.com/profile.php?id=<?php echo $row["uid"]; ?>" >
    		<img src="http://graph.facebook.com/<?php echo $row["uid"]; ?>/picture" alt="Foto">
    	</a>
        
    <?php }?>



</div></div>

