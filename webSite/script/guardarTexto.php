<? 

$nombre_backup =  "SinTitulo.txt";
header( "Content-type: application/savingfile" );
header( "Content-Disposition: attachment; filename=$nombre_backup" );
header( "Content-Description: Document." );
echo $_POST['tex'];

?>