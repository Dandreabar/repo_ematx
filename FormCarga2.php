<?php
//mysql_connect("190.153.254.59", "dba_ematix","yazQkuZKPczRDzjjI0oi") or die ("Fallo la conexion : ".mysql_error());
//mysql_connect("localhost", "dba_ematix","yazQkuZKPczRDzjjI0oi") or die ("Fallo la conexion : ".mysql_error());
$link = mysqli_connect("localhost", "dba_ematix", "yazQkuZKPczRDzjjI0oi", "ematixdb");
//mysql_select_db("ematixdb") or die ("Error al seleccionar Base de Datos : ".mysql_error());
//mysql_query("SET NAMES 'utf8'");

$modo=$_GET['modo'];
$doc = "";

if($modo == 1)
{
	$Año=$_GET['Año'];
	//$Directorio = "C:/Alessandri/Liquidaciones/".$Año."/";
	$Directorio = "Liquidaciones/".$Año."/";
	?>	
    <select name="cbo_mes" id="cbo_mes"  style="font-size:16px;  " onchange="Enviar(3);return false;"  >
    <option>  Seleccione Mes... </option>	
    <?php
	
	if (is_dir($Directorio)) 
	{
		if ($dh = opendir($Directorio)) 
		{
			while (($file = readdir($dh)) !== false) 
			{
				if (is_dir($Directorio . $file) && $file!="." && $file!="..")
				{
					echo "<option value='$file'>".substr($file,3)."</option>";
				}
			}
			closedir($dh);
		}
	} 
  	?>
   	<?php	
}


if($modo == 2)
{
	$Año=$_GET['Año'];
	$Mes=$_GET['Mes'];
	//$Directorio = "C:/Alessandri/Liquidaciones/".$Año."/".$Mes."/";
	$Directorio = "Liquidaciones/".$Año."/".$Mes."/";
	
	?>	
    <select name="cbo_Archivo" id="cbo_Archivo"  style="font-size:16px; width:200px " onchange="Enviar(3);return false;"  >
    <option>Seleccione Documento...</option>	
    <?php
	if (is_dir($Directorio)) 
	{
		if ($dh = opendir($Directorio)) 
		{
			while (($file = readdir($dh)) !== false) 
			{
				if ($file != "." && $file !="..")
				{
					$doc = substr($file,23);
					//$doc = substr($doc,-4);					
					echo "<option value='$file'>".$doc."</option>";
				}
			}
			closedir($dh);
		}
	} 
  	?>
   	<?php	
}

if($modo == 3)
{
	$Año=$_GET['Año'];
	$Mes=$_GET['Mes'];
	$Arch=$_GET['Arch'];
	//$Directorio = "C:/Alessandri/Liquidaciones/".$Año."/".$Mes."/".$Arch;
	$Directorio = "Liquidaciones/".$Año."/".$Mes."/".$Arch;
	
	$pdf = $Directorio; 
	
	?>
    <div class="opciones">
    	<!--
        <div style="text-align:center; float:left; margin-right:20px;">
    		<!--<a target=\"_blank\" href="<?//php echo $pdf; ?>" > <img src="Imagenes/VER_PDF.png" /> </a>
		<img src="Imagenes/VER_PDF.png" onclick="window.open('<?//php echo $Directorio;?>');" />
    	</div>
        -->
        <div style="text-align:center;">    	
    		<a href="descarga.php?file=<?php echo $pdf ?>" > <img src="Imagenes/GUARDAR_PDF.png" /> </a>            
    	</div>
        
        
        
    </div>
    <?php	
}

if($modo == 9)
{
	$Año=$_GET['Año'];
	$Mes=$_GET['Mes'];
	//$Directorio = "C:/Alessandri/Liquidaciones/".$Año."/".$Mes."/";
	$Directorio = "Liquidaciones/".$Año."/".$Mes."/";
	
	
	
	?>
    	<div class="opciones2">
        <table border="1" bordercolor="#424242" class="grilla">
	<?php
	/*
	if (is_dir($Directorio)) 
	{		
		if ($dh = opendir($Directorio)) 
		{
			while (($file = readdir($dh)) !== false) 
			{
				if ($file != "." && $file !="..")
				{
					$doc = substr($file,23);					                	 
					echo "<tr>";
						echo "<td>";
                   			echo $doc;
                        echo "</td>";
                        echo "<td>";
							echo "<a href='descarga.php?file=$Directorio/$file'>";
                        	echo "<img src='Imagenes/pdf-icon-32x32.png' width='32px' height='32px' />";
							echo "</a>";
                        echo "</td>";
                   	echo "</tr>" ; 	
				}
			}
			closedir($dh);
		}
	}
	*/ 
	
		//$result = mysql_query("SELECT * FROM Usuario ORDER BY ApellidoP_usu ASC");
		$query = "SELECT * FROM Usuario ORDER BY ApellidoP_usu ASC";
		$result = mysqli_query($link, $query);
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			echo "<tr>";
				echo "<td>";
					echo $row['ApellidoP_usu']." ".$row['ApellidoM_usu']." ".$row['Nombre_usu'];
				echo "</td>";
				echo "<td>";				
					$file = "LiquidacionSueldos_Rut_".$row['Rut_usu'].".pdf";
					if(file_exists($Directorio."/".$file))
					{
						echo "<a href='descarga.php?file=$Directorio/$file'>";
                		echo "<img src='Imagenes/pdf-icon-32x32.png' width='32px' height='32px' />";
						echo "</a>";
					}
					else
					{
						echo "Sin Archivo";	
					}
               	echo "</td>";								
			echo "</tr>";
			//echo "<option value=".$row['Rut_usu']." >".$row['Nombre_usu']."</option>";         
		}
	
	
  	?>
    	</table>
    	</div>
   	<?php	
}

?>