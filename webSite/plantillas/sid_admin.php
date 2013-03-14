<? session_start(); ?>
<? if (isset($_SESSION['uid']) && $_SESSION['uid']=='816237496'){ ?>
<div  class="nuevoDiv" style="width:600px; display:inline;  ">
<style>
.admin .estadoMsn{
	height:auto;
	width:100px;
	max-height:300px;
	background-color:#033;
	overflow-x:none;
	overflow-y:auto;
	
}

</style>
<script>

</script>
<div class="admin" style=" font-size:16px;text-align:justify; width:550px; margin:0px auto;color:#000; padding:15px; background-image:url(webSite/img/loguitosFondo.png); background-color:#FFF;border-radius: 8px;-moz-border-radius: 8px;-webkit-border-radius: 8px;">


<div class="estadoMsn">
hola
</div>


<ul class="">
<li><a href="agregarProducto.php"> <b>Agregar Producto</b></a></li>
<li><a href="sendFacebbok.php"><b>Enviar Faceook</b></a></li>
<li><a href="birthdayGui.php"><b>Birthday Usuario</b></a></li>


<li><a href="#" onClick="abrirW('sid_invitar.php','Invitar','')">Invitar</a></li>
</ul>

<br/>


<a href="#" onClick="abrirW('sid_msna.php','Messenger','webSite/img/icoMsn.png')">MSN</a>
<a href="#" onClick="abrirW('sid_whois.php','Whois','')">Whois</a>
<a href="#" onClick="abrirW('sid_removes.php','Whois','')">Removes</a>
<a href="#" onClick="abrirW('sid_css.php','CSS','')">CSS</a>
<a href="#" onClick="abrirW('sid_remoto.php','Remoto','')">Remoto</a>



</div></div><? }?>