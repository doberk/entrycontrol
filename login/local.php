<?php
if ((isset($_POST["usuarioLocal"])) && (isset($_POST["claveLocal"]))){	
	$serverName = "sql.grupoaleastur.com";
	$connectionInfo = array("Database"=>"EntryControl", "UID"=>"adminEC", "PWD"=>"alea9038");
	$conn = sqlsrv_connect($serverName, $connectionInfo); //abre una conexion contra la base de datos

	$usr = $_POST["usuarioLocal"];
	$pass = $_POST["claveLocal"];

	if ($conn === false) 
	{
	    echo "No se pudo establecer la conexion.<br/>";
		die(print_r(sqlsrv_errors(), true));
	}

	$sql = "select username, activo from usuarios where username = '$usr'";
	$params = array();
	$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
	$query = sqlsrv_query($conn, $sql, $params, $options);

	if ($query === false) {
	     die(print_r(sqlsrv_errors(), true));
	}

	if (sqlsrv_num_rows($query) == 0){
		echo "<form id='error1' action='../default.php' method='post'>";
		echo "<input type='hidden' name='error' value='error1' />";
		echo "</form>";
		echo "<script> document.getElementById('error1').submit(); </script>";
	} else {
		while ($fila = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
			$usuario = $fila['username'];
			$activo = $fila['activo'];
		}
		if ($activo == 0) {
			echo "<form id='error2' action='../default.php' method='post'>";
			echo "<input type='hidden' name='error' value='error2' />";
			echo "</form>";
			echo "<script> document.getElementById('error2').submit(); </script>";
		} else {
			$sql = "select username, password from usuarios where username = '$usr' and [password] = HASHBYTES('MD5','$pass')";
			$params = array();
			$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
			$query = sqlsrv_query($conn, $sql, $params, $options);
			if (sqlsrv_num_rows($query) == 0){
				echo "<form id='error3' action='../default.php' method='post'>";
				echo "<input type='hidden' name='error' value='error3' />";
				echo "</form>";
				echo "<script> document.getElementById('error3').submit(); </script>";
			} else {
				session_start(); 
				$_SESSION["user"] = $usuario; 
				$_SESSION["autentica"] = "SIP";
				echo "<script>window.location.href='/home'; </script>"; 
			}
		}
	}
}

?>