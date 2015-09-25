<?php



$nombre = $_POST['user'];
$clave = $_POST['password'];


mysql_connect("localhost", "lacuevad_testing", "capullo100" );
mysql_select_db("lacuevad_testing");

$consulta = "SELECT * FROM alumnos WHERE nombre='$nombre' and clave='$clave'";
$stubconsulta = "SELECT * from alumnos";

$resultado = mysql_query($stubconsulta) or die (mysql_error());

$affected_rows = 0; 

if (mysql_num_rows($resultado)> 0 )
{

	echo mysql_num_rows($resultado);
	echo  $_POST['user'];
	

}
else echo "Aquí algo ha salido mal... fus fus, ha entrado $nombre";





?>