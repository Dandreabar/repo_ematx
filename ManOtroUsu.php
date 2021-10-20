<html>
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Vacaciones</title>
        
       <script>
		function Enviar(modox) {       
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
				switch(modox)
				{
					case 1: document.getElementById("Carga_Mes").innerHTML = obj.responseText; break;
					case 2: document.getElementById("Carga_Archivo").innerHTML = obj.responseText; break;
					case 3: document.getElementById("Carga_Documento").innerHTML = obj.responseText; break;
				}
                
            } 
			else 
			{
                //procesando...
                document.getElementById('cargando').innerHTML='&nbsp;&nbsp; <img src="Imagenes/loading.gif" width="16" height="16" alt="loading"/>Cargando...';
            }
        };
		
		switch(modox)
		{
			case 1:					 
			 		año = document.getElementById('cbo_ano').value;   
        			obj.open("GET", "FormCarga2.php?Año="+año+"&modo=1" , true);
        			obj.send(null);
					break;
					
			case 2:
					año = document.getElementById('cbo_ano').value; 
					mes = document.getElementById('cbo_mes').value;       
        			obj.open("GET", "FormCarga2.php?Mes="+mes+"&Año="+año+"&modo=2" , true);
        			obj.send(null);
					break;
					
			case 3:
					año = document.getElementById('cbo_ano').value; 
					mes = document.getElementById('cbo_mes').value;
					//archivo = document.getElementById('cbo_Archivo').value;      
        			//obj.open("GET", "FormCarga.php?Mes="+mes+"&Año="+año+"&Arch="+archivo+"&modo=9" , true);
					obj.open("GET", "FormCarga2.php?Mes="+mes+"&Año="+año+"&modo=9" , true);
        			obj.send(null);
					break;
		}
       
        return (true);
    }
	
	
	function Enviar2(modox) {       
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
				document.getElementById('cargando2').innerHTML='';
				switch(modox)
				{
					case 1: document.getElementById("Carga_Mes2").innerHTML = obj.responseText; break;
					case 2: document.getElementById("Carga_Archivo2").innerHTML = obj.responseText; break;
					case 3: document.getElementById("Carga_Documento").innerHTML = obj.responseText; break;
				}
                
            } 
			else 
			{
                //procesando...
                document.getElementById('cargando2').innerHTML='&nbsp;&nbsp; <img src="Imagenes/loading.gif" width="16" height="16" alt="loading"/>Cargando...';
            }
        };
		
		switch(modox)
		{
			case 1:					 
			 		año = document.getElementById('cbo_ano2').value;   
        			obj.open("GET", "FormCarga3.php?Año="+año+"&modo=1" , true);
        			obj.send(null);
					break;
					
			case 2:
					año = document.getElementById('cbo_ano2').value; 
					mes = document.getElementById('cbo_mes2').value;       
        			obj.open("GET", "FormCarga3.php?Mes="+mes+"&Año="+año+"&modo=2" , true);
        			obj.send(null);
					break;
					
			case 3:
					año = document.getElementById('cbo_ano2').value; 
					mes = document.getElementById('cbo_mes2').value;
					archivo = document.getElementById('cbo_Archivo2').value;      
        			obj.open("GET", "FormCarga3.php?Mes="+mes+"&Año="+año+"&Arch="+archivo+"&modo=3" , true);
        			obj.send(null);
					break;
		}
       
        return (true);
    }
	
				
		</script> 
       
</head>    
<body>
<div class="cabecera">
    <br />
    <img src="Imagenes/logo_alessandri.png" height="28px" style="margin-left:20px;" />
</div>

<div style="margin-top:60px; text-align:right; margin-right:30px;">
	<a href="manLiquidacion.php" style="text-decoration:none"><label style="font-size:16px; color:#000">Volver</label></a>
</div>

	<div class="cuerpo2">
    <table class="table table-borderless table-dark">
    	<tr> <td colspan="4" style="font-size:12px;"> <br /></td></tr>
    	<tr>
        	<td></td>
        	<td colspan="3" style="text-align:left; width:50%;">
            	<label>BUSQUEDA LISTADO DE LIQUIDACIONES POR MES</label>
            </td>
		</tr>
        <tr> <td colspan="4" style="font-size:12px;"> <br /></td></tr>
        <tr>
        	<td style="width:20%"></td>
        	<td colspan="2">
            	<table>
                	<tr>
                		<td style="text-align:right; " colspan="2">
            				<select name="cbo_ano" id="cbo_ano"  style="font-size:16px; width:100px; " onChange="Enviar(1);return false;"  >
                            <option value="0" >A&ntilde;o...</option>   
                            <?php 
                                //if (is_dir("C:/Alessandri/Liquidaciones/"))
								if (is_dir("Liquidaciones/")) 
                                {
                                    //if ($dh = opendir("C:/Alessandri/Liquidaciones/")) 
									if ($dh = opendir("Liquidaciones/"))
                                    {
                                         while (($file = readdir($dh)) !== false) 
                                         {
                                            //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio
                                            //mostraría tanto archivos como directorios
                                            //if($file != "." && $file !="..")
                                            //echo "<br>Nombre de archivo: $file";
                                            //if (is_dir("C:/Alessandri/Liquidaciones/" . $file) && $file!="." && $file!="..")
											if (is_dir("Liquidaciones/" . $file) && $file!="." && $file!="..")
                                            {
                                               //solo si el archivo es un directorio, distinto que "." y ".."
                                               echo "<option value='$file'>".$file."</option>";
                                               //listar_directorios_ruta($ruta . $file . "/");
                                            }
                                        }
                                        closedir($dh);
                                    }
                                }						
                            ?>                                           
                        </td>                                
                        <td colspan="2">            	
                            <div id="Carga_Mes" style="text-align:left;">
                                <select name="cbo_mes" id="cbo_mes"  style="font-size:16px ; width:100px; " onchange="Enviar(3);return false;"  >
                                <option>Mes... </option>
                                </select>
                            </div>                     
         				</td>                
                	</tr>
                </table>
            </td>            
            <td style="width:20%"> <div id="cargando"></div> </td>
		</tr>
        <tr> <td colspan="4" style="font-size:12px;"> <br /></td></tr>
        <tr>
        	<td></td>
        	<td colspan="3" style="text-align:lef; width:50%;">
            	<label>BUSQUEDA DE LIQUIDACIONES POR USUARIO</label>
            </td>
        </tr>
        <tr>
        	<td colspan="4"><br /></td>
        </tr>
        <tr>
        	<td style="width:20%; "></td>
            <td colspan="2">
            	<table>
                	<tr>
                    	<td style="text-align:right;">
                            <select name="cbo_ano2" id="cbo_ano2"  style="font-size:16px; width:100px; " onChange="Enviar2(1);return false;"  >
                            <option value="0" >A&ntilde;o...</option>   
                            <?php 
                                //if (is_dir("C:/Alessandri/Liquidaciones/"))
								if (is_dir("Liquidaciones/")) 
                                {
									//if ($dh = opendir("C:/Alessandri/Liquidaciones/"))
                                    if ($dh = opendir("Liquidaciones/")) 
                                    {
                                         while (($file = readdir($dh)) !== false) 
                                         {
                                            //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio
                                            //mostraría tanto archivos como directorios
                                            //if($file != "." && $file !="..")
                                            //echo "<br>Nombre de archivo: $file";
                                            //if (is_dir("C:/Alessandri/Liquidaciones/" . $file) && $file!="." && $file!="..")
											if (is_dir("Liquidaciones/" . $file) && $file!="." && $file!="..")
                                            {
                                               //solo si el archivo es un directorio, distinto que "." y ".."
                                               echo "<option value='$file'>".$file."</option>";
                                               //listar_directorios_ruta($ruta . $file . "/");
                                            }
                                        }
                                        closedir($dh);
                                    }
                                }						
                            ?>                                           
       					</td>
            			<td>
            				<div id="Carga_Mes2">
                                <select name="cbo_mes2" id="cbo_mes2"  style="font-size:16px ; width:100; " onchange="Enviar2(2);return false;"  >
                                <option> Mes... </option>
                                </select>
                            </div>                     
            			</td>
            			<td>
                            <div id="Carga_Archivo2">
                                <select name="cbo_Archivo2" id="cbo_Archivo2"  style="font-size:16px; width:100px; " onChange="Enviar2(3);return false;" >
                                <option>Archivo... </option>
                                </select>
                            </div>                     	
                        </td>
                    </tr>
                </table>
            </td>            
            <td style="width:20%;">
            	<div id="cargando2"></div>
            </td>
        </tr>
        <tr>
        	<td colspan="4"><br /></td>
        </tr>        
     </table>
    
    </div>
    <div id="Carga_Documento" class="carga">
    </div> 
    

  
</body>
</html>