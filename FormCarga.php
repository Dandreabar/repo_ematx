<?php
session_start();
$modo=$_GET['modo'];
$doc = "";
$rut = $_SESSION['rut'];

if($modo == 1)
{
	$Año=$_GET['Año'];	
	//$Directorio = "C:/Alessandri/Liquidaciones/".$Año."/";
	$Directorio = "Liquidaciones/".$Año."/";
	?>	
    <select name="cbo_mes" id="cbo_mes"  style="font-size:16px; width:150px; height:30px; " onchange="Enviar(3);return false;"  >
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
}

if($modo == 3)
{
	$Año=$_GET['Año'];
	$Mes=$_GET['Mes'];
	$Arch = "LiquidacionSueldos_Rut_".$rut.".pdf";	
	//$Directorio = "C:/Alessandri/Liquidaciones/".$Año."/".$Mes."/".$Arch;
	$Directorio = "Liquidaciones/".$Año."/".$Mes."/".$Arch;
	
	$pdf = $Directorio; 
	
	?>
    <div>
    	<div style="text-align:center;">    	
        <?php
			if(file_exists($Directorio))
			{
		?>
    		<a href="descarga.php?file=<?php echo $pdf ?>" style="text-decoration: none;">
            	<!--input type="submit" name="btn_Buscar" id="btn_Buscar" value="BUSCAR" class="btnbuscar" />-->
                <img src="Imagenes/btnBuscar.png" alt="Buscar" />
            </a>
         <?php
			}
			else
			{ echo "Archivo no encontrado";}
		 ?>    
       	</div>
    </div>
    <?php	
}

if($modo == 100)
{
	$Año=$_GET['Año'];
	$Mes=$_GET['Mes'];
	$Arc = "LiquidacionSueldos_Rut_".$rut.".pdf";
	//$Directorio = "C:/Alessandri/Liquidaciones/".$Año."/".$Mes."/";
	$Directorio = "Liquidaciones/".$Año."/".$Mes."/";
	?>
    	<div class="opciones">
        <table border="1" bordercolor="#424242" class="grilla">
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
  	?>
    	</table>
    	</div>
   	<?php	
}

/***************************************************************************************************************************************/

if($modo == 4)
{
	$Año=$_GET['Ano'];
	//$Directorio = "C:/Alessandri/Liquidaciones/".$Año."/";
	$Directorio = "Liquidaciones/".$Año."/";
	?>	
    <select name="cbo_mesD" id="cbo_mesD" style="font-size:16px; width:150px; height:30px; " onchange="Valida();return false;"  >
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
}

if($modo == 5)
{
	$Año=$_GET['Año'];
	//$Directorio = "C:/Alessandri/Liquidaciones/".$Año."/";
	$Directorio = "Liquidaciones/".$Año."/";
	?>	
    <select name="cbo_mesH" id="cbo_mesH" style="font-size:16px; width:150px; height:30px; " onchange="Valida();return false;"  >
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
}


if($modo == 7)
{
	$Año=$_GET['Año'];
	$Mes=$_GET['Mes'];
	//$Directorio = "C:/Alessandri/Liquidaciones/".$Año."/".$Mes."/";
	$Directorio = "Liquidaciones/".$Año."/".$Mes."/";
	?>	
    <select name="cbo_Archivo" id="cbo_Archivo"  style="font-size:16px; width:200px " onchange="Valida();return false;"  >
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
}

if($modo == 9 )
{
	$AñoD=$_GET['AñoD'];
	$AñoH=$_GET['AñoH'];
	$MesD=$_GET['MesD'];
	$MesH=$_GET['MesH'];
	$Arch = "LiquidacionSueldos_Rut_".$rut.".pdf";	
	//$Directorio = "C:/Alessandri/Liquidaciones/".$Año."/".$Mes."/".$Arch;
	
	//$pdf = $Directorio; 
	$pdf = $AñoD."/".$MesD." - ".$AñoH."/".$MesH.".pdf"; 
	
	if( $AñoD != 0 &&  $MesD != 0 && $AñoH != 0 && $MesH != 0 && $AñoD != "" &&  $MesD != "" && $AñoH != "" && $MesH != "" )
	{
	?>
    	<div>
    		<div style="text-align:center;">
    			<a href="ListLiquidaciones.php?<?php echo "AñoD=$AñoD&AñoH=$AñoH&MesD=$MesD&MesH=$MesH&Rut=$rut"; ?>" style="text-decoration: none;" target="_blank">
                	<!--<input type="submit" name="btn_Buscar" id="btn_Buscar" value="BUSCAR" class="btnbuscar" />-->
                    <img src="Imagenes/btnBuscar.png" alt="Buscar" />
                </a>            
       		</div>
    	</div>
    <?php
	}		
}
?>