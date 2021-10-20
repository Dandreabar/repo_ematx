<?php
	//mysql_connect("190.153.254.59", "dba_ematix","yazQkuZKPczRDzjjI0oi") or die ("Fallo la conexion : ".mysql_error());
	//mysql_connect("localhost", "dba_ematix","yazQkuZKPczRDzjjI0oi") or die ("Fallo la conexion : ".mysql_error());
	$link = mysqli_connect("localhost", "dba_ematix", "yazQkuZKPczRDzjjI0oi", "ematixdb");
	//mysql_select_db("ematixdb") or die ("Error al seleccionar Base de Datos : ".mysql_error());
	//mysql_query("SET NAMES 'utf8'");
?>
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
function enviar()
{
	var obj = false;
        if (window.XMLHttpRequest) 
		{
            //Cuidado aqui, el objeto XMLHttpRequest no esta disponible en versiones previas a IE7
            obj = new XMLHttpRequest();
        } 
		else 
		{
            return false;
        }
        obj.onreadystatechange = function () 
		{
            if ( obj.readyState == 4 && (obj.status == 200 || window.location.href.indexOf ("http")==- 1)) 
			{
				document.getElementById('cargando').innerHTML='';
				document.getElementById("datosUsu").innerHTML = obj.responseText; 				                
            } 
			else 
			{
                //procesando...
                document.getElementById('cargando').innerHTML='&nbsp;&nbsp; <img src="Imagenes/loading.gif" width="16" height="16" alt="loading"/>Cargando...';
            }
        };		
			id = document.getElementById('id_usu').value;			
			obj.open("GET", "ManUsuariosModifica_datos.php?id="+id, true);
			obj.send(null);		
			return (true);		
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
<form action="ManUsuariosModifica_Carga.php" method="post" name="usuario" id="usuario" onsubmit="return ValidaContraseña(this);">
	<div id="cargando"></div>
    
    	<div class="cuerpo">
		<table width="90%" style="margin-left:45px;">
        	<tr>
            	<td style="text-align:right; width:40%;" colspan="2">Nombre:</td>
                <td colspan="2" style="text-align:left;">                	                  
                    <select name="id_usu" id="id_usu" required="required" onchange="enviar();return false;">
                    <option value="0" selected="selected"> </option>
					<?php
						//$result = mysql_query("SELECT * FROM Usuario ORDER BY ApellidoP_usu ASC");
						$query = "SELECT * FROM Usuario ORDER BY ApellidoP_usu ASC";
						$result = mysqli_query($link, $query);
						while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
						{
							echo "<option value=".$row['id_usuario']." >".$row['ApellidoP_usu']." ".$row['ApellidoM_usu']." ".$row['Nombre_usu']."</option>";         
						}
					?>
                    </select> 
               	</td>
            </tr>                    
        </table>
        <div id="datosUsu"></div>    
        
    </div>
</form>
<body>
</body>
</html>