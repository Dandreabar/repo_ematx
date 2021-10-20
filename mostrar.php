
<?PHP


$link = mysqli_connect("localhost", "dba_ematix", "yazQkuZKPczRDzjjI0oi", "ematixdb");
	  
	if($link === false){ 
		die("ERROR: Could not connect. "  
					. mysqli_connect_error()); 
	} 
	
	$sql="UPDATE `mostrarliq` SET `Mostrar`=1";	
	
	if(mysqli_query($link, $sql)){ 
		mysqli_close($link); 
		header('Location: manLiquidacion.php');
		return true;
	} else { 
		mysqli_close($link); 
		header('Location: manLiquidacion.php');
		return false;
	}  
?>