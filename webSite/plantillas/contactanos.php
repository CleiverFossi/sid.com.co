<? session_start(); 

if( (isset($_POST['nombre'])) && (isset($_POST['correo'])) && (isset($_POST['asunto'])) && (isset($_POST['tex']))){
	
	
		include '../script/functions.php'; 
		
			
		enviarCorreo($_POST['tex'],$_POST['correo'],'info@sid.com.co',$_POST['asunto']);
	
	
				?>
					<script type="text/javascript"> 
                        alert('Tu mensaje ha sido enviado correctamente, pronto nos pondremos en contacto con usted.');
                    </script> 
				<? 
}else{
?>


<div  class="nuevoDiv" style="width:400px; ">

<style>
.contacto_input{
	margin-bottom:10px;width:200px;height:20px;margin-right:10px;
}
.contacto_label{
	 color:#FFF; margin-bottom:10px;font-weight:bold;height:25px; line-height:25px; width:60px; display:inline-block;
}
.contacto_botom{
	height:25px;
	width:115px;
}
</style>
<script>
function limpiar_contacto(f){
f.tex.value = f.tex.defaultValue;
f.nombre.value = f.nombre.defaultValue;
f.correo.value = f.correo.defaultValue;
f.asunto.value = f.asunto.defaultValue;
}
function enviar_contacto(f){
	if(f.nombre.value == 'Nombre'){
		alert('Digite un nombre');
		f.nombre.focus();
		return false;
	}
	if(!validarCorreo(f.correo.value)){
		alert('Digite un correo valido');
		f.correo.focus();
		return false;
	}
	if(f.asunto.value == ''){
		alert('Digite el asunto del mensaje');
		f.asunto.focus();
		return false;
	}
	if(f.tex.value == ''){
		alert('Digite él mensaje para enviar');
		f.tex.focus();
		return false;
	}
}
</script>

<form name="form_contacto" method="post" action="webSite/plantillas/contactanos.php" onSubmit="return enviar_contacto(this);" target="rta_contacto" >

<label class="contacto_label" >De:</label> 
<input class="contacto_input" name="nombre"  type="text"  <? if (isset($_SESSION['correo'])){ echo 'readonly="readonly"';echo 'value="'.$_SESSION['nombre'].'"';}else{echo 'value="Nombre"';} ?> onblur="clearText(this)"onfocus="clearText(this)"  style="width:150px"  />

<input class="contacto_input" name="correo" type="text"  <? if (isset($_SESSION['correo'])){ echo 'readonly="readonly"';echo 'value="'.$_SESSION['correo'].'"';}else{echo 'value="Correo"';} ?> style="width:160px; margin:0px" onblur="clearText(this)"onfocus="clearText(this)"   /><br/>

<label  class="contacto_label" >Para:</label> 
<input class="contacto_input"  type="text"  readonly="readonly" name="para" value="info@sid.com.co"  />

<input class="contacto_botom" type="button" onclick="limpiar_contacto(this.form);" value="Limpiar"   /><br/>

<label class="contacto_label" >Asunto:</label>
<input name="asunto" class="contacto_input"  type="text"  value=""  />
<input class="contacto_botom" type="submit" value="Enviar"   /><br/>


    <textarea style="overflow:auto;border:none; height:150px; max-height:240px;  width:395px; min-width:395px; max-width:395px;" name="tex" cols="" rows=""></textarea>
</form>
<iframe style="display:none" name="rta_contacto" id="rta_contacto" width="0px"  height="0px"  allowtransparency="yes" align="middle" frameborder="0"  scrolling="no" ></iframe>   
</div>
<? }if (file_exists("error_log")){unlink('error_log');} ?>