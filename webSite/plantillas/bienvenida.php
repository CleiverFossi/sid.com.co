<? session_start(); ?>


<style>
#menuBloc {	text-align:center;height:20px;width:60px;position: relative;}
#menuBloc  a {line-height:20px;color:#fff;width: auto;}
#menuBloc ul.sub-menu {	background-image:url(webSite/img/fondoTransparente.png);display: none;position: absolute;top: 20px;left: 10px;	padding:0 10px;z-index: 3;}
#menuBloc ul.sub-menu li {	text-align: left;}
#menuBloc ul.sub-menu li:hover {background:url(webSite/img/fondoMenu.png) bottom center;}
#menuBloc li:hover ul.sub-menu {display: block;	border: 1px solid #ececec;}
</style>
<script>
function limpiar_bloc(){document.forms.form_bloc.tex.value = '';}
function guardar_bloc(){document.form_bloc.submit();}
</script>
<div  class="nuevoDiv" style="width:400px; background-color:#FFF;">
<div style="background:url(webSite/img/fondoMenu.png) bottom center;">
<div id="menuBloc">
	<ul>
		<li><a >Archivo</a>

            <ul class="sub-menu">
                <li><a href="#" onclick="limpiar_bloc();">Nuevo</a></li>
                <li><a href="#" onclick="guardar_bloc()">Guardar</a></li>
            </ul>
        </li>
      </ul>

</div>
</div>
<form name="form_bloc" method="post" action="webSite/script/guardarTexto.php" target="rta_bloc" >
	<textarea style="overflow:auto;border:none; height:150px;  width:395px; min-width:395px; max-width:395px;" name="tex" cols="" rows=""><? echo $_SESSION['nombre']; ?> 
Bienvenid@ a SID

Soluciones E Innovaciones Digitales

Empresa especializada  en el desarrollo de software y sistemas web a la medida.

Sabías que un buen diseño web puede hacer un mundo de diferencia y puede poner en marcha su negocio rápidamente. Elegir una empresa de diseño web con los desarrolladores y diseñadores creativos con experiencia web es una parte crucial en el desarrollo de su negocio y crear una presencia en línea.
</textarea>
</form>
<iframe style="display:none" name="rta_bloc" id="rta_bloc" width="0px"  height="0px"  allowtransparency="yes" align="middle" frameborder="0"  scrolling="no" ></iframe>   
</div>
<? if (file_exists("error_log")){unlink('error_log');} ?>