<?php

$AñoD = $_GET['AñoD'];
$MesD = $_GET['MesD'];
$AñoH = $_GET['AñoH'];
$MesH = $_GET['MesH'];
$Rut = $_GET['Rut'];

$mes1 = substr($MesD,0,2);
$mes2 = substr($MesH,0,2);

$RutaInicio = "C:/Alessandri/Liquidaciones/".$AñoD."/".$MesD."/LiquidacionSueldos_Rut_".$Rut.".pdf";
$RutaFin = "C:/Alessandri/Liquidaciones/".$AñoH."/".$MesH."/LiquidacionSueldos_Rut_".$Rut.".pdf";

	$año = $AñoD;
	$mes = $mes1;		 
	echo "<table>";

//MINETRAS AÑOD SEA MENOS O IGUAL AL DE AÑOH
while($año <= $AñoH)
{
	//SI EL AÑO ES IGUAL AL AÑOH
	if( $año == $AñoH)
	{
		//SI EL AÑOD ES IGUAL AL AÑOH
		if($AñoD == $AñoH)
		{
			//MIENTRAS EL MES SEA IGUAL O MENOR A MESH
			while($mes <= $MesH)
			{
				echo "<tr>";
					$x="";
					// SI EL MES ES MENOS A 10 Y NO TIENE 0 AL COMIENZO SE AGREGA
					if($mes < 10 && substr($mes,0,1) != 0)
					{
						//SE AGREGA EL NOMBRE DEL MES PARA CREAR LA RUTA
						$x= "0".$mes;					
						switch($x)
						{
							case 01: $x = "01-Enero";break;
							case 02: $x = "02-Febrero";break;
							case 03: $x = "03-Marzo";break;
							case 04: $x = "04-Abril";break;
							case 05: $x = "05-Mayo";break;
							case 06: $x = "06-Junio";break;
							case 07: $x = "07-Julio";break;
							case 08: $x = "08-Agosto";break;
							case 09: $x = "09-Septiembre";break;
						}															
						$directorio = "C:/Alessandri/Liquidaciones/".$año."/".$x."/LiquidacionSueldos_Rut_".$Rut.".pdf";
						echo "<td>";
							echo "0$mes / $año ";
						echo "</td>";
						// SI EL ARCHIVO EXISTE
						if(file_exists($directorio))
						{						
							echo "<td>";
								echo "<a href='descarga.php?file=$directorio'>";
								echo "<img src='Imagenes/pdf-icon-32x32.png' width='32px' height='32px' />";
								echo "</a>";
							echo "</td>";						
						}
						// SI EL ARCHIVO NO EXISTE
						else
						{
							echo "<td>";
								echo "Sin Archivo";
								//echo $directorio;
							echo "</td>";		
						}
					}
					// SI EL MES ES MAYOR ES IGUAL O MAYOR A 10 O TIENE 0 AL COMIENZO
					else
					{	
						//SE AGREGA EL NOMBRE DEL MES PARA CREAR LA RUTA
						$x="";					
						switch($mes)
						{
							case 01: $x = "01-Enero";break;
							case 02: $x = "02-Febrero";break;
							case 03: $x = "03-Marzo";break;
							case 04: $x = "04-Abril";break;
							case 05: $x = "05-Mayo";break;
							case 06: $x = "06-Junio";break;
							case 07: $x = "07-Julio";break;
							case 08: $x = "08-Agosto";break;
							case 09: $x = "09-Septiembre";break;
							case 10: $x = "10-Octubre";break;
							case 11: $x = "11-Noviembre";break;
							case 12: $x = "12-Diciembre";break;
						}
						$directorio = "C:/Alessandri/Liquidaciones/".$año."/".$x."/LiquidacionSueldos_Rut_".$Rut.".pdf";
						echo "<td>";
							echo "$mes / $año";	
						echo "</td>";
						//SI EL ARCHIVO EXISTE
						if(file_exists($directorio))
						{						
							echo "<td>";
								echo "<a href='descarga.php?file=$directorio'>";
								echo "<img src='Imagenes/pdf-icon-32x32.png' width='32px' height='32px' />";
								echo "</a>";
							echo "</td>";						
						}
						// SI EL ARCHIVO NO EXISTE
						else
						{
							echo "<td>";
								echo "Sin Archivo";
								//echo $directorio;
							echo "</td>";		
						}
					}				
				echo "</tr>";
				$mes++;	
			}			 
		}		
		else
		{ 		
			$x = 1;
			//MIENTRAS MES SEA MENOS A MESH
			while($x <= $MesH)
			{
				echo "<tr>";
				$y="";
				// SI EL MES ES MENOS A 10 Y NO TIENE 0 AL COMIENZO SE AGREGA
				if($x < 10 && substr($x,0,1) != 0)
				{
					//SE AGREGA EL NOMBRE DEL MES PARA CREAR LA RUTA
					$y= "0".$x;					
					switch($y)
					{
						case 1: $y = "01-Enero";break;
						case 2: $y = "02-Febrero";break;
						case 3: $y = "03-Marzo";break;
						case 4: $y = "04-Abril";break;
						case 5: $y = "05-Mayo";break;
						case 6: $y = "06-Junio";break;
						case 7: $y = "07-Julio";break;
						case 8: $y = "08-Agosto";break;
						case 9: $y = "09-Septiembre";break;
					}															
					$directorio = "C:/Alessandri/Liquidaciones/".$año."/".$y."/LiquidacionSueldos_Rut_".$Rut.".pdf";
					echo "<td>";
						echo "0$x / $año ";
					echo "</td>";
					// SI EL ARCHIVO EXISTE
					if(file_exists($directorio))
					{						
						echo "<td>";
							echo "<a href='descarga.php?file=$directorio'>";
							echo "<img src='Imagenes/pdf-icon-32x32.png' width='32px' height='32px' />";
							echo "</a>";
						echo "</td>";						
					}
					// SI EL ARCHIVO NO EXISTE
					else
					{
						echo "<td>";
							echo "Sin Archivo";
							//echo $directorio;
						echo "</td>";		
					}
				}
				// SI EL MES ES MAYOR ES IGUAL O MAYOR A 10 O TIENE 0 AL COMIENZO
				else
				{	
					//SE AGREGA EL NOMBRE DEL MES PARA CREAR LA RUTA
					$y="";					
					switch($x)
					{
						case 01: $y = "01-Enero";break;
						case 02: $y = "02-Febrero";break;
						case 03: $y = "03-Marzo";break;
						case 04: $y = "04-Abril";break;
						case 05: $y = "05-Mayo";break;
						case 06: $y = "06-Junio";break;
						case 07: $y = "07-Julio";break;
						case 08: $y = "08-Agosto";break;
						case 09: $y = "09-Septiembre";break;
						case 10: $y = "10-Octubre";break;
						case 11: $y = "11-Noviembre";break;
						case 12: $y = "12-Diciembre";break;
					}
					$directorio = "C:/Alessandri/Liquidaciones/".$año."/".$y."/LiquidacionSueldos_Rut_".$Rut.".pdf";
					echo "<td>";
					echo "$x / $año";	
					echo "</td>";
					//SI EL ARCHIVO EXISTE
					if(file_exists($directorio))
					{						
						echo "<td>";
							echo "<a href='descarga.php?file=$directorio'>";
							echo "<img src='Imagenes/pdf-icon-32x32.png' width='32px' height='32px' />";
							echo "</a>";
						echo "</td>";						
					}
					// SI EL ARCHIVO NO EXISTE
					else
					{
						echo "<td>";
							echo "Sin Archivo";
							//echo $directorio;
						echo "</td>";		
					}
				}				
				echo "</tr>";;
				$x++;	
			}
		}	
	}
	//SI EL AÑO ES IGUAL AL AÑOD
	else if($año == $AñoD)
	{
		//MIENTRAS EL MESD SEA IGUAL O MENOS A 12
		while($mes <= 12)
		{
			echo "<tr>";
				$x="";
				// SI EL MES ES MENOS A 10 Y NO TIENE 0 AL COMIENZO SE AGREGA
				if($mes < 10 && substr($mes,0,1) != 0)
				{
					//SE AGREGA EL NOMBRE DEL MES PARA CREAR LA RUTA
					$x= "0".$mes;					
					switch($x)
					{
						case 01: $x = "01-Enero";break;
						case 02: $x = "02-Febrero";break;
						case 03: $x = "03-Marzo";break;
						case 04: $x = "04-Abril";break;
						case 05: $x = "05-Mayo";break;
						case 06: $x = "06-Junio";break;
						case 07: $x = "07-Julio";break;
						case 08: $x = "08-Agosto";break;
						case 09: $x = "09-Septiembre";break;
					}															
					$directorio = "C:/Alessandri/Liquidaciones/".$año."/".$x."/LiquidacionSueldos_Rut_".$Rut.".pdf";
					echo "<td>";
						echo "0$mes / $año ";
					echo "</td>";
					// SI EL ARCHIVO EXISTE
					if(file_exists($directorio))
					{						
						echo "<td>";
							echo "<a href='descarga.php?file=$directorio'>";
							echo "<img src='Imagenes/pdf-icon-32x32.png' width='32px' height='32px' />";
							echo "</a>";
						echo "</td>";						
					}
					// SI EL ARCHIVO NO EXISTE
					else
					{
						echo "<td>";
							echo "Sin Archivo";
							//echo $directorio;
						echo "</td>";		
					}
				}
				// SI EL MES ES MAYOR ES IGUAL O MAYOR A 10 O TIENE 0 AL COMIENZO
				else
				{	
					//SE AGREGA EL NOMBRE DEL MES PARA CREAR LA RUTA
					$x="";					
					switch($mes)
					{
						case 01: $x = "01-Enero";break;
						case 02: $x = "02-Febrero";break;
						case 03: $x = "03-Marzo";break;
						case 04: $x = "04-Abril";break;
						case 05: $x = "05-Mayo";break;
						case 06: $x = "06-Junio";break;
						case 07: $x = "07-Julio";break;
						case 08: $x = "08-Agosto";break;
						case 09: $x = "09-Septiembre";break;
						case 10: $x = "10-Octubre";break;
						case 11: $x = "11-Noviembre";break;
						case 12: $x = "12-Diciembre";break;
					}
					$directorio = "C:/Alessandri/Liquidaciones/".$año."/".$x."/LiquidacionSueldos_Rut_".$Rut.".pdf";
					echo "<td>";
					echo "$mes / $año";	
					echo "</td>";
					//SI EL ARCHIVO EXISTE
					if(file_exists($directorio))
					{						
						echo "<td>";
							echo "<a href='descarga.php?file=$directorio'>";
							echo "<img src='Imagenes/pdf-icon-32x32.png' width='32px' height='32px' />";
							echo "</a>";
						echo "</td>";						
					}
					// SI EL ARCHIVO NO EXISTE
					else
					{
						echo "<td>";
							echo "Sin Archivo";
							//echo $directorio;
						echo "</td>";		
					}
				}				
			echo "</tr>";
			$mes++;	
		}
	}
	else if($año > $AñoD && $año < $AñoH)
	{
		$x = 1;
		while($x <= 12)
		{
			echo "<tr>";
				$y="";
				// SI EL MES ES MENOS A 10 Y NO TIENE 0 AL COMIENZO SE AGREGA
				if($x < 10 && substr($x,0,1) != 0)
				{
					//SE AGREGA EL NOMBRE DEL MES PARA CREAR LA RUTA
					$y= "0".$x;					
					switch($y)
					{
						case 01: $y = "01-Enero";break;
						case 02: $y = "02-Febrero";break;
						case 03: $y = "03-Marzo";break;
						case 04: $y = "04-Abril";break;
						case 05: $y = "05-Mayo";break;
						case 06: $y = "06-Junio";break;
						case 07: $y = "07-Julio";break;
						case 08: $y = "08-Agosto";break;
						case 09: $y = "09-Septiembre";break;
					}															
					$directorio = "C:/Alessandri/Liquidaciones/".$año."/".$y."/LiquidacionSueldos_Rut_".$Rut.".pdf";
					echo "<td>";
						echo "0$x / $año ";
					echo "</td>";
					// SI EL ARCHIVO EXISTE
					if(file_exists($directorio))
					{						
						echo "<td>";
							echo "<a href='descarga.php?file=$directorio'>";
							echo "<img src='Imagenes/pdf-icon-32x32.png' width='32px' height='32px' />";
							echo "</a>";
						echo "</td>";						
					}
					// SI EL ARCHIVO NO EXISTE
					else
					{
						echo "<td>";
							echo "Sin Archivo";
							//echo $directorio;
						echo "</td>";		
					}
				}
				// SI EL MES ES MAYOR ES IGUAL O MAYOR A 10 O TIENE 0 AL COMIENZO
				else
				{	
					//SE AGREGA EL NOMBRE DEL MES PARA CREAR LA RUTA
					$y="";					
					switch($x)
					{
						case 01: $y = "01-Enero";break;
						case 02: $y = "02-Febrero";break;
						case 03: $y = "03-Marzo";break;
						case 04: $y = "04-Abril";break;
						case 05: $y = "05-Mayo";break;
						case 06: $y = "06-Junio";break;
						case 07: $y = "07-Julio";break;
						case 08: $y = "08-Agosto";break;
						case 09: $y = "09-Septiembre";break;
						case 10: $y = "10-Octubre";break;
						case 11: $y = "11-Noviembre";break;
						case 12: $y = "12-Diciembre";break;
					}
					$directorio = "C:/Alessandri/Liquidaciones/".$año."/".$y."/LiquidacionSueldos_Rut_".$Rut.".pdf";
					echo "<td>";
					echo "$x / $año";	
					echo "</td>";
					//SI EL ARCHIVO EXISTE
					if(file_exists($directorio))
					{						
						echo "<td>";
							echo "<a href='descarga.php?file=$directorio'>";
							echo "<img src='Imagenes/pdf-icon-32x32.png' width='32px' height='32px' />";
							echo "</a>";
						echo "</td>";						
					}
					// SI EL ARCHIVO NO EXISTE
					else
					{
						echo "<td>";
							echo "Sin Archivo";
							//echo $directorio;
						echo "</td>";		
					}
				}				
			echo "</tr>";;
			$x++	;
		}	
	}	
	$año++;
}

echo "</table>";

?>