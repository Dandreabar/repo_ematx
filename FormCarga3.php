<?php
//mysql_connect("190.153.254.59", "dba_ematix","yazQkuZKPczRDzjjI0oi") or die ("Fallo la conexion : ".mysql_error());
//mysql_connect("localhost", "dba_ematix","yazQkuZKPczRDzjjI0oi") or die ("Fallo la conexion : ".mysql_error());
$link = mysqli_connect("localhost", "dba_ematix", "yazQkuZKPczRDzjjI0oi", "ematixdb");
//mysql_select_db("ematixdb") or die ("Error al seleccionar Base de Datos : ".mysql_error());
//mysql_query("SET NAMES 'utf8'");


$modo=$_GET['modo'];

if($modo == 1)
{
	$Año=$_GET['Año'];
	//$Directorio = "C:/Alessandri/Liquidaciones/".$Año."/";
	$Directorio = "Liquidaciones/".$Año."/";
	
	?>	
    <select name="cbo_mes2" id="cbo_mes2"  style="font-size:16px;  " onchange="Enviar2(2);return false;"  >
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
    <select name="cbo_Archivo2" id="cbo_Archivo2"  style="font-size:16px " onchange="Enviar2(3);return false;"  >
    <option>  Seleccione Doc... </option>	
    <?php
	/*************************************************************
	REEMPLAZAR CODIGO DE ABAJO POR UNO QUE SE CONECTE A BD Y EXTRAIGA LOS NOMBRE Y DEJE EL VALOR POR EL RUT
	*************************************************************/
	
	//$result = mysql_query("SELECT * FROM Usuario ORDER BY ApellidoP_usu ASC");
	$query = "SELECT * FROM Usuario ORDER BY ApellidoP_usu ASC";
	$result = mysqli_query($link, $query);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		echo "<option value=".$row['Rut_usu']." >".$row['ApellidoP_usu']." ".$row['ApellidoM_usu']." ".$row['Nombre_usu']."</option>";         
	}
	
			
	/*
	if (is_dir($Directorio)) 
	{
		if ($dh = opendir($Directorio)) 
		{
			while (($file = readdir($dh)) !== false) 
			{
				if ($file != "." && $file !="..")
				{
					echo "<option value='$file'>".substr($file,23)."</option>";
				}
			}
			closedir($dh);
		}
	}*/ 
	
	
  	?>
   	<?php	
}

if($modo == 3)
{
	$Año=$_GET['Año'];
	$Mes=$_GET['Mes'];
	$Doc="LiquidacionSueldos_Rut_".$_GET['Arch'].".pdf";
	
	//$Directorio = "C:/Alessandri/Liquidaciones/".$Año."/".$Mes."/".$Doc;
	$Directorio = "Liquidaciones/".$Año."/".$Mes."/".$Doc;
	//$result = mysql_query("SELECT * FROM Usuario WHERE rut_usu =".$_GET['Arch']);
	$query = "SELECT * FROM Usuario WHERE rut_usu =".$_GET['Arch'];
	$result = mysqli_query($link, $query);
	
	$pdf = substr($Doc,23);
	?>
    	<div class="opciones2">
        <table border="1" bordercolor="#424242" class="grilla">
	<?php				                	 
		if(file_exists($Directorio))
		{
			echo "<tr>";
				echo "<td>";
           			//echo $pdf;
					while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
					{
						echo $row['Nombre_usu']." ".$row['ApellidoP_usu']." ".$row['ApellidoM_usu'];         
					}
					//echo $result['Nombre_usu']." ".$row['ApellidoP_usu']." ".$row['ApellidoM_usu'];
         		echo "</td>";
            	echo "<td>";
					echo "<a href='descarga.php?file=$Directorio'>";
              			echo "<img src='Imagenes/pdf-icon-32x32.png' width='32px' height='32px' />";
					echo "</a>";
         		echo "</td>";
  	  		echo "</tr>" ;	
		}
		else
		{
			echo "<tr>";
				echo '<td colspan="4" style="text-align:center;" >';
					echo "No existe archivo para este usuario";
					//echo $Directorio;
				echo '</td>';
			echo "</tr>";	
		}
  	?>
    	</table>
    	</div>
   	<?php	
}

?>