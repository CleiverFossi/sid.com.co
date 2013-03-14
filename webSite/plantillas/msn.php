<?php session_start();?>
<div  class="nuevoDiv" style="width:400px; display:inline;  ">
<style>
.msn img{
position:absolute;
width:70px;
height:70px;
margin:10px 0 0 10px;
border:5px solid #0F0;
border:5px solid rgba(0,225,0,0.5);
-ms-border-radius:8px;
-moz-border-radius:8px;
-o-border-radius:8px;
-webkit-border-radius:8px;
border-radius:8px;	
}	
.msn .msnImg2{
margin:-30px 0 0 10px;
}
.msn .noDisponible{
border:5px solid #e3e3e3;
border:5px solid rgba(225,225,225,0.5);
opacity:0.5;
}
.msn p {
color:#FFF;
margin:0 0 0 100px;
padding:15px 0;
font-weight:700;
}
.msn p samp.estado{
font-size:13px;
color:#999;
font-weight:normal;
}
.msn #msgMsn{
font-size:17px;
margin:0 0 0 95px;
height:50px;;
width:300px;
border-radius: 12px;-webkit-border-radius: 12px;-moz-border-radius: 12px;
border:none;
border-top:1px solid #CCC;
}
.msn input[type="button"]{
height:60px;
widows:50px;
border-radius: 12px;-webkit-border-radius: 12px;-moz-border-radius: 12px;text-shadow: 0px 1px 0px white;background-size: 100% 100%;background: -webkit-gradient(linear, left top, left bottom, from(white), to(#CCC));background: -moz-linear-gradient(top, white, #CCC);background: -o-linear-gradient(top, white, #CCC);cursor: pointer;border-image: initial;
}
.msn input[type="button"]:hover{background: -o-linear-gradient(top, #CCC, #DDD);background-size: 100% 100%;background: -webkit-gradient(linear, left top, left bottom, from(#CCC), to(#DDD));background: -moz-linear-gradient(top, #CCC, #DDD);background: -o-linear-gradient(top, #CCC, #DDD);}
.msn #msnChat{
height:200px; width:305px; margin-left:95px; overflow-y:auto;overflow-x:none; 
}
.msn #msnChat p {
margin:0;
padding:0;
color:#000;
font-size:14px;
}
.msn #msnChat p.user{
color:#666;
margin-top:10px;
}
.msn span.msgUser{
font-size:13px;
}
.msn .msgUser span.msjParaUser{
	color:#CCC;
}
</style>
<script>
var numMsnUser=$('.nuevoDiv .msn #msnChat .user').length;
function msnUser(){	if($('#msgMsn').val()!=""){
	$.ajax({
	   type: "POST",
	   url: "webSite/script/chat.php",
	   data: "msg="+$('#msgMsn').val()+"&op=1",
 	});
	
	$('#msgMsn').val('');
	$('#msgMsn').focus();
}}
function cargarChat(){if ($('.nuevoDiv .msn').length){
	$.ajax({
	   type: "POST",
	   url: "webSite/script/chat.php",
	   data: "msg="+$('#msgMsn').val()+"&op=2",
	   error:function(){setTimeout("cargarChat()",800);},
	   success: function(data){if ($('.nuevoDiv .msn').length){
			$('.nuevoDiv .msn #msnChat').html(data);
			if ($('.nuevoDiv .msn #msnChat .user').length !=numMsnUser){
				 numMsnUser=$('.nuevoDiv .msn #msnChat .user').length;
				 $("#msnChat").scrollTop(numMsnUser*50);
			}
			setTimeout("cargarChat()",800);
	   }}
 	});
}}
cargarChat();
</script>
<div class="msn" style=" overflow:hidden; font-size:16px;text-align:justify; width:400px; margin:0px auto;color:#000;  background-image:url(webSite/img/loguitosFondo.png); background-color:#FFF;border-radius: 8px;-moz-border-radius: 8px;-webkit-border-radius: 8px;">



<div style="width:100%; height:60px; background-image:url(webSite/img/msn1.png);">
<img class="noDisponible" title="Asesor - SID" src="http://graph.facebook.com/195642137144972/picture"/>
<p>Asesor - SID <samp title="El asesor se encuentra desconectado" class="estado">(Desconectado)</samp><br/><span class="msgUser">Soluciones E Innovaciones Digitales<br/><span class="msjParaUser">Deje su Mensaje</span></span></p>
</div>


<div id="msnChat">

</div>

<? if (isset($_SESSION['nombre'])){ $img="http://graph.facebook.com/".$_SESSION['uid']."/picture"; }else{ $img="webSite/img/perfilUser.jpg"; } ?>
<div style="width:100%; height:60px; background-image:url(webSite/img/msn2.png);">
<img title="<? echo $_SESSION['nombre']; ?>" class="msnImg2" src="<? echo  $img; ?>"/>
<input onClick="if (uids==0){dologin();}" id="msgMsn" type="text" onKeyPress="if (uids==0){dologin();return false;}else{ if(event.keyCode=='13'){msnUser();}}" value=""/>
</div>





</div></div>
