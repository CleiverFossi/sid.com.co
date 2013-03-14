<?php session_start();?>
<? if (isset($_SESSION['uid']) && $_SESSION['uid']=='816237496'){ ?>
<div  class="nuevoDiv" style="width:400px; display:inline;  ">


<style>
.msnA img{
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
.msnA .msnImg2{
margin:-30px 0 0 10px;
}
.msnA .noDisponible{
border:5px solid #e3e3e3;
border:5px solid rgba(225,225,225,0.5);
opacity:0.5;
}
.msnA p {
color:#FFF;
margin:0 0 0 100px;
padding:15px 0;
font-weight:700;
}
.msnA p samp.estado{
font-size:13px;
color:#999;
font-weight:normal;
}
.msnA #msgAMsn{
font-size:17px;
margin:0 0 0 95px;
height:50px;;
width:250px;
border-radius: 12px;-webkit-border-radius: 12px;-moz-border-radius: 12px;
border:none;
}
.msnA input[type="button"]{
height:60px;
widows:50px;
border-radius: 12px;-webkit-border-radius: 12px;-moz-border-radius: 12px;text-shadow: 0px 1px 0px white;background-size: 100% 100%;background: -webkit-gradient(linear, left top, left bottom, from(white), to(#CCC));background: -moz-linear-gradient(top, white, #CCC);background: -o-linear-gradient(top, white, #CCC);cursor: pointer;border-image: initial;
}
.msnA input[type="button"]:hover{background: -o-linear-gradient(top, #CCC, #DDD);background-size: 100% 100%;background: -webkit-gradient(linear, left top, left bottom, from(#CCC), to(#DDD));background: -moz-linear-gradient(top, #CCC, #DDD);background: -o-linear-gradient(top, #CCC, #DDD);}
.msnA #msnAChat{
height:200px; width:305px; margin-left:95px; overflow-y:auto;overflow-x:none; 
}
.msnA #msnAChat p {
margin:0;
padding:0;
color:#000;
font-size:14px;
}
.msnA #msnAChat p.user{
color:#666;
margin-top:10px;
}
.msnA #msnAChat p.user a{
	color:#666;
}
.msnA span.msgUser{
font-size:13px;
}
.msnA .msgUser span.msjParaUser{
	color:#CCC;
}
.msnA .msnAsuperior a{
	color:#FFF;
}
</style>
<script>
var numMsnAUser=$('.nuevoDiv .msnA #msnAChat .user').length;
var SelecUserA=0;
var SelecUserAname=0;
function msnAUser(){if($('#msgAMsn').val()!="" && SelecUserA!= 0){
	$.ajax({
	   type: "POST",
	   url: "webSite/script/chatAdmin.php",
	   data: "msg="+$('#msgAMsn').val()+"&op=1&user="+SelecUserA+"&name="+SelecUserAname,
 	});
	
	$('#msgAMsn').val('');
	$('#msgAMsn').focus();
}}
function cargarMsnAChat(){if ($('.nuevoDiv .msnA').length){
	$.ajax({
	   type: "POST",
	   url: "webSite/script/chatAdmin.php",
	   data: "msg="+$('#msgAMsn').val()+"&op=2",
	   error:function(){setTimeout("cargarMsnAChat()",800);},
	   success: function(data){if ($('.nuevoDiv .msnA').length){
			$('.nuevoDiv .msnA #msnAChat').html(data);
			if ($('.nuevoDiv .msnA #msnAChat .user').length !=numMsnAUser){
				 numMsnAUser=$('.nuevoDiv .msnA #msnAChat .user').length;
				 $("#msnAChat").scrollTop(numMsnAUser*50);
			}
			setTimeout("cargarMsnAChat()",800);
	   }}
 	});
}}
function selecUser(uid,nombre){
	if(uid==0){
	SelecUserA = 0;
	nombre='Ningun Usuario';
	$('.nuevoDiv .msnA .msnAsuperior img').attr({ src: "http://graph.facebook.com/195642137144972/picture", title: nombre});
	$('.nuevoDiv .msnA .msnAsuperior p').html(nombre);
	
	}else{	
	SelecUserA = uid;
	SelecUserAname=nombre;
	$('.nuevoDiv .msnA .msnAsuperior img').attr({ src: "http://graph.facebook.com/"+uid+"/picture", title: nombre});
	$('.nuevoDiv .msnA .msnAsuperior p').html('<a target="_blank" href="http://www.facebook.com/profile.php?id='+uid+'">'+nombre+'</a>');}
}
cargarMsnAChat();
selecUser(0,'');
</script>
<div class="msnA" style=" overflow:hidden; font-size:16px;text-align:justify; width:400px; margin:0px auto;color:#000;  background-image:url(webSite/img/loguitosFondo.png); background-color:#FFF;border-radius: 8px;-moz-border-radius: 8px;-webkit-border-radius: 8px;">


<div class="msnAsuperior" style="width:100%; height:60px; background-image:url(webSite/img/msn1.png);">
<img  title="Asesor - SID" src="http://graph.facebook.com/195642137144972/picture"/>
<p>Asesor - SID</p>
</div>


<div id="msnAChat">

</div>


<div style="width:100%; height:60px; background-image:url(webSite/img/msn2.png);">
<a onClick="selecUser(0,'')"><img title="Asesor - SID" class="msnImg2" src="http://graph.facebook.com/195642137144972/picture"/></a>
<input id="msgAMsn" type="text" onKeyPress="if(event.keyCode=='13'){msnAUser();}" value=""/><input type="button" onClick="msnAUser();" value="Enviar"/>
</div>





</div></div><? }?>