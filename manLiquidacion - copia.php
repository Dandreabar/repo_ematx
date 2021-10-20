<?php
session_start();
if($usuario = $_SESSION['usuario'] == "")
{
	header("Location: index.php");  
}
$usuario = $_SESSION['usuario'];
$paterno = $_SESSION['APaterno'];
$Materno = $_SESSION['AMaterno'];
$cargo = $_SESSION['cargo'];
$rut = $_SESSION['rut'];
$dv = $_SESSION['Dv'];
$fecha = $_SESSION['fecha'];
$tusuario = $_SESSION['tipo_usuario'];



saldoVacaciones();

function saldoVacaciones(){
			
	setlocale(LC_ALL,"es_ES");
	$serverName = "ALESSANDRI08"; //serverName\instanceName
	$connectionInfo = array( "Database"=>"conmatix", "UID"=>"usr_conmatix", "PWD"=>"Oye7XG6CrI2ZjP3zZhZj");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	$rut = $_SESSION['rut'];

	if( $conn === false ) {
		die( print_r( sqlsrv_errors(), true));
	}
	
	$sql = "SELECT saldo_dias
			  from crios.Trabajador
			  where Empre_trab=  3
			  And Rut_trab = $rut 
			  And estado='VIGENTE';";
			  
	$stmt = sqlsrv_query( $conn, $sql );

	if( $stmt === false) {
		
		
		echo "No existe este Rut";
	}else{
		$diaSQL=0;
		while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
			$saldo = $row[0];

		
		}
	
	}
	if (!isset($saldo)) {
		$saldo=0;
	}
		
		//$saldo = ($saldoBase + $diasProgresivos ) - $diasTomados ;//sacar dias prograsivos, el 15 ahora es una variable nueva

		return round($saldo, 2);
}



function diasProgre(){

	setlocale(LC_ALL,"es_ES");
	$serverName = "ALESSANDRI08"; //serverName\instanceName
	$connectionInfo = array( "Database"=>"conmatix", "UID"=>"usr_conmatix", "PWD"=>"Oye7XG6CrI2ZjP3zZhZj");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	$rut = $_SESSION['rut'];



	if( $conn === false ) {
		die( print_r( sqlsrv_errors(), true));
	}
	
	$sql = "SELECT     Dias_DP
			FROM         crios.Dias_progresivo
			WHERE     (rut_DP = $rut) AND (Emp_DP = 3)
			ORDER BY Periodo_DP;";
			  
	$stmt = sqlsrv_query( $conn, $sql );

	if( $stmt === false) {
		
		echo "No existe este Rut";
	}else{
		
		while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
			
			$diasProgresivos = $row[0];
			
		}
	if (!isset($diasProgresivos)) {
		$diasProgresivos=0;
	}
		
	}
	
	return $diasProgresivos;
}



function diasAdmin(){
			
	setlocale(LC_ALL,"es_ES");
	$serverName = "ALESSANDRI08"; //serverName\instanceName
	$connectionInfo = array( "Database"=>"conmatix", "UID"=>"usr_conmatix", "PWD"=>"Oye7XG6CrI2ZjP3zZhZj");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	$rut = $_SESSION['rut'];

	if( $conn === false ) {
		die( print_r( sqlsrv_errors(), true));
	}

	$ano = date("Y");

	$sql = "SELECT sum(Dad_dia) as Cont from crios.DiasAd_Perso where Dad_ANO like '$ano'  And Dad_Rut= $rut;";
	$stmt = sqlsrv_query( $conn, $sql );

	if( $stmt === false) {
		//die( print_r( sqlsrv_errors(), true) );
		echo "No existe este Rut";
	}else{
		
		while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
			//echo $row[0].", ".$row[1].", ".$row[2]."<br />";
			  
			$dias = $row[0];
			
		}
		if($dias != 'NULL' and $dias>0 and $dias!=""){
			
			return $dias;
		}else{
			return '';
		}
		
			
	}
	
}

function textDiasAdmin(){
			
	setlocale(LC_ALL,"es_ES");
	$serverName = "ALESSANDRI08"; //serverName\instanceName
	$connectionInfo = array( "Database"=>"conmatix", "UID"=>"usr_conmatix", "PWD"=>"Oye7XG6CrI2ZjP3zZhZj");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	$rut = $_SESSION['rut'];

	if( $conn === false ) {
		die( print_r( sqlsrv_errors(), true));
	}



	$sql = "SELECT sum(Dad_dia) as Cont from crios.DiasAd_Perso where Dad_ANO like '2018%'  And Dad_Rut= $rut;";
	$stmt = sqlsrv_query( $conn, $sql );

	if( $stmt === false) {
		//die( print_r( sqlsrv_errors(), true) );
		echo "No existe este Rut";
	}else{
		
		while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
			//echo $row[0].", ".$row[1].", ".$row[2]."<br />";
			  
			$dias = $row[0];
			
		}
		if($dias != 'NULL' and $dias>0 and $dias!=""){
			
			return 'Dias Administrativos: ';
		}else{
			return '';
		}
		
			
	}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Remuneraciones</title>
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="style.css">
        
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
        			obj.open("GET", "FormCarga.php?Año="+año+"&modo=1" , true);
        			obj.send(null);
					break;
					
			case 2:
					año = document.getElementById('cbo_ano').value; 
					mes = document.getElementById('cbo_mes').value;       
        			obj.open("GET", "FormCarga.php?Mes="+mes+"&Año="+año+"&modo=2" , true);
        			obj.send(null);
					break;
					
			case 3:
					año = document.getElementById('cbo_ano').value; 
					mes = document.getElementById('cbo_mes').value;
					obj.open("GET", "FormCarga.php?Mes="+mes+"&Año="+año+"&modo=3" , true);
        			obj.send(null);
					break;
		}       
        return (true);
    }
	
	function Enviar2(modox) 
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
				switch(modox)
				{
					case 1: document.getElementById("Carga_MesD").innerHTML = obj.responseText; break;
					case 2: document.getElementById("Carga_MesH").innerHTML = obj.responseText; break;
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
			 		año = document.getElementById('cbo_anoD').value;   
        			obj.open("GET", "FormCarga.php?Ano="+año+"&modo=4" , true);
        			obj.send(null);
					break;
					
			case 2:
					año = document.getElementById('cbo_anoH').value;   
        			obj.open("GET", "FormCarga.php?Año="+año+"&modo=5" , true);
        			obj.send(null);
					break;			
		}       
        return (true);
    }
	
	function Valida() 
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
				document.getElementById("Carga_Documento").innerHTML = obj.responseText; 				                
            } 
			else 
			{
                //procesando...
                document.getElementById('cargando').innerHTML='&nbsp;&nbsp; <img src="Imagenes/loading.gif" width="16" height="16" alt="loading"/>Cargando...';
            }
        };		
		
			anoD = document.getElementById('cbo_anoD').value;
			anoH = document.getElementById('cbo_anoH').value;
			mesD = document.getElementById('cbo_mesD').value;
			mesH = document.getElementById('cbo_mesH').value;
									
			if( anoD <= anoH )
			{
				if( anoD == anoH )
				{
					if( mesD < mesH)
					{						
						obj.open("GET", "FormCarga.php?AñoD="+anoD+"&AñoH="+anoD+"&MesD="+mesD+"&MesH="+mesH+"&modo=9" , true);
	        			obj.send(null);						
					}
					else
					{
						if( mesD = mesH)
						{
							alert('La primera fecha no puede ser igual a la segunda')	
						}
						else
						{
							alert('La primera fecha no puede ser mayor a la segunda');
						}
					}
				}
				else
				{								
					obj.open("GET", "FormCarga.php?AñoD="+anoD+"&AñoH="+anoH+"&MesD="+mesD+"&MesH="+mesH+"&modo=9" , true);
	        		obj.send(null);						
				}
			}
			else
			{
				alert('La primera fecha no puede ser mayor a la segunda');
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
    	<a href="index.php" style="text-decoration:none" ><label style="font-size:16px; color:#FFF">Cerrar Sesión</label></a>
    </div>
    
    <div class="titulo">
    	<label> SISTEMA DE REMUNERACIONES </label>
    </div>
    
    <div class="cuerpo">
    	<table style="width:90%;">
        	<tr>
            	<td style="text-align:right; width:200px; height:30px;"><label style="margin-right:10px;">Nombre : </label></td>
                <td style="text-align:left;"><?php echo $usuario.' '.$paterno.' '.$Materno; ?></td>
                <td colspan="2" style="text-align:right;"><?php echo date('d/m/y'); ?></td>
            </tr>
            <tr>
            	<td style="text-align:right; width:200px; height:30px; "><label style="margin-right:10px;">Cargo : </label></td>
                <td style="text-align:left;"><?php echo $cargo; ?></td>
                <td colspan="2" style="text-align:right;">
								<?php 	if($tusuario == 2)
										{ 
											echo '<a href="ManOtroUsu.php" style="text-decoration: none; color:#FFF;"';											
											echo '<label style="margin-right:10px;">Otro Usuario</label>';
											echo '</a>';
										}
										
								?>                               
                </td>
            </tr>
            <tr>
            	<td style="text-align:right; width:200px; height:30px;"><label style="margin-right:10px;">Rut : </label></td>
                <td style="text-align:left;"><?php echo $rut."-".$dv; ?></td>
                <td colspan="2"style="text-align:right;">
								<?php 	if($tusuario == 2)
										{
											echo '<a href="OpManUsuarios.php" style="text-decoration: none; color:#FFF;">';
											echo '<label style="margin-right:10px;">Admi. Usuarios</label>'; 
											echo '</a>';	
										}
								?>                			
                </td>
            </tr>
            <tr>
            	<td style="text-align:right; width:200px; height:30px;"><label style="margin-right:10px;">Fecha De Ingreso : </label></td>
                <td style="text-align:left;"><?php echo $fecha; ?></td>
                <td colspan="2"style="text-align:right;">
					<?php 	if($tusuario == 2)
							{
								echo '<a href="tabla.php" style="text-decoration: none; color:#FFF;">';
								echo '<label style="margin-right:10px;">Admi. Vacaciones</label>'; 
								echo '</a>';	
							}
					?>  
				</td>
				<div id="cargando" style="text-align:right;"></div></td>
            </tr>
            <tr>
            	<td style="text-align:right; width:200px; height:30px;"><label style="margin-right:10px;">Saldo Vacaciones : </label></td>
                <td style="text-align:left;"><?php echo saldoVacaciones(); ?></td>
                <td colspan="2" ><div id="cargando" style="text-align:right;"></div></td>
            </tr>
            <tr>
            	<td style="text-align:right; width:200px; height:30px;"><label style="margin-right:10px;">Dias Progresivos : </label></td>
                <td style="text-align:left;"><?php echo diasProgre(); ?></td>
                <td colspan="2" ><div id="cargando" style="text-align:right;"></div></td>
            </tr>
            <tr>
            	<td style="text-align:right; width:200px; height:30px;"><label style="margin-right:10px;"><?php echo textDiasAdmin(); ?></label></td>
                <td style="text-align:left;"><?php echo diasAdmin(); ?></td>
                <td colspan="2" ><div id="cargando" style="text-align:right;"></div></td>
            </tr>
			



        </table>
    </div>
	
    <div class="filtros">
    <table width="90%" style="margin-left:45px;">
    	<tr> <td colspan="4" style="font-size:12px;"> <br /></td></tr>
    	<tr>
        	<td colspan="2" style="text-align:left; width:50%;">
            	<label>POR MES</label>
            </td>
            <td colspan="2" style="text-align:left; width:50%;">
            	<label>POR PERIODO</label>
            </td>
        </tr>
        <tr>
        	<td colspan="4"><br /></td>
        </tr>
        <tr>
        	<td width="100" style="text-align:left ; margin-right:0px;" >
            	<select name="cbo_ano" id="cbo_ano"  style="font-size:16px; height:30px; width:90px; " onchange="Enviar(1);return false;" >
                <option>A&ntilde;o...</option>
                <?php 
					//if (is_dir("C:/Alessandri/Liquidaciones/")) 
					if (is_dir("Liquidaciones/")) 
   					{
						//if ($dh = opendir("C:/Alessandri/Liquidaciones/")) 
						if ($dh = opendir("Liquidaciones/")) 
						{
							while (($file = readdir($dh)) !== false) 
							{	
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
                </select>
            </td>
        	<td width="294" style="text-align:left">            	
				<div id="Carga_Mes">
            		<select name="cbo_mes" id="cbo_mes"  style="font-size:16px; width:150px; height:30px; " >
                		<option>Mes...</option>
                	</select>
               	</div>
            </td>
            
            <td width="148" style=" margin-right:0px;">
            	<label style="font-size:14px; " >Desde</label>
            	<select name="cbo_anoD" id="cbo_anoD"  style="font-size:16px; height:30px; width:90px; " onchange="Enviar2(1);return false;"  >
                <option>A&ntilde;o...</option>
                <?php 
					//if (is_dir("C:/Alessandri/Liquidaciones/"))
					if (is_dir("Liquidaciones/")) 
   					{
						//if ($dh = opendir("C:/Alessandri/Liquidaciones/")) 
						if ($dh = opendir("Liquidaciones/")) 
						{
							while (($file = readdir($dh)) !== false) 
							{	
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
                </select>
            </td>
        	<td width="248" style="text-align:left">
            	<div id="Carga_MesD">
            		<select name="cbo_mesD" id="cbo_mesD"  style="font-size:16px; width:150px; height:30px; " >
                		<option>Mes...</option>
                	</select>
               	</div>
            </td>            	
        </tr>
        <tr>
       	  <td colspan="2"></td>
            <td >
	            <label style="font-size:14px; ">Hasta</label>
            	<select name="cbo_anoH" id="cbo_anoH"  style="font-size:16px; height:30px; width:90px;" onchange="Enviar2(2);return false;"  >
                <option>A&ntilde;o...</option>
                <?php 
					//if (is_dir("C:/Alessandri/Liquidaciones/"))
					if (is_dir("Liquidaciones/")) 
   					{
						//if ($dh = opendir("C:/Alessandri/Liquidaciones/"))
						if ($dh = opendir("Liquidaciones/")) 
						{
							while (($file = readdir($dh)) !== false) 
							{	
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
                </select>
            </td>
        	<td width="248" style="text-align:left">
            	<div id="Carga_MesH">
            		<select name="cbo_mesH" id="cbo_mesH"  style="font-size:16px; width:150px; height:30px; " >
                		<option>Mes...</option>
                	</select>
               	</div>
            </td>
        </tr>
        <tr>
        	<td><br /></td>            
        </tr>
        <tr>
        	<td colspan="4"> <img src="Imagenes/horizontal.png" width="100%" height="5px;"	 /></td>
        </tr>
        <tr>
        	<td colspan="4" style="text-align:center;">
            	<div id="Carga_Documento" class="carga">
        		</div>   
            	<!--<input type="submit" name="btn_Buscar"	id="btn_Buscar" value="BUSCAR" class="btnbuscar" />-->
            </td>
        </tr>
        
    </table>
    </div>
    
	
    
</body>
</html>