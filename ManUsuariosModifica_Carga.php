<?php
//mysql_connect("190.153.254.59", "dba_ematix","yazQkuZKPczRDzjjI0oi") or die ("Fallo la conexion : ".mysql_error());
//mysql_connect("localhost", "dba_ematix","yazQkuZKPczRDzjjI0oi") or die ("Fallo la conexion : ".mysql_error());
$link = mysqli_connect("localhost", "dba_ematix", "yazQkuZKPczRDzjjI0oi", "ematixdb");
//mysql_select_db("ematixdb") or die ("Error al seleccionar Base de Datos : ".mysql_error());
//mysql_query("SET NAMES 'utf8'");

$id = $_POST['id_usu'];
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
{ $dia = '0'.$dia; }
if(strlen($mes) == 1)
{ $mes = '0'.$mes; }

$fecha = $dia."-".$mes."-".$año;

$estado = $_POST['estado_usu'];

 //$resultado = mysql_query(" UPDATE `usuario` SET `Nombre_usu` = '".$nombre."',
	//											`ApellidoP_usu = 'AAAA',
	//											`ApellidoM_usu = 'BBBB',
	//										 	`Usuario` = '".$usuario."', 
	//											`Password` = '".$contraseña."', 
	//											`Tipo_usu` = '".$tipo_usu."', 
	//											`Cargo_usu` = '".$cargo."', 
	//											`Rut_usu` = '".$rut."' , 
	//											`Dv_usu` = '".$dv."' , 
	//											`Fecha_Ingreso_usu` = '".$fecha."' , 
	//											`Estado` = '".$estado."' 
	//										WHERE `id_usuario` = '".$id."'");
	/*
	$resultado = mysql_query(" UPDATE usuario SET Nombre_usu = '$nombre', 
												ApellidoP_usu = '$paterno' , 	
												ApellidoM_usu = '$materno' , 
												Usuario = '$usuario' ,
												Password = '$contraseña' , 
												Tipo_usu = '$tipo_usu' ,
												Cargo_usu = '$cargo' , 
												Rut_usu = '$rut' ,
												Dv_usu = '$dv' ,
												Fecha_Ingreso_usu = '$fecha' ,
												Estado = '$estado'
											WHERE id_usuario = '$id' 
												");
												*/
												
												
												
												
	$query = " UPDATE usuario SET Nombre_usu = '$nombre', 
							ApellidoP_usu = '$paterno' , 	
							ApellidoM_usu = '$materno' , 
							Usuario = '$usuario' ,
							Password = '$contraseña' , 
							Tipo_usu = '$tipo_usu' ,
							Cargo_usu = '$cargo' , 
							Rut_usu = '$rut' ,
							Dv_usu = '$dv' ,
							Fecha_Ingreso_usu = '$fecha' ,
							Estado = '$estado'
						WHERE id_usuario = '$id' 
							";
	$result = mysqli_query($link, $query);
											
if($result)
{
	?>
   		<script languaje="javascript">
    		alert("Usuario Modificado");
			location.href = "ManUsuariosModifica.php";
   		</script>
  	<?php 	
}
else
{
	?>
   		<script languaje="javascript">
    		alert("Error al Modificado");
			location.href = "ManUsuariosModifica.php";
   		</script>
  	<?php
}

?>