<?php
saldoVacaciones();

function saldoVacaciones(){
			
	setlocale(LC_ALL,"es_ES");
	$serverName = "ALESSANDRI08"; //serverName\instanceName
	$connectionInfo = array( "Database"=>"conmatix", "UID"=>"usr_conmatix", "PWD"=>"Oye7XG6CrI2ZjP3zZhZj");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	$rut = 13055584;

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
		$diaSQL=0;
		while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
			//echo $row[0].", ".$row[1].", ".$row[2]."<br />";
			  
			$date = date_create($row[2]);

			$diaSQL =date_format($date, 'd');
			$mesSQL =date_format($date, 'm');
			$AnoSQL =date_format($date, 'Y');


			
		}
		if($diaSQL==null){
			$diaSQL=0;
			$mesSQL=0;
			$AnoSQL=0;
		}
		
	
	
		
	$dif1 = $diaSQL-$dia;//1
	$dif2 = $mesSQL-$mes;//-2
	
	if ($dif2>0){
		
		$Periodoed = ($ano-1)."-".$ano;
		
		
		
		$difDia = 0;
		
		
		
		
		
		$difDia = 1.25/30 * $difDia;
		
		$mes12 = 12 - $mesSQL;
		$difMes = $mes12+$mes;
		$difMes = $difMes * 1.25;
		
		
	}else if($dif1>0 and $dif2==0){
		
		$Periodoed = ($ano-1)."-".$ano;
		
		if($dia > $diaSQL){
			
			$difDia = abs($dia - $diaSQL);
			$difDia = 1.25/30 * $difDia;
			
			$difMes = 11;
			$difMes = $difMes * 1.25;
		}else{
			
			
			$difDia = abs($dia - $diaSQL);
			$difDia = 1.25/30 * $difDia;
			
			$difMes = 0;
			$difMes = $difMes * 1.25;
		}
		
		
	}else{
		$Periodoed = $ano."-".($ano+1);
		
		$difDia = abs($dia - $diaSQL);
		$difDia = 1.25/30 * $difDia;
		
		$difMes = abs($mes - $mesSQL);
		$difMes = $difMes * 1.25;
		
	}
	//mesSQl =10, diaSQl=1 
	// mes=   1 ,  dia = 2
	
	
	
	
	//-----------------------------------------
	
	
	
	
	$anoMenos = false;
	
	if($mes > $mesSQL){
		
		$anoMenos=false;
		$Periodoed = $ano."-".($ano+1);
		
	}else if($mes < $mesSQL){
		
		$anoMenos=true;
		$Periodoed = ($ano-1)."-".$ano;
		
	}else{
		if($dia > $diaSQL){
			
			$anoMenos=true;
			$Periodoed = ($ano-1)."-".$ano;
		
		}else if($dia < $diaSQL){
			
			$anoMenos=false;
			$Periodoed = $ano."-".($ano+1);	
			
		}else{
			
			$anoMenos=false;
			$Periodoed = $ano."-".($ano+1);	
			
		}
		
	}
	
	if($anoMenos){
		$anoPeriodo = $ano-1;
	}else{
		$anoPeriodo = $ano;
	}
	//echo "Año: ".$anoPeriodo;
	
	
	

//echo "Dias:".$dias;
	
	if($ano != $anoPeriodo){
		
		$fecha1=mktime(0,0,0,"$mesSQL","$diaSQL","$anoPeriodo");
		$fecha2=mktime(0,0,0,"$mes","$dia","$ano");

		$diferencia=$fecha2-$fecha1;
		$dias=$diferencia/(60*60*24);

		echo $dias;
		
	}else{
		
		$fecha1=mktime(0,0,0,"$mesSQL","$diaSQL","$anoPeriodo");
		$fecha2=mktime(0,0,0,"$mes","$dia","$ano");

		$diferencia=$fecha2-$fecha1;
		$dias=$diferencia/(60*60*24);

		echo $dias;
		
	}
	
	
	
	
	
	$difDia = 1.25/30 * $dias;
	/*
	echo "Saldo Vacaciones: ".$difDia;
	echo '</br>';
	
	echo "Periodo: ".$Periodoed;
			*/
			
	
	
	$saldoBase = $difDia;
		
		  
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
			//echo "asd ".$Periodoed."asd";
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
				
				$saldo = ($saldoBase + $diasProgresivos ) - $diasTomados ;//sacar dias prograsivos, el 15 ahora es una variable nueva
				//echo "Saldo: ".$saldo." dias";
				
				echo "Saldo: ".$saldo;
				return $saldo;
			}
			
		}
	}
}



?>