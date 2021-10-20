<?php
//mysql_connect("190.153.254.59", "dba_ematix","yazQkuZKPczRDzjjI0oi") or die ("Fallo la conexion : ".mysql_error());
//mysql_connect("localhost", "dba_ematix","yazQkuZKPczRDzjjI0oi") or die ("Fallo la conexion : ".mysql_error());
$link = mysqli_connect("localhost", "dba_ematix", "yazQkuZKPczRDzjjI0oi", "ematixdb");
//mysql_select_db("ematixdb") or die ("Error al seleccionar Base de Datos : ".mysql_error());
//mysql_query("SET NAMES 'utf8'");

$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$rut = $_POST['rut'];
$dv = $_POST['dv'];
$cargo = $_POST['cargo'];
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$tipo_usu = $_POST['tipo_usu'];

$dia = $_POST['dia'];
$mes = $_POST['mes'];
$año = $_POST['ano'];

if(strlen($dia) == 1)
{
	$dia = '0'.$dia;
}
if(strlen($mes) == 1)
{
	$mes = '0'.$mes;
}

$fecha = $dia."-".$mes."-".$año;
//$estado = $_POST['estado'];
$estado = 1;

/*
$resultado = mysql_query("INSERT INTO `usuario`( `Nombre_usu`, `ApellidoP_usu`, `ApellidoM_usu` , `Usuario`, `Password`, `Tipo_usu`, `Cargo_usu`, 					`Rut_usu`, `Dv_usu`, `Fecha_Ingreso_usu`, `Estado`) VALUES ('$nombre','$paterno','$materno' ,'$usuario', '$contraseña', $tipo_usu, '$cargo', '$rut', '$dv', '$fecha', $estado);");
*/


$query = "INSERT INTO `usuario`( `Nombre_usu`, `ApellidoP_usu`, `ApellidoM_usu` , `Usuario`, `Password`, `Tipo_usu`, `Cargo_usu`, 					`Rut_usu`, `Dv_usu`, `Fecha_Ingreso_usu`, `Estado`) VALUES ('$nombre','$paterno','$materno' ,'$usuario', '$contraseña', $tipo_usu, '$cargo', '$rut', '$dv', '$fecha', $estado);";
$result = mysqli_query($link, $query);
	
if($result)
{
	?>
   		<script languaje="javascript">
    		alert("Usuario Registrado");
			location.href = "ManUsuarios.php";
   		</script>
  	<?php 	
}
else
{
	?>
   		<script languaje="javascript">
    		alert("Error al registrar");
			location.href = "ManUsuarios.php";
   		</script>
  	<?php
}

?>