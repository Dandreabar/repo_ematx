<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mantencion Usuarios</title>
<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="style.css">
<script>
function ValidaSoloNumeros() 
{
 	if ((event.keyCode < 48) || (event.keyCode > 57)) 
	event.returnValue = false;
}

function ValidaContraseña()
{
	contraseña1 = document.getElementById('contraseña').value;
	contraseña2 = document.getElementById('contraseña2').value;
	if(contraseña1 !== contraseña2)
	{
		alert('las contraseñas no son iguales');
		return false;	
	}
	else
	{
		return true;	
	}
}
</script>
</head>
<div class="cabecera">
    <br />
    <img src="Imagenes/logo_alessandri.png" height="28px" style="margin-left:20px;" />
</div>
<div style="margin-top:60px; text-align:right; margin-right:30px;">
	<a href="OpManUsuarios.php" style="text-decoration:none"><label style="font-size:16px; color:#FFF">Volver</label></a>
</div>
<form action="ManUsuarios_Carga.php" method="post" name="usuario" id="usuario" onsubmit="return ValidaContraseña(this);">
	<div class="cuerpo">
		<table width="90%" style="margin-left:45px;">
        	<tr>
            	<td style="text-align:right; width:40%;" colspan="2">Nombre:</td>
                <td colspan="2" style="text-align:left;">
                	<input type="text" name="nombre" id="nombre" maxlength="50" size="50" required="required"  /> 
               	</td>
            </tr>
            <tr>
            	<td style="text-align:right; width:40%;" colspan="2">Apellido Paterno:</td>
                <td colspan="2" style="text-align:left;">
                	<input type="text" name="paterno" id="paterno" maxlength="50" size="50" required="required"  /> 
               	</td>
            </tr>
            <tr>
            	<td style="text-align:right; width:40%;" colspan="2">Apellido Materno:</td>
                <td colspan="2" style="text-align:left;">
                	<input type="text" name="materno" id="materno" maxlength="50" size="50" required="required"  /> 
               	</td>
            </tr>
            <tr>
            	<td style="text-align:right; width:40%;" colspan="2">Rut: </td>
                <td colspan="2" style="text-align:left;">
                	<input type="text" name="rut" id="rut" maxlength="8" required="required" onkeypress="ValidaSoloNumeros()" size="8" /> - 
                    <input type="text" name="dv" dir="dv"  required="required" size="1" maxlength="1" />
              	</td>
            </tr>
            <tr>
            	<td style="text-align:right; width:40%;" colspan="2">Cargo : </td>
                <td colspan="2" style="text-align:left">
                	<input type="text" name="cargo" id="cargo" maxlength="50" size="50" required="required" />
                </td>
            </tr>
            <tr>
            	<td colspan="2" style="text-align:right">Usuario : </td>
                <td colspan="2" style="text-align:left"> 
                	<input type="text" name="usuario" id="usuario" width="120px;" required="required" />
                </td>
            </tr>           
            <tr>
            	<td colspan="2" style="text-align:right">Contrase&ntilde;a : </td>
                <td colspan="2" style="text-align:left">
                	<input type="password" name="contraseña" id="contraseña" width="120px" required="required" />
                </td>
            </tr>
            <tr>
            	<td colspan="2" style="text-align:right">Verificar Contrase&ntilde;a : </td>
                <td colspan="2" style="text-align:left">
                	<input type="password" name="contraseña2" id="contraseña2" width="120px" required="required" />
                </td>
            </tr>
            <tr>
            	<td colspan="2" style="text-align:right">Tipo Usuario : </td>
                <td colspan="2" style="text-align:left">
                	<select name="tipo_usu" id="tipo_usu">
                    <option value="1" selected="selected"> General </option>
                    <option value="2" > Especial </option>
                    </select>
               	</td>
            </tr>
            <tr>
            	<td colspan="2" style="text-align:right">Fecha Ingreso : </td>
                <td colspan="2" style="text-align:left">
                	<input type="text" name="dia" id="dia" size="2" maxlength="2" onkeypress="ValidaSoloNumeros()" required="required" /> /
                    <input type="text" name="mes" id="mes" size="2" maxlength="2" onkeypress="ValidaSoloNumeros()" required="required" /> /
                    <input type="text" name="ano" id="ano" size="4" maxlength="4" onkeypress="ValidaSoloNumeros()" required="required" />
                </td>
            </tr>
            <!--<tr>
            	<td colspan="2" style="text-align:right">Estado : </td>
                <td colspan="2" style="text-align:left">
                	<select name="estado" id="estado">
                    <option value="1" selected="selected"> Activo </option>
                    <option value="2" > Inactivo </option>
                    </select>
                </td>                	
            </tr>-->
            <tr>
            	<td colspan="4">
                	<br />
            	</td>
            </tr>
            <tr>
            	<td colspan="4">
                	<!--<input type="submit" name="guardar" id="guardar" value="GUARDAR" />-->
                    <input type="image" src="Imagenes/BTNGUARDAR.jpg" style="width:100px; height:30px;" />
                </td>
            </tr>
        </table>
    </div>
</form>
<body>
</body>
</html>