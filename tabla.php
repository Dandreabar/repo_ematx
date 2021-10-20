<?php
session_start();
if($usuario = $_SESSION['usuario'] == "")
{
	header("Location: index.php");  
}

$tusuario = $_SESSION['tipo_usuario'];
if($tusuario==1){
	header("Location: index.php");  
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
	

<script language="javascript">
function doSearch(){

var tableReg = document.getElementById('datos');

var searchText = document.getElementById('searchTerm').value.toLowerCase();

var cellsOfRow="";

var found=false;

var compareWith="";



// Recorremos todas las filas con contenido de la tabla

	for (var i = 1; i < tableReg.rows.length; i++){

		cellsOfRow = tableReg.rows[i].getElementsByTagName('td');

		found = false;

		// Recorremos todas las celdas

		for (var j = 0; j < cellsOfRow.length && !found; j++){

			compareWith = cellsOfRow[j].innerHTML.toLowerCase();

			// Buscamos el texto en el contenido de la celda

			if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1)){

				found = true;

			}

		}

		if(found){

			tableReg.rows[i].style.display = '';

		} else {

			// si no ha encontrado ninguna coincidencia, esconde la

			// fila de la tabla

			tableReg.rows[i].style.display = 'none';

		}

	}

}
</script>    
</head>   
<div class="cabecera">
    <br />
    <img src="Imagenes/logo_alessandri.png" height="28px" style="margin-left:20px;" />
	<div style="margin-top:0px; text-align:right; margin-right:30px;">
    	<a href="manLiquidacion.php" style="text-decoration:none" ><label style="font-size:16px; color:#000">Volver</label></a>
    </div>
</div>

	<div class="cuerpo2">
		<table width="90%" style="margin-left:45px;">
        	<tr><td colspan="4" style="font-size:12px;"><br /></td></tr>
            <tr>
            	<td colspan="3" style="text-align:left; width:50%;">
            	    
					<form>

						Buscar: <input id="searchTerm" type="text" onkeyup="doSearch()" />

					</form>
            	    
				</td>
				<td>
				Mostrar saldo:
				  <select name="deporte">

					<option>Si</option>

					<option>No</option>

					</select>
				</td>
                <td colspan="2" style="text-align:left;">          
                
    
                    
               	</td>
            </tr> 			
        </table>
        
        <tr>
        	<td colspan="4"><br /></td>
        </tr>        
     </table>

    </div>
	
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
</body>

</html>

<?php


		
	setlocale(LC_ALL,"es_ES");
	$serverName = "ALESSANDRI08"; //serverName\instanceName
	$connectionInfo = array( "Database"=>"conmatix", "UID"=>"usr_conmatix", "PWD"=>"Oye7XG6CrI2ZjP3zZhZj");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	


	if( $conn === false ) {
		die( print_r( sqlsrv_errors(), true));
	}


	
	echo '<table class="table table-hover table-dark" id="datos"><tr><td>Rut</td><td>Nombre Completo</td><td>Saldo</td>
	<td>Dias Progre.</td><td>D. Prog. Pagado</td><td>Dias Admin.</td></tr>';
	
	$sql = "select Rut_trab,Dv_trab,Nombre_trab,Ape1_trab,Ape2_trab from crios.trabajador where estado like 'VIGENTE%' AND (Empre_trab = 3);";
	$stmt = sqlsrv_query( $conn, $sql );
	
	
	
	
	
	
	if( $stmt === false) {
		//die( print_r( sqlsrv_errors(), true) );
		echo "No existe este Rut";
	}else{
		
		while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
			
			
			$rut = $row[0];
			$dvRut = $row[1];
			
			$nombreTrab = $row[2];
			$ape1Trab = $row[3];
			$ape2Trab = $row[4];
			
			$saldo = saldoVacaciones($rut);
			//$periodo = periodo($rut);
			$diasProgre = diasProgre($rut);
			$diasProgrePagado = diasProgrePagado($rut);
			$ano = date("Y");
			$diasAdmin = diasAdmin($rut,$ano);
			
			
			
			echo '<tr>';
			echo '<td>'. $rut."-".$dvRut.'</td>';
			echo '<td>'. $nombreTrab." ".$ape1Trab." ".$ape2Trab.'</td>';
			echo '<td>'. $saldo.'</td>';
			//echo '<td>'. $periodo.'</td>';
			echo '<td>'. $diasProgre.'</td>';
			echo '<td>'. $diasProgrePagado.'</td>';
			echo '<td>'. $diasAdmin.'</td>';
			echo '</tr>';
			
		}
	}
	
	echo '<table>';
	
	
		
function saldoVacaciones($rut){			
	setlocale(LC_ALL,"es_ES");
	$serverName = "ALESSANDRI08"; //serverName\instanceName
	$connectionInfo = array( "Database"=>"conmatix", "UID"=>"usr_conmatix", "PWD"=>"Oye7XG6CrI2ZjP3zZhZj");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	//$rut = $_SESSION['rut'];
	//echo $rut.",";
	if( $conn === false ) {
		die( print_r( sqlsrv_errors(), true));
	}
	
	$sql = "SELECT saldo_dias,Sdfut
			  from crios.Trabajador
			  where Empre_trab=  3
			  And Rut_trab = $rut 
			  And estado='VIGENTE';";
			  
	$stmt = sqlsrv_query( $conn, $sql );

	if( $stmt === false) {
		
		
		echo "No existe este Rut";
	}else{
		$diaSQL=0;
		$saldo =0;
		while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
			$saldo = $row[0];
			$saldoResta = $row[1];

		
		}
		
		//$saldo = ($saldoBase + $diasProgresivos ) - $diasTomados ;//sacar dias prograsivos, el 15 ahora es una variable nueva

		return round(($saldo-0), 2);
	
	}
}
		



function diasAdmin($rut,$ano){
			
	setlocale(LC_ALL,"es_ES");
	$serverName = "ALESSANDRI08"; //serverName\instanceName
	$connectionInfo = array( "Database"=>"conmatix", "UID"=>"usr_conmatix", "PWD"=>"Oye7XG6CrI2ZjP3zZhZj");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	
	if( $conn === false ) {
		die( print_r( sqlsrv_errors(), true));
	}
	
	//---------------------------------------------------------------------

	$sql = "SELECT     DiasAdmin_trab
			FROM         crios.Trabajador
			WHERE     (Rut_trab = $rut);";
	$stmt = sqlsrv_query( $conn, $sql );

	if( $stmt === false) {
		
		echo "No existe este Rut";
	}else{
		
		while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
			
			$dAdmin = $row[0];
			
		}
		$conDiasAdmin=false;
		if($dAdmin != 'NULL' and $dAdmin>0 and $dAdmin!="" and $dAdmin==1){
			$dAdmin=5;
			$conDiasAdmin=true;
		}else{
			$dAdmin=0;
			return $dAdmin;
		}
		
			
	}





	//---------------------------------------------------------------------

	$sql = "SELECT sum(Dad_dia) as Cont from crios.DiasAd_Perso where Dad_ANO like '$ano%'  And Dad_Rut= $rut;";
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
			
			return $dAdmin-$dias;
		}else if($conDiasAdmin){
			return $dAdmin;
		}else{
			
			return $dAdmin;
		}
		
			
	}
	
}		

function diasProgrePagado($rut){
	setlocale(LC_ALL,"es_ES");
	$serverName = "ALESSANDRI08"; //serverName\instanceName
	$connectionInfo = array( "Database"=>"conmatix", "UID"=>"usr_conmatix", "PWD"=>"Oye7XG6CrI2ZjP3zZhZj");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	//$rut = $_SESSION['rut'];

//echo $rut;

	if( $conn === false ) {
		die( print_r( sqlsrv_errors(), true));
	}
	
	$sql = "SELECT     DiasNoPag_DP
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
		
	}
	if (!isset($diasProgresivos)) {
		$diasProgresivos=0;
	}
	
	return $diasProgresivos;
}
	
function diasProgre($rut){

	setlocale(LC_ALL,"es_ES");
	$serverName = "ALESSANDRI08"; //serverName\instanceName
	$connectionInfo = array( "Database"=>"conmatix", "UID"=>"usr_conmatix", "PWD"=>"Oye7XG6CrI2ZjP3zZhZj");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	//$rut = $_SESSION['rut'];



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
		
		
		$sql = "SELECT     Activondp_trab
			FROM         crios.trabajador
			WHERE     (Rut_trab = $rut) ";
		  
		$stmt = sqlsrv_query( $conn, $sql );
		
		if( $stmt === false) {
		
		echo "No existe este Rut";
		}else{
			while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
			
				$activoTrab = $row[0];
			
			}
			
			if($activoTrab==1){
				return 0;
			}
		}
		
		
		
		
	if (!isset($diasProgresivos)) {
		$diasProgresivos=0;
	}
		
	}
	
	return $diasProgresivos;
}
	
		
function periodo($rut){
			
	setlocale(LC_ALL,"es_ES");
	$serverName = "ALESSANDRI08"; //serverName\instanceName
	$connectionInfo = array( "Database"=>"conmatix", "UID"=>"usr_conmatix", "PWD"=>"Oye7XG6CrI2ZjP3zZhZj");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	

	$dia = date("d");
	$mes = date("m");
	$ano = date("Y");

	$periodo = "";

	$fecha2= (int) $ano.$mes.$dia;


	if( $conn === false ) {
		die( print_r( sqlsrv_errors(), true));
	}



	$sql = "SELECT Nombre_trab,Rut_trab,Convert(Varchar(10),FecIng_Trab,101) 
			  from crios.Trabajador
			  where Empre_trab=  3
			  And Rut_trab = $rut 
			  And estado='VIGENTE';";
			  
	$stmt = sqlsrv_query( $conn, $sql );

	if( $stmt === false) {
		//die( print_r( sqlsrv_errors(), true) );
		echo "No existe este Rut";
	}else{
		
		while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
			//echo $row[0].", ".$row[1].", ".$row[2]."<br />";
			  
			$date = date_create($row[2]);

			$diaSQL =date_format($date, 'd');
			$mesSQL =date_format($date, 'm');
			$AnoSQL =date_format($date, 'Y');
			
		}
				
		
		$dif1 = $diaSQL-$dia;//1
		$dif2 = $mesSQL-$mes;//-2

		if ($dif2>0){
			
			$Periodoed = ($ano-1)."-".$ano;
		}else if($dif1>0 and $dif2==0){
			
			$Periodoed = ($ano-1)."-".$ano;
		}else{
			$Periodoed = $ano."-".($ano+1);
		}
		return $Periodoed;
		  
			//echo $Periodoed;
			
			$sql="select sum(dTom_fecv)
					from crios.FechaVac 
					Where Ano_FecV ='$Periodoed' 
					and Rut_FecV= $rut 
					AND Empre_FecV=3;";
					
					
			$stmt = sqlsrv_query( $conn, $sql );
		if( $stmt === false) {
			//die( print_r( sqlsrv_errors(), true) );
			echo "No existe este Rut2";
		die( print_r( sqlsrv_errors(), true) );
		}else{
			
			
			while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
				$diasTomados = $row[0];
				
			}
			//echo $diasTomados;
			$sql="select dprog_Fecv 
					from crios.FechaVac 
					Where Ano_FecV ='$Periodoed'
				   and Rut_FecV= $rut 
				   AND Empre_FecV=3;";
				
			$stmt = sqlsrv_query( $conn, $sql );
			
			if( $stmt === false) {
				echo "No existe este Rut2";
			}else{
				$diasProgresivos=0;
				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
					$diasProgresivos = $row[0];
					
				}
				//echo $diasProgresivos;
				
				$saldo = (15 + $diasProgresivos ) - $diasTomados ;
				//echo "Saldo: ".$saldo." dias";
				return $saldo;
			}
			
		}
	}
}
?>