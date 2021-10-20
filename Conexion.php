<?php
	/*$link = mysql_connect("localhost", "nobody"); */
	//mysql_connect("localhost", "Alessandri","4l3ss4ndr1") or die ("Fallo la conexion : ".mysql_error());
	//mysql_connect("190.153.254.59", "dba_ematix","yazQkuZKPczRDzjjI0oi") or die ("Fallo la conexion : ".mysql_error()); yazQkuZKPczRDzjjI0oi
	//mysql_connect("localhost", "dba_ematix","yazQkuZKPczRDzjjI0oi") or die ("Fallo la conexion : ".mysql_error());
	$link = mysqli_connect("localhost", "dba_ematix", "yazQkuZKPczRDzjjI0oi", "ematixdb");
	//mysql_select_db("ematixdb") or die ("Error al seleccionar Base de Datos : ".mysql_error());
	//mysql_query("SET NAMES 'utf8'");
	if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
	$usuario = $_POST["admin"];   
	$password = $_POST["password_usuario"];
	
			 
	//$result = mysql_query("SELECT * FROM Usuario WHERE Usuario = '$usuario' AND Estado = 1"); 
	$query = "SELECT * FROM Usuario WHERE Usuario = '$usuario' AND Estado = 1";
	$result = mysqli_query($link, $query);
		
	//Validamos si el nombre del administrador existe en la base de datos o es correcto
	if($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		//Si el usuario es correcto ahora validamos su contraseña
 		if($row["Password"] == $password)
 		{
  			//Creamos sesión
  			session_start();  
  			//Almacenamos el nombre de usuario en una variable de sesión usuario
  			//$_SESSION['usuario'] = $usuario;
			$_SESSION['usuario'] = $row['Nombre_usu'];
			$_SESSION['APaterno'] = $row['ApellidoP_usu'];
			$_SESSION['AMaterno'] = $row['ApellidoM_usu'];  
			$_SESSION['cargo'] = $row['Cargo_usu'];
			$_SESSION['rut'] = $row['Rut_usu'];
			$_SESSION['Dv'] = $row['Dv_usu'];
			$_SESSION['fecha'] = $row['Fecha_Ingreso_usu'];
			$_SESSION['tipo_usuario'] = $row['Tipo_usu'];
			
  			//Redireccionamos a la pagina: index.php
  			header("Location: manLiquidacion.php");  
			
		}
 		else
 		{
  			//En caso que la contraseña sea incorrecta enviamos un msj y redireccionamos a login.php
  			?>
   			<script languaje="javascript">
    			alert("Contraseña Incorrecta");
    			location.href = "index.php";
   			</script>
  			<?php            
 		}
	}
	else
	{
 		//en caso que el nombre de administrador es incorrecto enviamos un msj y redireccionamos a login.php
		?>
 		<script languaje="javascript">
  			alert("El nombre de usuario es incorrecto!");
  			location.href = "index.php";
 		</script>
		<?php         
	}	
?>