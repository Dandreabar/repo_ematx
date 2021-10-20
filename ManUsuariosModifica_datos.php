<?php
//mysql_connect("190.153.254.59", "dba_ematix","yazQkuZKPczRDzjjI0oi") or die ("Fallo la conexion : ".mysql_error());
//mysql_connect("localhost", "dba_ematix","yazQkuZKPczRDzjjI0oi") or die ("Fallo la conexion : ".mysql_error());
$link = mysqli_connect("localhost", "dba_ematix", "yazQkuZKPczRDzjjI0oi", "ematixdb");
//mysql_select_db("ematixdb") or die ("Error al seleccionar Base de Datos : ".mysql_error());
//mysql_query("SET NAMES 'utf8'");

$id = $_GET['id'];
//$result = mysql_query("SELECT * FROM Usuario WHERE id_usuario = $id");
$query = "SELECT * FROM Usuario WHERE id_usuario = $id";
$result = mysqli_query($link, $query);
//$row = mysql_fetch_assoc($result);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

echo '<table width="90%" style="margin-left:45px;">';

echo '<tr>';
	echo '<td style="text-align:right; width:40%;" colspan="2">Nombre:</td>';
	echo '<td colspan="2" style="text-align:left;">';
		echo '<input type="text" name="nombre" id="nombre" maxlength="50" size="50" required="required" value="'.$row['Nombre_usu'].'" />';
	echo '</td>';
echo '</tr>';

echo '<tr>';
	echo '<td style="text-align:right; width:40%;" colspan="2">Apellido Paterno:</td>';
	echo '<td colspan="2" style="text-align:left;">';
		echo '<input type="text" name="paterno" id="paterno" maxlength="50" size="50" required="required" value="'.$row['ApellidoP_usu'].'" />';
	echo '</td>';
echo '</tr>';

echo '<tr>';
	echo '<td style="text-align:right; width:40%;" colspan="2">Apellido Materno:</td>';
	echo '<td colspan="2" style="text-align:left;">';
		echo '<input type="text" name="materno" id="materno" maxlength="50" size="50" required="required" value="'.$row['ApellidoM_usu'].'" />';
	echo '</td>';
echo '</tr>';

echo '<tr>';
	echo '<td style="text-align:right; width:40%;" colspan="2">Rut: </td>';
	echo '<td colspan="2" style="text-align:left;">';
		echo '<input type="text" name="rut" id="rut" maxlength="8" required="required" onkeypress="ValidaSoloNumeros()" size="8" value="'.$row['Rut_usu'].'" /> - ';
		echo '<input type="text" name="dv" dir="dv"  required="required" size="1" maxlength="1" value="'.$row['Dv_usu'].'" />';				
	echo '</td>';
echo '</tr>';

echo '<tr>';	
	echo '<td style="text-align:right; width:40%;" colspan="2">Cargo : </td>';
	echo '<td colspan="2" style="text-align:left">';	
		echo '<input type="text" name="cargo" id="cargo" maxlength="50" size="50" required="required" value="'.$row['Cargo_usu'].'" />';
	echo '</td>';
echo '</tr>';

echo '<tr>';
	echo '<td colspan="2" style="text-align:right">Usuario : </td>';
	echo '<td colspan="2" style="text-align:left">';
		echo '<input type="text" name="usuario" id="usuario" width="120px;" required="required" value="'.$row['Usuario'].'" />';
	echo '</td>';
echo '</tr>';

echo '<tr>';
	echo '<td colspan="2" style="text-align:right">Contrase&ntilde;a : </td>';
	echo '<td colspan="2" style="text-align:left">';
		echo '<input type="password" name="contraseña" id="contraseña" width="120px" required="required" value="'.$row['Password'].'" />';
	echo '</td>';
echo '</tr>';

echo '<tr>';
	echo '<td colspan="2" style="text-align:right">Verificar Contrase&ntilde;a : </td>';
	echo '<td colspan="2" style="text-align:left">';
		echo '<input type="password" name="contraseña2" id="contraseña2" width="120px" required="required" value="'.$row['Password'].'" />';
	echo '</td>';	
echo '</tr>';

echo '<tr>';
	echo '<td colspan="2" style="text-align:right">Tipo Usuario : </td>';
	echo '<td colspan="2" style="text-align:left">';	
		echo '<select name="tipo_usu" id="tipo_usu">';
			if($row['Tipo_usu'] == 1)
			{ echo '<option value="1" selected="selected" > General </option>'; }
			else
			{ echo '<option value="1" > General </option>'; }
			
			if($row['Tipo_usu'] == 2)
			{ echo '<option value="2" selected="selected" > Especial </option>'; }
			else
			{ echo '<option value="2" > Especial </option>'; }			
		echo '</select>';
	echo '</td>';
echo '</tr>';

$dia = substr($row['Fecha_Ingreso_usu'],0,2);
$mes = substr($row['Fecha_Ingreso_usu'],-7,-5);
$año = substr($row['Fecha_Ingreso_usu'],-4);

echo '<tr>';
	echo '<td colspan="2" style="text-align:right">Fecha Ingreso : </td>';
	echo '<td colspan="2" style="text-align:left">';
		echo '<input type="text" name="dia" id="dia" size="2" maxlength="2" onkeypress="ValidaSoloNumeros()" required="required" value="'.$dia.'" /> / ';
		echo '<input type="text" name="mes" id="mes" size="2" maxlength="2" onkeypress="ValidaSoloNumeros()" required="required" value="'.$mes.'" /> / ';
		echo '<input type="text" name="ano" id="ano" size="4" maxlength="4" onkeypress="ValidaSoloNumeros()" required="required" value="'.$año.'" />';
	echo '</td>';
echo '</tr>';

echo '<tr>';
	echo '<td colspan="2" style="text-align:right">Estado : </td>';
	echo '<td colspan="2" style="text-align:left">';
		echo '<select name="estado_usu" id="estado_usu">';
			if($row['Estado'] == 1)
			{ echo '<option value="1" selected="selected" > Activo </option>'; }
			else
			{ echo '<option value="1" > Activo </option>'; }
			
			if($row['Estado'] == 0)
			{ echo '<option value="0" selected="selected" > Inactivo </option>'; }
			else
			{ echo '<option value="0" > Inactivo </option>'; }
		echo '</select>';		
	echo '</td>';
echo '</tr>';

echo '<tr>';
	echo '<td colspan="4">';
		echo '<input type="image" src="Imagenes/BTNGUARDAR.jpg" style="width:100px; height:30px;" />';
	echo '</td>';
echo '</tr>';

echo '</table>';

?>