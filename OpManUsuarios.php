<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mantencion Usuarios</title>
<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="style.css">
<script>
function ValidaSoloNumeros() {
 if ((event.keyCode < 48) || (event.keyCode > 57)) 
  event.returnValue = false;
}
</script>
</head>
<div class="cabecera">
    <br />
    <img src="Imagenes/logo_alessandri.png" height="28px" style="margin-left:20px;" />
</div>
<div style="margin-top:60px; text-align:right; margin-right:30px;">
	<a href="manLiquidacion.php" style="text-decoration:none"><label style="font-size:16px; color:#FFF">Volver</label></a>
</div>

<form action="ManUsuarios_Carga.php" method="post" name="usuario" id="usuario">
	<div class="cuerpo">
		<table width="90%" style="margin-left:45px;">
        	<tr>
            	<td style="text-align:right;">
                	<a href="ManUsuarios.php" >
                    	<img src="Imagenes/BTNREGISTRAR.jpg" />
                    </a>
                </td>
                <td style="text-align:left;">
                	<a href="ManUsuariosModifica.php" >
                    	<img src="Imagenes/BTNMODIFICAR.jpg" />
                   	</a>
                </td>
            </tr>
        </table>
    </div>
</form>
<body>
</body>
</html>