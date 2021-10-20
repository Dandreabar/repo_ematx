<?php
session_start();
session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />		
		<title>Inicio De Sesion</title>
        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
    
    <form name="login" id="login" method="post" action="Conexion.php">      
    	<div class="logo">
        	<img src="Imagenes/logo_alessandri_blanco.png" height="28px"  />
        </div>

       	
    	<div class="login">
        	<div class="login2">        
        		<br />
			        <label class="label1">INGRESO SISTEMA DE REMUNERACIONES</label>
       			</div>
                <br /><br /><br />
                <table>
                	<tr> 
                    	<td class="tdlogin1" valign="top"> <label class="label2" > USUARIO </label> </td>
                        <td> <input type="text" name="admin" required="required"> </td>                       
                    </tr>
                    <!--
                    <tr> <td colspan="4" style="height:5px;"></td> </tr>
                    -->
                    <tr>
                    	<td class="tdlogin1" valign="top"> <label class="label2" > CONTRASE&Ntilde;A </label> </td>
                        <td> 
                        	<input type="password" name="password_usuario" required="required"> <br /> 
                            <label style="font-size:10px;" >(*)Presione ENTER para entrar</label><br />
                            <label style="font-size:10px;" >(*)Utilice Mozilla Firefox o Chrome</label>                      			
                        </td>
                    </tr>                    
                    
                    <tr>
                    	<!--
                    	<td colspan="4" style="height:15px; text-align:center;"></td> 
                        -->
                   	</tr>
                    
                    <tr> 
                    	<td colspan="4" style="height:px; text-align:center; visibility:hidden;" >
                        	<input type="submit" name="btnIngresar" id="btnIngresar" value="INGRESAR" class="btningresar" />
                        </td> 
                    </tr>                    
                </table>                
    	</div>
        </form>
	</body>
</html>